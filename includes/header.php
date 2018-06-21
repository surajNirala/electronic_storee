<?php 


session_start();
//require_once('header.php');
require_once('library/functions.php');
require_once('library/error_reporting.php');
$obj = new functions();

if($_SESSION['user_id']==''){
  header('location:index.php');
}
$loggedUserID = $_SESSION['user_id'];
$userinfo = $obj->userInfo($loggedUserID);
$categories =  $obj->getCategories();
$brands =  $obj->getBrands();
$productsInfo =  $obj->getProducts();
$popularProductInfo =  $obj->getPopularproducts();
 ?>
<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-phone"></i> +91 1234567890</a></li>
								<li><a href="#"><i class="fa fa-envelope"></i> info@domain.com</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a target="_blank" href="https://www.facebook.com/"><i class="fa fa-facebook"></i></a></li>
								<li><a target="_blank" href="https://twitter.com/"><i class="fa fa-twitter"></i></a></li>
								<li><a target="_blank" href="http://www.linkedin.com/"><i class="fa fa-linkedin"></i></a></li>
								<li><a target="_blank" href="https://dribbble.com/"><i class="fa fa-dribbble"></i></a></li>
								<li><a target="_blank" href="https://plus.google.com/"><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="home.php"><img src="images/home/logo.png" alt="" /></a>
						</div>
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								<li><a href="#"><i class="fa fa-user"></i><?php echo $userinfo['email']; ?></a></li>
								<li><a href="#"><i class="fa fa-star"></i><?php echo $userinfo['username']; ?></a></li>
								<li><a href="#"><i class="fa fa-crosshairs"></i><img src="image/<?php echo $userinfo['image']; ?>" height="50" width="60" ></a></li>
								<li><a href="#"><i class="fa fa-user"></i><?php echo $userinfo['name']; ?></a></li>
								<li><a href="logout.php"><i class="fa fa-lock"></i> <b>Logout</b></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->