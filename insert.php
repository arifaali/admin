<?php
include 'db.php';
if(!empty($_POST))
{
     $output = '';
     $name = $_POST['name1'];
     $desc = $_POST["desc1"];  
     $price = $_POST["price1"];  
     $prod_qty = $_POST["prod_qty1"];  
     $qty_type = $_POST["qty_type1"];
     $prod_image = "http://360store.co.in/images/banner3.jpg";
     $prod_vat = $_POST["prod_vat"];
     $net_price = $_POST["net_price"];
     $cat_id = $_POST["catId"];
     $sub_cat_id = $_POST["subcatId"];
     $astock = $_POST["astock"];
     $cstock = $_POST["cstock"];
     $prod_id = $_POST["prod_id"];
         
      
     //insert into product (id, name, description, price, qty, qty_type, product_image, vat_charges, actual_stock, current_stock) values (DEFAULT, '$name', '$desc', '$price', '$prod_qty', '$qty_type', '$prod_image', '$prod_vat', '$stock', '$stock')
     //print_r($_POST);
     //print_r($_FILES);
     //exit;
     if($cat_id == '1' || $cat_id == '2' || $cat_id == '3' || $cat_id == '4' || $cat_id == '5' || $cat_id == '8' )
     {
          if($prod_id != 0)
          {
               $sql =<<<EOF
               update product set name = '$name', description = '$desc', price = '$price', qty = '$prod_qty', qty_type = '$qty_type', vat_charges = '$prod_vat', netprice = '$net_price', actual_stock = '$astock', current_stock = '$cstock' where id = $prod_id;
               EOF;
               $ret = pg_query($db, $sql);

          }
          else{

               $sql =<<<EOF
               insert into product (id, name, description, price, qty, qty_type, product_image, vat_charges, netprice, actual_stock, current_stock) values (DEFAULT, '$name', '$desc', '$price', '$prod_qty', '$qty_type', '$prod_image', '$prod_vat', '$net_price', '$astock', '$cstock') RETURNING id;
               EOF;
               $ret = pg_query($db, $sql);
               while($row1 = pg_fetch_row($ret))
               {
               $id1 = $row1[0];
          }
               $sql1 =<<<EOF
               insert into product_tags (product, tag, sub_tag) values ('$id1', '$cat_id', '0');	
               EOF;
               $ret1 = pg_query($db, $sql1);
               if($cat_id == 1)
               {
                    $upload_dir = '../cate_images/apple'.DIRECTORY_SEPARATOR; 
               }
               elseif($cat_id == 2)
               {
                    $upload_dir = '../cate_images/kudumbashree'.DIRECTORY_SEPARATOR;
               }
               elseif($cat_id == 3)
               {
                    $upload_dir = '../cate_images/essentials'.DIRECTORY_SEPARATOR;
               }
               elseif($cat_id == 4)
               {
                    $upload_dir = '../cate_images/kids_care_sanitary_pads'.DIRECTORY_SEPARATOR;
               }
               elseif($cat_id == 5)
               {
                    $upload_dir = '../cate_images/dates_nuts'.DIRECTORY_SEPARATOR;
               }
               elseif($cat_id == 8)
               {
                    $upload_dir = '../cate_images/home_appliances'.DIRECTORY_SEPARATOR;
               }
               
               
          $allowed_types = array('jpg', 'png', 'jpeg', 'gif'); 
               // Define maxsize for files i.e 2MB 
          $maxsize = 2 * 1024 * 1024;
               if(!empty(array_filter($_FILES['files']['name'])))
               { 
               // Loop through each file in files[] array 
                    foreach ($_FILES['files']['tmp_name'] as $key => $value) 
                         { 
                              $file_tmpname = $_FILES['files']['tmp_name'][$key]; 
                              $file_name = $_FILES['files']['name'][$key]; 
                              $file_size = $_FILES['files']['size'][$key]; 
                              $file_ext = pathinfo($file_name, PATHINFO_EXTENSION); 
               
                              // Set upload file path 
                              $filepath = $upload_dir.$file_name;
                              $url_path = 'http://360store.co.in/';
                              $filepath1 = $url_path.$filepath;
                    // Check file type is allowed or not 
                              if(in_array(strtolower($file_ext), $allowed_types)) 
                              { 
               
                                   // Verify file size - 2MB max 
                         if ($file_size > $maxsize)
                         {		 
                                        echo "Error: File size is larger than the allowed limit."; 
                              }
                                   // If file with name already exist then append time in 
                                   // front of name of the file to avoid overwriting of file 
                                   if(file_exists($filepath)) 
                                   { 
                                        $filepath = $upload_dir.time().$file_name;
                                        
                                        if( move_uploaded_file($file_tmpname, $filepath)) { 
                                             echo "{$file_name} successfully uploaded <br />";
                                             $sql =<<<EOF
                                             insert into product_images (id, product_id, product_image) values (DEFAULT, '$id1', '$filepath1');	
                                             EOF;
                                             $ret = pg_query($db, $sql); 
                                        } 
                                        else {					 
                                             echo "Error uploading {$file_name} <br />"; 
                                        } 
                                   } 
                                   else 
                                   { 
                                        if( move_uploaded_file($file_tmpname, $filepath)) 
                                        { 
                                             echo "{$file_name} successfully uploaded <br />"; 
                                             $sql =<<<EOF
                                             insert into product_images (id, product_id, product_image) values (DEFAULT, '$id1', '$filepath1');	
                                             EOF;
                                             $ret = pg_query($db, $sql);
                                        } 
                                        else 
                                        {					 
                                             echo "Error uploading {$file_name} <br />"; 
                                        } 
                                   } 
                              } 
                              else 
                              { 
                                   
                                   // If file extention not valid 
                                   echo "Error uploading {$file_name} "; 
                                   echo "({$file_ext} file type is not allowed)<br / >"; 
                              } 
                         }
                    $sql =<<<EOF
                    update product set product_image = '$filepath1' where id = $id1;
                    EOF;
                    $ret = pg_query($db, $sql); 
               
               }

          }

     }
     elseif($cat_id == '6')
     {
    
          if($sub_cat_id == '1' || $sub_cat_id == '2' || $sub_cat_id == '3')
          {
               if($prod_id != 0)
               {
               $sql =<<<EOF
               update product set name = '$name', description = '$desc', price = '$price', qty = '$prod_qty', qty_type = '$qty_type', vat_charges = '$prod_vat', netprice = '$net_price' where id = $prod_id;
               EOF;
               $ret = pg_query($db, $sql);
               header('Location: ' . $_SERVER['HTTP_REFERER']);

               }
               else
               {
                    $prod_size = $_POST["prod_size"];
                    $stock = "0";
                    $variant_stock = $_POST["variant_stock"];
                    $variant1 = (array_filter($variant_stock));
                    $variant2 = array_values($variant1); 

                    $sql =<<<EOF
                    insert into product (id, name, description, price, qty, qty_type, product_image, vat_charges, netprice, actual_stock, current_stock) values (DEFAULT, '$name', '$desc', '$price', '$prod_qty', '$qty_type', '$prod_image', '$prod_vat', '$net_price', '$stock', '$stock') RETURNING id;
                    EOF;
                    $ret = pg_query($db, $sql);
                    while($row1 = pg_fetch_row($ret))
                    {
                         $id1 = $row1[0];
                    }
                    $sql1 =<<<EOF
                    insert into product_tags (product, tag, sub_tag) values ('$id1', '$cat_id', '$sub_cat_id');	
                    EOF;
                    $ret1 = pg_query($db, $sql1);
                    if($sub_cat_id == 1)
                    {
                    $upload_dir = '../cate_images/fashion/men'.DIRECTORY_SEPARATOR; 
                    }
                    elseif($sub_cat_id == 2)
                    {
                    $upload_dir = '../cate_images/fashion/women'.DIRECTORY_SEPARATOR;
                    }
                    elseif($sub_cat_id == 3)
                    {
                    $upload_dir = '../cate_images/fashion/kids'.DIRECTORY_SEPARATOR;
                    }
                    $allowed_types = array('jpg', 'png', 'jpeg', 'gif'); 
                    // Define maxsize for files i.e 2MB 
                    $maxsize = 2 * 1024 * 1024;
                    if(!empty(array_filter($_FILES['files']['name'])))
                    { 
                    // Loop through each file in files[] array 
                         foreach ($_FILES['files']['tmp_name'] as $key => $value) 
                              { 
                                   $file_tmpname = $_FILES['files']['tmp_name'][$key]; 
                                   $file_name = $_FILES['files']['name'][$key]; 
                                   $file_size = $_FILES['files']['size'][$key]; 
                                   $file_ext = pathinfo($file_name, PATHINFO_EXTENSION); 
                    
                                   // Set upload file path 
                                   $filepath = $upload_dir.$file_name;
                                   $url_path = 'http://360store.co.in/';
                                   $filepath1 = $url_path.$filepath;
                                   // Check file type is allowed or not 
                                   if(in_array(strtolower($file_ext), $allowed_types)) 
                                   { 
                    
                                        // Verify file size - 2MB max 
                         if ($file_size > $maxsize)
                              {		 
                                             echo "Error: File size is larger than the allowed limit."; 
                                        }
                                        // If file with name already exist then append time in 
                                        // front of name of the file to avoid overwriting of file 
                                        if(file_exists($filepath)) 
                                        { 
                                             $filepath = $upload_dir.time().$file_name;
                                             
                                             if( move_uploaded_file($file_tmpname, $filepath)) { 
                                                  echo "{$file_name} successfully uploaded <br />";
                                                  $sql =<<<EOF
                                                  insert into product_images (id, product_id, product_image) values (DEFAULT, '$id1', '$filepath1');	
                                                  EOF;
                                                  $ret = pg_query($db, $sql); 
                                             } 
                                             else {					 
                                                  echo "Error uploading {$file_name} <br />"; 
                                             } 
                                        } 
                                        else 
                                        { 
                                             if( move_uploaded_file($file_tmpname, $filepath)) 
                                             { 
                                                  echo "{$file_name} successfully uploaded <br />"; 
                                                  $sql =<<<EOF
                                                  insert into product_images (id, product_id, product_image) values (DEFAULT, '$id1', '$filepath1');	
                                                  EOF;
                                                  $ret = pg_query($db, $sql);
                                             } 
                                             else 
                                             {					 
                                                  echo "Error uploading {$file_name} <br />"; 
                                             } 
                                        } 
                                   } 
                                   else 
                                   { 
                                        
                                        // If file extention not valid 
                                        echo "Error uploading {$file_name} "; 
                                        echo "({$file_ext} file type is not allowed)<br / >"; 
                                   } 
                              }
                         $sql =<<<EOF
                         update product set product_image = '$filepath1' where id = $id1;
                         EOF;
                         $ret = pg_query($db, $sql);

                    
                    }
               
               }
               foreach ($prod_size as $key => $value){ 
                    $fashion_stock = $variant2[$key];
                    $sql =<<<EOF
                    insert into product_qtytype (id, product_id, quantity, current_stock, actual_stock) values (DEFAULT, '$id1', '$value', '$fashion_stock', '$fashion_stock');	
                    EOF;
                    $ret = pg_query($db, $sql);

               }
               $sql =<<<EOF
               select sum(current_stock) from product_qtytype where product_id = $id1;
               EOF;
               $ret = pg_query($db, $sql);
               while($row2 = pg_fetch_row($ret))
               {
                    $cur_stock_new = $row2[0];
               }
               $sql =<<<EOF
               select sum(actual_stock) from product_qtytype where product_id = $id1;
               EOF;
               $ret = pg_query($db, $sql);
               while($row3 = pg_fetch_row($ret))
               {
                    $act_stock_new = $row3[0];
               }
               $sql =<<<EOF
               update product set current_stock = $cur_stock_new and actual_stock = $act_stock_new where id = $id1;
               EOF;
               $ret = pg_query($db, $sql);
          
               }
             }  
          }
     else
     {
          echo "Invalid Entry";

     }

     if(!$ret) {
          echo pg_last_error($db);
          exit;
      } else
      {
          //header("Location: fashion.php");
          header('Location: ' . $_SERVER['HTTP_REFERER']);
      }
          
     echo $output;
?>