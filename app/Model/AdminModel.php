<?php
/**
 * Created by PhpStorm.
 * User: Marnel Fresh'eur
 * Date: 29/03/2017
 * Time: 16:12
 */

namespace App\Model;

use Core\Model\Model;

class AdminModel extends Model {

    protected $id = 'idAdmin';
    protected $table = 'ac_admin';

    public function modifiantMontant($mon, $id, $idAdmin){
        if($this->base->request(
            'update ac_credit set montant=? where idUser=?',
            [$mon, $id]
        )){
            return $this->base->request(
                'insert into ac_extra (idAdmin, idUser, montant) values (?,?,?)',
                [$idAdmin, $id, $mon]
            );
        }
        return false;
    }

    public function findUser($id){
        return $this->base->prepare(
            'select * from ac_admin where idUser=?',
            $this->entity,
            true,
            [$id]
        );
    }

    public function initialization($id){
        if($this->findUser($id)){
            return $this->justInit($id);
        }
        return null;
    }

    public function justInit($id){
        return $this->base->request(
            'update ac_credit set montant=? where idUser=?',
            [1000000, $id]
        );
    }

    public function firstAdmin(){
        $all = $this->base->prepare(
            'select idUser from ac_admin',
            $this->entity,
            false
        );
        $id = $all[0];
        return $id->idUser;
    }

}