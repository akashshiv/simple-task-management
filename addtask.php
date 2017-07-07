<?php
     require "connection.php";
     require "function.php";
if (is_loggedin() === false) {
  header("location:login.php");
  exit();
}
  if (isset($_POST['sub'])) {
       $task_priority=$_POST['task_priority'];
       $task_name=$_POST['task_name'];
       $task_point=$_POST['task_point'];
      

    if (!empty($task_name) && !empty($task_priority) && !empty($task_point)) {

          $query1 ='select id from `user` where username = :username';
           $stmt1 = $conn -> prepare($query1);
           $stmt1-> bindParam(':username',$_SESSION['username']);           
            $stmt1 -> execute();
            $result1=$stmt1->fetch(PDO::FETCH_ASSOC);

           $query ="INSERT INTO `task`(`user_id`,`task_name`,`task_priority`, `task_point`) VALUES (:user_id,:task_name,:task_priority,:task_point)";
          
           $stmt = $conn -> prepare($query);
           $stmt -> bindParam(':user_id',$result1['id']);
           $stmt -> bindParam(':task_name',$task_name);
           $stmt -> bindParam(':task_priority',$task_priority);
           $stmt -> bindParam(':task_point',$task_point);
             
            $stmt -> execute();
                
        
      }else{
         echo "all feild are mendetory";
      }
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="addtask.css">
</head>
<body>
        <div id ="menu"> 
        <ul>
            <li><a href="index.php">HOME</a></li>
            <li><a href="newtask.php">TASK</a></li>
            <li><a href="addtask.php"> ADD TASK</a></li> 
            <li> <a href="edittask.php">EDIT TASK</a> </li>
              <li><a href="logout.php">LOGOUT</a> </li>
        </ul>
        </div>
    <center><div id="task">
                  <form method="POST" action="">
                  	<input type="text" name="task_name" placeholder="TASK NAME">
                  	<input type="text" name="task_priority" placeholder="TASK PRIORITY">
                  	<input type="text" name="task_point" placeholder="TASK POINT"><br><br><br>
                  	<input type="submit" name="sub" value="submit">

                  </form>
            
           
        </div></center>

</body>
</html>
