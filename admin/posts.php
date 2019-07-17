<?php 
include "include/header.php";
//include "util.php";
?>
<body>
    <div id="wrapper">
        <!-- Navigation -->
        <?php
        include "include/navigation.php";
        ?>
        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Wallpaper Manager
                        </h1>
                        <div class="col-xs-12">
                            <?php
                            if(isset($_GET['source'])){
                                $source=$_GET['source'];
                            }else{
                                $source='';
                            }
                            switch($source){
                                case 'add_post':
                                    include "include/add_post.php";break;
                                case 'edit_post':
                                    include "include/edit_post.php";break;
                                default:
                                include "include/view_posts.php";
                                break;
                            }
?>
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
