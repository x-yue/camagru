<?php 

include '../config/setup.php';

$salt = "sherlock_";
$passwd = hash("whirlpool", $salt."111111");

$conn = db_connect();
$sql = "INSERT INTO loginsystem (username, email, passwd, active) VALUES ('admin', 'example@example.com', '$passwd', 'a')";
$stmt = $conn->prepare($sql);
$stmt->execute();
$conn = null;

$conn = db_connect();
$sql = "INSERT INTO loginsystem (username, email, passwd, active) VALUES ('tester', 'testeryuxu@gmail.com', '$passwd', 'a')";
$stmt = $conn->prepare($sql);
$stmt->execute();
$conn = null;

$conn = db_connect();
$sql = "INSERT INTO loginsystem (username, email, passwd, active) VALUES ('banned', 'example@example.com', '$passwd', 'b')";
$stmt = $conn->prepare($sql);
$stmt->execute();
$conn = null;

$conn = db_connect();
$sql = "INSERT INTO loginsystem (username, email, passwd, active) VALUES ('inactive', 'example@example.com', '$passwd', 'i')";
$stmt = $conn->prepare($sql);
$stmt->execute();
$conn = null;

echo "<script>alert('4 test users added for the correction : test1 test2 and banned user');</script>";
echo "<script>location.href = '../index.php';</script>";

?>