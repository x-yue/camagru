<?php
include 'control/header.php';

session_start();
if (isset($_SESSION['username'])){
    echo "<script>alert('You are already signed in.')</script>";
    echo "<script>location.href = 'feed.php';</script>";
}

?>

<script>
    document.getElementById("title").innerHTML = "Forget Password";
</script>

    <p class="headline">Camagru</p> 

    <div id="login">
        <br>
    	<form action="config/signin.php" method= "post">
            <input type="login" name="username" placeholder="Login" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="submit" name="submit" value="Sign in" required>
        </form>
        <div style="height:3px;"><br></div>    
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
<?php include 'control/footer.php';?>