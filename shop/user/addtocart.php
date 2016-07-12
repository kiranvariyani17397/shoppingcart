<?php  
session_start();
?>
<?php
$email=$_SESSION["email"];
$id=$_REQUEST["pro_id"];

require '../database.php'; 
$obj=new database();
$res=$obj->pro_view($id);
while ($row=mysql_fetch_assoc($res))
 {
	$price=$row["pro_price"];
}
$amt=1*$price;
$obj1=new database();
$res=$obj1->addtocart($amt,$id,$email);
if($res==1)
{
	header('location:sdiscart.php');
}
else
{
	echo"Something Went Wrong";
}
 ?>
