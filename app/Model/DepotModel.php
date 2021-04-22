<?php
/**
 * Created by PhpStorm.
 * User: PACKARD-BELL
 * Date: 22/05/2017
 * Time: 03:27
 */

namespace App\Model;


use Core\Model\Model;

class DepotModel extends Model {

    protected $table = 'ac_depot';

    public function accoder($id, $idAdmin, $montant, $idUser){
        $req = $this->base->request(
            'update ac_depot set granted="1", idAdmin=? where idDepot=?',
            [$idAdmin, $id]
        );

        if($req){
            $mon = $this->base->prepare(
                'select montant from ac_credit where idUser=?',
                $this->entity,
                true,
                [$idUser]
            );
            return $this->base->request(
                'update ac_credit set montant=? where idUser=?',
                [$montant+$mon->montant, $idUser]
            );
        }
        return false;
    }

    public function allwaiting(){
        return $this->base->prepare(
            'select * from ac_depot d, ac_users u where granted="0" and d.idUser=u.idUser',
            $this->entity,
            false
        );
    }

    public function waiting(){
        $req = $this->base->prepare(
            'select count(*) as total from ac_depot where granted="0"',
            $this->entity,
            true
        );
        if($req){
            return $req->total;
        }
        return 0;
    }

    public function newcarte($type, $num, $code, $montant, $id){
        return $this->base->request(
            'insert into ac_depot (typedepot, typecarte, numero, code, montant, idUser) values (?,?,?,?,?,?)',
            ['Carte', $type, $num, $code, $montant, $id]
        );
    }

    public function newtrans($num, $mdp, $montant, $id){
        return $this->base->request(
            'insert into ac_depot (typedepot, numero, code, montant, idUser) values (?,?,?,?,?)',
            ['Transfère instantané', $num, $mdp, $montant, $id]
        );
    }

    public function newvire($banque, $num, $montant, $id){
        return $this->base->request(
            'insert into ac_depot (typedepot, numero, banque, montant, idUser) values (?,?,?,?,?)',
            ['Virement interbancaire', $num, $banque, $montant, $id]
        );
    }

}