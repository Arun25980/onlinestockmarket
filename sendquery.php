<?php
$name=$_POST['name'];
$email=$_POST['email'];
$msg=$_POST['msg'];
if($email != "" && $msg != "" && $name != ""){
  include 'conn.php';
  mysql_query("insert into unregisteredusersquery values('$name','$email','$msg')") or die(mysql_error());
  $add="http://localhost/OnlineStockMarket/querysent.html";
  header("Location:$add");
}
else {
  $add="http://localhost/OnlineStockMarket/";
  header("Location:$add");
}
?>
