<?php
include 'control/header.php';
// include 'config/signin.php';

// if (isset($_SESSION['username'])){  
//     echo "<script>location.href = '/camagru/feed.php';</script>";
// }
// ?>

<script>
    document.getElementById("title").innerHTML = "Forget Password";
</script>

    <p class="headline">Camagru</p> 

    <?php include "config/signin.php"; ?>      
	    <a id="signup" href="signup.php" >Sign Up</a>
    </div>
</div>

<div align="center" class="accinfo">
    <div id="form">
        <h2>Find my Password</h2>
        <form action="config/findpw.php" method="post">
            <label for="email">E-Mail</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&hairsp;:
            <input type="email" name="email" class="input" style="width:200px;" placeholder="xxxxxxxx@xxxx.xxx" required>
            <p id="notice">* Please put your e-mail to find your password</p>
            <br>
            <div align="center">
                <input type="submit" name="forgetpw" value="Send me an e-mail" class="input">
            </div>
       </form>
    </div>
    <br>
    <a href="index.php"><button class="button">Homepage</button></a>
</div>
</body>
<?php include ('control/footer.php');?>