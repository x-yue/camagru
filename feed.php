<?php
include ('control/header.php');
/*
if (!isset($_SESSION['username'])){
    echo "<script>alert('You need to sign in first.')</script>";
    echo "<script>location.href = '../index.php';</script>";
}*/

?>
    <a href="../feed.php"><img id="logo" src="/images/logo.png" alt="logo"><img></a>

    <script>
        document.getElementById("title").innerHTML = "Feed";
    </script>
    <p class="headline">Newsfeed</p>
    <div align="right">
        <br>
        <a class="hdtext">Hello</a>&thinsp;&hearts;&thinsp;
        <script>
            //<a id="username" class="hdtext"></a>
         //document.getElementById("username").innerHTML = $(username)
        </script>
        &nbsp;
        <a class="hdtext" href="home.php">Home</a>
        &hairsp;
        <a class="hdtext" href="account.php">Account</a>
        &hairsp;
        <a id="logout" href="index.php" onclick="return confirm('Are you sure to logout?');">Logout</a>
    </div>
</div>

<div align="center">
    <iframe src=""id="scrollingfeed" scrolling="yes">
<!-- src => where the pictures are saved! -->  

    </iframe>   
</div>

<?php include('control/footer.php');?>