<?php
include 'db.php';
require_once('PHPMailer/PHPMailerAutoload.php');

$json = file_get_contents('php://input');
$data = json_decode($json);
$usr_id = $data->UserId;
$usr_srt = $data->secret;
$id = $data->id;
$pay_id = rand();
$pay_mod = $data->paymentmode;
$usr_addr = $data->addressId;
$shop = 1;
$status = "ORDERED";
$prod = $data->products;
$sql =<<<EOF
select count(*) from person where id = $usr_id
EOF;
$ret = pg_query($db, $sql);
$dat = pg_Fetch_Object($ret, 0);
$count =  $dat->count;
if ($count > 0)
{
        /*insert into transaction table*/
        $sql =<<<EOF
        insert into transaction (id, shop, person, address, payment_id) values ('$id', $shop, $usr_id, $usr_addr, $pay_id);
        EOF;
        $ret = pg_query($db, $sql);
        foreach($prod as $keys => $values)
        {
                $ofr_price = $prod[$keys]->offerPrice;
                $org_price = $prod[$keys]->originalPrice;
                $prod_id = $prod[$keys]->productId;
				$qty = $prod[$keys]->qty;
				$variant = $prod[$keys]->variant;
				/*Stock adjusting*/
				$sql =<<<EOF
				select current_stock from product where id = $prod_id
				EOF;
				$ret = pg_query($db, $sql);
				$dat = pg_Fetch_Object($ret, 0);
				$cur_stock = $dat->current_stock;
				$new_stock = $cur_stock - $qty;
				$sql1 =<<<EOF
				update product set current_stock = $new_stock where id = $prod_id
				EOF;
				$ret = pg_query($db, $sql1);

				
			if(!empty($variant))
			{
				foreach($variant as $vkey => $vvalues)
        			{
				$variant_id = $variant[$vkey]->id;
				$variantname = $variant[$vkey]->variantname;
				$org_price1 = $org_price/$qty;
				$ofr_price1 = $ofr_price/$qty;
				$qty1 = 1;
				$sql =<<<EOF
				insert into transaction_products (transaction, product, orig_price, discounted_price, qty, variant) values ('$id', $prod_id, $org_price1, $ofr_price1, $qty1, $variant_id );
				EOF;
        			$ret = pg_query($db, $sql);
				}
			}else{
				$variant_id = 0;
				$sql =<<<EOF
				insert into transaction_products (transaction, product, orig_price, discounted_price, qty, variant) values ('$id', $prod_id, $org_price, $ofr_price, $qty, $variant_id );
				EOF;
				$ret = pg_query($db, $sql);	
			}
		}
$today = date('Y-m-d h:m:i');
$sql =<<<EOF
insert into transaction_status (transaction, status, time, payment_mode) values ('$id', '$status', '$today', '$pay_mod');
EOF;
$ret = pg_query($db, $sql);
$response = array("transactionId" => $id, "status" => "ORDERED", "payment_mode" => $pay_mod, "time" => $today);
echo json_encode($response, true);
//mail to be configured

$mail = new PHPMailer();
$mail->isSMTP();
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'ssl';
$mail->Host = 'smtp.gmail.com';
$mail->Port = '465';
$mail->isHTML();
$mail->Username = '360storereport@gmail.com';
$mail->Password = 'Abbasali@360store';
$mail->SetFrom('Abbas800@gmail.com');

$sql7 =<<<EOF
select pers.name, phn.phone from person pers join phone as phn on pers.id = phn.id where pers.id = $usr_id
EOF;
$ret7 = pg_query($db, $sql7);
while($row7 = pg_fetch_row($ret7))
    {
        $name = $row7[0];
        $phone = $row7[1];
    }
$mail->Subject = "Order placed by $name";
$bodyy =
'<html>
<table border = 2>
<tr>
<th><h4>Customer name :</h4></th><td><h4>'.$name.'</h4></td>
</tr>
<tr>
<th><h4>Phone number :</h4></th><td><h4>'.$phone.'</h4></td>
</tr>
<tr>
<th><h4>Ordered status :</h4></th><td><h4>'.$status.'</h4></td>
</tr>
<tr>
<th><h4>Payment status :</h4></th><td><h4>'.$pay_mod.'</h4></td>
</tr>
</table>
</html>';
$mail->Body = $bodyy;
$mail->AddAddress('Abbas800@gmail.com');

$mail->Send();

exit;
}
else{
	$today = date('Y-m-d h:m:i');
	$response = array("transactionId" => $id, "status" => "FAILED", "time" => $today);
	echo json_encode($response, true);
	exit;
}
?>
