<?php
require "./private/constant.php";
if(isset($_SESSION['user'])) 
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
    <link rel="stylesheet" href="./private/css/style.css">
    
</head>
<body>
<div class="home">
    <div class="wrapperlog">
        <section class="form">
            <header>Login</header>
            <form action="" method="POST">
            <?php
if(isset($_SESSION['add']))
{
    echo $_SESSION['add'];
    unset($_SESSION['add']);
}
if(isset($_SESSION['login']))
{
    echo $_SESSION['login'];
    unset($_SESSION['login']);
}
?>
                
                <div class="field input">
                    <label>Registration Number</label>
                    <br>
                    <input type="text" name="username" placeholder="Enter your reg. no">
                </div>
                <div class="field input">
                    <label>Password</label>
                    <br>
                    <input type="password" name="password" placeholder="Enter your password">
                   
                </div>
               
               

                    <input type="submit" name="submit" value="Login" class="btn-login">
               
            </form>
            <div class="link">New user?<a href="./singup.php"> Create account Now</a></div>
        </section>
    </div>
</div>
<script src="./private/js/disable_features.js"></script>
<div class="footer">
<p>2021 All rights reserved</p><br>
<h4>Code By RMJP KUMARA</h4>
        </div>

        <?php
if(isset($_POST['submit']))
{
    $username=$_POST['username'];
    $password =md5($_POST['password']);

    $sql="SELECT * FROM login WHERE regNo='$username' AND Password='$password'";
    $res=mysqli_query($conn,$sql);
    
    
    $count=mysqli_num_rows(($res));
    if($count==1)
    {
     
        $_SESSION['user']=$username;

        header("location:home.php"); 
    }
    else
    {
       
        $_SESSION['login']="Incorect Username Or Password";
        header("location:login.php"); 
    }
}




?>
</body>
</html>