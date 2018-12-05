<?php 
    function showWallByCate($Cat_id){
        global $conn;
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
        $query="SELECT * FROM cms.image WHERE Cat_id=$Cat_id";
        $query_res=mysqli_query($conn,$query);
        if(!$query_res){
            die('show wallpaper by category failed.' .mysqli_error($conn));
        }
        while($row=mysqli_fetch_assoc($query_res)){
            $wallpaper=$row['Wallpaper'];
            ?>
                <div class="col wall-card">
                    <button class="cardbut btn purple c1"><i class="material-icons">favorite_border</i></button>
                    <button class="cardbut btn purple c2"><i class="material-icons">bookmark_border</i></button>
                    <a href=""><img src="images/<?php echo $wallpaper?>" class="z-depth-2 responsive-img card"></a>
                </div>
    <?php      
        }
    }
    function resultCount($Cat_id,$keyword){
        global $conn;
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
        $query="";
        if($Cat_id==0){
            if(empty($keyword)||$keyword==""||$keyword==null){
                $query="SELECT * FROM cms.image";
            }else{
                $query="SELECT * FROM cms.image WHERE Tag LIKE '%$keyword%'";
            }
        }else{
            if(empty($keyword)||$keyword==""||$keyword==null){
                $query="SELECT * FROM cms.image WHERE Cat_id=$Cat_id";
            }else{
                $query="SELECT * FROM cms.image WHERE Cat_id=$Cat_id AND Tag LIKE '%$keyword%'";
            }
        }
        $query_res=mysqli_query($conn,$query);
        return mysqli_num_rows($query_res);
    }


    function findWall($Cat_id,$keyword){
        global $conn;
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
        $query="";
        if($Cat_id==0){
            if(empty($keyword)||$keyword==""||$keyword==null){
                $query="SELECT * FROM cms.image";
            }else{
                $query="SELECT * FROM cms.image WHERE Tag LIKE '%$keyword%'";
            }
        }else{
            if(empty($keyword)||$keyword==""||$keyword==null){
                $query="SELECT * FROM cms.image WHERE Cat_id=$Cat_id";
            }else{
                $query="SELECT * FROM cms.image WHERE Cat_id=$Cat_id AND Tag LIKE '%$keyword%'";
            }
        }
        $query_res=mysqli_query($conn,$query);
        if(!$query_res){
            die('show wallpaper by category failed.' .mysqli_error($conn));
        }
        while($row=mysqli_fetch_assoc($query_res)){
            $wallpaper=$row['Wallpaper'];
            ?>
<div class="col s4 ">
    <img src="images/<?php echo $wallpaper?>" class="materialbox z-depth-2 responsive-img card">
</div>
<?php      
        }
        
    }

?>