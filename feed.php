<?php
include 'control/header.php';
include "config/setup.php";

session_start();
if (!isset($_SESSION['username'])){  
    echo "<script>alert('You need to sign in first.')</script>";
    echo "<script>location.href = 'index.php';</script>";
} else {
    $name = $_SESSION["username"];
}

?>

<script>
    document.getElementById("title").innerHTML = "Feed";
</script>

    <p class="headline">Newsfeed</p>
    <div id="topline" align="right">
        <br>
        <a class="hdtext">Hello,</a>
        <a class="hdtext"><?php echo $name; ?></a>&thinsp;&hearts;
        &hairsp;
        <a class="hdtext" href="mygallery.php">Gallery</a>
        &hairsp;
        <a class="hdtext" href="home.php">Home</a>
        &hairsp;
        <a class="hdtext" href="account.php">Account</a>
        &hairsp;
        <a id="logout" href="config/logout.php" onclick="return confirm('Are you sure to log out?');">Logout</a>
    </div>
</div>


<div align="center" id="newsfeed">

    <!-- <div align="left" class="feed">
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
    </div><br>   -->

<?php     
    $conn = db_connect();
    $sql = "SELECT * FROM imagelist";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $res = $stmt->fetch();
    $conn = null;
    if (!$res){
        echo "<div align='center'>";
        echo "<div id='msgbox' style='height:250px'>";
        echo "<p id='nonewsfeed'>Oups, there is no post from anyone yet, go to your home page and share something with us!</p>";
        echo "<a href='home.php'><button class='button'>MySpace</button></a></div></div>";
    } else {
        $conn = db_connect();
        $sql = "SELECT * FROM imagelist ORDER BY date_creation DESC";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $res = $stmt->fetchall();
        $conn = null;

        $count = 0;
        while ($res[$count]){
            $img = $res[$count][0];
            $username = $res[$count][1];
            $time = $res[$count][2];
            $comments = $res[$count][3];
            $likes = $res[$count][4];
            echo "<div align='left' class='feed'>";
            echo "<table><img class='feedphoto' src=$img>";
            echo '<div align="right">';
            echo "<p id='feedusername'>$username</p>";
            echo "<p id='comments'>$comments Comments</p></div></table>";
            echo '<div align="right">';
            echo "<a id='numofheart'>$likes </a>";    
            echo '<img id="heart" src="images/heart.png">';
            echo '</div></div><br>';
            $count++;
        }
    }    
    exit;
?>

</div>

</body>

<?php include 'control/footer.php';?>