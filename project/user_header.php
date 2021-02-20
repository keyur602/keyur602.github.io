<?php include('admin_panel/dblink.php'); ?>

<!DOCTYPE html>
<!--[if IE 9]>
<html class="ie ie9" lang="en-US">
<![endif]-->
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

	<title>YOM- Multipurpose HTML Theme</title>


	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,800' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Audiowide' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="files/css/bootstrap.css">
	<link rel="stylesheet" href="files/css/animate.css">
	<link rel="stylesheet" href="files/css/simple-line-icons.css">
	<link rel="stylesheet" href="files/css/font-awesome.min.css">
	<link rel="stylesheet" href="files/css/style.css">
	<link rel="stylesheet" href="files/rs-plugin/css/settings.css">

	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
	<![endif]-->

</head>
<body>

	
	<div class="sidebar-menu-container" id="sidebar-menu-container">

		<div class="sidebar-menu-push">

			<div class="sidebar-menu-overlay"></div>

			<div class="sidebar-menu-inner">

				<header class="site-header">
					<div id="main-header" class="main-header header-sticky">
						<div class="inner-header clearfix">
							<div class="logo">
								<a href="index.php">YOM</a>
							</div>
							<div class="header-right-toggle pull-right hidden-md hidden-lg">
								<a href="javascript:void(0)" class="side-menu-button"><i class="fa fa-bars"></i></a>
							</div>
							<nav class="main-navigation pull-right hidden-xs hidden-sm">
								<ul>
									<?php 
										$nav = "select * from nav where `status`='1'";
										$nav1 = mysqli_query($con,$nav);
										while($nav2 = mysqli_fetch_array($nav1)){
											
											if ($nav2['url']!='#') {
									?>
									<li><a href="<?php echo $nav2['url']; ?>"><?php echo $nav2['nev']; ?></a></li>
								<?php }else{ 
									$id=$nav2['nav_id'];  ?>
									<li><a href="#" class="has-submenu"><?php echo $nav2['nev']; ?></a>
										<ul class="sub-menu">
										<?php 
										$snav = "select * from subnav where `statu`='1' ";
										$snav1 = mysqli_query($con,$snav);
										while($snav2 = mysqli_fetch_array($snav1)) { 
											if($id == $snav2['navid']) { ?>
											<li><a href="<?php echo $snav2['url']; ?>"><?php echo $snav2['name']; ?></a></li>
										<?php } } ?>
										</ul>
									</li>
								<?php } } ?>
								</ul>
							</nav>
						</div>
					</div>
				</header>