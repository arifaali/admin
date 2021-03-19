<?php
include 'db.php';
if(!empty($_POST))
{
     $prod_id = $_POST['prod_id'];
     $ofrprice = $_POST["price1"];  
     $prod_qty = $_POST["prod_qty1"];  
     $start_date = $_POST["start_date"];
     $end_date = $_POST["end_date"];
     
     if($start_date != '')
     {
          $sql =<<<EOF
          insert into offer (shop, product, qty, value, is_active, id, start_date, end_date) values (1, '$prod_id', '$prod_qty', '$ofrprice', TRUE, DEFAULT, '$start_date', '$end_date')
          EOF;
          $ret = pg_query($db, $sql);
          if(!$ret) 
          {
            echo pg_last_error($db);
            exit;
          } 
          else
          {
            header("Location: offer.php");
            
          }
          
     }
     else
     {
          echo "Invalid Entry";

     }

     
          
}
     echo $output;
?>

