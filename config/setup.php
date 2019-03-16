<?php 
require "database.php";

try {
    $conn = new PDO($dsn, $username, $password);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "connection successful";
} catch (PDOException $e) {
    echo "Connection to database failed: " . $e->getMessage();
}
?> 