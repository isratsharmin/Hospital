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
if(isset($_POST['submit'])){
$sname=$_POST['med_name'];
$cat=$_POST['category'];
$des=$_POST['description'];
$com=$_POST['company'];
$qua=$_POST['quantity'];
$cost=$_POST['cost'];
$sta="Available";

$sql=mysql_query("INSERT INTO medicine(med_name,category,description,company,quantity,cost,status)
VALUES('$sname','$cat','$des','$com','$qua','$cost','$sta')");
if($sql>0) {header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/admin_medicine.php");
}else{
$message1="<font color=red>Registration Failed, Try again</font>";
}
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
    <h4>Order Medicine</h4> 
<hr/>	
    <div class="tabbed_area">  
      
       
          
        <div id="content_1" class="content">  
		 <?php echo $message;
			  echo $message1;
			  ?>
			  <?php
       $user = intval($_GET["user_id"]);
	if($user> 0  ){
		$c = mysqli_connect("localhost", "root","", "hospital");
		$stmt = mysqli_prepare($c, "SET @user = ?");
		mysqli_stmt_bind_param($stmt, "i", $user );
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
		$table = mysqli_query($c, " select b.med_id, b.med_name , fit.cost,fit.quantity, fit.user_id, fit.date, fit.cart_id
                          FROM medicine as b
						  INNER JOIN
						  med_in_cart as fit
						  ON b.med_id= fit.med_id
						  WHERE user_id=@user;");?>
		

    <table>
                <tr>
				     <th width="5%">Delete</th>
                    <th width="5%">Id</th>
                    <th width="35%">Drug name</th>
                    <th width="10%">Quantity</th>
                     <th width="10%">Cost</th>
					 <th width="35%">Date</th>
					 
					 
                </tr>

      <!-- populate table from mysql database -->
           <?php   if($table){
		$number = 0;
	  while($row = mysqli_fetch_assoc($table)){ $number++;?>
	 
                <tr>
				     <td><a href="remove.php?cart_id=<?php echo $row['cart_id'];?>"><img src= "../images/exit.png" width="20px" height="20px"/></a></td>
                    <td><?php echo $number;?></td>
                    <td><?php echo $row['med_name'];?></td>
                    <td><?php echo $row['quantity'];?></td>
					<td><?php echo $row["cost"];?></a></td>
				    <td><?php echo $row["date"];?></td>
					
                    
              </tr>
				
				
 <?php //mysqli_close($c);
	  }
	  }?></table>
	  <?php $sql= mysqli_query($c,"select user_id from med_in_cart WHERE user_id=@user; ");
	  while($row = mysqli_fetch_assoc($sql)){
	  ?>
	  <table><tr><td><a href="remove.php?user_id=<?php echo $row['user_id'];?>">Remove ALL</a></td></tr></table>
	  <?php
	 break; }	
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
