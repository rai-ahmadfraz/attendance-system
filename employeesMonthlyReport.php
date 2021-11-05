<?php 
    include('verifyToken.php');
    include('./dbConnection.php');
?>
<!DOCTYPE html>
<html lang="en">
    <?php include('head.php'); ?>
    <body>
        <div class="container-fluid home">
            <div class="row">
                <?php include("sideMenu.php")?>
                <div class="col-md-8">
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Select Month
                        <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a href="employeesMonthlyReport.php?month=1">January</a></li>
                            <li><a href="employeesMonthlyReport.php?month=2">Feburary</a></li>
                            <li><a href="employeesMonthlyReport.php?month=3">March</a></li>
                            <li><a href="employeesMonthlyReport.php?month=4">April</a></li>
                            <li><a href="employeesMonthlyReport.php?month=5">May</a></li>
                            <li><a href="employeesMonthlyReport.php?month=6">June</a></li>
                            <li><a href="employeesMonthlyReport.php?month=7">July</a></li>
                            <li><a href="employeesMonthlyReport.php?month=8">August</a></li>
                            <li><a href="employeesMonthlyReport.php?month=9">September</a></li>
                            <li><a href="employeesMonthlyReport.php?month=10">October</a></li>
                            <li><a href="employeesMonthlyReport.php?month=11">November</a></li>
                            <li><a href="employeesMonthlyReport.php?month=12">Dec</a></li>
                        </ul>
                    </div>
                    <?php
                    $connection = new dbConnection();
                    $connection = $connection->connect();
                    if($_GET['month']>0 and $_GET['month']<13){
                        $month = $_GET['month'];
                    }else{
                        $month = date('m');
                    }
                    $query ="select e.name as name,e.email as email,count(*) as no_of_leaves from attendances a 
                    inner join employees e
                    on a.employee_id = e.id 
                    where a.on_leave = 1 and YEAR(a.date) = YEAR(CURDATE()) AND MONTH(a.date) = '".$month."'
                    group by a.employee_id;";

                    $employees = $connection->query($query);
                            if(isset($_COOKIE['message'])){
                                echo $_COOKIE['message'];
                            }
                            echo'<table class="table table-dark">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>No of leaves</th>
                                        </tr>
                                    </thead>
                                    <tbody>';
                                        while($row = mysqli_fetch_assoc($employees)){
                                            echo "<tr>";
                                            echo"<td>".$row['name']."</td>";
                                            echo"<td>".$row['email']."</td>";
                                            echo"<td>".$row['no_of_leaves']."</td>";
                                            echo"</tr>";
                                        }
                        echo'       </tbody>
                                </table>
                            </div>';
                    $connection->close();
                    ?>
                </div>
        </div>
    </body>
</html>
