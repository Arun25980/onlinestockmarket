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
$nos=$_GET['nos'];
//session variables for transation

$_SESSION['nos']=$nos;
// $_SESSION['']=$;
// $_SESSION[''];
$sname=$_SESSION['sname'];

//transactioon session variables--------

include 'conn.php';
$q=mysql_query("select *from sellstock where sharename='$sname'");
$res=mysql_fetch_row($q);
print_r($res);
$totamt=$nos *$res['3'];


?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <link rel="stylesheet" href="as/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="as/css/user.css">
    <link rel="stylesheet" href="as/bootstrap/fonts/font-awesome.min.css">
</head>

<body>
    <div class="row .payment-dialog-row">
        <div class="col-md-4 col-md-offset-4 col-xs-12">
            <div class="panel panel-default credit-card-box">
                <div class="panel-heading">
                    <h3 class="panel-title"><span class="panel-title-text">Payment Details </span><img class="img-responsive panel-title-image" src="assets/img/accepted_cards.png"></h3></div>
                <div class="panel-body">
                    <form id="payment-form" action="buyfinal.php" method="POST">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label class="control-label" for="cardNumber">Card number </label>
                                    <div class="input-group">
                                        <input class="form-control" type="tel" required="" placeholder="Valid Card Number" id="cardNumber">
                                        <div class="input-group-addon"><span><span class="fa fa-credit-card"></span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-7">
                                <div class="form-group">
                                    <label class="control-label" for="cardExpiry"><span class="hidden-xs">expiration </span><span class="visible-xs-inline">EXP </span> date</label>
                                    <input class="form-control" type="tel" required="" placeholder="MM / YY" id="cardExpiry">
                                </div>
                            </div>
                            <div class="col-xs-5 pull-right">
                                <div class="form-group">
                                    <label class="control-label" for="cardCVC">cv code</label>
                                    <input class="form-control" type="tel" required="" placeholder="CVC" id="cardCVC">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label class="control-label" for="couponCode">Total Amount</label>
                                    <input class="form-control" type="text" name="price" id="couponCode" value="<?echo "".$totamt?>" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <button class="btn btn-success btn-block btn-lg" type="submit">Buy</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="as/js/jquery.min.js"></script>
    <script src="as/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>