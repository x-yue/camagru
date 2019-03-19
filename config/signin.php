<?php
include "setup.php";

function error()
{
    echo "<script>alert('Signing in: Something went wrong, please try again.')</script>";
    echo "<script>location.href='../index.php';</script>";
	exit; 
}

function nonexist(){
    echo "<script>alert('No account associate with this username exists, please try again or sign up.')</script>";
    echo "<script>location.href='../signup.php';</script>";
	exit;
}

function wrongpw(){
    echo "<script>alert('The username and password do not match, try again or click forget my password.')</script>";
    echo "<script>location.href='../index.php';</script>";
	exit;
}

function inactiveNotice(){
    echo "<script>alert('It seems you have not activated your account, have a look at your mailbox, we have sent you a confirmation email.')</script>";
    echo "<script>location.href = '../index.php';</script>";
    exit;
}

function bannedNotice(){
    echo "<script>alert('Hello, your account has been banned from this website, please contact us if you have questions.')</script>";
    echo "<script>location.href = '../index.php';</script>";
    exit;
}

function signedIn($username){
    session_start();
    $_SESSION["username"] = $username;
    echo "<script>alert('Welcome Back, $username')</script>";
    echo "<script>location.href = '../feed.php';</script>";
    exit;
}

if ($_POST['submit'] == 'Sign in' && $_POST["username"] && $_POST["password"]) {
    $username = $_POST["username"];
    $raw_password = $_POST["password"];

    //check if the username is in the databse 
    $sql = "SELECT * FROM loginsystem WHERE username = '$username'";
    $conn = db_connect();
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $res = $stmt->fetch();
    $conn = null;
    if ($res){ 
        $salt = "sherlock_";
        $password = hash("whirlpool", $salt.$raw_password);

        //check if the password is correct
        $conn = db_connect();
        $sql_verifypw = "SELECT passwd FROM loginsystem WHERE username = '$username'";
        $stmt = $conn->prepare($sql_verifypw);
        $stmt->execute();
        $res = $stmt->fetch();
        if ($password == $res[0]) {
            $conn = db_connect();
            $sql_status = "SELECT active FROM loginsystem WHERE username = '$username'";
            $stmt = $conn->prepare($sql_status);
            $stmt->execute();
            $res = $stmt->fetch();
            $conn = null;
            if ($res[0] == "i"){
                inactiveNotice();
            }
            else if ($res[0] == "b"){
                bannedNotice();
            }
            else if ($res[0] == "a"){
                signedIn($username);
            } else {
                error();
            } 
        } else {
            wrongpw();
        }
    } else {
        nonexist();
    }
} else {
    error();
}

?>


