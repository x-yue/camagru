<?php

include "setup.php";

function removeUpload($name) {
    $conn = db_connect();
    $sql = "DELETE FROM upload WHERE username = '$name'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $conn = null;
}

session_start();
removeUpload($_SESSION["username"]);
unset($_SESSION["username"]);
if (session_destroy()){
    header("location:../index.php");
} else {
    echo "<script>alert('there is a problem with signing out, please try again')</script>";
}

?>