<?php include 'db.php';?>
<?php include 'side_bar_menu.html';?>
<?php include 'header.html';?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Kids Care & Sanitory Pads | 360STORE</title>
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
                            <h2>KIDS CARE & SANITARY PADS</h2>
                        </div>
                </div>
            </div>
        </div>                    
        <!-- Static Table Start -->

        <?php
   $sql =<<<EOF
   select prod.* from product prod join product_tags as pt on prod.id = pt.product where pt.tag = 4;
EOF;

   $ret = pg_query($db, $sql);
   if(!$ret) {
      echo pg_last_error($db);
      exit;
   } 

?>
        <div class="data-table-area mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">       
                        <div class="sparkline13-list">
                            <div class="sparkline13-hd">
                                <div class="main-sparkline13-hd">
                                    <h1>Kids care & sanitary pads product list</h1>
                                    <div align="right">
                                    <button type="button" name="age" id="age" data-toggle="modal" data-target="#add_data_Modal" class="btn btn-warning" onClick = "addprod();">Add</button>
                                    </div>
                                </div>
                            </div>
                                    <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                        data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                        <thead>
                                            <tr>
                                                <th data-field="id">ID</th>
                                                <th data-field="name" data-editable="true">Product Name</th>
                                                <th data-field="Description" data-editable="true">Description</th>
                                                <th data-field="Price" data-editable="true">Price</th>
                                                <th data-field="Quantity" data-editable="true">Quantity</th>
                                                <th data-field="Quantity_Type" data-editable="true">Quantity Type</th>
                                                <th data-field="Current_Stock" >Current Stock</th>
                                                <th data-field="Actual_stock" >Actual Stock</th>
                                                <th data-field="Product_Image">Product Image</th>
                                                <th data-field="Product_Edit">Product Edit</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        
                                            <?php
                                            while($row = pg_fetch_row($ret)) { 
                                              ?>
                                            <tr>
                                            
                                              <td><?php echo $row[0]; ?></td>
                                              <td><?php echo $row[1]; ?></td>
                                              <td><?php echo $row[2]; ?></td>
                                              <td><?php echo $row[3]; ?></td>
                                              <td><?php echo $row[4]; ?></td>
                                              <td><?php echo $row[5]; ?></td>
                                              <td><?php echo $row[10]; ?></td>
                                              <td><?php echo $row[11]; ?></td>
                                                <td>
                                                <?php 
                                                $sql1 =<<<EOF
                                                select product_image from product_images where product_id = $row[0]
                                                EOF;
                                                $ret1 = pg_query($db, $sql1);
                                                $result1 = array();
                                                while($row1 = pg_fetch_row($ret1))
                                                {
                                                $image1 = $row1[0];
                                                
                                                                   
                                                ?>
                                                <img src="<?php echo $image1 ?>" style = "width:10%; <height:5></height:10>%;" >
                                                <?php }?>
                                                </td>
                                                <td>
                                               <button type="button" onclick="getdetails(<?php echo $row[0]; ?>)" class="btn btn-warning">Edit</button>
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
        <div id="add_data_Modal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Product details</h4>
                </div>
    <div class="modal-body">
    <form method="post" id="insert_form" action="insert.php" enctype="multipart/form-data">
     <label>Enter Product Name</label>
     <input type="text" name="name1" id="name1" class="form-control" />
     <br />
     <label>Enter Product Description</label>
     <textarea name="desc1" id="desc1" class="form-control"></textarea>
     <br />
     <label>Enter Product Price</label>
     <input type="text" name="price1" id="price1" class="form-control" />
     <br />  
     <label>Enter Product Quantity</label>
     <input type="text" name="prod_qty1" id="prod_qty1" class="form-control" />
     <br />
     <label>Enter Net Price</label>
     <input type="text" name="net_price" id="net_price" class="form-control" />
     <br />
     <label>Select Product Quantity_Type</label>
     <select name="qty_type1" id="qty_type1" class="form-control">
     <option value="ltr">Ltr</option>  
      <option value="kg">Kg</option>
      <option value="number">Number</option>
      <option value="gm">Gm</option>
      <option value="size">Size</option>
      <option value="ml">Ml</option>
     </select>
     <br />
     <label>Enter Product Current stock</label>
     <input type="text" name="cstock" id="cstock" class="form-control" />
     <br />
     <label>Enter Product Actual stock</label>
     <input type="text" name="astock" id="astock" class="form-control" />
     <br />
     <span id="imgDiv">
     <label>Enter Product Image</label>
     <input type="file" name="files[]" multiple />
     </span>
     <br />
     <label>Enter Product Vat</label>
     <input type="text" name="prod_vat" id="prod_vat" class="form-control" />
     <br />
     <input type="hidden" id="catId" name="catId" value="4" />
     <input type="hidden" id="prod_id" name="prod_id" value="0" />
     
     <br />
     <input type="submit" name="insert" id="insert" value="Add" class="btn btn-success" />

    </form>
   </div>
   <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
   </div>
  </div>
 </div>
</div>

<div id="dataModal" class="modal fade">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">Product Details</h4>
   </div>
   <div class="modal-body" id="product_details">
    
   </div>
   <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
   </div>
  </div>
 </div>
</div>
    
</div>

</body>

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

    </html>

    <script>

    function addprod(){
      $("#prod_id").val(0);
      $("#name1").val('');
      $("#desc1").val('');
      $("#price1").val('');
      $("#prod_qty1").val('');
      $("#net_price").val('');
      $("#qty_type1").val('');
      $("#stock").val('');
      $("#prod_vat").val('');
      $("#imgDiv").show();
      $("#insert").val("Add");
    }

    function getdetails(pId)
    {
      $('#add_data_Modal').modal('show');
      //console.log('h');
      //ajax
      $.ajax({
            url:"getproductdetails.php",    //the page containing php script
            type: "post",    //request type,
            dataType: 'json',
            data: {id: pId},
            success:function(result)
            {
                $("#prod_id").val(pId);
                $("#name1").val(result[0].name);
                $("#desc1").val(result[0].description);
                $("#price1").val(result[0].price);
                $("#prod_qty1").val(result[0].qty);
                $("#net_price").val(result[0].netprice);
                $("#qty_type1").val(result[0].qty_type);
                $("#astock").val(result[0].actual_stock);
                $("#cstock").val(result[0].current_stock);
                $("#prod_vat").val(result[0].vat_charges);
                $("#imgDiv").hide();
                $("#insert").val("Update");
            },

            error: function (error) {
                alert(JSON.stringify(error));
            }
                    });
                  //$("#name1").val('test');

    }
</script>
