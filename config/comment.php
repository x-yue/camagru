<?php

include 'setup.php';

session_start();
if (!isset($_SESSION['username'])){  
    echo "<script>alert('You need to sign in first.')</script>";
    echo "<script>location.href = 'index.php';</script>";
} else {
    $name = $_SESSION["username"];
}

function notificationEmails($imguser, $email){
    $subject = "You received a comment";
    $message = '
    
    Hello '.$imguser.'
    '.$name.' left a comment on your photo.

    Check it on Camagru with the link below:
    http://localhost:8300/camagru/index.php

    ';
    
    $header = "From: noreply@camagru.com" . "\r\n";
    if (mail($email, $subject, $message, $header)){
    } else {
        errorEmail();
    }
}

//comments need to be stored in three things
// [0] commentuser
// [1] commenttext 
// [2] commenttime

// date_default_timezone_set('europe/paris');
// $now = date("Y-m-d H:i:s");


// $conn = db_connect();


// $conn = null;

?>