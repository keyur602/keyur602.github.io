<?php include('user_header.php');

if (isset($_POST['submit'])) 
    {   
	    $name=$_POST['name'];
	    $email=$_POST['email'];
	    $sub=$_POST['sub'];
	    $text=$_POST['text'];

	    $sql = "INSERT INTO `contact`(`name`, `email`, `sub`, `text`) VALUES ('$name', '$email', '$sub', '$text')";
	    mysqli_query($con,$sql);
	}
 ?>
				<section class="page-heading wow fadeIn" data-wow-duration="1.5s" style="background-image: url(files/images/01-heading.jpg)">
					<div class="container">
						<div class="page-name">
							<h1>Contact Us</h1>
							<span>Lovely layout of heading</span>
						</div>
					</div>
				</section>
				<style type="text/css">
					.section-heading h2{
						color: #929283;
					}
				</style>

				<section class="contact-map-wrapper">
					<div class="container">
						<div class="section-heading">
							<h2>Find Us On Map</h2>
							<div class="section-dec"></div>
						</div>
						<div class="row">
							<div class="col-sm-12">
								<div class="contact-map" style="height: 380px; width: 100%">
									<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d238133.15238311826!2d72.68220907617517!3d21.159142501177136!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be04e59411d1563%3A0xfe4558290938b042!2sSurat%2C%20Gujarat!5e0!3m2!1sen!2sin!4v1613538405094!5m2!1sen!2sin" width="100%" height="380px" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
								</div>
							</div>
						</div>
					</div>
				</section>

	<style type="text/css">
		.c{
			color: #fff!important;
		}
	</style>

				<section class="contact-us">
					<div class="container">
						<div class="section-heading">
							<?php if (!empty($e)) {
								echo $e;
							} ?>
							<h2>Send Us A Message</h2>
							<div class="section-dec"></div>
						</div>
						<div class="send-message col-sm-12">
							<form id="contact_form" action="#" method="post" enctype="multipart/form-data">
								<div class=" col-md-4 col-sm-4 col-xs-6">
									<input type="text" class="blog-search-field" name="name" placeholder="Your name..." value="">
								</div>
								<div class="col-md-4 col-sm-4 col-xs-6">
									<input type="text" class="blog-search-field" name="email" placeholder="Your email..." value="">
								</div>
								<div class="col-md-4 col-sm-4 col-xs-12">
									<input type="text" class="subject" name="sub" placeholder="Subject..." value="">
								</div>
								<div class="col-md-12 col-sm-12">
									<textarea id="message" class="input" name="text" placeholder="Message..."></textarea>
								</div>
								<div class="submit-coment col-md-4">
									<input type="submit" name="submit" class="btn btn-success btn-sm c">
								</div>
							</form>		
						</div>
					</div>
				</section>
<?php include('user_footer.php'); ?>