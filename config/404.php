<!DOCTYPE HTML>

<html>	
	<head>
		<meta charset="UTF-8">
		<title id="title"></title>
		<link rel="stylesheet" type="text/css" href="../style/body.css">
	</head>

<body>
	<div class="banner">
		<img id="logo" src="/camagru/images/logo.png">


<?php

session_start();
if (!isset($_SESSION['username'])){  
    $url = "../index.php";
} else {
    $url = "../feed.php";
}

?>

<script>
    document.getElementById("title").innerHTML = "404";
</script>

<p class="headline">404: page not found</p>

</div>
<br>
<div align="center" >
    <div id="msgbox">
    <p id="errorMessage">Oops, I screwed up and you discovered my fatal flaw. Well, we're not all perfect, but we try.  Can you try this again or maybe visit our homepage to start fresh. We'll do better next time.</p>   
    <br>
    <a href="<?php echo $url ?>"><button class="button">Homepage</button></a>
    </div>
</div>

</body>

<?php include('../control/footer.php');?>