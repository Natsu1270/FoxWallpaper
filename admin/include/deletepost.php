<?php
//include "C:/xampp\htdocs\cms\include\db.php ";

$del_id=$_GET['delete'];
    echo $del_id;
    $query="DELETE FROM posts where id=$del_id";
    $res=mysqli_query($conn,$query);
    if(!$res){
        die('Query failed');
    }
?>