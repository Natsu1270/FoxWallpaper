<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a style="margin-top:10px;display: block" class="navbar-brand" href="index.php">Admin</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <a  style="margin-top:12px;margin-left:0px;margin-right:10px;width:100px" href="../login.php?logout=1" class="btn btn-primary" >
                    <b>Log out</b>
                </a>
                <a href="../" style="margin-top:12px;margin-left:20px;margin-right:40px"  class="btn btn-danger"><b>Home Page</b></a>

                <?php if(isset($_SESSION['username'])){
                    $admin=$_SESSION['username'];
                }else{
                    $admin="";
                } ?>
                
                
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#posts_dd"><i class="fa fa-fw fa-arrows-v"></i> Images <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="posts_dd" class="collapse">
                            <li>
                                <a href="posts.php?source=add_post">Add Image</a>
                            </li>
                            <li>
                                <a href="posts.php">View Images</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="../admin/categories.php"><i class="fa fa-fw fa-wrench"></i> Categories</a>
                    </li>
                    <li class="active">
                        <a href="comments.php"><i class="fa fa-fw fa-file"></i> Comments</a>
                    </li>
                   
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Users <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="users.php?source=add_user">Add User</a>
                            </li>
                            <li>
                                <a href="users.php">All users</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="index-rtl.html"><i class="fa fa-fw fa-dashboard"></i> Profile</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>