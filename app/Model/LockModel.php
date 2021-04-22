<?php
/**
 * Created by PhpStorm.
 * User: Marnel Fresh'eur
 * Date: 29/03/2017
 * Time: 20:34
 */

namespace App\Model;

use Core\Model\Model;

class LockModel extends Model {

    protected $id = 'idLock';

    public function revoke($idPersonne, $bool = '1'){
        $req = $this->base->request(
            'UPDATE ' . $this->table . '
             SET locked=?
             WHERE idUser=?',
            [$bool, $idPersonne]
        );
        if($req === false){
            return false;
        }else{
            $_SESSION['bloquer'] = true;
            return $req;
        }
    }

    public function locked($id){
        if($this->base->prepare(
            'select locked from ac_locks where idUser=?',
            $this->entity,
            true,
            [$id]
        )->locked){
            return true;
        }
        return false;
    }

}