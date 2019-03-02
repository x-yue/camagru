<?php
include ('control/header.php');
if (!isset($_SESSION['login']))
 //   return index.php;
?>

<body>

<img id="logo" src="/images/logo.png"><img>

    <div class="banner">    
        <p id="feedheadline">Newsfeed</p> 
        <br><a id="logout" href="index.php" onclick="return confirm('Are you sure to logout?');">Log out</a>
    </div>
<div align="center">
    <iframe src=""id="scrollingfeed" scrolling="yes">
<!-- src => where the pictures are saved! -->  

    </iframe>
</div>

<?php include('control/footer.php');?>