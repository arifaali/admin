<?php include 'db.php';

$sql =<<<EOF
select carousal_image from carousal;
EOF;
$ret = pg_query($db, $sql);
if(!$ret) 
{
echo pg_last_error($db);
exit;
} 
$result = array();
$row = array();
$row2 = array();
$row3 = array();
$row4 = array();
$row5 = array();
$row6 = array();
$row7 = array();
$result1 = array();
$result2 = array();
$result3 = array();
$result4 = array();
$result5 = array();
$result6 = array();
$image = array();
$image1 = array();
$variant = array();
//$row = pg_fetch_array($ret);
while($row = pg_fetch_row($ret)) 
{
    $row1[] = $row[0];
    $result1 = $row1;
}

$sql1 =<<<EOF
select * from tags where subtag_flag = 0;
EOF;
$ret1 = pg_query($db, $sql1);
if(!$ret1)
{
echo pg_last_error($db);
exit;
}
//$row = pg_fetch_array($ret);
while($row2 = pg_fetch_row($ret1))
{
	$row3['id'] = $row2[0];
	$row3['name'] = $row2[1];
	$row3['url'] = $row2[2];
    $result2[] = $row3;
}

$sql2 =<<<EOF
select  ofr.product as id, pr.name as name, pr.description as desc, pr.price as price, ofr.qty as qty, pr.qty_type as qtyType, product_image as image, ofr.value as offerPrice, vat_charges as gstPercentage, pt.sub_tag as variant from offer ofr join product pr on ofr.product = pr.id left join product_tags pt on ofr.product = pt.product
EOF;
$ret2 = pg_query($db, $sql2);
if(!$ret2)
{
echo pg_last_error($db);
exit;
}
//$row = pg_fetch_array($ret);
while($row4 = pg_fetch_row($ret2))
{

    $id1 = $row4[0];
    $image1 = $row4[6];
    $row5['id'] = $row4[0];
    $row5['name'] = $row4[1];
    $row5['desc'] = $row4[2];
    $row5['price'] = $row4[3];
    $row5['qty'] = $row4[4];
    $row5['qtyType'] = $row4[5];
    //$row5['image'] = $row4[6];
    $row5['offerPrice'] = $row4[7];
    $row5['gstPercentage'] = $row4[8];
    //$row5['variant'] = $result4;
    $sql3 =<<<EOF
    select id, quantity from product_qtytype where product_id = $id1
    EOF;
    $ret3 = pg_query($db, $sql3);
    //$res = $result7 =  array();
    $num_rows = pg_num_rows($ret3);
    if ($num_rows !=  0)
    {
        $result7 =  array();
        while($row6 =pg_fetch_row($ret3))
        {
            $variant['id'] = $row6[0];
            $variant['variantname'] = $row6[1];
            $result7[] = $variant;
        }
    }
    else
    {
        $result7 = null;
    }

    $sql4 =<<<EOF
    select product_image from product_images where product_id = $id1
    EOF;
    $ret4 = pg_query($db, $sql4);
    $result5 = array();
    while($row7 = pg_fetch_row($ret4))
    {
        $image1 = $row7[0];
        $result5[] = $image1;
    }
    $row5['image'] = $result5;
    $row5['variant'] = $result7;
    $result3[] = $row5;

}

$sql8 =<<<EOF
select title from dashboard_caption
EOF;
$ret8 = pg_query($db, $sql8);
if(!$ret2)
{
echo pg_last_error($db);
exit;
}
//$row = pg_fetch_array($ret);
while($row8 = pg_fetch_row($ret8))
{
    $result4 = $row8[0];
}


$result = array("carousalList"=>$result1, "categoryList"=>$result2, "dashboardCaption"=>$result4, "dealsProduct"=>$result3);
echo json_encode( $result, true);
?>
