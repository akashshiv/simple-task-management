<?php
     session_start();

$url = parse_url(getenv("CLEARDB_DATABASE_URL"));

$server = $url["host"];
$username = $url["user"];
$password = $url["pass"];
$db = substr($url["path"], assignment.sql);


   try {
   	 $conn = new PDO("mysql:host=$servername;dbname=$database;",$username,$password);
   } catch (PDOException $e) {
   	  die("connection errror".$e->getMessage());
   }
    
  ?>
