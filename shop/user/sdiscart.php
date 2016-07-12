<?php 

include 'sheader1.php';
$email=$_SESSION["email"];
?>
<html>
<body>

<div class="col-md-12">
								<table class="table">
								<tr>
								<th> Order Id</th>
								<th> Order date</th>
								<th> Image </th>
								<th> Amount </th>
								<th> Qty </th>
								</tr>
								</table>

<?php
			

$obj1=new database();
$res1=$obj1->dis_cart($email);
	while($row=mysql_fetch_assoc($res1))
						{
								
								
									
	echo '<div class="row ">';
								
								
								
    							
								echo '<table class="table">';
								echo '<tr>';
    							echo ' <td style="margin-left:100%;"> '.$row["o_id"].'</td>';
    							echo ' <td> '.$row["o_data"].'</td> ';
    							echo ' <td> <img style="height:110px;width:110px"  src="'.$row["pro_image"].'"></td>';
      							echo ' <td> '.$row["o_amnt"].'</td>';
       							echo ' <td> '.$row["o_qty"].'</td> ';
								echo '<td> <class="active"><a href="cartdelete.php?id='.$row["o_id"].'"><!-- Button trigger modal -->
								<button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal">
								<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
								</button>
								</a></td>';
								/*echo '<td> <class="active"><a href="propay.php?id='.$row["o_id"].'"><!-- Button trigger modal -->
								<button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal">
								<span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span>
								</button>
								</a></td>';*/

     							echo '   
    		
  		</div>
		';
		
		
		
						}
						
						
						

   
?>
  </div> 
  </body>
  </html>