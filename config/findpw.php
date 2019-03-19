<?php
include 'config/setup.php';

session_start();
if (isset($_SESSION['username'])){
    echo "<script>alert('You are already signed in.')</script>";
    echo "<script>location.href = 'feed.php';</script>";
}

function emailNoMatch(){
    echo "<script>alert('Sorry, there is no account link to this email address, please try again');</script>";
    echo "<script>location.href = '../index.php';</script>";
    exit;   
}

function emailSent() {
    echo "<script>alert('The password is sent to your mailbox.');</script>";
    echo "<script>location.href = '../index.php';</script>";
    exit;
}

if ($_POST["submit"] == "Send me an email"){
    if ($_POST["username"] && $_POST["email"]){

    }
    if ($_POST["username"] && !$_POST["email"]){

    }
    if (!$_POST["username"] && $_POST["email"]){

    } if (!$_POST["username"] && !$_POST["email"]){
        noInput();  
    } else {
        error();
    }
} else {
    error();
}
{
    // if email can be found from the database 
    // send an email with the password
    
}

// // the message
// $msg = "First line of text\nSecond line of text";

// // use wordwrap() if lines are longer than 70 characters
// $msg = wordwrap($msg,70);

// mail(to,subject,message,headers,parameters);

// // send email
// mail("someone@example.com","My subject",$msg);
function testEmail(){
$to = "yue_x@icloud.com";
$subject = "HTML email";

$message = "
<html>
    <head>
        <title>HTML email</title>
    </head>

    <body>
        <p>This email contains HTML Tags!</p>
        <table>
            <tr>
                <th>Firstname</th>
                <th>Lastname</th>
            </tr>
            <tr>
                <td>John</td>
                <td>Doe</td>
            </tr>
        </table>
    </body>
    
</html>
";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <yue_x@icloud.com>' . "\r\n";
//$headers .= 'Cc: myboss@example.com' . "\r\n";
}
testEmail();
//mail($to,$subject,$message,$headers);
?>