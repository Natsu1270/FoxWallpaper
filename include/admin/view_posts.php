<?php
if(isset($_GET['delete'])){
    $del_id=$_GET['delete'];
    $cat_name = $_GET['cat_name'];
    $img = $_GET['img'];
    $query="DELETE FROM image where ID=$del_id";
    $res=mysqli_query($conn,$query);
    if(!$res){
        die('Query failed');
    }else{
        error_log("images/category/$cat_name/$img");
        unlink("images/category/$cat_name/$img");
    }
}

?>

    <?php 
        $cat = json_decode(getAllCategory(),true);
        error_log(getAllCategory());
        for($i = 0 ; $i < count($cat) ; ++$i){
            $arr = allPost($cat[$i]["id"]);
            $cat_name = $cat[$i]["title"];
            $image_location = $arr[0];
            $imgs = $arr[1];

            // $fn = fieldname();
            echo "<button class='btn btn-success cusbtn' id=$cat_name>$cat_name</button>";
            echo "<table class='table table-dark table-bordered table-hover table-striped'>";
            echo "<thead class='thead-dark'><tr>" . fieldname() . "</tr></thead><tbody>";

            while($row=mysqli_fetch_row($imgs)){
                echo "<tr>";
                for($j = 0 ; $j < count($row) ; $j++){
                    if($j == 2){
                        $img = $row[2];
                        echo "<td><img class='img-responsive' src='images/category/{$image_location}/{$row[$j]}'></td>";
                    }else{
                        echo "<td>{$row[$j]}</td>";
                        }
                    }
            echo "<td><a class='btn btn-danger' href='admin-posts?delete=$row[0]&cat_name=$cat_name&img=$img'>Delete</td>";
            echo "<td><a class='btn btn-primary' href='admin-posts?source=edit_post&edit=$row[0]&cat_name=$cat_name&img=$img'>Edit</td>";
            echo "</tr>";
                    
        }
        echo "</tbody></table>";
    }
        

    ?>
    
    

