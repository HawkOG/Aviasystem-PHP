<?php session_start();
require "config/config.php";
require 'includes/functions.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<?php require "themes/$theme/partials/head.php"; ?>
</head>
	<body>

		<?php require "themes/$theme/partials/header.php";?>
		<div style="width:100%;text-align:center;font-size:1.3em;line-height:2;height:2em;background:gold;">

		<?php 
		$i = 0;
		foreach ($flightNames as $flightName):?>
		<?php if($i == 0){ ?>
		<?php $flightId = $flightName['id'];?>
		<p><strong style="color:#990000">Tik dabar!<strong> Skrydis iš <?=$flightName['flight_from']?> į <?=$flightName['flight_to']?> TIK UŽ <?php echo rand(0,2400)?>€!!!</p>
		<?php }$i++; ?>
		<?php endforeach;?>
		</div><?php
		require 'config/router.php'; 
		include "themes/$theme/partials/footer.php";

		?>
		
	<script type="text/javascript">
		function openModal(){
			let modal = document.getElementById('cardx');
			modal.style.display = 'block';
		}


		function closeModal(){
			let modal = document.getElementById('cardx');
			modal.style.display = 'none';

			

		}

	   </script> 
	  