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

function usernameError(){
    echo "<script>alert('You cannot have empty spaces in your username, but you can use _ , please try again.')</script>";
    echo "<script>location.href = '../account.php';</script>";
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

function forbidenUsername(){
    echo "<script>alert('Username cannot contain special signs, please try again.')</script>";
    echo "<script>location.href = '../account.php';</script>";
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
    $i = 0;
    while ($newun[$i]){
        if ($newun[$i] == ' '){
            echo usernameError();
        }
        if ($newun[$i] == "'" || $newun[$i] == '/' || $newun[$i] == '@' || $newun[$i] == '$' || $newun[$i] == '#' || $newun[$i] == '!' || $newun[$i] == '\\' || $newun[$i] == '"'){
            forbidenUsername();
        }
        $i++;
    }

    $raw_password = $_POST["password"];
    $salt = "sherlock_";

   //verify if the old password is correct
    $conn = db_connect();
    $sql = "SELECT passwd FROM loginsystem WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$name]);
    $res = $stmt->fetch();
    $conn = null;
    $password = hash("whirlpool", $salt.$raw_password);
    if ($res[0] == $password)
    {   
        //verify if two username are the same
        if ($newun != $name){

            //verify if the new username already existed
            $conn = db_connect();
            $sql = "SELECT * FROM loginsystem WHERE username = ?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$newun]);
            $res = $stmt->fetch();
            $conn = null;
            if (!$res){
                $conn = db_connect();
                $sql = "UPDATE loginsystem SET username = ? where username = ?";
                $stmt = $conn->prepare($sql);
                $stmt->execute([$newun, $name]);
                $conn = null;          
  
                $conn = db_connect();
                $sql = "UPDATE imagelist SET username = ? where username = ?";
                $stmt = $conn->prepare($sql);
                $stmt->execute([$newun, $name]);
                $conn = null;
            
                $conn = db_connect();
                $sql = "UPDATE likes SET likeuser = ? where likeuser = ?";
                $stmt = $conn->prepare($sql);
                $stmt->execute([$newun, $name]);
                $conn = null;
                echo "test";
            
                $conn = db_connect();
                $sql = "UPDATE likes SET imguser = ? where imguser = ?";
                $stmt = $conn->prepare($sql);
                $stmt->execute([$newun, $name]);
                $conn = null;
                echo "test";
            
                $conn = db_connect();
                $sql = "UPDATE comments SET commentuser = ? where commentuser = ?";
                $stmt = $conn->prepare($sql);
                $stmt->execute([$newun, $name]);
                $conn = null;
                echo "test";
            
                $conn = db_connect();
                $sql = "UPDATE comments SET imguser = ? where imguser = ?";
                $stmt = $conn->prepare($sql);
                $stmt->execute([$newun, $name]);
                $conn = null;

                    successfulChange($newun);   
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

