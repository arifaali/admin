<?php
include 'db.php';
//Your authentication key
$authKey = "352361AlXVgwDJZM600955a6P1";
$trans = 'db0742f1-cbb2-415e-b0d3-da8b36e73629';

//Sender ID,While using route4 sender id should be 6 characters long.
$senderId = "TSSTOR";

//Multiple mobiles numbers separated by comma
//$mobileNumber = '8891000619';
//$name = 'Abbas Ali';
$sql3 =<<<EOF
select pr.name, ph.phone from transaction tr join person pr on tr.person = pr.id join phone ph on tr.person = ph.id where tr.id = '$trans'
EOF;
$ret3 = pg_query($db, $sql3);
$name = array();
$mobileNumber = array();
while($row = pg_fetch_row($ret3))
    {
      $name = $row[0];
      $mobileNumber = $row[1];
    }
    
$time = 24;
//Your message to send, Add URL encoding here.
//$message = urlencode("Dear $name, your order has been accepted and will be delivered within $time hours.");
$message = urlencode("Dear $name, your package has been delivered by our agent. Thank you for shopping with us.");
echo $message;


//Define route 
$route = "4";
//Prepare you post parameters
$postData = array(
    'authkey' => $authKey,
    'mobiles' => $mobileNumber,
    'message' => $message,
    'sender' => $senderId,
    'route' => $route
);

//API URL
$url="http://api.msg91.com/api/sendhttp.php";

// init the resource
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
?>  