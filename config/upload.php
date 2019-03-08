<?php
$target_dir = "../uploads/";
$target_file = "../uploads/upload.png";
//$target_file = $target_dir . basename($_FILES["userfile"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

if($_POST["submit"] == "Upload Image") {
    $check = getimagesize($_FILES["userfile"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

/* Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}*/

if ($_FILES["userfile"]["size"] > 10000000) {
    echo "<script>alert('Sorry, your file is too large.');</script>";
    $uploadOk = 0;
}

if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}

if ($uploadOk == 0) {
    echo "<script>alert('Sorry, your file was not uploaded.')'</script>";
} else {
    if (move_uploaded_file($_FILES["userfile"]["tmp_name"], $target_file)) {
        echo "<script>alert('Image uploaded successfully')</script>";
        echo "<script type='text/javascript'>location.href = '../home.php';</script>";
    } else {
        echo "<script>alert('Sorry, there was an error uploading your file.')</script>";
    }
}

//echo '<script>"The file '. basename( $_FILES["userfile"]["name"]). ' has been uploaded."</script>';
//echo "<script>alert('The account with this email address already existed')</script>";

?>