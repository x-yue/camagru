<?php
include "emailsys.php";
include "setup.php";

function error(){
    echo "<script>alert('Something went wrong, please try again.')</script>";
    echo "<script>location.href='../account.php';</script>";
	exit; 
}

function wrongPassword(){
    echo "<script>alert('The password you put in is incorrect, please try again');</script>";
    echo "<script>location.href='../account.php';</script>";
    exit;
}

function repeatEmail(){
    echo "<script>alert('The old and new emails are identical, nothing will be changed.');</script>";
    echo "<script>location.href='../account.php';</script>";
    exit;
}

function existedEmail(){
    echo "<script>alert('The new email already link to an account, please try with another one.');</script>";
    echo "<script>location.href='../account.php';</script>";
}

function successfulChange(){
    echo "<script>alert('You have changed your information with success');</script>";
    echo "<script>location.href='../account.php';</script>";
    exit;
}

if ($_POST["submit"] == 'Submit' && $_POST["oldemail"] && $_POST["newemail"] && $_POST["password"]){
   
    $oldemail = $_POST["oldemail"];
    $newemail = $_POST["newemail"];
    $raw_password = $_POST["password"];
    $salt = "sherlock_";
    
    //verify if the old password is correct
    $conn = db_connect();
    $sql = "SELECT passwd FROM loginsystem WHERE email = '$oldemail'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $res = $stmt->fetch();
    $conn = null;
    $password = hash("whirlpool", $salt.$raw_password);
    if ($res[0] == $password)
    {   
        //verify if the new email already existed
        $conn = db_connect();
        $sql = "SELECT * FROM loginsystem WHERE email = '$newemail'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $res = $stmt->fetch();
        $conn = null;
        if (!$res) {
            //verify different emails
            if ($oldemail != $newemail){
                $conn = db_connect();
                $sql = "UPDATE loginsystem SET email = '$newemail' where email = '$oldemail'";
                $stmt = $conn->prepare($sql);
                if ($stmt->execute()) {
                    $conn = null;
                    successfulChange();
                } else {
                    error();
                }
            } else {
                repeatEmail();
            }
        } else {
            existedEmail();
        }
    } else {
        wrongPassword();
    }
} else {
    error();
}

?>

