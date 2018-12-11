<!-- Modal upload iamge Structure -->
<div id="upload_modal" class="modal">
    <div class="modal-content">
        <h3>Upload your wallpaper</h3>
        <p>Make sure that you have all copyright for this image!</p>
        <form method="post" action="include/upload_process.php" enctype='multipart/form-data' class="col s12">
            <div class="row">
                <div class="input-field col s12 cattt">
                    <select name="upload_cat" id="upload_cat">
                        <option style="color:white !important"  selected value="1">3D Abstract</option>
                        <option style="color:white !important"  value="2">Anime</option>
                        <option style="color:white !important"  value="3">Bike</option>
                        <option style="color:white !important"  value="4">Landscape</option>
                        <option style="color:white !important"  value="5">Girl</option>
                    </select>
                    <label style="color:white !important"><b>Category</b></label>
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
                    <input type="submit" class="btn" value="Upload" name="upload_submit">
                </div>
            </div>
        </form>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancel</a>
    </div>
  </div>
<!-- Dropdown Structure -->
<div id="dropdown1" class="dropdown-content" style="width: 300px !important;">
    <ul>
        <li><a href="#!" style="font-weight: bolder" data-target="A">Most Download</a></li>
        <li><a href="#!" style="font-weight: bolder" data-target="B">Most Favourite</a></li>
        <li><a href="#!" style="font-weight: bolder" data-target="C">Most Comment</a></li>
    </ul>
</div>
<ul id='dropdown2' class='dropdown-content dropdown2'>
    <a href="option.php#mostdown">Most download</a>
    <a href="option.php#mostlove">Most favourite</a>
    <a href="option.php#mostcmt">Most comment</a>
</ul>
<!-- Tap Target Structure -->

<div class="navbar-fixed">
    <nav id="top-nav" role="navigation">
        <div class="nav-wrapper mynav row mynavres" id="mynav">

            <!-- Logo area -->

            <div class="col s3 sitelogo" style="padding-left:40px">
                <img id="fox-logo" src="logo/Fox.png" alt="foxwallpaper" class="brand-logo responsive-img">
                <a id="main-logo" href="index.php" class="brand-logo">FoxWallpaper</a>
            </div>




            <div class="col s3">
                
            </div>

            <!-- Sidenav trigger button -->
            <a href="#" data-target="mobile-demo" class="icon sidenav-trigger"><i id="bars" class="material-icons">menu</i></a>
            
            <div class="col s6 right hide-on-med-and-down" id="logz" style="text-align:center">
                <a class='dropdown-trigger btn waves-effect waves-light mybutton'id="nav_catbtn" href='#' data-target='dropdown2'>Category</a>
                <!-- Login/sign up area -->
                <!-- <a class='dropdown-trigger ccc btn mybutton' href='#' data-target='dropdown1'>Category</a> -->
                <?php if(isset($_SESSION['role']) && isset($_SESSION['logged'])){
                            if($_SESSION['role']=='admin'){
                                echo '<a class="mybutton waves-effect waves-light btn" href="admin"><b>Admin</b></a>';
                            }else if($_SESSION['role']=='user'){
                                echo '<a class="mybutton waves-effect waves-light btn" href="logout.php"><b>Log out</b></a>';
                            }
                        }else{
                            echo '<a class="mybutton waves-effect waves-light btn" href="login.php"><b>Log in</b></a>';
                            echo '<a class="mybutton waves-effect waves-light btn" href="signup.php"><b>Sign up</b></a>';
                        } ?>
                <!-- Element Showed -->
                <a id="discovery" onclick="$('.tap-target').tapTarget('open')" class="waves-effect waves-light btn discoverybtn">About</a>
                
            </div>
            <div class="tap-target" data-target="discovery">
                <div class="tap-target-content">
                    <h3>Wellcome to FoxWallpaper</h3>
                    <h6>Thanks for visting us,donate <a href="https://i.kym-cdn.com/entries/icons/original/000/000/091/TrollFace.jpg">HERE</a> </h6>
                </div>
            </div>
            
            <!-- EDIT PROFILE -->
            <?php if(isset($_SESSION['role']) && isset($_SESSION['logged'])){
                if($_SESSION['role']=='user'){?>
                    <div class="fixed-action-btn">
                        <a class="btn-floating btn-large red">
                            <i class="large material-icons">mode_edit</i>
                        </a>
                        <ul>
                            <li><a href="profile.php" class="btn-floating red"><i class="material-icons">face</i></a></li>
                            <li><a href="collection.php" class="btn-floating yellow darken-1"><i class="material-icons">collections</i></a></li>
                            <li><a href="#upload_modal" class="modal-trigger btn-floating green"><i class="material-icons">publish</i></a></li>
                            <li><a href="logout.php" class="btn-floating blue"><i class="material-icons">exit_to_app</i></a></li>
                        </ul>
                    </div>
                <?php }else if($_SESSION['role']=='admin'){ ?>
                     <div class="fixed-action-btn">
                     <a class="btn-floating btn-large red">
                         <i class="large material-icons">mode_edit</i>
                     </a>
                     <ul>
                         <li><a href="admin" class="btn-floating red"><i class="material-icons">insert_chart</i></a></li>
                         <li><a href="logout.php" class="btn-floating violet darken-1"><i class="material-icons">exit_to_app</i></a></li>
                     </ul>
                 </div>
                <?php }}?>

        </div>
    </nav>
</div>
<ul class="sidenav" style="background-color:#2a0d4566" id="mobile-demo">
    <li><a class='dropdown-trigger btn mybutton' href='#' data-target='dropdown1'>Category</a></li>
    <?php if(isset($_SESSION['role']) && isset($_SESSION['logged'])){
                if($_SESSION['role']=='admin'){
                    echo '<li><a class="mybutton waves-effect waves-light btn" href="admin"><b>Admin</b></a></li>';
                    }else if($_SESSION['role']=='user'){
                    echo '<li><a class="mybutton waves-effect waves-light btn" href="logout.php"><b>Log out</b></a></li>';
                    }
                    }else{
                    echo '<li><a class="mybutton waves-effect waves-light btn" href="login.php"><b>Log in</b></a></li>';
                    echo '<li><a class="mybutton waves-effect waves-light btn" href="signup.php"><b>Sign up</b></a></li>';
        } ?>
</ul>
