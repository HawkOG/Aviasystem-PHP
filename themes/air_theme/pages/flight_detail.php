
			
			<section id="one" class="wrapper style1 special">
				<div class="container">
					<header class="major">
						<h2>Mėnesio Pasiūlymai</h2>
					<p>Geriausi pasiūlymai Jums!</p>
					</header>
					<div class="row 150%">
						<?php generateDeals($flightNames) ?>
					</div>
				</div>
			</section>
			<div class="card bg-dark">
			<?php generateFlightInfo($conn) ?>
			</div>