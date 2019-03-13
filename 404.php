<?php
include 'control/header.php';

?>

<a href="../index.php"><img id="logo" src="/images/logo.png" alt="logo"><img></a>

<script>
        document.getElementById("title").innerHTML = "404";
</script>
<p class="headline">404: page not found</p>

</div>
<br>
<div align="center" >
    <div id="errormsgbox">
    <p id="errorMessage">"Oops, I screwed up and you discovered my fatal flaw. 
Well, we're not all perfect, but we try.  Can you try this
again or maybe visit our homepage to start fresh. We'll do better next time."</p>   
    <br>
    <a href="index.php"><button class="button">Homepage</button></a>
    </div>
</div>

<?php include('control/footer.php');?>