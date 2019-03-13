<?php 
require "database.php";

try {
    $conn = new PDO($dsn, $username, $password);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       // echo "Connected successfully";
} catch (PDOException $e) {
    echo "Connection failed because: " . $e->getMessage();
}











/* $username = $_POST[]
// $email = $_POST[]
// $password = hash -- $_POST[]

$sql = "INSERT INTO posts(username, email, password) values (:username, :email, :password)";
$stmt = $conn->prepare($sql);
$stmt->execute(["username" => $username, "email"=>$email, "password"=>$password]);
echo "successful";

function error()
{
    echo "<script>alert('Something went wrong, please try again.')</script>";
    echo "<script>location.href = '../signup.php';</script>";
	exit;
}

function repeated_username(){
    echo "<script>alert('The account with this username already existed')</script>";
    echo "<script>location.href = '../signup.php';</script>";
    exit;
}

function repeated_email(){
    echo "<script>alert('The account with this email address already existed')</script>";
    echo "<script>location.href = '../signup.php';</script>";
    exit;
}

function password_secure(){
    echo "<script>alert('The password must contrain minimum 6 charactors')</script>";
    echo "<script>location.href = '../signup.php';</script>";
    exit;
}

function signedup(){
    echo "<script>alert('Congratulations, you are signed up! Sign in now :)')</script>";
    echo "<script>location.href = '../index.php';</script>";
    exit;
}

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

?> 