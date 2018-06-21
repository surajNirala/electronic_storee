<?php require_once('includes/top.php');?>
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
                <li><a href="home.php" class="active">Home</a></li>
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
            <div class="panel-group category-products" id="accordian">
              <?php while ($category = $categories->fetch_assoc()) { ?>
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordian" href="#sportswear">
                      <?php echo $category['name'] ?>
                    </a>
                  </h4>
                </div>
              </div>
              <?php } ?>
            </div>
            <div class="brands_products"><!--brands_products-->
              <h2>Brands</h2>
              <div class="brands-name">
                <?php while ($brand = $brands->fetch_assoc()) { ?>
                <ul class="nav nav-pills nav-stacked">
                  <li><a href="#"> <span class="pull-right"></span><?php echo $brand['name']; ?></a></li>
                </ul>
                <?php } ?>
              </div>
            </div><!--/brands_products-->
          </div>
        </div>
        
        <div class="col-sm-9 padding-right">
        <div class="row">
          <div class="features_items"><!--features_items-->
            <h2 class="title text-center">Features Items</h2>
            <div class="col-sm-12">
              <?php while ($products = $productsInfo->fetch_assoc()) { ?>
              <a href="product-details.php?id=<?php echo $products['id']; ?>">
              <div class="col-sm-3">
              <div class="product-image-wrapper">
                <div class="single-products">
                  <div class="productinfo text-center">
                    <img src="images/home/<?php echo $products['image']; ?>" height="340" width="" alt="" />
                    <h5>&#x20a8; <?php echo $products['price']; ?></h5>
                    <p><?php echo $products['name']; ?></p>
                    <a href="addtocart.php?id=<?php echo $products['id']; ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                  </div>
                </div>
              </div>
            </div>
            </a>
            <?php } ?>
            </div>
            </div>
            <br>
            <div class="features_items">
            <h2 class="title text-center">Popular Items</h2>
            <div class="col-sm-12">
            <?php while ($popularProducts  = $popularProductInfo->fetch_assoc()) { ?>
              <div class="col-sm-3">
              <div class="product-image-wrapper">
                <div class="single-products">
                  <div class="productinfo text-center">
                    <a href="product-details.php?id=<?php echo $popularProducts['id']; ?>">
                      <img src="images/home/<?php echo $popularProducts['image']; ?>" height="340" width="" alt="" />
                    </a>
                    <h5>&#x20a8; <?php echo $popularProducts['price']; ?></h5>
                    <p><?php echo $popularProducts['name']; ?></p>
                    <a href="addtocart.php?id=<?php echo $popularProducts['id']; ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                  </div>
                </div>
              </div>
            </div>
            <?php } ?>
            </div>
          </div><!--features_items-->
          </div>
        </div>
      </div>
    </div>
  </section>
<?php require_once('includes/footer.php'); ?>
</body>
</html>