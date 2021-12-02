<?php
require "../private/constant.php";
require "./autho.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="../private/css/style.css">
</head>
<body>
<div class="menu text-center">
    
    <div class="wrapperadmin">
      <ul>
          
          <li><a href="logout.php">Logout</a></li>
      </ul>
   
 <div class="main-content">
    <div class="wrappera">
        <h1>Add note</h1>
        <br /><br />
<?php
        if(isset($_SESSION['note-add']))
{
    echo $_SESSION['note-add'];
    unset($_SESSION['note-add']);
}
 if(isset($_SESSION['upload_note']))
{
    echo $_SESSION['upload_note'];
    unset($_SESSION['upload_note']);
}
?>
<br/><br/><br/>
       
        <form action="" method="post" enctype="multipart/form-data">
          <table class="tbl-30">
        <tr>
            <td>Title:</td>
            <td>
                <input type="text" name="title" placeholder="Note Title" required>
            </td>
        </tr>
        <tr>
            <td>Discription:</td>
            <td>
               <textarea name="discription" cols="30" rows="5" placeholder="Discription of the Note"></textarea>
            </td>
        </tr>
        <tr>
            <td>Select Note</td>
            <td>
                <input type="file" name="note" size="50"> 
            </td><br>
            <td>
            <label for="">Maximum 2mb</label>
            </td>
        </tr>
        
        
        <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Note" class="btn-secondary" >
                    </td>
                </tr>
          </table>
        </form>



 <?php
if(isset($_POST['submit']))
{
   $title=$_POST['title'];
   $discription=$_POST['discription'];
   
    


if(isset($_FILES['note']['name']))
{
    
    $note_name=$_FILES['note']['name'];
  
   if($note_name!="")
   {

   
$n =explode('.',$note_name);
    $ext=end($n);

    $note_name="note_".rand(000, 999).'.'.$ext;
    $source_path=$_FILES['note']['tmp_name'];

    $destination_path="../notes/".$note_name;


    $upload=move_uploaded_file($source_path,$destination_path);
   
  

    if($upload==false)
    {
     
        $_SESSION['upload_note']="Faild to upload Note.";
        header("location:add-note.php"); 
     
        die();
    }
}
}
else
{
  
    $_SESSION['upload_note']="Select file to upload Note.";
        header("location:add-note.php"); 
     
        die();
}



$sql="INSERT INTO note SET
title='$title',
discription='$discription',
filename='$note_name'
";

$res=mysqli_query($conn,$sql);

if($res==true)
{
 
 $_SESSION['note-add']="Note Added Successfully";

 header("location:home.php"); 
}
else
{

 $_SESSION['note-add']="Failed To Add note";

 header("location:add-note.php"); 
}


}
 ?>

    </div>
    <script src="./private/js/disable_features.js"></script>
</div>
</body>
</html>