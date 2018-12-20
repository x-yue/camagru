<?php
if(!isset($_SESSION))
{
	session_start();
}
include "auth.php";
if (isset($_POST["login"]) AND isset($_POST["passwd"]) AND isset($_SESSION["login"]))
{
}
?>
