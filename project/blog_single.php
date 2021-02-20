<?php include('user_header.php'); 
	if (!empty($_GET['postid'])) {
		$id = $_GET['postid'];
		$blog = "select * from post where `post_id`='$id'";
		$blog1 = mysqli_query($con,$blog);
		$blog2 = mysqli_fetch_array($blog1);
	}
	else
	{
		$blog = "select * from post where `status`='1' ORDER BY post_id DESC LIMIT 0,1";
		$blog1 = mysqli_query($con,$blog);
		$blog2 = mysqli_fetch_array($blog1);
	}
	if (isset($_POST['save'])) {
		$name = $_POST['name'];
		$email = $_POST['email'];
		$image = $_FILES['image']['name'];
		move_uploaded_file($_FILES['image']['tmp_name'],"admin_panel/images/newimages/$image");
		$comment = $_POST['comment'];
		$pid =$_GET['postid'];

		$sql = "INSERT INTO `comment`(`name`, `email`, `image`, `comments`, `postid`)VALUES('$name', '$email', '$image', '$comment', '$pid')";
		mysqli_query($con,$sql);

	}
	$btn ="select * from post";
	$btn1 =mysqli_query($con,$btn);
	$cdata=array();
	while ($btn2 = mysqli_fetch_array($btn1)) {
		$cdata[]=$btn2['post_id'];
	}
	if (isset($_GET['postid'])) {
		$postid=$_GET['postid'];
	}
	else{
		$postid=$blog2['post_id'];
	}
	for ($j=0; $j < sizeof($cdata) ; $j++) { 
		if ($cdata[$j] == $postid) {
			$next =$j;
			break;
		}
	}
	for ($k=0; $k < sizeof($cdata) ; $k++) { 
		if ($cdata[$k] == $postid) {
			$prev =$k;
			break;
		}
	}
?>
	<section class="page-heading wow fadeIn" data-wow-duration="1.5s" style="background-image: url(files/images/01-heading.jpg)">
		<div class="container">
			<div class="page-name">
				<h1>blog</h1>
				<span>data</span>
			</div>
		</div>
	</section>

	<section class="blog-single">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<div class="blog-single-item">
						<img style="height: 650px" src="admin_panel/images/newimages/<?php echo $blog2['image']; ?>" alt="">
						<div class="blog-single-content">	
							<h3><a href="#"><?php echo $blog2['titel']; ?></a></h3>
							<span><a href="#"><?php echo $blog2['fname']; ?></a> / <a href="#"><?php echo $blog2['date']; ?></a></span>
							
							<p>
								<?php echo $blog2['content']; ?> 
								<br><br>
								 <em>
								 	<i class="fa fa-info"></i><?php echo $blog2['scontent']; ?>
								 </em>
								 <br><br>
								 <?php echo $blog2['lcontent']; ?>
							</p>
							<div class="share-post">
								<span>Share on: <a href="#">facebook</a>, <a href="#">twitter</a>, <a href="#">linkedin</a>, <a href="#">instagram</a></span>
							</div>
						</div>
					<?php if (!empty($cdata[--$prev])) { ?>
						<div class="prev-btn col-md-6 col-sm-6 col-xs-6">
							<a href="blog_single.php?postid=<?php echo @$cdata[$prev]; ?>"><i class="fa fa-angle-left"></i>Previous</a>
						</div>
					<?php } ?>
					<?php if (!empty($cdata[++$next])) { ?>
						<div class="next-btn col-md-6 col-sm-6 col-xs-6">
							<a href="blog_single.php?postid=<?php echo @$cdata[$next]; ?>">Next<i class="fa fa-angle-right"></i></a>
						</div>	
					<?php } ?>
					</div>

