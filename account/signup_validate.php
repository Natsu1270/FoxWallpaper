<?php
include "include/database_connect.php";
if($_SERVER['REQUEST_METHOD']=='POST'){
    if(isset($_POST['username'])){
        $username=strtolower(trim($_POST['username']));
        $username = filter_var($username, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH);
        $results = mysqli_query($conn,"SELECT * FROM user WHERE username='{$username}'");
        $user_exist=mysqli_num_rows($results);
        if(strlen($username)<3){
            $msg="username's length must be greater than 3";
            echo json_encode(array("message"=>$msg,"bgc"=>1));
        }else if(strlen($username)>10){
            $msg= "username's length must be less than 10";
            echo json_encode(array("message"=>$msg,"bgc"=>1));
        }
        else if($user_exist){
            $msg= "username is already token!";
            echo json_encode(array("message"=>$msg,"bgc"=>1));
        }else{
            $msg= "";
            echo json_encode(array("message"=>$msg,"bgc"=>0));
        }
    }
    if(isset($_POST['email'])){
        $email=strtolower(trim($_POST['email']));
        $email = filter_var($email, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH);
        if(!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i", $email,$match)){
            $mgs="Invalid email format!";
            echo json_encode(array("message"=>$mgs,"error"=>1));
        }else{
            $results = mysqli_query($conn,"SELECT * FROM user WHERE email='{$email}'");
            $email_exist=mysqli_num_rows($results);
            if($email_exist){
            $mgs= "Email is already used for register!";
            echo json_encode(array("message"=>$mgs,"error"=>1));
            }else{
                $mgs= "";
                echo json_encode(array("message"=>$mgs,"error"=>0));
            }
        }
    }
}


?>