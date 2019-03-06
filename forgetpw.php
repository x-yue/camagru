<?php
include ('control/header.php');
?>

<script>
    document.getElementById("title").innerHTML = "Forget Password";
</script>

<p class="headline">Camagru</p> 
    <div id="login">
        <br>
    	<form action="" method= "post">
            <input type="text" name="login" placeholder="Login"/>
            <input type="password" name="passwd" placeholder="Password"/>
            <input type="submit" name="submit" value="Sign in" >
            <!-- here to insert signin codes server side  --> 
        </form>
        <div style="height:3px;"><br></div>
	    <a id="signup" href="signup.php" >Sign Up</a>
    </div>
</div>

<div align="center" class="accinfo">
    <div id="form">
        <h2>Find my Password</h2>
        <form action method="post">
            <label for="email">E-Mail</label>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&hairsp;:
            <input type="email" name="email" class="input" style="width:200px;" placeholder="xxxxxxxx@xxxx.xxx" required>
            <p id="notice">* Please put your e-mail to find your password</p>
            <br>
            <div align="center">
                <input type="submit" name="forgetpw" value="Send me an e-mail" class="input">
            </div>
       </form>
    </div>
</div>

<?php include('control/footer.php');?>