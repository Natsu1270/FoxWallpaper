<?php
    // function splitUrl($url){
    //     if(strpos($url,'?')==false){
    //         return $url;
    //     }else{
    //         return explode('?',$url);
    //     }
    // }

    function isContainParam($url){
       return strpos($url,'?');
    }
?>