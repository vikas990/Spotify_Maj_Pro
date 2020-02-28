<?php
class Song{

	private $con;
	private $id;
	private $mysqlidata;
	private $title;
	private $artistid;
	private $albumid;
	private $genre;
	private $duration;
	private $path;

	public function __construct($con,$id){
		$this->con = $con;
		$this->id=$id;


			$query=mysqli_query($this->con, "SELECT * FROM Songs WHERE id='$this->id'");

		$this->mysqlidata=mysqli_fetch_array($query);
		$this->title=$this->mysqlidata['title'];
		$this->artistid=$this->mysqlidata['artist'];
		$this->albumid=$this->mysqlidata['album'];
		$this->genre=$this->mysqlidata['genre'];
		$this->duration=$this->mysqlidata['duration'];
		$this->path=$this->mysqlidata['path'];
		
		
	}

	public function gettitle(){
		return $this->title;
	}
	
	public function getid(){
		return $this->id;
	}

	public function getartist(){
		return new Artist($this->con, $this->artistid);
	}


	public function getalbum(){
		return new album($this->con, $this->albumid);
	}
	


	public function getgenre(){
		return $this->genre;
	}


	public function getduration(){
		return $this->duration;
	}


	public function getpath(){
		return $this->path;
	}

	public function getmysqlidata(){
		return $this->mysqlidata;
	}



	
}


?>