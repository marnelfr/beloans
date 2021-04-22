<?php
namespace App\Model;

use Core\Model\Model;

class VirementModel extends Model {


    public function newone2($montant, $idSender, $numreceiveur, $banque, $nom, $pays, $ville){
        $Sender = $this->base->prepare(
            'select * from ac_users, ac_credit where ac_users.idUser=ac_credit.idUser and ac_users.idUser=?',
            $this->entity,
            true,
            [$idSender]
        );

        $Receiveur = $this->base->prepare(
            'select * from ac_receiveur where nom=?',
            $this->entity,
            true,
            [$nom]
        );
        if($Receiveur){
            $Receiveur = $Receiveur->idReceiveur;
        }else{
            $this->base->request('insert into ac_receiveur values (null, ?)', [$nom]);
            $Receiveur = $this->lastId();
        }
        $Banque = $this->base->prepare(
            'select * from ac_banque where designation=?',
            $this->entity,
            true,
            [$banque]
        );
        if($Banque){
            $Banque = $Banque->idBanque;
        }else{
            $this->base->request('insert into ac_banque values (null, ?)', [$banque]);
            $Banque = $this->lastId();
        }

        $virement = $this->base->request(
            'insert into ac_virement values (null, ?, ?, ?, NOW())',
            [$Sender->idUser, 0, $montant]
        );
        if($virement){
            $virement = $this->lastId();
            if($this->base->request(
                'insert into ac_etat (idVirement) values (?)',
                [$virement]
            )){
                if($this->base->request(
                    'insert into ac_virement2 values (null, ?, ?, ?, ?, ?, ?)',
                    [$numreceiveur, $pays, $ville, $Banque, $Receiveur, $virement]
                )){
                    return $virement;
                }
            }
        }
        return false;
    }

    public function newone3($montant, $idSender, $numreceiveur){
        $Sender = $this->base->prepare(
            'select * from ac_users, ac_credit where ac_users.idUser=ac_credit.idUser and ac_users.idUser=?',
            $this->entity,
            true,
            [$idSender]
        );
        $virement = $this->base->request(
            'insert into ac_virement values (null, ?, ?, ?, NOW())',
            [$Sender->idUser, 0, $montant]
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
                'insert into ac_etat (idEtat, idVirement) values (?, ?)',
                [null, $virement]
            )){
                return $virement;
            }
        }
        return false;
    }

}