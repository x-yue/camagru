<?php

include "setup.php";

session_start();
if (!isset($_SESSION['username'])){  
    echo "<script>alert('You need to sign in first.')</script>";
    echo "<script>location.href = 'index.php';</script>";
} else {
    $name = $_SESSION["username"];
}



// print_r ($_POST);
// //file_put_contents("gallery/imagetest.png", $_POST["screen"]);
// if ($_POST["canvasData"]){
//     $img = $_GET["canvasData"];
//     $img = str_replace('data:image/png;base64,', '', $img);
//     $img = str_replace(' ', '+', $img);
//     echo $img;
//     echo "<br>";
//     $fileData = base64_decode($img);
//     echo $fileData;
//     echo "<br>";
//     $filename = "../photo.png";
//     file_put_contents($filename, $fileData);
// // if ($_POST["submit"] == "Save to Gallery and Share with the World"){
// //     echo "good";
// // } else {
// //     echo "error";
// //}
// } else {
//     echo "bad";
// }

// function base64_to_jpeg($base64_string, $output_file) {
//     // open the output file for writing
//     $ifp = fopen( $output_file, 'wb' ); 

//     // split the string on commas
//     // $data[ 0 ] == "data:image/png;base64"
//     // $data[ 1 ] == <actual base64 string>
//     $data = explode( ',', $base64_string );

//     // we could add validation here with ensuring count( $data ) > 1
//     fwrite( $ifp, base64_decode( $data[ 1 ] ) );

//     // clean up the file resource
//     fclose( $ifp ); 

//     return $output_file; 




// echo "<br>";
// $test = "data:image/jpeg;base64,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";
// $test = str_replace('data:image/png;base64,', '', $test);
//   //  $test = str_replace(' ', '+', $test);
//     echo $test;
//     echo "<br>";
//     $fileData = base64_decode($test);
//     echo $fileData;
//     echo "<br>";
//     $filename = "../photo.png";
//     file_put_contents($filename, $fileData);

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

$gallery_dir = "../gallery/";
$imgname; 

date_default_timezone_set('europe/paris');
$now = date("Y-m-d H:i:s");

$conn = db_connect();
$sql = "INSERT INTO imagelist (image_location, username, date_creation) VALUES ('$imgname', '$name', '$now')";
$stmt = $conn->prepare($sql);
$stmt->execute();
$conn = null;

?>

<script src="js/feature.js"></script>