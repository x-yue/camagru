<?php
include 'control/header.php';

session_start();
if (!isset($_SESSION['username'])){  
    echo "<script>alert('You need to sign in first.')</script>";
    echo "<script>location.href = 'index.php';</script>";
} else {
    session_start();
    $name = $_SESSION["username"];
}

?>

<script>
    document.getElementById("title").innerHTML = "Account Information";
</script>

<p class="headline" id="homeheadline">Account Information</p> 
    <div id="topline" align="right"  >
        <br>
        <a class="hdtext">Hello,</a>
        <a class="hdtext"><?php echo $name; ?></a>&thinsp;&hearts;
        &hairsp;
        <a class="hdtext" href="feed.php">Feed</a>
        &hairsp;
        <a class="hdtext" href="home.php">Home</a>
        &hairsp;
        <a id="logout" href="config/logout.php" onclick="return confirm('Are you ure to log out?');">Logout</a>
    </div>
</div>

<!-- in this order: password - username - email address - delete account --> 


<div align="center" class="accinfo">
    
    <!-- Accout information -->
    <!-- <div class="changeform">
        <h2>Your information</h2>
        <label>Username</label> 
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a><?php //echo $name; ?></a>
        <br>
        <label>Email</label>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a><?php //echo $name; ?></a>


    </div> -->

    <!-- password table -->
    <div class="changeform">
        <h2>Change your password</h2>
        <form action="config/updatepw.php" method="post">
            <label for="login">Username</label>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&hairsp;: 
            <input type="text" name="user" placeholder="your username" class="input" required>
            <br>
            <label for="password">Old Password</label>
            &nbsp;&nbsp;&hairsp;: 
            <input type="password" name="oldpw" placeholder="your old password" class="input" required>
            <br>
            <label for="password">New Password</label>
            &thinsp;: 
            <input type="password" name="newpw" placeholder="minimum 6 characters" class="input" required>
            <br>
            <br>
            <div align="center">
                <input type="submit" name="submit" value="Submit" class="input">
            </div>
       </form>
    </div>

<!-- username table -->
    <div class="changeform">
        <h2>Change your username</h2>
        <form action="config/updateusername.php" method="post">
            <label for="login">Old Username</label>
            &nbsp;&nbsp;&hairsp;: 
            <input type="text" name="oldun" placeholder="your old username" class="input" required>
            <br>
            <label for="login">New Username</label>
            &thinsp;: 
            <input type="text" name="newun" placeholder="your new username" class="input" required>
            <br>
            <label for="password">Password</label>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&thinsp;: 
            <input type="password" name="password" placeholder="**********" class="input" required>
            <br>
            <br>
            <div align="center">
                <input type="submit" name="submit" value="Submit" class="input">
            </div>
       </form>
    </div>

<!-- email table -->
    <div class="changeform">
        <h2>Change your email address</h2>
        <form action="config/updateemail.php" method="post">
            <label for="email">Old E-Mail</label>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
            <input type="email" name="oldemail" class="input" placeholder="xxxxx@xxxx.xxx" required>
            <br>
            <label for="email">New E-Mail</label>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&hairsp;:
            <input type="email" name="newemail" class="input" placeholder="xxxxx@xxxx.xxx" required>
            <br>
            <label for="password">Password</label>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: 
            <input type="password" name="password" placeholder="**********" class="input" required>
            <br>
            <br>
            <div align="center">
                <input type="submit" name="submit" value="Submit" class="input">
            </div>
       </form>
    </div>

<!-- delete my account --> 
    <div class="changeform" id="shortchangeform">
        <h2>Delete Account</h2>
        <form action="config/deleteacc.php" method="post">
            <label for="email">E-Mail</label>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
            <input type="email" name="email" class="input" placeholder="xxxxx@xxxx.xxx" required>
            <br>
            <label for="password">Password</label>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&hairsp;: 
            <input type="password" name="password" placeholder="**********" class="input" required>
            <br>
            <br>
            <div align="center">
                <input type="submit" name="submit" value="Send an email for confirmation" class="input">
            </div>
       </form>
    </div>
</div>
</body>
<?php include 'control/footer.php';?>