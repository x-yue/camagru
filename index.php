<?php
include ('control/header.php');
if (isset($_SESSION['login']))
// if logged in-- > go to feed.php
//&_SESSION['login']=array();

##include "auth.php";
if (isset($_POST["username"]) AND isset($_POST["password"]) AND isset($_SESSION["username"]))
{
}

if ($_POST['submit'] == 'Sign In')
{
	$_SESSION['username'] = $_POST['username'];
	$_SESSION['password'] = $_POST['password'];
}

/*
value="<?PHP echo $_SESSION["password"]; ?>"
 */
?>

<script>
        document.getElementById("title").innerHTML = "Camagru";
</script>

<p class="headline">Camagru</p>
    <div id="login">
        <br>
    	<form action="config/signin.php" method= "post">
            <input type="text" name="username" placeholder="Login" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="submit" name="submit" value="Sign in" required>
            <!-- here to insert signin codes server side  --> 
        </form>
        <div style="height:3px;"><br></div>
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

<?php include('control/footer.php');?>