<?php

namespace core;
class View
{
    public $route;
    public $controller;
    public $model;
    public $view;
    public $prefix;
    public $layout;


    public function __construct($route, $layout, $view = '')
    {
        $this->route = $route;
        $this->controller=$route['controller'];
        $this->view = $view;
        $this->model=$route['controller'];
        $this->view=$route['action'];
        $this->prefix=$route['prefix'];
        $this->layout = $layout;
    }

    public function render ($data) {
        if (is_array($data)) extract($data);
        $this->prefix=str_replace('\\','/',$this->prefix);
        $viewFile = dirname(__DIR__)."/app/views/{$this->controller}/{$this->view}.php";
        if(is_file($viewFile)){
            ob_start();
            require_once $viewFile;
            $content = ob_get_clean();
        }
        else{
            throw new \Exception("Не найден вид {$viewFile}", 500);
        }
        if (false !== $this->layout) {
            $layoutFile = dirname(__DIR__)."/app/views/layouts/{$this->layout}.php";
            if (is_file($layoutFile)) {
                require_once $layoutFile;
            }
            else {
                throw new \Exception("Не найден шаблон {$this->layout}", 500);
            }
        }

    }
}
