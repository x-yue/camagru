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

function waitForConfirmation(){
    echo "<script>alert('We are sad to see you go, but we have sent you an email to confirmation deletion of your account, meanwhile, you are remaining signed in.');</script>";
    echo "<script>location.href='../account.php';</script>";
    exit;
}


if ($_POST["submit"] == 'Send an email for confirmation' && $_POST["password"]){

    //find email attached to this account
    $conn = db_connect();
    $sql = "SELECT email FROM loginsystem WHERE username = '$name'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $res = $stmt->fetch();
    $email = $res[0];
    $conn = null;
    
    $raw_password = $_POST["password"];
    $salt = "sherlock_";

    $conn = db_connect();
    $sql = "SELECT passwd FROM loginsystem WHERE username = '$name'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $res = $stmt->fetch();
    $conn = null;
   
    //verify if the password is correct
    $password =  hash("whirlpool", $salt.$raw_password);
    if ($res[0] == $password){
    ////////////////////////////////////    emailDeletation();
        waitForConfirmation();
    } else {
        notMatch();
    }
} else {
    error();
}


// function successfulDelete(){
//     echo "<script>alert('You have deleted your account with success, we will miss you, farewell!');</script>";
//       include "logout.php";
//     echo "<script>location.href='../index.php';</script>";
// }

// $usertbd = $_SESSION["username"];
// $password = $_POST["password"];
// if ($_POST["submit"] == "Send an email for confirmation" && verifyPassword($usertbd) == 1){
//     $email = $_POST["email"];
//     if (deleteConfirmation($email) == 1){
//         $usertbd = $_SESSION["username"];
//         $sql = "DELETE FROM longinsystem WHERE username = $usertbd";    
//         $stmt = $conn->prepare($sql);
//         $stmt->exexute();
//         //search again with the $usertbd, if not found -->
//         //successfulDelete(); 
//     }
// } 

// $sql = "INSERT INTO posts(username, email, password) values (:username, :email, :password)";
// $stmt = $conn->prepare($sql);
// $stmt->execute(["username" => $username, "email"=>$email, "password"=>$password]);
// echo "successful";

// $search = %post%;
// $sql = "SELECT * FROM posts WHERE username LIKE ?";
// $stmt = $conn->prepare($sql);
// $stmt->execute($search);
// $posts = $stmt->fetchAll();

// foreach($posts as $post){
//     echo $post->title . "<br>";
// }
?>