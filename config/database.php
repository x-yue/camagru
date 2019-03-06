<?php
//this file is to create a database 
$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "loginsystem";

$connect =  mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

if (mysqli_connect_errno())
{
    echo "Failed to connected to MySQL: " . mysqli_connect_errno();
    exit;
}

?>