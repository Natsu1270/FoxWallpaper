

<?php
// Delete user from database
if(isset($_GET['delete'])){
    $del_id=$_GET['delete'];
    $query="DELETE FROM cms.user where user_id=$del_id";
    $res=mysqli_query($conn,$query);
    if(!$res){
        echo('Query failed' .mysqli_error($conn));
    }
}else if(isset($_GET['ban_id'])){
    $ban_id=$_GET['ban_id'];
    $ban_act=$_GET['ban_code'];
    if($ban_act==1){
        $query="UPDATE cms.user SET status = 'ban' WHERE user_id=$ban_id";
    }else if($ban_act==0){
        $query="UPDATE cms.user SET status = '' WHERE user_id=$ban_id";
    }
    $ban_res=mysqli_query($conn,$query);
    if(!$ban_res){
        echo('Banned user fail' .mysqli_error($conn));
    }
}
?>
<?php
if(isset($_POST['create_user'])){
    $username=$_POST['username'];
    $password=$_POST['password'];
    $avatar=$_FILES['avatar']['name'];
    $temp_image=$_FILES['avatar']['tmp_name'];
    $status=$_POST['status'];
    $role=$_POST['role'];
    $randSalt=$_POST['randSalt'];
    $email=$_POST['email'];
    move_uploaded_file($temp_image,"../images/$avatar");
    $query="insert into cms.user(username,password,role,email,avatar,status)";
    $query.="values('$username','$password','$role','$email','$avatar','$status')";
    $query_res=mysqli_query($conn,$query);
    if(!$query_res){
        die("Insert failed" .mysqli_error($conn));
    }
}
?>
<table class="table table-dark table-bordered table-hover table-striped">
    <thead class="thead-dark">
        <tr>
            <?php 
            fieldnameUser(); ?>
        </tr>
    </thead>
    <tbody>
        <?php allUser();?>
    </tbody>
</table>