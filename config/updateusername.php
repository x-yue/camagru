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

function repeatUsername(){
    echo "<script>alert('The old and new username are identical, nothing will be changed.');</script>";
    echo "<script>location.href='../account.php';</script>";
    exit;
}

function existUsername(){
    echo "<script>alert('The new username already existed, please try with something else.');</script>";
    echo "<script>location.href='../account.php';</script>";
}

function successfulChange(){
    echo "<script>alert('You have changed your information with success');</script>";
    echo "<script>location.href='../account.php';</script>";
    exit;
}


if ($_POST["submit"] == 'Submit' && $_POST["oldun"] && $_POST["newun"] && $_POST["password"]){

    $oldun = $_POST["oldun"];
    $newun = $_POST["newun"];
    $raw_password = $_POST["password"];
    $salt = "sherlock_";

   //verify if the old password is correct
    $conn = db_connect();
    $sql = "SELECT passwd FROM loginsystem WHERE username = '$oldun'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $res = $stmt->fetch();
    $conn = null;
    $password = hash("whirlpool", $salt.$raw_password);
    if ($res[0] == $password)
    {   
        //verify if the new username is already used
        $conn = db_connect();
        $sql = "SELECT * FROM loginsystem WHERE username = '$newun'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $res = $stmt->fetch();
        $conn = null;
        if (!$res){
            //verify if two username are the same
            if ($oldun != $newun){
                $conn = db_connect();
                $sql = "UPDATE loginsystem SET username = '$newun' where username = '$oldun'";
                $stmt = $conn->prepare($sql);
                if ($stmt->execute()) {
                    $conn = null;
                    successfulChange();
                } else {
                    error();
                }
            } else {
                repeatUsername();
            }
        } else {
            existUsername();
        }    
    } else {
        wrongPassword();
    }
} else {
    error();
}

?>

