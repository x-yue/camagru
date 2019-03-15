<?php
include 'control/header.php';

// if (isset($_SESSION['login']))
// if logged in-- > go to feed.php
//&_SESSION['login']=array();

##include "auth.php";
///if (isset($_POST["username"]) AND isset($_POST["password"]) AND isset($_SESSION["username"]));



?>

<script>
        document.getElementById("title").innerHTML = "Camagru";
</script>

    <p class="headline">Camagru</p>

<?php include "config/signin.php"; ?>
        <a id="forgetpw" href="forgetpw.php">I forget my password</a>
    </div>
</div>

<div id="welcomepage">
    Welcome to Camagru!
</div>
<br><br>
<div align="center">
    <a href="signup.php"><button class="button">Sign Up</button></a>
</div>
</body>
<?php include ('control/footer.php');?>