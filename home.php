<?php
include ('control/header.php');
if (!isset($_SESSION['login']))
 // if not logged in .. 

?>

<body>

<img id="logo" src="/images/logo.png"><img>

    <div class="banner">
        <p id="homeheadline"></p> 
<!--    <br><a id="logout" href="index.php">Log out</a> -->
        <br><a id="logout" href="index.php" onclick="return confirm('Are you sure to logout?');">Logout</a>
    <script>    //    var logout = confirm("Are you sure?");
      //  function confirmLogOut(){   
        //    if(logout){
          //      href = "index.php";
            //} else {
              //  href = "home.php"
          //  }
       // }
            // need to revisit this script now it doesn't take confirmation 
        // same for feed.php
       /* 
        function confirmLogOut(){
            var returnValue = confirm("Are you sure?");
            if (returnValue === true){
                return true;
            }
            else {
                return false;
            }
        }*/
    </script>
    </div>



<div align="center">
    <table>
        <tr>
            <canvas id="canvas">
               <img id="photo" alt="The screen capture will appear in this box.">
            </canvas>
        </tr>
     <!--   <tr>
            <canvas class="filters">
            </canvas>
        </tr> -->

</div>

<div align="center"><button id="startbutton">Take a photo</button></div>    






<script src="js/feature.js"></script>
<?php include('control/footer.php');?>