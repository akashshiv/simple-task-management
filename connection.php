<?php
     session_start();

$host = 'b0c96bf8871845:57b3b7bf';
 $Pass = 'heroku_de000e0bb56d289';
 $user = 'us-cdbr-iron-east-03.cleardb.net';
 $dbname = 'assignment';
   try {
   	
$conn = new PDO('mysql:host='.$host.'; dbname='.$dbname.;, $user, $pass);
   } catch (PDOException $e) {
   	  die("connection errror".$e->getMessage());
   }
    
  ?>
