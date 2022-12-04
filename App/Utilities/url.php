<?php

namespace App\Utilities;

class url {

    public static function curent(){
        return (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    }
    public static function curent_route(){
        return strtok($_SERVER['REQUEST_URI'],'?');
    }

}