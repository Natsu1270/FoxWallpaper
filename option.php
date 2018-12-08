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