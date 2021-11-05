<?php 
    include('../dbConnection.php');
    $connection = new dbConnection();
    $connection = $connection->connect();
    $employees = $connection->query("select e.id as employee_id from employees e left join attendances a on e.id = a.employee_id where a.date is null;");
        while($row = mysqli_fetch_assoc($employees)){
            $connection->query("insert into attendances(employee_id,date)
            value(".$row['employee_id'].",'".date("y-m-d")."')");
        }
        echo "leave marked successfully";
    $connection->close();
?>
  
