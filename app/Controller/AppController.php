<?php

namespace App\Controller;

use \App;
use Core\Controller\Controller;

class AppController extends Controller{

    protected $template = 'default';

    public function avatar($id){
        if(!isset($this->User)){
            $this->loadModel('User');
        }
        $person = $this->User->find($id);
        if($person->photo === '0'){
            return 'public/img/user0.jpg';
        }else{
            return 'public/img/user' . $id . '.jpg';
        }
    }

    public function n_rand(){
        if(!isset($this->User)){
            $this->loadModel('User');
        }
        $num = rand(1000, 9999) . rand(1000, 9999) . rand(1000, 9999) . rand(1000, 9999);
        if($this->User->checkNum($num)){
            $this->n_rand();
        }else{
            return $num;
        }
    }


    public function __construct(){
        $this->viewPath = ROOT . 'app/Views/';
    }

    protected function loadModel($model){
        $this->$model = App::getApp()->getModel($model);
    }
    
}