<?php 
include("includes/includedfile.php");
?>

<div class="entityinfo">
	
	<div class="centersection">
		<div class="userinfo">
			<h1><?php echo $userloggedin->getfirstandlastname();?></h1>
		</div>

		<div class="buttonitems">
			<button class="button" onclick="openpage('updatedetails.php')">USER DETAILS</button>
			<button class="button" onclick="logout()">LOGOUT</button>
			

		</div>

	</div>

</div>