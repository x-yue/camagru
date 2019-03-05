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
        <video autoplay="true" id="camerastream">
        <img id="addon" type="images/*"></video>
    
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

<div align="center">
    <td><a href="" onclick="document.getElementById('addon').src='images/filter1.png'"><img class="filters" src="images/filter1.png"></a></td>
    <td><a href="" onclick="document.getElementById('addon').src='images/filter2.png'"><img class="filters" src="images/filter2.png"></a></td>
    <td><a href="" onclick="document.getElementById('addon').src='images/filter3.png'"><img class="filters" src="images/filter3.png"></a></td>
    <td><a href="" onclick="document.getElementById('addon').src='images/filter4.png'"><img class="filters" src="images/filter4.png"></a></td>
    <td><a href="" onclick="document.getElementById('addon').src='images/filter5.png'"><img class="filters" src="images/filter5.png"></a></td>
    <td><a href="" onclick="document.getElementById('addon').src='images/filter6.png'"><img class="filters" src="images/filter6.png"></a></td>
    <td><a href="" onclick="document.getElementById('addon').src='images/filter7.png'"><img class="filters" src="images/filter7.png"></a></td>
    <td><a href="" onclick="document.getElementById('addon').src='images/filter8.png'"><img class="filters" src="images/filter8.png"></a></td>
</div>
<!-- come back here after saving a picture --> 
<div align="center">
    <button class="button" onclick="takeAPicture()">Take a Picture</button>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <!--   <form>
    <input type="file" name="picture_upload" accept="image/*">
    </form> -->
    <button type="file" name='picture_upload' accept='image/*' class="button" onclick="takeAPicture()">Upload a Picture</button>
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