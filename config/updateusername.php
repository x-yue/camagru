<?php
include "emailsys.php";
include "setup.php";

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

if ($_POST["submit"] == 'Submit' && $_POST["oldun"] && $_POST["newun"] && $_POST["password"]){
// changed one line only 
    $username = $_POST["user"];
    $oldpw = $_POST["oldpw"];
    $newpw = $_POST["newpw"];
    $salt = "sherlock_";

    $conn = db_connect();
    $sql = "SELECT passwd FROM loginsystem WHERE username = '$username'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $res = $stmt->fetch();
    $conn = null;

    //verify if the old password is correct
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
            $sql = "UPDATE loginsystem SET passwd = '$newpwhash' where username = '$username'";
            $stmt = $conn->prepare($sql);
            if ($stmt->execute()) {
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

