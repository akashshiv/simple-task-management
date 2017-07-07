<?php
     session_start();

$dbopts = parse_url(getenv('DATABASE_URL'));
$app->register(new Csanquer\Silex\PdoServiceProvider\Provider\PDOServiceProvider('pdo'),
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
   	  $conn = new PDO("mysql:host=$server;dbname=$db;",$username,$password);
   } catch (PDOException $e) {
   	  die("connection errror".$e->getMessage());
   }
    
  ?>
