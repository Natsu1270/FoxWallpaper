<?php
// include "util/splitUrl.php";
$request = $_SERVER['REQUEST_URI'];
if(!strpos($request,'?')){
    // echo "url not contain param!";
    switch ($request) {
        case '/' :
            require __DIR__ . '/pages/home.php';
            break;
        case '' :
            require __DIR__ . '/pages/home.php';
            break;
        case '/about' :
            require __DIR__ . '/pages/about.php';
            break;
        case '/admin' :
            require __DIR__ . '/admin//';
            break;
        case '/login' :
            require __DIR__ . '/account/login.php';
            break;
        case '/logout' :
            require __DIR__ . '/account/logout.php';
            break;
        case '/profile' :
            require __DIR__ . '/account/profile.php';
            break;
        case '/signup' :
            require __DIR__ . '/account/signup.php';
            break;
        case '/signup_validate' :
            require __DIR__ . '/account/signup_validate.php';
            break;
        case '/search':
            require __DIR__ . "/pages/search_index.php";
            break;
        case '/collection' :
            require __DIR__ . '/pages/collection.php';
            break;
        default:
            require __DIR__ . '/pages/404.php';
            break;
    }
}else{
    $request_url = explode("?",$request);
    $url = $request_url[0];
    $param = $request_url[1];
    // echo '/account/login.php?'.$param;
    switch ($url) {
        case '/search':
            require __DIR__ . "/pages/search_index.php";
            break;
        case '/login':
            require __DIR__ . "\account\login.php";  
            break;
        case '/profile' :
            require __DIR__ . '/account/profile.php';
            break;
        case '/activate':
            require __DIR__ . "\account\activate.php";  
            break;
        case '/uploaded':
            require __DIR__ .'/pages/ownerwallpaper.php';
            break;
        case '/profile' :
            require __DIR__ . '/account/profile.php';
            break;
        default:
            require __DIR__ . '/pages/404.php';
            break;
    }
}

?>