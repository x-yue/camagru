<?php

include "../config/setup.php";

date_default_timezone_set('europe/paris');
$now = date("Y-m-d H:i:s");

$num = 1;


$conn = db_connect();
$sql = "INSERT INTO imagelist (image_location, username, date_creation) VALUES ('example_images/$num.jpg', 'Ana', '$now')";
$stmt = $conn->prepare($sql);
$stmt->execute();
$conn = null;
$num++;

$conn = db_connect();
$sql = "INSERT INTO imagelist (image_location, username, date_creation) VALUES ('example_images/$num.jpg', 'Sophia', '$now')";
$stmt = $conn->prepare($sql);
$stmt->execute();
$conn = null;
$num++;

$conn = db_connect();
$sql = "INSERT INTO imagelist (image_location, username, date_creation) VALUES ('example_images/$num.jpg', 'Charly', '$now')";
$stmt = $conn->prepare($sql);
$stmt->execute();
$conn = null;
$num++;

$conn = db_connect();
$sql = "INSERT INTO imagelist (image_location, username, date_creation) VALUES ('example_images/$num.jpg', 'John', '$now')";
$stmt = $conn->prepare($sql);
$stmt->execute();
$conn = null;
$num++;

$conn = db_connect();
$sql = "INSERT INTO imagelist (image_location, username, date_creation) VALUES ('example_images/$num.jpg', 'Brack Obama', '$now')";
$stmt = $conn->prepare($sql);
$stmt->execute();
$conn = null;
$num++;

$conn = db_connect();
$sql = "INSERT INTO imagelist (image_location, username, date_creation) VALUES ('example_images/$num.jpg', 'Yolo', '$now')";
$stmt = $conn->prepare($sql);
$stmt->execute();
$conn = null;
$num++;

$conn = db_connect();
$sql = "INSERT INTO imagelist (image_location, username, date_creation) VALUES ('example_images/$num.jpg', 'Bocal', '$now')";
$stmt = $conn->prepare($sql);
$stmt->execute();
$conn = null;
$num++;

$conn = db_connect();
$sql = "INSERT INTO imagelist (image_location, username, date_creation) VALUES ('example_images/$num.jpg', 'Chrome', '$now')";
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
$sql = "INSERT INTO imagelist (image_location, username, date_creation) VALUES ('example_images/$num.jpg', 'Testtesttest', '$now')";
$stmt = $conn->prepare($sql);
$stmt->execute();
$conn = null;
$num++;

$conn = db_connect();
$sql = "INSERT INTO imagelist (image_location, username, date_creation) VALUES ('example_images/$num.jpg', 'admin', '$now')";
$stmt = $conn->prepare($sql);
$stmt->execute();
$conn = null;
$num++;

$conn = db_connect();
$sql = "INSERT INTO imagelist (image_location, username, date_creation) VALUES ('example_images/$num.jpg', 'root', '$now')";
$stmt = $conn->prepare($sql);
$stmt->execute();
$conn = null;
$num++;

$conn = db_connect();
$sql = "INSERT INTO imagelist (image_location, username, date_creation) VALUES ('example_images/$num.jpg', 'Sophia', '$now')";
$stmt = $conn->prepare($sql);
$stmt->execute();
$conn = null;
$num++;

$conn = db_connect();
$sql = "INSERT INTO imagelist (image_location, username, date_creation) VALUES ('example_images/$num.jpg', 'Sophia', '$now')";
$stmt = $conn->prepare($sql);
$stmt->execute();
$conn = null;

$conn = db_connect();
$sql = "INSERT INTO imagelist (image_location, username, date_creation) VALUES ('example_images/$num.jpg', 'Sophia', '$now')";
$stmt = $conn->prepare($sql);
$stmt->execute();
$conn = null;

$conn = db_connect();
$sql = "INSERT INTO imagelist (image_location, username, date_creation) VALUES ('example_images/$num.jpg', 'Sophia', '$now')";
$stmt = $conn->prepare($sql);
$stmt->execute();
$conn = null;
$num++;

$conn = db_connect();
$sql = "INSERT INTO imagelist (image_location, username, date_creation) VALUES ('example_images/$num.jpg', 'Sophia', '$now')";
$stmt = $conn->prepare($sql);
$stmt->execute();
$conn = null;

$conn = db_connect();
$sql = "INSERT INTO imagelist (image_location, username, date_creation) VALUES ('example_images/$num.jpg', 'Sophia', '$now')";
$stmt = $conn->prepare($sql);
$stmt->execute();
$conn = null;
$num++;

$conn = db_connect();
$sql = "INSERT INTO imagelist (image_location, username, date_creation) VALUES ('example_images/$num.jpg', '21314', '$now')";
$stmt = $conn->prepare($sql);
$stmt->execute();
$conn = null;
$num++;

$conn = db_connect();
$sql = "INSERT INTO imagelist (image_location, username, date_creation) VALUES ('example_images/$num.jpg', 'fffff', '$now')";
$stmt = $conn->prepare($sql);
$stmt->execute();
$conn = null;
$num++;

$conn = db_connect();
$sql = "INSERT INTO imagelist (image_location, username, date_creation) VALUES ('example_images/$num.jpg', 'fadsfsdf', '$now')";
$stmt = $conn->prepare($sql);
$stmt->execute();
$conn = null;
$num++;

$conn = db_connect();
$sql = "INSERT INTO imagelist (image_location, username, date_creation) VALUES ('example_images/$num.jpg', 'YOOOOO', '$now')";
$stmt = $conn->prepare($sql);
$stmt->execute();
$conn = null;
$num++;

$conn = db_connect();
$sql = "INSERT INTO imagelist (image_location, username, date_creation) VALUES ('example_images/$num.jpg', 'Netflix', '$now')";
$stmt = $conn->prepare($sql);
$stmt->execute();
$conn = null;
$num++;

$conn = db_connect();
$sql = "INSERT INTO imagelist (image_location, username, date_creation) VALUES ('example_images/$num.jpg', 'Nicole', '$now')";
$stmt = $conn->prepare($sql);
$stmt->execute();
$conn = null;
$num++;

echo "<script>alert('25 pictures added for test');</script>";
echo "<script>location.href = '../feed.php';</script>";

?>