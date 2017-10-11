<?php
session_start();
$user=$_SESSION['user'];
if(!$user){
	$add="http://localhost/OnlineStockMarket/";
	header("Location:$add");
}
if($user == "admin@admin.com"){
	$add="http://localhost/OnlineStockMarket/admindashboard.php";
	header("Location:$add");
}

include 'conn.php';
mysql_query("delete from userinbox where toemail='$user'");
$add="http://localhost/OnlineStockMarket/inbox.php";
header("Location:$add");


?>
