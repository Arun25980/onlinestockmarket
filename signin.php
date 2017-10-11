<?php
$email=$_POST['email'];
$pass=$_POST['password'];
 
 // echo "email".$email."password".$pass;




if($email != "" && $pass != ""){

	if($email == "admin@admin.com" && $pass == "admin"){
		session_start();
		$_SESSION['user']=$email;
		$add="http://localhost/OnlineStockMarket/admindashboard.php";
		header("Location:$add");
	}
	else{
		include 'conn.php';
		$query=mysql_query("select *from signup where email='$email'");

		$res=mysql_fetch_array($query);

		if($pass == $res['password']){

			session_start();
			$_SESSION['user']=$email;
			$_SESSION['notalt']=1;
			$add="http://localhost/OnlineStockMarket/dashboard.php";
			header("Location:$add");
		}
		else{

			$add="http://localhost/OnlineStockMarket/loginfail.html";
			header("Location:$add");
		}
	}

}
else{
	$add="http://localhost/OnlineStockMarket/";
	header("Location:$add");
}

?>
