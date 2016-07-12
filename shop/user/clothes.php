<html>
<?php 
include 'sheader1.php';
$id=$_REQUEST["id"];
?>

<br>
<br>
<?php
		$obj1=new database();
		$res1=$obj1->view_cat($id);
		$count=mysql_num_rows($res1);
	?>
	
	<div class="row ">
            <?php 
            
            while($row=mysql_fetch_assoc($res1))
            {
			
                echo '<div class="col-md-5 col-md-offset-1">';
                 
                  echo ' <div class="caption">';
                  echo '  <img  style="height:50%;width:50%;margin-left:10%;" src="'.$row["pro_image"].'">';
				  echo'<br><br>';
                    echo ' <p style="margin-left:22%;color:crimson;font-family:fantasy;" >'.$row["pro_detail"].'</p>';
                    echo ' <p style="margin-left:28%;color:crimson;font-family:fantasy;" > Rs '.$row["pro_price"].'
					
					<a href="addtocart.php?pro_id='.$row["pro_id"].'"  style="margin-left:20%;">
				  <span class="glyphicon glyphicon-shopping-cart" style="color:crimson;" aria-hidden="true"></span>
				  </a>
				  
				  <a href="addtowish.php?pro_id='.$row["pro_id"].'"  style="margin-left:2%;">
				  <span class="glyphicon glyphicon-heart" style="color:crimson;" aria-hidden="true"></span>
				  </a>
					
					
					
					</p>';
                  echo '   
				  </div>
            </div>
     
      </div>
    ';
	
	
            }
          ?>  

  </div>
  </html>