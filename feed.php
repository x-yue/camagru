<?php
include ('control/header.php');
/*
if (!isset($_SESSION['username'])){
    echo "<script>alert('You need to sign in first.')</script>";
    echo "<script>location.href = '../index.php';</script>";
}*/

?>

    <script>
        document.getElementById("title").innerHTML = "Feed";
    </script>
    <p class="headline">Newsfeed</p>
    <div id="topline" align="right">
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

<div align="center" id="newsfeed">
<!-- create a whilte loop for all the posts --> 

    <article align="left" class="feed">
        <td class="feedphoto"><img  class="feedphoto" src="uploads/upload.png"></td>
        <td><header align="right" id="feedusername">Username</header></td>
        <div align="right">
            <li>Comments</li>
        <div>

    <div align="right">
        <a id="numofheart">100</a>    
        <img id="heart" src="images/heart.png"> 
    </div>
    </article><br>
    
    <article align="left" class="feed">
        <td class="feedphoto"><img  class="feedphoto" src="uploads/upload.png"></td>
        <td><header align="right" id="feedusername">Username</header></td>
        <div align="right">
            <li>Comments</li>
        <div>

    <div align="right">
        <a id="numofheart">100</a>    
        <img id="heart" src="images/heart.png"> 
    </div>
    </article><br>

    <article align="left" class="feed">
        <td class="feedphoto"><img  class="feedphoto" src="uploads/upload.png"></td>
        <td><header align="right" id="feedusername">Username</header></td>
        <div align="right">
            <li>Comments</li>
        <div>

    <div align="right">
        <a id="numofheart">100</a>    
        <img id="heart" src="images/heart.png"> 
    </div>
    </article><br>

    <article align="left" class="feed">
        <td class="feedphoto"><img  class="feedphoto" src="uploads/upload.png"></td>
        <td><header align="right" id="feedusername">Username</header></td>
        <div align="right">
            <li>Comments</li>
        <div>

    <div align="right">
        <a id="numofheart">100</a>    
        <img id="heart" src="images/heart.png"> 
    </div>
    </article><br>

</div>
<!--    <iframe src=""id="scrollingfeed" scrolling="yes">
 src => where the pictures are saved! -->  

    </iframe>   
</div>

<?php include('control/footer.php');?>