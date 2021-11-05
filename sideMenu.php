<h2 class="login_user">welcome <?php echo $_COOKIE['name']; ?></h2>
<div class="col-md-3">
    <ul class="nav nav-pills nav-stacked">
        <li><a href="home.php">Punch in/out</a></li>
        <?php 
        if($_COOKIE['dept_id'] && $_COOKIE['dept_id'] ==1){
        echo '<li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="employeesList.php">Employees<span class="caret"></span></a>
            <ul class="dropdown-menu">
            
                <li><a href="employeesList.php">Employees List</a></li>
                <li><a href="addemployee.php">Add Employees</a></li>
            </ul>
        </li>
        <li><a href="availableEmployeesList.php">Employees Available Today</a></li>
        <li><a href="employeesMonthlyReport.php?month="'.date("m").'>Employees Monthly Report</a></li>';
        }
        ?>
        
        <li><a href="logout.php">Logout</a></li>
    </ul>
</div>    