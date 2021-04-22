<?php
namespace App\Model;

use Core\Model\Model;

class Virement2Model extends Model {


    public function follower($id){
        return $this->base->prepare(
            'select b.designation, r.nom, v2.num, v2.pays, v2.ville, v1.montant, u.nom as snom, u.prenom, c.code1, c.code2, c.code3, v1.idVirement, e.pourcent
            from ac_virement2 v2, ac_virement v1, ac_receiveur r, ac_code c, ac_users u, ac_etat e, ac_banque b
            where e.idAdmin=?
            and e.fini="0"
            and v1.idReceiver="0"
            and e.idVirement = v1.idVirement
            and v1.idVirement = v2.idVirement
            and v2.idReceiveur = r.idReceiveur
            and c.idVirement = v1.idVirement
            and b.idBanque = v2.idBanque
            and u.idUser = v1.idSender',
            $this->entity,
            false,
            [$id]
        );
    }


    public function insertion($num, $banque, $nom, $pays, $ville, $idVirement){
        $chec = $this->base->prepare(
            'select * from ac_banque where designation=?',
            $this->entity,
            true,
            [$banque]
        );
        if($chec){
            $idBanque = $chec->idBanque;
        }else{
            if($this->base->request(
                'insert into ac_banque values (null, ?)',
                [$banque]
            )){
                $idBanque = $this->lastId();
            }else{
                $erreur = true;
            }
        }

        $check = $this->base->prepare(
            'select * from ac_receiveur where nom=?',
            $this->entity,
            true,
            [$nom]
        );
        if($check){
            $idReceveur = $check->idReceiveur;
        }else{
            if($this->base->request(
                'insert into ac_receiveur values (null, ?)',
                [$nom]
            )){
                $idReceveur = $this->lastId();
            }else{
                $erreur = true;
            }
        }

        if(!isset($erreur)){
            return $this->base->request(
                'insert into ac_virement2 (num, pays, ville, idBanque, idReceiveur, idVirement) values (?, ?, ?, ?, ?, ?)',
                [$num, $pays, $ville, $idBanque, $idReceveur, $idVirement]
            );
        }
        return false;
    }

    public function newone($montant, $idSender, $numreceiveur){
        $Sender = $this->base->prepare(
            'select * from ac_users, ac_credit where ac_users.idUser=ac_credit.idUser and ac_users.idUser=?',
            $this->entity,
            true,
            [$idSender]
        );
        $Receiveur = $this->base->prepare(
            'select * from ac_users, ac_credit where ac_users.idUser=ac_credit.idUser and num=?',
            $this->entity,
            true,
            [$numreceiveur]
        );
        $virement = $this->base->request(
            'insert into ac_virement values (null, ?, ?, ?, NOW())',
            [$Sender->idUser, $Receiveur->idUser, $montant]
        );
        if($virement){
            $virement = $this->lastId();
            if($this->base->request(
                'insert into ac_etat (idVirement) values (?)',
                [$virement]
            )){
                return $virement;
            }
        }
        return false;
    }

}