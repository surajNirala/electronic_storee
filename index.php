<?php
session_start();
if(isset($_SESSION['user_id'])){
	header('location:home.php');
}
require_once('library/functions.php');

$obj = new functions();

if(isset($_POST['login'])){
	//print_r($_POST);die;
	$email = $_POST['email'];
	$password = $_POST['password'];
	
	//print_r($email);die;
	if($email == "" ){
		$error = "email is required.";
		//echo '<script type="text/javascript">alert("email is required.")</script>';
	}
	else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
		$error = "invalid email";
	}else if ($password == "" ){
		$error = "password is required.";
		//echo '<script type="text/javascript">alert("password is required.")</script>';
	}else{
		$response = $obj->login($email,$password);
		//print_r($response);die;
		if($response){
			header('location:home.php');		
		}else{
			$error = '<div class="alert alert-danger">
				  <strong>Message!</strong>  Incorrect email and password.
				</div>';
			//echo '<script type="text/javascript">alert("incorrect email and password")</script>';
		}
	}
}
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">

		<!-- Website CSS style -->
		<link rel="stylesheet" type="text/css" href="assets/css/main.css">

		<!-- Website Font style -->
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
		
		<!-- Google Fonts -->
		<link href='https://fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.min.js"></script>
  <link rel="stylesheet" href="css/loginform.css" />
	<title>Login</title>
	<script type="text/javascript">
	function login_form()
	{
		
		var email = document.getElementById("email").value;
		var password = document.getElementById("password").value;
		
		if(email == "")
		{
			//alert("Email is required.");
			document.getElementById("email").style.borderColor = "red";
			document.getElementById("error").innerHTML="<div class='alert alert-danger fade in'>Email is required.</div>";
			document.LoginForm.email.focus();
			return false;
		}
		else
		{
			document.getElementById("email").style.borderColor = "green";
		}
		 var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		if(!email.match(regex))
		{
			document.getElementById("email").style.borderColor = "red";
			document.getElementById("error").innerHTML="<div class='alert alert-danger fade in'>Invalid Email.</div>";
			document.LoginForm.email.focus();
			return false;
		}else
		{
			document.getElementById("email").style.borderColor = "green";
		}
		if(password == "")
		{
			//alert("enter password");
			document.getElementById("password").style.borderColor = "red";
			document.getElementById("error").innerHTML="<div class='alert alert-danger fade in'>Password is required.</div>"
			document.LoginForm.password.focus();
			return false;
		}
		else
		{
			document.getElementById("password").style.borderColor = "green";
		}
	}
	</script>
	
</head>
<style type="text/css">
body
{
	/*height: 100%;
 	background-repeat: no-repeat;
 	background:url(http://localhost/NewHestabit/JS-login/image/bg2.jpg);
 	font-family: 'Oxygen', sans-serif;*/

 	background: url('image/bg/banner.jpg') fixed;
    background-size: cover;
    padding: 0;
    margin: 0;
}
</style>
<body>

	<div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
            <div class="account-wall">
			<h1 class="text-center login-title">Sign in to continue to Shoping</h1>
			<div id="error" style="text-align:center;color:red"></div>
				<div><?php if(isset($error)) echo $error ;?></div><br />
				
                <img class="profile-img" src="image/profile.png" alt="">
                    
                <form class="form-signin" onsubmit="return(login_form());" name="LoginForm" id="LoginForm" action="" method="post">
                <input type="text" name = "email" id="email" class="form-control" value=""  placeholder="Email" > <br />
                <input type="password" name = "password" id="password" value="" class="form-control" placeholder="*******" >
				<label class="checkbox">
                    <input type="checkbox" name="remember" value="remember">
                    Remember me
                </label>
				<!-- <input type="submit" class="btn btn-lg btn-primary btn-block" value="Sign in" /> -->
                <button name="login" class="btn btn-lg btn-primary btn-block" type="submit">
                    <i class="fa fa-sign-in" ></i> Sign in</button> 
                <a href="#" class="pull-right need-help">Need help? </a><span class="clearfix"></span>
                </form>
				<a href="registration.php" class="text-center new-account"><i class="fa fa-user-plus" ></i> Create an account </a>
				</div>
			
			
			
        </div>
    </div>
</div>
</body>
</html>