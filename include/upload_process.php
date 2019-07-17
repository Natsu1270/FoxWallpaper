<?php include"database_connect.php";
    session_start();
    if(isset($_POST['upload_submit'])){
        $upload_userid=$_SESSION['user_id'];
        $upload_username=$_SESSION['username'];
        $cat_id=$_POST['upload_cat'];
        $tag=$_POST['tag'];
        $date=date('Y-m-d G:i:s');
        $image=$_FILES['upload_img']['name'];
        $tmp=$_FILES['upload_img']['tmp_name'];
        move_uploaded_file($tmp,"../images/$image");
        $query="insert into image(Cat_id,Wallpaper,Owner,Date_upload,Tag)";
        $query.="values('$cat_id','$image','$upload_username','$date','$tag')";
        
        if(!mysqli_query($conn,$query)){
            die("Insert failed" .mysqli_error($conn));
        }else{
            $query="update user set upload_count=upload_count+1 where user_id=$upload_userid";
            if(!mysqli_query($conn,$query)){
                die("increase upload count failed" .mysqli_error($conn));
            }
        }
       
        header("Location:../");
    }
?>