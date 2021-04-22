<?php
namespace Core\Entity;


class Entity{
    
    public function __get($key){
        $method = 'get' . ucfirst($key);
        $this->$key = $method;
        return $this->$method();
    }

}