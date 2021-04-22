<?php
namespace App\Model;


use Core\Model\Model;

class MessageModel extends Model {

    protected $table = 'ac_message';

    public function alreadyRead($id){
        $message = $this->find($id);
        if($message->lu){
            return true;
        }else{
            return false;
        }
    }

    public function deleteMessage($id, $from){
        if($from === 'r'){
            return $this->base->request(
                'UPDATE ac_message
                 SET delReceveur="1"
                 WHERE idMessage=?',
                [$id]
            );
        }elseif ($from === 'e'){
            return $this->base->request(
                'UPDATE ac_message
                 SET delEmetteur="1"
                 WHERE idMessage=?',
                [$id]
            );
        }else{
            return null;
        }
    }

    public function find($id){
        return $this->base->prepare(
            'SELECT *
            FROM ac_message
            FULL JOIN ac_users
            ON emetteurId=idUser
            WHERE idMessage=?
           ',
            $this->entity,
            true,
            [$id]
        );
    }

    public function sendMessage($emetteurId, $receveurId, $sujet, $contenu, $ampliation = '0', $nomAmpliation = null, $brouillon = '0'){
        return $this->base->request(
            'INSERT INTO ac_message (idMessage, emetteurId, receveurId, sujet, contenu, ampliation, nomAmpliation, brouillon, dateheure)
            VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, CURRENT_TIMESTAMP)',
            [$emetteurId, $receveurId, $sujet, $contenu, $ampliation, $nomAmpliation, $brouillon]
        );
    }

    public function readMessage($messageId){
        return $this->base->prepare(
            'SELECT *
            FROM ac_message
            FULL JOIN ac_users
            ON emetteurId=idUser
            WHERE idMessage=?',
            $this->entity,
            true,
            [$messageId]
        );

    }

    public function read($id){
        $this->base->request(
            'UPDATE ac_message
            SET lu="1"
            WHERE idMessage=?',
            [$id]
        );
    }

    public function brouillons($emetteurId, $total = false){
        if($total){
            $select = 'COUNT(*)';
        }else{
            $select = '*';
        }
        return $this->base->prepare(
            'SELECT ' . $select . '
            FROM ac_message
            FULL JOIN ac_users
            ON receveurId=idUser
            WHERE emetteurId=?
            AND brouillon="1"
           ',
            $this->entity,
            false,
            [$emetteurId]
        );
    }

    public function sentMessages($emetteurId, $total = false){
        if($total){
            $select = 'COUNT(*)';
        }else{
            $select = '*';
        }
        return $this->base->prepare(
            'SELECT ' . $select . '
            FROM ac_message
            FULL JOIN ac_users
            ON receveurId=idUser
            WHERE emetteurId=?
            AND brouillon="0"
            AND delEmetteur="0"
           ',
            $this->entity,
            false,
            [$emetteurId]
        );
    }

    public function receivedMessages($receveurId, $total = false){
        if($total){
            $select = 'COUNT(*)';
        }else{
            $select = 'idMessage, emetteurId, receveurId, lu, delReceveur, sujet, contenu, ampliation, nomAmpliation, brouillon, dateheure, nom, prenom, email, country, date_consult ';
        }
        return $this->base->prepare(
            'SELECT ' . $select . '
            FROM ac_message
            FULL JOIN ac_users
            ON emetteurId=idUser
            WHERE receveurId=?
            AND brouillon="0"
            AND delReceveur="0"
            ORDER BY idMessage DESC
           ',
            $this->entity,
            false,
            [$receveurId]
        );
    }

}