<?php

namespace app\controllers;

use app\model\Task;
use core\Controller;
use core\Pagination;

class MainController extends Controller
{
    public function indexAction()
    {
        $orderBy=$this->getSafeText($_GET['sort'])? :'id';
        $by=$this->getSafeText($_GET['by'])? :'asc';
        $message = $this->getStatusMessage();
        $admin = $_SESSION['admin'] ? true : false;
        $taskModel = new Task();
        $countTask = $taskModel->getCount('task');
        if (!empty($countTask)) {
            $totalTask = $countTask['COUNT(1)'];
        } else {
            $totalTask = 0;
        }
        $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
        $pagination = new Pagination($page, 3, $totalTask);
        $start = $pagination->getStart();
        $tasks = $taskModel->getTask($start, 3,$orderBy,$by);
        $this->setData(compact('message', 'tasks', 'pagination', 'admin'));
    }

    public function addAction()
    {
        $admin = $_SESSION['admin'] ? true : false;
        if (!$message = $this->getStatusMessage()) {
            if($page = isset($_POST['new']) ? intval($_POST['new']) : 0) {
                $name = $this->getSafeText($_POST['name']) ?: null;
                $email = $this->getSafeText($_POST['email']) ?: null;
                $text = $this->getSafeText($_POST['text']) ?: null;
                if ($name && $email && $text) {
                    $re = '/[A-Z0-9._%+-]+@[A-Z0-9-]+.+.[A-Z]{2,4}/mi';
                    preg_match_all($re, $email, $matches, PREG_SET_ORDER, 0);
                    if (!empty($matches)) {
                        $email = $matches[0][0];
                        $taskModel = new Task();
                        if (!$error = $taskModel->newTask($name, $email, $text)) {
                            $_SESSION['success'] = "Запись прошла успешно";
                            header("Location: " . PATH);
                        };

                    } else {
                        $message = 'Неверно написан email';
                    }
                } else {
                    $message = "Должны быть заполнены все поля";
                }
            }else{
                $message=null;
            }
        };
        $this->setData(compact('admin', 'message', 'name', 'text', 'email'));
    }

    public function editAction()
    {
        $admin = $_SESSION['admin'] ? true : false;
        if (!$admin) header("Location: " . '/');
        if ($id = isset($_GET['id']) ? intval($_GET['id']) : null) {
            $taskModel = new Task();
            $orginalTask = $taskModel->getOneTaskById($id);
            if (!$orginalTask) header("Location: " . PATH);
            $id = $orginalTask['id'];
            $name = $orginalTask['name'];
            $email = $orginalTask['email'];
            $text = $orginalTask['text'];
            $finish = $orginalTask['finish'];
        } else if ($id = isset($_POST['id']) ? intval($_POST['id']) : null) {
            $name = $this->getSafeText($_POST['name']) ?: null;
            $email = $this->getSafeText($_POST['email']) ?: null;
            $text = $this->getSafeText($_POST['text']) ?: null;
            $finish = $_POST['finish'] ?: 0;
            if ($name && $email && $text) {
                $re = '/[A-Z0-9._%+-]+@[A-Z0-9-]+.+.[A-Z]{2,4}/mi';
                preg_match_all($re, $email, $matches, PREG_SET_ORDER, 0);
                if (!empty($matches)) {
                    $email = $matches[0][0];
                    $taskModel = new Task();
                    $orginalTask = $taskModel->getOneTaskById($id);
                    $editAdmin = ($text != $orginalTask['text']) ? 1 : 0;
                    if (!$error = $taskModel->updTask($id, $name, $email, $text,$finish, $editAdmin)) {
                        $_SESSION['success'] = "Запись прошла успешно";
                        header("Location: " . PATH);
                    };
                } else {
                    $message = 'Неверно написан email';
                }
            }
        } else {
            $_SESSION['success'] = "Неверные параметры";
            header("Location: " . PATH);
        }
        $this->setData(compact('id', 'admin', 'message', 'name', 'text', 'email', 'finish'));
    }
}
