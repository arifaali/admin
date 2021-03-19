

<?php include 'db.php';?>
<?php include 'side_bar_menu.html';?>
<?php include 'header.html';?>

<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>All Orders | 360STORE</title>
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
        <div class="product-sales-area mg-tb-30">
            <div class="container-fluid">
                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                        <div class="product-status-wrap">
                            <h2>ALL ORDERS</h2>
                        </div>
                </div>
            </div>
        </div>     
        <!-- TABS STARTS -->

 <?php if(isset($_GET['s']) && $_GET['s'] == 1){?>
    <div class="alert alert-success" id="succMsg">
  <strong>Success!</strong> Status of the order as been updated successfully
</div>
 <?php }?>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-payment-inner-st res-mg-t-30 analysis-progrebar-ctn">
                            <ul id="myTabedu1" class="tab-review-design">
                            <li class="active"><a href="#ordered">Ordererd orders</a></li>
                                <li><a href="#accepted"> Accepted Orders</a></li>
                                <li><a href="#packed">Packed Orders</a></li>
                                <li><a href="#enroute">Enroute Orders</a></li>
                                <li><a href="#delivered">Delivered Orders</a></li>
                                <li><a href="#cancelled">Cancelled Orders</a></li>
                            </ul>
                            <div id="myTabContent" class="tab-content custom-product-edit">
                                <!-- first -->
                                <div class="product-tab-list tab-pane fade active in" id="ordered">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                                
                                                <!-- Static Table Start -->
        <div class="data-table-area mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline13-list">
                            <div class="sparkline13-hd">
                                <div class="main-sparkline13-hd">
                                    <h1>Order <span class="table-project-n">List</span> </h1>
                                </div>
                            </div>
                            <div class="sparkline13-graph">
                                <div class="datatable-dashv1-list custom-datatable-overright">
                                    <div id="toolbar">
                                    </div>
                                    <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                        data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                        <thead>
                                        <tr>
                                                <th data-field="customer_name" data-editable="true">Customer name</th>
                                                <th data-field="status" data-editable="true">Order status</th>
                                                <th data-field="time" data-editable="true">Ordered Time</th>
                                                <th>Edit Order Status</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                             <?php
                                             $sql = <<<EOF
                                             SELECT transaction_status.*, pers.name FROM transaction_status INNER JOIN transaction trans ON trans.id = transaction_status.transaction INNER JOIN person pers ON pers.id = trans.person where transaction_status.status = 'ORDERED'
                                             EOF;
                                                $ret = pg_query($db, $sql);
                                            if(!$ret) 
                                             {
                                                echo pg_last_error($db);
                                             exit;
                                             } 
                                             ?>
                                             <?php
                                            while($row = pg_fetch_row($ret)) 
                                            { 
                                             ?>
                                            <tr>
                                                <td><?php echo $row[5]; ?></td>
                                                <td><?php echo $row[1]; ?></td>
                                                <td><?php echo $row[2]; ?></td>
                                                <td class="datatable-ct">
                                                    <a href="updateOrderStatus.php?id=<?php echo $row[0]; ?>">
                                                    <button data-toggle="tooltip" title="" class="pd-setting-ed" data-original-title="Edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                                    </a>
                                                </td>
                                            </tr>
                                            <?php 
                                            }  
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Static Table End -->

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- second -->
                                <div class="product-tab-list tab-pane fade" id="accepted">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">

                                            <div class="data-table-area mg-b-15">
                                            <!-- second table  -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline13-list">
                            <div class="sparkline13-hd">
                                <div class="main-sparkline13-hd">
                                    <h1>Order <span class="table-project-n">List</span> </h1>
                                </div>
                            </div>
                            <div class="sparkline13-graph">
                                <div class="datatable-dashv1-list custom-datatable-overright">
                                    <div id="toolbar">
                                    </div>
                                    <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                        data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                        <thead>
                                        <tr>
                                                <th data-field="customer_name" data-editable="true">Customer name</th>
                                                <th data-field="status" data-editable="true">Order status</th>
                                                <th data-field="time" data-editable="true">Ordered Time</th>
                                                <th>Edit Order Status</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                                <?php
                                             $sql =<<<EOF
                                             SELECT transaction_status.*, pers.name FROM transaction_status INNER JOIN transaction trans ON trans.id = transaction_status.transaction INNER JOIN person pers ON pers.id = trans.person where transaction_status.status = 'ACCEPTED' ;
                                            EOF;
                                                $ret = pg_query($db, $sql);
                                            if(!$ret) 
                                             {
                                                echo pg_last_error($db);
                                             exit;
                                             } 
                                             ?>
                                             <?php
                                            while($row = pg_fetch_row($ret)) 
                                            { 
                                             ?>
                                            <tr>
                                                <td><?php echo $row[5]; ?></td>
                                                <td><?php echo $row[1]; ?></td>
                                                <td><?php echo $row[2]; ?></td>
                                                <td class="datatable-ct">
                                                    <a href="updateOrderStatus.php?id=<?php echo $row[0]; ?>">
                                                    <button data-toggle="tooltip" title="" class="pd-setting-ed" data-original-title="Edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                                    </a>
                                                </td>
                                            </tr>
                                            <?php 
                                            }  
                                            ?>
                                        </tbody>
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
                                    </div>
                                </div>
                                <!-- 3rd -->
                                <div class="product-tab-list tab-pane fade" id="packed">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                            
                                            <div class="data-table-area mg-b-15">
                                            <!-- third table -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline13-list">
                            <div class="sparkline13-hd">
                                <div class="main-sparkline13-hd">
                                    <h1>Order <span class="table-project-n">List</span> </h1>
                                </div>
                            </div>
                            <div class="sparkline13-graph">
                                <div class="datatable-dashv1-list custom-datatable-overright">
                                    <div id="toolbar">
                                    </div>
                                    <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                        data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                        <thead>
                                        <tr>
                                                <th data-field="customer_name" data-editable="true">Customer name</th>
                                                <th data-field="status" data-editable="true">Order status</th>
                                                <th data-field="time" data-editable="true">Ordered Time</th>
                                                <th>Edit Order Status</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                                <?php
                                             $sql =<<<EOF
                                             SELECT transaction_status.*, pers.name FROM transaction_status INNER JOIN transaction trans ON trans.id = transaction_status.transaction INNER JOIN person pers ON pers.id = trans.person where transaction_status.status = 'PACKED' ;
                                            EOF;
                                                $ret = pg_query($db, $sql);
                                            if(!$ret) 
                                             {
                                                echo pg_last_error($db);
                                             exit;
                                             } 
                                             ?>
                                             <?php
                                            while($row = pg_fetch_row($ret)) 
                                            { 
                                             ?>
                                            <tr>
                                                <td><?php echo $row[5]; ?></td>
                                                <td><?php echo $row[1]; ?></td>
                                                <td><?php echo $row[2]; ?></td>
                                                <td class="datatable-ct">
                                                    <a href="updateOrderStatus.php?id=<?php echo $row[0]; ?>">
                                                    <button data-toggle="tooltip" title="" class="pd-setting-ed" data-original-title="Edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                                    </a>
                                                </td>
                                            </tr>
                                            <?php 
                                            }  
                                            ?>
                                        </tbody>
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
                                    </div>
                                </div>
                                <!-- 4th -->
                                <div class="product-tab-list tab-pane fade" id="enroute">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                            <!-- fourth table -->
                                                
                                            <div class="data-table-area mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline13-list">
                            <div class="sparkline13-hd">
                                <div class="main-sparkline13-hd">
                                    <h1>Order <span class="table-project-n">List</span> </h1>
                                </div>
                            </div>
                            <div class="sparkline13-graph">
                                <div class="datatable-dashv1-list custom-datatable-overright">
                                    <div id="toolbar">
                                    </div>
                                    <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                        data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                        <thead>
                                        <tr>
                                                <th data-field="customer_name" data-editable="true">Customer name</th>
                                                <th data-field="status" data-editable="true">Order status</th>
                                                <th data-field="time" data-editable="true">Ordered Time</th>
                                                <th>Edit Order Status</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                                <?php
                                             $sql =<<<EOF
                                             SELECT transaction_status.*, pers.name FROM transaction_status INNER JOIN transaction trans ON trans.id = transaction_status.transaction INNER JOIN person pers ON pers.id = trans.person where transaction_status.status = 'ENROUTE' ;
                                            EOF;
                                                $ret = pg_query($db, $sql);
                                            if(!$ret) 
                                             {
                                                echo pg_last_error($db);
                                             exit;
                                             } 
                                             ?>
                                             <?php
                                            while($row = pg_fetch_row($ret)) 
                                            { 
                                             ?>
                                            <tr>
                                                <td><?php echo $row[5]; ?></td>
                                                <td><?php echo $row[1]; ?></td>
                                                <td><?php echo $row[2]; ?></td>
                                                <td class="datatable-ct">
                                                    <a href="updateOrderStatus.php?id=<?php echo $row[0]; ?>">
                                                    <button data-toggle="tooltip" title="" class="pd-setting-ed" data-original-title="Edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                                    </a>
                                                </td>
                                            </tr>
                                            <?php 
                                            }  
                                            ?>
                                        </tbody>
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
                                    </div>
                                </div>
                                <!-- 5th -->
                                <div class="product-tab-list tab-pane fade" id="delivered">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                                
                                            <!-- fifth table  -->

                                            <div class="data-table-area mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline13-list">
                            <div class="sparkline13-hd">
                                <div class="main-sparkline13-hd">
                                    <h1>Order <span class="table-project-n">List</span> </h1>
                                </div>
                            </div>
                            <div class="sparkline13-graph">
                                <div class="datatable-dashv1-list custom-datatable-overright">
                                    <div id="toolbar">
                                    </div>
                                    <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                        data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                        <thead>
                                        <tr>
                                                <th data-field="customer_name" data-editable="true">Customer name</th>
                                                <th data-field="status" data-editable="true">Order status</th>
                                                <th data-field="time" data-editable="true">Ordered Time</th>
                                                <th>Edit Order Status</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                                <?php
                                             $sql =<<<EOF
                                             SELECT transaction_status.*, pers.name FROM transaction_status INNER JOIN transaction trans ON trans.id = transaction_status.transaction INNER JOIN person pers ON pers.id = trans.person where transaction_status.status = 'DELIVERED' ;
                                            EOF;
                                                $ret = pg_query($db, $sql);
                                            if(!$ret) 
                                             {
                                                echo pg_last_error($db);
                                             exit;
                                             } 
                                             ?>
                                             <?php
                                            while($row = pg_fetch_row($ret)) 
                                            { 
                                             ?>
                                            <tr>
                                                <td><?php echo $row[5]; ?></td>
                                                <td><?php echo $row[1]; ?></td>
                                                <td><?php echo $row[2]; ?></td>
                                                <td class="datatable-ct">
                                                    <a href="updateOrderStatus.php?id=<?php echo $row[0]; ?>">
                                                    <button data-toggle="tooltip" title="" class="pd-setting-ed" data-original-title="Edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                                    </a>
                                                </td>
                                            </tr>
                                            <?php 
                                            }  
                                            ?>
                                        </tbody>
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
                                    </div>
                                </div>
                                <!-- 6th -->
                                <div class="product-tab-list tab-pane fade" id="cancelled">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                                
                                            <!-- sixth table  -->

                                            <div class="data-table-area mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline13-list">
                            <div class="sparkline13-hd">
                                <div class="main-sparkline13-hd">
                                    <h1>Order <span class="table-project-n">List</span> </h1>
                                </div>
                            </div>
                            <div class="sparkline13-graph">
                                <div class="datatable-dashv1-list custom-datatable-overright">
                                    <div id="toolbar">
                                    </div>
                                    <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                        data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                        <thead>
                                        <tr>
                                                <th data-field="customer_name" data-editable="true">Customer name</th>
                                                <th data-field="status" data-editable="true">Order status</th>
                                                <th data-field="time" data-editable="true">Ordered Time</th>
                                                <th>Edit Order Status</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                                <?php
                                             $sql =<<<EOF
                                             SELECT pers.name, transaction_status.* FROM transaction_status INNER JOIN transaction trans ON trans.id = transaction_status.transaction INNER JOIN person pers ON pers.id = trans.person where transaction_status.status = 'CANCELLED' ;
                                            EOF;
                                                $ret = pg_query($db, $sql);
                                            if(!$ret) 
                                             {
                                                echo pg_last_error($db);
                                             exit;
                                             } 
                                             ?>
                                             <?php
                                            while($row = pg_fetch_row($ret)) 
                                            { 
                                             ?>
                                            <tr>
                                                <td><?php echo $row[0]; ?></td>
                                                <td><?php echo $row[2]; ?></td>
                                                <td><?php echo $row[3]; ?></td>
                                                <td class="datatable-ct">
                                                    <a href="updateOrderStatus.php?id=<?php echo $row[0]; ?>">
                                                    <button data-toggle="tooltip" title="" class="pd-setting-ed" data-original-title="Edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                                    </a>
                                                </td>
                                            </tr>
                                            <?php 
                                            }  
                                            ?>
                                        </tbody>
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
                                    </div>
                                </div>
        </div>
        </div>
        </div>


        <!-- TABS ENDS -->
        <!-- Static Table Start -->

        <!-- Static Table End -->
        
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
    <!-- data table JS
		============================================ -->
    <script src="js/data-table/bootstrap-table.js"></script>
    <script src="js/data-table/tableExport.js"></script>
    <script src="js/data-table/data-table-active.js"></script>
    <script src="js/data-table/bootstrap-table-editable.js"></script>
    <script src="js/data-table/bootstrap-editable.js"></script>
    <script src="js/data-table/bootstrap-table-resizable.js"></script>
    <script src="js/data-table/colResizable-1.5.source.js"></script>
    <script src="js/data-table/bootstrap-table-export.js"></script>
    <!--  editable JS
		============================================ -->
    <script src="js/editable/jquery.mockjax.js"></script>
    <script src="js/editable/mock-active.js"></script>
    <script src="js/editable/select2.js"></script>
    <script src="js/editable/moment.min.js"></script>
    <script src="js/editable/bootstrap-datetimepicker.js"></script>
    <script src="js/editable/bootstrap-editable.js"></script>
    <script src="js/editable/xediable-active.js"></script>
    <!-- Chart JS
		============================================ -->
    <script src="js/chart/jquery.peity.min.js"></script>
    <script src="js/peity/peity-active.js"></script>
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
    <script> 
    setTimeout(function(){
        $("#succMsg").hide();
    },3000);
    </script>

</body>

</html>
