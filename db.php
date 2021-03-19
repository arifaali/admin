<?php
   $host        = "host = three60storedb.c4zxib5qgywe.us-east-1.rds.amazonaws.com";
   $port        = "port = 5432";
   $dbname      = "dbname = three60storedb";
   $credentials = "user = postgres password=three60Store2020";
   
   $db = pg_connect( "$host $port $dbname $credentials" );
   if(!$db) {
      echo "Error : Unable to open database\n";
      
   } else {
      //echo "Opened database successfully\n";
      
   }

  /* $sql =<<<EOF
      SELECT * from product;
EOF; psql -h three60storedb.c4zxib5qgywe.us-east-1.rds.amazonaws.com -U postgres three60storedb

   $ret = pg_query($db, $sql);
   if(!$ret) {
      echo pg_last_error($db);
      exit;
   } 
   while($row = pg_fetch_row($ret)) {
      echo "ID = ". $row[0] . "\n";
      echo "NAME = ". $row[1] ."\n";
      echo "ADDRESS = ". $row[2] ."\n";
      echo "SALARY =  ".$row[4] ."\n\n";
   }
   echo "Operation done successfully\n";
   pg_close($db);
   */
?>
