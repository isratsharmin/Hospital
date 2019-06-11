<?php 
     session_start();
	if($_POST){
		$username =  $_POST['username'];
	    $password =  $_POST['password'];
		$password = md5($password);
		$c = mysqli_connect("localhost", "root", "", "hospital");
		$stmt = mysqli_prepare($c, "SET @username = ?, @password = ?;");
		mysqli_stmt_bind_param($stmt, "ss", $username, $password);
		mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
		
			$table = mysqli_query($c, "SELECT user_id FROM user
			                        WHERE username = @username AND password=@password;");
		
		if($table){
			if($row = mysqli_fetch_assoc($table)){
				//echo $row["id"];
				echo "hellow";
				$_SESSION['user'] = (int)$row["user_id"];
				header("location: index.php"); 
				}else{
					$_SESSION['message'] = "Username/password combination incorrect";
				}
			
			mysqli_free_result($table);
		}
		
		}
	//header("location: index.php"); 
	session_commit();
	
?>

<!DOCTYPE html>
<html>
<head>
     <title>LogIn-Hospital</title>
	 <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" type="text/css" href="style/index1.css">
    <link rel="stylesheet" type="text/css" href="style/register.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
</head>
<body>
  <?php
         //session_start();
         if(isset($_SESSION['user'])){
        $user_id = ($_SESSION['user']);
        $c = mysqli_connect("localhost", "root","", "hospital");
		$stmt = mysqli_prepare($c, "SET @user_id = ?;");
		mysqli_stmt_bind_param($stmt, "i", $user_id);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
       $table = mysqli_query($c, "SELECT full_name FROM user WHERE user_id = @user_id;");
       if($table){
	  if($row = mysqli_fetch_assoc($table)){
		//  echo "Hello,";
		  
		  
	  }
	  mysqli_free_result($table);
			}
  mysqli_close($c);
  
		}	
		else  {
	} ?>
<?php include 'header.php';?>
<div class="middle">
<div class="register">
<style>
	#error_msg{
	width: 100%;  
	margin: 5px auto; 
	height: 30px; 
	border: 1px solid #6b2b11; 
	background: #BEBEBE; 
	color: #6b2b11;
	text-align: center;
	padding-top: 10px;
}</style>
	<?php if (isset($_SESSION['message'])) {
	 echo "<div id='error_msg'>".$_SESSION['message']."</div>";
		unset($_SESSION['message']);
	}
?>
    <form method="post" action="login.php">
    <div class="row">
      <h4>Log In</h4>
      
	   <div class="input-group input-group-icon">
        <input type="text" placeholder="User Name" name="username"/>
        <div class="input-icon"><i class="fa fa-user"></i></div>
      </div>
     
	
	 
      <div class="input-group input-group-icon">
        <input type="password" placeholder="Password" name="password"/>
        <div class="input-icon"><i class="fa fa-key"></i></div>
      </div>
	 
    
	  <input type="submit" class="btn btn-info" value="LogIn"/>
	 
	 </div>
	        
              
           
 </form>
 </div>
<?php include 'footer.php';?>

</body>
</html>