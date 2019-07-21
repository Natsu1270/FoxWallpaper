<?php 
    /* Function for display wallpapers in main page */

    function execute($query,$conn,$error_msg){
        $query_res=mysqli_query($conn,$query);
        if(!$query_res){
            die($error_msg . mysqli_error($conn));
        }else{
            return $query_res;
        }

    }
    function getCateNameById($id){
        global $conn;
        $query="SELECT * FROM category WHERE id = $id";
        $error_msg = "get categories failed! ";
        $query_res = execute($query,$conn,$error_msg);
        while($row = mysqli_fetch_assoc($query_res)){
            $cate_name = $row['title'];
        }
        return $cate_name;
    }
    function getAllCategory(){
        global $conn;
        $categories = array();
        $query="SELECT * FROM category";
        $error_msg = "get categories failed! ";
        $query_res = execute($query,$conn,$error_msg);
        while($row = mysqli_fetch_assoc($query_res)){
            $categories[] = $row;
        }
        return json_encode($categories);
    }

    $index=0;
    function showWallByCate($Cat_id,$islog){
        global $index;
        global $conn;
        $current_user=-100;
        if(isset($_SESSION['user_id'])){
            $current_user=$_SESSION['user_id'];
        }
        
        $query="SELECT * FROM image WHERE Cat_id=$Cat_id ORDER BY Date_upload DESC";
        $query_res=mysqli_query($conn,$query);
        if(!$query_res){
            die('show wallpaper by category failed.' .mysqli_error($conn));
        }
        
        while($row=mysqli_fetch_assoc($query_res)){
            $owner=$row['Owner'];
            $downNum=$row['DownNum'];
            $loveNum=$row['Like_count'];
            $cmtNum=$row['CmtNum'];
            $dateupload=$row['Date_upload'];
            $canBookmark=true;
            $canLove=true;
            $wallpaper=$row['Wallpaper'];
            $wallpaper_id=$row['ID'];
            $bmquery="select * from bookmark where b_wallid=$wallpaper_id";
            $lovequery="select * from love where wallpaper_id=$wallpaper_id";
            $location = getCateNameById($Cat_id);
            $bmres=mysqli_query($conn,$bmquery);
            if(!$bmres){
                die("bookmark fail ".mysqli_error($conn));
            }
            while($row=mysqli_fetch_assoc($bmres)){
                $bmuser_id=$row['b_userid'];
                if($bmuser_id==$current_user){
                    $canBookmark=false;
                    break;
                }
            }
            $bkmStyle="";
            if(!$canBookmark){
                $bkmStyle="style='background-color:red !important'";
            }

            $loveres=mysqli_query($conn,$lovequery);
            if(!$loveres){
                die("lovequery fail ".mysqli_error($conn));
            }
            while($row=mysqli_fetch_assoc($loveres)){
                $loveuser_id=$row['user_id'];
                if($loveuser_id==$current_user){
                    $canLove=false;
                    break;
                }
            }
            $loveclass="";
            if($canLove){
                $loveclass='class="cardbut btn purple c1"';
            }else{
                $loveclass='class="cardbut btn redz c1"';
            }
            $bmclass="";
            if($canBookmark){
                $bmclass='class="cardbut btn purple c2"';
            }else{
                $bmclass='class="cardbut btn redz c2"';
            }
            if($islog==false){
                $islog=0;
            }
            ?>
                <div class="col wall-card">
                    <button id="lovebut<?php echo $index?>" onclick="love(<?php echo $islog ?>,<?php echo $current_user?>,<?php echo $wallpaper_id?>,this.id)"  <?php echo $loveclass?>>
                        <i class="material-icons">favorite_border</i>
                    </button>
                    <button id="bookbut<?php echo $index?>" onclick="bookmark(<?php echo $islog ?>,<?php echo $current_user?>,<?php echo $wallpaper_id?>,this.id)"  <?php echo $bmclass?>>
                        <i class="material-icons">bookmark_border</i>
                    </button>
                    <a class="modal-trigger" href="/download?ID=<?php echo $wallpaper_id?>&cat_id=<?php echo $Cat_id?>" target="_blank"><img style="z-index:1 !important" src="images/category/<?php echo $location."/".$wallpaper?>" class="z-depth-2 responsive-img card"></a>
                    <div class="info card">
                        <div style="text-align:center" class="row">
                            <div style="text-align:center" class="col s12">
                                <h5><?php echo $owner ?> <i style="font-size:12px">   <?php echo $dateupload?></i></h5>
                                
                            </div>
                            
                            <div class="col s4"><i class="material-icons">file_download</i> <?php echo $downNum?></div>
                            <div class="col s4"><i class="material-icons">favorite_border</i> <span id="countlovebut<?php echo $index?>"><?php echo $loveNum?></span></div>
                            <div class="col s4"><i class="material-icons">comment</i> <?php echo $cmtNum?></div>
                        </div>
                    </div>
                </div>
        <?php $index=$index+1;     
        }
    }

    function resultCount($Cat_id,$keyword){
        global $conn;
        $image_location="";
        if($Cat_id==1){
            $image_location='3d_abstract';
        }else if($Cat_id==2){
            $image_location='anime';
        }else if($Cat_id==3){
            $image_location='bike';
        }else if($Cat_id==4){
            $image_location='landscape';
        }else if($Cat_id==5){
            $image_location='girl';
        }
        $query="";
        if($Cat_id==0){
            if(empty($keyword)||$keyword==""||$keyword==null){
                $query="SELECT * FROM image";
            }else{
                $query="SELECT * FROM image WHERE Tag LIKE '%$keyword%'";
            }
        }else{
            if(empty($keyword)||$keyword==""||$keyword==null){
                $query="SELECT * FROM image WHERE Cat_id=$Cat_id";
            }else{
                $query="SELECT * FROM image WHERE Cat_id=$Cat_id AND Tag LIKE '%$keyword%'";
            }
        }
        $query_res=mysqli_query($conn,$query);
        return mysqli_num_rows($query_res);
    }

    $index2=0;
    function findWall($Cat_id,$keyword){
        $current_user=-100;
        if(isset($_SESSION['user_id'])){
            $current_user=$_SESSION['user_id'];
        }
        global $index2;
        $islog=true;
        $but="";
        if(isset($_SESSION['logged'])){
            if(!$_SESSION['logged']){
                $islog=false;
                $but="onclick='golog()'";
            }
        }
        global $conn;
        $image_location="";
        if($Cat_id==1){
            $image_location='3d_abstract';
        }else if($Cat_id==2){
            $image_location='anime';
        }else if($Cat_id==3){
            $image_location='bike';
        }else if($Cat_id==4){
            $image_location='landscape';
        }else if($Cat_id==5){
            $image_location='girl';
        }
        $query="";
        if($Cat_id==0){
            if(empty($keyword)||$keyword==""||$keyword==null){
                $query="SELECT * FROM image";
            }else{
                $query="SELECT * FROM image WHERE Tag LIKE '%$keyword%'";
            }
        }else{
            if(empty($keyword)||$keyword==""||$keyword==null){
                $query="SELECT * FROM image WHERE Cat_id=$Cat_id";
            }else{
                $query="SELECT * FROM image WHERE Cat_id=$Cat_id AND Tag LIKE '%$keyword%'";
            }
        }
        $query_res=mysqli_query($conn,$query);
        if(!$query_res){
            die('show wallpaper by category failed.' .mysqli_error($conn));
        }
        while($row=mysqli_fetch_assoc($query_res)){
            $owner=$row['Owner'];
            $downNum=$row['DownNum'];
            $loveNum=$row['Like_count'];
            $cmtNum=$row['CmtNum'];
            $dateupload=$row['Date_upload'];
            $canBookmark=true;
            $canLove=true;
            $wallpaper=$row['Wallpaper'];
            $wallpaper_id=$row['ID'];
            $bmquery="select * from bookmark where b_wallid=$wallpaper_id";
            $lovequery="select * from love where wallpaper_id=$wallpaper_id";

            $bmres=mysqli_query($conn,$bmquery);
            if(!$bmres){
                die("bookmark fail ".mysqli_error($conn));
            }
            while($row=mysqli_fetch_assoc($bmres)){
                $bmuser_id=$row['b_userid'];
                if($bmuser_id==$current_user){
                    $canBookmark=false;
                    break;
                }
            }
            $bkmStyle="";
            if(!$canBookmark){
                $bkmStyle="style='background-color:red !important'";
            }

            $loveres=mysqli_query($conn,$lovequery);
            if(!$loveres){
                die("lovequery fail ".mysqli_error($conn));
            }
            while($row=mysqli_fetch_assoc($loveres)){
                $loveuser_id=$row['user_id'];
                if($loveuser_id==$current_user){
                    $canLove=false;
                    break;
                }
            }
            $loveclass="";
            if($canLove){
                $loveclass='class="cardbut btn purple c1"';
            }else{
                $loveclass='class="cardbut btn redz c1"';
            }
            $bmclass="";
            if($canBookmark){
                $bmclass='class="cardbut btn purple c2"';
            }else{
                $bmclass='class="cardbut btn redz c2"';
            }
            if($islog==false){
                $islog=0;
            }
            ?>
                <div class="col wall-card">
                    <button id="lovebut<?php echo $index2?>" onclick="love(<?php echo $islog ?>,<?php echo $current_user?>,<?php echo $wallpaper_id?>,this.id)"  <?php echo $loveclass?>>
                        <i class="material-icons">favorite_border</i>
                    </button>
                    <button id="bookbut<?php echo $index2?>" onclick="bookmark(<?php echo $islog ?>,<?php echo $current_user?>,<?php echo $wallpaper_id?>,this.id)"  <?php echo $bmclass?>>
                        <i class="material-icons">bookmark_border</i>
                    </button>
                    <a class="modal-trigger" href="download_dialog.php?ID=<?php echo $wallpaper_id?>" target="_blank"><img style="z-index:1 !important" src="images/<?php echo $wallpaper?>" class="z-depth-2 responsive-img card"></a>
                    <div class="info card">
                        <div style="text-align:center" class="row">
                            <div style="text-align:center" class="col s12">
                                <h5><?php echo $owner ?> <i style="font-size:12px">   <?php echo $dateupload?></i></h5>
                            </div>
                            
                            <div class="col s4"><i class="material-icons">file_download</i> <?php echo $downNum?></div>
                            <div class="col s4"><i class="material-icons">favorite_border</i><span id="countlovebut<?php echo $index2?>"> <?php echo $loveNum?></div>
                            <div class="col s4"><i class="material-icons">comment</i> <?php echo $cmtNum?></div>
                        </div>
                    </div>
                </div>
        <?php $index2=$index2+1;     
        }
    }


    $index3=0;
    function showBookMark(){
        global $index3;
        global $conn;
        $current_user=$_SESSION['user_id'];

        $query="SELECT * FROM bookmark WHERE b_userid=$current_user";
        $query_res=mysqli_query($conn,$query);
        if(!$query_res){
            die('show wallpaper by category failed.' .mysqli_error($conn));
        }
        
        while($row=mysqli_fetch_assoc($query_res)){
            
            $canBookmark=false;
            $canLove=true;
            // $wallpaper=$row['Wallpaper'];
            $wallpaper_id=$row['b_wallid'];
            $wall_q="select * from image where ID=$wallpaper_id";
            $wall_res=mysqli_query($conn,$wall_q);
            if(!$wall_res){
                die("wall_q fail ".mysqli_error($conn));
            }
            while($row=mysqli_fetch_assoc($wall_res)){
                $wallpaper=$row['Wallpaper'];
            }
            
            $lovequery="select * from love where wallpaper_id=$wallpaper_id";
            $bkmStyle="";
            if(!$canBookmark){
                $bkmStyle="style='background-color:red !important'";
            }

            $loveres=mysqli_query($conn,$lovequery);
            if(!$loveres){
                die("lovequery fail ".mysqli_error($conn));
            }
            while($row=mysqli_fetch_assoc($loveres)){
                $loveuser_id=$row['user_id'];
                if($loveuser_id==$current_user){
                    $canLove=false;
                    break;
                }
            }
            $loveclass="";
            if($canLove){
                $loveclass='class="cardbut btn purple c1"';
            }else{
                $loveclass='class="cardbut btn redz c1"';
            }
            $bmclass="";
            if($canBookmark){
                $bmclass='class="cardbut btn purple c2"';
            }else{
                $bmclass='class="cardbut btn redz c2"';
            }
            ?>
                <div class="col wall-card">
                    <button id="lovebut<?php echo $index3?>" onclick="love(1,<?php echo $current_user?>,<?php echo $wallpaper_id?>,this.id)"  <?php echo $loveclass?>>
                        <i class="material-icons">favorite_border</i>
                    </button>
                    <button id="bookbut<?php echo $index3?>" onclick="bookmark(1,<?php echo $current_user?>,<?php echo $wallpaper_id?>,this.id)"  <?php echo $bmclass?>>
                        <i class="material-icons">bookmark_border</i>
                    </button>
                    <a class="modal-trigger" href="download_dialog.php?ID=<?php echo $wallpaper_id?>" target="_blank"><img style="z-index:2 !important" src="images/<?php echo $wallpaper?>" class="z-depth-2 responsive-img card"></a>
                </div>
        <?php $index3=$index3+1;     
        }
    }

    function uploadedCount($user_id){
        global $conn;
        $res=mysqli_query($conn,"select user.upload_count from user where user_id=$user_id");
        if(!$res){
            die("find upcount fail ".mysqli_error($conn));
        }
        $row=mysqli_fetch_assoc($res);
        $upload_count=$row['upload_count'];
        return $upload_count;
    }

    $index4=0;
    function showWallByPlusOption($option,$islog){
        global $index4;
        global $conn;
        $current_user=-100;
        if(isset($_SESSION['user_id'])){
            $current_user=$_SESSION['user_id'];
        }
        if($option=="down"){
            $query="SELECT * FROM image ORDER BY DownNum DESC LIMIT 5";
        }else if($option=="love"){
            $query="SELECT * FROM image ORDER BY Like_count DESC LIMIT 5";
        }else if($option=="cmt"){
            $query="SELECT * FROM image ORDER BY CmtNum DESC LIMIT 5";
        }
        
        $query_res=mysqli_query($conn,$query);
        if(!$query_res){
            die('show wallpaper by category failed.' .mysqli_error($conn));
        }
        
        while($row=mysqli_fetch_assoc($query_res)){
            $owner=$row['Owner'];
            $downNum=$row['DownNum'];
            $loveNum=$row['Like_count'];
            $cmtNum=$row['CmtNum'];
            $dateupload=$row['Date_upload'];
            $canBookmark=true;
            $canLove=true;
            $wallpaper=$row['Wallpaper'];
            $wallpaper_id=$row['ID'];
            $bmquery="select * from bookmark where b_wallid=$wallpaper_id";
            $lovequery="select * from love where wallpaper_id=$wallpaper_id";

            $bmres=mysqli_query($conn,$bmquery);
            if(!$bmres){
                die("bookmark fail ".mysqli_error($conn));
            }
            while($row=mysqli_fetch_assoc($bmres)){
                $bmuser_id=$row['b_userid'];
                if($bmuser_id==$current_user){
                    $canBookmark=false;
                    break;
                }
            }
            $bkmStyle="";
            if(!$canBookmark){
                $bkmStyle="style='background-color:red !important'";
            }

            $loveres=mysqli_query($conn,$lovequery);
            if(!$loveres){
                die("lovequery fail ".mysqli_error($conn));
            }
            while($row=mysqli_fetch_assoc($loveres)){
                $loveuser_id=$row['user_id'];
                if($loveuser_id==$current_user){
                    $canLove=false;
                    break;
                }
            }
            $loveclass="";
            if($canLove){
                $loveclass='class="cardbut btn purple c1"';
            }else{
                $loveclass='class="cardbut btn redz c1"';
            }
            $bmclass="";
            if($canBookmark){
                $bmclass='class="cardbut btn purple c2"';
            }else{
                $bmclass='class="cardbut btn redz c2"';
            }
            if($islog==false){
                $islog=0;
            }
            ?>
                <div class="col wall-card">
                    <button id="lovebut<?php echo $index4?>" onclick="love(<?php echo $islog ?>,<?php echo $current_user?>,<?php echo $wallpaper_id?>,this.id)"  <?php echo $loveclass?>>
                        <i class="material-icons">favorite_border</i>
                    </button>
                    <button id="bookbut<?php echo $index4?>" onclick="bookmark(<?php echo $islog ?>,<?php echo $current_user?>,<?php echo $wallpaper_id?>,this.id)"  <?php echo $bmclass?>>
                        <i class="material-icons">bookmark_border</i>
                    </button>
                    <a class="modal-trigger" href="download_dialog.php?ID=<?php echo $wallpaper_id?>" target="_blank"><img style="z-index:1 !important" src="images/<?php echo $wallpaper?>" class="z-depth-2 responsive-img card"></a>
                    <div class="info card">
                        <div style="text-align:center" class="row">
                            <div style="text-align:center" class="col s12">
                                <h5><?php echo $owner ?> <i style="font-size:12px">   <?php echo $dateupload?></i></h5>
                            </div>
                            
                            <div class="col s4"><i class="material-icons">file_download</i> <?php echo $downNum?></div>
                            <div class="col s4"><i class="material-icons">favorite_border</i> <span id="countlovebut<?php echo $index4?>"> <?php echo $loveNum?></div>
                            <div class="col s4"><i class="material-icons">comment</i> <?php echo $cmtNum?></div>
                        </div>
                    </div>
                </div>
        <?php $index4=$index4+1;     
        }
    }


    function getImageInfo($wallpaper_id){
        global $conn;
        $query="select * from image where ID=$wallpaper_id";
        $res=mysqli_query($conn,$query);
        if(!$res){
            die("fail in find wallpaper");
        }else{
            while($row=mysqli_fetch_assoc($res)){
                $numlove= $row['Like_count'];
            }
        }
        return $numlove;
    }

    $index5=0;
    function showWallpaperByOwner($owner,$islog){
        global $index5;
        global $conn;
        $current_user=-100;
        if(isset($_SESSION['user_id'])){
            $current_user=$_SESSION['user_id'];
        }
        $query="select * from image where Owner='$owner'";
        
        $query_res=mysqli_query($conn,$query);
        if(!$query_res){
            die('show wallpaper by owner failed.' .mysqli_error($conn));
        }
        
        while($row=mysqli_fetch_assoc($query_res)){
            $owner=$row['Owner'];
            $downNum=$row['DownNum'];
            $loveNum=$row['Like_count'];
            $cmtNum=$row['CmtNum'];
            $cat_id= $row["Cat_ID"];
            $cat_name = getCateNameById($cat_id);
            $dateupload=$row['Date_upload'];
            $canBookmark=true;
            $canLove=true;
            $wallpaper=$row['Wallpaper'];
            $wallpaper_id=$row['ID'];
            $bmquery="select * from bookmark where b_wallid=$wallpaper_id";
            $lovequery="select * from love where wallpaper_id=$wallpaper_id";

            $bmres=mysqli_query($conn,$bmquery);
            if(!$bmres){
                die("bookmark fail ".mysqli_error($conn));
            }
            while($row=mysqli_fetch_assoc($bmres)){
                $bmuser_id=$row['b_userid'];
                if($bmuser_id==$current_user){
                    $canBookmark=false;
                    break;
                }
            }
            $bkmStyle="";
            if(!$canBookmark){
                $bkmStyle="style='background-color:red !important'";
            }

            $loveres=mysqli_query($conn,$lovequery);
            if(!$loveres){
                die("lovequery fail ".mysqli_error($conn));
            }
            while($row=mysqli_fetch_assoc($loveres)){
                $loveuser_id=$row['user_id'];
                if($loveuser_id==$current_user){
                    $canLove=false;
                    break;
                }
            }
            $loveclass="";
            if($canLove){
                $loveclass='class="cardbut btn purple c1"';
            }else{
                $loveclass='class="cardbut btn redz c1"';
            }
            $bmclass="";
            if($canBookmark){
                $bmclass='class="cardbut btn purple c2"';
            }else{
                $bmclass='class="cardbut btn redz c2"';
            }
            if($islog==false){
                $islog=0;
            }
            ?>
                <div class="col wall-card">
                    <button id="lovebut<?php echo $index5?>" onclick="love(<?php echo $islog ?>,<?php echo $current_user?>,<?php echo $wallpaper_id?>,this.id)"  <?php echo $loveclass?>>
                        <i class="material-icons">favorite_border</i>
                    </button>
                    <button id="bookbut<?php echo $index5?>" onclick="bookmark(<?php echo $islog ?>,<?php echo $current_user?>,<?php echo $wallpaper_id?>,this.id)"  <?php echo $bmclass?>>
                        <i class="material-icons">bookmark_border</i>
                    </button>
                    <a class="modal-trigger" href="/download?ID=<?php echo $wallpaper_id?>" target="_blank"><img style="z-index:1 !important" src="images/category/<?php echo $cat_name . "/" . $wallpaper?>" class="z-depth-2 responsive-img card"></a>
                    <div class="info card">
                        <div style="text-align:center" class="row">
                            <div style="text-align:center" class="col s12">
                                <h5><?php echo $owner ?>  <i style="font-size:12px">   <?php echo $dateupload?></i></h5>
                            </div>
                            
                            <div class="col s4"><i class="material-icons">file_download</i> <?php echo $downNum?></div>
                            <div class="col s4"><i class="material-icons">favorite_border</i> <span id="countlovebut<?php echo $index5?>"> <?php echo $loveNum?></div>
                            <div class="col s4"><i class="material-icons">comment</i> <?php echo $cmtNum?></div>
                        </div>
                    </div>
                </div>
        <?php $index5=$index5+1;     
        }
    }

?>


