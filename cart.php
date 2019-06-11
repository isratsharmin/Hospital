<!DOCTYPE html>
<html>
<head>
     <title>Hospital</title>
	 <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="style/bodyp.css">
</head>
<body>
<?php include 'header.php';?>

<div class="middle2">
<div class="profile" style="margin-left:30px;">
<h1> Cart</h1>
	<?php
   
  $c = mysqli_connect("localhost", "root", "", "hospital");
  //if(isset($_SESSION['users'])){
   $user_id = ($_SESSION['user']);
 
  $stmt = mysqli_prepare($c, "SET @user_id = ?");
  mysqli_stmt_bind_param($stmt, "i", $user_id);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);
  
  $table = mysqli_query($c, "SELECT  b.med_id, b.med_name , fit.cost , fit.quantity, fit.cart_id
                          FROM medicine as b
						  INNER JOIN
						  med_in_cart as fit
						  ON b.med_id= fit.med_id
						  WHERE user_id=@user_id AND date IS NULL
						  ;");
						
	 if($table){
		$number = 0;
	  while($row = mysqli_fetch_assoc($table)){?>
		 <table><tr><th>Delete</th><th>Name</th><th>Quantity</th><th>Price</th></tr>
		    <tr>
		         <td><a href="b_remove.php?cart_id=<?php echo $row["cart_id"];?>"><img src= "images/exit.png" width="40px" height="40px"/></a></td>
				<td><a href= "med_profile.php?id=<?php echo $row["med_id"];?>">
				<?php echo $row["med_name"]; ?></td>
				<td>Quantity:<?php echo $row["quantity"]; ?></td>
				<td>Price: <?php echo $row["cost"]; ?></td>
				
				<?php // echo "<br>";?>
				</a>
				
				</tr>
				
				</table>
			
				<?php
				$number++;
				
	  }
	    
	        
        if($number>0){?>
		   <div class="check"><form action="med_checkout.php" method="post">
		     <input type="submit" value="Checkout"/>
			 </form></div>
			 
			 <?php
	    
	  }else{
		    $table = mysqli_query($c, "SELECT  b.med_id, b.med_name , fit.cost, fit.quantity, fit.cart_id
                          FROM medicine as b
						  INNER JOIN
						 med_in_cart as fit 
						  ON b.med_id= fit.med_id
						  WHERE user_id=@user_id 
						  ;");
						  
	 if($table){
		$number = 0;
		
	 while($row = mysqli_fetch_assoc($table)){ $number++ ;?>
	            
	            <table><tr>
                       <td><?php echo $number; ?></td>
		        <td><strong>Drug Name: </strong><?php echo $row["med_name"]; ?></td>
				<td><strong>Quantity: </strong><?php echo $row["quantity"]; ?></td>
				<td><strong>Price: </strong><?php  echo $row["cost"]; ?></td>
				</tr>
				
				
	 <?php 
                 
 	} while($row = mysqli_fetch_assoc(mysqli_query($c,"SELECT SUM(cost) from med_in_cart WHERE user_id=@user_id;"))){?>
	<tr><th colspan=3>Total: <?php  echo $row["SUM(cost)"]; break;?></th></tr>
	
	<?php }
	}
	   
	echo" <tr><th colspan=3> <strong>Paying Method: Cash On Delivery</strong></th></tr>";
	  }	
              	  
 	}	
	         
  mysqli_close($c);
 session_commit();  
?>
 </tr>
				</table>

		

</div>
</div>
<?php include 'footer.php';?>

</body>
</html>