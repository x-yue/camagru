<?php

if ($_post["submit"] == 'submit'); //);
$username = $_POST["username"];
$email = $_POST["emailp"];
//$password = hash ( $_POST[]);

$msql = "UPDATE postes SET username = :username where id = :id";
$stmt = $conn->prepare($sql);
$stmt->execute(["username" => $username, "email"=>$email, "password"=>$password]);
echo "updated";
?>