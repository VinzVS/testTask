<?php

namespace core;
class Router

{
    protected static $routes=[];
    /** Хранится таблица маршрутов  массив с параметром:
     * [выражение]=> [controller => имяконтроллера, action => имяэкшена]
     */
    protected static $route=[]; // Текущий маршрут если найдено соответсвие
    /**  controller => имяконтроллера
     *   action => имяэкшена
     */


    public static function add( $regexp, $route=[]){
        self::$routes[$regexp]=$route;
    }
    public static function getRoutes(){
        return self::$routes;
    }

    public static function  getRoute()
    {
        return self::$route;
    }

    public static function dispatch($url){
        $url = self::removeQueryString($url);

        if(self::matchRoute($url)) {
            $controller = 'app\controllers\\'. self::$route['controller'] . 'Controller';
            if (class_exists($controller)) {
                $controllerObject = new $controller(self::$route);
                $action =  self::lowerCamelCase(self::$route['action'].'Action');
                if (method_exists($controllerObject, $action)) {
                    $controllerObject->$action();
                    $controllerObject->getView();
                }
                else {
                    throw new \Exception("Метод {$controller} :: {$action} не найден",404);
                }
            } else {
                throw new \Exception("Контроллер {$controller} не найден",404);
            }
        }
        else
            throw new \Exception("Страница не найдена",404);
    }


    public static function matchRoute($url){

        foreach (self::$routes as $pattern => $route) {
            if (preg_match("#{$pattern}#i", $url, $matches) ) {
                foreach ($matches as $k => $v){
                    if (is_string($k)){
                        $route[$k] = $v;
                    }
                }
                if(empty($route['action'])) {
                    $route['action']='index';
                }
                $route['controller']= self::upperCamelCase($route['controller']);
                self::$route = $route;
                return true;
            }
        }
        return false;
    }

    protected static function upperCamelCase ($name){
        $str=ucwords( str_replace('-'," ",$name));
        $name=str_replace(" ","",$str);
        return $name;
    }

    protected static  function lowerCamelCase ($name){
        $name = lcfirst(self::upperCamelCase($name));
        return $name;
    }

    protected static function removeQueryString ($url){
        if ($url) {
            $params = explode('&', $url, 2);
            if(false === strpos($params[0],'=')) {
                return rtrim ($params [0], '/');
            } else {
                return '';
            }
        }
    }
}