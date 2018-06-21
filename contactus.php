<?php
session_start();
//require_once('header.php');
require_once('library/functions.php');
require_once('library/error_reporting.php');
$obj = new functions();

if($_SESSION['user_id']==''){
  header('location:index.php');
}

 if(isset($_POST['sendmessage'])){
	 $name = $_POST['name'];
	 $email = $_POST['email'];
	 $subject = $_POST['subject'];
	 $message = $_POST['message'];
	 $getContactUsInfo = $obj->contactusInsert($name,$email,$subject,$message);
	 if($getContactUsInfo){
		 $success = '<div class="alert alert-success">
                  <strong>Success!</strong> Thankyou for contact us.
                </div>';
        header( "refresh:2;url=home.php" );        
	 }
 }
        
?>
<!DOCTYPE html>
<html>
<title>Contactus
</title>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<style>

.jumbotron {
background: #358CCE;
color: #FFF;
border-radius: 0px;
}
.jumbotron-sm { padding-top: 24px;
padding-bottom: 24px; }
.jumbotron small {
color: #FFF;
}
.h1 small {
font-size: 24px;
}

/*.image-aboutus-sm-banner {
    background: linear-gradient(rgba(0,0,0,.7), rgba(0,0,0,.7)), url("https://images.pexels.com/photos/631008/pexels-photo-631008.jpeg?w=940&h=650&auto=compress&cs=tinysrgb");
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center center;
    color: #fff;
    padding-top: 30px;
    padding-bottom:30px;
 }*/


</style>
<body>
<div class="jumbotron jumbotron-sm">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <h1 class="h1">
                    Contact us <small>Feel free to contact us</small></h1>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="well well-sm">
                <?php if(isset($success)) echo $success; ?>
                <form method="post" >
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">
                                Name</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Enter name" required="required" />
                        </div>
                        <div class="form-group">
                            <label for="email">
                                Email Address</label>
                            <div class="input-group">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span>
                                </span>
                                <input type="email" name="email" class="form-control" id="email" placeholder="Enter email" required="required" /></div>
                        </div>
                        <div class="form-group">
                            <label for="subject">
                                Subject</label>
                            <select id="subject" name="subject" class="form-control" required="required">
                                <option value="na" selected="">Choose One:</option>
                                <option value="service">General Customer Service</option>
                                <option value="suggestions">Suggestions</option>
                                <option value="product">Product Support</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">
                                Message</label>
                            <textarea name="message" id="message" class="form-control" rows="9" cols="25" required="required"
                                placeholder="Message"></textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary pull-right" name="sendmessage" id="btnContactUs">
                            Send Message</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>