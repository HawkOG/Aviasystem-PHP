<?php

if (!isset($_GET['page'])) {
	$_GET['page'] = 'home';
}

$routerEngine = $_GET['page'];
if ($routerEngine) {
	switch ($routerEngine) {
		case "home":
			include "themes/$theme/pages/home.php";
			include "themes/$theme/pages/add_testimonial.php";
			break;
		case "order":
			include "themes/$theme/pages/order_flight.php";
			break;
		case "offers":
			include "themes/$theme/pages/flight_detail.php";
			break;
		case "login":
			include "themes/$theme/pages/login.php";
			break;	
		case "logout":
			session_destroy();
			header("Location: index.php");
		default:
			include "themes/$theme/pages/404.php";
	}
} 
