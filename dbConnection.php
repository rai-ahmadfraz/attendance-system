<?php 

class dbConnection{

    public function connect(){
        $hostname = "localhost";
        $username = "ahmad";
        $password = "root";
        $database = "attendance_system";
        $connection = mysqli_connect($hostname,$username,$password,$database);
        if($connection->connect_error){
            return "unable to connect to database";
        }
        else{
            return $connection;
        }
    }
}
?>