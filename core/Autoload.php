<?php
namespace Core;


class Autoload{
    
    public static function auto($class_name){
        $dir = explode('\\', $class_name)[0];
        $class_name = str_replace($dir . '\\', '', $class_name);
        $class_name = str_replace('\\', '/', $class_name);
        if($dir == 'Core'){
            require dirname(__DIR__) . '/core/' . $class_name . '.php';
        }else{
            require dirname(__DIR__) . '/app/' . $class_name . '.php';
        }
    }
    
    public static function register(){
        spl_autoload_register([__CLASS__, 'auto']);
    }

}