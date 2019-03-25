<?php
include 'control/header.php';

session_start();
if (!isset($_SESSION['username'])){  
    echo "<script>alert('You need to sign in first.')</script>";
    echo "<script>location.href = 'index.php';</script>";
} else {
    $name = $_SESSION["username"];
}

?>

<script>
    document.getElementById("title").innerHTML = "Home";
</script>

    <p class="headline" id="homeheadline"></p>
    <div id="topline" align="right">
        <br>
        <a class="hdtext">Hello,</a>
        <a class="hdtext"><?php echo $name; ?></a>&thinsp;&hearts;
        &hairsp;
        <a class="hdtext" href="feed.php">Feed</a>
        &hairsp;
        <a class="hdtext" href="mygallery.php">Gallery</a>
        &hairsp;
        <a class="hdtext" href="account.php">Account</a>
        &hairsp;
        <a id="logout" href="config/logout.php" onclick="return confirm('Are you sure to logout?');">Logout</a>
    </div>
</div>

<div align="center">
        <img id="upload">
        <img id="addon" value="empty">
        <video autoplay="true" id="camerastream"></video>
</div>

<div align="center">
    <form action="config/upload.php" method='post' enctype="multipart/form-data"> 
        <input type="file" name="userfile" required>
        <input type="submit" name="submit" value="Upload Image">
    </form>
</div>

<?php 
include 'config/setup.php'; 

$conn = db_connect();
$sql = "SELECT uploadimg FROM upload WHERE username = '$name'";
$stmt = $conn->prepare($sql);
$stmt->execute();
$upload = $stmt->fetch();
$conn = null;

?> 

<div align = "center">
    <button class="button" onclick="addUpload('<?php if ($upload){ echo $upload[0]; } else { echo 'images/empty.png'; } ?>')">Use Uploaded Picture</button>&nbsp;&nbsp;&nbsp;
    <button class="button" onclick="removeUpload()">Remove Uploaded Picture</button>
</div>

<div id="filtergallery" align="center">
    <td><img onclick="addFilter('images/filter1.png')" class="filters" src="images/filter1.png"></a></td>
    <td><img onclick="addFilter('images/filter2.png')" class="filters" src="images/filter2.png"></a></td>
    <td><img onclick="addFilter('images/filter3.png')" class="filters" src="images/filter3.png"></a></td>
    <td><img onclick="addFilter('images/filter4.png')" class="filters" src="images/filter4.png"></a></td>
    <td><img onclick="addFilter('images/filter5.png')" class="filters" src="images/filter5.png"></a></td>
    <td><img onclick="addFilter('images/filter6.png')" class="filters" src="images/filter6.png"></a></td>
    <td><img onclick="addFilter('images/filter7.png')" class="filters" src="images/filter7.png"></a></td>
    <td><img onclick="addFilter('images/filter8.png')" class="filters" src="images/filter8.png"></a></td>
</div>

<div align="center">
    <button class="button" onclick="takeAPicture()">Capture the moment</button>
</div> 
<br>

<div align="center">    
    <canvas id="posts"></canvas> 
    <form name="canvasForm" action="config/process.php" method="post">
    <input type="hidden" name="canvasData" value="" required>
    <input type="submit" name="submit" value="Save to Gallery and Share with the World" class="button">
    </form>
</div>

<div align="center">
<br>

<?php
    $conn = db_connect();
    $sql = "SELECT * FROM imagelist where username = '$name' ORDER BY date_creation DESC";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $res = $stmt->fetchall();
    $conn = null;

    if ($res) {
        echo '<div style="overflow:auto;"><table><tr>';
        $count = 0;
        while($res[$count] && $count < 6){
            $imgname = $res[$count][0];
            $imgtime = $res[$count][2];

            echo "<td><div class='gallery_block'>";
            echo "<img src=$imgname class='gallery'>";
            echo "<br>";
            echo "<div align='center'>";
            echo "<form action='config/deletepostfromhome.php' method='post'>";
            echo "<input type='hidden' name='imgname' value='$imgname'>";
            echo "<input type='hidden' name='imgtime' value='$imgtime'>";
            echo "<input type='hidden' name='username' value='$name'>";
            echo '<input type="submit" name="delete" value="Delete" class="redbutton"></button>';
            echo "</form></div></div></td>";
            $count++;
        }
    echo "</tr><table></div>";
    }

?>

</div>
<script src="js/feature.js"></script>

</body>
<?php include 'control/footer.php';?>