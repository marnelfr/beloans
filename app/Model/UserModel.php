<?php
namespace App\Model;

use Core\Model\Model;

class UserModel extends Model{

    protected $table = 'ac_users';

    public function check($num, $nom){
        $req = $this->base->prepare(
            'select nom, prenom
            from ac_users
            where num = ?',
            null,
            true,
            [$num]
        );
        $parts = explode(' ', $nom);
        $n = $parts[0];
        if($req and isset($parts[1])){
            $nn = $parts[1];
            if((strtolower($n) == strtolower($req->nom) and strtolower($nn) == strtolower($req->prenom))
                or (strtolower($nn) == strtolower($req->nom) or strtolower($n) == strtolower($req->prenom))){
                return true;
            }else{
                session('differentz', true);
            }
        }
        return false;
    }

    public function checkNum($num){
        return $this->base->prepare(
            'select idUser
            from ac_users
            where num = ?',
            null,
            true,
            [$num]
        );
    }


    public function allTransfer($id){
        $req =  $this->base->prepare(
            'select av.montant, v2.num, av.heure 
             from ac_virement av, ac_users ax, ac_etat et, ac_virement2 v2
             where av.idSender=? 
             and av.idVirement=et.idVirement
             and av.idVirement=v2.idVirement
             and et.fini=TRUE
             group by av.idVirement
             ORDER BY av.heure desc limit 8',
            $this->entity,
            false,
            [$id]
        );

        return $req;
    }

    public function getReceiveur($id){
        $interne = $this->base->prepare(
            'select idReceiver
            from ac_virement
            where idVirement=?',
            $this->entity,
            true,
            [$id]
        )->idReceiver;

        if($interne == '0'){
            return $this->base->prepare(
                'select b.designation, v2.num, v1.montant, r.nom, v2.pays, v2.ville, v1.idVirement
                 from ac_banque b, ac_virement2 v2, ac_virement v1, ac_receiveur r
                 where v1.idVirement=?
                 and v1.idVirement = v2.idVirement
                 and v2.idBanque = b.idBanque
                 and v2.idReceiveur = r.idReceiveur',
                 $this->entity,
                 true,
                 [$id]
            );
        }else{
            return $this->base->prepare(
                'select b.designation, v2.num, v1.montant, concat(concat(u.nom, " "), u.prenom) as nom, v2.pays, v2.ville, v1.idVirement
                 from ac_banque b, ac_virement2 v2, ac_virement v1, ac_users u
                 where v1.idVirement=?
                 and v1.idVirement = v2.idVirement
                 and b.idBanque = v2.idBanque
                 and v1.idReceiver = u.idUser',
                $this->entity,
                true,
                [$id]
            );
        }
    }


    public function updateUser($id, $nom, $prenom, $email, $country, $pwd = null){
        if($pwd === null){
            return $this->base->request(
                'update ac_users set nom=?, prenom=?, email=?, country=? where idUser=?',
                [$nom, $prenom, $email, $country, $id]
            );
        }else{
            return $this->base->request(
                'update ac_users set nom=?, prenom=?, email=?, country=?, pwd=? where idUser=?',
                [$nom, $prenom, $email, $country, $pwd, $id]
            );
        }
    }

    public function dropData($id){
        $this->base->request('DELETE FROM ac_admin WHERE idUser=?', [$id]);
        $this->base->request('DELETE FROM ac_credit WHERE idUser=?', [$id]);
        $this->base->request('DELETE FROM ac_demande WHERE idUser=?', [$id]);
        $this->base->request('DELETE FROM ac_document WHERE idUser=?', [$id]);
        $this->base->request('DELETE FROM ac_locks WHERE idUser=?', [$id]);
        $this->base->request('DELETE FROM ac_message WHERE emetteurId=?', [$id]);
        $this->base->request('DELETE FROM ac_message WHERE receveurId=?', [$id]);
        $this->base->request('DELETE FROM ac_password WHERE idUser=?', [$id]);
        $this->base->request('DELETE FROM ac_virement WHERE idSender=?', [$id]);
        $this->base->request('DELETE FROM ac_virement WHERE idReceiver=?', [$id]);
        return $this->base->request('DELETE FROM ac_users WHERE idUser=?', [$id]);
    }

    public function removeAsk($id){
        return $this->base->request(
            'delete from ac_password where idUser=?',
            [$id]
        );
    }

    public function allUsers(){
        return $this->base->prepare(
            //            'select * from ac_users u, ac_credit c where u.idUser=c.idUser and u.idUser=?',
        'select * from ac_users u, ac_locks l, ac_credit c where u.idUser=l.idUser and c.idUser=u.idUser',
            $this->entity
        );
    }


    public function nouveauMdp($id, $mdp){
        return $this->base->request(
            'update ac_users set pwd=? where idUser=?',
            [$mdp, $id]
        );
    }

    public function getUser($token){
        return $this->base->prepare(
            'select u.idUser, email, token_csrf as tok from ac_users u, ac_password a where a.idUser=u.idUser and token_csrf=?',
            $this->entity,
            true,
            [$token]
        );
    }

    public function forgetten($email){
        $id = $this->base->prepare(
            'select idUser from ac_users where email=?',
            $this->entity,
            true,
            [$email]
        );
        $tok = uniqid() . strtoupper(uniqid()) . uniqid();
        if($id){
            if($this->base->request('insert into ac_password values (null, ?, ?)', [$tok, $id->idUser])){
                return $tok;
            }
        }
        return false;
    }

