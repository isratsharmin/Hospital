<?php
session_start();
$user = ($_SESSION['user']);
if($user){
	date_default_timezone_set("Asia/Dhaka");
	$date = date("Y-m-d H:i:s");
	
	$c = mysqli_connect("localhost", "root","","hospital");
	$stmt = mysqli_prepare($c, "SET @user_id=?, @date=?");
	mysqli_stmt_bind_param($stmt,"is",$user,$date);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
	mysqli_query($c, "UPDATE med_in_cart
	                    set date = @date
						where user_id = @user_id
						AND date IS NULL;");
	mysqli_close($c);
}
     session_commit();
	header("Location:cart.php");
?>