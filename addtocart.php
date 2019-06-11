<?php
    session_start();
	//$book_id = intval($_POST["book_id"]);
	
	//if(isset($_SESSION['users'])){
   $user_id = ($_SESSION['user']);
   $med_id = intval($_POST["med_id"]);
   $quantity =intval($_POST["quantity"]);
   $cost = ($_POST["cost"]);
	//$id=$_SESSION['users'];
    //= $_GET["username"];}
	if($med_id> 0 && $user_id){
		$c = mysqli_connect("localhost", "root","", "hospital");
		$stmt = mysqli_prepare($c, "SET @med_id = ?, @user_id=?;");
		mysqli_stmt_bind_param($stmt, "ii", $med_id, $user_id);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
		mysqli_query($c, "INSERT INTO med_in_cart (med_id, user_id, quantity, cost) VALUES (@med_id, @user_id, $quantity, $cost*$quantity);");
		mysqli_close($c);
		// header("location:book.php"); 

		
	//}
	
	}
	 session_commit();
	header("location:pharmacy.php");
	
?>
<?php
	if (isset($_SESSION['message'])) {
		echo "<div id='error_msg'>".$_SESSION['message']."</div>";
		unset($_SESSION['message']);
	}
?>