<?php
	if (!empty($_GET['postid'])) {
		$id = $_GET['postid'];
		$com = "select * from comment where `status`='1' AND `postid`='$id'";
		$com1 = mysqli_query($con,$com);
		$num =mysqli_num_rows($com1);
	}
	else
	{
		$id = $blog2['post_id'];
		$com = "select * from comment where `status`='1' AND `postid`='$id'";
		$com1 = mysqli_query($con,$com);
		$num =mysqli_num_rows($com1);
	}
?>

					<div class="blog-comments">
						<h2><?php echo "$num"; ?> Comments</h2>
						<ul class="coments-content">
						<?php 
						$i=1;
						while ($com2 = mysqli_fetch_array($com1)) { 
							if ($i % 2 == 1) { ?>
							<li class="first-comment-item">
								<img src="admin_panel/images/newimages/<?php if($com2['image']){ echo $com2['image'];} ?>" alt="">
								<span class="author-title"><?php if ($com2['name']) { echo $com2['name'] ; } ?></span>
								<span class="comment-date"><?php if ($com2['date']) { echo substr($com2['date'], 0 ,10) ; } ?></span>
								<p><?php if ($com2['comments']) { echo $com2['comments'] ; } ?></p>
							</li>
						<?php } else { ?>
							<li class="second-comment-item">
								<img src="admin_panel/images/newimages/<?php if($com2['image']){ echo $com2['image'];} ?>" alt="">
								<span class="author-title"><?php if ($com2['name']) { echo $com2['name'] ; } ?></span>
								<span class="comment-date"><?php if ($com2['date']) { echo substr($com2['date'], 0 ,10) ; } ?></span>
								<p><?php if ($com2['comments']) { echo $com2['comments'] ; } ?></p>
							</li>
						<?php } $i++; } ?>
						</ul>
					
					</div>

					<div class="submit-comment col-sm-12">
						<h2>Leave A Comment</h2>
						<form  method="post" enctype="multipart/form-data">
							<div class=" col-md-4 col-sm-4 col-xs-6">
								<input type="text" class="blog-search-field" name="name" placeholder="Your name..." >
							</div>
							<div class="col-md-4 col-sm-4 col-xs-6">
								<input type="text" class="blog-search-field" name="email" placeholder="Your email..." >
							</div>
							<div class="col-md-4 col-sm-4 col-xs-12">
								<input type="file"  name="image">
							</div>
							<div class="col-md-12 col-sm-12">
								<textarea id="message" class="input" name="comment" placeholder="Comment..."></textarea>
							</div>
							<div class="submit-coment col-md-12">
									<button type="submit" class="btn btn-success" name="save">submit now</button>
							</div>
						</form>		
					</div>
				</div>
				<div class="col-md-4">
					
					<div class="widget-item">
						<h2>Recent Posts</h2>
						<div class="dec-line"></div>
						<ul class="recent-item">
						<?php 
							if (isset($_GET['postid'])) {
								$id=$_GET['postid'];
							}
							else{
								$id=$blog2['post_id'];
							}
							$sid = "select * from post where `status`='1' AND `post_id`!='$id' ORDER BY post_id DESC LIMIT 0,3";
							$sid1 = mysqli_query($con,$sid);
							while ($sid2 = mysqli_fetch_array($sid1)) {	?>
							<li style="width: 100%" class="recent-post-item">
								<a href="blog_single.php?postid=<?php echo $sid2['post_id'] ; ?>">
									<img style="height: 100px; width: 100px" src="admin_panel/images/newimages/<?php echo $sid2['image']; ?>" alt="">
									<span class="post-title"><?php echo $sid2['titel']; ?></span>
								</a>
								<span class="post-info"><?php echo $sid2['date']; ?></span>
							</li>
						<?php } ?>				
						</ul>
					</div>
					<div class="widget-item">
						<h2>From Flickr</h2>
						<div class="dec-line"></div>
						<div class="flickr-feed">
				        	<ul class="flickr-images">
				        	</ul>
				        </div>
					</div>
				</div>
			</div>
		</div>	
</section>

<?php include('user_footer.php'); ?>