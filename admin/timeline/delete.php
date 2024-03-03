<?php require_once("config.php"); 
$id=$_GET['id']; 
$result=mysqli_query($db,"DELETE from timeline WHERE id=$id") ; 
if($result)
{
	 header("location:../admin.php?action=deleted");
}
?> 