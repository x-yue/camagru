<?php

include "../config/setup.php";


//clean loginsystem
    $conn = db_connect();
    $sql = "DELETE FROM loginsystem WHERE email_notification = '1' OR email_notification = '0'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $conn = null;
    echo "<script>alert('loginsystem emptied')</script>";
    
    echo "<script>alert('upload is emptied once you sign out')</script>";

//clean imagelist
    $conn = db_connect();
    $sql = "DELETE FROM imagelist WHERE image_location LIKE 'example%' OR image_location LIKE 'gallery%'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $conn = null;   
    echo "<script>alert('imagelist will be emptied if all posts from example_images and gallery')</script>";

//clean comments
    $conn = db_connect();
    $sql = "DELETE FROM comments WHERE imgname LIKE 'example%' OR imgname LIKE 'gallery%'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $conn = null;
    echo "<script>alert('comments will be emptied for all posts from example_images and gallery')</script>";
//clean likes 
    $conn = db_connect();
    $sql = "DELETE FROM likes WHERE imgname LIKE 'example%' OR imgname LIKE 'gallery%' ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $conn = null;

echo "<script>alert('likes will be emptied for all posts from example_images and gallery')</script>";

echo "<script>alert('successfully deleted everything')</script>";
echo "<script>location.href='../index.php'</script>";
?>