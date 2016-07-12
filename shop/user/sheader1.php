<html>
<head>

<?php 
session_start();

$email=$_SESSION["email"];
require '../database.php';
$obj1=new database();
$res1=$obj1->view_user($email);
while($row=mysql_fetch_assoc($res1))
{
  $name=$row["user_name"];
  $mobile=$row["mobile_no"];
  $gender=$row["gender"];
  $city=$row["city"];
}
?>
	<link href="../Content/bootstrap.css" rel="stylesheet">
	<script src="../Scripts/jquery-1.9.1.js"></script>
	<script src="../Scripts/bootstrap.js"></script>

	<style type="text/css">
	h2{	margin-top: 13px; }
	h4{	margin-top: -37px; }
	h3{ margin-top: -35px;margin-left: -25px;font-size:18px;}
	h1{margin-top: -9px;font-size:18px;}
	
	p{margin-left: 10px;}
	
	
	</style>
	

	
</head>
<body>
<div class="row">
<div class="panel panel-default">
  <div class="panel-body" style="background-color:crimson;">
  <div class="col-md-1 col-md-offset-4">
 <img src="../image/logo2.jpg" style="height:60px;width:60px">
  </div>
  <div class="col-md-3 col-md-offset-0">
  
 <h2 style="color: white;font-family:fantasy;"> Women's Corner</h2>
  </div>
  <div class="col-md-2 col-md-offset-10" >
<a href="userview.php" style="color:black;">
 <h4> <span class="glyphicon glyphicon-user" aria-hidden="true" ></span> Log Out</h4>
 </a>
  </div>
</div>
</div>
</div>

<div class="container">
<hr>
<div class="row">
<div class="col-md-12">
<ul class="nav nav-tabs">


<?php 
	
        $obj=new database();
		$res=$obj->cat_count();
			


while($row=mysql_fetch_assoc($res))
            {

  echo '<div class="col-md-2 col-md-offset-0">
  <a href="clothes.php?id='.$row["cat_id"].'" style="color:crimson;font-family:fantasy;"><h1>'.$row["cat_name"]. '<span class="badge" style="background-color:crimson;color:white;font-size:15px;font-family:TimesNewRoman;margin-top:-2px;margin-left:1px;">'.$row["cnt"].'</span></h1></a>
  </div>';
 
 

			}
 ?> 
  
  
  
 <!--<div class="col-md-2 col-md-offset-1">
  <div class="dropdown">
  <a id="dLabel" data-target="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
    <?php echo "Hi,".$name; ?>
    <span class="caret"></span>
  </a>

  <ul class="dropdown-menu" aria-labelledby="dLabel" data-toggle="dropdown">
    <li><a data-target="#" href="editprofile.php">Edit profile</a></li>
    <li><a data-target="#" href="changepwd.php">Change password</a></li>
  </ul>
</div>
 </div>-->
  
  
 <div class="col-md-0">
 
 
 
 
 <a href="sdishwish.php"  style="margin-left:10%;">
				  <span class="glyphicon glyphicon-heart" style="color:crimson;" aria-hidden="true"></span>
				  </a>
				  
 
 <a href="sdiscart.php"  style="margin-left:1%;">
				  <span class="glyphicon glyphicon-shopping-cart" style="color:crimson;" aria-hidden="true"></span>
				  </a>
         
 
 
 </div>
 
 

 
 
 
 </ul>

</div>
</div>

</div>
<br>
</body>
</html>