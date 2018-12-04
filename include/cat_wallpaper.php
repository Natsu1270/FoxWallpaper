<?php 
    if(isset($_GET['cat_id'])){
        $cat_id=(int)$_GET['cat_id'];
        $image_location="";
        if($cat_id==1){
            $image_location='3d_abstract';
        }else if($cat_id==2){
            $image_location='anime';
        }else if($cat_id==3){
            $image_location='bike';
        }else if($cat_id==4){
            $image_location='landscape';
        }else if($cat_id==5){
            $image_location='girl';
        }
        $query="SELECT * FROM cms.image WHERE Cat_id=$cat_id";
        $query_res=mysqli_query($conn,$query);
        if(!$query_res){
            die('show wallpaper by category failed.' .mysqli_error($conn));
        }
        while($row=mysqli_fetch_assoc($query_res)){
            $wallpaper=$row['Wallpaper'];
            ?>
            <div class="col s4"> 
                <img src="images/<?php $image_location?>/<?php $wallpaper?>" class="materialbox responsive-img card">
            </div>
<?php
        }
    }
?>