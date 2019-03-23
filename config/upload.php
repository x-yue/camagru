<?php
include 'setup.php';

session_start();
if (!isset($_SESSION['username'])){  
    echo "<script>alert('You need to sign in first.')</script>";
    echo "<script>location.href = '../index.php';</script>";
} else {
    $name = $_SESSION["username"];
}

$target_dir = "../uploads/";
if (!file_exists($target_dir)) {
    mkdir ($target_dir, 0777, true);
}

$target_file = $target_dir . basename($_FILES["userfile"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

if($_POST["submit"] == "Upload Image") {
    if(($check = getimagesize($_FILES["userfile"]["tmp_name"])) !== false) {
        $uploadOk = 1;
    } else {
        $uploadOk = 0;
    }
}

if ($_FILES["userfile"]["size"] > 10000000) {
    $uploadOk = 0;
}

if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
    $uploadOk = 0;
}

function uploadToDb($name, $filename) {
    $conn = db_connect();
    $search = "SELECT * FROM upload WHERE username = '$name'";
    $stmt = $conn->prepare($search);
    $stmt->execute();
    $res = $stmt->fetch();
    $conn = null;
    if (!$res){ 
        $sql = "INSERT INTO upload (username, uploadimg) VALUES ('$name', '$filename')";
    } else {
        $sql = "UPDATE upload SET uploadimg = '$filename'";
    }
    $conn = db_connect();
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $conn = null;
}

// changed so it will only give one alert message when $uploadOk ==0
if ($uploadOk == 0) {
    echo "<script>alert('Sorry, your file was not uploaded, it could be caused by the size of file, or tyle of picture, or it is simply not an image, please try again')</script>";
} else {
    if (move_uploaded_file($_FILES["userfile"]["tmp_name"], $target_file)) {
        uploadToDb($name, 'uploads/'.$_FILES["userfile"]["name"]);
        echo "<script>alert('Image uploaded successfully')</script>";
        echo "<script>location.href = '../home.php';</script>";
    } else {
        echo "<script>alert('Sorry, there was an error uploading your file, please try again')</script>";
    }
}

?>