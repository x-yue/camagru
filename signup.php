<?php
include 'control/header.php';

session_start();
if (isset($_SESSION['username'])){
    echo "<script>alert('You are already signed in.')</script>";
    echo "<script>location.href = 'feed.php';</script>";
}

?>

<script>
        document.getElementById("title").innerHTML = "Sign Up";
</script>

    <p class="headline">Sign Up</p>

    <div id="login">
        <br>
    	<form action="config/signin.php" method= "post">
            <input type="login" name="username" placeholder="Login" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="submit" name="submit" value="Sign in" required>
        </form>
        <div style="height:3px;"><br></div>    
        <a id="forgetpw" href="forgetpw.php">I forget my password</a>
    </div> 
</div>

<div align="center" class="signupform">
    <div id="form">
        <h2>Create your account</h2>
        <form action="config/newuser.php" method="POST">
            <label for="email">E-Mail</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&thinsp;&thinsp;:
            <input type="email" name="email" class="input" placeholder="xxxxx@xxxx.xxx" required>
            <br>
            <label for="login">Username</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&thinsp;: 
            <input type="text" name="username" class="input" placeholder="example: Pokemon" required>
            <br>
            <label for="password">Password</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&thinsp;&thinsp;&hairsp;: 
            <input type="password" name="password" placeholder="minimum 6 characters" class="input" required>
            <br>
            <label for="password">Repeat Password</label>&thinsp;&hairsp;: 
            <input type="password" name="verifypw" placeholder="minimum 6 characters" class="input" required>
            <br>
            <div align="center">
                <input type="submit" name="submit" value="Submit" class="input">
            </div>
       </form>
    </div>
    <br>
    <a href="index.php"><button class="button">Homepage</button></a>
</div>
</body>
<?php include 'control/footer.php';?>