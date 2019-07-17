<?php include"include/header.php" ?>
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
            <div class="row">
                <div class="col s12">
                    <h3 style="color:purple !important;font-family:'Righteous', cursive;">Your Collection</h3>
                </div>
                <div class="col s12">
                    <div class="catwall">
                        <?php showBookMark() ?>
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