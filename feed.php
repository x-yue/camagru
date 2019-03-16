<?php
include 'control/header.php';
//nclude 'config/signin.php';

// if (!isset($_SESSION['username'])){  
//     echo "<script>alert('You need to sign in first.')</script>";
//     echo "<script>location.href = 'index.php';</script>";
// } else {
//     session_start();
//     $name = $_SESSION["username"];
// }


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
<?php 
    if ($post == null){
        echo "<div align='center'>";
        echo "<p id='nonewsfeed'>Oups, there is no post from anyone yet, go to your home page and share something with us!</p>";
        echo "<a href='home.php'><button class='button'>My Page</button></a>";
        echo "</div>";
    }
?>

    <div align="left" class="feed">
        <table>
            <div class="feedphoto"><img  class="feedphoto" src="uploads/upload.png"></div>
            <div align="right">
                <p id="feedusername">Username</p>
                <p id="comments">Comments</p>
            </div>
        </table>
        <div align="right">
            <a id="numofheart">100</a>    
            <img id="heart" src="images/heart.png"> 
        </div>
    </div><br>

      <div align="left" class="feed">
        <table>
            <div class="feedphoto"><img  class="feedphoto" src="uploads/upload.png"></div>
            <div align="right">
                <p id="feedusername">Username</p>
                <p id="comments">Comments</p>
            </div>
        </table>
        <div align="right">
            <a id="numofheart">100</a>    
            <img id="heart" src="images/heart.png"> 
        </div>
    </div><br>

      <div align="left" class="feed">
        <table>
            <div class="feedphoto"><img  class="feedphoto" src="uploads/upload.png"></div>
            <div align="right">
                <p id="feedusername">Username</p>
                <p id="comments">Comments</p>
            </div>
        </table>
        <div align="right">
            <a id="numofheart">100</a>    
            <img id="heart" src="images/heart.png"> 
        </div>
    </div><br>

      <div align="left" class="feed">
        <table>
            <div class="feedphoto"><img  class="feedphoto" src="uploads/upload.png"></div>
            <div align="right">
                <p id="feedusername">Username</p>
                <p id="comments">Comments</p>
            </div>
        </table>
        <div align="right">
            <a id="numofheart">100</a>    
            <img id="heart" src="images/heart.png"> 
        </div>
    </div><br>


</div>
<!--    <iframe src=""id="scrollingfeed" scrolling="yes">
 src => where the pictures are saved! -->  

    </iframe>   
</div>
</body>
<?php include('control/footer.php');?>