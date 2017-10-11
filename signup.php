<?php 
include("conn.php");
$count=0;
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$email=$_POST['email'];
$pass=$_POST['password'];
if($fname != "" && $lname != "" && $email != "" && $pass != ""){
$res=mysql_query("select *from signup where email='$email'");
while ($r=mysql_fetch_array($res)) {
	$count++;
}

		if($count == 0){
			$price=0;
		mysql_query("insert into signup values('$fname','$lname','$email','$pass')");	
		$p=mysql_query("insert into cash values('$price','$email')");
		$add="http://localhost/OnlineStockMarket/signupsuccess.html";
		header("Location:$add");
		}
		else{
		$add="http://localhost/OnlineStockMarket/signupfail.html";
		header("Location:$add");
		}

}
else{
	$add="http://localhost/OnlineStockMarket/";
	header("Location:$add");
}

?>