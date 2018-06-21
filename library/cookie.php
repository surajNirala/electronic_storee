<?php
class cookie{
	
   public function remember($email,$password,$remember) {
	 //  print_r($email);
	 //  print_r($password);
	   //print_r($remember);die;
	  $resultcookie =  setcookie($email, $password, time() + (86400 * 30), "/"); // 86400 = 1 day
		//$resultcookie =	setcookie ("email",$email,time()+ (10 * 365 * 24 * 60 * 60));
		//$resultcookie1 =	setcookie ("password",$password,time()+ (10 * 365 * 24 * 60 * 60));
		//print_r($_COOKIE);die;
		return $resultcookie;
	  
    }
	
}
?>