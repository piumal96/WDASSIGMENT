<?php


session_start();



define('HOST','localhost');
define('DB_USERNAME','root');
define('DB_PASSWORD','');
define('DB_NAME','wdassignment');
  $conn = mysqli_connect(HOST,DB_USERNAME,DB_PASSWORD) ;
  $db_select = mysqli_select_db($conn,DB_NAME) ; 
?>