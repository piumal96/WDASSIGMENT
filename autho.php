<?php

if(!isset($_SESSION['user'])) 
{
    $_SESSION['login']="Pleace Login To The System.";
    header('location:login.php');
}
?>