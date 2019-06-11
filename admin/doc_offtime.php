<?php
session_start();
include_once('connect_db.php');
if(isset($_SESSION['doc_username'])){
$id=$_SESSION['doc_id'];
$user=$_SESSION['doc_username'];
}else{
header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."index.php");
exit();
}
if(isset($_POST['submit'])){
	$id=$_SESSION['doc_id'];
$date=$_POST['date'];


$sql=mysql_query("INSERT INTO doc_offtime(doc_id,date)
VALUES('$id','$date')");
if($sql>0) {header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/doc_offtime.php");
}else{
$message1="<font color=red>Registration Failed, Try again</font>";
}
	}
?>
<!DOCTYPE html>
<html>
<head>
<title><?php echo $user; echo $id;?> - Doctor Panel</title>
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
<h1><a href="#"><img src="../images/hd_logo.jpg"></a> Doctor Panel</h1></div>
<div id="left_column">
<div id="button">
<ul>
			<li><a href="doctor.php">Dashboard</a></li>
			<li><a href="doc_schedule.php">Schedule</a></li>
            <li><a href="doc_offtime.php">Change Schedule</a></li>
						
			<li><a href="logout.php">Logout</a></li>
		</ul>	
</div>
		</div>
<div id="main">
<div id="tabbed_box" class="tabbed_box">  
    <h4>Change Schedule</h4> 
<hr/>	
    <div class="tabbed_area">  
      
        <ul class="tabs">  
            <li><a href="javascript:tabSwitch('tab_1', 'content_1');" id="tab_1" class="active">View OFF Time</a></li>  
            <li><a href="javascript:tabSwitch('tab_2', 'content_2');" id="tab_2">Add Offtime</a></li>  
              
        </ul>  
          
        <div id="content_1" class="content">  
		<?php echo $message;
			  echo $message1;
		/* 
		View
        Displays all data from 'Pharmacist' table
		*/
        // connect to the database
        include_once('connect_db.php');
       // get results from database
       $result = mysql_query("SELECT * FROM doc_offtime where doc_id=$id")or die(mysql_error());
		// display data in table
        echo "<table border='1' cellpadding='5'align='center'>";
        echo "<tr> <th>ID</th><th>Date </th><th>Delete</th></tr>";
        // loop through results of database query, displaying them in the table
        while($row = mysql_fetch_array( $result )) {
                // echo out the contents of each row into a table
                echo "<tr>";
                echo '<td>' . $row['off_id'] . '</td>';
                echo '<td>' . $row['date'] . '</td>';
				
				?>
				
				<td><a href="delete_pharmacist.php?off_id=<?php echo $row['off_id']?>"><img src="../images/delete-icon.jpg" width="35" height="35" border="0" /></a></td>
				<?php
		 } 
        // close table>
        echo "</table>";
?> 
        </div>  
        <div id="content_2" class="content">  
		           <!--Pharmacist-->
				   <?php echo $message;
			  echo $message1;
			  ?>
		<form name="form1" onsubmit="return validateForm(this);" action="doc_offtime.php" method="post">
			<table width="220" height="106" border="0" >	
				<tr><td align="center"><input name="date" type="date" style="width:170px" placeholder="date" required="required" id="date" /></td></tr>

				<tr><td align="right"><input name="submit" type="submit" value="Submit"/></td></tr>
            </table>
		</form>
        </div>  
    </div>  
</div>
</div>
<div id="footer" align="Center"> Walki-Talki. Copyright All Rights Reserved</div>
</div>
</body>
</html>
