<?php
     session_start();

$dbopts = parse_url(getenv('DATABASE_URL'));
$conn->register(new Csanquer\Silex\PdoServiceProvider\Provider\PDOServiceProvider('pdo'),
               array(
                'pdo.server' => array(
                   'driver'   => 'pgsql',
                   'user' => $dbopts["user"],
                   'password' => $dbopts["pass"],
                   'host' => $dbopts["host"],
                   'port' => $dbopts["port"],
                   'dbname' => ltrim($dbopts["path"],'assignment.sql')
                   )
               )
);


   try {
   	 
   } catch (PDOException $e) {
   	  die("connection errror".$e->getMessage());
   }
    
  ?>
