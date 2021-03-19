<?php
include 'db.php';

$stat = $_POST['status'];
$trans = $_POST['transaction_id'];

$sql =<<<EOF
UPDATE transaction_status SET status='$stat' WHERE transaction='$trans' ;
EOF; 
$ret = pg_query($db, $sql);

if ($stat == 'CANCELLED')
  {
    /*Stock adjusting*/
    $sql2 =<<<EOF
    SELECT pd.id, pd.name, sum(tp.qty) as qty, pd.current_stock FROM transaction_products tp INNER JOIN product pd ON tp.product = pd.id JOIN transaction_status ts ON ts.transaction = tp.transaction where  tp.transaction = '$trans' group by pd.id
    EOF;
    $ret2 = pg_query($db, $sql2);
    while($row = pg_Fetch_Object($ret2))
      {
        $dat = $row;
        $prod_id = $dat->id;
        $prod_qty = $dat->qty;
        $cur_stock = $dat->current_stock;
        $new_stock = $cur_stock + $prod_qty;
        $sql1 =<<<EOF
        update product set current_stock = $new_stock where id = $prod_id
        EOF;
        $ret = pg_query($db, $sql1);

      }
  }
  if ($stat == 'ACCEPTED')
  {
    $sql3 =<<<EOF
    select pr.name, ph.phone from transaction tr join person pr on tr.person = pr.id join phone ph on tr.person = ph.id where tr.id = '$trans'
    EOF;
    $ret3 = pg_query($db, $sql3);
    $name = array();
    $mobileNumber = array();
    while($row = pg_fetch_row($ret3))
    {
      $name = $row[0];
      $mobileNumber1 = $row[1];
    }
    $num1 = strlen("$mobileNumber1");
    if ($num1 == 10)
    {
      $code = 91;
      $mobileNumber = $code.$mobileNumber1;
    }
    else
    {
      $mobileNumber = $mobileNumber1;
    }
    $url="http://api.msg91.com/api/sendhttp.php";
    $authKey = "352361AlXVgwDJZM600955a6P1";
    $senderId = "TSSTOR";
    $time = 24;
    $message = urlencode("Dear $name, your order has been accepted and will be delivered within $time hours. :- 360Store");
    $route = "4";
    $postData = array(
      'authkey' => $authKey,
      'mobiles' => $mobileNumber,
      'message' => $message,
      'sender' => $senderId,
      'route' => $route
    );
    $ch = curl_init();
    curl_setopt_array($ch, array(
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => $postData
    //,CURLOPT_FOLLOWLOCATION => true
    ));
    //Ignore SSL certificate verification
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

    //get response
    $output = curl_exec($ch);

    //Print error if any
    if(curl_errno($ch))
    {
        echo 'error:' . curl_error($ch);
    }

    curl_close($ch);

    echo $output;

    //Updating the payment status from authorized to capture
    
    $sql4 =<<<EOF
        select payment_id from transaction where id = '$trans'
    EOF;
    $ret4 = pg_query($db, $sql4);

    while($row = pg_fetch_row($ret4))
    {
      $payid = $row[0];
    }
    $cmd = "curl -u rzp_live_zCL17KOiXbLpHW:t5Hkm1HC7O9mgPPOLtfzPF4l -X GET https://api.razorpay.com/v1/payments/$payid";
    exec($cmd,$result);
    $res_val = ($result[0]);
    $res_val1 = json_decode ($res_val);
    $payamt = $res_val1->amount;

    $ch = curl_init();

    $url1 = "https://api.razorpay.com/v1/payments/$payid/capture";
    curl_setopt($ch, CURLOPT_URL, $url1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, "{ \"amount\": $payamt, \"currency\":\"INR\"}");
    curl_setopt($ch, CURLOPT_USERPWD, 'rzp_live_zCL17KOiXbLpHW' . ':' . 't5Hkm1HC7O9mgPPOLtfzPF4l');

    $headers = array();
    $headers[] = 'Content-Type: application/json';
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    $result = curl_exec($ch);
    if (curl_errno($ch)) {
        echo 'Error:' . curl_error($ch);
    }
    curl_close($ch);
    echo $result;

  }  
  
  if ($stat == 'DELIVERED')
  {
    $sql3 =<<<EOF
    select pr.name, ph.phone from transaction tr join person pr on tr.person = pr.id join phone ph on tr.person = ph.id where tr.id = '$trans'
    EOF;
    $ret3 = pg_query($db, $sql3);
    $name = array();
    $mobileNumber = array();
    while($row = pg_fetch_row($ret3))
    {
      $name = $row[0];
      $mobileNumber1 = $row[1];
    }
    $num1 = strlen("$mobileNumber1");
    if ($num1 == 10)
    {
      $code = 91;
      $mobileNumber = $code.$mobileNumber1;
    }
    else
    {
      $mobileNumber = $mobileNumber1;
    }

    $url="http://api.msg91.com/api/sendhttp.php";
    $authKey = "352361AlXVgwDJZM600955a6P1";
    $senderId = "TSSTOR";
    $time = 24;
    $message = urlencode("Dear $name, your package has been delivered by our agent. Thank you for shopping with us. :- 360Store");
    $route = "4";
    $postData = array(
      'authkey' => $authKey,
      'mobiles' => $mobileNumber,
      'message' => $message,
      'sender' => $senderId,
      'route' => $route
    );
    $ch = curl_init();
    curl_setopt_array($ch, array(
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => $postData
    //,CURLOPT_FOLLOWLOCATION => true
    ));
    //Ignore SSL certificate verification
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

    //get response
    $output = curl_exec($ch);

    //Print error if any
    if(curl_errno($ch))
    {
        echo 'error:' . curl_error($ch);
    }

    curl_close($ch);


  }  

if($stat != "")
{
  $ret = pg_query($db, $sql);
  if(!$ret) 
    {
      echo pg_last_error($db);
      exit;
    }
    else
    {
      header("Location: all_order.php?s=1");
    }

}

?>