<?php include('user_header.php');

if(isset($_GET['page']))
{
	$page = $_GET['page'];
}
else
{
	$page = 0;
}

$per_page = 3;
$page = $per_page * $page;

$pos ="select * from post";

//$query ="select * from student_data_2";
$query1 = mysqli_query($con,$pos);
$num = mysqli_num_rows($query1);
$num1 = ceil($num/$per_page);

 ?>
				<section class="page-heading wow fadeIn" data-wow-duration="1.5s" style="background-image: url(files/images/01-heading.jpg)">
					<div class="container">
						<div class="page-name">
							<h1>Our Blog</h1>
							<span>Lovely layout of heading</span>
						</div>
					</div>
				</section>
				
				<section class="on-blog-grid">
					<div class="container">
						<div class="row">
							<?php $pos = "select * from post where `status`='1' ORDER BY post_id DESC LIMIT $page,$per_page";
			  		$pos1 = mysqli_query($con,$pos);
					while ($pos2 = mysqli_fetch_array($pos1)) { ?>
						<div class="col-md-4">
							<div class="blog-item">
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
							<div class="col-md-12">
								<div class="blog-page-nav text-center">
									<ul>
										<?php for($i=0; $i<$num1; $i++) { ?> 
											<li><a <?php if(isset($_GET['page'])){ if ($_GET['page']==$i) {?> class="current" <?php } } elseif ($page==$i) {?> class="current" <?php } ?> href="blog.php?page=<?php echo $i; ?>"><?php echo $i+1; ?></a></li>
										<?php } ?>
									</ul>
								</div>
							</div>
						</div>
					</div>	
				</section>
<?php include('user_footer.php'); ?>