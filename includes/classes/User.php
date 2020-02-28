<?php
class User{

	private $con;
	private $username;

	

	public function __construct($con,$username){
		$this->con = $con;
		$this->username=$username;
		

	}

	public function getusername(){
		return $this->username;
	}

	public function getemail(){
		$query = mysqli_query($this->con, "SELECT email FROM users WHERE username='$this->username'");

		$row = mysqli_fetch_array($query);
		return $row['email'];
	}


	public function getfirstandlastname(){
$query = mysqli_query($this->con, "SELECT concat(firstname,' ',lastname) as name FROM 	users WHERE username='$this->username'");

		$row = mysqli_fetch_array($query);
		return $row['name'];
	}
	
}


?>