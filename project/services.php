<?php include('user_header.php'); ?>

				<section class="page-heading wow fadeIn" data-wow-duration="1.5s" style="background-image: url(files/images/01-heading.jpg)">
					<div class="container">
						<div class="page-name">
							<h1>Our Services</h1>
							<span>Lovely layout of heading</span>
						</div>
					</div>
				</section>

				<section class="services on-services green">
					<div class="container">
					<div class="row">
						<div class="section-heading">
							<h2>What We Offer</h2>
							<div class="section-dec"></div>
						</div>
						<?php $off = "select * from offer where `status`='1' ORDER BY offer_id DESC";
			  				$off1 = mysqli_query($con,$off);
						while ($off2 = mysqli_fetch_array($off1)) { ?>
						<div class="service-item col-md-4">
							<span><i class="<?php echo $off2['icon'] ?>"></i></span>
							<div class="tittle"><h3><?php echo $off2['titel']; ?></h3></div>
							<p><?php echo substr($off2['content'], 0,150) ; ?></p>
						</div>
						<?php } ?>	
					</div>
				</section>

				<section class="call-to-action-2">
					<div class="container">
					<?php $abo2 = "select * from about2 where `status`='1' ORDER BY about2_id DESC LIMIT 0,1";
			  			  $abo21 = mysqli_query($con,$abo2);
			  			  $abo22 = mysqli_fetch_array($abo21);
			  			  ?>
					<div class="left-text hidden-xs">
						<h4><?php echo substr($abo22['titel'], 0,50) ; ?></h4>
						<p>
							<em>
								<?php echo substr($abo22['content'], 0,80) ; ?>
								</em>
							<br><br>
							<?php echo substr($abo22['scontent'], 0,140) ; ?>
						</p>
					</div>
					<style type="text/css">
						.right-image{
							background-image: url("admin_panel/images/newimages/<?php echo $abo22['image']; ?>")!important;
						}
					</style>
						<div class="right-image hidden-xs"></div>
					</div>
				</section>
<?php include('user_footer.php'); ?>