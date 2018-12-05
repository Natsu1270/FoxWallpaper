<?php include"include/header.php";

?>
<?php if(isset($_GET['submit'])){
    $Cat_id=(int)$_GET['cat_id'];
    $keyword=$_GET['searchinput'];
}
?>

<body>
    <header>
        <?php include"include/navbar.php" ?>
        <!-- Tab area -->
    </header>
    <main>
        <div class="content">
            <div class="row">
                <div class="col s12 m6" >
                    <div class="card purple darken-3" style="margin-top:40px !important;">
                        <div class="card-content white-text" >
                            <span class="card-title"><h3>Wallpapers for:
                                <?php if(isset($_GET['searchinput'])){echo $_GET['searchinput'];}?></h3>
                            </span>
                            <p><?php echo resultCount($Cat_id,$keyword)?> results</p>
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