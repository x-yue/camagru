<?php
/*
function errorsignin()
{
    echo "<script>alert('Something went wrong, please try again.')</script>";
  //  echo "<script>location.href='../index.php';</script>";
	exit;
}

// to remove later 
function errorsignin2()
{
    echo "<script>alert('try again.')</script>";
   // echo "<script>location.href='../index.php';</script>";
	exit;
}


function wrongpw(){
    echo "<script>alert('The username and password don't match, try again or click forget my password.')</script>";
 //   echo "<script>location.href='../index.php';</script>";
	exit;
}

function nonexist(){
    echo "<script>alert('No account associate with this username exists, please sign up.')</script>";
    echo "<script>location.href='../signup.php';</script>";
	exit;
}

function signedin(){
    $_SESSION["username"]= $_POST["username"];
    $_SESSION["password"] = $_POST["password"];
    $name = $_SESSION["username"];
    echo "<script>alert('Welcome back, $name.')</script>";
//    echo "<div id="snackbar">Welcome back, $name</div>";
// work on the snackbar when i get time to
// it's on w3 school 
    echo "<script>location.href='../home.php';</script>";
    exit;
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
    	<form action="/config/signin.php" method= "post">
            <input type="login" name="username" placeholder="Login" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="submit" name="submit" value="Sign in" required>
            <!-- here to insert signin codes server side  --> 
        </form>
        <div style="height:3px;"><br></div>
