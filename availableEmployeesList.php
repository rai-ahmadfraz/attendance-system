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
                <?php
                $connection = new dbConnection();
                $connection = $connection->connect();
                $employees = $connection->query("select * from attendances a inner join employees e on a.employee_id = e.id where a.punch_in_hour IS NOT NULL and a.date ='".date("y-m-d")."'");
                    echo'<div class="col-md-8">';
                        if(isset($_COOKIE['message'])){
                            echo $_COOKIE['message'];
                        }
                        echo'<table class="table table-dark">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>';
                                    while($row = mysqli_fetch_assoc($employees)){
                                        echo "<tr>";
                                        echo"<td>".$row['name']."</td>";
                                        echo"<td>".$row['email']."</td>";
                                        if($row['punch_out_hour']){
                                            echo"<td>Punched Out/Away</td>";
                                        }else{
                                            echo"<td>Punched In/Available</td>";
                                        }
                                        
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
