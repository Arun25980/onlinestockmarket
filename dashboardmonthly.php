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
                    text: "Monthly Stock Prices for 2012",
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
                        { x: new Date(2012, 00, 01), y: [53.65, 56.88, 50.28, 54.99] },
                        { x: new Date(2012, 01, 01), y: [55.52, 60.86, 54.97, 57.68] },
                        { x: new Date(2012, 02, 01), y: [57.84, 59.18, 55.24, 57.03] },
                        { x: new Date(2012, 03, 01), y: [57.12, 57.87, 44.45, 47.30] },
                        { x: new Date(2012, 04, 01), y: [47.37, 47.73, 41.59, 42.10] },
                        { x: new Date(2012, 05, 01), y: [41.96, 45.56, 41.40, 45.06] },
                        { x: new Date(2012, 06, 01), y: [45.46, 46.05, 37.93, 39.58] },
                        { x: new Date(2012, 07, 01), y: [39.94, 44.60, 38.97, 42.53] },
                        { x: new Date(2012, 08, 01), y: [42.38, 48.90, 41.58, 48.54] },
                        { x: new Date(2012, 09, 01), y: [49.36, 49.99, 42.58, 43.42] },
                        { x: new Date(2012, 10, 01), y: [43.82, 44.75, 41.59, 44.45] },
                        { x: new Date(2012, 11, 01), y: [44.25, 44.40, 41.18, 42.30] }
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

    <script type="text/javascript">
        window.onload = function () {
            var chart = new CanvasJS.Chart("chartContainer", {
                title: {
                    text: "Stock Prices for June & July 2017"
                },
                axisY: {
                    includeZero: false,
                    prefix: "$ ",
                    title: "Prices"
                },
                axisX: {
                    interval: 1,
                    valueFormatString: "MMM-DD"
                },
                toolTip: {
                    content: "Date: {x} </br> <strong>Prices: </strong> </br> Open: {y[0]}, Close: {y[3]} </br>  High: {y[1]}, Low: {y[2]} "
                },
                data: [
                {
                    type: "ohlc",
                    color: "brown",
                    dataPoints: [   // Y: [Open, High ,Low, Close]
                        { x: new Date(2014, 05, 2), y: [184.76, 186.28, 184.67, 185.69] },
                        { x: new Date(2014, 05, 3), y: [185.55, 185.76, 184.12, 184.37] },
                        { x: new Date(2014, 05, 4), y: [184.71, 185.45, 184.20, 184.51] },
                        { x: new Date(2014, 05, 5), y: [184.66, 186.09, 183.92, 185.98] },
                        { x: new Date(2014, 05, 6), y: [186.47, 187.65, 185.90, 186.37] },
                        { x: new Date(2014, 05, 9), y: [186.22, 187.64, 185.96, 186.22] },
                        { x: new Date(2014, 05, 10), y: [186.20, 186.22, 183.82, 184.29] },
                        { x: new Date(2014, 05, 11), y: [183.64, 184.20, 182.01, 182.25] },
                        { x: new Date(2014, 05, 12), y: [182.48, 182.55, 180.91, 181.22] },
                        { x: new Date(2014, 05, 13), y: [182.00, 183.00, 181.52, 182.56] },
                        { x: new Date(2014, 05, 16), y: [182.40, 182.71, 181.24, 182.35] },
                        { x: new Date(2014, 05, 17), y: [181.90, 182.81, 181.56, 182.26] },
                        { x: new Date(2014, 05, 18), y: [182.04, 183.61, 181.79, 183.60] },
                        { x: new Date(2014, 05, 19), y: [184.12, 184.47, 182.36, 182.82] },
                        { x: new Date(2014, 05, 20), y: [182.59, 182.67, 181.40, 181.55] },
                        { x: new Date(2014, 05, 23), y: [181.92, 182.25, 181.00, 182.14] },
                            { x: new Date(2014, 05, 24), y: [181.50, 183.00, 180.65, 180.88] },
                        { x: new Date(2014, 05, 25), y: [180.25, 180.97, 180.06, 180.72] },
                        { x: new Date(2014, 05, 26), y: [180.87, 181.37, 179.27, 180.37] },
                        { x: new Date(2014, 05, 27), y: [179.77, 182.46, 179.66, 181.71] },
                        { x: new Date(2014, 05, 30), y: [181.33, 181.93, 180.26, 181.27] },
                        { x: new Date(2014, 06, 1), y: [181.70, 187.27, 181.70, 186.35] },
                        { x: new Date(2014, 06, 2), y: [186.35, 188.99, 186.17, 188.39] },
                        { x: new Date(2014, 06, 3), y: [188.39, 188.81, 187.35, 188.53] },
                        { x: new Date(2014, 06, 7), y: [187.61, 188.27, 187.44, 188.04] },
                        { x: new Date(2014, 06, 8), y: [187.65, 188.08, 186.37, 187.22] },
                        { x: new Date(2014, 06, 9), y: [187.68, 188.90, 186.89, 188.42] },
                        { x: new Date(2014, 06, 10), y: [186.44, 188.05, 186.21, 187.70] },
                        { x: new Date(2014, 06, 11), y: [187.73, 188.35, 186.70, 188.00] },
                        { x: new Date(2014, 06, 14), y: [188.53, 190.44, 188.53, 189.86] },
                        { x: new Date(2014, 06, 15), y: [189.38, 190.08, 188.21, 188.49] },
                        { x: new Date(2014, 06, 16), y: [192.20, 193.36, 190.76, 192.36] },
                        { x: new Date(2014, 06, 17), y: [192.36, 195.95, 192.00, 192.49] },
                        { x: new Date(2014, 06, 18), y: [191.96, 193.44, 190.00, 192.50] },
                        { x: new Date(2014, 06, 21), y: [191.30, 191.70, 189.25, 190.85] },
                        { x: new Date(2014, 06, 22), y: [191.56, 194.72, 191.56, 194.09] },
                        { x: new Date(2014, 06, 23), y: [194.11, 194.90, 193.57, 193.63] },
                        { x: new Date(2014, 06, 24), y: [193.95, 195.62, 193.75, 195.24] },
                        { x: new Date(2014, 06, 25), y: [195.30, 195.90, 193.79, 194.40] },
                        { x: new Date(2014, 06, 28), y: [194.30, 196.40, 193.65, 195.78] },
                        { x: new Date(2014, 06, 29), y: [195.30, 195.89, 194.54, 194.57] },
                        { x: new Date(2014, 06, 30), y: [195.20, 195.99, 192.90, 194.00] }
                    ]
                }
                ]
            });
            chart.render();
        }
    </script>


                                

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
