<?php 
require "database.php";

try {
    $conn = new PDO($dsn, $username, $password);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       // echo "Connected successfully";
} catch (PDOException $e) {
    echo "Connection failed because: " . $e->getMessage();
}
?> 