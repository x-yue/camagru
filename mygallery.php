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

<div id="mygallery">
<?php     

// i could make it like the feed but only for the picture of one's own and add delete button
    $conn = db_connect();
    $sql = "SELECT * FROM imagelist where username = '$name'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $res = $stmt->fetch();
    $conn = null;
    if ($res){
        echo "<div align='center'>";
        echo "<div id='msgbox' style='height:250px'>";
        echo "<p id='myemptygallery'>You have not shared anything, go to your home page and share something with us!</p>";
        echo "<a href='home.php'><button class='button'>MySpace</button></a></div></div>";
    } else {
        echo "<td><div class='mygallery'>";
        echo "<img src='uploads/upload.png' onclick='selectPicture()' class='mygallerypic'>";
        echo "<br>";
        echo '<a>100</a>';   
        echo '<img id="heart" style="margin:auto;" src="images/heart.png">';
        echo '<button class="redbutton" onclick="deleteGalleryPhoto()">Delete</button>';
        echo "</div></td>";
        }
?>



</div>


</body>

<?php include 'control/footer.php';?>