<?php
   // session_start();
	
   //$coustomer = intval($_GET["coustomer_id"]);
   $cart_id = intval($_GET["cart_id"]);
   $user_id = intval($_GET["user_id"]);
	if($cart_id> 0  ){
		$c = mysqli_connect("localhost", "root","", "hospital");
		$stmt = mysqli_prepare($c, "SET @cart_id = ?");
		mysqli_stmt_bind_param($stmt, "i", $cart_id);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
		mysqli_query($c, "DELETE FROM med_in_cart
					  WHERE 
					 
					  cart_id=@cart_id;");
		mysqli_close($c);
	
	
	}
	if($user_id> 0  ){
		$c = mysqli_connect("localhost", "root","", "hospital");
		$stmt = mysqli_prepare($c, "SET @user_id = ?");
		mysqli_stmt_bind_param($stmt, "i", $user_id);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
		mysqli_query($c, "DELETE FROM med_in_cart
					  WHERE 
					 
					  user_id=@user_id;");
		mysqli_close($c);
	
	
	}
	 session_commit();
	header("location:admin_user.php");
	
?>