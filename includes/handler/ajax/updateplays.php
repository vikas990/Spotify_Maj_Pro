<?php

include("../../config.php");

if(isset($_POST['songid'])) {
	$songid=$_POST['songid'];

	$query = mysqli_query($con, "UPDATE Songs SET plays = plays + 1 WHERE id='$songid'");

	
}


?>