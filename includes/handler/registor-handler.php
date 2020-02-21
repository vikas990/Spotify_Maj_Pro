<?php
function sanitizepasswordform($inputText){
	$inputText=strip_tags($inputText);
	return $inputText;
}

function snaitizeformusername($inputText){
	$inputText=strip_tags($inputText);
	$inputText=str_replace(" ", "", $inputText);
	return $inputText;
}

function sanitizeformstring($inputText){
	$inputText=strip_tags($inputText);
	$inputText=str_replace(" ", "", $inputText);
	$inputText=ucfirst(strtolower($inputText));
	return $inputText;
}




if(isset($_POST['registorbutton'])){
	//registration button
	$username=snaitizeformusername($_POST['username']);
	$firstname=sanitizeformstring($_POST['firstname']);
	$lastname=sanitizeformstring($_POST['lastname']);
	$email=sanitizeformstring($_POST['email']);
	$email2=sanitizeformstring($_POST['email2']);
	$password=sanitizeformstring($_POST['password']);
	$password2=sanitizeformstring($_POST['password2']);


	$wasSuccssful = $account->register($username, $firstname, $lastname, $email, $email2, $password, $password2);

	if($wasSuccssful == true){
		$_SESSION['userloggedin'] = $username;
		header("Location: index.php");
	}
	
}

?>