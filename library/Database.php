<?php
class Databse{

	protected $db_name = 'electronic_store';
	protected $db_user = 'root';
	protected $db_pass = '';
	protected $db_host = 'localhost';
	public $connect_db;
	// Open a connect to the database.
	// Make sure this is called on every page that needs to use the database.

	public  function __construct() {
		$this->connect_db = new mysqli( $this->db_host, $this->db_user, $this->db_pass, $this->db_name );

		if ( mysqli_connect_errno() ) {
			printf("Connection failed: %s\
", mysqli_connect_error());
			exit();
		}

		//echo "connectqwertfgh";
		return $this->connect_db;

}
}



?>
