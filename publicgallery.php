<?php
include 'control/header.php';
include "config/setup.php";

session_start();
if (isset($_SESSION['username'])){
    echo "<script>alert('You are already signed in.')</script>";
    echo "<script>location.href = 'feed.php';</script>";
}

?>

<script>
    document.getElementById("title").innerHTML = "PublicGallery";
</script>

    <p class="headline">Newsfeed</p>
    <div id="login">
        <br>
    	<form action="config/signin.php" method= "post">
            <input type="login" name="username" placeholder="Login" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="submit" name="submit" value="Sign in" required>
        </form>
        <div style="height:3px;"><br></div>
        <a id="signup" href="index.php">Homepage</a> &nbsp;
        <a id="signup" href="signup.php">Sign up</a> &nbsp;
        <a id="forgetpw" href="forgetpw.php">I forget my password</a>
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
            $likes = $res[$count][4];

            echo "<div align='left' class='feed'  style='height:550px;'>";
            echo "<table><tr><img class='feedphoto' src=$imgname></tr>";
            echo '<div align="right">';
            echo "<p id='feedusername'>@$imguser</p>";
            echo "<p id='feedusername' style='font-size:15px;'>$time</p>";
            echo '<div align="right" style="margin-top:-35px;">';
            echo "<a style='color:darkred; font-size: 20px;'>$likes </a>";  
            echo '<img style="height:17px; width:17px;" src="images/heart.png">';           
            echo '</div></table></div><br>';
            $count++;
        }
    }    
    exit;

?>

</div>
</body>

<?php include 'control/footer.php';?>