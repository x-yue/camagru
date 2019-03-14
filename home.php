<?php
include 'control/header.php';
/*include 'config/signin.php';

if (!isset($_SESSION['username'])){
    // to remove later 
    $name = $_SESSION["username"];
    echo "<script>alert($name)</script>";
    echo "<script>alert('You need to sign in first.')</script>";
    echo "<script>location.href = '../index.php';</script>";
}*/
// include_once "config/fresh_upload.php"

?>

<script>
    document.getElementById("title").innerHTML = "Home";
</script>

    <p class="headline" id="homeheadline"></p>
    <div id="topline" align="right">
        <br>
        <a class="hdtext">Hello</a>&thinsp;&hearts;&thinsp;
        <script>
            //<a id="username" class="hdtext"></a>
            //verify if this works
         //   document.getElementById("username").innerHTML = $_SESSION['username'];
        </script>
        &nbsp;
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
include 'config/upload.php';
if ($uploaded_file){
    echo "good";
    echo $uploaded_file;
}
?>

<div align = "center">
    <button class="button" onclick="addUpload('<?php include 'config/upload.php'; echo $uploaded_file;?>')">Use Uploaded Picture</button>&nbsp;&nbsp;&nbsp;
    <button class="button" onclick="removeUpload()">Remove Uploaded Picture</button>
</div>

<div id="filterGallery" align="center">
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
?>
<br>

<div align="center">
    <canvas id="posts"></canvas>
    <br> 
    <button class="button" onclick="saveToGalley()">Save to Gallery</button>
</div>

<div align="center" id="gallery">
    onclick="selectPicture()"
    <td><img src="" class="posts"></td>
    <td><img src="" class="posts"></td>
    <td><img src="" class="posts"></td>
    <td><img src="" class="posts"></td>
    <br>
    <button class="button" onclick="deleteSelected()">Delete This Picture</button>
</div>

<script src="js/feature.js"></script>


<?php include 'control/footer.php';?>