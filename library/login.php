<?php
require_once('Database.php');
require_once('cookie.php');
require_once('session.php');
//session_start();
class login extends Databse
{
	public function loginData($email, $pass) {
        $pass = md5($pass);  
		$sql = "Select * from users where email='$email' and password='$pass'"; 
				$register = $this->connect_db->query($sql); 
			$data = $register->fetch_assoc();
			//print_r($data);die;
        $result = $register->num_rows; 
		//print_r($result);die;
        if ($result == 1) {   
			if(isset($_POST['remember'])){
				$email = $email;
				$password = $pass;
				$obj = new cookie();
				$obj->remember($email,$password);
			}
			session_start();
			$obj = new session();
			$obj1 = $obj->setsession($email);
				return true;
			}else{
				return false;
			}
			
		}   
    }
	

?>