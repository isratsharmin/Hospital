<?php
session_start();
include_once('connect_db.php');
if(isset($_SESSION['username'])){
$id=$_SESSION['admin_id'];
$username=$_SESSION['username'];
}else{
header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/admin_login.php");
exit();
}
if(isset($_POST['submit'])){
$fname=$_POST['doc_id1'];
$lname=$_POST['doc_name'];
$sid=$_POST['doc_expertise'];
$postal=$_POST['doc_qualification'];
$phone=$_POST['doc_phone'];
$email=$_POST['doc_email'];
$user=$_POST['doc_username'];
$pas=$_POST['doc_pass'];
//$up_filename=$_FILES["post_image"]["name"];
	//	$file_basename = substr($up_filename, 0, strripos($up_filename, '.')); // strip extention
		//$file_ext = substr($up_filename, strripos($up_filename, '.')); // strip name
		//$f1 = $up_filename . $file_ext;
		$image = $_FILES['post_image']['name'];
		$target = "../uploads/".basename($image);

		
		//if(($file_ext!='.png')&&($file_ext!='.jpg')&&($file_ext!='.jpeg')&&($file_ext!='.gif')){
		//echo"Only jpg, jpeg, png and gif format images are allowed to upload.";}
		
		//else{move_uploaded_file($_FILES["post_image"]["tmp_name"],"../uploads/" . $f1);}
		if (move_uploaded_file($_FILES['post_image']['tmp_name'], $target)) {
  		$msg = "Image uploaded successfully";
  	}else{
  		$msg = "Failed to upload image";
  	}
$sql1=mysql_query("SELECT * FROM doctor WHERE doc_username='$user'")or die(mysql_error());
 $result=mysql_fetch_array($sql1);
if($result>0){
$message="<font color=blue>sorry the username entered already exists</font>";
 }else{
$sql=mysql_query("INSERT INTO doctor(doc_id1,doc_name,doc_expertise,doc_qualification,doc_email,doc_phone,doc_username,doc_pass,doc_pic)
VALUES('$fname','$lname','$sid','$postal','$phone','$email','$user','$pas','$image')");
if($sql>0) {header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/admin_doctor.php");
}else{
$message1="<font color=red>Registration Failed, Try again</font>";
}
	}}
?>
<!DOCTYPE html>
<html>
<head>
<title><?php echo $username;?> -  Admin Panel</title>
<link rel="stylesheet" type="text/css" href="style/mystyle.css">
<link rel="stylesheet" href="style/style.css" type="text/css" media="screen" /> 
<link rel="stylesheet" href="style/table.css" type="text/css" media="screen" /> 
<script src="js/function.js" type="text/javascript"></script>
<script>
function validateForm()
{

//for alphabet characters only
var str=document.form1.first_name.value;
	var valid="abcdefghijklmnopqrstuvwxyz ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
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
    <h4>Manage Doctor</h4> 
<hr/>	
    <div class="tabbed_area">  
      
        <ul class="tabs">  
            <li><a href="javascript:tabSwitch('tab_1', 'content_1');" id="tab_1" class="active">View Doctor</a></li>  
            <li><a href="javascript:tabSwitch('tab_2', 'content_2');" id="tab_2">Add Doctor</a></li>  
              
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
       $result = mysql_query("SELECT * FROM doctor")or die(mysql_error());
		// display data in table
        echo "<table border='1' cellpadding='5'align='center'>";
        echo "<tr> <th>ID</th><th>Doctor ID</th><th>DoctorName </th> <th> Username</th> <th>Expertise </th><th>Schedule</th><th>Delete</th></tr>";
        // loop through results of database query, displaying them in the table
        while($row = mysql_fetch_array( $result )) {
                // echo out the contents of each row into a table
                echo "<tr>";
                echo '<td>' . $row['doc_id'] . '</td>';
                echo '<td>' . $row['doc_id1'] . '</td>';
				echo '<td>' . $row['doc_name'] . '</td>';
				echo '<td>' . $row['doc_username'] . '</td>';
				echo '<td>' . $row['doc_expertise'] . '</td>';
				?>
				<td><a href="view_s.php?doc_id=<?php echo $row['doc_id']?>">Schedule</a></td>
				<td><a href="delete_stock.php?doc_id=<?php echo $row['doc_id']?>"><img src="../images/delete-icon.jpg" width="35" height="35" border="0" /></a></td>
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
		<form name="form1" onsubmit="return validateForm(this);" action="admin_doctor.php" method="post" enctype="multipart/form-data">
			<table width="220" height="106" border="0" >	
				<tr><td align="center"><input name="doc_id1" type="text" style="width:170px" placeholder="Doctor Id" required="required" id="doc_id1" /></td></tr>
				<tr><td align="center"><input name="doc_name" type="text" style="width:170px" placeholder="Doctor Name" required="required" id="doc_name" /></td></tr>
				<tr><td align="center"><input name="doc_expertise" type="text" style="width:170px" placeholder="Expertise" required="required" id="doc_expertise"/></td></tr>  
				<tr><td align="center"><input name="doc_qualification" type="text" style="width:170px" placeholder="Qualification" required="required" id="doc_qualification" /></td></tr>  
				<tr><td align="center"><input name="doc_phone" type="text" style="width:170px"placeholder="Phone"  required="required" id="doc_phone" /></td></tr>  
				<tr><td align="center"><input name="doc_email" type="email" style="width:170px" placeholder="Email" required="required" id="doc_email" /></td></tr>   
				<tr><td align="center"><input name="doc_username" type="text" style="width:170px" placeholder="Username" required="required" id="doc_username" /></td></tr>
				<tr><td align="center"><input name="doc_pass" type="password" style="width:170px" placeholder="Password" required="required" id="doc_pass"/></td></tr>
				<tr><td align="center"><input type="file" name="post_image"></td></tr>
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
