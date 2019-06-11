<?php
error_reporting(E_ALL ^ E_DEPRECATED);
//error_reporting (E_ALL ^ E_NOTICE ^ E_WARNING);
error_reporting( error_reporting() & ~E_NOTICE );
$con=mysql_pconnect('localhost','root','')or die("cannot connect to server");
mysql_select_db('hospital')or die("cannot connect to database");

?>