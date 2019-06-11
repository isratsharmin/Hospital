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
<div class="profile" >
<h1> Appointment </h1>
	<?php
   
  $c = mysqli_connect("localhost", "root", "", "hospital");
  //if(isset($_SESSION['users'])){
   $user_id = ($_SESSION['user']);
 
  $stmt = mysqli_prepare($c, "SET @user_id = ?");
  mysqli_stmt_bind_param($stmt, "i", $user_id);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);
  
						
	
		    $table = mysqli_query($c, "select a.doc_id,a.date, t.timestart, d.doc_name, d.doc_expertise from appointment as a inner join timeslot as t  
			on a.time_id = t.time_id inner join doctor as d 
			on a.doc_id = d.doc_id where user_id=$user_id;");
						  
	 if($table){
		$number = 0;
		
	 while($row = mysqli_fetch_assoc($table)){ $number++ ;?>
	            
	            <table id="app" style="margin-left:15%;"><tr>
				<td><?php echo $number; ?></td>
		        <td><strong>Doctor Name: </strong><?php echo $row["doc_name"]; ?></td>
				  <td><strong>Doctor Expertise: </strong><?php echo $row["doc_expertise"]; ?></td>
				<td><strong>Date: </strong><?php echo $row["date"]; ?></td>
				<td><strong>Slot Time: </strong><?php  echo $row["timestart"]; ?></td>
				</tr>
				
				
	 <?php 
                 
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