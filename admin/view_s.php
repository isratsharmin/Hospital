<?php
session_start();
include_once('connect_db.php');
if(isset($_SESSION['username'])){
$id=$_SESSION['admin_id'];
$user=$_SESSION['username'];
}else{
header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."index.php");
exit();
}

?>
<!DOCTYPE html>
<html>
<head>
<title><?php echo $user;?> - Admin Panel</title>
<link rel="stylesheet" type="text/css" href="style/mystyle.css">
<link rel="stylesheet" href="style/style.css" type="text/css" media="screen" /> 
<link rel="stylesheet" href="style/table.css" type="text/css" media="screen" /> 
<script src="js/function.js" type="text/javascript"></script>
<style>#left-column {height: 477px;}
 #main {height: 477px;}</style>
</head>
<body>
<div id="content">
<div id="header">
<h1><a href="#"><img src="../images/hd_logo.jpg"></a> Admin Panel</h1></div>
<div id="left_column">
<div id="button">
<ul>
			<li><a href="admin.php">Dashboard</a></li>
			<li><a href="admin_doctor.php">Doctors</a></li>
<li><a href="admin_dotortime.php">Time Slot</a></li>
			<li><a href="admin_medicine.php">Medicine</a></li>
			<li><a href="admin_user.php">User</a></li>
			<li><a href="admin_comment.php">View Comment</a></li>
			<li><a href="logout.php">Logout</a></li>
		</ul>	
</div>
		</div>
<div id="main">
<div id="tabbed_box" class="tabbed_box">  
    <h4>Appointment</h4> 
<hr/>	
    <div class="tabbed_area">  
      
       
          
        <div id="content_1" class="content">  
		 <?php echo $message;
			  echo $message1;
			  ?>
			  <?php
       $doc_id = intval($_GET["doc_id"]);
	if($doc_id> 0  ){
		$c = mysqli_connect("localhost", "root","", "hospital");
		$stmt = mysqli_prepare($c, "SET @doc_id = ?");
		mysqli_stmt_bind_param($stmt, "i", $doc_id );
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
		$table = mysqli_query($c, " select a.app_id,a.date, t.timestart,t.timeend, u.full_name from appointment as a inner join timeslot as t  on a.time_id = t.time_id inner join user as u on a.user_id = u.user_id where doc_id=$doc_id;");?>
		

    <table>
                <tr>
				     
                    <th width="5%">Serial</th>
		<th width="20%">Date</th>
		<th width="20%">Slot</th>
		<th width="20%">Paitent</th>
		
					 
					 
                </tr>

      <!-- populate table from mysql database -->
           <?php   if($table){
		$number = 0;
	  while($row = mysqli_fetch_assoc($table)){ $number++;?>
	 
                <tr>
				     
                    <td><?php echo $number;?></td>
                    <td><?php echo  $row['date'];?></td>
                    <td><?php echo $row['timestart']."-".$row['timeend'];?></td>
					<td><?php echo $row["full_name"];?></a></td>
				    
                    
              </tr>
				
				
 <?php //mysqli_close($c);
	  }
	  }?></table>
	  <?php	
	  }
	 session_commit();
	 
	
	 ?>
	 
	
        
              
    </div>  
  
</div>
 
</div>
<div id="footer" align="Center"> Walkie-Talkie. Copyright All Rights Reserved</div>
</div>
</body>
</html>