<?php
if(isset($_GET['delete'])){
    $del_id=$_GET['delete'];
    $query="DELETE FROM comment where id=$del_id";
    $res=mysqli_query($conn,$query);
    if(!$res){
        die('Query failed');
    }
}
?>
<table class="table table-dark table-bordered table-hover table-striped">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>WallpaperID</th>
            <th>UserID</th>
            <th>UserName</th>
            <th>Content</th>
            <th>Date</th>
            <th>Action</th>
            <th>See comment</th>
        </tr>
    </thead>
    <tbody>
        <?php allComment();
         ?>
    </tbody>
</table>