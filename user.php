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
				                    <a class="navbar-brand" href="user.php">Profile</a>
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
                                <h4 class="title">Edit Profile</h4>
                            </div>
                            <div class="content">
                                <form action="userupdateprofile.php" method="POST">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>Company </label>
                                                <input type="text" name="company" required class="form-control" placeholder="Company">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Username</label>
                                                <input type="text" name="usrname" required class="form-control" placeholder="Username" >
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Email address(disabled)</label>
                                                <input type="email" class="form-control" value="<?echo "".$_SESSION['user'];?>" disabled>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>First Name</label>
                                                <input type="text" name="fname" required class="form-control" placeholder="Company" >
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Last Name</label>
                                                <input type="text" name="lname" required class="form-control" placeholder="Last Name" >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Address</label>
                                                <input type="text" name="address" required class="form-control" placeholder="Home Address" >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>City</label>
                                                <input type="text" name="city" required class="form-control" placeholder="City" >
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Country</label>
                                                <input type="text" name="country" required class="form-control" placeholder="Country" >
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Postal Code</label>
                                                <input type="number" name="postalcode" required class="form-control" placeholder="ZIP Code">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>About Me</label>
                                                <textarea rows="5"  name="about" required class="form-control" placeholder="Here can be your description" ></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-info btn-fill pull-right">Update Profile</button>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-user">
                            <div class="image">
                                <img src="https://ununsplash.imgix.net/photo-1431578500526-4d9613015464?fit=crop&fm=jpg&h=300&q=75&w=400" alt="..."/>
                            </div>
                            <div class="content">
                                <div class="author">
                                     <a href="#">
                                  <br/><br/><br/><br/><br/><br/>
                                   <? $res=mysql_query("select *from user where email='$user'"); 
                                     $res1=mysql_fetch_array($res);
                                  ?>
                                      <h4 class="title"><?echo"".$res1['email'];?><br />
                                         <small><?echo"".$res1['usrname'];?></small>
                                      </h4>
                                    </a>
                                </div>
                                <p class="description text-center"> <?echo"".$res1['about'];?></p>
                            </div>
                            <hr>
                            <div class="text-center">
                                <button href="#" class="btn btn-simple"><i class="fa fa-facebook-square"></i></button>
                                <button href="#" class="btn btn-simple"><i class="fa fa-twitter"></i></button>
                                <button href="#" class="btn btn-simple"><i class="fa fa-google-plus-square"></i></button>

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

</html>
<?
}
else{
    $add="http://localhost/OnlineStockMarket/";
    header("Location:$add");
}
?>
