<?php include"database_connect.php";
session_start();
if(isset($_GET['id'])){
    $wallpaper_id=(int)$_GET['id'];
}
if(isset($_POST['comment'])){
    if(!isset($_SESSION['logged'])||!$_SESSION['logged']){
        header("Location:../login.php");
    }else{
        $content=$_POST['content'];
        $user_id=$_SESSION['user_id'];
        $username=$_SESSION['username'];
        $date=date('Y-m-d G:i:s');
        $query="INSERT INTO comment(wallpaper_id,user_id,username,content,date) VALUES ('$wallpaper_id', '$user_id','$username','$content','$date')";
        $query_res=mysqli_query($conn,$query);
        if(!$query_res){
            die("insert comment failed ".mysqli_error($conn));
        }else{
            $query="UPDATE image SET CmtNum=CmtNum+1 WHERE ID=$wallpaper_id";
            $query_res=mysqli_query($conn,$query);
            if(!$query_res){
                die("increase comment failed ".mysqli_error($conn));
            }
            header("Location:../download_dialog.php?ID=$wallpaper_id");
        }
    }
}