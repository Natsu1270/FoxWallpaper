<?php
//include "C:/xampp\htdocs\cms\includes\db.php ";

$del_id=$_GET['delete'];
    echo $del_id;
    $query="DELETE FROM cms.posts where id=$del_id";
    $res=mysqli_query($conn,$query);
    if(!$res){
        die('Query failed');
    }
?>