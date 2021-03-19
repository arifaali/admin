
<?php include 'db.php';?>
<?php include 'side_bar_menu.html';?>
<?php include 'header.html';?>

<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Edit Orders | 360STORE</title>
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
    <!-- x-editor CSS
		============================================ -->
    <link rel="stylesheet" href="css/editor/select2.css">
    <link rel="stylesheet" href="css/editor/datetimepicker.css">
    <link rel="stylesheet" href="css/editor/bootstrap-editable.css">
    <link rel="stylesheet" href="css/editor/x-editor-style.css">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="css/data-table/bootstrap-table.css">
    <link rel="stylesheet" href="css/data-table/bootstrap-editable.css">
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
                        <a href="dashboard.php"><img class="main-logo" src="img/logo/logo1.png" alt="" /></a>
                    </div>
                </div>
            </div>
        </div>
       
        <div class="blog-details-area mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="sparkline13-list">
                            <div class="sparkline13-hd">
                                <div class="main-sparkline13-hd">
                                    <h1>ORDER</h1>
                                </div>
                            </div>
                        </div>    
                        <div class="blog-details-inner">
                            
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="comment-head">
                                        <h3>Customer Details</h3>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="comment-head">
                                        <h3>Product Details</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                            <!-- customer details -->
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="user-comment">
                                        <div class="comment-details">
                                        <div class="asset-inner">
                                <table>

                                    <?php
                                    $var = $_GET['id'];
                                    $sql =<<<EOF
                                    SELECT pers.id, pers.name, addi.address_line_1, addi.address_line_2, addi.city, addi.pin, addi.contact FROM transaction trans INNER JOIN address addi ON addi.id = trans.address INNER JOIN person pers ON pers.id = trans.person where trans.id = '$var';
                                    EOF;
                                    $ret = pg_query($db, $sql);
                                        if(!$ret) 
                                        {
                                        echo pg_last_error($db);
                                        exit;
                                        } 
                                    $row = pg_fetch_row($ret);   
                                    ?>

                                    <tr> 
                                    <th><h4>Customer name :</h4></th><td><h4><?php echo $row[1]; ?></h4></td> 
                                    </tr>

                                    <tr>
                                    <th><h4>Customer phone number :</h4></th><td><h4><?php echo $row[6]; ?></h4></td>
                                    </tr>

                                    <tr><th><h3>Customer address </h3></th></tr>
                                    <tr><td><h4> address1 : <?php echo $row[2]; ?> </h4></td></tr>
                                    <tr><td><h4> address2 : <?php echo $row[3]; ?></h4></td></tr>
                                    <tr><td><h4> city:  <?php echo $row[4]; ?></h4></td></tr>
                                    <tr><td><h4> Pincode:  <?php echo $row[5]; ?></h4></td></tr>

                                </table>
                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- product details -->
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                
                                    <div class="user-comment">
                                    <div class="product-status mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-status-wrap drp-lst">
                           
                            <div class="asset-inner">
                                <table>
                                    <tr>
                                        <th>Product</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>Payment mode</th>
                                        <th>Payment status</th>
                                    </tr>
                                    <tr>
                                    <?php
                                        $var = $_GET['id'];
                                        $sql =<<<EOF
                                        SELECT tp.transaction, pd.name, tp.qty, tp.discounted_price, ts.payment_mode, ts.payment_status FROM transaction_products tp INNER JOIN product pd ON tp.product = pd.id JOIN transaction_status ts ON ts.transaction = tp.transaction where  tp.transaction = '$var' ;
                                        EOF;
                                        $ret = pg_query($db, $sql);
                                            if(!$ret) 
                                            {
                                            echo pg_last_error($db);
                                            exit;
                                            } 
                                    ?>
                                    <?php
                                    $tot = 30;
                                        while($row = pg_fetch_row($ret)) 
                                        { 
                                            $tot = $tot + $row[3];
                                    ?>
                                    <tr>
                                                <td><?php echo $row[1]; ?></td>
                                                <td><?php echo $row[2]; ?></td>
                                                <td><?php echo $row[3]; ?></td>
                                                <td><?php echo $row[4]; ?></td>
                                                <td><?php echo $row[5]; ?></td>

                                    </tr>
                                    <?php 
                                        }  
                                    ?>
                                        <td><h3>Total </h3></td>
                                        <td></td>
                                        <td></td>
                                        <td><h3><?php echo $tot; ?></h3></td>
                                        
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
                                    </div>
                                </div>
                            </div>
                            
                           <br>
                            <div class="row">
                                <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                                    <div class="lead-head">
                                        <h3>Order Update Status</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="coment-area">
                                    <form id="comment" action="updateorder.php" method="post" class="comment">
                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 blog-res-mg-bt">
                                            <div class="form-group">
                                            <select class="form-control custom-select-value" name="status">
																			<option value=ACCEPTED>Accept order</option>
																			<option value=PACKED>Packed order</option>
																			<option value=ENROUTE>Enroute order</option>
                                      <option value=DELIVERED>Delivered order</option>
                                      <option value=CANCELLED>Cancelled order</option>
																		</select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                            
                                            <div class="payment-adress comment-stn">
                                            <input name = "transaction_id" type = "hidden" value = "<?php echo $var ; ?>">
                                                <button type="submit" class="btn btn-primary waves-effect waves-light">Update</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
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
    <script src="js/sparkline/jquery.sparkline.min.js"></script>
    <script src="js/sparkline/jquery.charts-sparkline.js"></script>
    <!-- calendar JS
		============================================ -->
    <script src="js/calendar/moment.min.js"></script>
    <script src="js/calendar/fullcalendar.min.js"></script>
    <script src="js/calendar/fullcalendar-active.js"></script>
    <!-- maskedinput JS
		============================================ -->
    <script src="js/jquery.maskedinput.min.js"></script>
    <script src="js/masking-active.js"></script>
    <!-- datepicker JS
		============================================ -->
    <script src="js/datepicker/jquery-ui.min.js"></script>
    <script src="js/datepicker/datepicker-active.js"></script>
    <!-- form validate JS
		============================================ -->
    <script src="js/form-validation/jquery.form.min.js"></script>
    <script src="js/form-validation/jquery.validate.min.js"></script>
    <script src="js/form-validation/form-active.js"></script>
    <!-- tab JS
		============================================ -->
    <script src="js/tab.js"></script>
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