<?php
class Artist{

	private $con;
	private $id;

	public function __construct($con,$id){
		$this->con = $con;
		$this->id=$id;

	}

	public function getid(){
		return $this->id;
	}

	public function getname(){

		$artistquery=mysqli_query($this->con, "SELECT * FROM artist WHERE id='$this->id'");

		$artist=mysqli_fetch_array($artistquery);
		return $artist['name'];
	}



	public function getsongids(){
		$query=mysqli_query($this->con, "SELECT id FROM Songs where artist='$this->id' ORDER BY plays DESC");

		$array=array();
		while($row=mysqli_fetch_array($query)){
			array_push($array, $row['id']);

		}
		return $array;
	}
}


?>