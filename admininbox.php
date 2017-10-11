<?
session_start();
$user=$_SESSION['user'];
if(!$user && $user != "admin@admin.com"){
	$add="http://localhost/OnlineStockMarket/";
	header("Location:$add");
}

if($user == "admin@admin.com"){
include("conn.php");
$query=mysql_query("select *from signup where email='$user'");

$res=mysql_fetch_array($query);
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Online Stock Market</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="purple" data-image="assets/img/sidebar-5.jpg">

    <!--   you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple" -->


		    	<? include 'adminsidetab.php'; ?>
		    	<? include 'adminnavbar.php'?>

        <div class="content">
            <div class="container-fluid">
                <div class="row">


                    <div class="col-md-12">
                        <div class="card card-plain">
                            <div class="header">
                                <h4 class="title">Message Recived</h4>
                                <p class="category">Messages Recived From users</p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover">
                                    <thead>

                                        <th>Msg</th>
                                        <th>From User</th>
                                    	<th>Action</th>
                                    </thead>
                                    <tbody>
																			<?$query1=mysql_query("select *from admininbox");
																			while($msg=mysql_fetch_row($query1)){?>
                                        <tr>
                                        	<td><?echo $msg[1];?></td>
                                        	<td><?echo $msg[0];?></td>
                                        	
                                        	<td><a href=adminsendmessagetousers.php?to=<?echo $msg[0];?> class="btn btn-success">reply</a></td>
                                        </tr>
																			<?}?>
                                    </tbody>
                                </table>
																<hr>
<a href="deletemsgfromadmininbox.php" class="btn btn-danger">Clear Inbox</a>
<br/>
<br/>
<br/>

<div class="col-md-12">
                        <div class="card card-plain">
                            <div class="header">
                                <h4 class="title">Message Recived from Other</h4>
                                <p class="category">Messages Recived From Unregistered users</p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover">
                                    <thead>
                                        <th>Name</th>
                                        <th>User Mail</th>
                                        <th>Message</th>
                                        
                                    </thead>
                                    <tbody>
                                                                            <?$query1=mysql_query("select *from unregisteredusersquery");
                                                                            while($msg=mysql_fetch_row($query1)){?>
                                        <tr>
                                            <td><?echo $msg[0];?></td>
                                            <td><?echo $msg[1];?></td>
                                                                                        <td><?echo $msg[2];?></td>
                                            
                                            <td><a href=adminsendmessagetousers.php?to=<?echo $msg[0];?> class="btn btn-success">reply</a></td>
                                        </tr>
                                                                            <?}?>
                                    </tbody>
                                </table>
</body>

    <!--   Core JS Files   -->
    <script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Checkbox, Radio & Switch Plugins -->
	<script src="assets/js/bootstrap-checkbox-radio-switch.js"></script>

	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

   
    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="assets/js/light-bootstrap-dashboard.js"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>


</html>
<?
}
else{
    $add="http://localhost/OnlineStockMarket/";
    header("Location:$add");
}
?>
