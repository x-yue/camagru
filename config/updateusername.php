<?php
include "emailsys.php";
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

function successfulChange($newun){
    $_SESSION["username"] = $newun;
    echo "<script>alert('You have changed your information with success');</script>";
    echo "<script>location.href='../account.php';</script>";
    exit;
}

if ($_POST["submit"] == 'Submit' && $_POST["newun"] && $_POST["password"]){

    $newun = $_POST["newun"];
    $raw_password = $_POST["password"];
    $salt = "sherlock_";

   //verify if the old password is correct
    $conn = db_connect();
    $sql = "SELECT passwd FROM loginsystem WHERE username = '$name'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $res = $stmt->fetch();
    $conn = null;
    $password = hash("whirlpool", $salt.$raw_password);
    if ($res[0] == $password)
    {   
        //verify if two username are the same
        if ($newun != $name){
            $conn = db_connect();
            $sql = "SELECT * FROM loginsystem WHERE username = '$newun'";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $res = $stmt->fetch();
            $conn = null;
            if (!$res){
                //verify if the new username already existed
                $conn = db_connect();
                $sql = "UPDATE loginsystem SET username = '$newun' where username = '$name'";
                $stmt = $conn->prepare($sql);
                if ($stmt->execute()) {
                    $conn = null;
                    successfulChange($newun);
                } else {
                    error();
                }
            } else {
                existUsername();
            }
        } else {
            repeatUsername();
        }    
    } else {
        wrongPassword();
    }
} else {
    error();
}

?>

