<?php
//session_start();
class session{
	
   public function setsession($userdataID,$userdataName,$userdataUsername,$userdataEmail,$userdataImage) {
	    $_SESSION['user_id'] = $userdataID;
		/*$_SESSION['user_id'] = $userdataID['id'];
		$_SESSION['name'] = $userdataName['name'];
		$_SESSION['image'] = $userdataImage['image'];
		$_SESSION['username'] = $userdataUsername['username'];
		$_SESSION['email'] = $userdataEmail['email'];*/
    }
	
}
/* $obj = new session();
echo $obj->setsession('test');die; */
?>