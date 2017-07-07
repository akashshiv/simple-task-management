<?php
     require "connection.php";
     require "function.php";   

if (is_loggedin() === false) {
  header("location:login.php");
  exit();
}
    $query1 ='select id from `user` where username = :username';
          
           $stmt1 = $conn -> prepare($query1);
           $stmt1-> bindParam(':username',$_SESSION['username']);           
            $stmt1 -> execute();
            $result1=$stmt1->fetch(PDO::FETCH_ASSOC);
   
      $query ='select * from `task` where user_id = :user_id  order by `task_priority`';
            
           $stmt = $conn -> prepare($query);
              $stmt-> bindParam(':user_id',$result1['id']);        
            $stmt -> execute();
            
?>
           
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="home.css">
</head>
<body>  
     <div id ="menu"> 
        <ul>
            <li><a href="home.php">HOME</a></li>
            <li><a href="newtask.php">TASK</a></li> 
            <li><a href="addtask.php"> ADD TASK</a></li> 
            <li><a href="edittask.php">EDIT TASK</a> </li>
            <li><a href="logout.php">LOGOUT</a> </li>
           
          
        </ul>
        </div>
        <center><div id="table">
            <table>
                    <tr>
            			
            			<th>TASK NAME</th>
            			<th>TASK PRIORITY</th>
            			<th>TASK POINT</th>
                        
            		</tr>
                    <?php
                        
                      while($result =$stmt->fetch(PDO::FETCH_ASSOC))
                        {  
                            echo "<tr>
                            <td>{$result['task_name']}</td>
                            <td>{$result['task_priority']}</td>
                            <td>{$result['task_point']}</td>";
                            
                        }
                    ?>
            </table>
        </div></center>
</body>
</html>