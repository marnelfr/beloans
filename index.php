<?php
define('ROOT', __DIR__ . '/');
require('app/App.php');
App::load();

if(isset($_GET['p'])){
    $page = strip_tags($_GET['p']);
}else{
    $page = 'welcome/index';
}

$parts = explode('/', $page);

if(!isset($parts[1])){
    $parts[0] = 'welcome';
    $parts[1] = 'notfound';
}

if(!methods($parts)){
    $parts[0] = 'welcome';
    $parts[1] = 'notfound';
}


$action = $parts[1];
$controller = 'App\Controller\\' . ucfirst($parts[0]) . 'Controller';
$controller = new $controller();
$controller->$action();