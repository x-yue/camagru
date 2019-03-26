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
    echo "<script>alert('The username and and password you put in do not match, please try again');</script>";
    echo "<script>location.href='../account.php';</script>";
    exit;
}

function samePassword(){
    echo "<script>alert('The old and new passwords are identical, nothing will be changed.');</script>";
    echo "<script>location.href='../account.php';</script>";
    exit;
}

function passwordSecure(){
    echo "<script>alert('The password must contain at least 6 characters, please try again.');</script>";
    echo "<script>location.href = '../account.php';</script>";
    exit;
}

function successfulChange(){
    echo "<script>alert('You have changed your information with success');</script>";
    echo "<script>location.href='../account.php';</script>";
    exit;
}

if ($_POST["submit"] == 'Submit' && $_POST["oldpw"] && $_POST["newpw"]){
    
    $oldpw = $_POST["oldpw"];
    $newpw = $_POST["newpw"];
    $salt = "sherlock_";

    //verify if the old password is correct
    $conn = db_connect();
    $sql = "SELECT passwd FROM loginsystem WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$name]);
    $res = $stmt->fetch();
    $conn = null;

    $oldpwhash = hash("whirlpool", $salt.$oldpw);
    if ($res[0] == $oldpwhash)
    {   
        //verify password length 
        if (strlen($newpw) < 6){
            passwordSecure();
        }
        //verify if two passwords are the same
        if ($oldpw != $newpw){
            $newpwhash = hash("whirlpool", $salt.$newpw);
            $conn = db_connect();
            $sql = "UPDATE loginsystem SET passwd = ? where username = ?";
            $stmt = $conn->prepare($sql);
            if ($stmt->execute([$newpwhash, $name])) {
                $conn = null;
                successfulChange();
            } else {
                error();
            }
        } else {
            samePassword();
        }    
    } else {
        notMatch();
    }
} else {
    error();
}

?>

