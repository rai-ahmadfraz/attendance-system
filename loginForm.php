<!DOCTYPE html>
<html lang="en">
<?php include('head.php'); ?>
<body>
    <div class="container">
        <div class="row login_form">
            <div class="col-md-6">
                <p>
                    <?php
                        if(isset($_GET['message'])){
                            echo $_GET['message'];
                        }
                    ?>
                </p>

                <form class="form-group" method="POST" action="formactions.php">
                    <input type="email" class="form-control" name="email" placeholder="Enter Email" />
                    <input type="password" class="form-control" name="password" placeholder="Enter Password" />
                    <input type="submit" class="form-control" value="Login" name="login_btn" />
                </form>    
            </div>
        </div>
    </div>
</body>
</html>
