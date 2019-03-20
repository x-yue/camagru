<?php
include "setup.php";

//user status : a = activated i = inactivated b = banned t = test

function error()
{
    echo "<script>alert('Creating Account: Something went wrong, please try again.')</script>";
    echo "<script>location.href = '../signup.php';</script>";
	exit;
}

function repeated_username(){
    echo "<script>alert('The account with this username already existed, please try something else')</script>";
    echo "<script>location.href = '../signup.php';</script>";
    exit;
}

function repeated_email(){
    echo "<script>alert('The account with this email address already existed, maybe try signing in?')</script>";
    echo "<script>location.href = '../signup.php';</script>";
    exit;
}

function passwordNoMatch(){
    echo "<script>alert('The passwords do not match, please try again')</script>";
    echo "<script>location.href = '../signup.php';</script>";
    exit;     
}

function passwordSecure(){
    echo "<script>alert('The password must contain at least 6 characters, please try again.');</script>";
    echo "<script>location.href = '../signup.php';</script>";
    exit;
}

function errorEmail()
{
    echo "<script>alert('Mailing Sytem: Something went wrong, please try again.')</script>";
    echo "<script>location.href = '../signup.php';</script>";
	exit;
}

function sendConfirmationEmail($username, $email){
    $subject = "Confirmation Email with Camagru";
    $message = '
    
    Hello '.$username.'
    Thank you for signing up with Camagru! Your account has been created.
    
    Please click the link below to activate your account:
    http://localhost:8300/camagru/config/confirmation.php?email='.$email.'&username='.$username.'&active=a
    
    ';
    
    $header = "From: noreply@camagru.com" . "\r\n";
    if (mail($email, $subject, $message, $header)){
        echo "<script>alert('A confirmation email is sent to ".$email.", please click the link inside to activate your account.')</script>";
    } else {
        errorEmail();
    }
}

function signedup($username, $email, $password){
    $status = "i";
    $conn = db_connect();
    $sql = "INSERT INTO loginsystem (username, email, passwd, active) VALUES ('$username', '$email', '$password', '$status')";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $conn = null;
    sendConfirmationEmail($username, $email);
    echo "<script>location.href = '../index.php';</script>";
    exit;
}

if ($_POST["submit"] == "Submit" && $_POST["username"] && $_POST["password"] && $_POST["email"] && $_POST["verifypw"])
{
    $username = $_POST["username"];
    $email = $_POST["email"];
    $raw_password = $_POST["password"];
 
    if ($raw_password != $_POST["verifypw"]) {
        passwordNoMatch();
    } else {
        // check if the length is more than 6
        if (strlen($raw_password) < 6) {
            passwordSecure();
        }
    }

    //check duplicate username
    $conn = db_connect();
    $sql_username = "SELECT * FROM loginsystem WHERE username = '$username'";
    $stmt = $conn->prepare($sql_username);
    $stmt->execute();
    $res = $stmt->fetch();
    $conn = null;
    if ($res){
        repeated_username();
    }

    //check duplicate email 
    $sql_email = "SELECT * FROM loginsystem WHERE email = '$email'";
    $conn = db_connect();
    $stmt = $conn->prepare($sql_email);
    $stmt->execute();
    $res = $stmt->fetch();
    $conn = null;
    if ($res){
        repeated_email();
    }
    $salt = "sherlock_";
    $password = hash("whirlpool", $salt.$raw_password);
    signedup($username, $email, $password);
} else {
    error();
}

?>