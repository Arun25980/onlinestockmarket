<?
session_start();
$user=$_SESSION['user'];
if(!$user && $user != "admin@admin.com"){
	$add="http://localhost/OnlineStockMarket/";
	header("Location:$add");
}

if($user == "admin@admin.com"){
include("conn.php");
$email=$_GET['email'];
$query=mysql_query("delete from admininbox where email='$user'");
$query=mysql_query("delete from adminsent  where email='$user'");
$query=mysql_query("delete from boughtStock where email='$user'");
$query=mysql_query("delete from cash where email='$user'");
$query=mysql_query("delete from sellstock where email='$user'");
$query=mysql_query("delete from signup where email='$user'");
$query=mysql_query("delete from user where email='$user'");
$query=mysql_query("delete from userinbox where email='$user'");
$query=mysql_query("delete from useroutbox where email='$user'");
$add="http://localhost/OnlineStockMarket/admindashboard.php";
header("Location:$add");
}
?>

