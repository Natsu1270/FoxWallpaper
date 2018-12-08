<?php include"include/header.php";
    
$ownpage=true;
if(isset($_GET['user_id'])){
    $user_id=(int)$_GET['user_id'];
    if(isset($_SESSION['logged'])&&$_SESSION['logged']){
        if($user_id!=$_SESSION['user_id']){
            $ownpage=false;
        }
    }else{
        $ownpage=false;
    }
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
    
}else{
    $user_id=$_SESSION['user_id'];
    $avatar=$_SESSION['avatar'];
    $username=$_SESSION['username'];
    $password=$_SESSION['password'];
    $about=$_SESSION['about'];
    $fullname=$_SESSION['fullname'];
    $gender=$_SESSION['gender'];
    $email=$_SESSION['email'];
    $birthday=$_SESSION['birthday'];
    $ownpage=true;
}

?>
<body>
<!-- Modal upload iamge Structure -->
<div id="upload_modal2" class="modal">
    <div class="modal-content">
        <h3>Upload your wallpaper</h3>
        <p>Make sure that you have all copyright for this image!</p>
        <form method="post" action="" class="col s12">
            <div class="row">
                <div class="input-field col s12">
                    <select id="upload_cat">
                        <option style="color:white !important"  selected value="1">3D Abstract</option>
                        <option style="color:white !important"  value="2">Anime</option>
                        <option style="color:white !important"  value="3">Bike</option>
                        <option style="color:white !important"  value="4">Landscape</option>
                        <option style="color:white !important"  value="5">Girl</option>
                    </select>
                    <label style="color:white !important">Category</label>
                </div>
                <div class="input-field col s12">
                    <input style="color:white !important"  id="upload_tag" type="text" name="tag" class="validate">
                    <label style="color:white !important"  for="upload_tag">Tags</label>
                </div>
                <div class="col s12 file-field input-field">
                    <div class="btn">
                        <span>File</span>
                        <input style="color:white !important"  name="upload_img" type="file">
                    </div>
                    <div class="file-path-wrapper">
                        <input style="color:white !important"  class="file-path validate" type="text">
                    </div>
                </div>
                <div style="text-align:center !important" class="col s12 file-field input-field">
                    <input type="submit" class="btn" value="Upload" name="upload_sumbit">

                </div>
            </div>
        </form>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancel</a>
    </div>
  </div>
    <!-- Modal Structure -->
  <div id="modal1" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h4>Edit Profile</h4>
      <div class="row">
            <form method="post" action="#"  class="col s12 editpro">
                <div class="row">
                    <div class="input-field col s6">
                        <input required id="fullname" name="fullname" style="color:white !important" value="<?php echo $fullname ?>" require id="fullname" type="text" class="validate">
                        <label style="color:white !important" for="first_name">Name</label>
                    </div>
                    <div class="input-field col s6">
                        <input name="password" value="<?php echo $password ?>" style="color:white !important" id="password_edit" type="password">
                        <label style="color:white !important" for="password">Password</label>
                        <span style="color:white !important" class="editpasshelper" data-error="wrong" data-success="right"></span>
                    </div>
                    <div class="input-field col s12 gen">
                        <select id="gender">
                            <option selected value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Not defined">Not defined</option>
                        </select>
                        <label style="color:white !important">Gender</label>
                    </div>
                    <div class="input-field col s12">
                            <input required id="email" name="email" style="color:white !important" value="<?php echo $email ?>"id="email" type="email" class="validate">
                            <label style="color:white !important" for="email">Email</label>
                            <span style="color:white !important" class="helper-text" data-error="wrong" data-success="right"></span>
                    </div>
                    <div style="color:white !important" class="input-field col s12">
                        <textarea type="text" value="<?php echo $about ?>" style="color:white !important" id="textarea1" class="materialize-textarea"><?php echo $about ?> </textarea>
                        <label style="color:white !important" for="textarea1">About</label>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="modal-footer">
      <a href="#" onclick="editProfile(<?php echo $user_id ?>)" class="mybutton waves-effect waves-green btn">Confirm</a>
      <a href="#" class="modal-close mybutton waves-effect waves-green btn">Cancel</a>
    </div>
  </div>

 <!-- Modal Structure -->
 <div id="modal2" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h4>Change Avatar</h4>
      <div class="row">
            <form method="post" action="include/change_avatar.php"  enctype="multipart/form-data"  class="col s12 editpro">
                <div class="file-field input-field">
                    <div class="btn">
                        <span>File</span>
                        <input name="avatar" type="file">
                    </div>
                    <div class="file-path-wrapper">
                        <input style="color:white !important" class="file-path validate" type="text">
                    </div>
                </div>
                <input type="submit" class="btn red" name="changeavatar">
            </form>
        </div>
    </div>
    <div class="modal-footer">
      <a href="#" class="modal-close mybutton waves-effect waves-green btn">Cancel</a>
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
                    <form id="search-user" onsubmit="searchUser()"  action="#">
                        <div class="input-field" autocomplete:off>
                        <input id="search" type="search" required>
                        <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                        <i class="material-icons">close</i>
                        </div>
                       
                    </form>
            
            </div>
                
            </div>

            <!-- Sidenav trigger button -->
            <a href="#" data-target="mobile-demo" class="icon sidenav-trigger"><i id="bars" class="material-icons">menu</i></a>
            


            <div class="col s6 right hide-on-med-and-down" id="logz" style="text-align:center">
                <!-- <a class='dropdown-trigger btn waves-effect waves-light mybutton'id="nav_catbtn" href='#' data-target='dropdown2'>Category</a> -->
                <!-- Login/sign up area -->
                <!-- <a class='dropdown-trigger ccc btn mybutton' href='#' data-target='dropdown1'>Category</a> -->
                <?php if($ownpage){ ?>
                    <a href="#modal1" class="btn waves-effect modal-trigger waves-light red">Edit Profile</a>
                <?php }?>
                
                <?php if(isset($_SESSION['logged'])){?>
                    <a class="mybutton waves-effect waves-light btn" href="logout.php"><b>Log out</b></a>
                    <a class="mybutton waves-effect waves-light btn" href="index.php"><b>Home</b></a>
                <?php }else{?>
                    <a class="mybutton waves-effect waves-light btn" href="login.php"><b>Log in</b></a>
                    <a class="mybutton waves-effect waves-light btn" href="signup.php"><b>Sign up</b></a>
                    <a class="mybutton waves-effect waves-light btn" href="index.php"><b>Home</b></a>
                <?php }?>

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
                            <li><a href="#upload_modal2" class="btn-floating green"><i class="material-icons">publish</i></a></li>
                            <li><a href="login.php?logout=1" class="btn-floating blue"><i class="material-icons">exit_to_app</i></a></li>
                        </ul>
                    </div>
        </div>
    </nav>
