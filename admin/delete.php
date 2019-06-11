<?php
session_start();
include_once('connect_db.php');
if(isset($_SESSION['doc_username'])){
$id=$_SESSION['doc_id'];
$user=$_SESSION['doc_username'];
}else{
header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/index.php");
exit();
}
$id=$_GET[id];
$sql="delete from appointment where app_id='$id'";
mysql_query($sql);
//$rows=mysql_fetch_assoc($result);
header("location:doc_schedule.php");
?>

