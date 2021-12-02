<?php

if(!isset($_SESSION['admin'])) 
{
    $_SESSION['adminlogin']="Pleace Login To The System.";
    header('location:index.php');
}
?>