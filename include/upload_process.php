<?php include"database_connect.php";
    session_start();
    if(isset($_POST['upload_submit'])){
        $upload_userid=$_SESSION['user_id'];
        $upload_username=$_SESSION['username'];
        $cat_id=$_POST['upload_cat'];
        $tag=$_POST['tag'];
        $date=date("Y-m-d");
        $image=$_FILES['upload_img']['name'];
        $tmp=$_FILES['upload_img']['tmp_name'];
        move_uploaded_file($tmp,"../images/$image");
        $query="insert into cms.image(Cat_id,Wallpaper,Owner,Date_upload,Tag)";
        $query.="values('$cat_id','$image','$upload_username','$date','$tag')";
        
        if(!mysqli_query($conn,$query)){
            die("Insert failed" .mysqli_error($conn));
            }
       
        header("Location:../index.php");
    }
?>