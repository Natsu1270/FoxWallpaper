<?php
include "../../include/database_connect.php";
if(isset($_POST['upload'])){
    $up_count=count($_FILES['wallpaper']['name']);
    for($i=0;$i<$up_count;$i++){
        $Cat_id=$_POST['cat_id'];
        $Owner='admin';
        $date=date("Y-m-d");
        $wallpaper=$_FILES['wallpaper']['name'][$i];
        $temp_wallpaper=$_FILES['wallpaper']['tmp_name'][$i];
        
        $tag=$_POST['tag'];
        $image_location="";
        if($Cat_id==1){
            $image_location='3d_abstract';
        }else if($Cat_id==2){
            $image_location='anime';
        }else if($Cat_id==3){
            $image_location='bike';
        }else if($Cat_id==4){
            $image_location='landscape';
        }else if($Cat_id==5){
            $image_location='girl';
        }
        move_uploaded_file($temp_wallpaper,"../images/$wallpaper");
        $query="insert into image(Cat_id,Wallpaper,Owner,Date_upload,Tag)";
        $query.="values('$Cat_id','$wallpaper','$Owner','$date','$tag')";
        if(!mysqli_query($conn,$query)){
            die("Insert failed" .mysqli_error($conn));
            }
        }
    }
?>