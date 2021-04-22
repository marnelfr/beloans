<?php
namespace App\Model;

use Core\Model\Model;

class DocumentModel extends Model {

    protected $table = 'ac_document';

    /*public function deleting($idUser, $taille){
        $req = $this->base->prepare('select * from ac_document where idUser=?', $this->entity, false, [$idUser]);
        if(!empty($req)){
            $id = end($req)->idDocument;
            $size = end($req)->taille;
            $size -= $taille;
            $this->base->request(
                'update ac_document set taille=? where idDocument=?',
                [$size, $id]
            );
        }
        return false;
    }*/

    public function alll($id){
        return $this->base->prepare(
            'select * from ' . $this->table . ' where idUser=? order by idDocument desc',
            $this->entity,
            false,
            [$id]
        );
    }

    public function total($id){
        $req = $this->base->prepare('select count(*) as num from ac_document where idUser=?', $this->entity, true, [$id]);
        if($req){
            return $req->num;
        }
        return 0;
    }



}