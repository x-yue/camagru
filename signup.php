<?php
include ('control/header.php');
?>

<p class="headline">Sign Up</p>
    <div id="login">
        <br>
    	<form action="" method= "post">
            <input type="text" name="login" placeholder="Username"/>
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
            <label for="email">E-Mail</label>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&thinsp;:
            <input type="email" name="login_email" class="input" placeholder="xxxxx@xxxx.xxx" required>
            <br>
            <label for="login">Username</label>
            : 
            <input type="text" name="login_username" class="input" required>
            <br>
            <label for="password">Password</label>
            &thinsp;&hairsp;: 
            <input type="password" name="login_password" placeholder="minimum 6 characters" class="input" required>
            <br>
            <br>
            <div align="center">
                <input type="submit" value="Submit" class="input">
            </div>
       </form>
    </div>
</div>

<?php include('control/footer.php');?>