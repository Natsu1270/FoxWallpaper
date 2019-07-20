<?php

// include "include/database_connect.php";
if(isset($_POST['upload'])){
    $up_count=count($_FILES['wallpaper']['name']);
    for($i=0;$i<$up_count;$i++){
        $Cat_id=$_POST['cat_id'];
        error_log("get type ".$Cat_id);
        $Owner='admin';
        $date=date('Y-m-d G:i:s');
        $wallpaper=$_FILES['wallpaper']['name'][$i];
        $temp_wallpaper=$_FILES['wallpaper']['tmp_name'][$i];
        
        $tag=$_POST['tag'];
        $image_location="";
        
        $query="SELECT * FROM category WHERE id = '$Cat_id'";
        $res=mysqli_query($conn,$query);
        while($row=mysqli_fetch_assoc($res)){
            $image_location =strval($row['title']);
        }
        move_uploaded_file($temp_wallpaper,"images/category/" . $image_location . "/" . $wallpaper);
        $query="insert into image(Cat_id,Wallpaper,Owner,Date_upload,Tag)";
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
                    $query="SELECT * FROM category";
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
        <a href="/admin" class="btn btn-info">Back</a>

    </form>
    