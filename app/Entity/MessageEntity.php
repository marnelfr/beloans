<?php
namespace App\Entity;


use Core\Entity\Entity;

class MessageEntity extends Entity {

    public function getExtrait(){
        return substr($this->contenu, 0, 45) . '...';
    }


}