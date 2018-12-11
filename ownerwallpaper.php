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
                            <span class="card-title"><h3 style="color:white !important">Wallpapers of:
                                <?php if(isset($_GET['name'])){
                                    $username=$_GET['name'];
                                    echo $_GET['name'];
                                    }?></h3>
                            </span>
                            
                        </div>
                        <div class="card-action">
                            <a class="btn" href="index.php">Home</a>

                        </div>
                    </div>
                </div>
            </div>
            
            <div class="divider"></div>
            <div class="section ">
                <div class="cat_wall card">
                    <?php showWallpaperByOwner($username,$islog) ?>
                </div>
            </div>
        </div>
    </main>
    <footer class="page-footer">
        <?php include"include/footer.php" ?>
    </footer>

</body>
</html>