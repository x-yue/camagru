<?php

include "setup.php";

date_default_timezone_set('europe/paris');
$now = date("Y-m-d H:i:s");

$num = 1;

$conn = db_connect();
$sql = "INSERT INTO imagelist (image_location, username, date_creation, comment, likes) VALUES ('example_images/$num.jpg', 'Ana', '$now', null, 23)";
$stmt = $conn->prepare($sql);
$stmt->execute();
$conn = null;
$num++;

$conn = db_connect();
$sql = "INSERT INTO imagelist (image_location, username, date_creation, comment, likes) VALUES ('example_images/$num.jpg', 'Sophia', '$now', null, 2)";
$stmt = $conn->prepare($sql);
$stmt->execute();
$conn = null;
$num++;

$conn = db_connect();
$sql = "INSERT INTO imagelist (image_location, username, date_creation, comment, likes) VALUES ('example_images/$num.jpg', 'Charly', '$now', null, 15)";
$stmt = $conn->prepare($sql);
$stmt->execute();
$conn = null;
$num++;

$conn = db_connect();
$sql = "INSERT INTO imagelist (image_location, username, date_creation, comment, likes) VALUES ('example_images/$num.jpg', 'John', '$now', null, 0)";
$stmt = $conn->prepare($sql);
$stmt->execute();
$conn = null;
$num++;

$conn = db_connect();
$sql = "INSERT INTO imagelist (image_location, username, date_creation, comment, likes) VALUES ('example_images/$num.jpg', 'Brack Obama', '$now', null, 11)";
$stmt = $conn->prepare($sql);
$stmt->execute();
$conn = null;
$num++;

$conn = db_connect();
$sql = "INSERT INTO imagelist (image_location, username, date_creation, comment, likes) VALUES ('example_images/$num.jpg', 'Yolo', '$now', null, 999)";
$stmt = $conn->prepare($sql);
$stmt->execute();
$conn = null;
$num++;

$conn = db_connect();
$sql = "INSERT INTO imagelist (image_location, username, date_creation, comment, likes) VALUES ('example_images/$num.jpg', 'Bocal', '$now', null, 10)";
$stmt = $conn->prepare($sql);
$stmt->execute();
$conn = null;
$num++;

$conn = db_connect();
$sql = "INSERT INTO imagelist (image_location, username, date_creation, comment, likes) VALUES ('example_images/$num.jpg', 'Chrome', '$now', null, 3)";
$stmt = $conn->prepare($sql);
$stmt->execute();
$conn = null;
$num++;

$conn = db_connect();
$sql = "INSERT INTO imagelist (image_location, username, date_creation, comment, likes) VALUES ('example_images/$num.jpg', 'yuxu', '$now', null, 0)";
$stmt = $conn->prepare($sql);
$stmt->execute();
$conn = null;
$num++;

$conn = db_connect();
$sql = "INSERT INTO imagelist (image_location, username, date_creation, comment, likes) VALUES ('example_images/$num.jpg', 'Testtesttest', '$now', null, 0)";
$stmt = $conn->prepare($sql);
$stmt->execute();
$conn = null;
$num++;

$conn = db_connect();
$sql = "INSERT INTO imagelist (image_location, username, date_creation, comment, likes) VALUES ('example_images/$num.jpg', 'admin', '$now', null, 0)";
$stmt = $conn->prepare($sql);
$stmt->execute();
$conn = null;
$num++;

$conn = db_connect();
$sql = "INSERT INTO imagelist (image_location, username, date_creation, comment, likes) VALUES ('example_images/$num.jpg', 'root', '$now', null, 0)";
$stmt = $conn->prepare($sql);
$stmt->execute();
$conn = null;
$num++;

$conn = db_connect();
$sql = "INSERT INTO imagelist (image_location, username, date_creation, comment, likes) VALUES ('example_images/$num.jpg', 'Sophia', '$now', null, 0)";
$stmt = $conn->prepare($sql);
$stmt->execute();
$conn = null;
$num++;

$conn = db_connect();
$sql = "INSERT INTO imagelist (image_location, username, date_creation, comment, likes) VALUES ('example_images/$num.jpg', 'Sophia', '$now', null, 0)";
$stmt = $conn->prepare($sql);
$stmt->execute();
$conn = null;
$num++;

$conn = db_connect();
$sql = "INSERT INTO imagelist (image_location, username, date_creation, comment, likes) VALUES ('example_images/$num.jpg', 'Sophia', '$now', null, 0)";
$stmt = $conn->prepare($sql);
$stmt->execute();
$conn = null;
$num++;

$conn = db_connect();
$sql = "INSERT INTO imagelist (image_location, username, date_creation, comment, likes) VALUES ('example_images/$num.jpg', 'Sophia', '$now', null, 0)";
$stmt = $conn->prepare($sql);
$stmt->execute();
$conn = null;
$num++;

$conn = db_connect();
$sql = "INSERT INTO imagelist (image_location, username, date_creation, comment, likes) VALUES ('example_images/$num.jpg', 'Sophia', '$now', null, 0)";
$stmt = $conn->prepare($sql);
$stmt->execute();
$conn = null;
$num++;

$conn = db_connect();
$sql = "INSERT INTO imagelist (image_location, username, date_creation, comment, likes) VALUES ('example_images/$num.jpg', 'Sophia', '$now', null, 0)";
$stmt = $conn->prepare($sql);
$stmt->execute();
$conn = null;
$num++;

$conn = db_connect();
$sql = "INSERT INTO imagelist (image_location, username, date_creation, comment, likes) VALUES ('example_images/$num.jpg', '21314', '$now', null, 0)";
$stmt = $conn->prepare($sql);
$stmt->execute();
$conn = null;
$num++;

$conn = db_connect();
$sql = "INSERT INTO imagelist (image_location, username, date_creation, comment, likes) VALUES ('example_images/$num.jpg', 'fffff', '$now', null, 0)";
$stmt = $conn->prepare($sql);
$stmt->execute();
$conn = null;
$num++;

$conn = db_connect();
$sql = "INSERT INTO imagelist (image_location, username, date_creation, comment, likes) VALUES ('example_images/$num.jpg', 'fadsfsdf', '$now', null, 0)";
$stmt = $conn->prepare($sql);
$stmt->execute();
$conn = null;
$num++;

$conn = db_connect();
$sql = "INSERT INTO imagelist (image_location, username, date_creation, comment, likes) VALUES ('example_images/$num.jpg', 'YOOOOO', '$now', null, 13)";
$stmt = $conn->prepare($sql);
$stmt->execute();
$conn = null;
$num++;

$conn = db_connect();
$sql = "INSERT INTO imagelist (image_location, username, date_creation, comment, likes) VALUES ('example_images/$num.jpg', 'Netflix', '$now', null, 32)";
$stmt = $conn->prepare($sql);
$stmt->execute();
$conn = null;
$num++;

$conn = db_connect();
$sql = "INSERT INTO imagelist (image_location, username, date_creation, comment, likes) VALUES ('example_images/$num.jpg', 'Nicole', '$now', null, 12222)";
$stmt = $conn->prepare($sql);
$stmt->execute();
$conn = null;
$num++;

echo "<script>alert('25 pictures added for test');</script>";
echo "<script>location.href = '../feed.php';</script>";

?>