<?php

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
        move_uploaded_file($temp_wallpaper,"../images/$image_location/$wallpaper");
        $query="insert into cms.image(Cat_id,Wallpaper,Owner,Date_upload,Tag)";
        $query.="values('$Cat_id','$wallpaper','$Owner','$date','$tag')";
        if(!mysqli_query($conn,$query)){
            die("Insert failed" .mysqli_error($conn));
            }
        }
    }
?>
    <form action="" method="post" enctype='multipart/form-data'>
        <div class="form-group">
            <label for="cat_id">Category ID</label>
            <input readonly type="text" id="cat_id" class="form-control" name="cat_id">
        </div>
        <div class="input-group mb-3 form-group">
            <div class="input-group-prepend">
                <label class="input-group-text" for="inputGroupSelect01">Category</label>
            </div>
            <select class="custom-select" id="cat_select">
                <option selected>Choose...</option>
                <?php 
                    $query="SELECT * FROM cms.category";
                    $res=mysqli_query($conn,$query);
                    while($row=mysqli_fetch_row($res)){
                        echo "<option value='$row[0]'>$row[1]</option>";
                    }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="exampleFormControlFile1">Image input</label>
            <input type="file" class="form-control-file" id="exampleFormControlFile1" multiple="multiple" name="wallpaper[]">
            
        </div>
        
        <div class="form-group">
            <label for="date">Tags</label>
            <input type="text" class="form-control" name="tag">
        </div>

        <button type="submit" name="upload" class="btn btn-primary" >Upload wallpaper</button>
        <a href="index.php" class="btn btn-info">Back</a>

    </form>
    