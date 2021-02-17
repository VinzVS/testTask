<?php


namespace app\controllers;


use app\model\User;
use core\Controller;

class LoginController extends Controller
{
    public function indexAction()
    {
        $message=null;

        if(isset($_SESSION['admin'])){
            header("Location: ".PATH);
        } else {
            if($page = isset($_POST['new']) ? intval($_POST['new']) : 0) {
                $login = $this->getSafeText($_POST['login']) ?: null;
                $password = $this->getSafeText($_POST['password']) ?: null;
                if ($login && $password) {
                    $userModel = new User();
                    $passwordUserTable = $userModel->getUser($login);
                    if ($passwordUserTable) {
                        if ($password == $passwordUserTable['password']) {
                            $_SESSION['admin'] = true;
                            header("Location: " . PATH);
                        } else {
                            $message = 'пароль не верен!';
                        }
                    } else {
                        $message = 'Пользователь не существует!';
                    }
                }else{
                    $message='Все поля должны быть заполнены';
                }
            }
        }

        $this->setData(compact('message'));
    }

    public function logoutAction()
    {
        if(isset($_SESSION['admin'])){
            unset($_SESSION['admin']);
        }
        header("Location: ".PATH);
    }



}
