<?php

namespace App\Models\Contract;
use App\Models\Contract\CrudInterface;

abstract class BaseModel implements CrudInterface{

    protected $connection;
    protected $table;
    protected $primarykey = 'id';
    protected $pagesize = 10;
    protected $attributes = [];

    // protected function __construct(){

    // }

    public function getAttribute($key){

        if(!$key || !array_key_exists($key,$this->attributes))
            return null;
        return $this->attributes[$key];
        
    }

    public function __get($key){

        return $this->getAttribute($key);

    }

}

