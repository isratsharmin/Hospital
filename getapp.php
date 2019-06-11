<?php
    session_start();
	//$book_id = intval($_POST["book_id"]);
	//if(isset($_SESSION['users'])){
   $user_id = ($_SESSION['user']);
   $doc_id = intval($_POST["doc_id"]);
 // $release_date=strtotime($_POST["app_date"]);
//$date=date("Y-m-d", $release_date);
$date = date('Y-m-d',strtotime($_POST['app_date']));
   $time = intval($_POST["time"]);
	//$id=$_SESSION['users'];
    //= $_GET["username"];}
	if($doc_id> 0 && $user_id){
		$c = mysqli_connect("localhost", "root","", "hospital");
		$stmt = mysqli_prepare($c, "SET @doc_id = ?, @user_id=?, @date=?;");
		mysqli_stmt_bind_param($stmt, "iis", $doc_id, $user_id, $date);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
		$query = mysqli_query($c,"select * from doc_offtime where doc_id=@doc_id and date=@date");
		$query1 = mysqli_query($c,"select count(user_id) from appointment where time_id=$time and date=@date and doc_id=@doc_id HAVING COUNT(user_id) > 2");
		$query2 = mysqli_query($c,"select * from appointment where date=@date and  doc_id=@doc_id and user_id=@user_id");
		if(mysqli_fetch_assoc($query)>0){
			
        echo"<script type='text/javascript'>alert('Doctor will not be available in this date'); window.location='specialists.php';</script>";
		
		}
		else if(mysqli_fetch_assoc($query1)>0){
			
			 echo"<script type='text/javascript'>alert('Slot is taken'); window.location='specialists.php';</script>";
		
		}
		else if(mysqli_fetch_assoc($query2)>0){
			
			 echo"<script type='text/javascript'>alert('You make appointment in this date'); window.location='specialists.php';</script>";
		
		}
		else{
		mysqli_query($c, "INSERT INTO appointment (doc_id, user_id, date, time_id) VALUES (@doc_id, @user_id, @date, $time);");
		header("location:specialists.php");
		}
		mysqli_close($c);
		// header("location:book.php"); 

		
	//}
	
	}
	 session_commit();
	//header("location:specialists.php");
	
?>
<?php
	if (isset($_SESSION['message'])) {
		//echo "<div id='error_msg'>".$_SESSION['message']."</div>";
		//echo"<script type='text/javascript'>alert('docit');</script>";
		
		//unset($_SESSION['message']);
	}
	//header("location:specialists.php");
?>
