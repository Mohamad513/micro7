<?php

use App\Core\Routing\Route;
use App\Middleware\BlockFirefox;

Route::get('/','HomeController@index');

Route::get('/todo/list','TodoController@list',[BlockFirefox::class]);


Route::get('/post/{slug}','PostController@single');
Route::get('/post/{slug}/comment/{cid}','PostController@comments');



Route::get('/archive','ArchiveController@index');
Route::get('/archive/products','ArchiveController@products');
Route::get('/archive/articles','ArchiveController@articles');

Route::get('/a',function(){
    echo "wellcome";
});

Route::get('/saveForm',function(){
    echo "save ok";
});

Route::put('/puturi','controller','method');

Route::put('/puturi','controller@method');