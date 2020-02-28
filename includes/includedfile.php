<?php

if(isset($_SERVER['HTTP_X_REQUESTED_WITH'])){
	include("includes/config.php");
	include("includes/classes/User.php");
	include("includes/classes/Artist.php");
	include("includes/classes/albumclass.php");
	include("includes/classes/Song.php");
	include("includes/classes/Playlist.php");




	if(isset($_GET['userloggedin'])){
		$userloggedin= new User($con, $_GET['userloggedin']);
	}
	else{
		echo "user name variable was not passed in. Check openpage JS function.";
		exit();
	}
	

}
else{
	include("includes/header.php");

	include("includes/footer.php");		

	$url=$_SERVER['REQUEST_URI'];
	echo"<script>openpage('$url')</script>";
	exit();
}



?>
