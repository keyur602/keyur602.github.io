<?php include('user_header.php'); ?>

				<div class="slider">
					<div class="fullwidthbanner-container">
						<div class="fullwidthbanner">
							<ul>

							<?php $slid = "select * from slider where `status`='1'";
								$slid1 = mysqli_query($con,$slid);

								while ($slid2 = mysqli_fetch_array($slid1)) { ?>	
									<li class="first-slide" d ata-transition="" data-slotamount="10" data-masterspeed="300">
										<img src="admin_panel/images/newimages/<?php echo $slid2['image']; ?>" data-fullwidthcentering="on" alt="slide">

										<div class="tp-caption first-line lft tp-resizeme start" data-x="center" data-hoffset="0" data-y="250" data-speed="1000" data-start="200" data-easing="Power4.easeOut" data-splitin="none" data-splitout="none" data-elementdelay="0" data-endelementdelay="0"><?php echo $slid2['titel']; ?></div>

										<div class="tp-caption second-line lfb tp-resizeme start" data-x="center" data-hoffset="0" data-y="340" data-speed="1000" data-start="800" data-easing="Power4.easeOut" data-splitin="none" data-splitout="none" data-elementdelay="0" data-endelementdelay="0"><?php echo substr($slid2['content'], 0,70) ; ?></div>

										<div class="tp-caption slider-btn sfb tp-resizeme start" data-x="center" data-hoffset="0" data-y="510" data-speed="1000" data-start="2200" data-easing="Power4.easeOut" data-splitin="none" data-splitout="none" data-elementdelay="0" data-endelementdelay="0"><a href="#" class="btn btn-slider">Discover More</a></div>
								</li>
							<?php } ?>
							</ul>
						</div>
					</div>
				</div>
				
				

				<section class="services green">
					<div class="container">
						<div class="section-heading">
							<h2>What We Offer</h2>
							<div class="section-dec"></div>
						</div>
		<?php $off = "select * from offer where `status`='1' ORDER BY offer_id DESC LIMIT 0,3";
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

				<section class="portfolio">
					<div class="container">
						<div class="section-heading-white">
							<h2>Recent Photos</h2>
							<div class="section-dec"></div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div id="owl-portfolio" class="owl-carousel owl-theme">
									<?php $pho = "select * from photo where `status`='1' LIMIT 0,4 ";
			  							$pho1 = mysqli_query($con,$pho);
										while ($pho2 = mysqli_fetch_array($pho1)) { ?>
									<div class="item">
								  		<figure>
				        					<img alt="portfolio" style="height: 240px; width: 360px " src="admin_panel/images/newimages/<?php echo $pho2['image']; ?>">
				        					<figcaption>
				            					<h3><?php echo $pho2['titel']; ?></h3>
				            					<p><?php echo $pho2['content']; ?></p>
				        					</figcaption>
				    					</figure>								    
				    				</div>
				    			<?php } ?>
								</div>
							</div>
						</div>
						<div class="owl-navigation">
						  <a class="btn prev fa fa-angle-left"></a>
						  <a class="btn next fa fa-angle-right"></a>
						  <a href="work-3columns.html" class="go-to">Go to portfolio</a>
						</div>
					</div>
				</section>

				<section class="testimonials">
					<div class="container">
						<div class="section-heading">
							<h2>What Others saying</h2>
							<div class="section-dec"></div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div id="owl-demo" class="owl-carousel owl-theme">
								<?php $oth = "select * from otherpost where `status`='1' LIMIT 0,5 ";
			  						  $oth1 = mysqli_query($con,$oth);
									  while ($oth2 = mysqli_fetch_array($oth1)) { ?>
									<div class="item">
								  		<div class="testimonials-post">
								  			<span class="fa fa-quote-left"></span>
								  			<p>“ <?php $asd = $oth2['content'];
								  			 echo substr($asd, 0, 90) ."...";?> ”</p>
								  			<h6><?php echo $oth2['name']; ?> - <em><?php echo $oth2['cont']; ?></em></h6>
								  		</div>
								    </div>
								<?php } ?>
								</div>
							</div>
						</div>
					</div>
				</section>

				<section class="call-to-action-3">
					<div class="container">
						<div class="col-md-12">
							<h4 class="col-md-10 col-sm-8">Read your lastest newsletters, we have an offer for you!</h4>
							<div class="btn-black col-md-2 col-sm-4"><a href="#">Take it now</a></div>
						</div>
					</div>
				</section>
<style type="text/css">
	.hh2{
	    background-color:#dcdcdc!important;
	}
	.section-heading .section-dec {
    	background-color: #ffffff!important;
	}
	.blog-item .read-more {
    border-bottom: 1px solid #fff!important;
	}
</style>

				<section class="blog-posts hh2">
					<div class="container">
						<div class="section-heading">
							<h2>Latest Posts</h2>
							<div class="section-dec"></div>
						</div>
					<?php $pos = "select * from post where `status`='1' ORDER BY post_id DESC LIMIT 0,3";
			  		$pos1 = mysqli_query($con,$pos);
					while ($pos2 = mysqli_fetch_array($pos1)) { ?>
						<div class="blog-item">
							<div class="col-md-4">
								<a href="blog-single.html"><img style="height: 300px; width: 300px" src="admin_panel/images/newimages/<?php echo $pos2['image']; ?>"  alt=""></a>
								<h3><a href="blog-single.html"><?php echo $pos2['titel']; ?></a></h3>
								<span><a href="#"><?php echo $pos2['fname']; ?></a> / <a href="#"><?php echo $pos2['date']; ?></a></span>
								<p><?php echo $pos2['content']; ?></p>
								<div class="read-more">
									<a href="blog_single.php?postid=<?php echo $pos2['post_id'] ?>">Read more</a>
								</div>
							</div>
						</div>
			<?php } ?>
					</div>
				</section>
<?php include('user_footer.php'); ?>
       