<?php
include("includes/config.php");
include("includes/classes/Artist.php");
include("includes/classes/albumclass.php");
include("includes/classes/Song.php");




 // session_destroy(); //logout when you want to log out manunally

if(isset($_SESSION['userloggedin'])){
	$userloggedin = $_SESSION['userloggedin'];
}
else
{
	header("Location: register.php");
}
?>




<!DOCTYPE html>
<html>
<head>
	<title>Welcome to spotify</title>
	<link type="text/css" rel="stylesheet" href="assests/css/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="assests/js/script.js"></script>
</head>
<body>

	<div id="maincontainer">

		<div id="topcontainer">
		
		<?php include("includes/navbarcontainer.php"); ?>

		<div id="mainviewcontainer">
			<div id="maincontent">