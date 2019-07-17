<?php
include"database_connect.php";
if(isset($_POST['username'])){
    $username=$_POST['username'];
    $query="SELECT * FROM user WHERE username='$username'";
    $query_res=mysqli_query($conn,$query);
    if(!$query_res){
        die("Search user fail ".mysqli_error($conn));
    }
    while($row=mysqli_fetch_assoc($query_res)){
        $user_id=$row['user_id'];
    }
    echo $user_id;
}