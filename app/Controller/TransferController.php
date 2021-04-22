<?php
/**
 * Created by PhpStorm.
 * User: Marnel Fresh'eur
 * Date: 07/05/2017
 * Time: 03:03
 */

namespace App\Controller;


class TransferController extends UserController {

    public function partsofT(){
        session('effectuer', true);
        if(isset($_SESSION['Dq5ld'])){
            $_SESSION['Dq5ld'] = strtoupper($_SESSION['Dq5ld']);
            echo $_SESSION['Dq5ld'];
        }
    }

    public function generer(){
        if(isset($_POST['etat']) and isset($_POST['id'])){
            $etat = strip_tags($_POST['etat']);
            $id = strip_tags($_POST['id']);
            switch($etat){
                case 25:
                    $this->Code->create($id);
                    break;
                case 50:
                    $this->Code->second($id);
                    break;
                case 75:
                    $this->Code->third($id);
                    break;
            }
            header('location: index.php?p=admin/transactions');
        }
    }


    public function partsofT2(){
        session('notransfert', true);
        if(session('notransfert')){
            session('notransfert', false);
            if(isset($_GET['num']) and isset($_GET['mon']) and isset($_GET['vil']) and isset($_GET['py']) and isset($_GET['nm']) and isset($_GET['bq'])){
                if($_GET['num'] == ''){
                    session('void', true);
                    echo 'void';
                }elseif($_GET['mon'] == '0'){
                    echo 'mfK';
                    session('monZero', true);
                }elseif(empty($_GET['nm']) or empty($_GET['bq']) or empty($_GET['py']) or empty($_GET['vil'])){
                    session('voidd', true);
                    echo 'voidd';
                }else{
                    $num = str_replace('-', '', $_GET['num']);
                    if(strtolower($_GET['bq']) == 'beloans'){
                        if($this->User->check($num, strip_tags($_GET['nm']))){
                            $id = $this->Virement->newone(strip_tags($_GET['mon']), $this->idConnected, $num);
                            if($id){
                                if($this->Virement2->insertion($num, strip_tags($_GET['bq']), strip_tags($_GET['nm']), strip_tags($_GET['py']), strip_tags($_GET['vil']), $id)){
                                    if($this->Code->fill($id)){
                                        echo 'Dsl';
                                    }
                                }
                            }else{
                                session('tranferFail', true);
                                echo 'Fzd';
                            }
                        }else{
                            echo 'SqfTo';
                            if(!session('differentz')){
                                session('tranferNoCompte', true);
                            }else{
                                session('encoursNum', strip_tags($_GET['num']));
                                session('encoursbq', strip_tags($_GET['bq']));
                                session('encoursnm', strip_tags($_GET['nm']));
                                session('encoursmon', strip_tags($_GET['mon']));
                                session('encourspy', strip_tags($_GET['py']));
                                session('encoursvil', strip_tags($_GET['vil']));
                            }
                        }
                    }else{
                        $id = $this->Virement->newone3(strip_tags($_GET['mon']), $this->idConnected, $num);
                        if($id){
                            if($this->Virement2->insertion($num, strip_tags($_GET['bq']), strip_tags($_GET['nm']), strip_tags($_GET['py']), strip_tags($_GET['vil']), $id)){
                                if($this->Code->fill($id)){
                                    echo 'Dsl';
                                }
                            }
                        }else{
                            session('tranferFail', true);
                            echo 'Fzd';
                        }/*
                        $id = $this->Virement->newone2(strip_tags($_GET['mon']), $this->idConnected, $num, strip_tags($_GET['bq']), strip_tags($_GET['nm']), strip_tags($_GET['py']), strip_tags($_GET['vil']));
                        if($id){
                            $this->Code->fill($id);
                            echo 'Dsl';
                        }else{
                            session('tranferFail', true);
                            echo 'Fzd';
                        }*/
                    }
                }
            }
        }
    }

    public function partsofT3(){
        if(isset($_GET['c']) and isset($_GET['e'])){
            $code = $this->Code->get(strip_tags($_GET['e']), 1);
            if($code != '00000'){
                if($code == $_GET['c']){
                    echo '1';
                    $id = $this->Etat->adminId($_GET['e']);
                    $sms = 'Mes salutations monsieur l\'administrateur.<br>Je viens de valider le code de transfère <b>' . $_GET['c'] . '</b>.<br>Je vous prie de m\'envoyer le plus tôt possible, le deuxième code de transfère.<br>Voici mon numéro de compte: <b>' . $this->user->num . '</b>';
                    notification($id, $sms, 'Code de transaction', $this->idConnected);
                    //deja là, on notifie à l'administrateur pour qu'il génère le deuxieme code
                }else{
                    echo $code;
                    //echo '0';
                }
            }else{
                echo $code;
                //echo '0';
            }
        }
    }

