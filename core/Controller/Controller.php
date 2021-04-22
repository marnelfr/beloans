<?php
namespace Core\Controller;


class Controller{

    protected $template;
    protected $viewPath;

    protected function view($model_name, $variables = []){
        $model_name = str_replace('.', '/', $model_name);
        extract($variables);
        ob_start();
        require $this->viewPath . $model_name . '.php';
        $content = ob_get_clean();
        require $this->viewPath . 'Templates/' . $this->template . '.php';
    }

}