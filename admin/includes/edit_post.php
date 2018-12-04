<?php
$edit_id=$_GET['edit'];
if($_SERVER['REQUEST_METHOD']=='GET'){
    
    $query="select * from cms.posts where id=$edit_id";
    $query_res=mysqli_query($conn,$query);
    if(!$query_res){
        die("Query failed.");
    }else{
        $row=mysqli_fetch_assoc($query_res);
        $cat_id=$row['cat_id'];
        $title=$row['title'];
        $author=$row['author'];
        $date=$row['date'];
        $content=$row['content'];
        $image=$row['image'];
        $tag=$row['tag'];
        $stt=$row['status'];
    }
}
if(isset($_POST['edit_post'])){
        $cat_id=$_POST['cat_id'];
        $title=$_POST['title'];
        $author=$_POST['author'];
        $date=date('d-m-y');
        $image=$_FILES['image']['name'];
        $temp_image=$_FILES['image']['tmp_name'];
        $content=$_POST['content'];
        $tag=$_POST['tag'];
        $stt=$_POST['stt'];
        $cmt_count=4;
        move_uploaded_file($temp_image,"../images/$image");
        //move_uploaded_file($temp_image,"/images/$image");
        $query="update posts set cat_id='$cat_id',title='$title',author='$author',image='$image',content='$content',tag='$tag',status='$stt' where id=$edit_id";
        
        if(!mysqli_query($conn,$query)){
            die("Insert failed" );
        }
}
?>
    <form action="" method="post" enctype='multipart/form-data'>
        <div class="form-group">
            <label for="cat_id">Category ID</label>
            <input type="text" class="form-control" value="<?php echo $cat_id ?>" name="cat_id">
        </div>
        <div class="input-group mb-3 form-group">
            <div class="input-group-prepend">
                <label class="input-group-text" for="inputGroupSelect01">Options</label>
            </div>
            <select class="custom-select" id="inputGroupSelect01">
                <option selected>Choose...</option>
                <?php 
                    $query="SELECT * FROM cms.category";
                    $res=mysqli_query($conn,$query);
                    while($row=mysqli_fetch_row($res)){
                        echo "<option value='$row[1]'>$row[1]</option>";
                    }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="title">Post title</label>
            <input type="text" class="form-control" value="<?php echo $title ?>" name="title">
        </div>
        <div class="form-group">
            <label for="author">Author</label>
            <input type="text" class="form-control" value="<?php echo $author ?>" name="author">
        </div>
        <div class="form-group">
            <label for="date">Date</label>
            <input type="text" class="form-control" value="<?php echo $date ?>" name="date">
        </div>
        <div class="form-group">
            <img width="100" src="../images/<?php echo $image;?>" >  <br>
            <label for="exampleFormControlFile1">Image input</label>
            <input type="file" class="form-control-file" id="exampleFormControlFile1"  name="image">
        </div>
        <div class="form-group">
            <label for="content">Content</label>
            <textarea class="form-control" id="content"  name="content" rows="3"><?php echo $content ?></textarea>
        </div>
        <div class="form-group">
            <label for="tag">Tags</label>
            <input type="text" class="form-control" value="<?php echo $tag ?>" name="tag">
        </div>
        <div class="form-group">
            <label for="stt">Status</label>
            <input type="text" class="form-control" value="<?php echo $stt ?>" name="stt">
        </div>
        <button type="submit"  name="edit_post" class="btn btn-primary" >Edit Post</button>
        <a href="index.php" class="btn btn-info">Back</a>

    </form>
