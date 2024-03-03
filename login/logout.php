<?php
setcookie('loggedin','',time()-5,'/');
header("Location:../index.php");
?>