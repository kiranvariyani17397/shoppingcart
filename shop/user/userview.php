<?php 
session_start();
?>
<html>
<head>
<link href="../Content/bootstrap.css" rel="stylesheet">
	<script src="../Scripts/jquery-1.9.1.js"></script>
	<script src="../Scripts/bootstrap.js"></script>

	
<link rel="stylesheet" href="cssslider_files/csss_engine1/style.css">
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="cssSlider created with cssSlider, a free wizard program that helps you easily generate beautiful web slideshow" />

<style type="text/css">
	h2{	margin-top: 13px; }
	h4{	margin-top: -37px; }
	h3{ margin-top: -35px;margin-left: -25px;font-size:18;}
	h1{margin-top: -9px;font-size:18;}
	
	p{margin-left: 10px;}
	</style>
	
	<?php 
	
	if(isset($_POST["btnnewinsert"]))
	{
		
		$pwd=$_POST["txtpwd"];
		$repwd=$_POST["txtrepwd"];
		$eid=$_POST["txteid"];
		$uname=$_POST["txtuname"];
		$mobile=$_POST["txtmno"];
		$city=$_POST["txtcity"];
		$gender=$_POST["txtgender"];
		$user_type='user';
	if($pwd==$repwd)
	{		require '../database.php';
		$obj=new database();
		$res=$obj->signup($eid,$pwd,$uname,$mobile,$city,$gender,$user_type);
			if($res==1)
			{
				Header('Location:userview1.php');
				
			}
			else
			{
					echo "Something Went Wrong";
			}
	}
	else
	{
		echo "Pwd is wrong";
	}

		
	}


?>




<?php 
	
	if(isset($_POST["btninsert"]))
	{
			$email=$_POST["txteid"];
			$pwd=$_POST["txtpwd"];
			require '../database.php';
			$obj=new database();
		$res1=$obj->login($email,$pwd);
		$cnt=mysql_num_rows($res1);
			while($row=mysql_fetch_array($res1,MYSQL_ASSOC))
			{
				
				$type=$row["type"];
				
			}
		if($cnt==1)
		{
				if($type==admin)
				{
					$_SESSION["email"]=$email;
					
					Header('Location:../admin/sproview1.php');
				}
				else
				{
						$_SESSION["email"]=$email;
						Header('Location:userview1.php');	
				}
				
			
			
		}
		else
		{
			echo "wrong";
		}

		
	}


?>

	
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
  <div class="col-md-1 col-md-offset-10">
<a data-toggle="modal" href="remote.html" data-target="#myModal" style="color:black;">
 <h4> <span class="glyphicon glyphicon-user" aria-hidden="true"></span> Log in |</h4>
 </a> 
 <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  					<div class="modal-dialog" role="document">
    					<div class=".modal-content">
      						<div class="modal-header">
        							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        							<h4 class="modal-title" id="myModalLabel"><font color="crimson">Log in</font><h4>
      						</div>
      		<div class="modal-body">
      			<center>
			        			<form action="userview.php" method="post">
								<table class="table">
										
											<tr>
														<td><input class="form-control" type="email" name="txteid" placeholder="Enter emil_id" required /></td> 
											</tr>
											
											<tr>
														<td><input type="password" name="txtpwd" placeholder="Enter Password" class="form-control" required /></td> 
											</tr>
											<tr>
											
											<div class="btn-group" >
											
												<td><center><input  type="submit" value="Log in" name="btninsert" class="btn" style="color:crimson;background-color:white;font-weight:600;" ></center><td>
												
											</div>
											
											</tr>
									</table>
							</form></center>
						</div>
    				</div>
  				</div>
			</div>
  
  
  </div>
  <div class="col-md-1 col-md-offset-11">
  <a data-toggle="modal" href="remote.html" data-target="#modal" style="color:black;" >
