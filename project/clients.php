<?php include('user_header.php'); ?>
				<section class="page-heading wow fadeIn" data-wow-duration="1.5s" style="background-image: url(files/images/01-heading.jpg)">
					<div class="container">
						<div class="page-name">
							<h1>Our Clients</h1>
							<span>Lovely layout of heading</span>
						</div>
					</div>
				</section>

				<section class="call-to-action-1">
					<div class="container">
						<?php $abo = "select * from about where `status`='1' ORDER BY about_id DESC LIMIT 0,1 ";
			  			  $abo1 = mysqli_query($con,$abo);
			  			  $abo2 = mysqli_fetch_array($abo1);
			  			  ?>
						<h4><?php echo $abo2['titel']; ?></h4>
						<p class="col-md-10 col-md-offset-1"><?php echo $abo2['content']; ?></p>
						<div class="buttons">
							<div class="col-md-6 col-sm-6 col-xs-6">
								<div class="border-btn"><a href="#">Learn More</a></div>
							</div>
							<div class="col-md-6 col-sm-6 col-xs-6">
								<div class="btn-black"><a href="#">Buy This Theme</a></div>
							</div>
						</div>
					</div>	
				</section>

				<section class="clients">
					<div class="container">
						<div class="section-heading">
							<h2>Our Clients</h2>
							<div class="section-dec"></div>
						</div>
						<?php
							$cli = "select * from clients where `status`='1' ORDER BY clients_id DESC";
			  			  	$cli1 = mysqli_query($con,$cli);
			  			  	while ($cli2 = mysqli_fetch_array($cli1)) { ?>
							<div class="col-md-2 col-sm-4 col-xs-12">
								<div class="client-item">
									<a href="#"><img src="admin_panel/images/newimages/<?php echo $cli2['image']; ?>" alt=""></a>
								</div>
							</div>
						<?php } ?>
					</div>
				</section>

<?php include('user_footer.php'); ?>