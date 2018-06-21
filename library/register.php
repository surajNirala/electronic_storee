<?php
try {
require_once('Config.php');
require_once('error_reporting.php');
require_once('functions.php');

$table = "users";

if(isset($_POST['register'])){
	//print_r($_POST);
	$username = $_POST['username'];
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$password_confirm = $_POST['password_confirm'];
	if($password != $password_confirm){
		echo "password is not match";
	}
	
	
	$value = '
			username  = "'.$username.'",
			firstname  = "'.$firstname.'",
			lastname  = "'.$lastname.'",
			email  = "'.$email.'",
			password  = "'.$password.'"  ';
			
			
	$function	= new functions();
		
		$data = $function->insert($table,$value);
	
	
}
} catch (Exception $e) {
	dd($e);
}

?>