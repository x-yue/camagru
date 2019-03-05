<?php
include ('control/header.php');

if (!isset($_SESSION['username'])){
    echo "<script>alert('You need to sign in first.')</script>";
    echo "<script type='text/javascript'>location.href = '../index.php';</script>";
}
?>

<script>
        document.getElementById("title").innerHTML = "Home";
</script>

<p class="headline" id="homeheadline"></p> 

    <div align="right"  >
        <br>
        <a id="username">Hello, </a>
        <a id="username"></a>&hearts; 
        <script>
            //verify if this works
            document.getElementById("username").innerHTML = $(username)
        </script>
        &nbsp;
        <a id="account" href="account.php">Account</a>
        &hairsp;
        <a id="logout" href="index.php" onclick="return confirm('Are you sure to logout?');">Logout</a>
    </div>
</div>

<div align="center">
    <video autoplay="true" id="camerastream" ></video>
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
    <form>
        <input type="file" name="picture_upload" accept="image/*">
    </form>
</div>
<br>

<div align="center">
    <td><a href="" onclick="addFilter()"><img class="filters" src="images/filter1.png"></a></td>
    <td><a href="" onclick="addFilter()"><img class="filters" src="images/filter2.png"></a></td>
    <td><a href="" onclick="addFilter()"><img class="filters" src="images/filter3.png"></a></td>
    <td><a href="" onclick="addFilter()"><img class="filters" src="images/filter4.png"></a></td>
    <td><a href="" onclick="addFilter()"><img class="filters" src="images/filter5.png"></a></td>
    <td><a href="" onclick="addFilter()"><img class="filters" src="images/filter6.png"></a></td>
    <td><a href="" onclick="addFilter()"><img class="filters" src="images/filter7.png"></a></td>
    <td><a href="" onclick="addFilter()"><img class="filters" src="images/filter8.png"></a></td>
</div>

<div align="center">
    <button class="button" onclick="takeAPicture()">Take a Picture</button>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <button class="button">Upload a Picture</button>
</div>

<script src="js/feature.js"></script>

<?php include('control/footer.php');?>