<?php
session_start();
include_once('connect_db.php');
if(isset($_SESSION['username'])){
$id=$_SESSION['admin_id'];
$user=$_SESSION['username'];
}else{
header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/index.php");
exit();
}
$id=$_GET[stock_id];
$sql="delete from medicine where med_id='$id'";
mysql_query($sql);
//$rows=mysql_fetch_assoc($result);
header("location:admin_medicine.php");

$user_id=$_GET[user_id];
$sql="delete from user where user_id='$user_id'";
mysql_query($sql);
//$rows=mysql_fetch_assoc($result);
header("location:admin_user.php");

$comment_id=$_GET[comment_id];
$sql="delete from comment_box where id='$comment_id'";
mysql_query($sql);
//$rows=mysql_fetch_assoc($result);
header("location:admin_comment.php");

$doc_id=$_GET[doc_id];
$sql="delete from doctor where doc_id='$doc_id'";
mysql_query($sql);
//$rows=mysql_fetch_assoc($result);
header("location:admin_doctor.php");
?>


