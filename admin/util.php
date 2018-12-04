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
        echo " <a href='categories.php?edit={$cat_id}' name='edit' class='btn btn-warning'>Update</a></td>";
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
                echo "<td><img class='img-responsive' src='../images/$image_location/{$row[$i]}'></td>";
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
        while($row=mysqli_fetch_row($query_res)){
        $query="select * from posts where id=$row[1]";
        $p_res=mysqli_query($conn,$query);
        while($p_row=mysqli_fetch_assoc($p_res)){
            $post_id=$p_row['id'];
            $post_title=$p_row['title'];
        }
        echo "<tr>";
        for($i=0;$i<count($row);$i++){
                echo "<td>{$row[$i]}</td>";
        }
        echo "<td><a class='btn btn-success' href='comments.php?approve={$row[0]}'>Approve</a>
        <a class='btn btn-success' href='comments.php?disapprove={$row[0]}'>Disapprove</a>
        </td>";
        echo "<td><a class='btn btn-danger' href='comments.php?delete=$row[0]'>Delete</td>";
        echo "<td><a class='btn btn-primary' href='../post.php?p_id=$post_id'>{$post_title}</td>";
        echo "</tr>";
        }
    }                            
}

function allUser()
    {
        global $conn;
        $query="select * from user";
        $query_res=mysqli_query($conn,$query);
        if(!$query_res){
            die("Query failed". mysqli_error($conn));
        }else{
            while($row=mysqli_fetch_row($query_res)){
                $status=$row[count($row)-1];
                echo "<tr>";
                for($i=0;$i<count($row);$i++){
                        echo "<td>{$row[$i]}</td>";
                }
                echo "<td><a class='btn actionbtn btn-danger' href='users.php?delete=$row[0]'>Delete";
                if($status=='ban'){
                    echo"<a class='btn actionbtn btn-danger' href='users.php?ban_id=$row[0]&ban_code=0'>Unban</td>";
                }else if($status==''||empty($status)){
                    echo "<a class='btn actionbtn btn-danger' href='users.php?ban_id=$row[0]&ban_code=1'>Ban</td>";
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