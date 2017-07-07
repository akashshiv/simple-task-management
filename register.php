<?php
     require "connection.php";
     require "function.php";
 if (is_loggedin() === true) {
  header("location:login.php");
  exit();
}
  if (isset($_POST['sub'])) {
       $name=$_POST['name'];
       $username=$_POST['username'];
       $email=$_POST['emailid'];
       $password=$_POST['password'];
       $c_password=$_POST['c_password'];
       $phone=$_POST['number'];

    if (!empty($name) && !empty($username) && !empty($email) && !empty($password) && !empty($c_password) && !empty($phone)) {
          
          if ($password === $c_password) {
          $query ="INSERT INTO `user`(`name`, `username`, `password`, `phone`, `email`) VALUES (:name,:username,:password,:phone,:email)";
          
           $stmt = $conn -> prepare($query);
           $stmt -> bindParam(':name',$name);
           $stmt -> bindParam(':username',$username);
           $stmt -> bindParam(':password',$password);
           $stmt -> bindParam(':phone',$phone);
           $stmt -> bindParam(':email',$email);
             
            $stmt -> execute();
                
            header('location:login.php');
        }else{
            echo "password mismatch";
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
	<link rel="stylesheet" type="text/css" href="register.css">
</head>
<body><center>
<div id="registerdiv2">
	
		<form method="post" action="">
            <input type="text" name="name" placeholder="name" autofocus="on" maxlength="30"><br>
            <input type="text" name="username" placeholder="username" maxlength="30"><br>
            <input type="email" name="emailid" placeholder="email" maxlength="50"><br>
            <input type="password" name="password" placeholder="password" maxlength="40"><br>
            <input type="password" name="c_password" placeholder="re-enter password" maxlength="40"><br>
            <input type="text" name="number" placeholder="contact number" maxlength="10"><br>
            <input type="submit" name="sub" value="submit"><br>
        
        </form>




	

</div></center>

</body>
</html>