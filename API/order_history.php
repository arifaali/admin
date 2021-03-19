<?php
include 'db.php';
$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
//$subcat_id = $_GET['sub_id'];
preg_match("/[^\/]+$/", $actual_link, $matches);
$id = $matches[0];
$sql =<<<EOF
select * from transaction where person = $id
EOF;
$ret = pg_query($db, $sql);
if(!$ret) 
{
echo pg_last_error($db);
exit;
} 
$result = array();
$row2 = array();

//$row = pg_fetch_array($ret);
while($row = pg_fetch_row($ret)) 
{
	$orderId = $row[0];
	$shop = $row[1];
	$person = $row[2];
	$address = $row[3];
	$paymentId = $row[4];
    $products = array();
    $result1 = array();
    $sql1 =<<<EOF
    select tp.*, prod.name, prod.description, prod.price, prod.qty as pqty, prod.qty_type, prod.product_image, prod.vat_charges, ofr.value, vr.quantity as variant_name from transaction_products as tp join product prod on tp.product = prod.id left join offer ofr on tp.product = ofr.product left join product_qtytype vr on tp.variant = vr.id where transaction = '$orderId'
    EOF;
    $ret1 = pg_query($db, $sql1);
    $res = array();
    $orderProductList = array();
    $products = array();
    $result1 = array();
    $result2 = array();
    $sql2 =<<<EOF
    select * from transaction_status where transaction = '$orderId'
    EOF;
    $ret2 = pg_query($db, $sql2);
    while($row1 = pg_fetch_array($ret1))
    {
	/*echo '<pre>';
	print_r($row1);
	exit;*/
    $products['id'] = $row1['product'];
	$products['name'] = $row1['name'];
	$products['desc'] = $row1['description'];
	$products['price'] = $row1['price'];
	$products['qty'] = $row1['pqty']; 
	$products['qtyType'] = $row1['qty_type'];
	$products['image'] = array($row1['product_image']);
	$products['offerPrice'] = $row1['value'];
	$products['gstPercentage'] = $row1['vat_charges'];
	$result1['product'] = $products;
	$result2['product'] = $products;
    $result2['originalPrice'] = $row1['orig_price'];
    if($result2['discountedPrice'] == 0)
    {
        $result2['discountedPrice'] = $row1['orig_price'];
    }
    else
    {
        $result2['discountedPrice'] = $row1['discounted_price'];
    }
	$result2['qty']=$row1['qty'];
	$result2['variant']=$row1['variant_name'];
	$orderProductList[]=$result2;
    }
   // $orderProductList[]=$result2;
    $row2['orderId'] = $orderId;
    $row2['shop'] = $shop;
    $row2['person'] = $person;
    $row2['address'] = $address;
    $row2['paymentId'] = $paymentId;
    $row2['orderProductList'] = $orderProductList;
    while($row3 = pg_fetch_assoc($ret2))
    {
    //$row2['transactionStatus'] = $row3;
	    $time1 = $row3['time'];

    $date1 = date('Y-m-d\TH:i:s.00\Z', strtotime("$time1"));
    $row2['transactionStatus'] = array("transactionId"=>$row3['transaction'], "status"=>$row3['status'], "time"=>$date1);
    }
    /*$row2['qtyType'] = $row[5];
    $row2['image'] = $row[6];
    $row2['offerPrice'] = $row[7];
    $row2['gstPercentage'] = $row[8];
    $row2['variant'] = $result1;*/
    $result[] = $row2;

}
echo json_encode($result, true);
exit;
?>