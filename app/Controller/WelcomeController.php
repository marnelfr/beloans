<?php
namespace App\Controller;

class WelcomeController extends AppController{

    public function index(){
        return $this->view('home');
    }
    
    public function notfound(){
        $this->template = 'notfound';
        return $this->view('notfound');
    }



}