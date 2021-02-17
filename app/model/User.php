<?php


namespace app\model;


use core\Model;

class User extends Model
{
    public function getUser($login){
        $query="SELECT password FROM user WHERE login = '{$login}'";
        return $this->getOneQuerry($query);
    }
}
