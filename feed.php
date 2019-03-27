<?php
include 'control/header.php';
include "config/setup.php";

session_start();
if (!isset($_SESSION['username'])){  
    echo "<script>alert('You need to sign in first.')</script>";
    echo "<script>location.href = 'index.php';</script>";
} else {
    $session_name = $_SESSION["username"];
}

?>

<script>
    document.getElementById("title").innerHTML = "Feed";
</script>

    <p class="headline">Newsfeed</p>
    <div id="topline" align="right">
        <br>
        <a class="hdtext">Hello,</a>
        <a class="hdtext"><?php echo $session_name; ?></a>&thinsp;&hearts;
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

    function showComments($imgname, $imguser, $imgtime){
        $conn = db_connect();
        $sql = "SELECT commenttext, ' ', commentuser, ' ', commenttime FROM comments WHERE imgname = '$imgname' AND imguser = '$imguser' AND imgtime = '$imgtime' ORDER BY commenttime DESC";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $res = $stmt->fetchall();
        $conn = null;
        
        $count = 0;
        while($res[$count]){
            $commentuser = $res[$count]['commentuser'];
            $commenttext = $res[$count]['commenttext'];
            echo "<a id='commentuser'>$commentuser : </a>";
            echo "<a id='commenttext'>$commenttext</a>";
            $count++;
            echo "<br>";
        }
    }

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
        // ppp = post per page
        $ppp = 5;
        while ($res[$count]){
            $count++;
        }
        $totalpage = (INT)($count / $ppp + 1);

        if (isset($_GET["page"])){
            $pagenum = $_GET["page"];
			if ($pagenum >= $totalpage){
				$pagenum = $totalpage;
			}
			if ($_GET['page'] == 0){
                $pagenum = 1;
            }
        } else {
            $pagenum = 1;
        }            
        $count = ($pagenum - 1) * $ppp;

        //page buttons
        $lastpage = $pagenum - 1;
        $nextpage = $pagenum + 1;
        echo "<br>";
        if ($lastpage > 0){
            echo "<a href='http://localhost:8300/camagru/feed.php?page=$lastpage' class='button'>Last Page</a>"; 
            echo "&nbsp;";
        }
        echo "<a id='pagenum'>page $pagenum</a>";
        if ($nextpage <= $totalpage){            
            echo "&nbsp;";
            echo "<a href='http://localhost:8300/camagru/feed.php?page=$nextpage' class='button'>Next Page</a>"; 
        }
    
        $i = 0;
        while ($res[$count] && $i < $ppp){
            // block
            $imgname = $res[$count][0];
            $imguser = $res[$count][1];
            $time = $res[$count][2];
            $create = explode(' ', $time);
            $createdate = $create[0];
            $createtime = $create[1];

            echo "<div align='left' class='feed'>";
            echo "<table><tr align='left'><img class='feedphoto' src=$imgname></tr>";
            echo '<div align="right">';
            echo "<p id='feedusername'>@$imguser</p>";
            echo "<p id='feedusername' style='font-size:15px;'>$createdate</p>";
            echo '<div align="right" style="margin-top: -38px;">'; 
            $likes = numOfLikes($imgname, $imguser, $time);
            echo "<a id='numofheart'>$likes </a>";
            echo '<img id="heartfeed" src="images/heart.png"></div>';
            echo "<div align='left' style='margin-top: 20px'>";
            echo "<div id='commenthistory'>";
            $comments = showComments($imgname, $imguser, $time);
            echo "</div>";
            echo '<div align="right">';
            echo "<form id='commentform'action='config/comment.php' method='post'>";

            echo "<input type='hidden' name='date' value=$createdate>"; 
            echo "<input type='hidden' name='time' value=$createtime>"; 
            echo "<input type='hidden' name='imgname' value=$imgname>";  
            echo "<input type='hidden' name='imguser' value=$imguser>"; 
            echo "<input type='hidden' name='page' value=$pagenum>"; 

            echo "<input id='commentbox' type='text' name='commentaire' placeholder='Leave a comment...' required>";
            echo "<input type='submit' name='submitcomment' value='Comment'>&nbsp;";
            echo "</form>";

            echo "<form id='likeunlike' action='config/likeunlike.php' method='post'>";
            echo "<input type='hidden' name='date' value=$createdate>"; 
            echo "<input type='hidden' name='time' value=$createtime>"; 
            echo "<input type='hidden' name='imguser' value=$imguser>"; 
            echo "<input type='hidden' name='imgname' value=$imgname>"; 
            echo "<input type='hidden' name='page' value=$pagenum>"; 

            echo "<input id='likebutton' type='submit' name='click' value='Like'>"; 
            echo "<input id='likebutton' type='submit' name='click' value='Unlike'>"; 
            echo "</form>";
            echo "<br>";
            echo '</div></table></div><br>';
            $count++;
            //block
            $i++;
            }

            //page buttons
            echo "<br>";
            if ($lastpage > 0){
                echo "<a href='http://localhost:8300/camagru/feed.php?page=$lastpage' class='button'>Last Page</a>"; 
                echo "&nbsp;";
            }
            echo "<a id='pagenum'>page $pagenum</a>";
            if ($nextpage <= $totalpage){
                echo "&nbsp;";
                echo "<a href='http://localhost:8300/camagru/feed.php?page=$nextpage' class='button'>Next Page</a>"; 
            }
        }
    
?>

</div>

</body>

<?php include 'control/footer.php';?>
