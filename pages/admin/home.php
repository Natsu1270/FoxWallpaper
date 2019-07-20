<?php
include "include/database_connect.php";
include "include/admin/header.php";
include_once 'google-api-php-client/vendor/autoload.php';
include_once "driveapi/base.php";
?>

<body>
    <div id="wrapper">
        <!-- Navigation -->
        <?php
        include "include/admin/navigation.php";
        ?>
        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            WELLCOME TO DASHBOARD
                        </h1>
                    </div>
                    <div class="col-xs-12">
                        <h2>FoxWallpaper metrics:</h2>
                        <div class="chart">
                            <div class="metric col-4" style="width: 18rem;">
                                <img class="card-img-top" src="images/admin/user.png"  alt="Card image cap">
                                <div class="card-body">
                                    <h3 class="card-title">User: <?php echo metric()['user_count']?></h3>
                                    <p class="card-text"></p>
                                    <a href="admin-users" class="btn btn-danger">View</a>
                                    <a href="admin-users?source=add_user" class="btn btn-danger">Add</a>
                                </div>
                            </div>

                            <div class="metric col-4" style="width: 18rem;">
                                <img class="card-img-top" src="images/admin/wallpaper.jpg" alt="Card image cap">
                                <div class="card-body">
                                    <h3 class="card-title">Wallpaper: <?php echo metric()['img_count']?></h3>
                                    <p class="card-text"></p>
                                    <a href="admin-posts" class="btn btn-danger">View</a>
                                    <a href="admin-posts?source=add_post" class="btn btn-danger">Add</a>
                                </div>
                            </div>

                            <div class="metric col-4" style="width: 18rem;">
                                <img class="card-img-top" src="images/admin/cmt.png" alt="Card image cap">
                                <div class="card-body">
                                    <h3 class="card-title">Comment: <?php echo metric()['cmt_count']?></h3>
                                    <p class="card-text"></p>
                                    <a href="admin-comment" class="btn btn-danger">Manage</a>
                                    
                                </div>
                            </div>

                            <div class="metric col-4" style="width: 18rem;">
                                <img class="card-img-top" src="images/admin/category.png" alt="Card image cap">
                                <div class="card-body">
                                    <h3 class="card-title">Category: <?php echo metric()['category_count']?></h3>
                                    <p class="card-text"></p>
                                    <a href="admin-category" class="btn btn-danger">Manage</a>
                                    
                                </div>
                            </div>

                        </div>
                        
                        
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
</body>

</html>