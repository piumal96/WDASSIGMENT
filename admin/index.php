<?php
require "../private/constant.php";
if(isset($_SESSION['admin'])) 
{
   
    header('location:home.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HNDIT</title>
    <link rel="stylesheet" href="../private/css/style.css">
    
</head>
<body>
<div class="home">
    <div class="wrapperlog">
        <section class="form">
            <header>Admin Login</header>
            <form action="" method="POST">
            <?php

if(isset($_SESSION['adminlogin']))
{
    echo $_SESSION['adminlogin'];
    unset($_SESSION['adminlogin']);
}
?>
                
                <div class="field input">
                    <label>Username</label>
                    <br>
                    <input type="text" name="username" placeholder="Enter your Username">
                </div>
                <div class="field input">
                    <label>Password</label>
                    <br>
                    <input type="password" name="password" placeholder="Enter your password">
                   
                </div>
               
               

                    <input type="submit" name="submit" value="Login" class="btn-login">
               
            </form>
           
        </section>
    </div>
</div>
<div class="footer">
<p>2021 All rights reserved</p><br>
<h4>Code By RMJP KUMARA</h4>
        </div>

        <?php
if(isset($_POST['submit']))
{
    $username=$_POST['username'];
    $password =$_POST['password'];

    $sql="SELECT * FROM admin WHERE username='$username' AND password='$password'";
    $res=mysqli_query($conn,$sql);
    
    
    $count=mysqli_num_rows(($res));
    if($count==1)
    {
     
        $_SESSION['admin']=$username;

        header("location:home.php"); 
    }
    else
    {
       
        $_SESSION['adminlogin']="Incorect Username Or Password";
        header("location:index.php"); 
    }
}




?>
<script src="./private/js/disable_features.js"></script>
</body>
</html>