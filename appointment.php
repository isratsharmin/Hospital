<?php
  /*  session_start();
	if(isset($_POST['submit'])){
	//$book_id = intval($_POST["book_id"]);
	//if(isset($_SESSION['users'])){
   $user_id = ($_SESSION['user']);
   $doc_id = mysql_real_escape_string($_GET["id"]);
  //$release_date=strtotime($_POST['date']);
//$app_date=date("Y-m-d", $release_date);
$app_date = mysql_real_escape_string($_POST["app_date"]);
   $time = mysql_real_escape_string($_POST["time"]);
	//$id=$_SESSION['users'];
    //= $_GET["username"];}
	if($doc_id> 0 && $user_id){
		$c = mysqli_connect("localhost", "root","", "hospital");
		$stmt = mysqli_prepare($c, "SET  @user_id=?;");
		mysqli_stmt_bind_param($stmt, "i",  $user_id);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
		mysqli_query($c, "INSERT INTO appointment (doc_id, user_id, date, time_id) VALUES ($doc_id, @user_id, $app_date, $time);");
		mysqli_close($c);
		// header("location:book.php"); 

		
	}
	
	}
	 session_commit();
	//header("location:specialists.php");
	*/
?>
<?php
	if (isset($_SESSION['message'])) {
		echo "<div id='error_msg'>".$_SESSION['message']."</div>";
		unset($_SESSION['message']);
	}
?>
<!DOCTYPE html>
<html>
<head>
     <title>Hospital</title>
	 <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" type="text/css" href="style/bodyp.css">
</head>
<body>
<?php include 'header.php';?>
<div class="middle1">
<div class="profile"style=" padding-top:20px;">
   <h1 style="texalign:center;">Make Appointment</h1>
   
    <?php
  
 $servername="localhost";
  $username="root";
  $password="";
  $dbname="hospital";
  
  $conn = new mysqli($servername, $username, $password, $dbname);
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
 $stmt = mysqli_prepare($conn, "SET @doc_id = ?;");
  mysqli_stmt_bind_param($stmt, "i", $_GET["id"]);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);
$table = mysqli_query($conn, "SELECT *
                     FROM doctor;" );?>

 
   <form action="getapp.php" method="post"> 
   <table style="width:700px; border:none;"> 
   <tr>
    <td> Date:</td>
	<td><input type="date" name="app_date"/><br></td></tr>
	
	<?php $result = mysqli_query($conn,"SELECT * FROM timeslot;"); // Query the data base for hotels containing the city_id

if($result) // Some error checking
{  ?><tr><td width="100px"> Time Slot:</td> <td ><select name="time">"
     
          <?php // Return all of the entries
           while($hotel = mysqli_fetch_assoc($result))
           {?>
	  
                <option value="<?php echo $hotel["time_id"];?>"><?php echo $hotel["timestart"]."-".$hotel["timeend"];?></option>
              
		<?php  }
     
}?>

     </select> <br>
	 </td>
	 </tr>
  <tr><td colspan=2><input type="submit" onclick="myFunction()">
   <input type="hidden" value="<?php echo $_GET["id"]; ?>" name="doc_id"/></td></tr>
   </table>
</form>

   
</div>
   </div>
<?php include 'footer.php';?>
<script>

	//function myFunction() {
		//if()
   // alert("Succesfully !");}

</script>
</body>
</html>