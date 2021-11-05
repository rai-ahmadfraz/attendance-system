<?php

class loginController{

    public function login($POST,$connection){
        $result = $connection->query("select * from employees where email = '".$POST['email']."' and password='".$POST['password']."';");
        if($result->num_rows == 1){
            $rows[] = mysqli_fetch_assoc($result);
            setcookie('id',$rows[0]['id'],time() + (86400 * 3), "/");
            setcookie('name',$rows[0]['name'],time() + (86400 * 3), "/");
            setcookie('email',$rows[0]['email'],time() + (86400 * 3), "/");
            setcookie('dept_id',$rows[0]['dept_id'],time() + (86400 * 3), "/");
            return true;
        }else{
            return false;
        }
        
    }
}

?>