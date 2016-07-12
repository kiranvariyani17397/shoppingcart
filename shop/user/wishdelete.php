<?php 
session_start();
?>
<?php
$email=$_SESSION["email"];
$id=$_REQUEST["id"];
require '../database.php'; 
$obj=new database();
$res=$obj->wish_delete($id,$email);
if($res==1)
{

	header('location:sdishwish.php');
}
else
{
	echo"Something Went Wrong";
}
?>