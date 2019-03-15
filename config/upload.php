<?php

$target_dir = "../uploads/";
$target_file = "../uploads/upload.png";
// $target_file = $target_dir . basename($_FILES["userfile"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

if($_POST["submit"] == "Upload Image") {
    if(($check = getimagesize($_FILES["userfile"]["tmp_name"])) !== false) {
        $uploadOk = 1;
    } else {
        $uploadOk = 0;
    }
}

/* Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}*/

if ($_FILES["userfile"]["size"] > 10000000) {
    $uploadOk = 0;
}

if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
    $uploadOk = 0;
}

// changed so it will only give one alert message when $uploadOk ==0
if ($uploadOk == 0) {
    echo "<script>alert('Sorry, your file was not uploaded, it could be caused by the size of file, or tyle of picture, or it's simply not an image, please try again')</script>";
} else {

    if (move_uploaded_file($_FILES["userfile"]["tmp_name"], $target_file)) {
        echo "<script>alert('Image uploaded successfully')</script>";
        echo "<script>location.href = '../home.php';</script>";
    } else {
        echo "<script>alert('Sorry, there was an error uploading your file. It's not you, it's us, please try again)</script>";
    }
}
// function uploadFileName()
// {
//     $filename = basename($_FILES["userfile"]["name"]);
//     $uploaded_file = "uploads/" . $filename;
//     return $uploaded_file;
// }
// echo "<br>";
// echo uploadFileName();
// echo "<br>";
?>