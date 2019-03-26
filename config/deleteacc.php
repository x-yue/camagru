<?php
include "setup.php";

session_start();
if (!isset($_SESSION['username'])){  
    echo "<script>alert('You need to sign in first.')</script>";
    echo "<script>location.href = 'index.php';</script>";
} else {
    $name = $_SESSION["username"];
}

function error(){
    echo "<script>alert('Something went wrong, please try again.')</script>";
    echo "<script>location.href='../account.php';</script>";
	exit; 
}

function notMatch(){
    echo "<script>alert('Incorrect password, please try again');</script>";
    echo "<script>location.href='../account.php';</script>";
    exit;
}

function errorEmail()
{
    echo "<script>alert('Mailing Sytem: Something went wrong, please try again.')</script>";
    echo "<script>location.href = '../account.php';</script>";
	exit;
}

function emailDeletion($username, $email){
    $subject = "Deletion your account with Camagru";
    $message = '

    Hello '.$username.'
    We are sad to see you go, but we respect your choice.

    Please click the link below to confirm the deletion of your account:
    http://localhost:8300/camagru/config/deletesuccess.php?email='.$email.'&username='.$username.'&active=d
    
    ';
    
    $header = "From: noreply@camagru.com" . "\r\n";
    if (mail($email, $subject, $message, $header)){
        echo "<script>alert('We are sad to see you go, but we have sent you an email to confirm the deletion of your account, meanwhile, you are remaining signed in.');</script>";
    } else {
        errorEmail();
    }    
    
}

if ($_POST["submit"] == 'Send an email for confirmation' && $_POST["password"]){

    //find email attached to this account
    $conn = db_connect();
    $sql = "SELECT email FROM loginsystem WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$name]);
    $res = $stmt->fetch();
    $conn = null;
    
    $email = $res[0];    
    $raw_password = $_POST["password"];
    $salt = "sherlock_";

    $conn = db_connect();
    $sql = "SELECT passwd FROM loginsystem WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$name]);
    $res = $stmt->fetch();
    $conn = null;
    //verify if the password is correct
    $password = hash("whirlpool", $salt.$raw_password);
    if ($res[0] == $password){
        emailDeletion($name, $email);
        echo "<script>location.href='../account.php';</script>";
        exit;
    } else {
        notMatch();
    }
} else {
    error();
}

?>