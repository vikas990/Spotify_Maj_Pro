<?php

include("../../config.php");

if(isset($_POST['artistid'])) {
	$artistid=$_POST['artistid'];

	$query = mysqli_query($con, "SELECT * FROM artist WHERE id='$artistid'");

	$resultarray=mysqli_fetch_array($query);

	echo json_encode($resultarray);
}


?>