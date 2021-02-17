<?php


namespace app\model;

use core\Model;

class Task extends Model
{
    public function getOneTaskById($id){
        $query="SELECT id, name,email,text,finish,edit_admin FROM task WHERE id='{$id}' LIMIT 1";
        return $this->getOneQuerry($query);
    }

    public function updTask($id,$name,$email,$text,$finish=0,$editAdmin=0){
        $name=mysqli_real_escape_string($this->db,$name);
        $text=mysqli_real_escape_string($this->db,$text);
        $query = "UPDATE task SET name='$name', email='$email',text='$text',finish='$finish',edit_admin='$editAdmin' WHERE id='$id'";
        return $this->getUpd($query);
    }

    public function getTask($start,$perpage,$orderBy,$by){
        $query="SELECT id, name,email,text,finish, edit_admin FROM task ORDER BY {$orderBy} {$by} LIMIT {$start},{$perpage}";
        return $this->getQuerry($query);
    }
    public function newTask($name,$email,$text,$finish=0,$editAdmin=0){
        $name=mysqli_real_escape_string($this->db,$name);
        $text=mysqli_real_escape_string($this->db,$text);
        $query = "INSERT INTO task (name, email,text,finish,edit_admin) VALUES('$name','$email', '$text', '$finish','$editAdmin')";
        return $this->getUpd($query);
    }
}
