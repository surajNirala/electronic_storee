<?php

echo "<script>alert(Register successfully);</script>";
require_once('library/functions.php');

require_once('library/error_reporting.php');

$obj = new functions();

 if(isset($_POST['register'])){
	//print_r($_POST);
	//print_r($_FILES);die;
	$name = $_POST['name'];
	$email = $_POST['email'];
	$check = $obj->checkEmailExist($email);	
	$username = $_POST['username'];
	$image = $_FILES['image']['name'];
	
	$type = $_FILES['image']['type'];
	$size = $_FILES['image']['size'];
	$tmp_name = $_FILES['image']['tmp_name'];
	$desination =  __DIR__.'/image/'.$image;//die;
	$data = move_uploaded_file($tmp_name,$desination);
	
	//$desination = "image".$image;
	
	
	$gender = $_POST['gender'];
	$password = $_POST['password'];
	$confirm = $_POST['confirm'];
	
	
	
	if($name==""){
		$error = "name is required";
	}else if($email==""){
			$error = "email is required";
	}
	else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
		
		$error = "Invalid Email! please Enter valid mail";
		
	}else if($username == ""){
		$error = "required username";
	}else if($image == ""){
		$error = "required image";
	}else if($gender == ""){
		$error = "required gender";
	}else if($password == ""){
		$error = "required password";
	}else if($confirm != $password){
		$error = "please re-enter same password";
	}elseif($check > 0){
		$error = "Email is already Exists.";
	}
	
		
	
	
	
	
else{
	
	$response = $obj->insert($name,$email,$username,$image,$gender,$password);
	
	if($response){
		echo '<script type="text/javascript">alert("Register successfully")</script>';
	 //header('location:index.php');
	 //echo '<script type="text/javascript">alert("login successfully")</script>';
		 echo "<script>
					window.location.href='index.php';
				</script>"; 
		
	}else{
		//$error = "NOt insert successfully!!";
		echo '<script type="text/javascript">alert("Email already exists")</script>';
	}
	
	}	
} 


?>

<!DOCTYPE html>
<html lang="en">
    <head> 
		<meta name="viewport" content="width=device-width, initial-scale=1">
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
	<link rel="stylesheet" href="css/custom.css" />
	<script type="text/javascript">
	/* $(document).ready(function(){
		$("#register1").submit(function(){
			var name = $("#name").val();
			var email = $("#email").val();
			if(name == "")
			{
				alert("required fields");
			}else if (email=="")
			{
				alert("required Email");
			}
			
		});
	}); */
	function validate()
	{
		if(document.myform.name.value == "")
		{
			//alert("required name");
			//document.getElementByClass("Error").innerHTML = "Required Name";
			document.getElementById("name").style.borderColor = "red";
			document.myform.name.focus();
			return false;
		}
		if(document.myform.email.value == "")
		{
			//alert("required Email");
		    document.myform.email.focus();
			document.getElementById("email").style.borderColor = "red";
			return false;
		}
		
		var emailID = document.myform.email.value;
		
		atpos = emailID.indexOf("@");
		dotpos = emailID.lastIndexOf(".");
		
		if(atpos < 1 || (dotpos - atpos < 2) )
		{
			alert("Please enter correct email ID");
			document.getElementById("email").style.borderColor = "red";
			document.myform.email.focus();
			return false;
		}
		
		var emailID = document.getElementById("email").value;
		if(emailID)
		{
			$.ajax({
				
				type:'post',
				url:'checkExist.php',
				data:{emailID:emailID},
				success:function(response)
				{
					if(response){
					alert(response);
					document.getElementById("email").style.borderColor = "red";
					//document.myform.email.focus();
					//return false;
					}
					elseif(response == "")
					{
						
					}
				}
				
			});
			
		}
		
		//alert(emailID);
		if(document.myform.username.value == "")
		{
			//alert("required username");
			document.getElementById("username").style.borderColor = "red";
			document.myform.username.focus();
			return false;
		}
		if(document.myform.image.value == "")
		{
			alert("required Image");
			document.getElementById("image").style.borderColor = "red";
			document.myform.image.focus();
			return false;
		}
		if(document.myform.gender.value == "")
		{
			//alert("required gender");
			document.getElementById("gender").style.borderColor = "red";
			document.myform.gender.focus();
			return false;
		}
		if(document.myform.password.value == "")
		{
			//alert("required password");
			document.getElementById("password").style.borderColor = "red";
			document.myform.password.focus();
			return false;
		}
		if(document.myform.confirm.value == "")
		{
			//alert("required Re-password");
			document.getElementById("confirm").style.borderColor = "red";
			document.myform.confirm.focus();
			return false;
		}
		if(document.myform.confirm.value != document.myform.password.value)
		{
			alert("Please enter same password")
			document.getElementById("confirm").style.borderColor = "red";
			document.myform.confirm.focus();
			return false;
		}
	}
	</script>
	<style type="text/css">
	body
	{
	 	background: url('image/bg/banner.jpg') fixed;
	    background-size: cover;
	    padding: 0;
	    margin: 0;
	}
	</style>
		<title>Admin</title>
	</head>
	<body>
		<div class="container">
			<div class="row main"> 
				<div class="main-login main-center">
					<form onsubmit="return(validate());" name="myform" class="form-horizontal" id="register1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data" >
						
						<div class="form-group">
							<label for="name" class="cols-sm-2 control-label">Your Name</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
									<input title="Enter your name" type="text" class="form-control" name="name" id="name"  placeholder="Enter your Name"/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="email" class="cols-sm-2 control-label">Your Email</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="email" id="email"  placeholder="Enter your Email"/>
								</div>
							</div>
							<div style="color:#FF0000;" ><?php if(isset($error)) {  echo $error;  }?></div>
						</div>

						<div class="form-group">
							<label for="username" class="cols-sm-2 control-label">Username</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="username" id="username"  placeholder="Enter your Username"/>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="username" class="cols-sm-2 control-label">Image</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-picture-o" aria-hidden="true"></i></span>
									<input type="file" class="form-control" name="image" value="image" id="image" />
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="username" class="cols-sm-2 control-label">Gender</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
									<select class="form-control" name="gender" >
									<option value="male">male</option>
									<option value="female">female</option>
								</select>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="password" class="cols-sm-2 control-label">Password</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input type="password" class="form-control" name="password" id="password"  placeholder="Enter your Password"/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="confirm" class="cols-sm-2 control-label">Confirm Password</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input type="password" class="form-control" name="confirm" id="confirm"  placeholder="Confirm your Password"/>
								</div>
							</div>
						</div>

						<div class="form-group ">
							<button type="submit" name="register" id="register" class="btn btn-success btn-lg btn-block"><i class="fa fa-user-plus" > Register</i></button>
						</div>
						<div class="login-register">
				            <a href="index.php"><i class="fa fa-sign-in"> Login</i></a>
				         </div>
					</form>
				</div>
			</div>
		</div>

		<script type="text/javascript" src="assets/js/bootstrap.js"></script>
	</body>
</html>