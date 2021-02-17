<?php
namespace core;

class Model
{
    public $db;
    public function __construct()
    {
        $this->db=mysqli_connect('localhost','root', 'root','test');
        if (!$this->db) {
            exit('Нет соединения с базой данных');
        }
        mysqli_query($this->db, "SET NAMES 'UTF8'");
    }
    public function getQuerry($querry){
        $result = mysqli_query($this->db, $querry);
        if(!$result) {
            exit(mysqli_error($this->db));
        }

        $row=array();
        for ($i=0;$i<mysqli_num_rows($result);$i++) {
            $row[]=mysqli_fetch_array($result,MYSQLI_ASSOC);
        }
        return $row;
    }

    public function getOneQuerry ($querry){
        $result = mysqli_query($this->db, $querry);
        if(!$result) {
            exit(mysqli_error($this->db));
        }
        $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
        return $row;
    }
    public function getUpd ($querry){
        if (!mysqli_query($this->db, $querry)) {
            return mysqli_error($this->db);
        }
    }

    public function getCount($table){
        $result = mysqli_query($this->db, "SELECT COUNT(1) FROM {$table}");
        $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
        return $row;
    }

}
