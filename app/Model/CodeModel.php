<?php
/**
 * Created by PhpStorm.
 * User: Marnel Fresh'eur
 * Date: 30/04/2017
 * Time: 01:37
 */

namespace App\Model;


use Core\Model\Model;

class CodeModel extends Model{

    protected $id = 'idCode';
    protected $table = 'ac_code';

    public function fill($id){
        return $this->base->query(
            'insert into ac_code (idVirement) values (?)',
            [$id]
        );
    }

    public function generer(){
        $code = '00000';
        do{
            $code = strtoupper(substr(uniqid(), 6, 5));
        }while($code == '00000');
        return $code;
    }

    public function create($idVirement){
        return $this->base->query(
            'update ac_code set code1=? where idVirement=?',
            [$this->generer(), $idVirement]
        );
    }

    public function second($idVirement){
        return $this->base->query(
            'update ac_code set code2=? where idVirement=?',
            [$this->generer(), $idVirement]
        );
    }

    public function third($idVirement){
        return $this->base->query(
            'update ac_code set code3=? where idVirement=?',
            [$this->generer(), $idVirement]
        );
    }


    public function get($idVirement, $n){
        $code = 'code' . $n;
        $num = $this->base->prepare(
            'select ' . $code . ' from ac_code where idVirement=?',
            $this->entity,
            true,
            [$idVirement]
        );
        return $num->$code;
    }


}