<?php

include "setup.php";

date_default_timezone_set('europe/paris');
$now = date("Y-m-d H:i:s");

$num = 1;

$conn = db_connect();
$sql = "INSERT INTO imagelist (image_location, username, date_creation) VALUES ('example_images/earth.gif', 'yuxu', '$now')";
$stmt = $conn->prepare($sql);
$stmt->execute();
$conn = null;
$num++;

$conn = db_connect();
$sql = "INSERT INTO imagelist (image_location, username, date_creation) VALUES ('example_images/$num.jpg', 'yuxu', '$now')";
$stmt = $conn->prepare($sql);
$stmt->execute();
$conn = null;
$num++;

$conn = db_connect();
$sql = "INSERT INTO imagelist (image_location, username, date_creation) VALUES ('example_images/$num.jpg', 'yuxu', '$now')";
$stmt = $conn->prepare($sql);
$stmt->execute();
$conn = null;
$num++;

$conn = db_connect();
$sql = "INSERT INTO imagelist (image_location, username, date_creation) VALUES ('example_images/$num.jpg', 'yuxu', '$now')";
$stmt = $conn->prepare($sql);
$stmt->execute();
$conn = null;
$num++;

$conn = db_connect();
$sql = "INSERT INTO imagelist (image_location, username, date_creation) VALUES ('example_images/$num.jpg', 'yuxu', '$now')";
$stmt = $conn->prepare($sql);
$stmt->execute();
$conn = null;
$num++;

$conn = db_connect();
$sql = "INSERT INTO imagelist (image_location, username, date_creation) VALUES ('example_images/$num.jpg', 'yuxu', '$now')";
$stmt = $conn->prepare($sql);
$stmt->execute();
$conn = null;
$num++;

echo "<script>alert('6 pictures added for tester');</script>";
echo "<script>location.href = '../feed.php';</script>";

?>