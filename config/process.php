<?php

date_default_timezone_set('europe/paris');
include "setup.php";

session_start();
if (!isset($_SESSION['username'])){  
    echo "<script>alert('You need to sign in first.')</script>";
    echo "<script>location.href = 'index.php';</script>";
} else {
    $name = $_SESSION["username"];
}

function error(){
    echo "<script>alert('You need to capture a picture first.')</script>";
    echo "<script>location.href='../home.php'</script>";
	exit;
}

function savePhoto($imgname, $imguser, $imgtime){
    $conn = db_connect();
    $sql = "INSERT INTO imagelist (image_location, username, date_creation) VALUES (?, ?, ?)"; 
    $stmt = $conn->prepare($sql);
    $stmt->execute([$imgname, $imguser, $imgtime]);
    $conn = null;
}

if ($_POST["submit"] = "Save to Gallery and Share with the World" && $_POST["canvasData"]){
    $canvasdata = $_POST["canvasData"];
    if ($canvasdata == NULL){
        echo "<script>location.href='../home.php'</script>";

    }
    $canvasdata = str_replace('data:image/png;base64,', '', $canvasdata);
    $canvasdata = str_replace(' ', '+', $canvasdata);
    
    $gallery_dir = "../gallery/";
    if (!file_exists($gallery_dir)) {
        mkdir ($gallery_dir, 0777, true);
    }
   
    $imgname = md5(uniqid()).'.png';
    
    file_put_contents( $gallery_dir.$imgname, base64_decode($canvasdata));
    
    $img_location = "gallery/".$imgname;
    $now = date("Y-m-d H:i:s");
    savePhoto($img_location, $name, $now);
    echo "<script>location.href='../home.php'</script>";
} else {
    error();
}

?>