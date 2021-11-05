<?php
include('./dbConnection.php');
$connection = new dbConnection();
$connection = $connection->connect();
$employees = $connection->query("select d.name as dname,e.* from employees e inner join departments d on e.dept_id = d.id where e.email !='".$_COOKIE['email']."'");
    echo'<div class="col-md-8">';
        if(isset($_COOKIE['message'])){
            echo $_COOKIE['message'];
        }
        echo'<table class="table table-dark">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Salary</th>
                        <th>Department</th>
                    </tr>
                </thead>
                <tbody>';
                    while($row = mysqli_fetch_assoc($employees)){
                        echo "<tr>";
                        echo"<td>".$row['name']."</td>";
                        echo"<td>".$row['email']."</td>";
                        echo"<td>".$row['salary']."</td>";
                        echo"<td>".$row['dname']."</td>";
                        echo"<td><a href='editemployee.php?employee_id=".$row['id']."'>Edit</a></td>";
                        echo"<td><a href='formactions.php?action=delete&employee_id=".$row['id']."'>Delete</a></td>";
                        echo"</tr>";
                    }
    echo'       </tbody>
            </table>
        </div>';
$connection->close();
?>