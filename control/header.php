<?php
if (!isset($_SESSION)){
	session_start();
}

##include "auth.php";
if (isset($_POST["login"]) AND isset($_POST["passwd"]) AND isset($_SESSION["login"]))
{
}
?>

<!DOCTYPE HTML>

<html>

<head>
	<title>Camagru</title>
	<link rel="stylesheet" type="text/css" href="style/body.css">
</head>

<body>
	<div class="banner">
		<a href="index.php">
			<img id="logo" src="/images/logo.png" alt="logo"><img>
		</a>