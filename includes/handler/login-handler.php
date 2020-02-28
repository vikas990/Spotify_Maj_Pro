<?php
if(isset($_POST['logibutton'])){
	//login button

	$username = $_POST['loginusername'];
	$password = $_POST['loginpassword'];

	$result = $account->login($username, $password);

	if($result == true){
		$_SESSION['userloggedin'] = $username;
				header("Location: index.php");




}	
}
?>