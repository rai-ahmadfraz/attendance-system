<?php 
    include('../dbConnection.php');
    $connection = new dbConnection();
    $connection = $connection->connect();
    $employees = $connection->query("select * from employees e left join attendances a on e.id = a.employee_id where a.date is null;");
        while($row = mysqli_fetch_assoc($employees)){
            echo $row['email'];
            mail($row['email'],"Attendace","kindly mark you attendance");
        }
                            
    $connection->close();
?>
  
