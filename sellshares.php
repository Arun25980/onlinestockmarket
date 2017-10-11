<?
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

if($user){
	$company=$_POST['company'];
	$sname=$_POST['sname'];
	$semail=$user;
	$price=$_POST['price'];
	$noofstocks=$_POST['noofstocks'];
	$aboutcompany=$_POST['aboutcompany'];
	$aboutstock=$_POST['aboutstock'];
	include("conn.php");
	$query=mysql_query("insert into sellstock values('$company','$sname','$semail','$price','$noofstocks','$aboutcompany','$aboutstock')");
	$add="http://localhost/OnlineStockMarket/stock.php";
	header("Location:$add");
}
?>