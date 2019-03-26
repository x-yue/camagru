<?php

include 'setup.php';

session_start();
if (!isset($_SESSION['username'])){  
    echo "<script>alert('You need to sign in first.')</script>";
    echo "<script>location.href = 'index.php';</script>";
} else {
    $session_user = $_SESSION["username"];
}

function error(){
    echo "<script>alert('Something went wrong, please try again.')</script>";
    echo "<script>location.href = '../feed.php';</script>";
	exit;
}

if (isset($_POST["click"])){

    $likeuser = $session_user;
    $input = $_POST["click"];
    if ($inpit = "Like"){
        $likenum = 1;
    } elseif ($input = "Unlike") {
        $likenum = 0;
    } else {
        error();
    }

    $imgname = $_POST["imgname"];
    $imguser = $_POST['imguser'];
    $createdate = $_POST["date"];
    $createtime = $_POST["time"];
    $imgtime = $createdate . ' ' . $createtime;

    $conn = db_connect();
    $sql = "SELECT * FROM likes WHERE imgname = ? AND imguser = ? AND imgtime = ? AND likeuser = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$imgname, $imguser, $imgtime, $likeuser]);
    $res = $stmt->fetch();
    $conn = null;
    if (!$res) {
        $input = $_POST["click"];
        if ($input == "Like"){
            $likenum = 1;
        } elseif ($input == "Unlike") {
            $likenum = 0;
        } else {
            error();
        }
        $conn = db_connect();
        $sql = "INSERT INTO likes (likeuser, likenum, imgname, imguser, imgtime) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$likeuser, $likenum, $imgname, $imguser, $imgtime]);
        $conn = null;
    } else {
        if ($input == "Like") {
            $likenum = 1;
        } elseif ($input == "Unlike"){
            $likenum = 0;
        } else {
            error();
        }
        $conn = db_connect();
        $sql = "UPDATE likes SET likenum = '$likenum' WHERE imgname = ? AND imguser = ? AND imgtime = ? AND likeuser = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$imgname, $imguser, $imgtime, $likeuser]);
        $conn = null;
    }
    if (isset($_POST["page"])){
        $pagenum = $_POST["page"];
    } else {
        $pagenum = 1;
    }   
    echo "<script>location.href='../feed.php?page=$pagenum';</script>";
}

?>