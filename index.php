<!DOCTYPE html>
<html lang="en">
<?php 
include('head.php');
?>
<body>
    <?php
        if(isset($_COOKIE["email"]) && isset($_COOKIE["name"])){  
             header("Location: home.php");
        }
        else{
            header("Location: loginForm.php");
        } 
    ?>
</body>
</html>
