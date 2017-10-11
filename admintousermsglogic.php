<?php
session_start();
$user=$_SESSION['user'];
$to=$_POST['touser'];
$msg=$_POST['msg'];


if(!$user){
	$add="http://localhost/OnlineStockMarket/";
	header("Location:$add");
}



if($user != "" && $msg != ""){
  include 'conn.php';
  mysql_query("insert into userinbox values('$user','$msg','$to')") or die(mysql_error());
	mysql_query("insert into adminsent values('$msg','$to')") or die(mysql_error());

  $add="http://localhost/OnlineStockMarket/adminsendmessagetousers.php";
  header("Location:$add");
}
else {
  $add="http://localhost/OnlineStockMarket/sendmessagetoadmin.php";
  header("Location:$add");
}
?>
