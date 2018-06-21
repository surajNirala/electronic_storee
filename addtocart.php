<?php 
	require_once('library/error_reporting.php');
	require_once('library/functions.php');
	$obj = new functions();
	$id = $_REQUEST['id'];
	$getproductdetail = $obj->getproductDetail($id);
	
?>
<!DOCTYPE html>
<html>
<head>
	<title>ADD TO CART</title>
</head>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<body>
	<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-10 col-md-offset-1">
        	<br>
        	<a href="home.php"><button class="btn btn-info" >back</button></a>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th class="text-center">Price</th>
                        <th class="text-center">Total</th>
                        <th> </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="col-sm-8 col-md-6">
                        <div class="media">
                            <a class="thumbnail pull-left" href="#"> <img class="media-object" src="images/home/<?php echo $getproductdetail['image']; ?>" style="width: 130px; height: 250px;"> </a>
                            <div class="media-body">
                                <h4 class="media-heading"><a href="#"><?php echo $getproductdetail['name'] ?></a></h4>
                                <span>Status: </span><span class="text-success"><strong>In Stock</strong></span>
                            </div>
                        </div></td>
                        <td class="col-sm-1 col-md-1" style="text-align: center">
                        <input type="email" class="form-control" id="exampleInputEmail1" value="1">
                        </td>
                        <td class="col-sm-1 col-md-1 text-center"><strong><?php echo $getproductdetail['price']; ?></strong></td>
                        <td class="col-sm-1 col-md-1 text-center"><strong><?php echo $getproductdetail['price']; ?></strong></td>
                        <td class="col-sm-1 col-md-1">
                        <button type="button" class="btn btn-danger">
                            <span class="glyphicon glyphicon-remove"></span> Remove
                        </button></td>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h5>Subtotal</h5></td>
                        <td class="text-right"><h5><strong><?php echo $getproductdetail['price']; ?></strong></h5></td>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h5>Estimated shipping</h5></td>
                        <td class="text-right"><h5><strong><?php echo $getproductdetail['price']; ?></strong></h5></td>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h3>Total</h3></td>
                        <td class="text-right"><h3><strong><?php echo $getproductdetail['price']; ?></strong></h3></td>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td>
                        <a href="home.php">
                        	<button type="button" class="btn btn-default">
                            <span class="glyphicon glyphicon-shopping-cart"></span> Continue Shopping
                        </button>
                        </a></td>
                        <td>
                        <a href="https://www.paypal.com/">
                        	<button type="button" class="btn btn-success">
                            Checkout <span class="glyphicon glyphicon-play"></span>
                        </button>
                        </a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>