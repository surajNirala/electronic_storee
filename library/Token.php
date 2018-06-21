<?php

class token{
	
	public function genrate_token()
	{
		$auto_token = md5(uniqid(rand(), true));
		return $auto_token;
	}
	
	public function checktoken($auto_token)
	{
		if($auto_token != $_SESSION['token']){
			header('location:404.php');
			exit;
		}
	}
	public function getTokenField()
	{
		return '<input type="hidden" name="token" value="'.$_SESSION['token'].'" id="" />';
	}
	public function destroy()
	{
		unset($_SESSION['token']);
	}
}
//$obj = new token();
//echo $obj->genrate_token();
?>