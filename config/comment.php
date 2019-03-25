<?php

date_default_timezone_set('europe/paris');
include 'setup.php';

session_start();
if (!isset($_SESSION['username'])){  
    echo "<script>alert('You need to sign in first.')</script>";
    echo "<script>location.href = 'index.php';</script>";
} else {
    $session_name = $_SESSION["username"];
}

function errorEmail()
{
    echo "<script>alert('Mailing Sytem: Something went wrong, please try again.')</script>";
    echo "<script>location.href = '../feed.php';</script>";
	exit;
}

function notificationEmails($imguser, $imgemail){
    $subject = "You received a comment";
    $message = '
    
    Hello '.$imguser.'
    Someone left a comment on your photo.

    Check it on Camagru with the link below:
    http://localhost:8300/camagru/index.php

    ';
    
    $header = "From: noreply@camagru.com" . "\r\n";
    if (mail($imgemail, $subject, $message, $header)){
    } else {
        errorEmail();
    }
}

if (isset($_POST["submitcomment"]) && $_POST["commentaire"]){

    $commenttext = $_POST["commentaire"];
    $commentuser = $session_name;
    $commenttime = date("Y-m-d H:i:s");
    
    $createdate = $_POST["date"];
    $createtime = $_POST["time"];
    $imgtime = $createdate . ' ' . $createtime;
    $imgname = $_POST["imgname"];
    $imguser = $_POST['imguser'];

    $conn = db_connect();
    $sql = "INSERT INTO comments (commenttext, commentuser, commenttime, imgname, imguser, imgtime) VALUES ('$commenttext', '$commentuser', '$commenttime', '$imgname', '$imguser', '$imgtime')";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $conn = null;
    
    $conn = db_connect();
    $sql = "SELECT email_notification FROM loginsystem WHERE username = '$imguser'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $res = $stmt->fetch();
    $conn = null;
    $email_notif = $res[0];

    if ($email_notif == 1){
        $conn = db_connect();
        $sql = "SELECT email FROM loginsystem WHERE username = '$imguser'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $res = $stmt->fetch();
        $conn = null;
        $imgemail = $res[0];
        notificationEmails($imguser, $imgemail);
    } 
    echo "<script>location.href='../feed.php';</script>";
}

?>