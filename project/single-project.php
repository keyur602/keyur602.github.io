<?php include('user_header.php'); ?>
				<section class="page-heading wow fadeIn" data-wow-duration="1.5s" style="background-image: url(files/images/01-heading.jpg)">
					<div class="container">
						<div class="page-name">
							<h1>Single Project</h1>
							<span>Lovely layout </span>
						</div>
					</div>
				</section>
				
				<section class="single-project">
					<div class="container">
						<div class="row">
							<div class="col-md-8">
								<div class="single-project-item">
									<div class="slider">
										<div class="fullwidthbanner-container">
											<div class="fullwidthbanner">
												<ul>
													<?php 
						    							$cat = "select * from subcategory WHERE `statuss`='1'";
						    							$cat1=mysqli_query($con,$cat);
						    							while ($cat2=mysqli_fetch_array($cat1)){ ?>
													<li class="first-slide" data-transition="fade" data-slotamount="10" data-masterspeed="300">
														<img src="admin_panel/images/newimages/<?php echo $cat2['image']; ?>" data-fullwidthcentering="on" alt="slide">
													</li>
												<?php } ?>
												</ul>
											</div>
										</div>
									</div>
								</div>
							</div> 
							<div class="col-md-4">
								<div class="single-project-sidebar">
									<div class="about-author">
										<img src="files/images/author.png" alt="author">
										<div class="author-contet">
											<h3>Syam Meri</h3>
											<span>Webdesigner</span>
											<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt quis ullam explicabo facere numquam architecto.</p>
										</div>
									</div>
									<div class="info project-name">
										<span>Project name: <em>Redesign</em></span>
									</div>
									<div class="info data-share">
										<span>Data shared: <em>8 June 2015</em></span>
									</div>
									<div class="info category">
										<span>Category: <em>Webdesign</em></span>
									</div>
									<div class="info share-on">
										<div class="social-icons">
											<ul>
												<li><a href="#"><i class="fa fa-facebook"></i></a></li>
												<li><a href="#"><i class="fa fa-twitter"></i></a></li>
												<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
												<li><a href="#"><i class="fa fa-instagram"></i></a></li>
												<li><a href="#"><i class="fa fa-rss"></i></a></li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>	
				</section>
<?php include('user_footer.php'); ?>
