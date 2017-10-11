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
$query=mysql_query("select *from signup where email='$user'");

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

    <script src="canvasjs.min.js"></script>
        <script type="text/javascript">
        window.onload = function () {
            var chart = new CanvasJS.Chart("chartContainer", {
                title: {
                    text: "Monthly Stock Prices for 2017",
                },
                axisY: {
                    includeZero: false,
                    prefix: "$",
                    title: "Prices",
                },
                axisX: {
                    interval: 1,
                    intervalType: "month",
                    valueFormatString: "MMM",
                },
                data: [
                {
                    type: "ohlc",
                    dataPoints: [   // Y: [Open, High ,Low, Close]
                        { x: new Date(2017, 00, 01), y: [53.65, 56.88, 50.28, 54.99] },
                        { x: new Date(2017, 01, 01), y: [55.52, 60.86, 54.97, 57.68] },
                        { x: new Date(2017, 02, 01), y: [57.84, 59.18, 55.24, 57.03] },
                        { x: new Date(2017, 03, 01), y: [57.12, 57.87, 44.45, 47.30] },
                        { x: new Date(2017, 04, 01), y: [47.37, 47.73, 41.59, 42.10] },
                        { x: new Date(2017, 05, 01), y: [41.96, 45.56, 41.40, 45.06] },
                        { x: new Date(2017, 06, 01), y: [45.46, 46.05, 37.93, 39.58] },
                         ]
                }
                ]
            });
            chart.render();
        }
    </script>
    </head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="purple" data-image="assets/img/sidebar-5.jpg">

    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->

    	<div class="sidebar-wrapper">
            <div class="logo">
                <a  class="simple-text">
                    Online Stock Market
                </a>
            </div>

            <ul class="nav">
                <li class="active">
                    <a href="dashboard.php">
                        <i class="pe-7s-graph"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li>
                    <a href="user.php">
                        <i class="pe-7s-user"></i>
                        <p>User Profile</p>
                    </a>
                </li>
							  <li>
										<a href="sellstock.php">
												<i class="pe-7s-news-paper"></i>
												<p>Sell Stock</p>
										</a>
								</li>
                <li>
                    <a href="stock.php">
                        <i class="pe-7s-note2"></i>
                        <p>Stock</p>
                    </a>
                </li>
                <li>
                    <a href="searchstockonline.php">
                        <i class="pe-7s-news-paper"></i>
                        <p>Search Stock Information</p>
                    </a>
                </li>

                <li>
                    <a href="sendmessagetoadmin.php">
                        <i class="pe-7s-chat"></i>
                        <p>Send Messages</p>
                    </a>
                </li>
								<li>
										<a href="inbox.php">
												<i class="pe-7s-bell"></i>
												<p>Inbox</p>
										</a>
								</li>

            </ul>
    	</div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Dashboard</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">



                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li>
                           <a href="dashboard.php">
                               <p> Transactions :- Rs.<?include"amount.php"?>/- </p>
                            </a>
                        </li>
                        <li>
                           <a href="dashboard.php">
                               <p>home</p>
                            </a>
                        </li>
                        <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <p>
										<? echo"".$res['fname']."".$res['lname'];?>
										<b class="caret"></b>
									</p>
                              </a>
                              <ul class="dropdown-menu">
                              <li><b>   Stock Analysis</b></li>
                              <li class="divider"></li>
                              <li><a href="dashboard.php"><p>Current</p></a></li>          
                              <li><a href="dashboardmonthly.php"><p>monthly analysis</p></a></li>
                              <li><a href="dashboardyear.php"><p>yearly analysis</p></a></li>
                                <li class="divider"></li>
                                <li>
                            <a href="logout.php">
                                <p>Log out</p>
                            </a>
                        </li>
                              </ul>
                        </li>

						<li class="separator hidden-lg hidden-md"></li>
                    </ul>
                </div>
            </div>
        </nav>
       


        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Statistics on Monthly Analysis</h4>
                                <p class="category">Stock Performance</p>
                            </div>
                            <div class="content">
                                <div id="chartContainer" style="height: 350px; width: 100%;"></div>


                                <div class="footer">
                                    <div class="legend">
                                       <b>Point on graph for more details</b>
                                    </div>
                                    <hr>
                                    <div class="stats">
                                          </div>
                                </div>
                            </div>
                        </div>
                    </div>             
                </div>
            </div>
        </div>


        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Statistics</h4>
                                <p class="category">Stock Performance</p>
                            </div>
                            <div class="content">
                                <div id="chartContainer" style="height: 400px; width: 100%;"></div>

                                <div class="footer">
                                    <div class="legend">
                                        <i class="fa fa-circle text-info"></i> Open
                                        <i class="fa fa-circle text-danger"></i> Bounce
                                        <i class="fa fa-circle text-warning"></i> Unsubscribe
                                    </div>
                                    <hr>
                                    <div class="stats">
                                        <i class="fa fa-clock-o"></i> Campaign sent 2 days ago
                                    </div>
                                </div>
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
                <? if($_SESSION['notalt'] == 1){
                $_SESSION['notalt'] = 2 ;?>
	<script type="text/javascript">
    	$(document).ready(function(){

        	demo.initChartist();

        	$.notify({
            	icon: 'pe-7s-gift',
            	message: "Welcome <?echo "".$_SESSION['user'];?>"

            },{
                type: 'info',
                timer: 4000
            });

    	});
	</script>

</html>
<? } ?>
<?
}
else{
    $add="http://localhost/OnlineStockMarket/";
    header("Location:$add");
}
?>
