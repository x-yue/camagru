<?php
include 'setup.php';

session_start();
if (isset($_SESSION['username'])){
    echo "<script>alert('You are already signed in.')</script>";
    echo "<script>location.href = 'feed.php';</script>";
}

function error()
{
    echo "<script>alert('Something went wrong, please try again.')</script>";
    echo "<script>location.href = '../forgetpw.php';</script>";
	exit;
}

function sendPassword($email){
    $conn = db_connect();
    $sql = "SELECT passwd FROM loginsystem WHERE email = '$email'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $res = $stmt->fetch();
    $conn = null;
    $password = $res[0];
    $subject = "Find My Password with Camagru";
    $message = "testeryuxu@gmail.com";
    // <html>
    //     <head>
    //         <title>You lost it, we find it for you</title>
    //     </head>    
    //     <body>
    //         <a href='camagru/changepassword'>Click Here to Change your password</a> 
    //     </body>
        
    // </html>"
    
    if (mail($email, $subject, $message)){
        echo "<script>alert('An email is sent to your mailbox ;)');</script>";
    } else {
        error();
    }
}

function wrongMatchEmailUsername(){
    echo "<script>alert('Sorry, the username and email you put in do not match, please try again, perhaps with the one you are more sure about ;)');</script>";
    echo "<script>location.href = '../forgetpw.php';</script>";
    exit;
}

function noInput(){
    echo "<script>alert('Did you forget something? we cannot help if you give us nothing.');</script>";
    echo "<script>location.href = '../forgetpw.php';</script>";
    exit;  
}

function noUsernameExist(){
    echo "<script>alert('Sorry, there is no account with this username, please try again');</script>";
    echo "<script>location.href = '../forgetpw.php';</script>";
    exit;
}

function noEmailExist(){
    echo "<script>alert('Sorry, there is no account link to this email address, please try again');</script>";
    echo "<script>location.href = '../forgetpw.php';</script>";
    exit;
}

function sendEmail($email) {
    sendPassword($email);
    echo "<script>location.href = '../index.php';</script>";
    exit;
}

//there are 4 cases for username and email inputs
if ($_POST["submit"] == "Send me an email"){
    
    //both username and email
    if ($_POST["username"] && $_POST["email"]){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $conn = db_connect();
        $sql = "SELECT * FROM loginsystem WHERE username = '$username' AND email = '$email'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $res = $stmt->fetch();
        $conn = null;
        if (!$res){
            wrongMatchEmailUsername();
        } elseif ($res) {
            sendEmail($email);
        } else {
            error();
        }
    }
    // only username
    if ($_POST["username"] && !$_POST["email"]){
        $username = $_POST['username'];
        $conn = db_connect();
        $sql = "SELECT email FROM loginsystem WHERE username = '$username'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $res = $stmt->fetch();
        $conn = null;
        if (!$res){
            noUsernameExist();
        } elseif ($res){
            sendEmail($res[0]);
        } else {
            error();
        }
    }
    //only email
    if (!$_POST["username"] && $_POST["email"]){
        $email = $_POST['email'];
        $conn = db_connect();
        $sql = "SELECT * FROM loginsystem WHERE email = '$email'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $res = $stmt->fetch();
        $conn = null;
        if (!$res){
            noEmailExist();
        } elseif ($res){
            sendEmail($email);
        } else {
            error();
        }
    } 
    // no input
    if (!$_POST["username"] && !$_POST["email"]){
        noInput();  
    } else {
        error();
    }
} else {
    error();
}

?>