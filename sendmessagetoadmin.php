<?
session_start();
$user=$_SESSION['user'];
if($user){
include("conn.php");
$query=mysql_query("select *from signup where email='$user'");
if($user == "admin@admin.com"){
	$add="http://localhost/OnlineStockMarket/admindashboard.php";
	header("Location:$add");
}


$res=mysql_fetch_array($query);
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Light Bootstrap Dashboard by Creative Tim</title>

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
				    <? include 'adminnavbar.php' ?>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Send message</h4>
                            </div>
                            <div class="content">
                                <form action="usersendmsgtoadmin.php" method="POST" onsubmit="msgalert()">
                                    <div class="row">

                                        <div class="col-md">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">From(disabled)</label>
                                                <input type="email" name="from" class="form-control" value="<?echo "".$_SESSION['user'];?>" disabled>
                                            </div>
                                        </div>
                                    </div>

                                        <div class="row">

                                            <div class="col-md">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">To(disabled)</label>
                                                    <input type="text" name="toadmin" class="form-control" value="Admin" disabled>
                                                </div>
                                            </div>
                                        </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Message</label>
                                                <textarea rows="5" name="msg" class="form-control"required placeholder="Here can be your message" ></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-info btn-fill pull-right">Send Message</button>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>
										<div class="col-md-4">
                        <div class="card card-user" align="centre">

                            <div class="content" align="centre">
                                <div class="author">
                                     <a href="#">
                                  <br/><br/><br/><br/>
                                      <h4 class="title">Sent Messages to admin<br />
                                      </h4>
                                    </a>
                                </div>
																<table class="table table-hover">
																		<thead>
																			<th>Messages</th>

																		</thead>
																		<tbody>
																			<?$query1=mysql_query("select *from useroutbox where fromemail='$user'");
																			while($msg=mysql_fetch_row($query1)){?>
																				<tr>
																					<td><?echo $msg[1];?></td>

																				</tr>
																			<?}?>
																		</tbody>
																</table>
																<hr>
																<br>
																<a align="centre"href="deleteinbox.php" class="btn btn-danger">Clear OutBox</a>
                            </div>


                        </div>
                    </div>

                </div>
            </div>
        </div>


				<footer class="footer">
						<div class="container-fluid">
								<nav class="pull-left">
										<ul>
												<li>
														<a href="dashboard.php">
																Home
														</a>
												</li>

										</ul>
								</nav>
								<p class="copyright pull-right">
										&copy; <script>document.write(new Date().getFullYear())</script> <a href="#">Online Stock Market</a></p>
						</div>
				</footer>

    </div>
</div>


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

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="assets/js/light-bootstrap-dashboard.js"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>
	<script>
	function msgalert() {
		//alert("Message Sent To Admin!!!");
		demo.initChartist();

		$.notify({
				icon: 'pe-7s-gift',
				message: " Message Sent To Admin!!!"

			},{
					type: 'info',
					timer: 4000
			});
	}
	</script>

</html>
<?
}
else{
    $add="http://localhost/OnlineStockMarket/";
    header("Location:$add");
}
?>
