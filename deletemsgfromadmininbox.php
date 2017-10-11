<?php
session_start();
$user=$_SESSION['user'];
if($user != "admin@admin.com"){
	$add="http://localhost/OnlineStockMarket/";
	header("Location:$add");
}
include 'conn.php';
mysql_query("delete from admininbox");
$add="http://localhost/OnlineStockMarket/inbox.php";
header("Location:$add");


?>
