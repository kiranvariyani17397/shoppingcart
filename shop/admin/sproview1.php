<html>
<body>
<form action="sproview1.php" method="post">

<?php 
include 'sheader2.php';
?>
<div class="container">
<?php 
require '../database.php';
$obj=new database();
$res=$obj->pro_view();
echo '<div class="col-md-9 col-md-offset-1 col-sm-9 col-sm-offset-1">'; 
echo '<table class="table" >';

 echo '<p><font style="color:crimson;font-family:fantasy;font-size:30px;"><center>List Of Products</center></font></p>';
echo '<tr>';
echo '<th style="color:crimson;font-family:TimesNewRoman;font-size:20px;"> ID</th>';
echo '<th style="color:crimson;font-family:TimesNewRoman;font-size:20px;"> Product</th>';
echo '<th style="color:crimson;font-family:TimesNewRoman;font-size:20px;"> Image</th>';
echo '<th style="color:crimson;font-family:TimesNewRoman;font-size:20px;"> Price</th>';
echo '<th style="color:crimson;font-family:TimesNewRoman;font-size:20px;"> Soh</th>';
echo '<th style="color:crimson;font-family:TimesNewRoman;font-size:20px;"> Mfg</th>';
echo '<th style="color:crimson;font-family:TimesNewRoman;font-size:20px;"> Warranty</th>';
echo '<th style="color:crimson;font-family:TimesNewRoman;font-size:20px;"> Color</th>';
echo '<th style="color:crimson;font-family:TimesNewRoman;font-size:20px;"> Category Name</th>';
echo '<th style="color:crimson;font-family:TimesNewRoman;font-size:20px;"> Action</th>';
echo '</tr>';

while($row=mysql_fetch_array($res,MYSQL_ASSOC))
{
  echo '<tr>';
  echo '<center>';
  echo '<td style="color:crimson;font-family:TimesNewRoman;font-size:18px;">'.$row["pro_id"].'</td>';
  echo '<td style="color:crimson;font-family:TimesNewRoman;font-size:18px;">'.$row["pro_name"].'</td>';
  echo '<td style="color:crimson;font-family:TimesNewRoman;font-size:18px;"><img style="height:120px;width:120px" src="'.$row["pro_image"].'"></td>';
  echo '<td style="color:crimson;font-family:TimesNewRoman;font-size:18px;">'.$row["pro_price"].'</td>';
  echo '<td style="color:crimson;font-family:TimesNewRoman;font-size:18px;">'.$row["pro_soh"].'</td>';
  echo '<td style="color:crimson;font-family:TimesNewRoman;font-size:18px;">'.$row["pro_mfg"].'</td>';
  echo '<td style="color:crimson;font-family:TimesNewRoman;font-size:18px;">'.$row["pro_warranty"].'</td>';
  echo '<td style="color:crimson;font-family:TimesNewRoman;font-size:18px;">'.$row["pro_color"].'</td>';
  echo '<td style="color:crimson;font-family:TimesNewRoman;font-size:18px;">'.$row["cat_name"].'</td>';
  
  
  
  echo ' <td style="margin-left:28%;color:crimson;font-family:fantasy;" > 
					
					<a href="sproedit1.php?id='.$row["pro_id"].'"  style="margin-left:20%;">
				  <span class="glyphicon glyphicon-edit" style="color:crimson;" aria-hidden="true"></span>
				  </a>
				  
				  <a href="prodelete.php?id='.$row["pro_id"].'"  style="margin-left:2%;">
				  <span class="glyphicon glyphicon-trash " style="color:crimson;" aria-hidden="true"></span>
				  </a>
					
					
					
					</td>';
  
  
  echo '</center>';
  echo '</tr>';
 
}
 echo '</table>';
echo '</div>';
?>
</div>
</body>
</html>