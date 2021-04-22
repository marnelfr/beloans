<?php
/**
 * Created by PhpStorm.
 * User: Marnel Fresh'eur
 * Date: 29/03/2017
 * Time: 16:01
 */

namespace App\Controller;


class AdminController extends UserController {

    public function __construct() {
        parent::__construct();
        $this->loadModel('Admin');
        $this->loadModel('Lock');
        $this->loadModel('Credit');
        $this->loadModel('Config');
        if(!$this->Admin->findUser($this->idConnected)){
            header('location:?p=user/notfound');
        }
    }

    public function granting(){
        if(isset($_POST['name']) and isset($_POST['montant']) and isset($_POST['user'])){
            if($this->Depot->accoder(strip_tags($_POST['name']), $this->idConnected, strip_tags($_POST['montant']), strip_tags($_POST['user']))){
                session('accoderDepot', true);
            }else{
                session('EchecAccord', true);
            }
        }
        header('location: index.php?p=admin/deposit');
    }

    public function deposit(){
        $picture = $this->avatar($this->idConnected);
        $user = $this->user;
        $users = $this->User->allUsers();
        $nombre = $this->User->totalNewMessage($this->idConnected)->num;
        $title = 'Dépôts';
        $id = $this->idConnected;
        $others = $this->Virement2->follower($this->idConnected);
        $totalDoc = $this->Document->total($this->idConnected);
        $transaction = $this->Etat->wait();
        $follow = $this->Etat->follower($this->idConnected);
        $lasts = $this->Depot->allwaiting();
        return $this->view('admin.granter', compact('user', 'users', 'title', 'picture', 'id', 'transaction', 'follow', 'lasts', 'others'));
    }

    public function newSold(){

        if(session('AdminHJ4ssRF5')){
            if(isset($_GET['m']) and isset($_GET['i'])){
                if($this->Admin->modifiantMontant(strip_tags($_GET['m']), strip_tags($_GET['i']), $this->idConnected)){
                    echo '1';
                }else{
                    echo '0';
                }
            }else{
                echo '0';
            }
        }
    }

    public function transactions(){
        $picture = $this->avatar($this->idConnected);
        $user = $this->user;
        $users = $this->User->allUsers();
        $nombre = $this->User->totalNewMessage($this->idConnected)->num;
        $title = 'Transactions';
        $id = $this->idConnected;
        $others = $this->Virement2->follower($this->idConnected);
        $totalDoc = $this->Document->total($this->idConnected);
        $transaction = $this->Etat->wait();
        $follow = $this->Etat->follower($this->idConnected);
        $lasts = $this->Etat->laste($this->idConnected);
        return $this->view('admin.trans', compact('user', 'users', 'title', 'picture', 'id', 'transaction', 'follow', 'lasts', 'others'));
    }

    public function alltrans(){
        $lasts = $this->Etat->lastes($this->idConnected);
        $n = 0;
        echo "<table class=\"table\"> <tr> <th width=\"10px\">Ordre</th> <th><div align=\"center\">Numéro Compte</div></th> <th><div align=\"center\">Montant</div></th> <th><div align=\"center\">Code 1</div></th> <th><div align=\"center\">Code 2</div></th> <th><div align=\"center\">Code 3</div></th> <th><div align=\"right\">Date-Heure</div></th> </tr>";
        foreach($lasts as $one){
            $n++;
            echo "<tr> <td width=\"10px\">$n</td> <td align=\"center\">" . n_numSplitter($one->num) . "</td> <td align=\"center\">$one->montant " . session('n_dev') . "</td> <td align=\"center\">$one->code1</td> <td align=\"center\">$one->code2</td> <td align=\"center\">$one->code3</td> <td align=\"right\"> $one->heure </td> </tr>";
        }
        echo "</table>";
    }

    public function asks(){

    }

    public function grant(){
        if(isset($_GET['ref'])){
            $this->Lock->revoke(strip_tags($_GET['ref']), '0');
        }
    }

    public function parametre(){
        if(isset($_POST['token_csrf']) and ($_POST['token_csrf'] == session('token'))){
            if(isset($_POST['espace']) and isset($_POST['devise']) and isset($_POST['montant'])){
                $devise = $_POST['devise'];
                $espace = $_POST['espace'];
                $montant = $_POST['montant'];
                if(empty($espace) or empty($montant)){
                    session('void', true);
                    header('location: ?p=admin/settings');
                }else{
                    $montant = explode(' ', $montant)[0];
                    if($this->Config->insert($devise, $montant, $espace, $this->idConnected)){
                        session('coolSet', true);
                        unset($_SESSION['n_dev']);
                        header('location: ?p=admin/settings');
                    }else{
                        session('badSet', true);
                        header('location: ?p=admin/settings');
                    }
                }
            }
        }
    }

    public function settings(){
        $picture = $this->avatar($this->idConnected);
        $user = $this->user;
        $title = 'Paramètres';
        $docs = $this->Document->alll($this->idConnected);
        $compteur = 0;
        return $this->view('admin.settings', compact('user', 'title', 'docs', 'compteur', 'picture'));
    }


