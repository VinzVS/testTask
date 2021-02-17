<?php
namespace core;

class Controller
{
    public $route;
    public $view;
    public $layout='default';
    public $data = [];

    public function __construct($route)
    {
        $this->route = $route;
    }
    public function getView()
    {
        $viewObject=new View($this->route, $this->layout, $this->view);
        $viewObject->render($this->data);
    }

    public function  setData($data)
    {
        $this->data = $data;
    }

    public function getSafeText($text)
    {
        $text = trim($text);
        $text = strip_tags($text);
        return htmlspecialchars($text);

    }

    public function getStatusMessage(){
        $message=null;
        if(isset($_SESSION['success'])) {
            $message=$_SESSION['success'];
            unset($_SESSION['success']);
        }
        return $message;
    }
}
