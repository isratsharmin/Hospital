<?php
session_start();
include_once('connect_db.php');
if(isset($_SESSION['username'])){
$id=$_SESSION['admin_id'];
$username=$_SESSION['username'];
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
<title><?php echo $username;?> -  Admin Panel</title>
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
<script>
function validateForm()
{

//for alphabet characters only
var str=document.form1.first_name.value;
	var valid="abcdefghijklmnopqrstuvwxyz ABCDEFGHIJKLMNOPQRSTUVWXYZ";
	//comparing user input with the characters one by one
	for(i=0;i<str.length;i++)
	{
	//charAt(i) returns the position of character at specific index(i)
	//indexOf returns the position of the first occurence of a specified value in a string. this method returns -1 if the value to search for never ocurs
	if(valid.indexOf(str.charAt(i))==-1)
	{
	alert("First Name Cannot Contain Numerical Values");
	document.form1.first_name.value="";
	document.form1.first_name.focus();
	return false;
	}}
	
if(document.form1.first_name.value=="")
{
alert("Name Field is Empty");
return false;
}

//for alphabet characters only
var str=document.form1.last_name.value;
	var valid="abcdefghijklmnopqrstuvwxyz ABCDEFGHIJKLMNOPQRSTUVWXYZ";
	//comparing user input with the characters one by one
	for(i=0;i<str.length;i++)
	{
	//charAt(i) returns the position of character at specific index(i)
	//indexOf returns the position of the first occurence of a specified value in a string. this method returns -1 if the value to search for never ocurs
	if(valid.indexOf(str.charAt(i))==-1)
	{
	alert("Last Name Cannot Contain Numerical Values");
	document.form1.last_name.value="";
	document.form1.last_name.focus();
	return false;
	}}
	

if(document.form1.last_name.value=="")
{
alert("Name Field is Empty");
return false;
}

}

</script>



   <style>#left-column {height: 477px;}
 #main {height: 477px;}
</style>
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
    <h4>User Account</h4> 
<hr/>	
    <div class="tabbed_area">  
       <div id="content_1" class="content">
       <table class="tbl2" width="100%">
	<tr>
		<th width="5%">Serial</th>
		<th width="40%">User Full Name</th>
		<th width="5o%">Action</th>
	</tr>
	
	<?php
	//$i=0;
	//$pdo = new PDO('mysql:host=localhost;dbname=test', $user, $pass);
	//$statement = $db->prepare("SELECT * FROM user ORDER BY user_id DESC");
	//$statement->execute();
	//$result = $statement->fetchAll(PDO::FETCH_ASSOC);
	 include_once('connect_db.php');
	$result=mysql_query("select * from user")or die(mysql_error());
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
		<td>&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;<?php echo $row['full_name']; ?></td>
				<td>&nbsp;
			<a class="fancybox" href="#inline<?php echo $i; ?>">View Profile</a>
			<div id="inline<?php echo $i; ?>" style="width:500px;display: none;">
				<h3 style="border-bottom:2px solid #808080;margin-bottom:10px;">View All Data</h3>
				<p>
					<form action="" method="post" style="width:500px; border:none;" >
					<table style="width:100%; border:none;">
						<tr>
							<td><b>Name:</b>&nbsp;<?php echo $row['full_name']; ?></td>
						</tr>
						<tr>
							<td><b>Phone Number:</b>&nbsp; +880<?php echo $row['phone']; ?></td>
						</tr>
						<tr>
							<td><b>Address:</b>&nbsp;<?php echo $row['address']; ?></td>
						</tr>
						<tr>
							<td><b>Birthdate:</b>&nbsp;<?php echo $row['birthdate']; ?></td><br>
							
						</tr>
						<tr>
							<td><b>Gender:</b>&nbsp;<?php echo $row['gender']; ?></td>
						</tr>
						<tr>
							<td><b>Email:</b>&nbsp;<?php echo $row['email']; ?></td>
						</tr>
						
					</table>
					</form>
				</p>
			</div>
			
			&nbsp; &nbsp; <a href="view_order.php?user_id=<?php echo $row['user_id']; ?>">View Order</a>
			&nbsp;&nbsp;&nbsp;
			&nbsp;
			<a onclick='return confirmDelete();' href="delete_stock.php?user_id=<?php echo $row['user_id']; ?>">Delete</a></td>
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
