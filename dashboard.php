<?php
   ob_start();
   session_start();
   if (isset($_SESSION['user_id'])) 
   {
     if (isset($_SESSION['user_id']) && $_SESSION['user_id'] == "2") 
     {
     }
     else
     {
        header("Location: dashboard1.php");
     }
   }
   else
   {
     header("Location: index.php"); 
   }
   
?>

<?php include 'db.php';?>
<?php include 'side_bar_menu.html';?>
<?php include 'header.html';?>

<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Dashboard 360STORE</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/owl.theme.css">
    <link rel="stylesheet" href="css/owl.transitions.css">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="css/normalize.css">
    <!-- meanmenu icon CSS
		============================================ -->
    <link rel="stylesheet" href="css/meanmenu.min.css">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="css/main.css">
    <!-- educate icon CSS
		============================================ -->
    <link rel="stylesheet" href="css/educate-custon-icon.css">
    <!-- morrisjs CSS
		============================================ -->
    <link rel="stylesheet" href="css/morrisjs/morris.css">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="css/scrollbar/jquery.mCustomScrollbar.min.css">
    <!-- metisMenu CSS
		============================================ -->
    <link rel="stylesheet" href="css/metisMenu/metisMenu.min.css">
    <link rel="stylesheet" href="css/metisMenu/metisMenu-vertical.css">
    <!-- calendar CSS
		============================================ -->
    <link rel="stylesheet" href="css/calendar/fullcalendar.min.css">
    <link rel="stylesheet" href="css/calendar/fullcalendar.print.min.css">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="style.css">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- modernizr JS
		============================================ -->
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
    <!-- Start Left menu area -->
    <!-- End Left menu area -->
    <!-- Start Welcome area -->
    <div class="all-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="logo-pro">
                        <a href="dashboard.php"><img class="main-logo" src="img/logo/logo11.png" alt="" /></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h2>Total Sales</h2>
                </div>
            </div>
        </div>

        <div class="analytics-sparkle-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="analytics-sparkle-line reso-mg-b-30">
                            <div class="analytics-content">
                                <h5>Total Sales</h5>
                                <h2>Rs <span class="counter"> 5000</span> </h2>
                                <span class="text-success">20%</span>
                                <div class="progress m-b-0">
                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:20%;"> <span class="sr-only">20% Complete</span> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="analytics-sparkle-line reso-mg-b-30">
                            <div class="analytics-content">
                                <h5>Monthly Sales</h5>
                                <h2>Rs<span class="counter"> 3000</span> </h2>
                                <span class="text-danger">30%</span>
                                <div class="progress m-b-0">
                                    <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:30%;"> <span class="sr-only">230% Complete</span> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="analytics-sparkle-line reso-mg-b-30 table-mg-t-pro dk-res-t-pro-30">
                            <div class="analytics-content">
                                <h5>Weekly Sales</h5>
                                <h2>Rs<span class="counter"> 2000</span> </h2>
                                <span class="text-info">60%</span>
                                <div class="progress m-b-0">
                                    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:60%;"> <span class="sr-only">20% Complete</span> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="analytics-sparkle-line table-mg-t-pro dk-res-t-pro-30">
                            <div class="analytics-content">
                                <h5>Daily Sales</h5>
                                <h2>Rs<span class="counter"> 3500</span> </h2>
                                <span class="text-inverse">80%</span>
                                <div class="progress m-b-0">
                                    <div class="progress-bar progress-bar-inverse" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:80%;"> <span class="sr-only">230% Complete</span> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="product-sales-area mg-tb-30">
            <div class="container-fluid">
                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                        <div class="product-status-wrap">
                            <h2>ALL ORDERS LIST</h2>
                            <div class="add-product">
                            </div>
                            <div class="asset-inner">
                                <table>
                                
                                    <tr>
                                        <th><h3>No :</h3></th>
                                        <th><h3>Order status</h3></th>
                                        <th><h3>Count</h3></th>
                                        
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <?php
                                             $sql =<<<EOF
                                             select count(*) from transaction_status where status = 'ORDERED'
                                            EOF;
                                                $ret = pg_query($db, $sql);
                                            if(!$ret) 
                                             {
                                                echo pg_last_error($db);
                                             exit;
                                             } 
                                             $row = pg_fetch_row($ret);
                                             
                                        ?>

                                        <td>Unaccepted Orders</td>
                                        <td>
                                            <button class="ds-setting" onClick="window.location='all_order.php';"><?php echo $row[0]; ?></button>
                                        </td>
                                        
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <?php
                                             $sql =<<<EOF
                                             select count(*) from transaction_status where status = 'ACCEPTED'
                                            EOF;
                                                $ret = pg_query($db, $sql);
                                            if(!$ret) 
                                             {
                                                echo pg_last_error($db);
                                             exit;
                                             } 
                                             $row = pg_fetch_row($ret);
                                             
                                        ?>
                                        <td>Accepted Orders</td>
                                        <td>
                                            <button class="ps-setting" onClick="window.location='all_order.php';"><?php echo $row[0]; ?></button>
                                        </td>
                                        
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <?php
                                             $sql =<<<EOF
                                             select count(*) from transaction_status where status = 'PACKED'
                                            EOF;
                                                $ret = pg_query($db, $sql);
                                            if(!$ret) 
                                             {
                                                echo pg_last_error($db);
                                             exit;
                                             } 
                                             $row = pg_fetch_row($ret);
                                             
                                        ?>
                                        <td>Packed Orders</td>
                                        <td>
                                            <button class="ps-setting" onClick="window.location='all_order.php';"><?php echo $row[0]; ?></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <?php
                                             $sql =<<<EOF
                                             select count(*) from transaction_status where status = 'ENROUTE'
                                            EOF;
                                                $ret = pg_query($db, $sql);
                                            if(!$ret) 
                                             {
                                                echo pg_last_error($db);
                                             exit;
                                             } 
                                             $row = pg_fetch_row($ret);
                                             
                                        ?>
                                        <td>Enrouted Oders</td>
                                        <td>
                                            <button class="pd-setting" onClick="window.location='all_order.php';"><?php echo $row[0]; ?></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <?php
                                             $sql =<<<EOF
                                             select count(*) from transaction_status where status = 'DELIVERED'
                                            EOF;
                                                $ret = pg_query($db, $sql);
                                            if(!$ret) 
                                             {
                                                echo pg_last_error($db);
                                             exit;
                                             } 
                                             $row = pg_fetch_row($ret);
                                             
                                        ?>
                                        <td>Delievered Orders</td>
                                        <td>
                                            <button class="pd-setting" onClick="window.location='all_order.php';"><?php echo $row[0]; ?></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>6</td>
                                        <?php
                                             $sql =<<<EOF
                                             select count(*) from transaction_status where status = 'CANCELLED'
                                            EOF;
                                                $ret = pg_query($db, $sql);
                                            if(!$ret) 
                                             {
                                                echo pg_last_error($db);
                                             exit;
                                             } 
                                             $row = pg_fetch_row($ret);
                                             
                                        ?>
                                        <td>Cancelled Orders</td>
                                        <td>
                                            <button class="pd-setting" onClick="window.location='all_order.php';"><?php echo $row[0]; ?></button>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <div class="white-box analytics-info-cs mg-b-10 res-mg-b-30 res-mg-t-30 table-mg-t-pro-n tb-sm-res-d-n dk-res-t-d-n">
                            <h3 class="box-title">Total Customers</h3>
                            <ul class="list-inline two-part-sp">
                                <li>
                                    <div id="sparklinedash"></div>
                                </li>
                                <li class="text-right sp-cn-r"><i class="fa fa-level-up" aria-hidden="true"></i> <span class="counter text-success">1500</span></li>
                            </ul>
                        </div>
                        <div class="white-box analytics-info-cs mg-b-10 res-mg-b-30 tb-sm-res-d-n dk-res-t-d-n">
                            <h3 class="box-title">Current Customers</h3>
                            <ul class="list-inline two-part-sp">
                                <li>
                                    <div id="sparklinedash2"></div>
                                </li>
                                <li class="text-right graph-two-ctn"><i class="fa fa-level-up" aria-hidden="true"></i> <span class="counter text-purple">3000</span></li>
                            </ul>
                        </div>
                        <div class="white-box analytics-info-cs mg-b-10 res-mg-b-30 tb-sm-res-d-n dk-res-t-d-n">
                            <h3 class="box-title">New Customers</h3>
                            <ul class="list-inline two-part-sp">
                                <li>
                                    <div id="sparklinedash3"></div>
                                </li>
                                <li class="text-right graph-three-ctn"><i class="fa fa-level-up" aria-hidden="true"></i> <span class="counter text-info">5000</span></li>
                            </ul>
                        </div>
                        </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
                   
        
    </div>
    <?php include 'footer.html';?>

    <!-- jquery
		============================================ -->
    <script src="js/vendor/jquery-1.12.4.min.js"></script>
    <!-- bootstrap JS
		============================================ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- wow JS
		============================================ -->
    <script src="js/wow.min.js"></script>
    <!-- price-slider JS
		============================================ -->
    <script src="js/jquery-price-slider.js"></script>
    <!-- meanmenu JS
		============================================ -->
    <script src="js/jquery.meanmenu.js"></script>
    <!-- owl.carousel JS
		============================================ -->
    <script src="js/owl.carousel.min.js"></script>
    <!-- sticky JS
		============================================ -->
    <script src="js/jquery.sticky.js"></script>
    <!-- scrollUp JS
		============================================ -->
    <script src="js/jquery.scrollUp.min.js"></script>
    <!-- counterup JS
		============================================ -->
    <script src="js/counterup/jquery.counterup.min.js"></script>
    <script src="js/counterup/waypoints.min.js"></script>
    <script src="js/counterup/counterup-active.js"></script>
    <!-- mCustomScrollbar JS
		============================================ -->
    <script src="js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="js/scrollbar/mCustomScrollbar-active.js"></script>
    <!-- metisMenu JS
		============================================ -->
    <script src="js/metisMenu/metisMenu.min.js"></script>
    <script src="js/metisMenu/metisMenu-active.js"></script>
    <!-- morrisjs JS
		============================================ -->
    <script src="js/morrisjs/raphael-min.js"></script>
    <script src="js/morrisjs/morris.js"></script>
    <script src="js/morrisjs/morris-active.js"></script>
    <!-- morrisjs JS
		============================================ -->
    <script src="js/sparkline/jquery.sparkline.min.js"></script>
    <script src="js/sparkline/jquery.charts-sparkline.js"></script>
    <script src="js/sparkline/sparkline-active.js"></script>
    <!-- calendar JS
		============================================ -->
    <script src="js/calendar/moment.min.js"></script>
    <script src="js/calendar/fullcalendar.min.js"></script>
    <script src="js/calendar/fullcalendar-active.js"></script>
    <!-- plugins JS
		============================================ -->
    <script src="js/plugins.js"></script>
    <!-- main JS
		============================================ -->
    <script src="js/main.js"></script>
    <!-- tawk chat JS
		============================================ -->
    <script src="js/tawk-chat.js"></script>
</body>

</html>