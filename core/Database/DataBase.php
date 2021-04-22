<?php
namespace Core\Database;

use \PDO;

class DataBase{

    private $db_name;
    private $db_user;
    private $db_host;
    private $db_pass;

    private $base;
    
    public function lastId(){
        return $this->getPDO()->lastInsertId();
    }

    public function query($statement, $attributes = null){
        if($attributes === null){
            return $this->getPDO()->query($statement);
        }else{
            $req = $this->getPDO()->prepare($statement);
            return $req->execute($attributes);
        }
    }

    public function request($statement, $attributes = null){
        $req = $this->getPDO()->prepare($statement);
        return $req->execute($attributes);
    }

    public function prepare($statement, $class_name = null, $one = false, $attributes = null){
        $req = $this->getPDO()->prepare($statement);
        $req->execute($attributes);
        if($class_name === null){
            $req->setFetchMode(PDO::FETCH_OBJ);
        }else{
            $req->setFetchMode(PDO::FETCH_CLASS, $class_name);
        }
        if($one){
            return $req->fetch();
        }else{
            return $req->fetchAll();
        }
    }

    public function getPDO(){
        if($this->base === null){
            $this->base = new PDO(
                'mysql:host=' . $this->db_host . ';dbname=' . $this->db_name . ';charset=utf8',
                $this->db_user,
                $this->db_pass
            );
            $this->base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return $this->base;
    }

    public function __construct($db_name, $db_user = 'root', $db_pass = '', $db_host = 'localhost'){
        $this->db_host = $db_host;
        $this->db_name = $db_name;
        $this->db_pass = $db_pass;
        $this->db_user = $db_user;
    }

}