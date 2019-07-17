<?php
include 'include/database_connect.php';
// check first if record exists
if(isset($_GET['code'])){
    $response_code=$_GET['code'];
    $query = "SELECT * FROM user WHERE active_code = '{$response_code}' and status = 'unactived'";
    $res=mysqli_query($conn,$query);
    if(!$res){
        die('active acc failed '.mysqli_error($conn));
    }
    $row=mysqli_fetch_assoc($res);
    $user_id=$row['user_Id'];
    $add_query="UPDATE user SET status = '' where user_id = $user_id";
    $add_res=mysqli_query($conn,$add_query);
    if(!$add_res){
        die("active acc done failed ".mysqli_error($conn));
    }
}else{
    // tell the user he should not be in this page
    echo "<div>We can't find your verification code.</div>";
}
?>
<h2>Active done</h2>
<p>Click <a href="/login">here to log in</a></p>