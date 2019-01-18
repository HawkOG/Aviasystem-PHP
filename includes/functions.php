<?php

$testArray = [];

$navbar = [	 '<i class="fas fa-home"></i>'=>'home',
			 '<i class="fas fa-ticket-alt"></i>'=>'offers',
			 '<i class="fas fa-shopping-cart"></i>' =>'order',
             '<i class="fas fa-user"></i>'=>'login'];

function renderNav($navArray) {
	foreach ($navArray as $name=>$link):?> 
		<li><a href='?page=<?=$link ?>'><?=$name?></a></li>
		<?php endforeach ?>

<?php
};


try {
    $conn = new PDO($dsn, $username, $password);
    $bestDeals = $conn->query("SELECT * FROM category JOIN flight ON category.id = flight.flight_category WHERE flight.flight_category = 1");
    $flightNames = $bestDeals->fetchAll(PDO::FETCH_ASSOC);
    $flightCategories = $conn->query("SELECT category.id, category.name FROM category");
    $categoryNames = $flightCategories->fetchAll(PDO::FETCH_ASSOC);

    $reviews = $conn->query("SELECT * FROM reviews LIMIT 4");
    $reviewOutput = $reviews->fetchAll(PDO::FETCH_ASSOC);
    
    
} catch (Exception $e) {
    echo $e;
};



    function add(){
        global $conn;
    $name = $_POST['rev_name'];
    $message = $_POST['rev_message'];
    $pdoQuery = 'INSERT INTO `reviews`(`name`, `review`) VALUES (:name,:message)';
    $pdoResult = $conn->prepare($pdoQuery);
    $pdoExec = $pdoResult->execute(array(":name"=>$name,":message"=>$message));

    if($pdoExec){
        header("Location: index.php");
    }
    }











function generateDeals($flightNames) {
    foreach ($flightNames as $flightName):?>
    <?php $flightId = $flightName['id'];?>
       <div class="4u 12u$(medium)">
           <section class="box">
                <i class="icon big rounded color1 fa-cloud"></i>
                <h3><?=$flightName['name'] ?></h3>
                <p><?=$flightName['description'] ?></p>
                <form method='post'><button class="button small" name='flightInfo' value='<?=$flightId;?>'>Placiau</button></form>
           </section>
       </div>
    <?php endforeach;
};

function generateFlightInfo($connection) {
    if(isset($_POST['flightInfo'])) {
        $post = $_POST['flightInfo'];
        $flightDetails = "SELECT * FROM flight WHERE id = :id";
        $flightDetailsPrepare = $connection->prepare($flightDetails);
        $flightDetailsPrepare->bindParam(':id', $post, PDO::PARAM_STR);
        $flightDetailsPrepare->execute();
		$fullFlightDetails = $flightDetailsPrepare->fetchAll(PDO::FETCH_ASSOC);?>
		<div class="container-fluid" style="background:rgba(198,0,126,.9);height:9em">
			<div class="information" style="margin:0 auto;width:25rem;text-align:center">
			<h2 style="margin:0;color:#fff;"><?=$fullFlightDetails[0]['flight_from'] ?> <i class="fas fa-plane"></i> <?=$fullFlightDetails[0]['flight_to'] ?> </h2>
            <h2 style="margin:0;color:#fff;">Price: <?=$fullFlightDetails[0]['price'] ?>€</h2>
            <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=bangerw13%40gmail.com&currency_code=EUR&source=url" target="_blank" class="orderTickets">PIRKTI BILIETUS DABAR</a>
			</div>
	</div>

			
        <?php 
    }
};

function displayCategories($connection) {
    $cat = $connection->query("SELECT * FROM category");
    $catArray = $cat->fetchAll(PDO::FETCH_ASSOC);
    foreach($catArray as $cat) :?>
    <tr>
        <th scope='row'><?=$cat['id']?></th>
        <td><?=$cat['name']?></td>
    </tr>
    <?php endforeach;
}

function generateCategories($categoryNames, $connection) {
    foreach ($categoryNames as $categoryName):?>
    <?php $categoryId = $categoryName['id'];
    $flights = $connection->query("SELECT * FROM category JOIN flight ON category.id = flight.flight_category WHERE flight.flight_category = $categoryId");
    $flightsForCategory = $flights->fetchAll(PDO::FETCH_ASSOC) ?>
    <section id="one" class="wrapper style1 special">
        <div class='container'>
            <header class='major'>
                <h2><?=$categoryName['name'] ?></h2>
            </header>
            <div class='row 150%'>
                <?php generateDeals($flightsForCategory) ?>
            </div>
        </div>
    </section>
    <?php endforeach;
}

// PHP MAIL


// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

if(isset($_POST['send'])){
    $email = $_POST['email'];
    $message = $_POST['message'];
    $name = $_POST['name'];

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 0;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'kalafioras.serveriai.lt';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'send@ldauto.lt';                 // SMTP username
    $mail->Password = 'Testas123';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('admin@aviaSystem.com', 'Jennifer from AviaSystem');
    $mail->addAddress($email, $name);     // Add a recipient
    

   

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Thank you for flying with aviaSystem';
    $mail->Body    = 'Thank you for flying with <b>aviaSystem!</b><br><br><br>' . $message;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo '<div style="width:100%;background:rgba(198,0,126,.9);font-size:1.3em;color:#fff;font-weight:bold;text-align:center"><i class="fas fa-check"></i> Žinutė išsiūsta, patikrinkite pašto dėžutę.</div>';
} catch (Exception $e) {
    echo '<div style="width:100%;background:rgba(198,0,126,.9);font-size:1.3em;color:#fff;font-weight:bold;text-align:center"><i class="fas fa-times"></i> Žinutės išsiūsti nepavyko, klaida: ', $mail->ErrorInfo . '</div>';
}
}