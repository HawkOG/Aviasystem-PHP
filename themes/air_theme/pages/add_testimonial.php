<section id="two" class="wrapper style2 special">
				<div class="container">
					<header class="major">
						<h2>Klientų atsiliepimai</h2>
						<p>Klientai apie mūsų paslaugas</p>
					</header>
					<section class="profiles" style="position:relative">
						<div class="row">

						
						<div id="cardx">
						<button id="closebtn" onclick="closeModal()"><i class="fas fa-times"></i></button>	
						<label for="">Vardas</label>
						<form action="" method="post">
						<input type="text" class="testimonial-input" name="rev_name" >
						<label for="">Atsiliepimas</label>
						<input type="text" class="testimonial-input" name="rev_message" >
						<button class="btn-rev" onclick="openModal()" type="submit" name="send">Toliau</button>
						<?php if(isset($_POST['send'])){
							add();
						} ?>
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
						<p>Palikite mums atsiliepimą</p>
					<input value="Rašyti Atsiliepimą" class="special big reviewBtn" style="margin-bottom:40px;" onclick="openModal()" type="submit" name="send">
					

 			
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


