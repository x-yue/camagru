<?php
include ('control/header.php');
if (!isset($_SESSION['login']))
 // if not logged in .. 

?>

<p class="headline" id="homeheadline">Account Information</p> 

    <div align="right"  >
        <br>
        <a id="username"></a>    
        <script>
             //document.getElementById("username").innerHTML = $(username)
        </script>
        &nbsp;
        <a id="logout" href="index.php" onclick="return confirm('Are you sure to logout?');">Logout</a>
    </div>
</div>
        <!-- in this order: password - username - email address --> 
<!-- password table -->
<div align="center" class="accinfo">

    <div class="changeform" id="firstchangeform">
        <h2>Change your password</h2>
        <form action method="post">
            <label for="password">Old Password</label>
            &nbsp;&nbsp;&hairsp;: 
            <input type="password" name="login_oldpw" placeholder="your old password" class="input" required>
            <br>
            <label for="password">New Password</label>
            &thinsp;: 
            <input type="password" name="login_newpw" placeholder="minimum 6 characters" class="input" required>
            <br>
            <br>
            <div align="center">
                <input type="submit" value="Submit" class="input">
            </div>
       </form>
    </div>

<!-- username table -->
    <div class="changeform">
        <h2>Change your username</h2>
        <form action method="post">
        
            <label for="login">Old Username</label>
            &nbsp;&nbsp;&hairsp;: 
            <input type="text" name="login_oldun" placeholder="your old username" class="input" required>
            <br>
            <label for="login">New Username</label>
            &thinsp;: 
            <input type="text" name="login_newun" placeholder="your new username" class="input" required>
            <br>
            <label for="password">Password</label>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&thinsp;: 
            <input type="password" name="login_password" placeholder="**********" class="input" required>
            <br>
            <br>
            <div align="center">
                <input type="submit" value="Submit" class="input">
            </div>
       </form>
    </div>

<!-- email table -->
    <div class="changeform">
        <h2>Change your email address</h2>
        <form action method="post">
            <label for="email">Old E-Mail</label>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
            <input type="email" name="login_oldemail" class="input" placeholder="xxxxx@xxxx.xxx" required>
            <br>
            <label for="email">New E-Mail</label>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&hairsp;:
            <input type="email" name="login_newemail" class="input" placeholder="xxxxx@xxxx.xxx" required>
            <br>
            <label for="password">Password</label>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: 
            <input type="password" name="login_password" placeholder="**********" class="input" required>
            <br>
            <br>
            <div align="center">
                <input type="submit" value="Submit" class="input">
            </div>
       </form>
    </div>
</div>

<?php include('control/footer.php');?>