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
mysql_query("delete from useroutbox where fromemail='$user'");
$add="http://localhost/OnlineStockMarket/sendmessagetoadmin.php";
header("Location:$add");


?>