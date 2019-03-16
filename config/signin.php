<?php

include "setup.php";
//to see if the password match
// $salt = "sherlock_";

// $incomingPassword = $_POST['password'];
// $storedHash = getStoredHash( $_POST['username'] );

// $incomingHash = hash( 'whirlpool',salt.$incomingPassword );

// if ( $incomingHash == $storedHash ) {
//   echo('Passwords match!');
// }

function error()
{
   // echo "<script>alert('Signing In: Something went wrong, please try again.')</script>";
    // echo "<script>location.href='index.php';</script>";
	// exit;
}

function nonexist(){
    echo "<script>alert('No account associate with this username exists, please try again or sign up.')</script>";
    echo "<script>location.href='../signup.php';</script>";
	exit;
}

function wrongpw(){
    echo "<script>alert('The username and password don't match, try again or click forget my password.')</script>";
    echo "<script>location.href='../index.php';</script>";
	exit;
}

function inactiveNotice(){
    echo "<script>alert('It seems you haven't activated your account, have a look at your mailbox, we have sent you a confirmation email.')</script>";
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
    echo "<script>location.href = 'feed.php';</script>";
    exit;
}


/*
if ($_POST['submit'] == 'Sign In')
{
	$_SESSION['username'] = $_POST['username'];
	$_SESSION['password'] = $_POST['password'];
// } */

// $duplicate=mysqli_query($conn,"select * from user_login
// where user_name='$user_name' or email_id='$email_id'");

if ($_POST['submit'] == 'Sign In' && $_POST["username"] && $_POST["password"]){
    $username = $_POST["username"];
    echo $username;
    $raw_password = $_POST["password"];
    $salt = "sherlock_";
    $password = hash("whirlpool", $salt.$raw_password);
    signedIn($username);
    // $password = '';
    // if ($username){ 
    //     $salt = "sherlock_";
    //     if (hash("whirlpool", $salt.$raw_password) == $password) {   
    //         $status = fetch($loginsystem);
    //         if ($status == "i"){
    //             inactiveNotice();
    //         }
    //         else if ($status == "b"){
    //             bannedNotice();
    //         }
    //         else if ($status == "a"){
    //             signedIn($username);
    //         } else {
    //             error();
    //         } 
    //     } else {
    //         wrongpw();
    //     }
    // } else {
    //     nonexist();
    // }
} else {
    error();
}

/*
if ( ! empty( $_POST ) ) {
    if ( isset( $_POST['username'] ) && isset( $_POST['password'] ) ) {
        // Getting submitted user data from database
        $con = new mysqli($db_host, $db_user, $db_pass, $db_name);
        $stmt = $con->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->bind_param('s', $_POST['username']);
        $stmt->execute();
        $result = $stmt->get_result();
    	$user = $result->fetch_object();
    		
    	// Verify user password and set $_SESSION
    	if ( password_verify( $_POST['password'], $user->password ) ) {
    		$_SESSION['user_id'] = $user->ID;
    	}
    }
}

if ($_POST["submit"] == "Sign in" && $_POST["username"] && $_POST["password"])
{
//	if (!file_exists("private") || !file_exists("private/passwd"))
  //      nonexist();
   // else {
    //    if (!$list = file_get_contents("private/passwd"))
      //      errorsignin();
/*        foreach ($list as $key => $elem){
            echo "<script>alert('test')</script>";
            if ($elem["username"] == $_POST["username"]){
                if ($elem["password"] == hash("whirlpool",$_POST["password"])){
                    signedin();
                }
                wrongpw();
            }*/
   // else 
//        signedin();
    //}
    // nonexist();
//}
/*
else
    errorsignin2(); */
?>

    <div id="login">
        <br>
    	<form action="config/signin.php" method= "post">
            <input type="login" name="username" placeholder="Login" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="submit" name="submit" value="Sign in" required>
        </form>
        <div style="height:3px;"><br></div>
