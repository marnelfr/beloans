<?php
namespace App\Model;

use Core\Model\Model;

class CreditModel extends Model {

    protected $table = 'ac_credit';

    public function newUser($idUser){
        return $this->base->prepare(
            ''
        );
    }


}