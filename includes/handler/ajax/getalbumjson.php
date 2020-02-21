<?php

include("../../config.php");

if(isset($_POST['albumid'])) {
	$albumid=$_POST['albumid'];

	$query = mysqli_query($con, "SELECT * FROM albums WHERE id='$albumid'");

	$resultarray=mysqli_fetch_array($query);

	echo json_encode($resultarray);
}


?>