<h3> Sign up</h3>
 </a> 
  </div>
  <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  					<div class="modal-dialog" role="document">
    					<div class=".modal-content">
      						<div class="modal-header">
        							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        							<h4 class="modal-title" id="myModalLabel"><font color="crimson">Sign Up</font><h4>
      						</div>
      		<div class="modal-body">
      			<center>
			        			<form action="userview.php" method="post">
								<table class="table">
										
											<tr>
														<td><input class="form-control" type="email" name="txteid" placeholder="Enter emil_id" required /></td> 
											</tr>
											<tr>
														<td><input type="text" name="txtuname" placeholder="Enter User name" class="form-control" required /></td> 
											</tr>
											<tr>
														<td><input type="password" name="txtpwd" placeholder="Enter Password" class="form-control" required /></td> 
											</tr>
											<tr>
														<td><input type="password" name="txtrepwd" placeholder="Re enter Password" class="form-control" required /></td> 
											</tr>
											<tr>
														<td><input type="text" name="txtmno" placeholder="Enter Mobile no" class="form-control" required /></td> 
											</tr>
											<tr>
														<td><select name="txtcity">
																	<option value="Abad">Abad</option>
																	<option value="Baroda">Baroda</option>
																	<option value="Surat">Surat</option>
														</select></td>
											</tr>
											<tr>
														<td>
														<input type="radio" checked name="txtgender" value="male">Male
															<input type="radio" name="txtgender" value="female">Female
											</tr>
											<div class="btn-group" >
											
												<td><center><input  type="submit" value="Sign up" name="btnnewinsert" class="btn" style="color:crimson;background-color:white;font-weight:600;" ></center><td>
												
											</div>
											
									</table>
							</form></center>
						</div>
    				</div>
  				</div>
			</div>
  
    
  </div>
</div>
</div>



<br>








<div class="row">

<div class="col" style="margin-left:300px;">
<div class='csslider1 autoplay ' style="background-color:#d7d7d7; margin: auto; text-align: center;">
		<input name="cs_anchor1" id='cs_slide1_0' type="radio" class='cs_anchor slide' >
		<input name="cs_anchor1" id='cs_slide1_1' type="radio" class='cs_anchor slide' >
		<input name="cs_anchor1" id='cs_slide1_2' type="radio" class='cs_anchor slide' >
		<input name="cs_anchor1" id='cs_slide1_3' type="radio" class='cs_anchor slide' >
		<input name="cs_anchor1" id='cs_slide1_4' type="radio" class='cs_anchor slide' >
		<input name="cs_anchor1" id='cs_slide1_5' type="radio" class='cs_anchor slide' >
		<input name="cs_anchor1" id='cs_slide1_6' type="radio" class='cs_anchor slide' >
		<input name="cs_anchor1" id='cs_play1' type="radio" class='cs_anchor' checked>
		<input name="cs_anchor1" id='cs_pause1_0' type="radio" class='cs_anchor pause'>
		<input name="cs_anchor1" id='cs_pause1_1' type="radio" class='cs_anchor pause'>
		<input name="cs_anchor1" id='cs_pause1_2' type="radio" class='cs_anchor pause'>
		<input name="cs_anchor1" id='cs_pause1_3' type="radio" class='cs_anchor pause'>
		<input name="cs_anchor1" id='cs_pause1_4' type="radio" class='cs_anchor pause'>
		<input name="cs_anchor1" id='cs_pause1_5' type="radio" class='cs_anchor pause'>
		<input name="cs_anchor1" id='cs_pause1_6' type="radio" class='cs_anchor pause'>
		<ul>
			<li class="cs_skeleton"><img src="cssslider_files/csss_images1/3.jpg" style="width: 97%;"></li>
			<li class='num0 img slide'> <img src='cssslider_files/csss_images1/1.jpg' alt='3' title='3' /></li>
			<li class='num1 img slide'> <img src='cssslider_files/csss_images1/2.jpg' alt='1' title='1' /></li>
			<li class='num2 img slide'> <img src='cssslider_files/csss_images1/6.jpg' alt='6' title='6' /></li>
			<li class='num3 img slide'> <img src='cssslider_files/csss_images1/7.jpg' alt='7' title='7' /></li>
			<li class='num4 img slide'> <img src='cssslider_files/csss_images1/5.jpg' alt='8' title='8' /></li>
			<li class='num5 img slide'> <img src='cssslider_files/csss_images1/3.jpg' alt='02' title='02' /></li>
			<li class='num6 img slide'> <img src='cssslider_files/csss_images1/4.jpg' alt='9' title='9' /></li>
		</ul><div class="cs_engine"><a href="http://cssslider.com">html image slider</a> by cssSlider.com v1.9</div>
		
		<div class='cs_play_pause'>
			<label class='cs_play' for='cs_play1'><span><i></i><b></b></span></label>
			<label class='cs_pause num0' for='cs_pause1_0'><span><i></i><b></b></span></label>
			<label class='cs_pause num1' for='cs_pause1_1'><span><i></i><b></b></span></label>
			<label class='cs_pause num2' for='cs_pause1_2'><span><i></i><b></b></span></label>
			<label class='cs_pause num3' for='cs_pause1_3'><span><i></i><b></b></span></label>
			<label class='cs_pause num4' for='cs_pause1_4'><span><i></i><b></b></span></label>
			<label class='cs_pause num5' for='cs_pause1_5'><span><i></i><b></b></span></label>
			<label class='cs_pause num6' for='cs_pause1_6'><span><i></i><b></b></span></label>
			</div>
		<div class='cs_arrowprev'>
			<label class='num0' for='cs_slide1_0'><span><i></i><b></b></span></label>
			<label class='num1' for='cs_slide1_1'><span><i></i><b></b></span></label>
			<label class='num2' for='cs_slide1_2'><span><i></i><b></b></span></label>
			<label class='num3' for='cs_slide1_3'><span><i></i><b></b></span></label>
			<label class='num4' for='cs_slide1_4'><span><i></i><b></b></span></label>
			<label class='num5' for='cs_slide1_5'><span><i></i><b></b></span></label>
			<label class='num6' for='cs_slide1_6'><span><i></i><b></b></span></label>
		</div>
		<div class='cs_arrownext'>
			<label class='num0' for='cs_slide1_0'><span><i></i><b></b></span></label>
			<label class='num1' for='cs_slide1_1'><span><i></i><b></b></span></label>
			<label class='num2' for='cs_slide1_2'><span><i></i><b></b></span></label>
			<label class='num3' for='cs_slide1_3'><span><i></i><b></b></span></label>
			<label class='num4' for='cs_slide1_4'><span><i></i><b></b></span></label>
			<label class='num5' for='cs_slide1_5'><span><i></i><b></b></span></label>
			<label class='num6' for='cs_slide1_6'><span><i></i><b></b></span></label>
		</div>
		<div class='cs_bullets'>
			<label class='num0' for='cs_slide1_0'> <span class='cs_point'></span>
				</label>
			<label class='num1' for='cs_slide1_1'> <span class='cs_point'></span>
				</label>
			<label class='num2' for='cs_slide1_2'> <span class='cs_point'></span>
				</label>
			<label class='num3' for='cs_slide1_3'> <span class='cs_point'></span>
				</label>
			<label class='num4' for='cs_slide1_4'> <span class='cs_point'></span>
				</label>
			<label class='num5' for='cs_slide1_5'> <span class='cs_point'></span>
				</label>
			<label class='num6' for='cs_slide1_6'> <span class='cs_point'></span>
				</label>
		</div>
		</div>
