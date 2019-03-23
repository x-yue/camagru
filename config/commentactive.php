<?php

include 'setup.php';

session_start();
if (!isset($_SESSION['username'])){  
    echo "<script>alert('You need to sign in first.')</script>";
    echo "<script>location.href = 'index.php';</script>";
} else {
    $name = $_SESSION["username"];
}

function error()
{
    echo "<script>alert('Something went wrong, please try again.')</script>";
    echo "<script>location.href = '../account.php';</script>";
	exit;
}

if (isset($_POST["deactive"])){
    $input = $_POST["deactive"];
    echo $input;
    if ($input = 'Deactivate Email Notifications'){
        $conn = db_connect();
        $sql = "UPDATE loginsystem SET email_notification = '0' WHERE username = '$name'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $conn = null;
        echo "<script>location.href = '../account.php';</script>";  
    } else {
        error();
    }
} elseif (isset($_POST["active"])){
    $input = $_POST["active"];
    echo $input;
    if ($input = 'Reactivate Email Notifications'){
        $conn = db_connect();
        $sql = "UPDATE loginsystem SET email_notification = '1' WHERE username = '$name'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $conn = null;
        echo "<script>location.href = '../account.php';</script>";  
    } else {
        error();
    }
} else {
    error();
}

?>