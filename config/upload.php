<?php

if ($_FILES["userfile"]["error"] > 0){
echo "Error: " . $_FILES["userfile"]["error"] . "<br>";
}
else
  {
  echo "Upload: " . $_FILES["userfile"]["name"] . "<br>";
  echo "Type: " . $_FILES["userfile"]["type"] . "<br>";
  echo "Size: " . ($_FILES["userfile"]["size"]) . "<br>";
  echo "Stored in: " . $_FILES["userfile"]["tmp_name"] . " <br> ";
  }
  echo "<br>";
  
print_r($_FILES);
echo "<br>";

echo "<br>";
echo "Uploading: " . $_FILES["userfile"]["name"]. "<br>";

$target_dir = "../uploads/";
$target_file = $target_dir . basename($_FILES["userfile"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if($_POST["submit"] == "Upload Image") {
    $path = "../uploads/";
    echo "Path: $path";
    require "$path";

    $check = getimagesize($_FILES["userfile"]["name"]);
    print_r($check);
    echo filesize($_FILES["username"]["name"]);
    echo "<br>";
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
if ($_FILES["userfile"]["size"] > 10000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}

if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
} else {
    if (move_uploaded_file($_FILES["userfile"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["userfile"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>