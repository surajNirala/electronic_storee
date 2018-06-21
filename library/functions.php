<?php
//session_start();
require_once('Database.php');
require_once('session.php');
require_once('cookie.php');
  class functions extends Databse{ 
	  
	  public function insert($name,$email,$username,$image,$gender,$password)
	  {  
       $password = md5($password);   
            $sql = "Insert into users (name, email, username, image, gender, password)values 
					('$name','$email','$username','$image','$gender','$password')"; 
			//$register = mysqli_query($connect_db,$sql);
			$response = $this->connect_db->query($sql);
            return $response;  
    }
	public function contactusInsert($name,$email,$subject,$message){
		$sql = "Insert into contactus (name, email, subject, message)values 
					('$name','$email','$subject','$message')"; 
			//$register = mysqli_query($connect_db,$sql);
			$response = $this->connect_db->query($sql);
            return $response;
	}
	
	public function checkEmailExist($emailID)
	{
		$sql = "SELECT * FROM users where email = '$emailID' ";
		$result = $this->connect_db->query($sql);
		$data = $result->fetch_assoc();
		$response = $result->num_rows;
		if($response > 0)
		{
			return true;
		}
		else 
		{
			return false;
		}
		//print_r($response);
		//return $response;
	}
	
	public function login($email,$password){

		try {
			//print_r($email);die;
		$password = md5($password);
		$sql = "select * from users where email='$email' AND password='$password' ";
		$data = $this->connect_db->query($sql);
		$userdata = $data->fetch_assoc();
		
		$response = $data->num_rows;
		if($response > 0){
			$userdataID = ($userdata['id']);
			$userdataName = ($userdata['name']);
			$userdataUsername = ($userdata['username']);
			$userdataEmail = ($userdata['email']);
			$userdataImage = ($userdata['image']);
			//print_r($userdataID);die;
			//$userInfo = ($userdata);
			
			$obj = new session();
			$obj->setsession($userdataID,$userdataName,$userdataUsername,$userdataEmail,$userdataImage);
			$sessionID = $_SESSION['user_id'];
			$sessionName = $_SESSION['username'];
			//print_r($sessionID);die;
			if(isset($_POST['remember']))
			{
				$email = $_POST['email'];
				$password = $_POST['password'];
				$remember = $_POST['remember'];
				$obj = new cookie();
				$obj->remember($email,$password,$remember);
				//print_r($_POST)."suraj";die;
			}
			return $userInfo;
		}
		} catch (Exception $e) {
			dd($e);
		}
	  }
	
    public  function userInfo($id) {  
	//$Id = implode('',$id);
	//print_r($id);die;
        $sql = "Select * from users where id='$id'";  
		$result = $this->connect_db->query($sql);
		$total = $result->fetch_assoc();
		$response = $result->num_rows;
		if($response > 0){
			return $total;
		}  
    }
	public function getProducts(){
		$sql = "select products.* from products where is_featured = 1 limit 4 ";
		$runQuery = $this->connect_db->query($sql);
		$result = $runQuery->num_rows;
		if($result>0)
		{
			return $runQuery;
		}
		else
		{
			return 0;
		}
	}
	/**
	 * [fetch Popular products]
	 * @return [type] [description]
	 */
	public function getPopularproducts(){
		$sql = "select products.* from products where is_popular = 1 limit 4 ";
		$runQuery = $this->connect_db->query($sql);
		$result = $runQuery->num_rows;
		if($result>0)
		{
			return $runQuery;
		}
		else
		{
			return 0;
		}
	}
	public function getCategories(){
		$sql = "select * from attributes";
		$runQuery = $this->connect_db->query($sql);
		$result = $runQuery->num_rows;
		if($result>0)
		{
			return $runQuery;
		}
		else
		{
			return 0;
		}
	}
	public function getBrands(){
		$sql = "select * from brands";
		$runQuery = $this->connect_db->query($sql);
		$result = $runQuery->num_rows;
		if($result>0)
		{
			return $runQuery;
		}
		else
		{
			return 0;
		}
	}
	public function delete($delete){
		
		  $sql = "Delete from users where id='$delete'";  
		//$result = $this->connect_db->query($sql);
		if($this->connect_db->query($sql)){
			return true;
		}else{
			return false;
		}
	}
	public function edit($id){
		
		 $sql = "Select * from users where id='$id'";  
		$result = $this->connect_db->query($sql);
		$total = $result->fetch_assoc();
		//print_r($total);die;
        return $total;
	}
	public function update($name,$username,$image_name,$user_id){
		
		//print_r($name);
		//print_r($username);
		//print_r($image_name);die;
		$sql = "UPDATE tbl_users SET name ='$name', username = '$username', image='$image_name'  where user_id ='$user_id'";
		//$runQuery = $this->connect_db->query($update);
		if($this->connect_db->query($sql)){
			return true;
		}else{
			return false;
		}
	}

	public function getproductDetail($id){
		$sql = "select * from products where id = '$id'";
		$result = $this->connect_db->query($sql);
		$total = $result->fetch_assoc();
		$response = $result->num_rows;
		if($response > 0){
			return $total;
		}else{
			return 'product not available.';
		}
	}
	
  }

?>