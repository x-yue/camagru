<?php 
include 'setup.php';

if (session_start()){
    session_destroy();
} else {
    session_start();
};

function error()
{
    echo "<script>alert('Your link has expired.')</script>";
    echo "<script>location.href = '../index.php';</script>";
	exit;
}

if (isset($_GET["email"]) && isset($_GET["username"]) && $_GET["active"] == 'd'){
    $email = $_GET["email"];
    $username = $_GET["username"];
    
    $conn = db_connect();
    $sql = "DELETE FROM loginsystem WHERE email = ? AND username = ? AND active = 'a' ";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$email, $username]);
    $conn = null;

    $conn = db_connect();
    $sql = "DELETE FROM imagelist WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$username]);
    $conn = null;

    $conn = db_connect();
    $sql = "DELETE FROM likes WHERE likeuser =  ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$username]);
    $conn = null;

    $conn = db_connect();
    $sql = "DELETE FROM comments WHERE commentuser = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$username]);
    $conn = null;

} else {
    error();
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
            document.getElementById("title").innerHTML = "Account Deleted";
        </script>

        <p class="headline" id="homeheadline">Camagru</p> 
    </div>


<div align="center" >
    <div id="msgbox" style="height:250px;">
    <p id="deletesuccess">We have removed your account from our database</p>
    <p id="deletesuccess">We will miss you.</p>
    <a href="../index.php"><button class="button">Homepage</button></a>
    </div>
</div>

</body>

<?php include "../control/footer.php"; ?>