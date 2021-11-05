<?php
include('login.php');
include('dbConnection.php');
include('controller/loginController.php');
include('controller/employeesController.php');
include('controller/attendanceController.php');

$connection = new dbConnection();
$connection = $connection->connect();
if(!$connection){
    die("unable to connect to database try again later");
}

if($_POST['login_btn']){
    if($_POST['email'] && $_POST['password']){
        $loginclass = new loginController();
        $user = $loginclass->login($_POST,$connection);
        if($user){
            header("Location: index.php");
        }else{
            header("Location: loginForm.php?message=Invalid Email Or Password");
        }
    }else{
        header("Location: loginForm.php?message=Fill all fields");
    }
    
}

else if($_POST['add_employee_submit']){
    if($_POST['name'] && $_POST['email'] && $_POST['password'] && $_POST['salary'] && $_POST['dept_id']){
        $employee_controller = new employeesController();
        $user = $employee_controller->saveUser($_POST,$connection);
         if($user){
                setcookie('message','Employee Added Successfully',time() + 5,'/');
                header("Location: employeesList.php");
            }
            else{
                header("Location: addemployee.php?message=Email Already Exists Or Invalid Data");
            }
    }
    else{
        header("Location: addemployee.php?message=Fill all fields");
    }
}
else if($_POST['update_employee_submit']){
    if($_POST['name'] && $_POST['password'] && $_POST['id'] && $_POST['salary'] && $_POST['dept_id']){
        $employee_controller = new employeesController();
        $user = $employee_controller->updateUser($_POST,$connection);
         if($user){
                setcookie('message','Employee Updated Successfully',time() + 5,'/');
                header("Location: employeesList.php");
            }
            else{
                header("Location: addemployee.php?message=Email Already Exists Or Invalid Data");
            }
    }
    else{
        header("Location: addemployee.php?message=Fill all fields");
    }
}
else if($_POST['save_attendance']){
    if($_POST['id'] && (($_POST['punch_in_hour'] && $_POST['punch_in_minutes']) || ($_POST['punch_out_hour'] && $_POST['punch_out_minutes']))){
        $attendance_controller = new attendanceController();
        $result = $attendance_controller->saveAttendance($_POST,$connection);
        setcookie('message','Attendance Updated Successfully',time() + 5,'/');
        header("Location: home.php");
    }
    else{
        header("Location: home.php");
    }    
}


else if($_GET['action'] =='delete' && $_GET['employee_id']){
    $employee_controller = new employeesController();
    $is_employee_deleted = $employee_controller->deleteUser($_GET,$connection);
    if($is_employee_deleted){
        setcookie('message','Employee Deleted Successfully',time() + 5,'/');
        header("Location: employeesList.php");
    }
    else{
        setcookie('message','Someting Went Wrong',time() + 5,'/');
        header("Location: employeesList.php");
    }
}

else{
    echo "no way";
}
$connection->close();

?>