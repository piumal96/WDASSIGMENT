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
            <header>Sing Up</header>
            <form action="" method="POST">
           
                
                <div class="field input">
                    <label>Registration Number</label>
                    <br>
                    <input type="text" name="regno" placeholder="Enter your Reg. no">
                </div>
                <div class="field input">
                    <label>Name</label>
                    <br>
                    <input type="text" name="name" placeholder="Enter your name">
                </div>
                <div class="field input">
                    <label>Password</label>
                    <br>
                    <input type="password" name="pass" placeholder="Enter your password">
                   
                </div>
               
          

                    <input type="submit" name="submit" value="Sing Up" class="btn-login">
               
            </form>
            <div class="link">Aulready sing up?<a href="./login.php"> Login Now</a></div>
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

    $regno = $_POST['regno'];
    $name = $_POST['name'];
    $pass = md5($_POST['pass']); 

    $sql1="SELECT * FROM login WHERE regNo='$regno'";
    $res1=mysqli_query($conn,$sql1);
    $count1=mysqli_num_rows($res1);
    if($count1>0)
    {
        $_SESSION['add']="You are aulready registerd";
       
        header("location:login.php"); 
    }
    else
    {

    


   
    $sql = "INSERT INTO login set
        regNo='$regno',
        name='$name',
        password='$pass'
    ";
   


    $res = mysqli_query($conn,$sql) ;
    
    if($res==true)
    {
        
        $_SESSION['add']="Registerd Successfully";
       
        header("location:login.php"); 
    }
    else{
         
         $_SESSION['add']="Failed to Register";
        
         header("location:login.php"); 
    }
}
}
?>
</body>
</html>