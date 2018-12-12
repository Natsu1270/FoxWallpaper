<?php


function add(){
    global $conn;

    $title=$_POST['cat'];
    $title=mysqli_real_escape_string($conn,$title);
    if(!isset($title) || $title==""){
        echo "<script> alert('Input category');</script>";
        die("wrong input");
    }else{
        $query="INSERT INTO cms.category(title) VALUE('{$title}')";
        $res=mysqli_query($conn,$query);
        if(!$res){
            die("Query failed.");
        }
    }
}

function delete()
{
    
    global $conn;

    $id=$_GET['id'];
    $query="DELETE FROM cms.category WHERE id={$id}";
    if(!mysqli_query($conn,$query)){
        die("Query Failed.");
    }else{
        header("Location:categories.php");
    }

}
function findAllCat()
{
    global $conn;
    $query="select * from category";
    $query_res=mysqli_query($conn,$query);
    if(!$query_res){
        die("Query failed ");
    }else{
        while($row=mysqli_fetch_assoc($query_res)){
        $cat_title=$row['title'];
        $cat_id=$row['id'];
        echo "<tr>";
        echo "<td>{$cat_id}</td>";
        echo "<td>{$cat_title}</td>";
        echo "<td><a href='categories.php?id={$cat_id}' name='del' class='btn btn-danger'>Delete </a>";
        echo " <a href='categories.php?edit={$cat_id}' onclick='showedit()' name='edit' class='btn btn-warning'>Update</a></td>";
        echo "</tr>";
    }
}
                                
}

function fieldname()
{
    global $conn;
    $query="select * from cms.image";
    $query_res=mysqli_query($conn,$query);
    if(!$query_res){
        die("Query failed ");
    }else{
    while($row=mysqli_fetch_field($query_res)){
        echo "<th scope='col'>$row->name</th>";
}}}

function allPost($cat_id)
{
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
    global $conn;
    $query="select * from cms.image where Cat_id='$cat_id'";
    $query_res=mysqli_query($conn,$query);
    if(!$query_res){
        die("Query failed ");
    }else{
        while($row=mysqli_fetch_row($query_res)){
        echo "<tr>";
        for($i=0;$i<count($row);$i++){
            if($i==2){
                $img=$row[2];
                echo "<td><img class='img-responsive' src='../images/{$row[$i]}'></td>";
            }else{
                echo "<td>{$row[$i]}</td>";
            }
        }
        echo "<td><a class='btn btn-danger' href='posts.php?delete=$row[0]'>Delete</td>";
        echo "<td><a class='btn btn-primary' href='posts.php?source=edit_post&edit=$row[0]'>Edit</td>";
        echo "</tr>";
    }
}
            
}

function allComment()
{
    global $conn;
    $query="select * from comment";
    $query_res=mysqli_query($conn,$query);
    if(!$query_res){
        die("Query failed ");
    }else{
        while($row=mysqli_fetch_assoc($query_res)){
            $id=$row['id'];$wallpaper_id=$row['wallpaper_id'];
            $user_id=$row['user_id']; $username=$row['username'];
            $content=$row['content']; $date=$row['date'];
            echo "<td>$id</td>";
            echo "<td>$wallpaper_id</td>";
            echo "<td>$user_id</td>";
            echo "<td>$username</td>";
            echo "<td>$content</td>";
            echo "<td>$date</td>";
            echo "<td><a class='btn btn-danger' href='comments.php?delete=$id'>Delete</td>";
            echo "<td><a class='btn btn-primary' href='http://localhost/ltw/download_dialog.php?ID=$wallpaper_id' target='_blank'>{$wallpaper_id}</td>";
            echo "</tr>";
        }
        
    }                          
}
function fieldnameUser()
{
    global $conn;
    $query="select * from cms.user";
    $query_res=mysqli_query($conn,$query);
    if(!$query_res){
        die("Query failed ");
    }else{
    while($row=mysqli_fetch_field($query_res)){
        echo "<th scope='col'>$row->name</th>";
}}}
function allUser()
    {
        global $conn;
        $query="select * from user";
        $query_res=mysqli_query($conn,$query);
        if(!$query_res){
            die("Query failed". mysqli_error($conn));
        }else{
            while($row=mysqli_fetch_row($query_res)){
                $status=$row[count($row)-3];
                echo "<tr>";
                for($i=0;$i<count($row);$i++){
                    if($i==2){
                        continue;
                    }
                    if($i==11){
                        continue;
                    }
                    if($i==9){
                        echo "<td><img class='img-responsive' src='../images/avatar/{$row[$i]}'></td>";
                    }else{
                        echo "<td>{$row[$i]}</td>";
                    }
                        
                }
                echo "<td><a class='btn actionbtn btn-danger' href='users.php?delete=$row[0]'>Delete";
                if($status=='ban'){
                    echo"<a class='btn actionbtn btn-danger' href='users.php?ban_id=$row[0]&ban_code=0'>Unban</td>";
                }else if($status==''||empty($status)){
                    echo "<a class='btn actionbtn btn-danger' href='users.php?ban_id=$row[0]&ban_code=1'>Ban</td>";
                }else if($status='unactived'){
                    echo "<a class='btn actionbtn btn-danger' href='users.php?ban_id=$row[0]&ban_code=2'>Active</td>";
                }
                echo "</tr>";
        }
    }                              
}

function confirmQuery($res){
    if(!$res){
        die('Query failed');
    }
}

function metric()
{
    global $conn;
    $metric_detail=array();
    $res=mysqli_query($conn,"select count(*) from cms.user where status=''");
    if(!$res){
        die("count user failed ".mysqli_error($conn));
    }
    $row=$res->fetch_row();
    $metric_detail['user_count']=$row[0];
    $img_res=mysqli_query($conn,"select count(*) from cms.image");
    if(!$img_res){
        die("count image failed ".mysqli_error($conn));
    }
    $img_row=$img_res->fetch_row();
    $metric_detail['img_count']=$img_row[0];

    $cmt_res=mysqli_query($conn,"select count(*) from cms.comment");
    if(!$cmt_res){
        die("count comment failed ".mysqli_error($conn));
    }
    $cmt_row=$cmt_res->fetch_row();
    $metric_detail['cmt_count']=$cmt_row[0];

    $category_res=mysqli_query($conn,"select count(*) from cms.category");
    if(!$category_res){
        die("count image failed ".mysqli_error($conn));
    }
    $category_row=$category_res->fetch_row();
    $metric_detail['category_count']=$category_row[0];

    return $metric_detail;
}