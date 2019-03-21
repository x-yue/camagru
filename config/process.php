<?php
// include "setup.php";

//file_put_contents("gallery/imagetest.png", $_POST["screen"]);
if ($_GET["canvasData"])
{
    $data = $_GET["canvasData"];
    echo $data;}
    else {
        echo "i hate php";
    }

if ($_POST["submit"] == "Save to Gallery and Share with the World"){
    echo "good";
} else {
    echo "error";
}

$test = $_POST["screen"];
echo $test;

// if (isset($_GET["canvasData"])){
//     echo $_GET["canvasData"];
//     echo "yes;";
// } else {
//     echo "no canvas";
// }
// if (isset($_REQUEST["canvasData"])){
//     echo $_REQUEST["canvasData"];
//     echo "yes;";
// } else {
//     echo "no canvas";
// }
// if (isset($_POST["canvasData"])){
//     echo $_POST["canvasData"];
//     echo "yes;";
// } else {
//     echo "no canvas";
// }
echo "<br>";
echo "test";

// $img = $_POST['data'];
// $img = str_replace('data:image/png;base64,', '', $img);
// $img = str_replace(' ', '+', $img);
// $fileData = base64_decode($img);
// //saving
// $fileName = 'photo.png';
// file_put_contents($fileName, $fileData);



    // $data = $_POST["posts"];
    // $file = md5(uniqid().'.png');
    // $uri = substr($data, strpos($data.","));
    // file_put_contents($file, base64_decode($url));
    // echo json_encode($file);
    // include "config/process.php";


// $canvasData = $_REQUEST["canvasData"];

// echo $canvasData;
// $data = str_replace("data:image/jpeg;base64,", "", $canvasData);
// print_r($data);
// //file_put_contents("gallery/image.jpeg", base64_decode($data));


// $data = $_POST["posts"];
// $file = md5(uniqid().'.png');

// $uri = substr($data, strpos($data.","));

// file_put_contents($file, base64_decode($url));

// echo json_encode($file);
// echo '<img src="data:image/jpeg;base64,' . base64_encode($row['destinationimage']) . '" />';


// echo "<script>alert('Something went wrong with the Webcam!')</script>";
// $data = substr($_POST["post"], strpos($_POST["imagedata"], "," ) + 1);
// $decodeData = base64_decode($data);
// $fp = fopen("canvas.png", "wb");
// fwrite($fp, $decodedData);
// fclose();
// echo "test";
// echo "/canvas.png";
?>
<script src="js/feature.js"></script>