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
                    <li class="tab col s2"><a class="active" href="#3d">3D Abstract</a></li>
                    <li class="tab col s2"><a href="#anime">Anime</a></li>
                    <li class="tab col s2"><a href="#bike">Bike</a></li>
                    <li class="tab col s2"><a href="#landscape">Landscape</a></li>
                    <li class="tab col s2"><a href="#girl">Girl</a></li>
                </ul>
            </div>
            <!-- Display wallpaper here -->
            <div id="3d" class="3d cat_wall">

                <?php showWallByCate(1,$islog);?>

            </div>

        <div id="anime" class="anime cat_wall card">
            <?php showWallByCate(2,$islog);?>
        </div>

        <div id="bike" class="bike cat_wall card">
            <?php showWallByCate(3,$islog); ?>
        </div>
        <div id="landscape" class="anime cat_wall card">
            <?php showWallByCate(4,$islog); ?>
        </div>

        <div id="girl" class="girl cat_wall card">
            <?php showWallByCate(5,$islog); ?>
        </div>

        </div>
    </main>
    <footer class="page-footer">
        <?php include"include/footer.php" ?>
    </footer>
</body>

</html>