<?php
namespace core;

class App
{

    public function __construct()
    {
        $query = trim($_SERVER['QUERY_STRING'],'/');
        session_start();
        Router::dispatch($query);
    }


}
