<?php 
include('verifyToken.php'); 
include('dbConnection.php');
$connection = new dbConnection();
$connection = $connection->connect();
$result = $connection->query("select * from employees where id = ".$_GET['employee_id'].";");
?>
<!DOCTYPE html>
<html lang="en">
<?php include('head.php'); ?>
<body>
<div class="container-fluid">
    <div class="row">
        <?php include("sideMenu.php")?>
        <div class="col-md-4">
            <p class="add_employee_error">
                <?php
                    if($result->num_rows == 1){
                        $employee = mysqli_fetch_assoc($result);
                    }else{
                        echo "Invalid Employee Id";
                    }
                ?>
            </p>
            <p class="add_employee_error"> <?php if(isset($_GET['message'])){ echo $_GET['message']; } ?> </p>
            <form class="add_employee" method="POST" action="formactions.php">
                <input type="hidden" class="form-control" name="id" value="<?php echo $employee['id'] ?>" required/>
                <input type="text" class="form-control" name="name" placeholder="Enter Name" value="<?php echo $employee['name'] ?>" required/>
                <input type="text" class="form-control" name="password" placeholder="Enter Passsword" value="<?php echo $employee['password'] ?>" required />
                <input type="number" class="form-control" name="salary" placeholder="Enter Salary" value="<?php echo $employee['salary'] ?>" required />
                <select name="dept_id" class="form-control" required>
                    <?php  $departments = $connection->query("select * from departments");
                        while($row = mysqli_fetch_assoc($departments)){
                            echo "<option id='".$row['id']."' value='".$row['id']."'"; if($row['id'] == $employee['dept_id']){ echo "selected";} echo">".$row['name']."</option>";
                        }
                        $connection->close();
                    ?>
                </select>
                <input type="submit" class="form-control" name="update_employee_submit" value="Update" />
            </form>
        </div>
    </div>
</div>
</body>
</html>
