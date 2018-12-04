<?php 
include "includes/header.php";
?>
<body>
    <div id="wrapper">
        <!-- Navigation -->
        <?php
        include "includes/navigation.php";
        ?>
        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            WELLCOME TO DASHBOARD
                            <?php if(isset($_SESSION['username'])){ ?>
                            <h2><?php echo $_SESSION['username']; ?></h2>
                            <?php } ?>
                        </h1>
                    </div>
                    <div class="col-xs-12">
                        <img src="../images/es.jpg" alt="" class="img-responsive">
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