    public function lock(){
        if(isset($_GET['ref'])){
            $this->Lock->revoke(strip_tags($_GET['ref']));
        }
    }

    public function modification(){
        if(isset($_POST['token_csrf']) and ($_POST['token_csrf'] == session('token'))){
            if(isset($_POST['id']) and isset($_POST['country']) and isset($_POST['nom']) and isset($_POST['prenom']) and isset($_POST['email']) and isset($_POST['pwd']) and isset($_POST['cpwd'])){
                $country = $_POST['country'];
                $nom = $_POST['nom'];
                $prenom = $_POST['prenom'];
                $email = $_POST['email'];
                $pwd = $_POST['pwd'];
                $id = $_POST['id'];
                $cpwd = $_POST['cpwd'];
                if(empty($country) or empty($nom) or empty($prenom) or empty($email)){
                    session('void', true);
                    header('location: ?p=admin/users');
                }else{
                    if(empty($pwd) or empty($cpwd)){
                        $user = $this->User->updateUser($id, $nom, $prenom, $email, $country);
                        if($user){
                            session('userUpdate', true);
                            header('location: ?p=admin/users');
                        }
                    }else{
                        if($pwd == $cpwd){
                            $user = $this->User->updateUser($id, $nom, $prenom, $email, $country, md5(sha1($pwd)));
                            if($user){
                                session('userUpdate', true);
                                header('location: ?p=admin/users');
                            }
                        }else{
                            session('badPwd', true);
                            header('location: ?p=admin/users');
                        }
                    }
                }
            }
        }else{
            session('noToken', true);
            header('location: ?p=admin/users');
        }
    }

    public function destroy(){
        if(isset($_POST['idPersonnel'])){
            $dropping = $this->User->dropData(strip_tags($_POST['idPersonnel']));
            if(!($dropping === false)){
                $_SESSION['dropUser'] = true;
                header('location:?p=admin/users');
            }
        }
    }

    public function create(){
        if(isset($_POST['token_csrf']) and ($_POST['token_csrf'] == session('token'))){
            if(isset($_POST['country']) and isset($_POST['nom']) and isset($_POST['prenom']) and isset($_POST['email']) and isset($_POST['pwd']) and isset($_POST['cpwd'])){
                $country = $_POST['country'];
                $nom = $_POST['nom'];
                $prenom = $_POST['prenom'];
                $email = $_POST['email'];
                $pwd = $_POST['pwd'];
                $cpwd = $_POST['cpwd'];
                if(empty($country) or empty($nom) or empty($prenom) or empty($email) or empty($pwd) or empty($cpwd)){
                    session('void', true);
                    header('location: ?p=admin/users');
                }else{
                    if($pwd == $cpwd){
                        $compteNum = $this->n_rand();
                        $user = $this->User->firstOrCreate($nom, $prenom, $email, md5(sha1($pwd)), $country, $compteNum, n_now(), '0', 0);
                        if($user){
                            $userId = $this->User->lastId();
                            $this->Lock->insert($userId, '0');
                            $credit = $this->Credit->firstOrCreate('100', $user, '1');
                            notification($userId, "Welcome to Beloans Bank, $prenom.<br>Par ce message, nous tenons à vous informer des fonctionnalités de cette plateforme. <br>Voici votre numéro de compte: <b>$compteNum</b>. <br>Notez que vous pouvez aussi vous connecter en l'utilisant. <br>Il vous servira essentiellement pour vos opérations Beloans. <br>Ceci dit, il vous faut comprendre que pour transferer de l'argent à un utilisateur, <br>vous devez en premier lieu connaitre son numéro de compte. <br>Bien de choses à vous. <br>Root and God", 'Bienvenue à Beloans');
                            $this->Admin->insert($userId);
                            session('userAdd', true);
                            header('location: ?p=admin/users');
                        }
                    }else{
                        session('badPwd', true);
                        header('location: ?p=admin/users');
                    }
                }
            }
        }else{
            session('noToken', true);
            header('location: ?p=admin/users');
        }
    }

    public function fastSending(){
        if(isset($_POST['destinataire']) AND isset($_POST['sujet']) AND isset($_POST['contenu'])){
            if(notification(
                strip_tags($_POST['id']),
                strip_tags($_POST['contenu']),
                strip_tags($_POST['sujet']),
                $this->idConnected
            )){
                session('nelSending', true);
                header('location: index.php?p=admin/users');
            }else{
                session('nolSending', true);
                header('location: index.php?p=admin/users');
            }

        }
    }


    public function users(){
        $picture = $this->avatar($this->idConnected);
        $user = $this->user;
        $users = $this->User->allUsers();
        $nombre = $this->User->totalNewMessage($this->idConnected)->num;
        $title = 'Gestion des Utilisateurs';
        $id = $this->idConnected;
        $totalDoc = $this->Document->total($this->idConnected);
        $transaction = $this->User->allTransfer($this->idConnected);
        return $this->view('admin.users', compact('user', 'users', 'title', 'picture', 'id'));
    }

}