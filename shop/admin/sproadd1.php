<html>

<body>
<?php 
include 'sheader2.php';
?>
<?php



$obj=new database();
if (isset($_POST["btnsubmit"]))
{
  $name=$_POST["txtproname"];
  
  $price=$_POST["txtproprice"];
  $soh=$_POST["txtprosoh"];
  $mfg=$_POST["txtpromfg"];
  $warranty=$_POST["txtprowar"];
  $color=$_POST["txtproclr"];
  $cat_id=$_POST["txtid"];
  $detail=$_POST["txtprodetail"];
$cat_id=$_POST["txtid"];
$target_dir ="../image/";
$target_file = $target_dir . basename($_FILES["txtphoto"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

/*if (file_exists($target_file)) 
{
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}*/


if (move_uploaded_file($_FILES["txtphoto"]["tmp_name"],$target_file))
 {
        
  $res=$obj->pro_add($name,$target_file,$detail,$price,$soh,$mfg,$warranty,$color,$cat_id);
if($res==1)
{
  header('location:sproadd1.php');
}
else
{
    
  echo "Something went wrong";
}
  
  }
  else
 
   echo 'error';

}
 ?>

<form action="sproadd1.php" method="post" enctype="multipart/form-data">
<div class="container">



  
  <div class="col-md-7 col-md-offset-3 col-sm-7 col-sm-offset-3">
<div class="panel-body">
<div class="col-md-6 col-md-offset-4 col-sm-6 col-sm-offset-4">
<p><font style="color:crimson;font-family:fantasy;font-size:30px;margin-left:-12%;margin-top:30%;">Add Products</font></p>
</div>  

<table class="table" > 
<tr>
<td style="color:crimson;font-family:fantasy;font-size:20px;">Name : </td>
<td><input type="text" name="txtproname" placeholder="Enter Product name" require></td>
</tr>
<td style="color:crimson;font-family:fantasy;font-size:20px;">Image: </td>


<td style="color:crimson;font-family:fantasy;font-size:16px;"><input type="file" name="txtphoto"/></td>


</tr>

<tr>
<td style="color:crimson;font-family:fantasy;font-size:20px;">Price : </td>
<td><input type="text" name="txtproprice" placeholder="Enter Product price" require></td>
</tr>

<tr>
<td style="color:crimson;font-family:fantasy;font-size:20px;">Stock on hand : </td>
<td><input type="number" name="txtprosoh" placeholder="Enter Stock on hand"></td>
</tr>


<tr>
<td style="color:crimson;font-family:fantasy;font-size:20px;">Manufacturer : </td>
<td><input type="text" name="txtpromfg" placeholder="Enter manufacturer"></td>
</tr>

<tr>
<td style="color:crimson;font-family:fantasy;font-size:20px;">Warranty : </td>
<td><input type="text" name="txtprowar" placeholder="Enter Warranty in months"></td>
</tr>

<tr>
<td style="color:crimson;font-family:fantasy;font-size:20px;">Details : </td>
<td><textarea name="txtprodetail" >
</textarea> 
</td>
</tr>


<tr>
<td style="color:crimson;font-family:fantasy;font-size:20px;">Color : </td>
<div class="dropdown">
<td> <select class="btn btn-default dropdown-toggle"  id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" name="txtproclr">
<option value="">None </option>
<option value="red">Peach </option>
<option value="black">Black </option>
<option value="blue">Dark blue </option>
<option value="green">Green </option>
<option value="yellow">Denim </option>
<option value="pink">Off white </option>
<option value="pink">Grey </option>
<option value="pink">Printed </option>
<option value="pink">Chex </option>
<option value="pink">Orange </option>
<option value="pink">Red </option>
<option value="pink">Golden </option>
<option value="pink">Silver </option>
<option value="pink">Ivory </option>
<option value="pink">Blue </option>
<option value="pink">Pink </option>
<option value="pink">Yellow </option>
<option value="pink">Cherry </option>
<option value="pink">Neon </option>
<option value="pink">Purple </option>
<option value="pink">Brown </option>
<option value="pink">Crimson </option>
<option value="pink">Babp Pink </option>
</select>
</div>
</td>
</tr>

<tr>
<td style="color:crimson;font-family:fantasy;font-size:20px;"> Category Name : </td>
<div class="dropdown">
<td> <select class="btn btn-default dropdown-toggle"  id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" name="txtid">
<?php
    
$res=$obj->view_cat();
while($row=MYSQL_fetch_array($res,MYSQL_ASSOC))
{
  echo '<option value="';
  echo $row["cat_id"];
  echo '">' ;
  echo $row["cat_name"];
  echo '</option>' ;
}


?>
</div>
</select></td>
</tr>

 </table>
  <center><input type="submit" role="group" style="color:crimson;font-family:fantasy;font-size:20px;" class="btn btn-default btn-group"  value="Add" name="btnsubmit"></input>
  <div class="btn-group" role="group" aria-label="...">
  <a href="proview1.php"><button type="button" style="color:crimson;font-family:fantasy;font-size:20px;background-color:white;" class="btn btn-default">Cancel</button></a>
  </div>
  </center>
 </div>
</div>

</div>
</div>
</div>
</div> 
</form>
</body>
</html>