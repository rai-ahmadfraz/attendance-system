<?php
    class employeesController{

        public function saveUser($POST,$connection){

            $query = "insert into employees (name,email,salary,dept_id,password) 
            values('".$POST['name']."','".$POST['email']."','".$POST['salary']."','".$POST['dept_id']."','".$POST['password']."');";
            $data_saved = $connection->query($query);
            return $data_saved;
        }
        public function updateUser($POST,$connection){
            $query = "update employees 
            set name= '".$POST['name']."',
            salary= '".$POST['salary']."',
            dept_id= '".$POST['dept_id']."',
            password= '".$POST['password']."' 
            WHERE id= ".$POST['id']." ";
            $data_updated = $connection->query($query);
            return $data_updated;
        }
        public function deleteUser($GET,$connection){
            $result = $connection->query("delete from employees where id = ".$GET['employee_id']."");
            return $result;
        }
    }
?>