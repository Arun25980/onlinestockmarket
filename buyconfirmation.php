<html>
<head>
	<title>Online Stock Market</title>
<link rel="stylesheet" href="assets/css/main.css" />

</head>
<body>
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
$nos=$_POST['stock'];
$sname=$_SESSION['sname'];
include 'conn.php';
$q=mysql_query("select *from sellstock where sharename='$sname'");
$res=mysql_fetch_row($q);
if($nos > $res['4']){
	?>

<section id="intro" class="wrapper style1 fullscreen fade-up">
						<div class="inner">
							<h1>Invalid Stock Details</h1>

								<li><a href="http://localhost/OnlineStockMarket/rebuystock1.php" class="button scrolly">Click to Go Back</a></li>
							</ul>
						</div>
					</section>
<?}
else{
$add="http://localhost/OnlineStockMarket/paymentgateway.php?nos=$nos";
	header("Location:$add");
}
?>
</body>

</html>
