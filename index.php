<?php
#front controller

// use App\Core\Routing\Route;
use App\Core\Routing\Router;

use App\Models\User;

include "bootstrap/init.php";

// $user_data = [
//     "name" => "milad",
//     "email" => "milad@gmail.com",
//     "password" => "123456",
// ]; 

// $user_model = new User;
// $result = $user_model->delete(['id'=>3]);
// $user = $user_model->find(2);
// var_dump($result);
$router = new Router();
$router->run();
