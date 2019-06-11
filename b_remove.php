<?php
    session_start();
	
   $id = ($_SESSION['user']);
   $cart_id = intval($_GET["cart_id"]);
	if($cart_id> 0 && $id ){
		$c = mysqli_connect("localhost", "root","", "hospital");
		$stmt = mysqli_prepare($c, "SET @cart_id = ?, @id=?;");
		mysqli_stmt_bind_param($stmt, "ii", $cart_id, $id);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
		mysqli_query($c, "DELETE FROM med_in_cart
					  WHERE 
					  user_id = @id AND
					  cart_id=@cart_id;");
		mysqli_close($c);
	
	
	}
	 session_commit();
	 header("location:cart.php");
	
?>