</div>
<ul class="sidenav" style="background-color:#2a0d4566" id="mobile-demo">
    <li><a href="#modal1" class="btn waves-effect modal-trigger waves-light red"><i class="material-icons">edit</i></a></li>
    <li><a class='dropdown-trigger btn mybutton' href='#' data-target='dropdown1'>Category</a></li>
    <li><a class="mybutton waves-effect waves-light btn" href="logout.php"><b>Log out</b></a></li>
</ul>
        <!-- Tab area -->
        <!-- <div class="col s12 file-field input-field">
                            <div class="btn">
                                <span>File</span>
                                <input name="file" id="file" type="file">
                            </div>
                            <div class="file-path-wrapper">
                                <input name="avatar" style="color:white !important" id="avatar" value="<?php $avatar?>"  class="file-path validate" type="text">
                            </div>
                        </div> -->
</header>
<main>
    <div class="container">
        <div class="row ">
            <div class="col s12 m6 about_card">
                <div class="card">
                    <div class="card-image">
                        <img src="images/avatar/<?php echo $avatar?>">
                        <div class="usr card-title"><b><?php echo $username?></b></div>
                        <?php if($ownpage){?>
                            <a href="#modal2" class="btn-floating halfway-fab waves-effect modal-trigger waves-light red"><i class="material-icons">image</i></a>
                        <?php } ?>
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
                        <h4>Information:</h4>
                        <p><i class="material-icons">face</i> Name: <?php echo $fullname?></p>
                        <div class="divider"></div>
                        <p><i class="material-icons">wc</i> Gender: <?php echo $gender?></p>
                        <div class="divider"></div>
                        <p><i class="material-icons">email</i> Email: <?php echo $email?></p>
                        <div class="divider"></div>
                        <p><i class="material-icons">date_range</i> Birthday: <?php echo $birthday?></p>
                    </div>
                </div>
                <div class="col s12 m5 ">
                    <div class="card-panel">
                        <?php 
                            $upload_count=uploadedCount($user_id);
                        ?>
                        <h5>Uploaded: <?php echo $upload_count?> wallpapers</h5>;
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