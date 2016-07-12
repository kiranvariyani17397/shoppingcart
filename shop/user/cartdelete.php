<?php 
session_start();
?>
<?php
$email=$_SESSION["email"];
$id=$_REQUEST["id"];
require '../database.php'; 
$obj=new database();
$res=$obj->deletecart($id,$email);
if($res==1)
{

	header('location:sdiscart.php');
}
else
{
	echo"Something Went Wrong";
}
?>