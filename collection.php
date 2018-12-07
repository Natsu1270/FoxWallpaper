<?php include"include/header.php" ?>
<body>
    <header>
        <?php include"include/navbar.php" ?>
    </header>

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