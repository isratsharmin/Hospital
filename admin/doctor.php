<?php
session_start();
include_once('connect_db.php');
if(isset($_SESSION['doc_username'])){
$id=$_SESSION['doc_id'];
$user=$_SESSION['doc_username'];
}else{
header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/index.php");
exit();
}
?>
<!DOCTYPE html>
<html>
<head>
<title><?php echo $user; echo $id;?> - Doctor Panel</title>
<link rel="stylesheet" type="text/css" href="style/mystyle.css">
<link rel="stylesheet" href="style/style.css" type="text/css" media="screen" /> 
<link rel="stylesheet" type="text/css" href="style/dashboard_styles.css"  media="screen" />
<script src="js/function.js" type="text/javascript"></script>
<style>
#left_column{
height: 470px;
}

</style>
</head>
<body>
<div id="content">
<div id="header">
<h1><a href="#"><img src="../images/hd_logo.jpg"></a>Doctor Panel</h1></div>
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
    
 <!-- Dashboard icons -->
            <div class="grid_7">
            		
				<span style="font-size:40px; padding-left:150px; color:blue;">Welcome to Dashboard</span>
			</div>
</div>
<div id="footer" align="Center"> Walki-talki. Copyright All Rights Reserved</div>
</div>
</body>
</html>
