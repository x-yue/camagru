<?php
include 'control/header.php';

session_start();
if (!isset($_SESSION['username'])){  
    echo "<script>alert('You need to sign in first.')</script>";
    echo "<script>location.href = 'index.php';</script>";
} else {
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
        <a class="hdtext" href="mygallery.php">Gallery</a>
        &hairsp;
        <a class="hdtext" href="home.php">Home</a>
        &hairsp;
        <a id="logout" href="config/logout.php" onclick="return confirm('Are you sure to log out?');">Logout</a>
    </div>
</div>

<!-- in this order: password - username - email address - delete account --> 

<div align="center" class="accinfo">

<!--------------------- deactivate email notif for comments -----------> 
<!-- value = 1 / 0 -->
<div class="changeform" id="shortchangeform" style="height:150px;">
        <h2>Email Notifications</h2>
        <form action="config/commentactive.php" method="post"> 
            <!-- <input type="checkbox" name="commentnotif" class="input" value="true">Deactive notification when sone -->
            <div align="center">
                &thinsp;&thinsp;<input type="submit" name="deactive" value="Deactivate Email Notifications" class="input">
                <br>
                <input type="submit" name="active" value="Reactivate Email Notifications" class="input">
                <!-- <input type="submit" name="submit" value="<?php if ($notifstatus = 1){ echo 'Deactivate Email Notifications'; } else { echo 'Activate Email Notifications'; } ?>" class="input"> -->
            </div>
       </form>
    </div>

<!------------- password table -------------------->
    <div class="changeform" id="shortchangeform">
        <h2>Change your password</h2>
        <form action="config/updatepw.php" method="post">
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

<!--------------------- username table ------------->
    <div class="changeform" id="shortchangeform">
        <h2>Change your username</h2>
        <form action="config/updateusername.php" method="post">
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

<!--------------------- email table -------------------->
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

<!--------------------- delete my account ------------------> 
    <div class="changeform" id="shortchangeform">
        <h2>Delete Account</h2>
        <form action="config/deleteacc.php" method="post">
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