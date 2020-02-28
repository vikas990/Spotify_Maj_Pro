<?php
include("../../config.php");

if( isset($_POST['playlistid']) && isset($_POST['songid']) ) {
	$playlistid = $_POST['playlistid'];
	$songid = $_POST['songid'];
		

	$query= mysqli_query($con, "DELETE  FROM playlistSongs WHERE playlistid='$playlistid' AND songid='$songid' ");
}

else{
	echo "playlistid and songid cannot be passed in removefromplaylist.php";
}


?>