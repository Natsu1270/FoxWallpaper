<?php
include"database_connect.php";
session_start();
$user_id=$_SESSION['user_id'];
if(isset($_POST['changeavatar'])){
    $avatar=$_FILES['avatar']['name'];
    $tmp_ava=$_FILES['avatar']['tmp_name'];
    move_uploaded_file($tmp_ava,"../images/avatar/$avatar");
    $query="UPDATE user SET avatar='$avatar' WHERE user_id=$user_id";
        $query_res=mysqli_query($conn,$query);
        if(!$query_res){
            die("edit detail fail ".mysqli_error($conn));
        }
        $re_query="SELECT * FROM user WHERE user_id=$user_id";
        $re_query_res=mysqli_query($conn,$re_query);
        if(!$re_query_res){
            die("edit detail fail ".mysqli_error($conn));
        }
        while($row=mysqli_fetch_assoc($re_query_res)){
            $avatar=$row["avatar"];
        }
            $_SESSION['avatar']=$avatar;
            header("location:../profile");
}


?>