<?php
include ('control/header.php');
?>

<body>
<div class="banner">
    <div id="signupheadline">Sign up</div>
</div>

<div class="signuform">
    <div id="form">
        <h2>Create your account</h2>
        <form action method="post">
            <label for="login">Login</label>
             : 
            <input type="text" name="name_login" class="input" required>
            <br>
            <label for="password">Password</label>
             : 
            <input type="password" name="name_password" class="input" required>
            <br>
            <input type="submit" value="Submit" class="input">
       </form>
    </div>
</div>


<script src="js/feature.js"></script>

<?php include('control/footer.php');?>