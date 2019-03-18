<?php 

function db_connect(){
    include "database.php";
    try {
        $conn = new PDO($dsn, $root, $pass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (PDOException $e) {
        echo "Connection to database failed: " . $e->getMessage();
    }
}

?> 