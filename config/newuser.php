<?php
include "emailsys.php";
include "setup.php";

//user status : a = activated i = inactivated b = banned
//examples 
// tester
// testeryuxu@gmail.com
// d43482912a81822f60c60ba51a7562ab2ff8b603f72d1fadaa...
// i
// banned
// example@example.com
// d43482912a81822f60c60ba51a7562ab2ff8b603f72d1fadaa...
// b
// admin
// joyce008008@gmail.com
// d43482912a81822f60c60ba51a7562ab2ff8b603f72d1fadaa...
// a
// test
// test
// test
// t

// if ($stmt->execute()) { 
//     // it worked
//  } else {
//     // it didn't
//  }

function error()
{
    echo "<script>alert('Creating Account: Something went wrong, please try again.')</script>";
    echo "<script>location.href = '../signup.php';</script>";
	exit;
}

function repeated_username(){
    echo "<script>alert('The account with this username already existed, please try something else')</script>";
    echo "<script>location.href = '../signup.php';</script>";
    exit;
}

function repeated_email(){
    echo "<script>alert('The account with this email address already existed, maybe try signing in?')</script>";
    echo "<script>location.href = '../signup.php';</script>";
    exit;
}

function passwordNoMatch(){
    echo "<script>alert('The passwords do not match, please try again')</script>";
    echo "<script>location.href = '../signup.php';</script>";
    exit;     
}

function passwordSecure(){
    echo "<script>alert('The password must contain at least 6 characters, please try again.');</script>";
    echo "<script>location.href = '../signup.php';</script>";
    exit;
}

function signedup($username, $email, $password){
    $status = "i"; // inactive account
    $sql = "INSERT INTO 'loginsystem' ('username', 'email', 'password', 'status') VALUES (:username, :email, :'password', :'status')";
    echo "111";
    $stmt = $conn->prepare($sql);
    echo "244222";
    $stmt->execute(["username" => $username, "email"=>$email, "password"=>$password, "status"=>$status]);
 //   sendConfirmationEmail($username, $email);
    echo "3333";
    echo "<script>alert('A confirmation email is sent to you, please click the link inside.')</script>";
    echo "<script>location.href = '../index.php';</script>";
    exit;
}

if ($_POST["submit"] == "Submit" && $_POST["username"] && $_POST["password"] && $_POST["email"] && $_POST["verifypw"])
{
    $username = $_POST["username"];
    $email = $_POST["email"];
    $raw_password = $_POST["password"];
    $salt = "sherlock_";
    if ($raw_password != $_POST["verifypw"]) {
        passwordNoMatch();
    } else {
        if (strlen($raw_password) < 6) {
            passwordSecure();
        }
    }

//check duplicate username
    $sql_username = "SELECT 'username' FROM 'loginsystem' WHERE 'username' = ?";
    $stmt = $conn->prepare($sql_username);
    if ($stmt->execute($username)){
         echo 'executed';
     } else {
         echo "wrong";
     };
    if ($stmt->rowCount() > 0){
        repeated_username();
    }
//check duplicate email
    $sql_email = "SELECT email FROM loginsystem WHERE email = ?";
    $stmt = $conn->prepare($sql_email);
    $stmt->execute($email);
    if ($stmt->rowCount() > 0){
        repeated_email();
    }
    $password = hash("whirlpool", $salt.$raw_password);
    signedup($username, $email, $password);
} else {
    error();
}


//ALTER TABLE `tableName` ADD UNIQUE `indexName` ( `columnName` )


// $sqluser="SELECT username FROM create_user WHERE username='$uname' ";
// $qresult=mysqli_query($conn, $sqluser);
// $count=mysqli_num_rows($qresult);


// $sql_insert = "INSERT into create_user (upload_img, fullname, username, role,  password) 
// values ('$file', '$fname' , '$uname' , '$role' ,  '$pword' )";

// $result=mysqli_query($conn, $sql_insert);

// name: email/ username/password/veryfypw/submit(value = Submit)
//active === 0;

/*



if ($_POST["submit"] == "Submit" && $_POST["username"] && $_POST["password"] && $_POST["email"])
{
    if (strlen($_POST["password"]) < 6)
        password_secure();
	if (!file_exists("private"))
		mkdir("private", 0755);
	if (!file_exists("private/passwd"))
	{
        $account["email"] = $_POST["email"];
		$account["username"] = $_POST["username"];
		$account["password"] = hash("whirlpool", $_POST["passwd"]);
		$list[] = $account;
		if (!file_put_contents("private/passwd", serialize($list)."\n"))
			error();
	}
	else
	{
		if (!$list = file_get_contents("private/passwd"))
			error();
		if (!$list = unserialize($list))
            error();
        $account["email"] = $_POST["email"];
		$account["username"] = $_POST["username"];
		$account["password"] = hash("whirlpool", $_POST["password"]);
		foreach ($list as $key => $elem)
		{
			if ($elem["username"] == $account["username"])
                repeated_username();
            if ($elem["email"] == $account["email"])
                repeated_email();
		}
		$list[] = $account;
		if (!file_put_contents("private/passwd", serialize($list)."\n"))
			error();
	}
    signedup();
}
else
	error();
*/

//this file is supposed to send a confirmation email to registered user
// create a confirmation link
//$from = 'localhost';
//$to = 'email';
//$subject = 'Confirmation email'

/*
function exist_user($login)
{
    $path = "private/";
    if (!file_exists($path)) {
        mkdir($path, 0777, true);
    }
    $file = $path.'user.csv';
    if (file_exists($file)) {
        if (($fileContent = file_get_contents($file))) {
            $fileContent = unserialize($fileContent);
            foreach ($fileContent as $key => $value) {
                if ($value['login'] === $login) {
                    return (TRUE);
                }
            }
        }
    }
    return (FALSE);
}*/
?>