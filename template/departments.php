<?php
include('./dbConnection.php');
$connection = new dbConnection();
$connection = $connection->connect();
$departments = $connection->query("select * from departments");
    while($row = mysqli_fetch_assoc($departments)){
        echo "<option id='".$row['id']."' value='".$row['id']."'>".$row['name']."</option>";
    }
$connection->close();
?>