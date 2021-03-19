<?php include 'db.php';

$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
//$subcat_id = $_GET['sub_id'];
preg_match("/[^\/]+$/", $actual_link, $matches);
$cat_id = $matches[0];

$sql =<<<EOF
select pr.id, pr.name, pr.description, pr.price ,pr.qty, pr.qty_type, pr.product_image, ofr.value as OfferPrice, pr.vat_charges  from product pr join product_tags tg on tg.product = pr.id left join offer ofr on ofr.product = pr.id where tg.tag = $cat_id;
EOF;
$ret = pg_query($db, $sql);
if(!$ret) 
{
echo pg_last_error($db);
exit;
} 
$result = array();
$row = array();
$row1 = array();
$row2 = array();
while($row = pg_fetch_row($ret)) 
{
    //$result2 = array();
    //$id1 = $row[0];
    $row2['id'] = $row[0];
    $row2['name'] = $row[1];
    $row2['desc'] = $row[2];
    $row2['price'] = $row[3];
    $row2['qty'] = $row[4];
    $row2['qtyType'] = $row[5];
    $row2['image'] = $row[6];
    $row2['offerPrice'] = $row[7];
    $row2['gstPercentage'] = $row[8];
    
    /*$sql1 =<<<EOF
    select product_image from product_images where product_id = $id1
    EOF;
    $ret1 = pg_query($db, $sql1);
    $result5 = array();
    while($row1 = pg_fetch_row($ret1))
    {
    $image1 = $row1[0];
    $result2[] = $image1;
    }
    $row2['image'] = $result2;*/
    $result[] = $row2;
}    

//print_r($result);
//echo json_encode(array('Products' => $result), true);
echo json_encode($result, true);
?>
