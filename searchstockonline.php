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
require_once('class.stockMarketAPI.php');
$StockMarketAPI = new StockMarketAPI;

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
		                    <a href="typography.html">
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
				                    <a class="navbar-brand" href="searchstockonline.php">Search Stock Infromation</a>
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
                    <div class="col-md-8">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Search Stock Infromation</h4>
                            </div>
                            <div class="content">
                                <form action="<?php $_PHP_SELF ?>" method="POST">
                                    <div class="row">
                                        <div class="col-md">
                                            <div class="form-group">
                                                <label>Search </label>
                                                <input type="text"required name="name" class="form-control" value="AAPL"><br/>
                                                Enter Stock Name Like(AAPL, MSFT, GOOGL) <a  target="_blank"  href="documents/Symbols.pdf">Click for Reference?</a>
                                                <button type="submit" class="btn btn-info btn-fill pull-right">Search</button>
                                            </div>
                                        </div>

                                    </div>

<?php
if(!$sn=$_POST['name']){
  $sn="AAPL";
}
else{
  $sn=$_POST['name'];
}

$StockMarketAPI->symbol = $sn;
$a=$StockMarketAPI->getData();
?>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>


<?if($sn){?>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Stock Infromation</h4>
                                <p class="category">Complete List of Stock Deatails</p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover">
                                    <thead>
                                        <th>Name</th>
                                    	<th>Value</th>
                                    	</thead>
                                    <tbody>
                                        <tr>
                                        	<td>Symbol</td>
                                        	<td><?echo $a[$sn]['symbol'];?></td>
                                        </tr>
                                            <tr>
                                            	<td>Name</td>
                                            	<td><?echo $a[$sn]['name'];?></td>
                                            </tr>
                                            <tr>
                                              <td>Price</td>
                                              <td><?echo $a[$sn]['price'];?></td>
                                            </tr>
                                            <tr>
                                              <td>Change</td>
                                              <td><?echo $a[$sn]['change'];?></td>
                                            </tr>
                                            <tr>
                                                	<td>Short Ratio</td>
                                                	<td><?echo $a[$sn]['short_ratio'];?></td>
                                                </tr>

                                                    <tr>
                                                    	<td>Price Book Ratio</td>
                                                    	<td><?echo $a[$sn]['price_book_ratio'];?></td>
                                                    </tr>

                                                        <tr>
                                                        	<td>Price Sales Ratio</td>
                                                        	<td><?echo $a[$sn]['price_sales_ratio'];?></td>
                                                        </tr>

                                                            <tr>
                                                            	<td>Price Earnings Growth Ratio</td>
                                                            	<td><?echo $a[$sn]['price_earnings_growth_ratio'];?></td>
                                                            </tr>

                                                                <tr>
                                                                	<td>Price Earnings Ratio</td>
                                                                	<td><?echo $a[$sn]['price_earnings_ratio'];?></td>
                                                                </tr>

                                                                    <tr>
                                                                    	<td>Twohundredday Moving Avg</td>
                                                                    	<td><?echo $a[$sn]['twohundredday_moving_avg'];?></td>
                                                                    </tr>

                                                                        <tr>
                                                                        	<td>Fiftyday Moving Avg</td>
                                                                        	<td><?echo $a[$sn]['fiftyday_moving_avg'];?></td>
                                                                        </tr>

                                                                            <tr>
                                                                            	<td>Fiftytwo Week Low</td>
                                                                            	<td><?echo $a[$sn]['fiftytwo_week_low'];?></td>
                                                                            </tr>

                                                                                <tr>
                                                                                	<td>fiftytwo_week_high</td>
                                                                                	<td><?echo $a[$sn]['fiftytwo_week_high'];?></td>
                                                                                </tr>

                                                                                    <tr>
                                                                                    	<td>earnings_per_share</td>
                                                                                    	<td><?echo $a[$sn]['earnings_per_share'];?></td>
                                                                                    </tr>

                                                                                        <tr>
                                                                                        	<td>dividend_yield</td>
                                                                                        	<td><?echo $a[$sn]['dividend_yield'];?></td>
                                                                                        </tr>

                                                                                            <tr>
                                                                                            	<td>dividend_per_share</td>
                                                                                            	<td><?echo $a[$sn]['dividend_per_share'];?></td>
                                                                                            </tr>

                                                                                                <tr>
                                                                                                	<td>ebitda</td>
                                                                                                	<td><?echo $a[$sn]['ebitda'];?></td>
                                                                                                </tr>

                                                                                                    <tr>
                                                                                                    	<td>book_value</td>
                                                                                                    	<td><?echo $a[$sn]['book_value'];?></td>
                                                                                                    </tr>

                                                                                                        <tr>
                                                                                                        	<td>market_cap</td>
                                                                                                        	<td><?echo $a[$sn]['market_cap'];?></td>
                                                                                                        </tr>

                                                                                                            <tr>
                                                                                                            	<td>stock_exchange</td>
                                                                                                            	<td><?echo $a[$sn]['stock_exchange'];?></td>
                                                                                                            </tr>

                                                                                                                <tr>
                                                                                                                	<td>avg_daily_volume</td>
                                                                                                                	<td><?echo $a[$sn]['avg_daily_volume'];?></td>
                                                                                                                </tr>

                                                                                                                    <tr>
                                                                                                                    	<td>volume</td>
                                                                                                                    	<td><?echo $a[$sn]['volume'];?></td>
                                                                                                                    </tr>







                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                    <?}?>
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

</html>
<?
}
else{
    $add="http://localhost/OnlineStockMarket/";
    header("Location:$add");
}
?>
