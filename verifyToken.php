<?php 
if(!isset($_COOKIE["email"]) && !isset($_COOKIE["name"])){  
    header("Location: index.php");
}
?>