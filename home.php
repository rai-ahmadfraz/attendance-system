<?php
 include('verifyToken.php');
 include ('dbConnection.php');
?>
<!DOCTYPE html>
<html lang="en">
<?php include('head.php'); ?>
<body>
<div class="container-fluid home">
    <div class="row">
        <?php include("sideMenu.php")?>
        <div class="col-md-4">
                <?php if(isset($_COOKIE['message'])){echo $_COOKIE['message'];} ?>
                <?php
                    $connection = new dbConnection();
                    $connection = $connection->connect();
                    if(!$connection){
                        die("unable to connect to database try again later");
                    }  
                    else{
                        $attendance = $connection->query("select * from attendances where employee_id = '".$_COOKIE["id"]."' and date ='".date("y-m-d")."'");
                        if($attendance->num_rows == 1){
                            $attendance = mysqli_fetch_assoc($attendance);
                        }else{
                            $attendance = "";
                        }
                    }
                ?>
                <form class="form-group punch_inout_form" method="POST" action="formactions.php">
                    <p>Today Date: <?php echo date('d M y');?></p>
                    <div class="row">
                        <input type="hidden" name="id" id="id" value="<?php echo $_COOKIE['id'];?>"/>
                        <input type="hidden" name="date" id="date" value="<?php echo date('d M y');?>"/>
                        <p>Punch In:</p>
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="punch_in_hour" id="punch_in_hour" value="<?php if($attendance['punch_in_hour']){echo $attendance['punch_in_hour'];}?>" <?php if($attendance['punch_in_hour']){echo "disabled";} ?> />
                        </div>
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="punch_in_minutes" id="punch_in_minutes" value="<?php if($attendance['punch_in_minutes']){echo $attendance['punch_in_minutes'];}?>" <?php if($attendance['punch_in_minutes']){echo "disabled";} ?> />
                        </div>
                        <?php 
                        if(!$attendance['punch_in_hour']){
                            echo '<div class="col-md-4">
                            <button id="punch_in_btn">In</button>
                        </div>';
                        }?>
                        
                    </div>
                    <div class="row">
                        <p>Punch Out:</p>
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="punch_out_hour" id="punch_out_hour" value="<?php if($attendance['punch_out_hour']){echo $attendance['punch_out_hour'];}?>" <?php if($attendance['punch_out_hour']){echo "disabled";} ?> />
                        </div>
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="punch_out_minutes" id="punch_out_minutes" value="<?php if($attendance['punch_out_minutes']){echo $attendance['punch_out_minutes'];}?>" <?php if($attendance['punch_out_minutes']){echo "disabled";} ?> />
                        </div>
                        <?php 
                        if(!$attendance['punch_out_hour']){
                            echo '<div class="col-md-4">
                            <button id="punch_out_btn">Out</button>
                        </div>';
                        }?>
                    </div>
                    <?php 
                        if(!$attendance['punch_out_hour']){
                            echo '<input type="submit" class="form-control" name="save_attendance" value="Save" name="submit" />';
                        }?>
                </form>        
            </div>
    </div>
</div>
</body>
</html>

