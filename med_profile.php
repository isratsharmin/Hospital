<!DOCTYPE html>
<html>
<head>
     <title>Hospital</title>
	 <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="style/bodyp.css">
</head>
<body>
<?php include 'header.php';?>

<div class="middle1">
<div class="profile" style="margin-left:40px;">
<h1> Drug Profile</h1>
<?php
 
  $c= mysqli_connect("localhost", "root", "", "hospital");
  $stmt = mysqli_prepare($c, "SET @med_id = ?;");
  mysqli_stmt_bind_param($stmt, "i", $_GET["id"]);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);
  
  $table = mysqli_query($c, "SELECT *
                     FROM medicine as b where med_id=@med_id;" );
		echo "<table>";			 
	if($table){
		 if($row = mysqli_fetch_assoc($table)){
			?>
	 <tr>
	 <td>
	
	 <img src= "images/icon.jpg" height="200" width="200"><?php ?> 
	   
	 <td> 
	
	
	<strong>Drug Name:</strong> <?php echo $row["med_name"] ; echo "<br>";?>
	<strong>Descrpition:</strong> <?php echo $row["description"] ; echo "<br>";?>
	<strong>Company:</strong> <?php echo $row["company"] ; echo "<br>";?>
	<strong>Price:</strong> <?php echo $row["cost"] ; ?> Taka/Pata
	<?php
		
		mysqli_free_result($table);
	}?>
	
       <?php if(isset($_SESSION['user'])){ ?>
		<form action="addtocart.php" method="post" >
		 <strong>Quantity:</strong> <input type="text" value="<?php echo $row["quantity"]; ?>" name="quantity"/><br>
		  <input type= "submit" value="Cart"/>
		  <input type="hidden" value="<?php echo $_GET["id"]; ?>" name="med_id"/>
		
<input type="hidden" value="<?php echo $row["cost"]; ?>" name="cost"/>		  
		</form>
		<?php
	}	


?>
	</td>
	 
	 </tr>
	 <?php
 }echo "</table>";?>

	
	
</div>
</div>
<?php include 'footer.php';?>

</body>
</html>