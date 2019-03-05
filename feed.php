<?php
include ('control/header.php');

if (!isset($_SESSION['username'])){
    echo "<script>alert('You need to sign in first.')</script>";
    echo "<script type='text/javascript'>location.href = '../index.php';</script>";
}

?>
    <script>
        document.getElementById("title").innerHTML = "Feed";
    </script>
    <p class="headline">Newsfeed</p>
    <div align="right">
        <br>
        <a id="username">Hello, </a>
        <a id="username"></a>    
        <script>
         //document.getElementById("username").innerHTML = $(username)
        </script>
        &nbsp;
        <a id="account" href="account.php">Account</a>
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