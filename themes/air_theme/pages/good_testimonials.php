<section id="two" class="wrapper style2 special">
				<div class="container">
					<header class="major">
						<h2>Klientų atsiliepimai</h2>
						<p>Klientai apie mūsų paslaugas</p>
					</header>
					<section class="profiles" style="position:relative">
						<div class="row">

						
						<div id="cardx">
						<form action="" method="post">
							
						<button id="closebtn" onclick="closeModal()"><i class="fas fa-times"></i></button>	
						<label for="">Vardas</label>
						<input type="text" class="testimonial-input" name="name" required>
						<label for="">Atsiliepimas</label>
						<input type="text" class="testimonial-input" name="message" required>
						

						
						
						</form>
						</div>

						
						<?php foreach($reviewOutput as $item){
						?>
							<section class="3u 6u(medium) 12u$(xsmall) profile">
								<img src="themes/air_theme/images/profile_placeholder.gif" alt="" />
								<h4><?php echo $item['name']; ?></h4>
								<p><?php echo $item['review']; ?></p>
							</section>
						<?php
					}
					?>
						</div>
					
					<footer>
						
					<div class="container 50%">
					<div class="row uniform">
							<div class="12u 12u$(small)">
						<p style="margin:0">Palikite mums atsiliepimą</p>
						<form action="" method="post">
								<input name="rev_name" id="nameField" value="" placeholder="Vardas" type="text">
							</div>
							<div class="12u$">
								<textarea name="rev_message" id="messageField" placeholder="Žinutė" rows="6"></textarea>
							</div>
						</div>
								<button name="subReview" class="button small modal reviewSend" >Rašyti</a>
								</form>
							<?php
								if(isset($_POST['subReview'])){
									add();
								}
							?>

					</footer>
				</div>
				</div>
			</section>
















			
<section id="three" class="wrapper style3 special">
				<div class="container">
					<header class="major">
						<h2>Turite problemą? Rašykite mums</h2>
						<p>Mes esame pasiruošę Jums padėti!</p>
					</header>
				</div>
				<div class="container 50%">
					<?php
					include_once 'includes/functions.php';

					?>
					<form action="#" method="post">
						<div class="row uniform">
							<div class="6u 12u$(small)">
								<input name="name" id="name" value="" placeholder="Vardas" type="text">
							</div>
							<div class="6u$ 12u$(small)">
								<input name="email" id="email" value="" placeholder="El. paštas" type="email" required>
							</div>
							<div class="12u$">
								<textarea name="message" id="message" placeholder="Žinutė" rows="6"></textarea>
							</div>
							<div class="12u$">
								<ul class="actions">
									<li><input value="Siųsti" class="special big" type="submit" name="send"></li>
								</ul>
							</div>
						</div>
					</form>
				</div>
				</div>
			</section>


<div id="dialog" title="Basic dialog" style="display: none">
    <form action="#" method="post">
        <div class="row uniform">
            <div class="6u 12u$(small)">
                <input name="name" id="name" value="" placeholder="Vardas" type="text">
            </div>
            <div class="6u$ 12u$(small)">
                <input name="email" id="email" value="" placeholder="El. paštas" type="email" required>
            </div>
            <div class="12u$">
                <textarea name="message" id="message" placeholder="Žinutė" rows="6"></textarea>
            </div>
            <div class="12u$">
                <ul class="actions">
                    <li><input value="Siųsti" class="special big" type="submit" name="feedback"></li>
                </ul>
            </div>
        </div>
    </form>
</div>
