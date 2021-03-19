<?php
   ob_start();
   session_start();

?>
<?php
include 'db.php';

$log_usern = $_POST['username'];
$log_passwd = $_POST['password'];

$sql =<<<EOF
SELECT * from user_admin where username = '$log_usern' and password = '$log_passwd';
EOF;
$ret = pg_query($db, $sql);
if(!$ret) 
{
echo pg_last_error($db);
exit;
} 
$result = pg_query($db, $sql);
$count  = pg_num_rows($result);
$cont = pg_fetch_row($ret);
if($count==0) {
    echo "Invalid Username or Password!";
} else {
    $_SESSION["user_id"] = $cont[0];
    if ( $cont[3] == 0 )
    {
        header("Location: dashboard1.php"); 
    }
    else{
        header("Location: dashboard.php"); 
    }
}


?>  
     