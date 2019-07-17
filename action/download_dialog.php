<?php include"include/header.php";
    $download_path="";
    if(isset($_GET['ID'])){
        $wallpaper_id=(int)$_GET['ID'];
        $query="select * from image where ID=$wallpaper_id";
        $query_res=mysqli_query($conn,$query);
        if(!$query_res){
            die("get image failed ".mysqli_error($conn));
        }
        while($row=mysqli_fetch_assoc($query_res)){
            $wallpaper=$row['Wallpaper'];
            $Cat_ID=$row['Cat_ID'];
            $Owner=$row['Owner'];
            $DownNum=$row['DownNum'];
            $Like_count=$row['Like_count'];
            $CmtNum=$row['CmtNum'];
            $Date_upload=$row['Date_upload'];
            $Tag=$row['Tag'];
        }
        $download_path="images/$wallpaper";
        $query="select * from user where username='$Owner'";
        $query_res=mysqli_query($conn,$query);
        if(!$query_res){
            die("get userid failed ".mysqli_error($conn));
        }
        while($row=mysqli_fetch_assoc($query_res)){
            $user_id=$row['user_id'];
            $user_ava=$row['avatar'];
            $fullname=$row['fullname'];
            $ownername=$row['username'];
        }
    }
?>

<body>
    <header>
        <?php include"include/navbar.php" ?>
        <!-- Tab area -->
    </header>
    <!-- <div class="preloader-background">
        <div class="preloader-wrapper big active">
        <div class="spinner-layer spinner-blue">
            <div class="circle-clipper left">
            <div class="circle"></div>
            </div><div class="gap-patch">
            <div class="circle"></div>
            </div><div class="circle-clipper right">
            <div class="circle"></div>
            </div>
        </div>
        </div>
    </div> -->
    <main>
        <div class="container">
            <div class="row">
                <div class="col s8">
                    <div class="row dwnwallsite">
                        <div class="card col s12">
                            <div class="card-image waves-effect waves-block waves-light">
                                <img class="activator" src="images/<?php echo $wallpaper?>">
                            </div>
                            <div class="card-content">
                                <span class="card-title activator grey-text text-darken-4">Click to comment<i class="material-icons right">more_vert</i></span>
                                <p><a class="btn red" style="color:white !important" href="#"><i class="material-icons prefix">bookmark</i></a></p>
                            </div>
                            <div class="card-reveal">
                                <span class="card-title grey-text text-darken-4">Comment<i class="material-icons right">close</i></span>
                                <form method="post" id="cmt-form" action="include/comment_process.php?id=<?php echo $wallpaper_id?>">
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <i class="material-icons prefix">mode_comment</i>
                                            <input name="content" id="input_text" type="text" data-length="200">
                                        </div>
                                        <div class="input-field col s12">
                                            <input type="submit" class="btn mybtn" value="Send" name="comment">
                                            <button type="reset" class="btn">Clear</button>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                        
                        <div class=" card col s12">
                            
                            <h5 style="color:purple !important"><b>Related Wallpapers</b></h5>
                           
                            <div class="carousel">
                                <?php
                                $searchString=",";
                                if( strpos($Tag, $searchString) !== false){
                                    $tagarr=explode(",",$Tag);
                                    $keyword=$tagarr[0];
                                }else{
                                    $keyword=$Tag;
                                } 
                                echo $keyword;
                                $query="SELECT * FROM image WHERE Tag LIKE '%$keyword%' AND ID!=$wallpaper_id LIMIT 5";
                                $relate=mysqli_query($conn,$query);
                                if(!$relate){
                                    die("find relate failed ".mysqli_error($conn));
                                }
                                while($row=mysqli_fetch_assoc($relate)){
                                    $wall_id=$row['ID'];
                                    $wallpaper=$row['Wallpaper'];
                                    echo "<a class='carousel-item' href='http://localhost:8000/download_dialog.php?ID=$wall_id'><img src='http://localhost:8000/images/$wallpaper'></a>";
                                }
                            ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col s4">
                    <div class="card-panel  z-depth-1">
                        <div class="row">
                            <div class="col s2">
                                <!-- notice the "circle" class -->
                                <a href="/profile?user_id=<?php echo $user_id?>"><img style="height:50px !important;width:50px !important"
                                        src="images/avatar/<?php echo $user_ava?>" alt="" class="circle downavatar"></a>
                            </div>
                            <div class="col s10">
                                <span class="black-text">
                                    <a id="downOwner" href="/profile?user_id=<?php echo $user_id?>">
                                        <?php echo $fullname ?></a>
                                   
                                </span>
                            </div>
                            <div style="text-align:center" class="col s12">
                                <a style="text-decoration:underline" href="/uploaded?name=<?php echo $ownername?>"><span class="white-text"><?php echo uploadedCount($user_id)?> wallpapers</span></a>
                            </div>
                        </div>
                    </div>

                    <div class="card downarea">
                        <div class="card-content white-text downcard_content">
                            <div class="row">

                                <div class="col s12" style="margin-bottom: 20px;">
                                    <a onclick="downNum(<?php echo $wallpaper_id?>)" href="<?php echo $download_path?>"
                                        download class="btn green card"><b>Free Download</b></a>
                                </div>
                                <div class="col s4">
                                    <a href="" class="btn blue"><i class="material-icons">favorite</i></a>
                                    <p id="dd<?php echo $wallpaper_id?>">
                                        <?php echo $Like_count ?>
                                    </p>
                                </div>
                                <div class="col s4">
                                    <a href="#" class="btn blue"><i class="material-icons">cloud_download</i></a>
                                    <p id="dwnNum">
                                        <?php echo $DownNum ?>
                                    </p>
                                </div>
                                <div class="col s4">
                                    <a href="" class="btn blue"><i class="material-icons">comment</i></a>
                                    <p>
                                        <?php echo $CmtNum ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card commentarea">
                        <div class="card-footer" style="text-align:center;background-color:#5e308a;padding:1px">
                            <h5 style="color:white !important">COMMENTS</h5>
                        </div>
                        <div style="background: #ddb9ff !important" class="card-content white-text">

                            <div class="row">
                                <?php $query="select * from comment where wallpaper_id=$wallpaper_id order by date DESC";
                                  $find=mysqli_query($conn,$query);
                                  if(!$find){
                                      die("find cmt failed ". mysqli_error($conn));
                                  }
                                  while($row=mysqli_fetch_assoc($find)){
                                      $content=$row['content'];
                                      $user_cmt=$row['user_id'];
                                      $username_cmt=$row['username'];
                                      $cmt_time=$row['date'];
                                    ?>
                                <div class="card-panel col s12 z-depth-1">

                                    <div class="row">
                                        <div class="col s6">
                                            <a href="/profile?user_id=<?php echo $user_cmt?>">
                                                <?php echo $username_cmt?>:</a>
                                        </div>

                                        <div style="background:#00000078" class="col s12">
                                            <span style="font-size:20px" class="white-text">
                                                <?php echo $content ?>
                                            </span>

                                        </div>
                                        <div class="col s12" style="text-align: right !important">
                                            <span style="text-align:right !important;font-size:10px" class="white-text">
                                                <?php echo $cmt_time ?>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <?php }?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer class="page-footer">
        <?php include"include/footer.php" ?>
    </footer>

</body>

</html>