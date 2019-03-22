<?php 

include "setup.php";

session_start();
if (!isset($_SESSION['username'])){  
    echo "<script>alert('You need to sign in first.')</script>";
    echo "<script>location.href = 'index.php';</script>";
} else {
    $name = $_SESSION["username"];
}

$creation_time = $_POST["time"];
$imgloc = $_POST["imgloc"];

$conn = db_connect();
$sql_time = "DELETE FROM imagelist WHERE username = '$name' AND image_location = '$imgloc' AND date_creation = '$creation_time'";
$stmt = $conn->prepare($sql);
$stmt->execute();
$conn = null;

?>