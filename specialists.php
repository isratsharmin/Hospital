<!DOCTYPE html>
<html>
<head>
     <title>Hospital</title>
	 <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="style/body4.css">
	<style>
input.MyButton {
width: 200px;
padding: 10px;
cursor: pointer;

background: #3366cc;
color: #fff;
border: 1px solid #3366cc;
border-radius: 10px;
}
input.MyButton:hover {
color: #ffff00;
background: #000;
border: 1px solid #fff;
}
</style>
</head>
<body>
<?php include 'header.php';?>
<div class="middle">
<div class="unit">

       <button class="button">All Specialist</button>
  <button class="button">Emergency</button>
  <button class="button">Anaesthesia</button>
  <button class="button">Bronchoscopy</button>
    <button class="button">Cardiology</button>
	<button class="button">Dental Surgery</button>
	<button class="button">Dermatology </button>
	<button class="button">Gastroenterology</button>
	<button class="button">General Surgery</button>
	<button class="button">Internal Medicine</button>
	<button class="button">Neurology</button>
	<button class="button">Nephrology</button>
	<button class="button">Gynaecology</button>
	<button class="button">Orthopaedics</button>
</div>
<div class="doctor">
<h2><strong>All Doctor</strong></h2>
<hr>
<?php
  
 $servername="localhost";
  $username="root";
  $password="";
  $dbname="hospital";
  
  $conn = new mysqli($servername, $username, $password, $dbname);
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$table = mysqli_query($conn, "SELECT *
                     FROM doctor;" );?>
		<table >			 
	
		 <?php while($row = mysqli_fetch_assoc($table)){
			?>
	 <tr style="border:2px solid black;">
	 <td>
	
	 <img src="uploads/<?php echo $row["doc_pic"];?>" height="200" width="200"><?php ?> 
	   
	 <td> 
	
	
	<strong>Doctor Name:</strong> <?php echo $row["doc_name"] ; echo "<br>";?>
	<strong>Expertise:</strong> <?php echo $row["doc_expertise"] ; echo "<br>";?>
	<strong>Qualification:</strong> <?php echo $row["doc_qualification"] ; echo "<br>";?>
	<strong>Phone: </strong><?php echo $row["doc_email"] ; echo "<br>";?>
	<strong>Email:</strong> <?php echo $row["doc_phone"] ; ?> 
	
	
       <?php if(isset($_SESSION['user'])){ ?>
		<form>
		 
		 
		  <input class="MyButton" type="button" value="Make Appointment" onclick="window.location.href='appointment.php?id=<?php echo $row["doc_id"];?>'" />
		</form>
		<?php
		 
	   }		
		}	


?>
	</td>
	 
	 </tr>
	 <?php
	 echo "</table>";
?>

</div>
</div>

<?php include 'footer.php';?>

</body>
</html>