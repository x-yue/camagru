<?php 

function error()
{
    echo "<script>alert('Something went wrong, please try again.')</script>";
    echo "<script type='text/javascript'>location.href = '../signup.php';</script>";
	exit;
}

function repeated_username(){
    echo "<script>alert('The account with this username already existed')</script>";
    echo "<script type='text/javascript'>location.href = '../signup.php';</script>";
    exit;
}

function repeated_email(){
    echo "<script>alert('The account with this email address already existed')</script>";
    echo "<script type='text/javascript'>location.href = '../signup.php';</script>";
    exit;
}

function password_secure(){
    echo "<script>alert('The password must contrain minimum 6 charactors')</script>";
    echo "<script type='text/javascript'>location.href = '../signup.php';</script>";
    exit;
}

function signedup(){
    echo "<script>alert('Congratulations, you are signed up! Sign in now :)')</script>";
    echo "<script type='text/javascript'>location.href = '../index.php';</script>";
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
?> 