<?php
include 'db.php';
$sql =<<<EOF
select pincode from pincode
EOF;
$ret = pg_query($db, $sql);
$pincode = array();
while($row = pg_fetch_row($ret))
{
    $pincode[] = $row[0];
}
$result = array("pincode"=>$pincode);
echo json_encode( $result, true);
?>
