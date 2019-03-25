<?php

include 'setup.php';

function tableExists($table)
{
    $conn = db_connect();
    $results = $conn->query("SHOW TABLES LIKE '$table'");
    $conn = null;
    if(!$results) {
        return 0;
    }
    if($results->rowCount()>0){
        return 1;
    }
}

function create_tables(){
    if (tableExists('loginsystem') == 0) {
        $conn = db_connect();   
        $sql1 = "CREATE TABLE loginsystem (
            username VARCHAR(60) NOT NULL,
            email VARCHAR(60) NOT NULL,
            passwd VARCHAR(255) NOT NULL,
            active VARCHAR(1) NOT NULL default 'i',
            email_notification INT(1) default 1
            )";
        $stmt = $conn->prepare($sql1);
        $stmt->execute();
        $conn = null;
    } 
    if (tableExists('imagelist') == 0) {
        $conn = db_connect();   
        $sql2 = "CREATE TABLE imagelist (
            image_location VARCHAR(255) NOT NULL,
            username VARCHAR(60) NOT NULL,
            date_creation DATETIME NOT NULL,
            comment TEXT default NULL,
            likes text default NULL
            )";
        $stmt = $conn->prepare($sql2);
        $stmt->execute();
        $conn = null;
    }
    if (tableExists('upload') == 0) {
        $conn = db_connect();   
        $sql3 = "CREATE TABLE upload (
            username VARCHAR(60) NOT NULL,
            uploadimg VARCHAR(255) NOT NULL
            )";
        $stmt = $conn->prepare($sql3);
        $stmt->execute();
        $conn = null;
    }
    if (tableExists('comments') == 0) {
        $conn = db_connect();   
        $sql4 = "CREATE TABLE comments (
            commenttext TEXT NOT NULL,
            commentuser VARCHAR(60) NOT NULL,
            commenttime DATETIME NOT NULL,
            imgname VARCHAR(255) NOT NULL,
            imguser VARCHAR(60) NOT NULL,
            imgtime DATETIME NOT NULL
            )";
        $stmt = $conn->prepare($sql4);
        $stmt->execute();
        $conn = null;
    }
    if (tableExists('likes') == 0) {
        $conn = db_connect();   
        $sql5 = "CREATE TABLE likes (
            likeuser VARCHAR(60) NOT NULL,
            likenum INT(1) NOT NULL,
            imgname VARCHAR(255) NOT NULL,
            imguser VARCHAR(60) NOT NULL,
            imgtime DATETIME NOT NULL
            )";
        $stmt = $conn->prepare($sql5);
        $stmt->execute();
        $conn = null;
    }
    echo '<script>alert("Tables created with success");</script>';
    echo '<script>location.href = "../index.php"</script>';
    exit;
}

create_tables();

?>