</div>
</div>

<br><br><br>



<div class="row">

<div class="col-md-1 col-md-offset-1">
<p style="font-family:fantasy;color:crimson;font-size:30px;"> WHAT'S NEW!  </p>
</div>
<br><br><br>
<div class="col-md-2 col-md-offset-1">


<img src="../image/wn1.jpg" style="margin-left:-100px;">

</div>
<div class="col-md-3 col-md-offset-2">

<img src="../image/wn2.jpg" >

</div>
</div>
<div class="row">

<div class="col-md-2 col-md-offset-1">

</div>
<br><br><br>
<div class="col-md-2 col-md-offset-3">


<img src="../image/wn3.jpg" style="margin-left:-100px;">



</div>

<div class="col-md-3 col-md-offset-2">


<img src="../image/wn4.jpg" >




</div>
</div>



<br><br><br>



<div class="row">

<div class="col-md-1 col-md-offset-0">
<p style="font-family:fantasy;color:crimson;font-size:30px;"> SHOP COLLECTION  </p>
</div>
<br><br><br>
<div class="col-md-2 col-md-offset-0">


<img src="../image/sc1.jpg" style="margin-left:30%;">


</div>

<div class="col-md-2 col-md-offset-0">


<img src="../image/sc2.jpg" style="margin-left:30%;">



</div>


<div class="col-md-2 col-md-offset-0">


<img src="../image/sc3.jpg" style="margin-left:30%;">


</div>

<div class="col-md-2 col-md-offset-0">


<img src="../image/sc4.jpg" style="margin-left:30%;">

</div>

<div class="col-md-2 col-md-offset-0">


<img src="../image/sc5.jpg" style="margin-left:30%;">
</div>


</div>


</body>
</html>