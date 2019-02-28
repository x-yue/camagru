<?php
include ('control/header.php');
?>

<body>

<img id="logo" src="/images/logo.png"><img>

<div class="banner">
    <div id="signupheadline">Sign Up</div>
    <div id="login">
        <br>
    	<form action="" method= "post">
            <input type="text" name="login" placeholder="Login"/>
            <input type="password" name="passwd" placeholder="Password"/>
            <input type="submit" value="Sign in"/>
            <!-- here to insert signin codes server side  --> 
        </form>
    </div>
</div>

<div align="center" class="signupform">
    <div id="form">
        <h2>Create your account</h2>
        <form action method="post">
            <label for="login">Username</label>
             : 
            <input type="text" name="name_login" class="input" required>
            <br>
            <label for="password">Password</label>
             : 
            <input type="password" name="name_password" placeholder="minimum 6 characters" class="input" required>
            <br>
            <input type="submit" value="Submit" class="input">
       </form>
    </div>
</div>

<?php include('control/footer.php');?>