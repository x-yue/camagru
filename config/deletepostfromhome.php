<?php 

include "setup.php";

function error(){
    echo "<script>alert('Something went wrong, please try again.')</script>";
    echo "<script>location.href = '../mygallery.php';</script>";
	exit;
}

session_start();
if (!isset($_SESSION['username'])){  
    echo "<script>alert('You need to sign in first.')</script>";
    echo "<script>location.href = 'index.php';</script>";
} else {
    $name = $_SESSION["username"];
}

if ($_POST['delete'] == "Delete" && $_POST["imgtime"] && $_POST["imgname"] && $_POST["username"])
{
    $imgtime = $_POST["imgtime"];
    $imgname = $_POST["imgname"];
    $username = $_POST["username"];

    echo $imgtime;
    echo $imgname;
    echo $username;

    $conn = db_connect();
    $sql = "DELETE FROM imagelist WHERE username = ? AND image_location = ? AND date_creation = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$username, $imgname, $imgtime]);
    $conn = null;

    echo "<script>location.href='../home.php'</script>";
} else {
    error();
}

?>