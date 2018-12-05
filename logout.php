<?php
// fix log in bug
session_start();
$_SESSION['user_id']=null;
$_SESSION['isban']=null;
$_SESSION['logged']=null;
$_SESSION['username']=null;
$_SESSION['role']=null;
session_destroy();
header("Location:index.php");
?>