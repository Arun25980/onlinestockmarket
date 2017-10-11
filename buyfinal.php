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
$sname=$_SESSION['sname'];
$nos=$_SESSION['nos'];

include 'conn.php';
$q=mysql_query("select *from sellstock where sharename='$sname'");
$mfr=mysql_fetch_row($q);

$value=$mfr[3];
$fuser=$mfr[2];
$sprev=$mfr[4];
$snew=$sprev-$nos;
$price=$mfr[3];

$q=mysql_query("insert into boughtStock values('$user','$sname','$nos','$value','$fuser')");
$q=mysql_query("update sellstock set noofstocks='$snew' where sharename='$sname'");
$q=mysql_query("select *from cash where user='$fuser'");
$res=mysql_fetch_row($q);
$oldamt=$res[0];
$amt=($nos*$price)+$oldamt;
$q=mysql_query("update cash set bal='$amt' where user='$fuser'");
$add="http://localhost/OnlineStockMarket/stock.php";
	header("Location:$add");



?>


