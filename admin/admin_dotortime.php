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
$timestart=$_POST['timestart'];
$timeend=$_POST['timeend'];


$sql=mysql_query("INSERT INTO timeslot(timestart,timeend)
VALUES('$timestart','$timeend')");
if($sql>0) {header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/admin_dotortime.php");
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
    <h4>Manage TimeSlot</h4> 
<hr/>	
    <div class="tabbed_area">  
      
        <ul class="tabs">  
            <li><a href="javascript:tabSwitch('tab_1', 'content_1');" id="tab_1" class="active">View TimeSlot</a></li>  
            <li><a href="javascript:tabSwitch('tab_2', 'content_2');" id="tab_2">Add TimeSlot</a></li>  
             
        </ul>  
          
        <div id="content_1" class="content">  
		 <?php echo $message;
			  echo $message1;
			  ?>
      
		<?php
		/* 
		View
        Displays all data from 'Stock' table
		*/

        // connect to the database
        include_once('connect_db.php');

        // get results from database
		
        $result = mysql_query("SELECT * FROM timeslot") 
                or die(mysql_error());
		// display data in table
        echo "<table border='1' cellpadding='3'>";
         echo "<tr><th>ID</th><th>Time Start</th><th>Time Ende</th><th>Delete</th></tr>";

        // loop through results of database query, displaying them in the table
        while($row = mysql_fetch_array( $result )) {
                
                // echo out the contents of each row into a table
                echo "<tr>";
                 echo '<td>' . $row['time_id'] . '</td>';               
                echo '<td>' . $row['timestart'] . '</td>';
				echo '<td>' . $row['timeend'] . '</td>';
				?>
				<td><a href="delete_time.php?time_id=<?php echo $row['time_id']?>"><img src="../images/delete-icon.jpg" width="24" height="24" border="0" /></a></td>
				<?php
		 } 
        // close table>
        echo "</table>";
?> 
        </div>  
        <div id="content_2" class="content">  
         <!--Add Drug-->
		 <?php echo $message;
			  echo $message1;
			  ?>
			<form name="myform" onsubmit="return validateForm(this);" action="admin_dotortime.php" method="post" >
			<table width="420" height="106" border="0" >	
				<tr><td align="center">Starting Time:<input name="timestart" type="time" style="width:170px" placeholder="Time Start" required="required" id="timestart" /></td></tr>
				<tr><td align="center">Ending Time:<input name="timeend" type="time" style="width:170px" placeholder="Time End" required="required" id="timeend"/></td></tr> 
				<tr><td align="center"><input name="submit" type="submit" value="Submit" id="submit"/></td></tr>
            </table>
		</form>
        </div>  
              
    </div>  
  
</div>
 
</div>
<div id="footer" align="Center"> Walkie-Talkie. Copyright All Rights Reserved</div>
</div>
</body>
</html>
