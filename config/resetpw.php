<?php 

    include "setup.php";

    session_start();
    if (isset($_SESSION["username"])){
        echo "<script>alert('You are already signed in, you have to logout before resetting your password here.')</script>";
        echo "<script>location.href = '../feed.php';</script>"; 
    } else {
//     set($_SESSION['username']) = // user name linked to the email 
    }
/////////////// not  done this page 
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
        <div id="form">
            <h2>Reset my Password</h2>
            <form action="" method="post">
            <label for="password">Password</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&thinsp;&thinsp;&hairsp;&hairsp;: 
            <input type="password" name="password" placeholder="minimum 6 characters" class="input" required>
            <br>
            <label for="password">Repeat Password</label>&thinsp;&thinsp;: 
            <input type="password" name="verifypw" placeholder="minimum 6 characters" class="input" required>
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

