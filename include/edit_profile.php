<?php
    include"database_connect.php";
    session_start();
    if(isset($_POST['user_id'])){
        $user_id=$_POST['user_id'];
        $fullname=$_POST['fullname'];
        $email=$_POST["email"];
        $password=$_POST["password"];
        $about=$_POST["about"];
        $gender=$_POST["gender"];
        $query="UPDATE cms.user SET fullname='$fullname',email='$email',password='$password',about='$about',gender='$gender' WHERE user_id=$user_id";
        $query_res=mysqli_query($conn,$query);
        if(!$query_res){
            die("edit detail fail ".mysqli_error($conn));
        }
        $re_query="SELECT * FROM cms.user WHERE user_id=$user_id";
        $re_query_res=mysqli_query($conn,$re_query);
        if(!$re_query_res){
            die("edit detail fail ".mysqli_error($conn));
        }
        while($row=mysqli_fetch_assoc($re_query_res)){
            $fullname=$row['fullname'];
            $email=$row["email"];
            $avatar=$row["avatar"];
            $about=$row["about"];
            $gender=$row["gender"];
        }
            $_SESSION['email']=$email;
            $_SESSION['gender']=$gender;
            $_SESSION['fullname']=$fullname;
            $_SESSION['about']=$about;
            $_SESSION['avatar']=$avatar;
            echo "edit";
    }

?>