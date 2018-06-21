<?php
require_once('Database.php');

class mailsave extends Databse{ 
	
	public function emailsave($user_id,$from_email,$to_email,$cc_email,$subject,$message,$msg_random_id,$is_thread_id)
	{
	    $sql = "INSERT INTO tbl_index (user_id,from_email,to_email,cc_email,subject,message,unread_email,msg_random_id,is_thread_id)
				VALUES('$user_id','$from_email','$to_email','$cc_email','$subject','$message','2','$msg_random_id','$is_thread_id')";	
				$runQuery = $this->connect_db->query($sql);
				return $runQuery;
	}
	
	/* public function emailsave($user_id,$to_email,$cc_email,$subject,$message,$file)
	{
		print_r($file);die;
	    $sql = "INSERT INTO tbl_index (user_id,to_email,cc_email,subject,message,attach,unread_email)VALUES
				('$user_id','$to_email','$cc_email','$subject','$message','$file','2')";
				
		$runQuery = $this->connect_db->query($sql);
		return $runQuery;
	} */
	
	
	// fetch All inbox email 
	 public function emailDetail($to_email) 
	 {
		// print_r($to_email);die;
		$sql = "SELECT * FROM tbl_index WHERE (to_email = '$to_email') AND (unread_email = '2' OR unread_email = '3') ORDER BY create_at DESC ";
		$result = $this->connect_db->query($sql);
		return $result;
	 }

	public function cc_emailDetail($is_login_id) 
	 {
		$sql = "SELECT * FROM tbl_index WHERE user_id= '$is_login_id' ORDER BY index_id DESC ";
		$result = $this->connect_db->query($sql);
		return $result;
	 }	
	public function view_messageById($IndexID)
	 {
		/* $sql = "SELECT tbl_index.*,tbl_users.name,tbl_users.image,tbl_users.email 
		FROM tbl_index INNER JOIN tbl_users ON tbl_users.user_id = tbl_index.user_id 
		WHERE (tbl_index.index_id= '$IndexID') AND (tbl_index.cc_email = 1 OR tbl_index.cc_email = 0)"; */
		$sql = "SELECT tbl_index.*,tbl_users.name,tbl_users.image,tbl_users.email 
		FROM tbl_index INNER JOIN tbl_users ON tbl_users.user_id = tbl_index.user_id 
		WHERE tbl_index.index_id= '$IndexID'";
		$result = $this->connect_db->query($sql);
		$response = $result->fetch_assoc();
		return $response;
	 }
	 public function toview_messageBy_msg_random_id($msg_random_id)
	 {
		// print_r($msg_random_id);
		 $sql = "SELECT * FROM tbl_index WHERE msg_random_id = '$msg_random_id' AND cc_email = 0 ";
		 $result = $this->connect_db->query($sql);
		return $result;
	 }
	 
	 public function get_In_ReplyViewMessagesID($Get_In_ReplyViewMessagesID)
	 {
		 //print_r($Get_In_ReplyViewMessagesID);
		 $sql = "SELECT * FROM tbl_index WHERE msg_random_id = '$Get_In_ReplyViewMessagesID' AND cc_email = 0 ";
		 $result = $this->connect_db->query($sql);
		return $result;
	 }
	 
	 public function ccview_messageBy_msg_random_id($msg_random_id)
	 {
		//print_r($msg_random_id);die; 
		$sql = "SELECT * FROM tbl_index WHERE msg_random_id  = '$msg_random_id' AND cc_email = 1 ";
		$result = $this->connect_db->query($sql);
		return $result;
	 }
	 
	 public function to_view_messageBy_msg_random_id_ReplyAll($msg_random_id)
	 {
		
		 $sql = "SELECT * FROM tbl_index WHERE msg_random_id = '$msg_random_id' AND cc_email = 0 ";
		 $result = $this->connect_db->query($sql);
		return $result;
	 }
	 public function cc_view_messageBy_msg_random_id_ReplyAll($msg_random_id)
	 {
		$sql = "SELECT * FROM tbl_index WHERE msg_random_id  = '$msg_random_id' AND cc_email = 1 ";
		$result = $this->connect_db->query($sql);
		return $result;
	 }
	 
