<?php
  require "connection.php";
  require "function.php";  
 if (is_loggedin() === true) {
  header("location:index.php");
  exit();
}
  
if (isset($_POST['sub'])) {
       $username=$_POST['username'];
       $password=$_POST['password'];

    if (!empty($username) && !empty($password)) {
          
          $query ='select * from `user` where username = :username';
          
           $stmt = $conn -> prepare($query);
           $stmt -> bindParam(':username',$username);           
            $stmt -> execute();
            $result =$stmt->fetch(PDO::FETCH_ASSOC);
           
            if($result['username'])
            {
                $_SESSION['username'] = $result['username'];
             
               header('location:index.php');
            }
        }else{
         echo "all feild are mendetory";
      }
}  
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="login.css">
</head>
<body>  <center>
     <h1>SIMPLE TASK MANAGEMENT SYSTEM</h1>
    <div id ="login">
    <form action="" method="POST">
		<input type="text" name="username" placeholder="USERNAME" autofocus="on" maxlength="30"><br><br>
	    <input type="password" name="password" maxlength="40" placeholder="PASSWORD"><br><br>
		<div id="registration"><a href="register.php">registration</a></div>
		<input type="submit" name="sub" value="LOGIN">
	</form></center>
	</div>
</body>
</html>
