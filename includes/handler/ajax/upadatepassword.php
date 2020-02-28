<?php
include("../../config.php");

if(!isset($_POST['username'])) {
	echo "ERROR: Could not set username";
	exit();
}

if(!isset($_POST['oldpassword']) || !isset($_POST['newpassword1'])  || !isset($_POST['newpassword2'])) {
	echo "Not all passwords have been set";
	exit();
}

if($_POST['oldpassword'] == "" || $_POST['newpassword1'] == ""  || $_POST['newpassword2'] == "") {
	echo "Please fill in all fields";
	exit();
}

$username = $_POST['username'];
$oldpassword = $_POST['oldpassword'];
$newpassword1 = $_POST['newpassword1'];
$newpassword2 = $_POST['newpassword2'];

$oldMd5 = md5($oldpassword);

$passwordCheck = mysqli_query($con, "SELECT * FROM users WHERE username='$username' AND password='$oldMd5'");
if(mysqli_num_rows($passwordCheck) != 1) {
	echo "Password is incorrect";
	exit();
}

if($newpassword1 != $newpassword2) {
	echo "Your new passwords do not match";
	exit();
}

if(preg_match('/[^A-Za-z0-9]/', $newpassword1)) {
	echo "Your password must only contain letters and/or numbers";
	exit();
}

if(strlen($newpassword1) > 30 || strlen($newpassword1) < 5) {
	echo "Your username must be between 5 and 30 characters";
	exit();
}

$newMd5 = md5($newpassword1);

$query = mysqli_query($con, "UPDATE users SET password='$newMd5' WHERE username='$username'");
echo "Update successful";

?>