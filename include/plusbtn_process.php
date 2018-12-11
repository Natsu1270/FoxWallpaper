<?php include"database_connect.php";
include "WallpaperHelper.php";
session_start();
if(isset($_POST['lovepurple'])){
    $user_id=$_POST['user_id'];
    $wallpaper_id=$_POST['wallpaper_id'];
    $query="insert into cms.love(user_id,wallpaper_id) values('$user_id','$wallpaper_id')";
    $query_res=mysqli_query($conn,$query);
    if(!$query_res){
        die("add love failed ".mysqli_error($conn));
    }else{
        $query2="update cms.image set Like_count=Like_count+1 where ID=$wallpaper_id";
        $query_res2=mysqli_query($conn,$query2);
        if(!$query_res2){
            die("add love failed ".mysqli_error($conn));
        }else{
            echo getImageInfo($wallpaper_id);
        }
    }
}else if(isset($_POST['lovered'])){
    $user_id=$_POST['user_id'];
    $wallpaper_id=$_POST['wallpaper_id'];
    $query="delete from cms.love where user_id=$user_id and wallpaper_id=$wallpaper_id";
    $query_res=mysqli_query($conn,$query);
    if(!$query_res){
        die("remove love failed ".mysqli_error($conn));
    }else{
        $query2="update cms.image set Like_count=Like_count-1 where ID=$wallpaper_id";
        $query_res2=mysqli_query($conn,$query2);
        if(!$query_res2){
            die("decrease love failed ".mysqli_error($conn));
        }else{
            echo getImageInfo($wallpaper_id);
        }
    }
}

if(isset($_POST['bookpurple'])){
    $user_id=$_POST['user_id'];
    $wallpaper_id=$_POST['wallpaper_id'];
    $query="insert into cms.bookmark(b_userid,b_wallid) values('$user_id','$wallpaper_id')";
    $query_res=mysqli_query($conn,$query);
    if(!$query_res){
        die("add book failed ".mysqli_error($conn));
    }
}else if(isset($_POST['bookred'])){
    $user_id=$_POST['user_id'];
    $wallpaper_id=$_POST['wallpaper_id'];
    $query="delete from cms.bookmark where b_userid=$user_id and b_wallid=$wallpaper_id";
    $query_res=mysqli_query($conn,$query);
    if(!$query_res){
        die("remove book failed ".mysqli_error($conn));
    }
}

?>