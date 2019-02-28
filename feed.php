<?php
include ('control/header.php');
if (!isset($_SESSION['login']))
 //   return index.php;
?>

<body>

<img id="logo" src="/images/logo.png"><img>

    <div class="banner">    
        <p id="feedheadline">Newsfeed</p> 
        <br><a id="logout" href="index.php" onclick="return confirm('Are you sure to logout?');">Logout</a>
     <!--   <br><a onclick="confirmLogOut()" id="logout" href="index.php" >Log out</a> -->
        <script>
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
    <iframe src=""id="scrollingfeed" scrolling="yes">
<!-- src => where the pictures are saved! -->  

    </iframe>
</div>








        <script src="js/feature.js"></script>
<?php include('control/footer.php');?>