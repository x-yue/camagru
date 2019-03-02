<?php
include ('control/header.php');
if (!isset($_SESSION['login']))
 // if not logged in .. 

?>

<body>

<img id="logo" src="/images/logo.png"><img>

    <div class="banner">
        <p id="homeheadline"></p> 
        <br><a id="logout" href="index.php" onclick="return confirm('Are you sure to logout?');">Log out</a>
    </div>



<div align="center">
    <table>
        <tr>
         <canvas id="canvas">
            <option class="filter"><img src="images/filter1"><option>
            <option class="filter"><img src="images/filter2"><option>
            <option class="filter"><img src="images/filter3"><option>
            <option class="filter"><img src="images/filter4"><option>
            <option class="filter"><img src="images/filter5"><option>
            <option class="filter"><img src="images/filter6"><option>
            <option class="filter"><img src="images/filter7"><option>
            <option class="filter"><img src="images/filter8"><option>
            <video id="video"></video>
           
        <!-- confirm picture? --> 

            <img src="http://placekitten.com/g/320/261" id="photo" alt="photo">

            </canvas>
       
        </tr>
     <!--   <tr>
            <canvas class="filters">
            </canvas>
        </tr> -->
</table>
</div>

<div align="center"><button id="startbutton">Take a photo</button></div>    

<script src="js/feature.js"></script>
<?php include('control/footer.php');?>