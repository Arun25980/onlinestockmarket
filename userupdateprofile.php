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
include("conn.php");
$company=$_POST['company'];
$usrname=$_POST['usrname'];
$email=$user;
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$address=$_POST['address'];
$city=$_POST['city'];
$country=$_POST['country'];
$postalcode=$_POST['postalcode'];
$about=$_POST['about'];
	
	$res=mysql_query("select count(*) from user where email='$email'");
	$res1=mysql_fetch_row($res);


	if($res1[0] == 0){

		$query=mysql_query("insert into user values('$company','$usrname','$email','$fname','$lname','$address','$city','$country','$postalcode','$about')");
	}
	else{
		$query=mysql_query("update user set company='$company',usrname='$usrname',fname='$fname',lname='$lname',address='$address',city='$city',country='$country',postalcode='$postalcode',about='$about' where email='$email' ");

	}

	$add="http://localhost/OnlineStockMarket/user.php";
  	header("Location:$add");

}
?>
