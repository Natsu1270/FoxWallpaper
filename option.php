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
    <header>
        <?php include"include/navbar.php" ?>
    </header>
    <div class="preloader-background">
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
    </div>
    <main>
        <div class="content">
            <?php include"include/searchposter.php" ?>
            <!-- Tab area category-->
            <div class="tabmenu">
                <ul class="tabs tabs-fixed-width" style="background-color:#5e308a">
                    <li class="tab col s2"><a class="active" href="#mostdown">Most Download</a></li>
                    <li class="tab col s2"><a href="#mostlove">Most Favourite</a></li>
                    <li class="tab col s2"><a href="#mostcmt">Most Comment</a></li>
                    
                </ul>
            </div>
            <!-- Display wallpaper here -->
            <div id="mostdown" class="mostdown cat_wall">
                
                <?php showWallByPlusOption("down",$islog);?>

            </div>

        <div id="mostlove" class="mostlove cat_wall card">
            <?php showWallByPlusOption("love",$islog);?>
        </div>

        <div id="mostcmt" class="mostcomt cat_wall card">
            <?php showWallByPlusOption("cmt",$islog); ?>
        </div>
        
        </div>
    </main>
    <footer class="page-footer">
        <?php include"include/footer.php" ?>
    </footer>
</body>

</html>