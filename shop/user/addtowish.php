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
$res1=$obj1->addtowish($amt,$id,$email);
if($res1==1)
{
	header('location:sdishwish.php');
}
else
{
	echo"Something Went Wrong";
}
 ?>
