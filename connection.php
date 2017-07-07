<?php
     session_start();


use Herrera\Pdo\PdoServiceProvider;
use Silex\Application;

$app = new Application();
$app['debug'] = true;

// Register the monolog logging service
$app->register(new Silex\Provider\MonologServiceProvider(), array(
  'monolog.logfile' => 'php://stderr',
));

// Our web handlers

$app->get('/', function() use($app) {
  $app['monolog']->addDebug('logging output.');
  return 'Hello';
});

$dbopts = parse_url(getenv('DATABASE_URL'));
//print_r(array_values($dbopts));
$app->register(new PdoServiceProvider(),
    array(
        'pdo.dsn' => 'mysql:dbname='.ltrim($dbopts["path"],'assignment.sql').';host='.$dbopts["host"],
        'pdo.port' => $dbopts["port"],
        'pdo.username' => $dbopts["user"],
        'pdo.password' => $dbopts["pass"]
    )
);

$host = $app['pdo.dsn.host'];
$dbname = $app['pdo.dsn.mysql:dbname'];
$user = $app['pdo.username'];
$pass = $app['pdo.password'];*/


   try {
   	
$conn = new PDO("mysql:host=.$host.; dbname=.$dbname.;", $user, $pass);
   } catch (PDOException $e) {
   	  die("connection errror".$e->getMessage());
   }
    
  ?>
