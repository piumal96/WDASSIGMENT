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
          
          <li><a href="./logout.php">Logout</a></li>
      </ul>
    </div>
 </div>
 
 <div class="main-content">
    <div class="wrapper">
        <h1>Manage Notes</h1>
        <br /><br />

        <?php
if(isset($_SESSION['note-add']))
{
    echo $_SESSION['note-add'];
    unset($_SESSION['note-add']);
}
if(isset($_SESSION['delete-note']))
{
    echo $_SESSION['delete-note'];
    unset($_SESSION['delete-note']);
}

?>
        <br><br><br>
    
        <a href="add-note.php" class="btn-primary">Add Note</a>
        <br /><br /><br />
        <table class="tbl-full">
            <tr>
                <th>S.N.</th>
                <th>Title</th>
                <th>Discription</th>
                <th>File</th>
                <th>Actions</th>
            </tr>
            <?php
$sql="SELECT * FROM note";

$res = mysqli_query($conn,$sql);

if($res==true){
 
    $count = mysqli_num_rows($res);
    $sn=1; 
 
    if($count>0)
    {
       
        while($rows=mysqli_fetch_assoc($res))
        {

            $id=$rows['Sn'];
            $title=$rows['title'];
            $discrip=$rows['discription'];
            $filename=$rows['filename'];

            ?>
            <tr>
              
                <th><?php echo $sn++?></th>
                <th><?php echo $title?></th>
                <th><?php echo $discrip?></th>
                <th><a href="../notes/<?php echo $filename?>">Download</a></th>
                
                <th>
                
                    
                    <a href="delete.php?id=<?php echo $id;?>&note_name=<?php echo $filename;?>" class="btn-danger">Delete Note</a>
                </th>
             
            </tr>
            
            <?php
        }
    }
    else
    {
        ?>
        <tr>
            <td colspan="4"><Div class="error">No Note Added</Div></td>
        </tr>
        <?php
    }
}

?>



           
        </table>

    </div>

</div>
<script src="./private/js/disable_features.js"></script>
</body>
</html>