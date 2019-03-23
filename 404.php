<?php
include 'control/header.php';

session_start();
if (!isset($_SESSION['username'])){  
    $url = "index.php";
} else {
    $url = "home.php";
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

<?php include('control/footer.php');?>