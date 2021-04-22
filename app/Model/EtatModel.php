<?php
/**
 * Created by PhpStorm.
 * User: Marnel Fresh'eur
 * Date: 07/05/2017
 * Time: 22:04
 */

namespace App\Model;

use Core\Model\Model;

class EtatModel extends Model {

    protected $id = 'idEtat';
    protected $table = 'ac_etat';

    public function adminId($idVirement){
        $req = $this->base->prepare(
            'select idAdmin from ac_etat where idVirement=?',
            $this->entity,
            true,
            [$idVirement]
        );
        if($req){
            return $req->idAdmin;
        }
        return false;
    }

    public function evolve($pourcentage, $id){
        return $this->base->request(
            'update ac_etat set pourcent=? where idVirement=?',
            [$pourcentage, $id]
        );
    }

    public function ending($id){
        return $this->base->request(
            'update ac_etat set fini=1 where idVirement=?',
            [$id]
        );
    }

    public function waiting(){
        $req = $this->base->prepare(
            'select count(*) as total from ac_etat where fini="0" and idAdmin="0"',
            $this->entity,
            true
        );
        if($req){
            return $req->total;
        }
        return 0;
    }

    public function follow($idAdmin, $idVirement){
        return $this->base->request(
            'update ac_etat set idAdmin=? where idVirement=?',
            [$idAdmin, $idVirement]
        );
    }

    public function lastes($id){
        return $this->base->prepare(
            'select *
            from ac_etat et, ac_virement vi, ac_users us, ac_code co
            where fini="1"
            and idAdmin=? 
            and et.idVirement=vi.idVirement
            and vi.idVirement=co.idVirement
            and us.idUser=vi.idSender
            order by heure desc',
            $this->entity,
            false,
            [$id]
        );
    }

    public function laste($id){
        return $this->base->prepare(
            'select *
            from ac_etat et, ac_virement vi, ac_users us, ac_code co
            where fini="1"
            and idAdmin=? 
            and et.idVirement=vi.idVirement
            and vi.idVirement=co.idVirement
            and us.idUser=vi.idSender
            order by heure desc
            limit 10',
            $this->entity,
            false,
            [$id]
        );
    }

    public function follower($id){
        return $this->base->prepare(
            'select *
            from ac_etat et, ac_virement vi, ac_users us, ac_code co
            where fini="0"
            and idReceiver!="0"
            and idAdmin=? 
            and et.idVirement=vi.idVirement
            and vi.idVirement=co.idVirement
            and us.idUser=vi.idSender',
            $this->entity,
            false,
            [$id]
        );
    }

    public function wait(){
        return $this->base->prepare(
            'select num, montant, vi.idVirement
            from ac_etat et, ac_virement vi, ac_users us
            where fini="0"
            and idAdmin="0" 
            and et.idVirement=vi.idVirement
            and us.idUser=vi.idSender',
            $this->entity,
            false
        );
    }

}