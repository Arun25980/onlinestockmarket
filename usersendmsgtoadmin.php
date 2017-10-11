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


$msg=$_POST['msg'];

  $to = "admin@admin.com";


if($user != "" && $msg != ""){
  include 'conn.php';
  mysql_query("insert into useroutbox values('$user','$msg','$to')") or die(mysql_error());
	mysql_query("insert into admininbox values('$user','$msg','$to')") or die(mysql_error());

  $add="http://localhost/OnlineStockMarket/sendmessagetoadmin.php";
  header("Location:$add");
}
else {
  $add="http://localhost/OnlineStockMarket/sendmessagetoadmin.php";
  header("Location:$add");
}
?>
