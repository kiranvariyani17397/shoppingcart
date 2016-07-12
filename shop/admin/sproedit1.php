<html>
<body>
<?php 


include 'sheader2.php'; 
$id=$_REQUEST["id"];
$obj=new database();
$res=$obj->pro_by_id($id);
while($row=mysql_fetch_array($res,MYSQL_ASSOC))
{
  $id=$row["pro_id"];
  $name=$row["pro_name"];
  $photo=$row["pro_image"];
  $price=$row["pro_price"];
  $soh=$row["pro_soh"];
  $mfg=$row["pro_mfg"];
  $warranty=$row["pro_warranty"];
  $color=$row["pro_color"];
  $cat_id=$row["fk_cat_id"];
  
  
}
?>




<form action="sproedit2.php?photo=<?php echo $photo; ?>" method="post" enctype="multipart/form-data">
<div class="container">

 
<div class="col-md-7 col-md-offset-3 col-sm-7 col-sm-offset-3">

<table class="table" >
<tr>
<td> ID : </td>
<td> <input type="number" name="txtid" value="<?php echo $id;?>" readonly> </td>
</tr>

<tr>
<td> Name : </td>
<td> <input type="text" name="txtproname" value="<?php echo $name;?>"> </td>
</tr>


<tr>
<td> Image : </td>
<td> <input type="file" name="txtphoto" > </td>
</tr>

<tr>
<td> Price : </td>
<td> <input type="text" name="txtproprice" value="<?php echo $price;?>"> </td>
</tr>

<tr>


<td> Stock on hand : </td>
<td> <input type="text" name="txtprosoh" value="<?php echo $soh;?>"> </td>
</tr>

<tr>
<td> Manufacturer : </td>
<td> <input type="text" name="txtpromfg" value="<?php echo $mfg; ?>"> </td>
</tr>


<tr>
<td> Warranty : </td>
<td> <input type="text" name="txtprowar" value="<?php echo $warranty;?>"> </td>
</tr>

<tr>
<td> Color :</td>
<td>
<div class="dropdown">
<select class="btn btn-default dropdown-toggle"  id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" name="txtproclr">
<option value="" <?php if($color=="None") echo"selected";?>>None</option>
<option value="red" <?php if($color=="red") echo"selected";?>>red</option>
<option value="black" <?php if($color=="black") echo"selected";?>>black</option>
<option value="blue" <?php if($color=="blue") echo"selected";?>>blue</option>
<option value="green" <?php if($color=="green") echo"selected";?>>green</option>
<option value="yellow" <?php if($color=="yellow") echo"selected";?>>yellow</option>
<option value="pink" <?php if($color=="pink") echo"selected";?>>pink</option>

</select>
</div>
</td>
</tr>

<tr>
<td> Category Name : </td>
<div class="dropdown">
<td> <select class="btn btn-default dropdown-toggle"  id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" name="txtcatid">
<?php

$res=$obj1->view_cat();
while($row=mysql_fetch_array($res,MYSQL_ASSOC))
{
  $selected='';
  if($row["cat_id"]==$cat_id)
    $selected=' selected';
  
  echo '<option '.$selected.' value="'.$row["cat_id"].'">'.$row["cat_name"].'</option>';
}


?>
</div>
</tr>
</table>
  <center><input type="submit" role="group"  class="btn btn-success btn-group"  value="Edit" name="btnupdate"></input>
<div class="btn-group" role="group" aria-label="...">
  <a href="sproview1.php"><button type="button" class="btn btn-success">Cancel</button></a>
  </div>
  </center>




</div>
</div> 
</form>







</body>
</html>