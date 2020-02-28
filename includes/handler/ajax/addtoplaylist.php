<?php
include("../../config.php");

if(isset($_POST['playlistid']) && isset($_POST['songid'])){
	$playlistid=$_POST['playlistid'];
	$songid=$_POST['songid'];
	$orderidquery=mysqli_query($con, "SELECT IFNULL(MAX(playlistOrder) + 1,1) as playlistOrder FROM playlistSongs WHERE playlistid='$playlistid'");

	$row = mysqli_fetch_array($orderidquery);
	$order=$row['playlistOrder'];

	$query=mysqli_query($con, "INSERT INTO playlistSongs VALUES(NULL,'$songid','$playlistid','$order')");
	

}
else{
	echo "playlistid or songid was not passed in addtoplaylist.php";
}
?>