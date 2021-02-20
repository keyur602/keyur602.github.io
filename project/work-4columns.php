<?php include('user_header.php');

if(isset($_GET['page']))
{
	$page = $_GET['page'];
}
else
{
	$page = 0;
}

$per_page = 8;
$page = $per_page * $page;

$pos ="select * from subcategory";

//$query ="select * from student_data_2";
$query1 = mysqli_query($con,$pos);
$num = mysqli_num_rows($query1);
$num1 = ceil($num/$per_page);
 ?>

				<section class="page-heading wow fadeIn" data-wow-duration="1.5s" style="background-image: url(files/images/01-heading.jpg)">
					<div class="container">
						<div class="page-name">
							<h1>Latest Photos</h1>
							<span>Lovely layout of heading</span>
						</div>
					</div>
				</section>

				<section class="portfolio on-portfolio"> 
					<div class="container">
						<div class="col-sm-12 text-center">
							<?php 
    							$cata = "select * from category WHERE `status`='1'";
    							$cata1=mysqli_query($con,$cata);
							?>
							<div id="projects-filter">
								<a href="#" data-filter="*" class="active">Show All</a>
							<?php while ($cata2=mysqli_fetch_array($cata1)) { ?>
								<a href="#" data-filter=".<?php echo $cata2['category']; ?>"><?php echo $cata2['category']; ?></a>
							<?php } ?>
							</div>
						</div>
						<div class="row">
							<?php 
    							$cat = "select * from subcategory JOIN category ON subcategory.category_id=category.category_id LIMIT $page,$per_page";
    							$cat1=mysqli_query($con,$cat);
							?>
							<div class="row" id="portfolio-grid">
							<?php while ($cat2=mysqli_fetch_array($cat1)) { 
								  if ($cat2['status']==1 && $cat2['statuss']==1) { ?>
								<div class="item col-md-3 col-sm-6 col-xs-12 <?php echo $cat2['category']; ?>">
							  		<figure>
			        					<img src="admin_panel/images/newimages/<?php echo $cat2['image']; ?>">
			        					<figcaption>
			            					<h3><?php echo $cat2['titel']; ?></h3>
			            					<p><?php echo $cat2['contents']; ?></p>
			        					</figcaption>
			    					</figure>
							    </div>
							<?php } } ?>
							</div>
						</div>
						<div class="col-md-12">
							<div class="portfolio-page-nav text-center">
								<ul>
									<?php for($i=0; $i<$num1; $i++) { ?> 
										<li><a <?php if(isset($_GET['page'])){ if ($_GET['page']==$i) {?> class="current" <?php } } elseif ($page==$i) {?> class="current" <?php } ?> href="work-4columns.php?page=<?php echo $i; ?>"><?php echo $i+1; ?></a></li>
									<?php } ?>
								</ul>
							</div>
						</div>
					</div>
				</section>

				<?php include('user_footer.php'); ?>