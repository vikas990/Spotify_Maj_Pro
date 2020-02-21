<?php

include("../../config.php");

if(isset($_POST['songid'])){
	$songid=$_POST['songid'];

	$query=mysqli_query($con, "SELECT * FROM Songs WHERE id='$songid'");

	$resultarray=mysqli_fetch_array($query);

	echo json_encode($resultarray);
}


?>