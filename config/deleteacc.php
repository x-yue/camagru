<?php 

/* $username = $_POST[]
// $email = $_POST[]
// $password = hash -- $_POST[]

$sql = "DELETE FROM posts WHERE username=:username";
$sql = "INSERT INTO posts(username, email, password) values (:username, :email, :password)";
$stmt = $conn->prepare($sql);
$stmt->execute(["username" => $username, "email"=>$email, "password"=>$password]);
echo "successful";

$search = %post%;
$sql = "SELECT * FROM posts WHERE username LIKE ?";
$stmt = $conn->prepare($sql);
$stmt->execute($search);
$posts = $stmt->fetchAll();

foreach($posts as $post){
    echo $post->title . "<br>";
}

*/

?>