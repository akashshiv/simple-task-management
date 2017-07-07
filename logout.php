<?php
 require_once "connection.php";

 require_once "function.php";

if (is_loggedin() === false) {
	header("location:login.php");
	exit();
}elseif (is_loggedin() === true) {
	session_destroy();
  header("location:login.php");
	exit();
}
  
?>