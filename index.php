<?php
include ('control/header.php');
if (!isset($_SESSION['login']))
//&_SESSION['login']=array();
?>
<body>

<div class="banner">
    <div id="headline">Camagru</div>
    <div id="login">
    	<form action="" method= "post">
            <input type="text" name="login" placeholder="Login"/>
            <input type="password" name="passwd" placeholder="Password"/>
    		<input type="submit" value="Sign in"/>
	    </form>
	     <a id="signup" href="signup.php" >Sign up</a>
    </div>
</div>

<div id="welcomepage">
    Welcome to Camagru!
</div>
<?php include('control/footer.php');?>