    public function modification($idUser, $pays, $nom, $prenom, $email, $pwd = null){
        if($pwd === null){
            return $this->base->request(
                'update ac_users set country=?, nom=?, prenom=?, email=? where idUser=?',
                [$pays, $nom, $prenom, $email, $idUser]
            );
        }else{
            return $this->base->request(
                'update ac_users set country=?, nom=?, prenom=?, email=?, pwd=? where idUser=?',
                [$pays, $nom, $prenom, $email, $pwd, $idUser]
            );
        }
    }

    public function deletingFile($idUser, $fileSize){
        return $this->updateSize($idUser, $this->getSize($idUser)-$fileSize);
    }

    public function updateSize($idUser, $newSize){
        return $this->base->request(
            'UPDATE ac_users SET taille=? WHERE idUser=?',
            [$newSize, $idUser]
        );
    }

    public function getSize($idUser){
        $req = $this->base->prepare('select taille from ac_users where idUser=?', $this->entity, true, [$idUser]);
        if($req){
            return $req->taille;
        }else{
            return 0;
        }
    }

    public function newPhoto($id){
        return $this->base->request(
            'UPDATE ac_users SET photo="1" WHERE idUser=?',
            [$id]
        );
    }

    public function allTransaction($id){
        return $this->base->prepare(
            'select av.montant, ax.num, av.heure 
            from ac_virement av, ac_users ax 
            where av.idSender=? 
            and av.idReceiver=ax.idUser
            ORDER BY av.heure desc',
            $this->entity,
            false,
            [$id]
        );
    }
    public function allTransaction2($id){
        return $this->base->prepare(
            'select av.montant, ax.num, av.heure 
            from ac_virement av, ac_virement2 ax 
            where av.idSender=? 
            and av.idVirement=ax.idVirement
            ORDER BY av.heure desc',
            $this->entity,
            false,
            [$id]
        );
    }
    public function allTransaction3($id){
        return $this->base->prepare(
            'select montant, numero as num, heure
            from ac_depot
            where idUser=? 
            ORDER BY heure desc',
            $this->entity,
            false,
            [$id]
        );
    }

    public function actualTransfert($id){
        $req = $this->base->prepare(
            'select av.montant, et.pourcent, av.idVirement, av.idReceiver
             from ac_virement av, ac_users ax, ac_etat et 
             where av.idSender=?
             and av.idVirement=et.idVirement
             and av.idSender=ax.idUser
             and et.fini=FALSE
             ORDER BY av.heure desc limit 2',
            $this->entity,
            true,
            [$id]
        );
        if($req){
            if($req->idReceiver == '0'){
                session('falseReceiver', true);
                $r = $this->base->prepare(
                    'select idReceiveur from ac_virement2 where idVirement=?',
                    $this->entity,
                    true,
                    [$req->idVirement]
                );
                if($r){
                    $req->idReceiver = $r->idReceiveur;
                }
            }
        }
        return $req;
    }


    public function tranferer2($montant, $idSender, $numreceiveur, $admin){
        $Sender = $this->base->prepare(
            'select * from ac_users, ac_credit where ac_users.idUser=ac_credit.idUser and ac_users.idUser=?',
            $this->entity,
            true,
            [$idSender]
        );
        $RestSender = $Sender->montant - $montant;

        $trans2 = $this->base->request(
            'UPDATE ac_credit
            SET montant=?
            WHERE idUser=?',
            [$RestSender, $Sender->idUser]
        );
        if($trans2){
            if($admin){
                $this->base->request(
                    'insert into ac_virement values (null, ?, ?, ?, NOW())',
                    [$Sender->idUser, 0, $montant]
                );
            }
            return true;
        }
        return false;
    }

    public function tranferer($montant, $idSender, $numreceiveur, $admin){
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
        $RestSender = $Sender->montant - $montant;
        $SoldeReceiveur = $Receiveur->montant + $montant;

        $trans = $this->base->request(
            'UPDATE ac_credit
            SET montant=?
            WHERE idUser=?',
            [$SoldeReceiveur, $Receiveur->idUser]
        );
        $trans2 = $this->base->request(
            'UPDATE ac_credit
            SET montant=?
            WHERE idUser=?',
            [$RestSender, $Sender->idUser]
        );
        if($trans and $trans2){
            if($admin){
                $this->base->request(
                    'insert into ac_virement values (null, ?, ?, ?, NOW())',
                    [$Sender->idUser, $Receiveur->idUser, $montant]
                );
            }
            return true;
        }
        return false;
    }

    public function totalNewMessage($receveurId){
        return $this->base->prepare(
            'SELECT COUNT(*) AS num
            FROM ac_message, ' . $this->table . '
            WHERE ac_message.receveurId = ' . $this->table . '.idUser
            AND ac_message.receveurId=?
            AND brouillon="0"
            AND date_consult <= dateheure
           ',
            $this->entity,
            true,
            [$receveurId]
        );
    }

    public function dateConsult($id){
        return $this->base->request(
            'UPDATE ' . $this->table . '
            SET date_consult=NOW()
            WHERE idUser=?',
            [$id]
        );
    }

    public function idForMail($email){
        $req = $this->base->prepare(
            'SELECT idUser
            FROM ' . $this->table . '
            WHERE email=?',
            $this->entity,
            true,
            [$email]
        );
        if($req === false){
            return '0';
        }else{
            return $req->idUser;
        }
    }

    public function find($id){
        return $this->base->prepare(
            'select * from ac_users u, ac_credit c where u.idUser=c.idUser and u.idUser=?',
            $this->entity,
            true,
            [$id]
        );
    }


    public function finder($email){
        $num = strpos($email, '@');
        if($num == false){
            $email = str_replace('-', '', $email);
            return $this->base->prepare(
               'select *
                from ac_users
                where num = ?',
                null,
                true,
                [$email]
            );
        }else{
            return $this->base->prepare(
               'select *
                from ac_users
                where email = ?',
                null,
                true,
                [$email]
            );
        }
    }


}