<?php

// include "setup.php";

//syntax: mail($to, $subject, $message, $headers, $parameters);


// function deleteConfirmation($email){
// }

// // the message
// $msg = "First line of text\nSecond line of text";

// // use wordwrap() if lines are longer than 70 characters
// $msg = wordwrap($msg,70);

// mail(to,subject,message,headers,parameters);

// // send email
// mail("someone@example.com","My subject",$msg);


// use wordwrap() if lines are longer than 70 characters
// $msg = wordwrap($msg,70);
//headers     
    // // Always set content-type when sending HTML email
    // $headers = "MIME-Version: 1.0" . "\r\n";
    // $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    
    // // More headers
    // $headers .= 'From: <yue_x@icloud.com>' . "\r\n";
    // //$headers .= 'Cc: myboss@example.com' . "\r\n";
    // }
 
// function confirmedUser($username){
//     $active = "a";
//     $sql = "UPDATE loginsystem SET status = $active WHERE username = $username"; 
//     echo "<script>alert('Congratulations, you are all set! You can sign in now. :)')</script>";
//     echo "<script>location.href = '../index.php';</script>";
//     exit;
// }

// function sendConfirmationEmail($username, $email){

//     confirmedUser($username);
//     return 1;
// }



function testemail(){
    $name = "test";
    $password = "xx";
    $email  = "testeryuxu@gmail.com";

$subject = 'Signup | Verification'; // Give the email a subject 
$message = '
 
Thanks for signing up!
Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.
 
------------------------
Username: '.$name.'
Password: '.$password.'
------------------------
 
Please click this link to activate your account:
http://localhost:8300/camagru/confirmation.php?username='.$name.'$active=a
 
'; // Our message above including the link
                     
$headers = 'From:noreply@camagru.com' . "\r\n"; // Set from headers
if (mail($email, $subject, $message, $headers)){
    echo "ok";
} else {
    echo "problem";
} // Send our email

}

function errorEmail()
{
    echo "<script>alert('Mailing Sytem: Something went wrong, please try again.')</script>";
    echo "<script>location.href = '../signup.php';</script>";
	exit;
}

function sendConfirmationEmail($username, $email){
    $subject = "Confirmation Email with Camagru";
    $message = '
    
    Hello '.$username.'
    Thank you for signing up with Camagru! Your account has been created.
    
    Please click the link below to activate your account:
    http://localhost:8300/camagru/confirmation.php?email='.$email.'&username='.$username.'&active=a
    
    ';
    
    $header = "From: noreply@camagru.com" . "\r\n";
    if (mail($email, $subject, $message, $header)){
        echo "<script>alert('A confirmation email is sent to ".$email.", please click the link inside to activate your account.')</script>";
    } else {
        errorEmail();
    }
}

sendConfirmationEmail("test", "joyce008008@gmail.com");

?>