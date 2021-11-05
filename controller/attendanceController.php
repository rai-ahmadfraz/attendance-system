<?php

class attendanceController{
    public function saveAttendance($POST,$connection){
        $check_record = $connection->query("select * from attendances where employee_id = '".$POST["id"]."' and date ='".date("y-m-d")."'");
        if($check_record->num_rows == 1){
            $row = mysqli_fetch_assoc($check_record);
            $query = "update attendances 
            set punch_out_hour = ".$POST["punch_out_hour"].",
            punch_out_minutes = ".$POST["punch_out_minutes"]."
            WHERE id= ".$row['id']." ";
            $punch_out = $connection->query($query);
            if($punch_out){
                return "Attendance Updated";
            }
            else{
                return "Something Went Wrong";
            }
        }else{
            $result = $connection->query("insert into attendances(employee_id,date,punch_in_hour,punch_in_minutes)
            value(".$POST["id"].",'".date("y-m-d")."',".$POST["punch_in_hour"].",".$POST["punch_in_minutes"].")"); 
            if($result){
                return "Attendance Saved";
            }
            else{
                return "Something Went Wrong";
            }
        }
    }

}

?>