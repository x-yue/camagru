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
    if (!$res){
        echo "<div align='center'>";
        echo "<div id='msgbox' style='height:250px'>";
        echo "<p id='myemptygallery'>You have not shared anything, go to your home page and share something with us!</p>";
        echo "<a href='home.php'><button class='button'>MySpace</button></a></div></div>";
    } else {
    echo "<td><div class='mygallery'>";
    echo "<img src='images/obame.jpg' onclick='selectPicture()' class='mygallerypic'>";
    echo "<br>";
    echo '<a>100</a>';
    echo '<img id="heart" style="margin:auto;" src="images/heart.png">';
    echo '<button class="redbutton" onclick="deleteGalleryPhoto()">Delete</button>';
    echo "</div></td>";
    }
​
// i could make it like the feed but only for the picture of one's own and add delete button
        // $conn = db_connect();
        // $sql = "SELECT image_location FROM imagelist where username = '$name'";
        // $stmt = $conn->prepare($sql);
        // $stmt->execute();
        // $res = $stmt->fetchall();
        // $conn = null;
        // if (!$res){
        //     echo "<div align='center'>";
        //     echo "<div id='msgbox' style='height:250px'>";
        //     echo "<p id='myemptygallery'>You have not shared anything, go to your home page and share something with us!</p>";
        //     echo "<a href='home.php'><button class='button'>MySpace</button></a></div></div>";
        // } else {
        //     $count = 0; 
        //     echo "";
        //     while( $res[$count]){
        //         if($res[$count])
        //     $imgloc =$res[$count][0];
        //     $creatime_time = $res_time[$count][0];
        //     $numlikes = 0;
            
    //     echo "<td><div class='gallery_block'>";
    // echo "<img src=$imgloc  onclick='selectPicture()' class='gallery'>";
    // echo "<br>";
    // echo "<form align='center' action='config/deletepost.php' method='post'>";
    // echo "<input type='hidden' name='time' value='$creation_time'>";
    // echo "<input type='hidden' name='imgloc' value='$imgloc'>";
    // echo '<input type="submit" class="redbutton" name="delete" value="Delete">';
    // echo "</form>";
    // echo "</div></td>";
    // $count++;
    

        // echo "<td><div class='mygallery'>";
        // echo "<img src=$imgloc onclick='selectPicture()' class='mygallerypic'>";
        // echo "<br>";
        // echo "<p>$numlikes</p>";   
        // echo '<img id="heart" style="margin:auto;" src="images/heart.png">';
        // echo '<form>';
        // echo "<input type='hidden' name='time' value='$creation_time'>";
        // echo "<input type='hidden' name='imgloc' value='$imgloc'>";
        // echo '<div align="center"><input type="submit" name="delete" class="redbutton" value="delete"></div>';
        // echo '</form>';
        // echo "</div></td>";

        // // $count++;
        // }}
?>

</div>
</body>

<?php include 'control/footer.php';?>