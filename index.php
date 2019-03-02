<?php
include ('control/header.php');
if (isset($_SESSION['login']))
// if logged in-- > go to feed.php
//&_SESSION['login']=array();
?>

<p class="headline">Camagru</p>
    <div id="login">
        <br>
    	<form action="" method= "post">
            <input type="text" name="login" placeholder="Login"/>
            <input type="password" name="passwd" placeholder="Password"/>
            <input type="submit" value="Sign in"/>
            <!-- here to insert signin codes server side  --> 
        </form>
        <div style="height:3px;"><br></div>
        <a id="forgetpw" href="reinitiatepw.php">I forget my password</a>
    </div>
</div>

<div id="welcomepage">
    Welcome to Camagru!
</div>
<br><br>
<div align="center">
    <a href="signup.php"><button class="button">Sign Up</button></a>
</div>

<?php include('control/footer.php');?>