    public function partsofT4(){
        if(isset($_GET['e'])){
            if($this->Etat->evolve(50, strip_tags($_GET['e']))){
                echo '1';
            }else{
                echo '0';
            }
        }
    }


    public function partsofT5(){
        if(isset($_GET['c']) and isset($_GET['e'])){
            $code = $this->Code->get(strip_tags($_GET['e']), 2);
            if($code != '00000'){
                if($code == $_GET['c']){
                    echo '1';
                    $id = $this->Etat->adminId($_GET['e']);
                    $sms = 'Mes salutations monsieur l\'administrateur.<br>Je viens de valider le code de transfère <b>' . $_GET['c'] . '</b>.<br>Je vous prie de m\'envoyer le plus tôt possible, le toisième code de transfère pouvant me permettre d\'achever la transaction.<br>Voici mon numéro de compte: <b>' . $this->user->num . '</b>';
                    notification($id, $sms, 'Code de transaction', $this->idConnected);
                }else{
                    echo '0';
                }
            }else{
                echo '0';
            }
        }
    }


    public function partsofT6(){
        if(isset($_GET['e'])){
            if($this->Etat->evolve(75, strip_tags($_GET['e']))){
                echo '1';
            }else{
                echo '0';
            }
        }
    }


    public function partsofT7(){
        if(isset($_GET['c']) and isset($_GET['e'])){
            $code = $this->Code->get(strip_tags($_GET['e']), 3);
            if($code != '00000'){
                if($code == $_GET['c']){
                    echo '1';
                }else{
                    echo '0';
                }
            }else{
                echo '0';
            }
        }
    }


    public function newone(){
        if(isset($_POST['token_csrf'])){
            if($_SESSION['token'] == $_POST['token_csrf']){
                if(isset($_POST['numCompte']) and isset($_POST['montant'])){
                    if($_POST['numCompte'] == ''){
                        session('void', true);
                        header('location:index.php?p=user/myaccount');
                    }
                    $_POST['numCompte'] = str_replace('-', '', $_POST['numCompte']);
                    if(strtolower(strip_tags($_POST['banque'])) == 'beloans'){
                        if($this->User->checkNum($_POST['numCompte'])){
                            if(session('AdminHJ4ssRF5')){
                                $admin = true;
                            }else{
                                $admin = false;
                            }
                            if($this->User->tranferer(strip_tags($_POST['montant']), $this->idConnected, strip_tags($_POST['numCompte'], $admin))){
                                if($admin){
                                    if($this->Admin->initialization($this->idConnected)){
                                        session('tranfer', true);
                                    }
                                }else{
                                    $id = (isset($_POST['idV'])) ? strip_tags($_POST['idV']) : '0';
                                    if($this->Etat->ending($id)){
                                        session('tranfer', true);
                                    }
                                }
                            }else{
                                session('tranferFail', true);
                            }
                        }else{
                            session('tranferNoCompte', true);
                        }
                    }else{
                        if(session('AdminHJ4ssRF5')){
                            $admin = true;
                        }else{
                            $admin = false;
                        }
                        if($this->User->tranferer2(strip_tags($_POST['montant']), $this->idConnected, strip_tags($_POST['numCompte'], $admin))){
                            if($admin){
                                if($this->Admin->initialization($this->idConnected)){
                                    session('tranfer', true);
                                }
                            }else{
                                $id = (isset($_POST['idV'])) ? strip_tags($_POST['idV']) : '0';
                                if($this->Etat->ending($id)){
                                    session('tranfer', true);
                                }
                            }
                        }else{
                            session('tranferFail', true);
                        }
                    }
                }else{
                    session('void', true);
                }
            }
        }
        header('location:index.php?p=user/myaccount');
    }

    public function follow(){
        if(isset($_POST['id'])){
            $this->Etat->follow($this->idConnected, strip_tags($_POST['id']));
        }
        header('location: index.php?p=admin/transactions');
    }


}