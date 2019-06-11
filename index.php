<!DOCTYPE html>
<html>

<head>
     <title>Hospital</title>
	 <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" type="text/css" href="css/main1.css">
   <script src="js/slideshow.js" type="text/javascript"></script>
</head>
<body>
<?php include 'header.php';?>

<div class="slide">   
   <div class="slideshow-container">

      <div class="mySlides">
  
        <img src="images/slide1.jpeg" style="width:1175px; height:400px;">
  
       </div>

      <div class="mySlides">
  
        <img src="images/slide2.jpg" style="width:1175px; height:400px;">
  
       </div>

      <div class="mySlides">

        <img src="images/slidw3.jpg" style="width:1175px; height:400px;">

       </div>

</div>
<br>

     <div class="dot1">
        <span class="dot"></span> 
        <span class="dot"></span> 
        <span class="dot"></span> 
    </div>
</div>
<script>
var slideIndex = 0;
showSlides();
</script>

<div class="article">
     <div class="counter" style="width:100%; height:20px; background-color:white;margin-top:5px; text-align:center;">
	 <b>Hit Counter:</b>
    <?php 
	 	$c = mysqli_connect("localhost", "root","", "hospital");
		$find_count = mysqli_query($c,"select * from user_count;");
		while($row = mysqli_fetch_assoc($find_count)){
			$current_count = $row['count'];
			$new_count = $current_count+1;
			$update_count = mysqli_query($c,"UPDATE user_count set count= $new_count;");
			echo $new_count;
		}
	?>
	&nbsp;&nbsp;<b>Visitor:</b>
	<?php
  $c = mysqli_connect("localhost", "root","", "hospital");
  $ip = $_SERVER['REMOTE_ADDR'];
  $table = mysqli_query($c,"select * from ip where ip='$ip'");
 if(mysqli_fetch_array( $table )){
	 // echo "same ip";
  }
  else{
  mysqli_query($c, "INSERT INTO ip (ip) VALUES ( '$ip');");
  }
    $table1 = mysqli_query($c,"select count(ip_id) as visitor from ip");
	// if($row=mysqli_fetch_assoc($table1)>0){
      while($row = mysqli_fetch_array( $table1 )) {
	 echo $row["visitor"];
	 }
?>
	 </div>
    <h3>Our Services.....</h3>
    
<div class="card-container">
  <div class="card">
    <div class="side"><h1 style="border-bottom:5px dotted blue; text-align:center;font-family:Comic Sans MS; color:#191970;">Pharmacy</h1> 
	                  <p style="text-align:center; font-size:20px;font-family:Comic Sans MS;">You can order medicine at any time <br> Open 24/7 Hours</p></div>
    <div class="side back"><a href="pharmacy.php"><img src="images/drug.png" alt="find" style="width:100px;height:100px;"></a></div>
  </div>
</div>

<div class="card-container">
  <div class="card">
    <div class="side"><h1 style="border-bottom:5px dotted blue; text-align:center;font-family:Comic Sans MS; color:#191970;">Make Appointment</h1> 
	                  <p style="text-align:center; font-size:20px;font-family:Comic Sans MS;">You can fix appointment in Online without any dificulty <br> Open 24/7 Hours</p></div>
    <div class="side back"><a href="specialists.php"><img src="images/apoinment.png" alt="find" style="width:100px;height:100px;"></a></div>
  </div>
</div>

<div class="card-container">
  <div class="card">
    <div class="side"><h1 style="border-bottom:5px dotted blue; text-align:center; font-family:Comic Sans MS; color:#191970;">Find Specialists</h1> 
	                  <p style="text-align:center; font-size:20px; font-family:Comic Sans MS;">You can find Specialists unit-wise</p></div>
    <div class="side back"><a href="specialists.php"><img src="images/doc.png" alt="find" style="width:100px;height:100px;"></a></div>
  </div>
</div>

</div>

<?php include 'footer.php';?>
</body>
</html>