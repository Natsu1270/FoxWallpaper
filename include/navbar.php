<!-- Dropdown Structure -->
<div id="dropdown1" class="dropdown-content" style="width: 300px !important;">
    <ul>
        <li><a href="#!" style="font-weight: bolder" data-target="A">Drop1</a></li>
        <li><a href="#!" style="font-weight: bolder" data-target="B">Drop2</a></li>
        <li><a href="#!" style="font-weight: bolder" data-target="C">Drop3</a></li>
        <li><a href="#!" style="font-weight: bolder" data-target="D">Drop4</a></li>
    </ul>
</div>
<ul id='dropdown2' class='dropdown-content dropdown2'>
    <a href="#!">Most download</a>
    <a href="#!">Most favourite</a>
    <a href="#!">Most comment</a>
    
   
</ul>
<div class="navbar-fixed">
    <nav id="top-nav" role="navigation">
        <div class="nav-wrapper mynav row mynavres" id="mynav">

            <!-- Logo area -->

            <div class="col s3 sitelogo" style="padding-left:40px">
                <img id="fox-logo" src="logo/Fox.png" alt="foxwallpaper" class="brand-logo responsive-img">
                <a id="main-logo" href="#" class="brand-logo">FoxWallpaper</a>
            </div>




            <div class="col s2">
            </div>

            <!-- Sidenav trigger button -->
            <a href="#" data-target="mobile-demo" class="icon sidenav-trigger"><i id="bars" class="material-icons">menu</i></a>
            


            <div class="col s4 right hide-on-med-and-down" id="logz" style="text-align:center">
                <a class='dropdown-trigger btn mybutton' href='#' data-target='dropdown2'>Category</a>
                <!-- Login/sign up area -->
                <!-- <a class='dropdown-trigger ccc btn mybutton' href='#' data-target='dropdown1'>Category</a> -->
                <?php if(isset($_SESSION['role']) && isset($_SESSION['logged'])){
                            if($_SESSION['role']=='admin'){
                                echo '<a class="mybutton waves-effect waves-light btn" href="admin"><b>Admin</b></a>';
                            }else if($_SESSION['role']=='user'){
                                echo '<a class="mybutton waves-effect waves-light btn" href="login.php?logout=1"><b>Log out</b></a>';
                            }
                        }else{
                            echo '<a class="mybutton waves-effect waves-light btn" href="login.php"><b>Log in</b></a>';
                            echo '<a class="mybutton waves-effect waves-light btn" href="signup.php"><b>Sign up</b></a>';
                        } ?>
            </div>
      
        </div>
    </nav>
</div>
<ul class="sidenav" style="background-color:#2a0d4566" id="mobile-demo">
    <li><a class='dropdown-trigger btn mybutton' href='#' data-target='dropdown1'>Category</a></li>
    <?php if(isset($_SESSION['role']) && isset($_SESSION['logged'])){
                if($_SESSION['role']=='admin'){
                    echo '<li><a class="mybutton waves-effect waves-light btn" href="admin"><b>Admin</b></a></li>';
                    }else if($_SESSION['role']=='user'){
                    echo '<li><a class="mybutton waves-effect waves-light btn" href="login.php?logout=1"><b>Log out</b></a></li>';
                    }
                    }else{
                    echo '<li><a class="mybutton waves-effect waves-light btn" href="login.php"><b>Log in</b></a></li>';
                    echo '<li><a class="mybutton waves-effect waves-light btn" href="signup.php"><b>Sign up</b></a></li>';
        } ?>
</ul>
