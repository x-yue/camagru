<?php
include 'control/header.php';
include 'config/setup.php';

session_start();
if (!isset($_SESSION['username'])){  
    echo "<script>alert('You need to sign in first.')</script>";
    echo "<script>location.href = 'index.php';</script>";
} else {
    $name = $_SESSION["username"];
}

?>

<script>
    document.getElementById("title").innerHTML = "My Gallery";
</script>

  <p class="headline" id="homeheadline">My Gallery</p>
    <div id="topline" align="right">
        <br>
        <a class="hdtext">Hello,</a>
        <a class="hdtext"><?php echo $name; ?></a>&thinsp;&hearts;
        &hairsp;
        <a class="hdtext" href="feed.php">Feed</a>
        &hairsp;
        <a class="hdtext" href="home.php">Home</a>
        &hairsp;
        <a class="hdtext" href="account.php">Account</a>
        &hairsp;
        <a id="logout" href="config/logout.php" onclick="return confirm('Are you sure to logout?');">Logout</a>
    </div>
</div>

<?php     

function numOfLikes($imgname, $imguser, $imgtime){
       
    $conn = db_connect();
    $sql = "SELECT * FROM likes WHERE imgname = '$imgname' AND imguser = '$imguser' AND imgtime = '$imgtime'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $res = $stmt->fetch();
    $conn = null;
    if ($res){
        $conn = db_connect();
        $sql = "SELECT SUM(likenum) FROM likes WHERE imgname = '$imgname' AND imguser = '$imguser' AND imgtime = '$imgtime'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $res = $stmt->fetch(); 
        return $res[0];
    } else {
        return 0;
    }
}

    $conn = db_connect();
    $sql = "SELECT * FROM imagelist where username = '$name' ORDER BY date_creation DESC";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $res = $stmt->fetchall();
    $conn = null;

    if (!$res){
        echo "<div align='center'>";
        echo "<div id='msgbox' style='height:250px'>";
        echo "<p id='myemptygallery'>You have not shared anything, go to your home page and share something with us!</p>";
        echo "<a href='home.php'><button class='button'>MySpace</button></a></div></div>";
    } else {
        $count = 0;
        while ($res[$count]){

            $imgname = $res[$count][0];
            $time = $res[$count][2];
            $likes = numOfLikes($imgname, $name, $time);

            echo "<td><div class='mygallery'>";
            echo "<img src=$imgname class='mygallerypic'>";
            echo "<br><br>";
            echo "<section align='right' style='margin-top: -270px; margin-right: 37px;'>";
            echo "<a style='color:darkred; font-size:28px;'>$likes</a>&nbsp;";
            echo '<img id="heart" style="margin-right:25px;" src="images/heart.png">';
            echo "<form id='delete' action='config/deletepostfromgallery.php' method='post'>";
            echo "<input type='hidden' name='imgname' value='$imgname'>";
            echo "<input type='hidden' name='createtime' value='$time'>";
            echo "<input type='hidden' name='username' value='$name'>";
            echo '<input type="submit" name="delete" value="Delete" class="redbutton"></button>';
            echo "</form></section></div></td>";
            $count++;
        }
    }
    
?>

</body>

<?php include 'control/footer.php';?>