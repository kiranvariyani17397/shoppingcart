<?php
$id=$_REQUEST["id"];
	require '../database.php'; 
$obj=new database();
$res=$obj->pro_by_id($id);

while($row=mysql_fetch_array($res,MYSQL_ASSOC))
{
	
	$photo=$row["pro_image"];
}


$res1=$obj->pro_delete($id);
echo $photo;
if($res1==1)
{
	unlink($photo);
	header('location:sproview1.php');
}
else
{
	echo"Something Went Wrong";
}

 ?>