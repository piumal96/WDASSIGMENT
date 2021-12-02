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
    <div class="wrapper">
        <section class="form">
            <header>SLIATE</header>
            <form>
           <br><br>          
         

                <div class="topic">
                 <h1>SLIATE HNDIT NOTE</h1>
                 
                </div>
          
               <br><br>
               <br><br>
           <br><br>
           <br><br>
            
                <a href="./login.php" class="btn-home">Login</a>
               <br><br>
                <a href="./singup.php" class="btn-home">Sign Up</a>
                <br><br>
                <a href="./admin/index.php" class="btn-home">Admin</a>
            </form>
         
        </section>

    </div>
</div>
<script src="./private/js/disable_features.js"></script>
<div class="footer">
<p>2021 All rights reserved</p><br>
<h4>Code By RMJP KUMARA</h4>
        </div>
</body>
</html>

