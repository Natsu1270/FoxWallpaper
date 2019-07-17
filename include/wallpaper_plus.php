<?php
include"database_connect.php";
if(isset($_POST['wallpaper_id'])){
    $ID=$_POST['wallpaper_id'];
    $q=" UPDATE image SET DownNum = DownNum + 1 WHERE ID = $ID";
    $q_res=mysqli_query($conn,$q);
    if(!$q_res){
        die("increase dwnNum failed ".mysqli_error($conn));
    }
    $q=" SELECT * FROM image WHERE ID = $ID";
    $q_res=mysqli_query($conn,$q);
    if(!$q_res){
        die("get dwnNum failed ".mysqli_error($conn));
    }
    while($row=mysqli_fetch_assoc($q_res)){
        $dwn=$row['DownNum'];
    }
    echo $dwn;
}

?>