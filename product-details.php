<?php 
	require_once('includes/top.php');
	require_once('library/error_reporting.php');
	require_once('library/functions.php');
	$obj = new functions();
	$id = $_REQUEST['id'];
	$getproductdetail = $obj->getproductDetail($id);
?>
<body>
	<?php require_once('includes/header.php'); ?>	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="home.php">Home</a></li> 
								<li><a href="aboutus.php">About us</a></li>
								<li><a href="contactus.php">Contact us</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="search_box pull-right">
							<input type="text" placeholder="Search"/>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->
	
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Category</h2>
						<div class="panel-group category-products" id="accordian"><?php while ($category = $categories->fetch_assoc()) { ?>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#sportswear">
											<span class="badge pull-right"></span>
											 <?php echo $category['name'] ?>
										</a>
									</h4>
								</div>
							</div>
							<?php } ?>
						</div><!--/category-products-->
					
						<div class="brands_products"><!--brands_products-->
							<h2>Brands</h2>
							<div class="brands-name">
								<?php while ($brand = $brands->fetch_assoc()) { ?>
				                <ul class="nav nav-pills nav-stacked">
				                  <li><a href=""> <span class="pull-right"></span><?php echo $brand['name']; ?></a></li>
				                </ul>
				                <?php } ?>
							</div>
						</div><!--/brands_products-->
					</div>
				</div>
				
				<div class="col-sm-9 padding-right">
					<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
								<img src="images/home/<?php echo $getproductdetail['image'];  ?>" alt="" style="width: 270px; height: 500px;" />
							</div>
						</div>
						<div class="col-sm-7">
							<div class="product-information">
								<h2><?php echo $getproductdetail['name'];  ?></h2>
								<span>
								<a href="addtocart.php?id=<?php echo $getproductdetail['id']; ?>">
									<button type="button" class="btn btn-fefault cart">
									<i class="fa fa-shopping-cart"></i>
									Add to cart
								</button>
								</a>
								</span>
								<p><b>Availability:</b> In Stock</p>
								<p><b>Short Description:</b> <?php 
								$pos=strpos($getproductdetail['description'], ' ', 50);
								echo substr($getproductdetail['description'],0,$pos );
								?></p><a href="#details">more..</a>
							</div><!--/product-information-->
						</div>
					</div><!--/product-details-->
					
					<div class="category-tab shop-details-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li><a href="#details" data-toggle="tab">Details</a></li>
							</ul>
						</div>
						<div class="tab-content">
							<div class="tab-pane fade active in" id="reviews" >
								<div class="col-sm-12">
									<p><?php echo $getproductdetail['description'];  ?></p>
								</div>
							</div>
							
						</div>
					</div><!--/category-tab-->
				</div>
			</div>
		</div>
	</section>
	<?php require_once('includes/footer.php'); ?>
</body>
</html>