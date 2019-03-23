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
            $imgname = $res[$count][0];
            $imguser = $res[$count][1];
            $time = $res[$count][2];
            $comments = $res[$count][3];
            $likes = $res[$count][4];

            echo "<div align='left' class='feed'>";
            echo "<table><tr align='left'><img class='feedphoto' src=$imgname></tr>";
            echo '<div align="right">';
            echo "<p id='feedusername'>@$imguser</p>";
            echo "<p id='feedusername' style='font-size:15px;'>$time</p>";
            echo '<div align="right" style="margin-top:-40px;">'; 
            echo "<a id='numofheart'>$likes </a>";
            echo '<img id="heartfeed" src="images/heart.png"></div>';
            echo "<div id='commenthistory' align='right'>";
           // while loop to show all the comments;
            $i = 0;
            while ($comment[$i]){
                $commentuser = $comment[$i][0];
                $commenttext = $comment[$i][1];
                $commenttime = $comment[$i][2];
                echo "<p id='commentuser'>$commentuser : </p></div>";
                echo "<p id='commenttext'>$commenttext</p></div>";
                echo "<p id='commenttime'>$commenttime</p></div>";
                $i++;
            }
            echo "</div>";
            echo '<div align="right">';
            echo "<form id='commentform'action='config/comment.php' method='post'>";
            echo "<input id='commentbox' type='text' name='commentaire' placeholder='Leave a comment...'>";
            echo "<input type='submit' name='submitcomment' value='Comment'>&nbsp;";
            echo "</form>";

            echo "<form id='likeunlike' action='config/likeunlike.php' method='post'>";
            $create = explode(' ', $time);
            $createdate = $create[0];
            $createtime = $create[1];
            echo "<input type='hidden' name='date' value=$createdate>"; 
            echo "<input type='hidden' name='time' value=$createtime>"; 
            echo "<input type='hidden' name='imguser' value=$imguser>"; 
            echo "<input type='hidden' name='imgname' value=$imgname>"; 
            echo "<input id='likebutton' type='submit' name='click' value='Like'>"; 
            echo "<input id='likebutton' type='submit' name='click' value='Unlike'>"; 
            echo "</form>";
            echo "<br>";

            echo '</div></table></div><br>';
            $count++;
        }
    }    
    exit;

?>

</div>

</body>

<?php include 'control/footer.php';?>