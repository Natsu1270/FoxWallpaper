<?php 
    include "database_connect.php";
    if(isset($_POST['cat_id'])){
        $cat_id=$_POST['cat_id'];
        $image_location="";
        $return_arr=array();
        $index=0;
        // if($cat_id==1){
        //     $image_location='3d_abstract';
        // }else if($cat_id==2){
        //     $image_location='anime';
        // }else if($cat_id==3){
        //     $image_location='bike';
        // }else if($cat_id==4){
        //     $image_location='landscape';
        // }else if($cat_id==5){
        //     $image_location='girl';
        // }
        $query="SELECT * FROM image WHERE Cat_id=$cat_id";
        $query_res=mysqli_query($conn,$query);
        if(!$query_res){
            die('show wallpaper by category failed.' .mysqli_error($conn));
        }
        while($row=mysqli_fetch_assoc($query_res)){
            $wallpaper=$row['Wallpaper'];
            $return_arr[$index]=$wallpaper;
            $index=$index+1;
                // echo '<img src="images/$image_location/$wallpaper" class="materialbox responsive-img card">';
        }
        echo json_encode($return_arr);
    }
?>