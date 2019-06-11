<!DOCTYPE html>
<html>

<head>
     <title>Hospital</title>
	 <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" type="text/css" href="css/main1.css">
  


   <script src="js/slideshow.js" type="text/javascript"></script>
</head>
<body>
   <div class="header">
        <div class="logo">
        <img src="images/heartbeat.png" alt="logo" style="width:200px;height:100px;">
   
           <div class="sign">
		    <?php
        session_start();
         if(isset($_SESSION['user'])){
        $user_id = ($_SESSION['user']);
        $c = mysqli_connect("localhost", "root","", "hospital");
		$stmt = mysqli_prepare($c, "SET @user_id = ?;");
		mysqli_stmt_bind_param($stmt, "i", $user_id);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
       $table = mysqli_query($c, "SELECT username FROM user WHERE user_id = @user_id;");
       if($table){
	  if($row = mysqli_fetch_assoc($table)){
		  echo "Hello,";
		
		  echo $row["username"];
		  // echo "<br>";
		  if (isset($_SESSION['user'])){?>
			  ( <a href='cart.php'>Cart</a>/<a href='a1.php'>Appointment</a>/
			         <a href='logout.php'>Logout</a> 
		 <?php }
		  echo ")";
		  echo "";
		  
		  
	  }
	  mysqli_free_result($table);
			}
  mysqli_close($c);
  
		}	
		else  { ?> Please,
	         <a href="login.php">Login</a>  or <a  href="register1.php">Register</a>
	<?php	} ?>		
              
            </div>
        </div>
   
   <ul>
    <li><a  href="index.php">Home</a></li>
    <li><a  href="paitents.php">Patients</a></li>
    <li><a  href="specialists.php">Specialists</a></li>
    <li class="dropdown">
    <a href="javascript:void(0)" class="dropbtn">Services</a>
       <div class="dropdown-content">
         <a href="#">Ambulance</a>
         <a href="specialists.php">Appointment</a>
         <a href="comment.php">Comment Section</a>
       </div>
    </li>
    <li><a  href="pharmacy.php">Pharmacy</a></li>
    <li><a  href="contact.php">Contact</a></li>
    <li><a  href="about.php">About Us</a></li>
   </ul>

  </div>


</body>
<html>