<?php
/*
login page:
// You'd put this code at the top of any "protected" page you create

// Always start this first
session_start();

if ( isset( $_SESSION['user_id'] ) ) {
    // Grab user data from the database using the user_id
    // Let them access the "logged in only" pages
} else {
    // Redirect them to the login page
    header("Location: http://www.yourdomain.com/login.php");
} */
?>

<?php

session_start();
unset($_SESSION["username"]);
if (session_destroy()){
    header("location:../index.php");
} else {
    echo "<script>alert('there is a problem with signing out, please try again')</script>";
}

?>