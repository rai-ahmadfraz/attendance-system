<?php include('verifyToken.php'); ?>
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
                    if(isset($_GET['message'])){
                        echo $_GET['message'];
                    }
                ?>
            </p>
            <form class="add_employee" method="POST" action="formactions.php">
                <input type="text" class="form-control" name="name" placeholder="Enter Name" required/>
                <input type="email" class="form-control" name="email" placeholder="Enter Email" required />
                <input type="password" class="form-control" name="password" placeholder="Enter Passsword" required />
                <input type="number" class="form-control" name="salary" placeholder="Enter Salary" required />
                <select name="dept_id" class="form-control" required>
                    <?php include('template/departments.php'); ?>
                </select>
                <input type="submit" class="form-control" name="add_employee_submit" value="Save" />
            </form>
        </div>
    </div>
</div>
</body>
</html>
