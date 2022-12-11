<?php
namespace App\Controllers;

use App\Models\User;

class PostController{

    public function single(){

        global $reguest;

        $user = new User(1);
        var_dump($user->email);
        
        $slug = $reguest->get_route_param('slug');
        // $cid = $reguest->get_route_param('cid');
        echo "slug:" . $slug ;
        // . "<br>" . "cid:" . $cid;
    }

}