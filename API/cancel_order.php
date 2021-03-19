<?php 
include 'db.php';
$json = file_get_contents('php://input');
$data = json_decode($json);
$usr_id = $data->UserId;
$trans_Id = $data->paymentId;
$sql =<<<EOF
select status from transaction_status as ts join transaction t on ts.transaction = t.id where ts.transaction = '$trans_Id' and t.person = $usr_id
EOF;
$ret = pg_query($db, $sql);
$dat = pg_Fetch_Object($ret, 0);
$ord_status =  $dat->status;

if ($ord_status == "ORDERED")
{
	$sql =<<<EOF
	update transaction_status set status = 'CANCELLED' where transaction = '$trans_Id'
	EOF;
	$ret = pg_query($db, $sql);
	$sql4 =<<<EOF
        SELECT pd.id, pd.name, sum(tp.qty) as qty, pd.current_stock FROM transaction_products tp INNER JOIN product pd ON tp.product = pd.id JOIN transaction_status ts ON ts.transaction = tp.transaction where  tp.transaction = '$trans_Id' group by pd.id
    EOF;
    $ret4 = pg_query($db, $sql4);
    while($row = pg_Fetch_Object($ret4)) 
        {
            $dat = $row;
            $prod_id = $dat->id;
            $prod_qty = $dat->qty;
            $cur_stock = $dat->current_stock;
            $new_stock = $cur_stock + $prod_qty;
            $sql1 =<<<EOF
			update product set current_stock = $new_stock where id = $prod_id
			EOF;
			$ret1 = pg_query($db, $sql1);

        }
	$status = "Your order has been cancelled successfully";
	$response = array("ecode" => 1, "status" => "$status");
	echo json_encode($response, true);
	exit;
}
else
{
	$status = "Your order cannot be cancelled";
	$response = array("ecode" => 0, "status" => "$status");
        echo json_encode($response, true);
        exit;
}
?>
