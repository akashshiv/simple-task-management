<?php
     require "connection.php";
    require  "function.php";
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
              $c=12;      
            $stmt -> execute();
   
  if (isset($_POST['sub'])) {
                if (!empty($_POST['max_task'])) {
                  $c=$_POST['max_task'];
                }else{
                    echo "all feild are mendetory";
                    
                }
            }          
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	
    <link rel="stylesheet" type="text/css" href="newtask.css">
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
     <center>
         <div id="header">
            <form method="POST" action="">
             <input type="text" name="max_task" placeholder="MAX TASK PER DAY">
             <input type="submit" value="submit" name="sub">
             </form>
         </div>
     </center>
     <center>
        <div id="table">
            <table>
                    <tr>
                     
                        <th>TASK NAME</th>
                        <th>TASK PRIORITY</th>
                        <th>TASK POINT</th>
                        <th>MAX ON DATE</th>
                        <?php
                  
                         $count=0;
                      while($result =$stmt->fetch(PDO::FETCH_ASSOC))
                        {  
                            echo "<tr>
                            <td>{$result['task_name']}</td>
                            <td>{$result['task_priority']}</td>
                            <td>{$result['task_point']}</td>";
                          if ($result['task_point'] <= $c) {
                    echo "<td>".date("l,d-m-y",strtotime("+".$count."days"))."</td>";
                                 $c -= $result['task_point'];
                             
                            }else{
                                $count++;
                               $c = 12;
                        echo "<td>".date("l,d-m-y",strtotime("+".$count."days"))."</td>";
                                $c -= $result['task_point'];
                              
                            }
                            echo "</tr>";    
                        }
                    ?>
            </table>
        </div>
    </center>
        
</body>
</html>
 </body>
 </html>
