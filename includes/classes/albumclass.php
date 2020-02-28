<?php
class Albumclass{

	private $con;
	private $id;
	private $title;
	private $artworkpath;
	private $genre;
	private $artistid;

	public function __construct($con,$id){
		$this->con = $con;
		$this->id=$id;


			$query=mysqli_query($this->con, "SELECT * FROM albums WHERE id='$this->id'");

		$album=mysqli_fetch_array($query);

		$this->title=$album['title'];
		$this->artworkpath=$album['artworkpath'];
		$this->genre=$album['geners'];
		$this->artistid=$album['artist'];

	}

	public function gettitle(){
		return $this->title;

	} 
		public function getartworkpath(){
		return $this->artworkpath;
		
	} 
		public function getgenre(){
		return $this->genre;
		
	} 	
	public function getartist(){
		return new Artist($this->con, $this->artistid);
		
	} 

	public function getnumberofsongs(){
		$query=mysqli_query($this->con , "SELECT id FROM Songs WHERE album='$this->id'");
				return mysqli_num_rows($query);
	}

	public function getsongids(){
		$query=mysqli_query($this->con, "SELECT id FROM Songs where album='$this->id' ORDER BY albumorder ASC");

		$array=array();
		while($row=mysqli_fetch_array($query)){
			array_push($array, $row['id']);

		}
		return $array;
	} 

	public function getid(){
		return $this->id;
	}
	
}


?>