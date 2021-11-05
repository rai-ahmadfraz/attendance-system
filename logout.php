<?php include('verifyToken.php'); ?>
<?php
if(isset($_COOKIE['name']) && isset($_COOKIE['email'])){
    setcookie('id','',1, "/");
    setcookie('name','',1, "/");
    setcookie('email','',1, "/");
    header("Location: index.php");
}
?>