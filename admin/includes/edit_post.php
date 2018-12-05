<?php
$edit_id=$_GET['edit'];
if($_SERVER['REQUEST_METHOD']=='GET'){
    $query="select * from cms.image where Id=$edit_id";
    $query_res=mysqli_query($conn,$query);
    if(!$query_res){
        die("Query failed.");
    }else{
        $row=mysqli_fetch_assoc($query_res);
        $Cat_id=$row['Cat_ID'];
        $date=$row['Date_upload'];
        $wallpaper=$row['Wallpaper'];
        $tag=$row['Tag'];
    }
}
if(isset($_POST['edit_post'])){
        $Cat_id=$_POST['cat_id'];
        $tag=$_POST['tag'];
        $query="update cms.image set Cat_ID='$Cat_id',tag='$tag' where id=$edit_id";
        if(!mysqli_query($conn,$query)){
            die("Insert failed" );
        }
}
?>
    <form action="" method="post" enctype='multipart/form-data'>
        <div class="form-group">
            <label for="cat_id">Category ID</label>
            <input readonly type="text" id="cat_id"  class="form-control" name="cat_id">
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
            <img class="img-responsive" style="width:200px;height:auto" src="../images/<?php echo $wallpaper?>" alt="">
        </div>
        <!-- <div class="form-group">
            <label for="exampleFormControlFile1">Image input</label>
            <input type="file" class="form-control-file" id="exampleFormControlFile1" multiple="multiple" name="wallpaper[]">
            
        </div> Khong thay doi anh dc vi chon dc nhieu anh-->
        
        <div class="form-group">
            <label for="date">Tags</label>
            <input type="text" class="form-control" value="<?php echo $tag ?>" name="tag">
        </div>

        <button type="submit" name="edit_post" class="btn btn-primary" >Upload wallpaper</button>
        <a href="index.php" class="btn btn-info">Back</a>

    </form>
