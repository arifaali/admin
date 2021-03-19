<?php include 'db.php';

$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
//$subcat_id = $_GET['sub_id'];
preg_match("/[^\/]+$/", $actual_link, $matches);
$subcat_id = $matches[0];
//$subcat_id = 1;
//and pr.current_stock > 0
$sql =<<<EOF
select pr.id, pr.name, pr.description, pr.price ,pr.qty, pr.qty_type, pr.product_image, ofr.value as OfferPrice, pr.vat_charges, pr.current_stock  from product pr join product_tags tg on tg.product = pr.id left join offer ofr on ofr.product = pr.id where tg.tag = 6 and tg.sub_tag = $subcat_id and pr.current_stock > 0;
EOF;
$ret = pg_query($db, $sql);
if(!$ret) 
{
echo pg_last_error($db);
exit;
} 
$result = array();
$row2 = array();
$row3 = array();
//$row = pg_fetch_array($ret);
while($row = pg_fetch_row($ret)) 
{
    $prod_id = $row[0];
    $variant = array();
    $variant1 = array();
    $result1 = array();
    $result2 = array();
    $sql1 =<<<EOF
    select id, quantity from product_qtytype where product_id = $prod_id;
    EOF;
    $ret1 = pg_query($db, $sql1);
    $res = array();
    while($row1 = pg_fetch_row($ret1))
    {
	$variant['id'] = $row1[0];
        $variant['variantname'] = $row1[1];
        $result1[] = $variant;
    }
    $sql2 =<<<EOF
    select product_image from product_images where product_id = $prod_id;
    EOF;
    $ret2 = pg_query($db, $sql2);
    $res1 = array();
    while($row3 = pg_fetch_row($ret2))
    {
        $variant1 = $row3[0];
        $result2[] = $variant1;
    }
    $row2['id'] = $row[0];
    $row2['name'] = $row[1];
    $row2['desc'] = $row[2];
    $row2['price'] = $row[3];
    $row2['qty'] = $row[4];
    $row2['qtyType'] = $row[5];
    $row2['image'] = $result2;
    $row2['offerPrice'] = $row[7];
    $row2['gstPercentage'] = $row[8];
    $row2['variant'] = $result1;
    $result[] = $row2;
}

//print_r($result);
//echo json_encode(array('Products' => $result), true);
echo json_encode($result, true);
?>
