<?php 
include "db.php";

if(isset($_POST['id']))
{
   $id = $_POST['id'];
   $sql =<<<EOF
   delete from carousal where carousal_image= '$id';
   EOF;
   $ret = pg_query($db, $sql);
   echo 1;
   exit;
}

echo 0;
exit;