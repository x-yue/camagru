<?php
// to not to have uploaded picture when refreshing the home page
$uploaded_file = "/camagru/uploads/upload.png";
if ($uploaded_file){
    echo('it enters');
    unlink($uploaded_file);
}

?>