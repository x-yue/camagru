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
?>

	<a href="../feed.php"><img id="logo" src="/images/logo.png" alt="logo"><img></a>

<script>
    document.getElementById("title").innerHTML = "Home";
</script>

    <p class="headline" id="homeheadline"></p>
    <div align="right">
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

<div id="canvas_container" align="center">
        <img id="upload">
        <img id="addon" value="empty">
        <video autoplay="true" id="camerastream"></video>
</div>

<div align="center">
    <form action="config/upload.php" method='post' enctype="multipart/form-data">
        <input type="file" name="userfile" required>
        <input type="submit" name="submit" value="Upload Image">
        <?php
          //  if ($_POST["submit"] == "Upload Image" && isset($_POST["userfile"]))
          //      echo "<script>document.getElementById('upload').src='upload/upload.png';</script>";
        ?>
    </form>
</div>

<div align = "center">
    <button class="button" onclick="addUpload('uploads/upload.png')">Add Uploaded Picture to Screen</button>
</div>

<div align="center">
    <td><img onclick="addFilter('images/filter1.png')" class="filters" src="images/filter1.png"></a></td>
    <td><img onclick="addFilter('images/filter2.png')" class="filters" src="images/filter2.png"></a></td>
    <td><img onclick="addFilter('images/filter3.png')" class="filters" src="images/filter3.png"></a></td>
    <td><img onclick="addFilter('images/filter4.png')" class="filters" src="images/filter4.png"></a></td>
    <td><img onclick="addFilter('images/filter5.png')" class="filters" src="images/filter5.png"></a></td>
    <td><img onclick="addFilter('images/filter6.png')" class="filters" src="images/filter6.png"></a></td>
    <td><img onclick="addFilter('images/filter7.png')" class="filters" src="images/filter7.png"></a></td>
    <td><img onclick="addFilter('images/filter8.png')" class="filters" src="images/filter8.png"></a></td>
</div>

<!-- come back here after saving a picture --> 
<div align="center">
    <button class="button" onclick="takeAPicture()">Capture the Moment</button>
</div>

<?php
// create images/gallery/username folder  if it doesn't exist
// add picture to folder with static number image[$number].png;
// private 
// 
?>
<br>

<div align="center">
    <div id="gallery">
    <canvas id="posts"><img src=""></canvas>
    <canvas id="posts"><img src=""></canvas>
    <canvas id="posts"><img src=""></canvas>
  <!--
    <td><img src="" class="posts"></td>
    <td><img src="" class="posts"></td>
    <td><img src="" class="posts"></td>
    <td><img src="" class="posts"></td>  -->
</div>
<br> 
  <!-- it might be too complicated to publish
      <button class="button" onclick="publishPic()">Publish this picture</button>
-->
</div>

<script src="js/feature.js"></script>


<?php include 'control/footer.php';?>