<?php include"include/header.php";
    $avatar=$_SESSION['avatar'];
    $username=$_SESSION['username'];
    $about=$_SESSION['about'];
    $fullname=$_SESSION['fullname'];
    $gender=$_SESSION['gender'];
    $email=$_SESSION['email'];
    $birthday=$_SESSION['birthday'];

if(isset($_GET['user_id'])){
    $user_id=(int)$_GET['user_id'];
    $query="SELECT * FROM cms.user WHERE user_id=$user_id";
    $query_res=mysqli_query($conn,$query);
    if(!$query_res){
        die("Find user failed ".mysqli_error($conn));
    }
    while($row=mysqli_fetch_assoc($query_res)){
        $avatar=$row['avatar'];
        $username=$row['username'];
        $about=$row['about'];
        $fullname=$row['fullname'];
        $gender=$row['gender'];
        $email=$row['email'];
        $birthday=$row['birthday'];
    }
    
}

?>
<body>
    <!-- Modal Structure -->
  <div id="modal1" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h4>Modal Header</h4>
      <p>A bunch of text</p>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-close waves-effect waves-green btn btn-flat">Agree</a>
    </div>
  </div>

<header>
<div id="dropdown1" class="dropdown-content" style="width: 300px !important;">
    <ul>
        <li><a href="#!" style="font-weight: bolder" data-target="A">Most Download</a></li>
        <li><a href="#!" style="font-weight: bolder" data-target="B">Most Favourite</a></li>
        <li><a href="#!" style="font-weight: bolder" data-target="C">Most Comment</a></li>
    </ul>
</div>
<div class="navbar-fixed">
    <nav id="top-nav" role="navigation">
        <div class="nav-wrapper mynav row mynavres" id="mynav">

            <!-- Logo area -->

            <div class="col s3 sitelogo" style="padding-left:40px">
                <img id="fox-logo" src="logo/Fox.png" alt="foxwallpaper" class="brand-logo responsive-img">
                <a id="main-logo" href="index.php" class="brand-logo">FoxWallpaper</a>
            </div>

            <div class="col s3">
                <div class="searchuser" autocomplete:off>
                    <form id="search-user" onsubmit="abc()"  action="#">
                        <div class="input-field" autocomplete:off>
                        <input id="search" type="search" required>
                        <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                        <i class="material-icons">close</i>
                        </div>
                       
                    </form>
                    <script>
                        function abc () {
                            $.ajax({
                                type:"post",
                                url:"http://localhost/LTW/include/search_user.php",
                                data:{
                                    username:$("#search").val()
                                },
                                success:function(result){
                                    window.location.href = "http://localhost/ltw/profile.php?user_id="+String(result);
                                    }
                                })
                         }
                    </script>
            </div>
                
            </div>

            <!-- Sidenav trigger button -->
            <a href="#" data-target="mobile-demo" class="icon sidenav-trigger"><i id="bars" class="material-icons">menu</i></a>
            


            <div class="col s6 right hide-on-med-and-down" id="logz" style="text-align:center">
                <!-- <a class='dropdown-trigger btn waves-effect waves-light mybutton'id="nav_catbtn" href='#' data-target='dropdown2'>Category</a> -->
                <!-- Login/sign up area -->
                <!-- <a class='dropdown-trigger ccc btn mybutton' href='#' data-target='dropdown1'>Category</a> -->
                <a class="mybutton waves-effect waves-light btn" href="logout.php"><b>Log out</b></a>
                <a class="mybutton waves-effect waves-light btn" href="index.php"><b>Home</b></a>

            </div>
            <div class="tap-target" data-target="discovery">
                <div class="tap-target-content">
                    <h3>Wellcome to FoxWallpaper</h3>
                    <h6>Thanks for visting us,donate <a href="https://i.kym-cdn.com/entries/icons/original/000/000/091/TrollFace.jpg">HERE</a> </h6>
                </div>
            </div>
            
            <!-- EDIT PROFILE -->
                    <div class="fixed-action-btn">
                        <a class="btn-floating btn-large red">
                            <i class="large material-icons">mode_edit</i>
                        </a>
                        <ul>
                            <li><a href="#" class="fullscreen btn-floating black"><i class="material-icons">fullscreen</i></a></li>
                            <li><a href="profile.php" class="btn-floating red"><i class="material-icons">face</i></a></li>
                            <li><a href="collection.php" class="btn-floating yellow darken-1"><i class="material-icons">collections</i></a></li>
                            <li><a href="upload.php" class="btn-floating green"><i class="material-icons">publish</i></a></li>
                            <li><a href="login.php?logout=1" class="btn-floating blue"><i class="material-icons">exit_to_app</i></a></li>
                        </ul>
                    </div>
        </div>
    </nav>
</div>
<ul class="sidenav" style="background-color:#2a0d4566" id="mobile-demo">
    <li><a class='dropdown-trigger btn mybutton' href='#' data-target='dropdown1'>Category</a></li>
    <li><a class="mybutton waves-effect waves-light btn" href="logout.php"><b>Log out</b></a></li>
</ul>
        <!-- Tab area -->
        
</header>
<main>
    <div class="container">
        <div class="row ">
            <div class="col s12 m6 about_card">
                <div class="card">
                    <div class="card-image">
                        <img src="images/avatar/<?php echo $avatar?>">
                        <div class="usr card-title"><b><?php echo $username?></b></div>
                        <a href="#modal1" class="btn-floating halfway-fab waves-effect modal-trigger waves-light red"><i class="material-icons">edit</i></a>
                    </div>
                    <div class="card-content ccprofile">
                        <h4>About me</h4>
                        <p><?php echo $about?></p>
                    </div>
                </div>
            </div>
            
            <div class="row ">
                <div class="col s12 m5 ">
                    <div class="card-panel">
                        <p><i class="material-icons">face</i> Name: <?php echo $fullname?></p>
                        <div class="divider"></div>
                        <p><i class="material-icons">wc</i> Gender: <?php echo $gender?></p>
                        <div class="divider"></div>
                        <p><i class="material-icons">email</i> Email: <?php echo $email?></p>
                        <div class="divider"></div>
                        <p><i class="material-icons">date_range</i> Birthday: <?php echo $birthday?></p>
                    </div>
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