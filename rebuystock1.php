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
$sname=$_GET['sname'];


include 'conn.php';
$q=mysql_query("select *from sellstock where sharename='$sname'");
$res=mysql_fetch_row($q);
$_SESSION['sname']=$sname;
?>

<!DOCTYPE html>
<html>
<head>
	<title>Online Stock Market</title>
<link rel="stylesheet" href="assets/css/main.css" />

</head>
<body>
	<form action="http://localhost/OnlineStockMarket/buyconfirmation.php" method="post">
		<section id="intro" class="wrapper style1 fullscreen fade-up">
						<div class="inner">
							<h1>Stock Buy</h1>
              <h3>Enter The No Of Stock that you Want to Buy:-</h3>
              <b>No of stocks available :- <?echo"".$res['4']?></b>
              
              <input id="noofstocks" name="stock" type="text" required placeholder="No of Stocks">                             
							<ul class="actions"><br/>

								<li><input type="Submit" value="Continue"> </li>

								<li><a href="http://localhost/OnlineStockMarket/stock.php" class="button scrolly">Click to Go Back</a></li>
							</ul>
						</div>
					</section>
</form>
</body>

</html>
