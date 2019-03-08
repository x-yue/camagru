<?php
include 'control/header.php';
/*include 'config/signin.php';

if (!isset($_SESSION['username'])){
    // to remove later 
    $name = $_SESSION["username"];
    echo "<script>alert($name)</script>";
    echo "<script>alert('You need to sign in first.')</script>";
    echo "<script type='text/javascript'>location.href = '../index.php';</script>";
}*/


?>

<script>
    document.getElementById("title").innerHTML = "Home";
</script>

<p class="headline" id="homeheadline"></p>

    <div align="right">
        <br>
        <a id="greetings">Hello, </a>
        <a id="username">Friend</a>&thinsp;&hearts; 
        <script>
            //verify if this works
         //   document.getElementById("username").innerHTML = $_SESSION['username'];
        </script>
        &nbsp;
        <a id="account" href="account.php">Account</a>
        &hairsp;
        <a id="logout" href="config/logout.php" onclick="return confirm('Are you sure to logout?');">Logout</a>
    </div>
</div>

<div align="center">
        <img id="upload" src="images/empty.png">
        <img id="addon" src="images/empty.png">
        <video autoplay="true" id="camerastream"></video>
        <script>
            var video = document.querySelector("#camerastream");
          
            if (navigator.mediaDevices.getUserMedia) {       
	            navigator.mediaDevices.getUserMedia({video: true})
                .then(function(stream) {
                    video.srcObject = stream;
                 })
                .catch(function(error) {
                    console.log("Something went wrong!");
                });
            }
        </script>
</div>

<div align="center" >
    <form action="config/upload.php" method='post' enctype="multipart/form-data">
        <input type="file" name="userfile">
        <input type="submit" name="submit" value="Upload Image">
        <?php
      //      if ($_POST["submit"] == "Upload Image" && isset($_POST["uploadfile"]))
        //        echo "<script>document.getElementById('upload').src=;</script>";
        ?>
    </form>
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
    <button class="button" onclick="takeAPicture()">Take a Picture</button>
  <!--      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

      

 <form action="config/upload.php" method='post' accept="image/*">
        <input type="file" accept="image/*">
        <input type="submit" value="Upload Image" name="submit">
        <button name='picture_upload' accept='image/*' class="button" onclick="takeAPicture()">Upload a Picture</button>
        </form>

<form action="config/upload.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>

<input type='file' />
<br><img id="myImg" src="#" alt="your image" height=200 width=100>
        -->


</div>
<br>

<div align="center" id="gallery">
   <!-- <td><img class="posts" ></td> -->

    <script>
//        return "<td><img class="posts" src=''><td>";
    </script>
</div>


<script src="js/feature.js"></script>


<?php

include 'control/footer.php';

?>