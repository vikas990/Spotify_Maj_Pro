<?php
include("includes/includedfile.php");
?>

<div class="userdetails">
	
	<div class="container  borderbottom">
		<h2>E-mail</h2>
		<input type="text" name="email" class="email" placeholder="Email address...." value="<?php echo $userloggedin->getemail();?>">
		<span class="message"></span>
		<button class="buttons" onclick="updateemail('email')">SAVE</button>
	</div>
		
		<div class="container">
			<h2>Password</h2>
			<input type="Password" name="oldpassword" class="oldpassword" placeholder="Current Password" >
			<input type="Password" name="newpassword1" class="newpassword1" placeholder="New Password" >
			<input type="Password" name="newpassword2" class="newpassword2" placeholder="Confirm Password" >
		<span class="message"></span>
		<button class="buttons" onclick="updatepassword('oldpassword', 'newpassword1', 'newpassword2')">SAVE</button>

		</div>

</div>

