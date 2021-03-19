<?php
include 'db.php';
$id = $_POST["id"];

$result = array();
$sql =<<<EOF
   select prod.* from product prod join product_tags as pt on prod.id = pt.product where prod.id = $id;
EOF;

   $ret = pg_query($db, $sql);
   while($row = pg_fetch_assoc($ret)) 
   {
    $result[]= $row;

   }
echo json_encode($result, true);
?>
