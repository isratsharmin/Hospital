<!DOCTYPE html>
<html>
<head>
     <title>Hospital</title>
	 <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" type="text/css" href="style/body4.css">
      
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

 
</head>
<body>
<?php include 'header.php';?>
<div class="middle">
   <div class="nav" style="color:white;">
    <ul>
	<button><a href="#All">ALL</a></button>
	<button><a href="#A">A</a></button>
	<button><a href="#B">B</a></button>
	<button><a href="#C">C</a></button>
	<button ><a href="#D">D</a></button>
	<button><a href="#E">E</a></button>
	<button><a href="#F">F</a></button>
	<button><a href="#G">G</a></button>
	<button><a href="#H">H</a></button>
	<button><a href="#I">I</a></button>
	<button><a href="#J">J</a></button>
	<button><a href="#K">k</a></button>
	<button><a href="#L">L</a></button>
	<button><a href="#M">M</a></button>
	<button><a href="#N">N</a></button>
	<button><a href="#O">O</a></button>
	<button><a href="#P">P</a></button>
	<button><a href="#Q">Q</a></button>
	<button><a href="#R">R</a></button>
	<button><a href="#S">S</a></button>
	<button><a href="#T">T</a></button>
	<button><a href="#U">U</a></button>
	<button><a href="#V">V</a></button>
	<button><a href="#W">W</a></button>
	<button><a href="#X">X</a></button>
	<button><a href="#Y">Y</a></button>
	<button><a href="#Z">Z</a></button>
	</ul>
   </div> 
<?php
  
 $servername="localhost";
  $username="root";
  $password="";
  $dbname="hospital";
  
  $conn = new mysqli($servername, $username, $password, $dbname);
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} ?>
<div class="Alpha" style="margin-left:50px;">
<div id="ALL">
<div id="A">
<span>A</span>
<?php
$sql = "SELECT b.med_name, b.med_id
                     FROM medicine as b where med_name Like 'A%';";
$result = $conn->query($sql);

//echo"<table>";
while($row = $result->fetch_assoc()){
	// echo "<tr>";
	// echo "<td>";
	// echo"<br>";?>
	<div>
	 <a href= "med_profile.php?id=<?php echo $row["med_id"];?>">
	 
	<?php echo $row["med_name"];?></a>
	
	   </div>
	 <?php 
 }

?>

</div>
<div id="B">
<span>B</span>
<?php
$sql = "SELECT b.med_name, b.med_id
                     FROM medicine as b where med_name Like 'B%';";
$result = $conn->query($sql);

//echo"<table>";
while($row = $result->fetch_assoc()){
	// echo "<tr>";
	// echo "<td>";
	// echo"<br>";?>
	<div>
	 <a href= "med_profile.php?id=<?php echo $row["med_id"];?>">
	 
	<?php echo $row["med_name"];?></a>
	
	   </div>
	 <?php 
 }

?>

</div>
<div id="C">
<span>C</span>

</div>
<div id="D">
<span>D</span>
<?php
$sql = "SELECT b.med_name, b.med_id
                     FROM medicine as b where med_name Like 'D%';";
$result = $conn->query($sql);

//echo"<table>";
while($row = $result->fetch_assoc()){
	// echo "<tr>";
	// echo "<td>";
	// echo"<br>";?>
	<div>
	 <a href= "med_profile.php?id=<?php echo $row["med_id"];?>">
	 
	<?php echo $row["med_name"];?></a>
	
	   </div>
	 <?php 
 }

?>

</div>
<div id="E">
<span>E</span>
<?php
$sql = "SELECT b.med_name, b.med_id
                     FROM medicine as b where med_name Like 'E%';";
$result = $conn->query($sql);

//echo"<table>";
while($row = $result->fetch_assoc()){
	// echo "<tr>";
	// echo "<td>";
	// echo"<br>";?>
	<div>
	 <a href= "med_profile.php?id=<?php echo $row["med_id"];?>">
	 
	<?php echo $row["med_name"];?></a>
	
	   </div>
	 <?php 
 }

?>

</div>
<div id="F">
<span>F</span>

</div>
<div id="G">
<span>G</span>

</div>
<div id="H">
<span>H</span>

</div>
<div id="I">
<span>I</span>

</div>
<div id="J">
<span>J</span>

</div>
<div id="K">
<span>K</span>

</div>
<div id="L">
<span>L<span>

</div>
<div id="M">
<span>M</span>

</div>
<div id="N">
<span>N</span>
<?php
$sql = "SELECT b.med_name, b.med_id
                     FROM medicine as b where med_name Like 'N%';";
$result = $conn->query($sql);

//echo"<table>";
while($row = $result->fetch_assoc()){
	// echo "<tr>";
	// echo "<td>";
	// echo"<br>";?>
	<div>
	 <a href= "med_profile.php?id=<?php echo $row["med_id"];?>">
	 
	<?php echo $row["med_name"];?></a>
	
	   </div>
	 <?php 
 }

?>

</div>
<div id="O">
<span>O</span>

</div>
<div id="P">
<span>P</span>

</div>
<div id="Q">
<span>Q</span>

</div>
<div id="R">
<span>R</span>

</div>
<div id="S">
<span>S</span>

</div>
<div id="T">
<span>T</span>
<?php
$sql = "SELECT b.med_name, b.med_id
                     FROM medicine as b where med_name Like 'T%';";
$result = $conn->query($sql);

//echo"<table>";
while($row = $result->fetch_assoc()){
	// echo "<tr>";
	// echo "<td>";
	// echo"<br>";?>
	<div>
	 <a href= "med_profile.php?id=<?php echo $row["med_id"];?>">
	 
	<?php echo $row["med_name"];?></a>
	
	   </div>
	 <?php 
 }

?>

</div>
<div id="U">
<span>U</span>

</div>
<div id="V">
<span>V</span>

</div>
<div id="W">
<span>W</span>

</div>
<div id="X">
<span>X</span>

</div>
<div id="Y">
<span>Y</span>

</div>
<div id="Z">
  <span>Z<span>
</div>
</div>
</div>
</div>
<?php include 'footer.php';?>

</body>
</html>