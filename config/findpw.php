<?php

function emailNoMatch(){
    echo "<script>alert('Sorry, there is no account link to this email address, please try again');</script>";
    exit;   
}

function emailSent() {
    echo "<script>alert('The password is sent to your mailbox.');</script>";
    echo "<script>location.href = '../index.php';</script>";
    exit;
}

if ($_POST["forgetpw"] == "Send me an e-mail" && $_POST["email"])
{
    // if email can be found from the database 
    // send an email with the password
    
}

?>
