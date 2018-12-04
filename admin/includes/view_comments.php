<?php
if(isset($_GET['delete'])){
    $del_id=$_GET['delete'];
    $query="DELETE FROM cms.comment where id=$del_id";
    $res=mysqli_query($conn,$query);
    if(!$res){
        die('Query failed');
    }
}
if(isset($_GET['approve'])){
    $cmt_id=$_GET['approve'];
    $query="UPDATE cms.comment SET status='approved' where id=$cmt_id";
    $res=mysqli_query($conn,$query);
    if(!$res){
        die('Query failed');
    }
}
if(isset($_GET['disapprove'])){
    $cmt_id=$_GET['disapprove'];
    $query="UPDATE cms.comment SET status='disapproved' where id=$cmt_id";
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
            <th>Post ID</th>
            <th>Author</th>
            <th>Email</th>
            <th>Content</th>
            <th>Status</th>
            <th>Date</th>
            <th>Check</th>
            <th>Action</th>
            <th>In Post</th>
        </tr>
    </thead>
    <tbody>
        <?php allComment();
        
         ?>
    </tbody>
</table>