<?php include "include/database_connect.php";
session_start();
ob_start();
if(isset($_GET['logout'])){
    session_destroy();
}
$_SESSION['logged']=false;
if(isset($_POST['login'])){
    $log_username=mysqli_real_escape_string($conn,$_POST['your_name']);
    $log_password=mysqli_real_escape_string($conn,$_POST['your_pass']);
    $query="select * from cms.user where username='{$log_username}'";
    $login_res=mysqli_query($conn,$query);
    if(!$login_res){
        header("Location: login.php?error=1");
    }else{
        while($row=mysqli_fetch_assoc($login_res)){
            $user_id=$row['user_id'];
            $username=$row['username'];
            $password=$row['password'];
            $about=$row['about'];
            $birthday=$row['birthday'];
            $fullname=$row['fullname'];
            $avatar=$row['avatar'];
            $email=$row['email'];
            $role=$row['role'];
            $gender=$row['gender'];
            $status=$row['status'];
            if($log_password!==$password || $log_username!==$username){
                header("Location: login.php?error_code=1");
            }else if($status=='unactived'){  // check if user has been activated.
                header("Location: login.php?error_code=2");
            }else if($status=='ban'){
                header("Location: login.php?error_code=3");
            }
            else{
                $_SESSION['status']=$status;
                $_SESSION['user_id']=$user_id;
                $_SESSION['logged']=true;
                $_SESSION['username']=$username;
                $_SESSION['role']=$role;
                $_SESSION['email']=$email;
                $_SESSION['gender']=$gender;
                $_SESSION['fullname']=$fullname;
                $_SESSION['about']=$about;
                $_SESSION['birthday']=$birthday;
                $_SESSION['avatar']=$avatar;
                header("Location:index.php");
            }
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Log in</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
    <link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">
    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Righteous" rel="stylesheet">
    <link rel="stylesheet" href="css/login-style.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="js/jquery-3.2.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>
<body>
    <div class="main">
        <!-- Sing in  Form -->
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="images/signin-image.jpg" alt="sing up image"></figure>
                        <a href="signup.php" style="display:block;text-align: center;">Create  an  account</a>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Log in</h2>
                    <?php if(isset($_GET['error_code'])){ $error_code=$_GET['error_code'] ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Log in error!</strong> 
                        <?php
                            //check for login error
                            if($error_code==1){ 
                                echo"Your username or password are incorrect.";
                            }
                            else if($error_code==2)
                            {
                                echo "Your account is not activated yet,please check your email to activate!";
                            }
                            else if($error_code==3)
                            {
                                echo "Your account has been banned, please contact to administrator to get more information!";
                            }
                        ?>
                        <button type="button" onclick="close()" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <script>
                            function close(){
                                $(".alert").alert('close');
                            }
                        </script>
                    </div>
                    <?php } ?>
                    
                        <form method="POST" action="" class="register-form" id="login-form">
                            <div class="form-group">
                                <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input required type="text" name="your_name" id="your_name" placeholder="Your Name"/>
                            </div>
                            <div class="form-group">
                                <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                <input required type="password" name="your_pass" id="your_pass" placeholder="Password"/>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                                <label for="remember-me" class="label-agree-term"><span><span></span></span>Remember me</label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit"  id="my-font" name="login" id="signin" class="form-submit logbut" value="Log in"/>
                                <a href="index.php" id="my-font" style="text-decoration:none" class="form-submit logbut">Home</a>
                            </div>
                        </form>
                        <div class="social-login">
                            <span class="social-label">Or login with</span>
                            <ul class="socials">
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-facebook"></i></a></li>
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-twitter"></i></a></li>
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-google"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>