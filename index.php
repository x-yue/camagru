<?php
include ('control/header.php');
if (isset($_SESSION['login']))
// if logged in-- > go to feed.php
//&_SESSION['login']=array();
?>
<body>
<img id="logo" src="/images/logo.png"><img>
<div class="banner">
    <div id="indexheadline">Camagru</div>
    <div id="login">
        <br>
    	<form action="" method= "post">
            <input type="text" name="login" placeholder="Login"/>
            <input type="password" name="passwd" placeholder="Password"/>
            <input type="submit" value="Sign in"/>
            <!-- here to insert signin codes server side  --> 
        </form>
	    <a id="signup" href="signup.php" >Sign up</a>
    </div>
</div>

<div id="welcomepage">
    Welcome to Camagru!
</div>

<?php include('control/footer.php');?>