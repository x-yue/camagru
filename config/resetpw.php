<?php 
include "setup.php";

if (session_start()){
    session_destroy();
} else {
    session_start();
};

function error(){
    echo "<script>alert('Your link has expired.')</script>";
    echo "<script>location.href = '../index.php';</script>";
	exit;
}

if (isset($_GET['email'])){
    $email = $_GET['email'];
} else {
    error();
}

function passwordNoMatch(){
    echo "<script>alert('The passwords do not match, please try again')</script>";
}

function passwordNotChanged(){
    echo "<script>alert('The password did not change, you can try something else or go sign in at homepage')</script>";     
}

function passwordSecure(){
    echo "<script>alert('The password must contain at least 6 characters, please try again.');</script>";
}

function currentpw($email) {
    $conn = db_connect();
    $sql = "SELECT passwd FROM loginsystem WHERE email = '$email'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $res = $stmt->fetch();
    $conn = null;
    $password = $res[0];
    return $password;
}

if ($_POST["submit"] = "Submit" && $_POST["password"] && $_POST["verifypw"])
{

    // check if passwords are identical 
    if ($_POST["password"] != $_POST["verifypw"]){
        passwordNoMatch();
    } 
    $raw_password = $_POST["password"];

    // check if the length is more than 6
    if (strlen($raw_password) < 6) {
        passwordSecure();
    } else {
        $salt = "sherlock_";
        $newpassword = hash("whirlpool", $salt.$raw_password);

        //check if newpw and oldpw are same 
        $currentpw = currentpw($email);
        if ($newpassword == $currentpw){
           passwordNotChanged();
        } else {
            $conn = db_connect();
            $sql = "UPDATE loginsystem SET passwd = '$newpassword' WHERE email = '$email'";
            $stmt = $conn->prepare($sql);
            if ($stmt->execute()){
                echo "<script>alert('You have successfully reset your password, sign in and share moments with us now')</script>";
                $conn = null;
                echo "<script>location.href = '../index.php';</script>";
            } else {
                echo "<script>alert('Something went wrong, please try again.')</script>";
            }
        }
    }
}

?>

<!DOCTYPE HTML>

<html>	
	<head>
		<meta charset="UTF-8">
		<title id="title"></title>
		<link rel="stylesheet" type="text/css" href="../style/body.css">
	</head>

<body>
	<div class="banner">
		<img id="logo" src="/camagru/images/logo.png">

        <script>
            document.getElementById("title").innerHTML = "Reset Password";
        </script>

        <p class="headline">Camagru</p>
    </div>

    <div align="center" class="accinfo">
        <div id="form" style="height: auto;">
            <h2>Reset my Password</h2>
            <form action="" method="post">
            <label for="password">Password</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&thinsp;&thinsp;&hairsp;&hairsp;: 
            <input type="password" name="password" placeholder="minimum 6 characters" class="input" required>
            <br>
            <label for="password">Repeat Password</label>&thinsp;&thinsp;: 
            <input type="password" name="verifypw" placeholder="minimum 6 characters" class="input" required>
            <br>
            <br>
            <div align="center">
                <input type="submit" name="submit" value="Submit" class="input">
            </div>
       </form>
    </div>
    <br>
    <a href="../index.php"><button class="button">Homepage</button></a>
</div>

</body>

<?php include '../control/footer.php';?>

