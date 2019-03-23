<?php

include 'setup.php';

session_start();
if (!isset($_SESSION['username'])){  
    echo "<script>alert('You need to sign in first.')</script>";
    echo "<script>location.href = 'index.php';</script>";
} else {
    $session_user = $_SESSION["username"];
}

if (isset($_POST["click"])){
    $createdate = $_POST["date"];
    $createtime = $_POST["time"];
    $time = $createdate . ' ' . $createtime;
    $imgname = $_POST["imgname"];
    $imguser = $_POST['imguser'];

    $conn = db_connect();
    $sql = "SELECT * FROM imagelist WHERE username = '$imguser' AND image_location = '$imgname' AND date_creation = '$time'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $res = $stmt->fetch();
    $conn = null;

//like needs to be stored in array
// [0] likeuser
// [1] likenum
// likes should be a while loop to add up all the likes 

    // $likes = $res[4];
    // $input = $_POST["click"];
    // if ($input == "Like"){
    //     $likes++;
    // }
    
    // $i = 0;
    // while ($likes[$i])
    //     if ($likes[$i] == $session_user)
            
    //     else {
    //         $i++;
    //     }
    // }

    // if ($input == "Unlike"){
    //     $likes--;
    // }
    $conn = db_connect();
    $sql = "UPDATE imagelist SET likes = '$likes' WHERE username = '$imguser' AND image_location = '$imgname' AND date_creation = '$time'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $conn = null;
    echo "<script>location.href='../feed.php';</script>";
}

?>