	 public function Count_email($to_email)
	 {
		$sql = "SELECT count(*) FROM tbl_index WHERE (to_email = '$to_email') AND (unread_email = '2' OR unread_email = '3') ORDER BY index_id DESC";
		$result = $this->connect_db->query($sql);
		$Count_total_email = $result->fetch_assoc(); 
		return $Count_total_email;
	 }
	 // click on view_message data
	 public function read_email($IndexID)
	 {
		 $sql = "UPDATE tbl_index SET unread_email = '3' WHERE index_id = '$IndexID'";
		 $readEmail = $this->connect_db->query($sql);
		 return $readEmail;
	 }
	 // Fetch view_message per click
	 public function view_message($to_email,$index_id)
	 {
		 $sql = "SELECT * FROM tbl_index WHERE  to_email = '$to_email' AND index_id = '$index_id' ";
		 $viewMessage = $this->connect_db->query($sql);
		 return $viewMessage;
	 }
	 // Fetch All read Email's
	 public function get_read_email($to_email)
	 {
		 $sql = "SELECT * FROM tbl_index WHERE to_email = '$to_email' AND 	unread_email = '3' ORDER BY index_id DESC ";
		 $getreadEmail = $this->connect_db->query($sql);
		 return $getreadEmail;
	 }
	 //Fetch All Unread Email's
	 public function unread_email($to_email)
	 {
		$sql = "SELECT * FROM tbl_index WHERE to_email = '$to_email' AND unread_email = '2' ORDER BY index_id DESC ";
		 $unread_email = $this->connect_db->query($sql);
		 //$data = $result->fetch_assoc();
		// print_r($data);die;
		 return $unread_email; 
	 }
	 // fetch All sent Email
	public function sent_mail($is_login_id)
	{
		$sql = "SELECT * FROM tbl_index  WHERE user_id= '$is_login_id' AND status = '0' GROUP BY msg_random_id ORDER BY create_at DESC ";
		$result = $this->connect_db->query($sql);
		return $result;
	}
	// count All sent_mail
	public function count_sent_mail($is_login_id)
	{
		//print_r($is_login_id);die;
		$sql = "SELECT count(*) FROM tbl_index  WHERE (user_id= '$is_login_id') AND (status = '0') GROUP BY user_id ";
		$result = $this->connect_db->query($sql);
		$count_sent_mail = $result->fetch_assoc();
		//print_r($count_sent_mail);die;
		return $count_sent_mail;
	}
	public function sent_view_messageById($view_msg_randomID)
	{
		//print_r($indexID);die;
		$sql = "SELECT tbl_index.*,tbl_users.name,tbl_users.image,tbl_users.email 
		FROM tbl_index INNER JOIN tbl_users ON tbl_users.user_id = tbl_index.user_id 
		WHERE (tbl_index.msg_random_id = '$view_msg_randomID') AND (tbl_index.cc_email = 1 OR tbl_index.cc_email = 0)";
		$result = $this->connect_db->query($sql);
		$response = $result->fetch_assoc();
		return $response;
	}
	public function Autosuggestion($Autosuggestion)
	{
		//$sql = "SELECT to_email FROM tbl_index WHERE to_email LIKE '$Autosuggestion%'";
		$sql = "SELECT * FROM tbl_index WHERE to_email LIKE '%".$Autosuggestion."%' ORDER BY to_email ASC";
		$result = $this->connect_db->query($sql);
	    //$response = $result->fetch_assoc();
		return $result;
		
	}
	public function DeleteMessage($IndexID)
	{
		//print_r($IndexID);die;
		$sql = "UPDATE tbl_index SET unread_email = '1' WHERE index_id = '$IndexID'";
		$result = $this->connect_db->query($sql);
	   // $response = $result->fetch_assoc();
		return $result;
	}
	public function trash_email($to_email)
	{
		//print_r($to_email);die;
		$sql = "SELECT * FROM tbl_index WHERE (to_email = '$to_email') AND (unread_email = '1' OR status = '1') ORDER BY create_at DESC";
		$result = $this->connect_db->query($sql);
		//$response = $result->fetch_assoc();
		//print_r($response);die;
		return $result;
	}
	public function DeleteMessageFromSent($indexID)
	{
			$sql = "UPDATE tbl_index SET status='1' WHERE index_id='$indexID'";
			$result = $this->connect_db->query($sql);
			return $result;
	}
	public function delete_email_forever($indexID)
	{
		//print_r($indexID);die;
		$sql = "DELETE FROM tbl_index WHERE index_id ='$indexID'";
		$result = $this->connect_db->query($sql);
		return $result;	
	}
	public function restoreEmail($indexID)
	{
		//print_r($indexID);die;
		$sql = "UPDATE tbl_index SET status = '0' ,unread_email = '2' WHERE index_id='$indexID'";
		$result = $this->connect_db->query($sql);
		return $result;
	}
	public function replyAllEmailSave($user_id,$from_email,$to_email,$cc_email,$subject,$message,$msg_random_id,$is_thread_id)
	{
		
		$sql = "INSERT INTO tbl_index (user_id,from_email,to_email,cc_email,subject,message,unread_email,msg_random_id,is_thread_id)
				VALUES('$user_id','$from_email','$to_email','$cc_email','$subject','$message','2','$msg_random_id','$is_thread_id')";
				
		$runQuery = $this->connect_db->query($sql);
		return $runQuery;
	}
	public function replyall_view_message($msg_random_id,$is_thread_id)
	{
		//print_r($msg_random_id);die;
		//print_r($to_email);
		$sql = "SELECT tbl_index.* ,tbl_users.email,tbl_users.name,tbl_users.image FROM tbl_index 
				LEFT JOIN tbl_users ON tbl_users.user_id = tbl_index.user_id
				WHERE is_thread_id = '$is_thread_id' GROUP BY msg_random_id ORDER by create_at DESC";
		/* $sql = "SELECT tbl_index.* ,tbl_users.email,tbl_users.name,tbl_users.image FROM tbl_index 
				LEFT JOIN tbl_users ON tbl_users.user_id = tbl_index.user_id
				WHERE is_thread_id = '$is_thread_id' AND cc_email IN('1','0') ORDER BY create_at DESC"; */	
				$result = $this->connect_db->query($sql);
				return $result;
	}
	public function replyEmailSave($user_id,$from_email,$to_email,$cc_email,$subject,$message,$msg_random_id,$is_thread_id)
	{
		$sql = "INSERT INTO tbl_index(user_id,from_email,to_email,cc_email,subject,message,unread_email,msg_random_id,is_thread_id)
				VALUES('$user_id','$from_email','$to_email','$cc_email','$subject','$message','2','$msg_random_id','$is_thread_id')";
		$runQuery = $this->connect_db->query($sql);
		return $runQuery;
	}
	public function reply_view_message($is_thread_id)
	{
		
		$sql = "SELECT tbl_index.* ,tbl_users.email,tbl_users.name,tbl_users.image FROM tbl_index 
				LEFT JOIN tbl_users ON tbl_users.user_id = tbl_index.user_id
				WHERE is_thread_id = '$is_thread_id' GROUP BY msg_random_id ORDER BY create_at DESC";
		/* $sql = "SELECT tbl_index.* ,tbl_users.email,tbl_users.name,tbl_users.image FROM tbl_index 
				LEFT JOIN tbl_users ON tbl_users.user_id = tbl_index.user_id
				WHERE is_thread_id = '$is_thread_id' AND cc_email = '0' ORDER BY create_at DESC "; */
				$result = $this->connect_db->query($sql);
				return $result;
	}
	
