<?php include"include/header.php";
    $islog=true;
if(!isset($_SESSION['logged'])){
    $islog=false;
}else{
    if(!$_SESSION['logged']){
        $islog=false;
    }
}
?>

<body>
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
    
    <header>
        <?php include"include/navbar.php" ?>
    </header>

    <main>
        <div class="content">
            <?php include"include/searchposter.php" ?>
            <!-- Tab area category-->
            <div class="tabmenu">
                <ul class="tabs tabs-fixed-width" style="background-color:#5e308a">
                <?php $categories = json_decode(getAllCategory(),true);
                    for( $i=0 ; $i<count($categories) ; ++$i){
                        $title = $categories[$i]["title"];
                        echo "<li class = 'tab col s2'><a href='#$title'>$title</a></li>";
                    }
                ?>
                </ul>
            </div>
            <!-- Display wallpaper here -->
            <?php for ($i = 0 ; $i < count($categories) ; ++$i){
                $title = $categories[$i]["title"];
                $cate_id = $categories[$i]["id"];
                echo "<div id='$title' class='$title cat_wall card'>";
                    showWallByCate($cate_id,$islog);
                echo "</div>";
            }
            ?>
        </div>
    </main>
    <footer class="page-footer">
        <?php include"include/footer.php" ?>
    </footer>
</body>

</html>