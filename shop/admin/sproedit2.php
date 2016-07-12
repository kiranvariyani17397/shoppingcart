<?php 

if(isset($_POST["btnupdate"]))
{
  $photo=$_REQUEST["photo"];
  $id=$_POST["txtid"];
  $name1=$_POST["txtproname"];
  $price1=$_POST["txtproprice"];
  $soh1=$_POST["txtprosoh"];
  $mfg1=$_POST["txtpromfg"];
  $warranty1=$_POST["txtprowar"];
  $color1=$_POST["txtproclr"];
  $cat_id1=$_POST["txtcatid"];
  echo $photo;
  if($_FILES["txtphoto"]["size"]>0 )
  {
	unlink($photo);
	$photo="../image/".$_FILES["txtphoto"]["name"];
	echo $photo;
	move_uploaded_file($_FILES["txtphoto"]["tmp_name"],$photo);
  }
  require '../database.php'; 
$obj=new database();
$res=$obj->pro_update($name1,$photo,$price1,$soh1,$mfg1,$warranty1,$color1,$cat_id1,$id);

if($res==1)
{
	header('Location:sproview1.php');
}
else
	echo 'Something Went Wrong';

}

?>