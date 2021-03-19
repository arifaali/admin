<?php
include 'db.php';
use Razorpay\Api\Api;   
$json = file_get_contents('php://input');
$data = json_decode($json);
$id = $data->id;
$pay_id = $data->paymentId;
$pay_stat = $data->paymentstatus;
$sql =<<<EOF
select count(*) from transaction_status where transaction = '$id'
EOF;
$ret = pg_query($db, $sql);
$dat = pg_Fetch_Object($ret, 0);
$count = $dat->count;
$today = date('Y-m-d h:m:i');
if ($count > 0)
{
    $sql =<<<EOF
    UPDATE transaction_status SET payment_status = '$pay_stat' WHERE transaction = '$id';
    EOF;
    $ret = pg_query($db, $sql);
    $sql1 =<<<EOF
    UPDATE transaction SET payment_id = '$pay_id' WHERE id = '$id';
    EOF;
    $ret1 = pg_query($db, $sql1);
    if ($pay_stat == 'failure')
    {
        $sql3 =<<<EOF
        UPDATE transaction_status SET status = 'CANCELLED' WHERE transaction = '$id';
        EOF;
        $ret3 = pg_query($db, $sql3);
        /*Stock adjusting*/
        $sql4 =<<<EOF
        SELECT pd.id, pd.name, sum(tp.qty) as qty, pd.current_stock FROM transaction_products tp INNER JOIN product pd ON tp.product = pd.id JOIN transaction_status ts ON ts.transaction = tp.transaction where  tp.transaction = '$id' group by pd.id
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
        $today = date('Y-m-d h:m:i');
        $response = array("transactionId" => $id, "status" => "Payment failed", "time" => $today);
        echo json_encode($response, true);
        exit;
    }
    else
    {
        $api = new Api("rzp_live_6F9fMrsFnSEdf4", "htlR938dJqFbRRGF1Br8Fv5e");
        $payment = $api->payment->fetch('$pay_id');
        $payment->capture(array('amount' => 1000, 'currency' => 'INR'));
        $response = array("transactionId" => $id, "status" => "Payment done successfully", "time" => $today);
        echo json_encode($response, true);
        exit;
    }
}
else
{
    $today = date('Y-m-d h:m:i');
    $response = array("transactionId" => $id, "status" => "Payment failed", "time" => $today);
    echo json_encode($response, true);
    exit;
}
?>