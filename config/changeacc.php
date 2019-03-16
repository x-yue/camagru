<?php
include "emailsys.php";
include "setup.php";


function successfulChange(){
    echo "<script>alert('You have changed your information with success, please log in again');</script>";
    session_destroy();
    echo "<script>location.href='../index.php';</script>";
}

function successfulDelete(){
    echo "<script>alert('You have deleted your account with success, we will miss you, farewell!');</script>";
    session_destroy();
    echo "<script>location.href='../index.php';</script>";
}

//three table of changing informations 

if ($_post["submit"] == 'submit'); //);
$username = $_POST["username"];
$email = $_POST["emailp"];
//$password = hash ("" $_POST[]);

$msql = "UPDATE postes SET username = :username where id = :id";
$stmt = $conn->prepare($sql);
$stmt->execute(["username" => $username, "email"=>$email, "password"=>$password]);
echo "updated";



// //UPDATE table_name
// SET column1 = value1, column2 = value2, ...
// WHERE condition;









//DELETE ACCOUNT 
function verifyPassword($username){
    //use the signin system;
}

$usertbd = $_SESSION["username"];
$password = $_POST["password"];
if ($_POST["submit"] == "Send an email for confirmation" && verifyPassword($usertbd) == 1){
    $email = $_POST["email"];
    if (deleteConfirmation($email) == 1){
        $usertbd = $_SESSION["username"];
        $sql = "DELETE FROM longinsystem WHERE username = $usertbd";    
        $stmt = $conn->prepare($sql);
        $stmt->exexute();
        //search again with the $usertbd, if not found -->
        //successfulDelete(); 
    }
} 

// $sql = "INSERT INTO posts(username, email, password) values (:username, :email, :password)";
// $stmt = $conn->prepare($sql);
// $stmt->execute(["username" => $username, "email"=>$email, "password"=>$password]);
// echo "successful";

// $search = %post%;
// $sql = "SELECT * FROM posts WHERE username LIKE ?";
// $stmt = $conn->prepare($sql);
// $stmt->execute($search);
// $posts = $stmt->fetchAll();

// foreach($posts as $post){
//     echo $post->title . "<br>";
// }




?>

