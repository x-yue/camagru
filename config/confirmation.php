<?php
include "setup.php";
 
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

if (isset($_GET["username"])){
    $username = $_GET["username"];
} else {
    error();
}

if (isset($_GET["email"]) && $_GET["active"] == 'a'){
    $email = $_GET["email"];

    $conn = db_connect();
    $sql = "UPDATE loginsystem SET active = 'a' WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$email]);
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
            document.getElementById("title").innerHTML = "Account Activated";
        </script>

        <p class="headline" id="homeheadline">Camagru</p> 
    </div>


<div align="center" >
    <div id="msgbox" style="height:250px;">
    <p id="activeacc">Congratulations <?php echo $username; ?>, your account has been activated, you can now go sign in.</p>   
    <br>
    <a href="../index.php"><button class="button">Homepage</button></a>
    </div>
</div>

</body>

<?php include "../control/footer.php"; ?>