	public function search_term($search_val)
	{
		//$sql = "SELECT * FROM tbl_index WHERE MATCH(to_email) AGAINST('$search_val')";
		$sql = "SELECT * FROM tbl_index WHERE message LIKE '%$search_val%'";
		$result = $this->connect_db->query($sql);
		return $result;
	}
	
	public function timeAgo($time_ago)
	{
		date_default_timezone_set("Asia/Kolkata");
		//print_r($time_ago);
		$time_ago = strtotime($time_ago);
		//print_r($time_ago);
		$cur_time   = time();
		$time_elapsed   = $cur_time - $time_ago;
		//print_r($time_elapsed);
		$seconds    = $time_elapsed ;
		$minutes    = round($time_elapsed / 60 );
		$hours      = round($time_elapsed / 3600);
		$days       = round($time_elapsed / 86400 );
		$weeks      = round($time_elapsed / 604800);
		$months     = round($time_elapsed / 2600640 );
		$years      = round($time_elapsed / 31207680 );
		// Seconds
		if($seconds <= 60){
			return "just now";
		}
		//Minutes
		else if($minutes <=60){
			if($minutes==1){
				return "one minute ago";
			}
			else{
				return "$minutes minutes ago";
			}
		}
		//Hours
		else if($hours <=24){
			if($hours==1){
				return "an hour ago";
			}else{
				return "$hours hrs ago";
			}
		}
		//Days
		else if($days <= 7){
			if($days==1){
				return "yesterday";
			}else{
				return "$days days ago";
			}
		}
		//Weeks
		else if($weeks <= 4.3){
			if($weeks==1){
				return "a week ago";
			}else{
				return "$weeks weeks ago";
			}
		}
		//Months
		else if($months <=12){
			if($months==1){
				return "a month ago";
			}else{
				return "$months months ago";
			}
		}
		//Years
		else{
			if($years==1){
				return "one year ago";
			}else{
				return "$years years ago";
			}
		}
	}
	
	

}
?>