<?php 
include "include/database_connect.php";
include "include/admin/header.php";
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
                           Category Manager
                            <small>Natsu</small>
                        </h1>
                        <div class="col-xs-6">
                        <?php
                        if($_SERVER['REQUEST_METHOD']=='GET'){
                            if(isset($_GET['id'])){
                                delete();
                            }
                             
                        }else{
                            if(isset($_POST['submit'])){
                                add();
                            }
                        }
                        ?>  
                                <form action="" method="post">
                                    <div class="form-group">
                                        <label for="addcat"> <h3>Add a category</h3></label>
                                        <input type="text" name="cat" id="cat" class="form-control" placeholder="Enter category name...">
                                    </div>
                                        <input type="submit" name="submit" value="Add category" class="btn btn-info">
                                        
                                    <div class="form-group"></div>
                                </form>

                                <form action="" method="post">
                                    <div class="form-group">
                                        <label for="editcat"> <h3>Edit a category</h3></label>
                                        <?php
                                        if(isset($_GET['edit'])){
                                            $id=(int)$_GET['edit'];
                                            $edit_query="select * from category where id=$id";
                                            $edit_res=mysqli_query($conn,$edit_query);
                                            while($row=mysqli_fetch_assoc($edit_res)){
                                                $cat_id=$row['id'];
                                                $cat_title=$row['title'];
                                                $old_name = $row['title'];
                                                ?>
                                        <input value="<?php if(isset($cat_id)){echo $cat_id;}?>" type="text" name="new_id" id="cat" class="form-control" placeholder="Enter new id...">
                                        <input value="<?php if(isset($cat_title)){echo $cat_title;}?>" type="text" name="new_title" id="cat" class="form-control" placeholder="Enter category name...">
                                        

                                        <?php                    
                                            }}?>
                                        <?php
                                        if(isset($_POST['edit'])){
                                            $cat_title=$_POST['new_title'];
                                            $cat_id=$_POST['new_id'];
                                            $query="update category set title='$cat_title',id='$cat_id' where id=$id";
                                            $edit_res=mysqli_query($conn,$query);
                                            if(!$edit_res){
                                                die("Query failed");
                                            }else{
                                                if (is_dir('images/category/' . $old_name)) {
                                                    rename('images/category/' . $old_name,'images/category/' . $cat_title);
                                                }
                                            }
                                        }

                                        ?>

                                    </div>
                                        <?php if(isset($_GET['edit'])){
                                              echo '<input id="editcat" type="submit" name="edit" value="Edit category" class="btn btn-info">';
                                        }?>
                                        
                                    <div class="form-group"></div>
                                </form>
                                <button id="show" class="btn btn-warning ">Show</button>
                                <script>
                                $(document).ready(function(){
                                    $('#show').on('click',function(){
                                        $('.table').fadeToggle();
                                    })
                                })
                                
                                </script>
                                </div>
                        <div class="col-xs-6">
                            <table class="table table-bordered table-hover table-striped">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">TITLE</th>
                                        <th scope="col">ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                <?php findAllCat(); ?>
                                </tbody>
                            </table>
                        
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
