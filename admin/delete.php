<?php
require "../private/constant.php";
require "./autho.php";

 if(isset($_GET['id'])&& isset($_GET['note_name']))
    {
      
         $id= $_GET['id'];
         $note_name= $_GET['note_name'];
       
         if($note_name!="")
         {
           
             $path="../notes/".$note_name;
             $remove = unlink($path);
             if($remove==false)
             {
                 
                 $_SESSION['delete-note']="Failed to Delete Note. Try Again Later.";
                 header('location:home.php');
                 die();
             }
         }
     
         $sql = "DELETE FROM note WHERE Sn=$id";
  
         $res= mysqli_query($conn,$sql);

         if($res==true)
         {
        $_SESSION['delete-note']= "Note Deleted Successfully";
        header('location:home.php');
         }
         else
         {
        $_SESSION['delete-note']="Faild to Delete Note. Try Again Later.>";
         header('location:home.php');
         }
    }
    else
    {
        $_SESSION['delete-items']=">Invalid Action. Please Try Again Later.";
        header('location:home.php');
    }
   

?>