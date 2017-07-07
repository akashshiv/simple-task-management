<?php
     session_start();
   $database = 'assignment';
   $servername ='localhost';
   $password ='foo.bar';
   $username ='root';
    
   try {
   	  $conn = new PDO("mysql:host=$servername;dbname=$database;",$username,$password);
   } catch (PDOException $e) {
   	  die("connection errror".$e->getMessage());
   }
    
  ?>