<?php
include 'control/header.php';

session_start();
if (!isset($_SESSION['username'])){  
    echo "<script>alert('You need to sign in first.')</script>";
    echo "<script>location.href = 'index.php';</script>";
} else {
    $name = $_SESSION["username"];
}

?>

<script>
    document.getElementById("title").innerHTML = "Home";
</script>

    <p class="headline" id="homeheadline"></p>
    <div id="topline" align="right">
        <br>
        <a class="hdtext">Hello,</a>
        <a class="hdtext"><?php echo $name; ?></a>&thinsp;&hearts;
        &hairsp;
        <a class="hdtext" href="feed.php">Feed</a>
        &hairsp;
        <a class="hdtext" href="mygallery.php">Gallery</a>
        &hairsp;
        <a class="hdtext" href="account.php">Account</a>
        &hairsp;
        <a id="logout" href="config/logout.php" onclick="return confirm('Are you sure to logout?');">Logout</a>
    </div>
</div>

<div align="center">
        <img id="upload">
        <img id="addon" value="empty">
        <video autoplay="true" id="camerastream"></video>
</div>

<div align="center">
    <form action="config/upload.php" method='post' enctype="multipart/form-data"> 
        <input type="file" name="userfile" required>
        <input type="submit" name="submit" value="Upload Image">
    </form>
</div>

<?php 
include 'config/setup.php'; 

$conn = db_connect();
$sql = "SELECT uploadimg FROM upload WHERE username = '$name'";
$stmt = $conn->prepare($sql);
$stmt->execute();
$upload = $stmt->fetch();
$conn = null;

?> 

<div align = "center">
    <button class="button" onclick="addUpload('<?php if ($upload){ echo $upload[0]; } else { echo 'images/empty.png'; } ?>')">Use Uploaded Picture</button>&nbsp;&nbsp;&nbsp;
    <button class="button" onclick="removeUpload()">Remove Uploaded Picture</button>
</div>

<div id="filtergallery" align="center">
    <td><img onclick="addFilter('images/filter1.png')" class="filters" src="images/filter1.png"></a></td>
    <td><img onclick="addFilter('images/filter2.png')" class="filters" src="images/filter2.png"></a></td>
    <td><img onclick="addFilter('images/filter3.png')" class="filters" src="images/filter3.png"></a></td>
    <td><img onclick="addFilter('images/filter4.png')" class="filters" src="images/filter4.png"></a></td>
    <td><img onclick="addFilter('images/filter5.png')" class="filters" src="images/filter5.png"></a></td>
    <td><img onclick="addFilter('images/filter6.png')" class="filters" src="images/filter6.png"></a></td>
    <td><img onclick="addFilter('images/filter7.png')" class="filters" src="images/filter7.png"></a></td>
    <td><img onclick="addFilter('images/filter8.png')" class="filters" src="images/filter8.png"></a></td>
</div>

<div align="center">
    <button class="button" onclick="takeAPicture()">Capture the moment</button>
</div>
 
<br>
<!-- 
<div align="center">
    <canvas id="posts"></canvas>
    <br>
    <button class="button" onclick="<?php //saveImage(); ?>">Save to Gallery and Share with Friends</button>
</div>
-->

<div align="center">    
    <canvas id="posts"></canvas> 
    <form action="" method="post">   
    <input type="submit" name="submit" onclick="canvasData()" value="Save to Gallery and Share with the World" class="button">
</div>

<script>

 
//  var form = document.createElement("form");
//     form.setAttribute("method", "post");
//     form.setAttribute("action", "config/process.php");
//     alert('test');
    
//     var hiddenField = document.createElement("input");
//     hiddenField.setAttribute("type", "hidden");
// 	hiddenField.setAttribute("name", "screen");
// 	hiddenField.setAttribute("value", canvasData);
//     form.appendChild(hiddenField);
//     alert('test');
// }


  //  $.post("config/process.php", canvasData);
    // alert(canvasData);
 //   window.location.href = "config/process.php?canvasData=" + canvasData;

    // if (photo.setAttribute("gallery/example.png", canvasData)){
    //     alert(canvasData);
    // } else {
    //     alert("bad");
    // };

    // var ajax = new XMLHttpRequuest();
    // ajax.open("POST", "config/process.php", true);
    // ajax.setRequestHeader("Content-type", "application")
    // $.post("save.php", {data: canvas.toDataURL("image/png")});
    // echo 'test'
// function saveToGallery(){ 
//     var data = document.getElementById("posts").toDataURL();
//     $.post("config/process.php", {
//         imageDta: data}
//     }, function (data) {
//         window.location = data;
//     });
// }
</script>

<?php 
    // include "config/process.php";
?>

<div align="center"><br>
<?php
    $conn = db_connect();
    $sql = "SELECT * FROM imagelist where username = '$name' ORDER BY date_creation DESC";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $res = $stmt->fetchall();
    $conn = null;
  
    if ($res) {

        echo '<table><tr>';
        $count = 0;
        while($res[$count] && $count < 5){
            $img = $res[$count][0];
            $time = $res[$count][2];

            echo "<td><div class='gallery_block'>";
            echo "<img src=$img class='gallery'>";
            echo "<br>";
            echo "<div align='center'>";
            echo "<form action='config/deletepostfromhome.php' method='post'>";
            echo "<input type='hidden' name='imgname' value='$img'>";
            echo "<input type='hidden' name='createtime' value='$time'>";
            echo "<input type='hidden' name='username' value='$name'>";
            echo '<input type="submit" name="delete" value="Delete" class="redbutton"></button>';
            echo "</form></div></div></td>";
            $count++;
        }
    echo "</tr><table>";
    echo '<a href="mygallery.php"><button class="button">See More Posted Picture</button></a>';
}
    // echo "<td><div class='gallery_block'>";
    // echo "<img src='uploads/upload.png' onclick='selectPicture()' class='gallery'>";
    // echo "<br>";
    // echo '<button class="redbutton" onclick="deleteGalleryPhoto()">Delete</button>';
    // echo "</div></td>";
?>

</div>
<script src="js/feature.js"></script>
</body>
<?php include 'control/footer.php';?>