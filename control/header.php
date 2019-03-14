<?php
require "config/setup.php";

/*
if ($_POST['submit'] == 'Sign In')
{
	$_SESSION['username'] = $_POST['username'];
	$_SESSION['password'] = $_POST['password'];
}

if ( ! empty( $_POST ) ) {
    if ( isset( $_POST['username'] ) && isset( $_POST['password'] ) ) {
        // Getting submitted user data from database
        $con = new mysqli($db_host, $db_user, $db_pass, $db_name);
        $stmt = $con->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->bind_param('s', $_POST['username']);
        $stmt->execute();
        $result = $stmt->get_result();
    	$user = $result->fetch_object();
    		
    	// Verify user password and set $_SESSION
    	if ( password_verify( $_POST['password'], $user->password ) ) {
    		$_SESSION['user_id'] = $user->ID;
    	}
    }
}
*/ 
?>

<!DOCTYPE HTML>

<html>

<head>
	<meta charset="UTF-8">
	<title id="title"></title>
	<link rel="stylesheet" type="text/css" href="style/body.css">
</head>

<body>
	<div class="banner">
		<img id="logo" src="/camagru/images/logo.png">