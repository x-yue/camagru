<?php
include 'control/header.php';

session_start();
if (!isset($_SESSION['username'])){  
    echo "<script>alert('You need to sign in first.')</script>";
    echo "<script>location.href = 'index.php';</script>";
} else {
    session_start();
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
// include 'config/upload.php'; 

// echo "<br>";
// echo "test";
// echo "<br>";
// echo uploadFileName();
// echo "<br>";
?> 

<!-- change the uploading system to database  -->

<div align = "center">
    <button class="button" onclick="addUpload('uploads/upload.png')">Use Uploaded Picture</button>&nbsp;&nbsp;&nbsp;
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

<?php
// create images/gallery/username folder  if it doesn't exist
// add picture to folder with static number image[$number].png;
// private 
// 
// echo '<img src="data:image/jpeg;base64,' . base64_encode($row['destinationimage']) . '" />';
?>
<br>

<div align="center">
    <canvas id="posts"></canvas>
    <br> 
    <button class="button" onclick="saveToGalley()">Save to Gallery and Share with Friends</button>
</div>
<br>
<div align="center">
  <?php
    echo "<td><img src='' onclick='selectPicture()' class='gallery'></td>";
    echo "<td><img src='' onclick='selectPicture()' class='gallery'></td>";
    echo "<td><img src='' onclick='selectPicture()' class='gallery'></td>";
    echo "<td><img src='' onclick='selectPicture()' class='gallery'></td>";
    echo "<br>"
    ?>
</div>

<script src="js/feature.js"></script>

</body>

<?php include 'control/footer.php';?>