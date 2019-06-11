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
/*if(isset($_POST['submit'])){
$fname=$_POST['first_name'];
$lname=$_POST['last_name'];
$sid=$_POST['staff_id'];
$postal=$_POST['postal_address'];
$phone=$_POST['phone'];
$email=$_POST['email'];
$user=$_POST['username'];
$pas=$_POST['password'];
$sql1=mysql_query("SELECT * FROM pharmacist WHERE username='$user'")or die(mysql_error());
 $result=mysql_fetch_array($sql1);
if($result>0){
$message="<font color=blue>sorry the username entered already exists</font>";
 }else{
$sql=mysql_query("INSERT INTO pharmacist(first_name,last_name,staff_id,postal_address,phone,email,username,password,date)
VALUES('$fname','$lname','$sid','$postal','$phone','$email','$user','$pas',NOW())");
if($sql>0) {header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/admin_pharmacist.php");
}else{
$message1="<font color=red>Registration Failed, Try again</font>";
}
	}}*/
?>
<!DOCTYPE html>
<html>
<head>
<title><?php echo $user; echo $id;?> - Doctor Panel</title>
<link rel="stylesheet" type="text/css" href="style/mystyle.css">
<link rel="stylesheet" href="style/style.css" type="text/css" media="screen" /> 
<link rel="stylesheet" href="style/table.css" type="text/css" media="screen" /> 
<script src="js/function.js" type="text/javascript"></script>
<link rel="stylesheet" href="../style-admin.css">
	<script type='text/javascript'>
	function confirmDelete()
	{
		return confirm("Do you sure want to delete this data?");
	}
	</script>
	<!-- Fancybox jQuery -->
	<script type="text/javascript" src="../fancybox/jquery-1.9.0.min.js"></script>
	<script type="text/javascript" src="../fancybox/jquery.fancybox.js"></script>
	<script type="text/javascript" src="../fancybox/main.js"></script>
	<link rel="stylesheet" type="text/css" href="../fancybox/jquery.fancybox.css" />
	<!-- //Fancybox jQuery -->
	
	<!-- CKEditor Start -->
	<script type="text/javascript" src="../ckeditor/ckeditor.js"></script>



  
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
    <h4>Schedule</h4> 
<hr/>	
    <div class="tabbed_area">  
       <div id="content_1" class="content">
       <table class="tbl2" width="100%">
	<tr>
		<th width="5%">Serial</th>
		<th width="20%">Date</th>
		<th width="20%">Starting Slot</th>
		<th width="20%">Paitent</th>
		<th width="20%">Delete</th>
	</tr>
	
	<?php
	//$i=0;
	//$pdo = new PDO('mysql:host=localhost;dbname=test', $user, $pass);
	//$statement = $db->prepare("SELECT * FROM user ORDER BY user_id DESC");
	//$statement->execute();
	//$result = $statement->fetchAll(PDO::FETCH_ASSOC);
	 include_once('connect_db.php');
	$result=mysql_query("select a.app_id,a.date, t.timestart, u.full_name from appointment as a inner join timeslot as t  on a.time_id = t.time_id inner join user as u on a.user_id = u.user_id where doc_id=$id")or die(mysql_error());
// $result=mysql_fetch_array($sql3);
 //if($sql3){
		$i=0;
	while($row = mysql_fetch_array($result))
		//foreach($result as $row)
	{
		$i++;
		?>
		
	<tr>
		<td><?php echo $i; ?></td>
		<td>&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;<?php echo $row['date']; ?></td>
		<td>&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;<?php echo $row['timestart']; ?></td>
		<td>&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;<?php echo $row['full_name']; ?></td>
				<td>
			
			<a onclick='return confirmDelete();' href="delete.php?id=<?php echo $row['app_id']; ?>">Delete</a></td>
	</tr>


		<?php
	}
 //}
	?>
	
	
	
	
</table>
 </div>
    </div>  
</div>
</div>
<div id="footer" align="Center"> Walkie-Talkie. Copyright All Rights Reserved</div>
</div>
</body>
</html>
