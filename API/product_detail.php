<?php
include 'db.php';
$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
preg_match("/[^\/]+$/", $actual_link, $matches);
$prod_id = $matches[0];
$row = array();
$row = array();
$row2 = array();
$row3 = array();
$result = array();
$result1 = array();
$result2 = array();
$result3 = array();
$result4 = array();
$result5 = array();
$rel_prod = array();

$sql =<<<EOF
    select prod.name, prod.description, prod.price, prod.qty as pqty, prod.qty_type, prod.product_image, prod.vat_charges, ofr.value from product as prod left join offer ofr on prod.id = ofr.product where prod.id = $prod_id
    EOF;
    $ret = pg_query($db, $sql);
    if(!$ret) 
    {
    echo pg_last_error($db);
    exit;
    } 

    //$row = pg_fetch_array($ret);
    while($row = pg_fetch_row($ret)) 
    {
        $row3['name'] = $row[0];
        $row3['desc'] = $row[1];
        $row3['org_price'] = $row[2];
        $row3['qty'] = $row[3];
        $row3['qtytype'] = $row[4];
        $row3['ofr_price'] = $row[7];
    }
$sql1 =<<<EOF
    select product_image from product_images where product_id = $prod_id
    EOF;
    $ret1 = pg_query($db, $sql1);
    $result = array();
    while($row1 = pg_fetch_row($ret1))
    {
        $image1 = $row1[0];
        $result[] = $image1;
    }
$sql2 =<<<EOF
    select id, quantity from product_qtytype where product_id = $prod_id
    EOF;
    $ret2 = pg_query($db, $sql2);
    //$res = $result7 =  array();
    $num_rows = pg_num_rows($ret2);
    if ($num_rows !=  0)
    {
        $result2 =  array();
        while($row2 =pg_fetch_row($ret2))
        {
            $variant['id'] = $row2[0];
            $variant['variantname'] = $row2[1];
            $result1[] = $variant;
        }
    }
    else
    {
        $result1 = null;
    }
$row3['image'] = $result;
$row3['variant'] = $result1;
$result2[] = $row3;

$sql3 =<<<EOF
    select product from product_tags where tag = (select tag from product_tags where product = $prod_id) limit 5
    EOF;
    $ret3 = pg_query($db, $sql3);
    while($row3 = pg_fetch_row($ret3))
    {
        $rel_prod = $row3[0];
        $sql =<<<EOF
            select prod.name, prod.description, prod.price, prod.qty as pqty, prod.qty_type, prod.product_image, prod.vat_charges, ofr.value from product as prod left join offer ofr on prod.id = ofr.product where prod.id = $rel_prod
            EOF;
            $ret = pg_query($db, $sql);
            if(!$ret) 
            {
            echo pg_last_error($db);
            exit;
            } 

            //$row = pg_fetch_array($ret);
            while($row = pg_fetch_row($ret)) 
            {
                $row4['name'] = $row[0];
                $row4['desc'] = $row[1];
                $row4['org_price'] = $row[2];
                $row4['qty'] = $row[3];
                $row4['qtytype'] = $row[4];
                $row4['ofr_price'] = $row[7];
            }
        $sql1 =<<<EOF
            select product_image from product_images where product_id = $rel_prod
            EOF;
            $ret1 = pg_query($db, $sql1);
            $result3 = array();
            while($row1 = pg_fetch_row($ret1))
            {
                $image1 = $row1[0];
                $result3[] = $image1;
            }
        $sql2 =<<<EOF
            select id, quantity from product_qtytype where product_id = $rel_prod
            EOF;
            $ret2 = pg_query($db, $sql2);
            //$res = $result7 =  array();
            $num_rows = pg_num_rows($ret2);
            if ($num_rows !=  0)
            {
                $result4 =  array();
                while($row2 =pg_fetch_row($ret2))
                {
                    $variant['id'] = $row2[0];
                    $variant['variantname'] = $row2[1];
                    $result4[] = $variant;
                }
            }
            else
            {
                $result4 = null;
            }
        $row4['image'] = $result3;
        $row4['variant'] = $result4;
        $result5[] = $row4;

    }



$result = array("product_detail"=>$result2, "related_products"=>$result5);
echo json_encode( $result, true);
?>