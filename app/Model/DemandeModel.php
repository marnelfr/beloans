<?php
/**
 * Created by PhpStorm.
 * User: Harold ADJAHO
 * Date: 06/05/2017
 * Time: 15:22
 */

namespace App\Model;

use Core\Model\Model;

class DemandeModel extends Model {

    protected $table = 'ac_demande';

    public function total($id){
        $nbr = $this->base->prepare(
            'select count(*) as total from ac_demande where idUser=?',
            $this->entity,
            true,
            [$id]
        );
        return $nbr->total;
    }

}