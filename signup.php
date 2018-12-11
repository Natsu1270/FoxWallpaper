<?php include"include/database_connect.php"; 
require 'include/PHPMailer/src/Exception.php';
require 'include/PHPMailer/src/PHPMailer.php';
require 'include/PHPMailer/src/SMTP.php';
//sign up done-successful alert to user.
if(isset($_POST["signup"])){
    $username=$_POST["username"];
    $raw_password=$_POST["pass"];
    $password=password_hash($raw_password,PASSWORD_DEFAULT);
    $role="user";
    $email=$_POST["email"];
    $status="unactived";
    $avatar="";
    //verify
    $verificationCode = md5(uniqid("natsu", true));
    $verificationLink = "http://localhost/ltw/activate.php?code=" . $verificationCode;

    $insert_query="INSERT INTO cms.user(username,password,role,email,avatar,active_code,status) 
        VALUES('{$username}','{$password}','{$role}','{$email}','{$avatar}','{$verificationCode}','{$status}')";
    $insert_result=mysqli_query($conn,$insert_query);
    if(!$insert_result){
        die("Insert user failed ".mysqli_error($conn));
    }else{
        $mail = new PHPMailer\PHPMailer\PHPMailer();                      // Passing `true` enables exceptions
        try {
            //Server settings
            $mail->SMTPDebug = 0;                                 // Enable verbose debug output
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'hungduy1270@gmail.com';                 // SMTP username
            $mail->Password = 'Zxzx1212';                           // SMTP password
            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 25;                                    // TCP port to connect to

            //Recipients
            $mail->setFrom($email, 'FoxWallpaper');
            $mail->addAddress('littlenaruto96@gmail.com', 'Joe User');     // Add a recipient
            // $mail->addAddress('ellen@example.com');               // Name is optional
            // $mail->addReplyTo('info@example.com', 'Information');
            // $mail->addCC('cc@example.com');
            // $mail->addBCC('bcc@example.com');

            //Attachments
            // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

            //Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Fox wallpaper activation for new account';
            $mail->Body    = 'Wellcome to Fox Wallpaper ! Please click link below to finish registering.<br>';
            $mail->Body.= "<a href='{$verificationLink}' target='_blank' style='font-weight:bold;'>VERIFY EMAIL</a><br /><br /><br />";
            $mail->send();
            echo "<div style='text-align:center;height:100px;background-color:purple'>
                    <div style='color:white;font-size:30px'>Please check your email to complete register to Fox Wallpaper</div>
            </div>";
            echo '<meta http-equiv="refresh" content="3;url=http://localhost/ltw" />';
            } 
            catch (Exception $e) {
                echo 'Message could not be sent.';
                echo 'Mailer Error: ' . $mail->ErrorInfo;
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
    <title>Sign Up Form by Colorlib</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
    <link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">
    <!-- Main css -->
    <link href="https://fonts.googleapis.com/css?family=Righteous" rel="stylesheet">
    
    <link rel="stylesheet" href="css/login-style.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">

    <script src="js/jquery-3.2.1.slim.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/popper.min.js"></script>
    
</head>
<body>
    <!-- Modal Structure -->
    <div id="modal3" class="modal">
        <div class="modal-content">
        <h4>Modal Header</h4>
        <p>A bunch of text</p>
        </div>
        <div class="modal-footer">
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Agree</a>
        </div>
    </div>
    <div class="main">

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 style="color:black !important" class="form-title">Sign up</h2>
                        <form method="POST" action="" onsubmit="submitable(e)" class="register-form" id="register-form">
                            <div class="form-group">
                                <label for="username"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input required type="text" name="username" id="username" placeholder="Your username"/>
                            </div>
                            <div class="helper-text" id="usernameHelper" >
                                <small id="usernameHelp" class="form-text txtHelper text-muted"></small>
                            </div>

                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input required  type="email" name="email" id="email" placeholder="Your Email"/>
                            </div>
                            <div class="helper-text" id="emailHelper" >
                                <small id="emailHelp" class="form-text txtHelper text-muted"></small>
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input required type="password" name="pass" id="pass" placeholder="Password"/>
                            </div>
                            <div class="helper-text" id="passwordHelper" >
                                <small id="passwordHelp" class="form-text txtHelper text-muted"></small>
                            </div>
                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input required type="password" name="re_pass" id="re_pass" placeholder="Repeat your password"/>
                            </div>
                            <div class="helper-text" id="retype" >
                                <small id="retypeHelp" class="form-text txtHelper text-muted"></small>
                            </div>
                            <div class="form-group">
                                
                                <label for="agree-term" class="label-agree-term"><span><span></span></span>By clicking "Register", you agree to our <a class=" term-service modal-trigger" href="#modal3" style="color:black !important"  >Terms of service</a></label>
                            </div>
                            <div class="form-group form-button">
                                <input  type="submit" name="signup" id="signup" class="form-submit logbut" value="Register"/>
                                <a href="index.php" style="text-decoration:none" class="form-submit logbut">Home</a>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="images/signup-image.jpg" alt="sing up image"></figure>
                        <a style="color:black !important" href="login.php" class="signup-image-link">I am already member</a>
                    </div>
                </div>
            </div>
        </section>
    <script>
    $(document).ready(function(){
        $('.modal').modal();
        var okname=true;
        var okemail=true;
        var okpass=true;
        var okrepass=true;
        $("#re_pass").on('keyup',function(){
            if($("#re_pass").val()==$("#pass").val()){
                $("#retypeHelp").html("");
                okrepass=true;
            }else{
                $("#retypeHelp").html("Not match!").css({"color":"red",'font-weight':'bold'});
                $("#retype").css({"background-color":"#f5939736","display":"inline-block"});
                okrepass=false;
            }
        })
        $("#pass").on('keyup',function(){
            
            var pass=$(this).val();
            if(pass.length<4){
                $("#passwordHelper").css({"background-color":"#f5939736","color":"red","display":"inline-block","margin-bottom":"4px","font-weight":"bold"});
                $("#passwordHelp").html("Make sure that password has at least 4 characters!");
                okpass=false;
            }else{
                $("#passwordHelp").html("");
                okpass=true;

            }
        })
        $("#username").keyup(function(e){
            var username=$(this).val();
            $.post('signup_validate.php',{'username':username},function(data){
                var json_res=JSON.parse(data);
                if(json_res.bgc==0){
                    okname=true;
                    $("#usernameHelper").css({"background-color":"#90ee9061","color":"green","display":"inline-block","margin-bottom":"4px","font-weight":"bold"})
                }else if(json_res.bgc==1){
                    okname=false;
                    $("#usernameHelper").css({"background-color":"#f5939736","color":"red","display":"inline-block","margin-bottom":"4px","font-weight":"bold"})
                }
                $("#usernameHelp").html(json_res.message);
                
            })
        })

        $("#email").keyup(function(e){
            var email=$(this).val();
            $.post('signup_validate.php',{'email':email},function(data){
                var json_res=JSON.parse(data);
                if(json_res.error==1){
                    okemail=false;
                    $("#emailHelp").html(json_res.message);
                    $("#emailHelper").css({"background-color":"#f5939736","color":"red","display":"inline-block","margin-bottom":"4px","font-weight":"bold"});
                }else{
                    okemail=true;
                    $("#emailHelp").html(json_res.message);
                }
               
            })
        })
        $(".register-form").submit(function(e){
            if(!okname||!okemail||!okpass||!okrepass){
                e.preventDefault();
            }
        })
    })
    
    
    </script>
    


    <!-- JS -->
    <script src="js/jquery-3.3.1.js"></script>
    <script src="js/materialize.min.js"></script>
    <script src="js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>