<?php
include "emailsys.php";
include "setup.php";

function error()
{
    echo "<script>alert('Something went wrong, please try again.')</script>";
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

function signedup(){
    sendConfirmationEmail($email);
    echo "<script>alert('A confirmation email is sent to you, please click the link inside.')</script>";
    echo "<script>location.href = '../index.php';</script>";
    exit;
}

function confirmedUser(){
    echo "<script>alert('Congratulations, you are all set! You can sign in now. :)')</script>";
    echo "<script>location.href = '../index.php';</script>";
    exit;
}


if ($_POST["submit"] == "Submit" && $_POST["username"] && $_POST["password"] && $_POST["email"] && $_POST["verifypw"])
{
    $email = $_POST["email"];
    $username = $_POST["username"];
    $raw_password = $_POST["password"];
    $salt = "sherlock_";

    if ($raw_password != $_POST["verifypw"]) {
        echo "<script>alert('The passwords do not match, please try again')</script>";
        echo "<script>location.href = '../signup.php';</script>";
        exit;        
    } else {
        if (strlen($raw_password) < 6) {
        echo "<script>alert('The password must contain at least 6 characters, please try again.');</script>";
        echo "<script>location.href = '../signup.php';</script>";
        exit;
        }
    }
    $stmt = $conn->prepare("SELECT username FROM loginsystem WHERE username = ?");
    $stmt->execute($username);
    if ($stmt->rawCount() > 0){
        echo "test";
        repeated_username();
    }
    echo "test1";

    $stmt = $conn->prepare("SELECT email FROM loginsystem WHERE ? = email");
    $stmt->execute($email);
    if ($stmt->rawCount() > 0){
        repeated_email();
    }
    echo "test2";

    //do a search in database for usernames and emails if there is repeated answer 
    //otherwise insert client in the databse 
    //$password = hash("whirlpool", $salt.$raw_password);
    // $sql = "INSERT INTO loginsystem(username, email, password) values (:username, :email, :password)";
    // $stmt = $conn->prepare($sql);
    // $stmt->execute(["username" => $username, "email"=>$email, "password"=>$password]);
    echo "tes3";
    
    signedup();

} else {
    error();
}

// // user status : 
// a = activated
// i = inactivated
// d = deactivated
// b = banned

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