<?php
class Artist{

	private $con;
	private $id;

	public function __construct($con,$id){
		$this->con = $con;
		$this->id=$id;

	}

	public function getname(){

		$artistquery=mysqli_query($this->con, "SELECT * FROM artist WHERE id='$this->id'");

		$artist=mysqli_fetch_array($artistquery);
		return $artist['name'];
	}
}


?>