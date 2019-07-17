<?php include"include/header.php";

?>
<?php if(isset($_GET['submit'])){
    $Cat_id=(int)$_GET['cat_id'];
    $keyword=$_GET['searchinput'];
    $non_search="";
    if($Cat_id==0){
        $non_search="All";
    }else if($Cat_id==1){
        $non_search="3D Abstract";
    }else if($Cat_id==2){
        $non_search="Anime";
    }else if($Cat_id==3){
        $non_search="Bike";
    }else if($Cat_id==4){
        $non_search="Landscape";
    }else{
        $non_search="Girl";
    }
}
?>

<body>
    <header>
        <?php include"include/navbar.php" ?>
        <!-- Tab area -->
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
            <div class="row">
                <div class="col s12 m6" >
                    <div class="card purple darken-3" style="margin-top:40px !important;">
                        <div class="card-content white-text" >
                            <span class="card-title"><h3 style="color:white !important">Wallpapers for:
                                <?php if(isset($_GET['searchinput'])){
                                    $search=$_GET['searchinput'];
                                    if($search==""||$search==null||empty($search)){
                                        echo $non_search;
                                    }else{
                                        echo $_GET['searchinput'];
                                    }
                                    }?></h3>
                            </span>
                            <p style="color:white !important"><?php echo resultCount($Cat_id,$keyword)?> results</p>
                        </div>
                        <div class="card-action">
                            <a class="btn" href="/">Home</a>

                        </div>
                    </div>
                </div>
            </div>
            
            <div class="divider"></div>
            <div class="section ">
                <div class="cat_wall card">
                    <?php findWall($Cat_id,$keyword)  ?>
                </div>
            </div>
        </div>
    </main>
    <footer class="page-footer">
        <?php include"include/footer.php" ?>
    </footer>

</body>
</html>