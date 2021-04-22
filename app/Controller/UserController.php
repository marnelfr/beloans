<?php
namespace App\Controller;


class UserController extends AppController{

    protected $template = 'backend';
    protected $idConnected;
    protected $user;
    protected $col;

    public function __construct() {
        parent::__construct();
        $this->col = 3;
        $this->loadModel('User');
        $this->loadModel('Code');

        if(!session('logged')){
            session('notConnected', true);
            header('location:?p=guest/login');
        }else{
            $this->idConnected = session('logged');
            $this->user = $this->User->find($this->idConnected);
            if(session('effectuer')){
                session('effectuer', false);
            }
        }
        $this->loadModel('Message');
        $this->loadModel('Virement');
        $this->loadModel('Depot');
        $this->loadModel('Virement2');
        $this->loadModel('Document');
        $this->loadModel('Code');
        $this->loadModel('Demande');
        $this->loadModel('Etat');
        $this->loadModel('Admin');
        $this->loadModel('Lock');
        if($this->Admin->findUser($this->idConnected)){
            session('AdminHJ4ssRF5', true);
            $this->col = 4;
            $this->Admin->justInit($this->idConnected);
        }
        if($this->Lock->locked($this->idConnected)){
            session('LockedNdkEsleL', true);
            header('location:?p=guest/login');
        }
    }

    public function newdepot(){
        if(isset($_POST['r3'])){
            switch($_POST['r3']){
                case 'carte':
                    if(
                        isset($_POST['montant']) and
                        isset($_POST['type']) and
                        isset($_POST['numcarte']) and
                        isset($_POST['securityCod'])
                    ){
                        $mon = strip_tags($_POST['montant']);
                        $type = strip_tags($_POST['type']);
                        $num = strip_tags($_POST['numcarte']);
                        $code = strip_tags($_POST['securityCod']);
                        if(empty($num) or empty($code) or ($mon == 0)){
                            session('voidDepot', true);
                        }else{
                            if($this->Depot->newcarte($type, $num, $code, $mon, $this->idConnected)){
                                session('coolDepot', true);
                            }
                        }
                    }
                    break;
                case 'trans':
                    if(
                        isset($_POST['montant']) and
                        isset($_POST['numcarte']) and
                        isset($_POST['securityCod'])
                    ){
                        $mon = strip_tags($_POST['montant']);
                        $num = strip_tags($_POST['numcarte']);
                        $code = strip_tags($_POST['securityCod']);
                        if(empty($num) or empty($code) or ($mon == 0)){
                            session('voidDepot', true);
                        }else{
                            if($this->Depot->newtrans($num, $code, $mon, $this->idConnected)){
                                session('coolDepot', true);
                            }
                        }
                    }
                    break;
                case 'vire':
                    if(
                        isset($_POST['montant']) and
                        isset($_POST['nomBanque']) and
                        isset($_POST['numcarte'])
                    ){
                        $mon = strip_tags($_POST['montant']);
                        $banque = strip_tags($_POST['nomBanque']);
                        $num = strip_tags($_POST['numcarte']);
                        if(empty($num) or empty($banque) or ($mon == 0)){
                            session('voidDepot', true);
                        }else{
                            if($this->Depot->newvire($banque, $num, $mon, $this->idConnected)){
                                session('coolDepot', true);
                            }
                        }
                    }
                    break;
                default:
                    session('inconnuDepot', true);
            }
        }
        header('location: index.php?p=user/mybalance');
    }

    public function notfound(){
        $this->template = 'notfound';
        return $this->view('notfound');
    }

    public function update(){
        if(isset($_POST['token_csrf']) and ($_POST['token_csrf'] == session('token'))){
            if(isset($_POST['country']) and isset($_POST['nom']) and isset($_POST['prenom']) and isset($_POST['email']) and isset($_POST['pwd']) and isset($_POST['cpwd']) and isset($_POST['apwd'])){
                $country = $_POST['country'];
                $nom = $_POST['nom'];
                $prenom = $_POST['prenom'];
                $email = $_POST['email'];
                $pwd = $_POST['pwd'];
                $cpwd = $_POST['cpwd'];
                $apwd = $_POST['apwd'];
                if(empty($apwd) or empty($pwd) or empty($cpwd)){
                    if(empty($country) or empty($nom) or empty($prenom) or empty($email)){
                        session('void', true);
                        header('location: ?p=user/settings');
                    }else{
                        if($this->User->modification($this->idConnected, $country, $nom, $prenom, $email)){
                            session('modifTrue', true);
                            header('location: ?p=user/settings');
                        }

                    }
                }else{
                    $password = $this->User->find($this->idConnected)->pwd;
                    if(md5(sha1($apwd)) == $password){
                        if($pwd == $cpwd){
                            if($this->User->modification($this->idConnected, $country, $nom, $prenom, $email, md5((sha1($pwd))))){
                                session('modifTrue', true);
                                header('location: ?p=user/settings');
                            }else{
                                session('modifFail', true);
                                header('location: ?p=user/settings');
                            }
                        }else{
                            session('DifferentPwd', true);
                            header('location: ?p=guest/create');
                        }
                    }else{
                        session('badPwd', true);
                        header('location: ?p=user/settings');
                    }
                }
            }elseif(isset($_POST['country']) and isset($_POST['nom']) and isset($_POST['prenom']) and isset($_POST['email'])){
                $country = $_POST['country'];
                $nom = $_POST['nom'];
                $prenom = $_POST['prenom'];
                $email = $_POST['email'];
                if(empty($country) or empty($nom) or empty($prenom) or empty($email)){
                    session('void', true);
                    header('location: ?p=user/settings');
                }else{
                    if($this->User->modification($this->idConnected, $country, $nom, $prenom, $email)){
                        session('modifTrue', true);
                        header('location: ?p=user/settings');
                    }
                }
            }
        }else{
            session('noToken', true);
            header('location: ?p=guest/create');
        }
    }

    public function settings(){
        $picture = $this->avatar($this->idConnected);
        $user = $this->user;
        $title = 'Mes documents';
        $docs = $this->Document->alll($this->idConnected);
        $compteur = 0;
        return $this->view('users.settings', compact('user', 'title', 'docs', 'compteur', 'picture'));
    }

    public function mybalance(){
        $this->template = 'detailCompte';
        $picture = $this->avatar($this->idConnected);
        $user = $this->user;
        $title = 'Gestion de mon compte';
        $transaction = $this->User->allTransaction($this->idConnected);
        $transaction2 = $this->User->allTransaction2($this->idConnected);
        $transaction3 = $this->User->allTransaction3($this->idConnected);
        return $this->view('users.money', compact('user', 'title', 'transaction', 'transaction2', 'transaction3', 'picture'));
    }

    public function delDoc(){
        if(isset($_POST['token_csrf'])){
            if($_SESSION['token2'] == $_POST['token_csrf']){
                if(isset($_POST['id']) and isset($_POST['name']) and isset($_POST['taille'])){
                    $this->Document->delete(strip_tags($_POST['id']));
                    if(unlink(ROOT . 'docs/' . $this->idConnected . '/' . strip_tags($_POST['name']))){
                        if($this->Document->delete(strip_tags($_POST['id']))){
                            if($this->User->deletingFile($this->idConnected, strip_tags($_POST['taille']))){
                                session('supsuccess', true);
                            }else{
                                session('supfail', true);
                            }
                        }else{
                            session('supfail', true);
                        }
                    }
                }
            }
        }
        header('location:index.php?p=user/mydocs');
    }

    public function newPicture(){
        if(isset($_FILES['attachment'])  AND ($_FILES['attachment']['name'] != '')){
            $dossier = getcwd() . '/public/img/';
            $fichier = 'user' . $this->idConnected;
            $taille_maxi = 100000;
            $taille = filesize($_FILES['attachment']['tmp_name']);
            $extensions = array('.jpg', '.png');
            $extension = strrchr($_FILES['attachment']['name'], '.');

            if(!in_array($extension, $extensions)){
                $erreur = 'Vous devez uploader un fichier de type jpg ou png!';
            }

            if($taille>$taille_maxi){
                $erreur = 'Le fichier est trop gros...';
            }

            if(!isset($erreur)) {
                if(!file_exists($dossier . $fichier . '-.jpg')){
                    $oldFile = $dossier . $fichier . '-.jpg';
                }elseif(!file_exists($dossier . $fichier . '--.jpg')){
                    $oldFile = $dossier . $fichier . '--.jpg';
                }else{
                    $oldFile = $dossier . $fichier . 'Old' . date('Y') . date('d') . date('s') . '.jpg';
                }

                if(file_exists($dossier . $fichier . '.jpg')){
                    if(unlink(($dossier . $fichier . '.jpg'))){
                        move_uploaded_file($_FILES['attachment']['tmp_name'], $dossier . $fichier . '.jpg');
                        $this->User->newPhoto($this->idConnected);
                    }
                }else{
                    move_uploaded_file($_FILES['attachment']['tmp_name'], $dossier . $fichier . '.jpg');
                    $this->User->newPhoto($this->idConnected);
                }
                header('location:index.php?p=' . $_GET['ref']);
            }else{
                session('uploadFaille', true);
                session('uploadMessage', $erreur);
                header('location:index.php?p=' . $_GET['ref']);
            }
        }else{
            session('uploadVoid', true);
            header('location:index.php?p=' . $_GET['ref']);
        }
    }

    public function asking(){
        $picture = $this->avatar($this->idConnected);
        $user = $this->user;
        $title = 'Mes documents';
        $docs = $this->Document->alll($this->idConnected);
        $compteur = 0;
        return $this->view('users.asking', compact('user', 'title', 'docs', 'compteur', 'picture'));
    }

    public function newAsk(){
        if(isset($_POST['service']) and
            isset($_POST['nom']) and
            isset($_POST['prenom']) and
            isset($_POST['adresse']) and
            isset($_POST['tel']) and
            isset($_POST['postal']) and
            isset($_POST['enfant']) and
            isset($_POST['revenu']) and
            isset($_POST['situation']) and
            isset($_POST['ville']) and
            isset($_POST['pays']) and
            isset($_POST['nation']) and
            isset($_POST['profession']) and
            isset($_POST['plafond']) and
            isset($_POST['email']) and
            isset($_POST['details'])
        ){
            $service = strip_tags($_POST['service']);
            $situation = strip_tags($_POST['situation']);
            $revenu = strip_tags($_POST['revenu']);
            $enfant = strip_tags($_POST['enfant']);
            $plafond = strip_tags($_POST['plafond']);
            $details = strip_tags($_POST['details']);
            $nom = strip_tags($_POST['nom']);
            $prenom = strip_tags($_POST['prenom']);
            $adresse = strip_tags($_POST['adresse']);
            $tel = strip_tags($_POST['tel']);
            $postal = strip_tags($_POST['postal']);
            $ville = strip_tags($_POST['ville']);
            $pays = strip_tags($_POST['pays']);
            $nation = strip_tags($_POST['nation']);
            $profession = strip_tags($_POST['profession']);
            $email = strip_tags($_POST['email']);

            if($prenom == $this->user->prenom && $nom == $this->user->nom){
                $sms = 'Je sousigné <b>' . $prenom . ' ' . $nom . '</b> viens très respectuesement souscrire à votre service <b>' . $service . '</b>. A ce propos, je sollicite un prêt de <b>' . $plafond . ' ' . session('n_dev') . '</b>. A cet effet, je fournir les renseignements ci-après:<br><br>';
            }else{
                $sms = 'Je sousigné <b>' . $this->user->prenom . ' ' . $this->user->nom . '</b> me porte garant pour une souscription à votre service <b>' . $service . '</b> par <b>' . $prenom . ' ' . $nom . '</b>. En effet, il sollicite un prêt de <b>' . $plafond . ' ' . session('n_dev') . '</b> et fournir pour cela, les renseignements ci-après:<br><br>';
            }
            if($tel != ''){
                $sms .= "<b>Numéro de téléphone: </b>" . $tel . '<br>';
            }
            if($adresse != ''){
                $sms .= "<b>Adresse: </b>" . $adresse . '<br>';
            }
            if($postal != ''){
                $sms .= "<b>Code postal: </b>" . $postal . '<br>';
            }
            if($ville != ''){
                $sms .= "<b>Ville: </b>" . $ville . '<br>';
            }
            if($pays != ''){
                $sms .= "<b>Pays: </b>" . $pays . '<br>';
            }
            if($nation != ''){
                $sms .= "<b>Nationalité: </b>" . $nation . '<br>';
            }
            if($profession != ''){
                $sms .= "<b>Profession: </b>" . $profession . '<br>';
            }
            if($revenu != ''){
                $sms .= "<b>Revenu mensuel: </b>" . $revenu . '<br>';
            }
            if($situation != ''){
                $sms .= "<b>Situation matrimoniale: </b>" . $situation . '<br>';
            }
            if($enfant != ''){
                $sms .= "<b>Nombre d'enfant: </b>" . $enfant . '<br>';
            }
            if($email != ''){
                $sms .= "<b>E-mail: </b>" . $email . '<br>';
            }
            if($details != ''){
                $sms .= '<br><br><b>Plus de details</b><br>' . $details;
            }
            $sms .= '<br><br><b>' . $this->user->prenom . ' ' . $this->user->nom . '</b>';
            $idAdmin = $this->Admin->firstAdmin();
            $this->Message->sendMessage(
                $this->idConnected,
                $idAdmin,
                'Demande de prêt',
                $sms,
                1,
                basename($_FILES['attachment']['name'])
            );
            $idMessage = $this->Message->lastId();
            $this->Demande->insert($this->user->idUser);
            if(isset($_FILES['attachment']) AND ($_FILES['attachment']['name'] != '')){
                $ampliation = '1';
                $dossier = getcwd() . '/ampliations/';
                $fichier = basename($_FILES['attachment']['name']);
                $taille_maxi = 20485760;
                $taille = filesize($_FILES['attachment']['tmp_name']);
                $extensions = array('.rar', '.zip', '.docx', '.doc', '.pdf', '.txt', '.jpg');
                $extension = strrchr($_FILES['attachment']['name'], '.');

                //Début des vérifications de sécurité...
                //Si l'extension n'est pas dans le tableau
                if(!in_array($extension, $extensions)){
                    $erreur = true;
                    $_SESSION['sendingMessage'] = 'Vous devez uploader un fichier de type rar, zip, docx, jpg, pdf, txt ou doc...';
                    session('sendingg', true);
                    header('location:index.php?p=user/asking');
                }

                if($taille>$taille_maxi){
                    $erreur = true;
                    $_SESSION['sendingMessage'] = 'Le fichier est trop gros... La taille limite est de ' . session("n_size") . 'MB';
                    session('sendingg', true);
                    header('location:index.php?p=user/asking');
                }

                //S'il n'y a pas d'erreur, on upload
                if(!isset($erreur)){
                    //On formate le nom du fichier ici...
                    $fichier = strtr($fichier, 'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');

                    $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);

                    //chanher le nom du fichier en user
                    $exten = explode('.', $fichier);
                    $exten = end($exten);


                    if(move_uploaded_file($_FILES['attachment']['tmp_name'], $dossier . $fichier)) {
                        $newName = 'ampliation' . $idMessage . '.' . $exten;
                        if(rename($dossier . $fichier, $dossier . $newName)){
                            $_SESSION['sendingMessage'] = 'Demande de prêt envoyée avec succès !';
                            session('sendinggg', true);
                            header('location:index.php?p=user/asking');
                        }else{
                            $_SESSION['sendingMessage'] = 'Demande de prêt envoyée avec succès mais la pièce joint est perdu!';
                            session('sendinggg', true);
                            header('location:index.php?p=user/asking');
                        }
                    }else{
                        //Sinon (la fonction renvoie FALSE).
                        $_SESSION['sendingMessage'] = 'Echec de l\'ajout de la pièce joint !';
                        session('sendingg', true);
                        header('location:index.php?p=user/asking');
                    }
                }
            }
        }else{
            $_SESSION['sendingMessage'] = 'Vous n\'avez pas renseigner tous les champs !';
            session('sendingg', true);
        }
        header('location:index.php?p=user/asking');
    }

    public function deletemessage(){
        if($_GET['fr'] === 'm'){
            $page = 'user/mybox';
            $this->Message->deleteMessage($_POST['idMessageDeleted'], 'r');
        }elseif($_GET['fr'] === 'b'){
            $page = 'user/draft';
            $this->Message->deleteMessage($_POST['idMessageDeleted'], 'e');
        }else{
            $page = 'user/sending';
            $this->Message->deleteMessage($_POST['idMessageDeleted'], 'e');
        }
        header('location:index.php?p=' . $page);
    }

    public function deletemessages(){
        if(isset($_SESSION['totalForDel'])){
            foreach($_SESSION['totalForDel'] as $fordel){
                if(isset($_POST[$fordel])){
                    $deleted = str_replace('forDel', '', $fordel);
                    if($_GET['ref'] === 'admin.messagerie'){
                        $this->Message->deleteMessage($deleted, 'r');
                    }elseif($_GET['ref'] === 'admin.envoyer'){
                        $this->Message->deleteMessage($deleted, 'e');
                    }elseif($_GET['ref'] === 'admin.brouillon'){
                        $this->Message->deleteMessage($deleted, 'e');
                    }
                }
            }
        }
        header('location:index.php?p=' . $_GET['ref']);
    }

    public function read(){
        $picture = $this->avatar($this->idConnected);
        $this->User->dateConsult($this->idConnected);
        $user = $this->user;
        $message = $this->Message->readMessage(strip_tags($_GET['ref']));
        $email = $this->User->find($message->receveurId)->email;
        $this->Message->read($message->idMessage);
        $title = 'Message de ' . $message->prenom . ' ' . $message->nom;
        return $this->view('message.read', compact('title', 'user', 'message', 'email', 'picture'));
    }

    public function newMessage(){
        $picture = $this->avatar($this->idConnected);
        $recId = isset($_GET['ref']) ? strip_tags($_GET['ref']) : null;
        $user = $this->user;
        $title = 'Nouveau message';
        return $this->view('message.new', compact('title', 'user', 'messages', 'picture'));
    }

    public function draft(){
        $picture = $this->avatar($this->idConnected);
        $user = $this->user;
        $title = 'Brouillons';
        $messages = $this->Message->brouillons($this->idConnected);
        return $this->view('message.draft', compact('title', 'user', 'messages', 'picture'));
    }

    public function sending(){
        $picture = $this->avatar($this->idConnected);
        $user = $this->user;
        $title = 'Messages envoyés';
        $messages = $this->Message->sentMessages($this->idConnected);
        return $this->view('message.sending', compact('title', 'user', 'messages', 'picture'));
    }

    public function mybox(){
        $picture = $this->avatar($this->idConnected);
        $this->User->dateConsult($this->idConnected);
        $user = $this->user;
        $title = 'Messagerie';
        $messages = $this->Message->receivedMessages($this->idConnected);
        return $this->view('message.messagerie', compact('title', 'user', 'messages', 'picture'));
    }

    public function mydocs(){
        $picture = $this->avatar($this->idConnected);
        $user = $this->user;
        $title = 'Mes documents';
        $docs = $this->Document->alll($this->idConnected);
        $compteur = 0;
        return $this->view('users.documents', compact('user', 'title', 'docs', 'compteur', 'picture'));
    }


    public function myaccount(){
        session('notransfert', true);
        $coll = $this->col;
        if(session('AdminHJ4ssRF5')){
            $banque = 'Beloans';
            $waiting = $this->Etat->waiting();
            $waiting2 = $this->Depot->waiting();
        }else{
            $waiting = 0;
            $waiting2 = 0;
            $banque = null;
        }
        $picture = $this->avatar($this->idConnected);
        $user = $this->user;
        $nombre = $this->User->totalNewMessage($this->idConnected)->num;
        $ask = $this->Demande->total($this->idConnected);
        $title = 'Tableau de bord';
        $totalDoc = $this->Document->total($this->idConnected);
        $transaction = $this->User->allTransfer($this->idConnected);
        $actuel = $this->User->actualTransfert($this->idConnected);
        if($actuel){
           // var_dump($actuel->idVirement);
            $receiver = $this->User->getReceiveur($actuel->idVirement);
        }else{
            $receiver = null;
        }
        $asklink = isset($_SESSION['AdminHJ4ssRF5']) ? '?p=admin/asks' : '?p=user/asking';
        $detail = isset($_SESSION['AdminHJ4ssRF5']) ? 'Details' : 'Nouvelle demande';

        if(isset($_SESSION['encoursvil'])){
            $encoursvil = session('encoursvil');
            unset($_SESSION['encoursvil']);
        }else{
            $encoursvil = null;
        }
        if(isset($_SESSION['encourspy'])){
            $encourspy = session('encourspy');
            unset($_SESSION['encourspy']);
        }else{
            $encourspy = null;
        }
        if(isset($_SESSION['encoursnm'])){
            $encoursnm = session('encoursnm');
            unset($_SESSION['encoursnm']);
        }else{
            $encoursnm = null;
        }
        if(isset($_SESSION['encoursbq'])){
            $banque = session('encoursbq');
            unset($_SESSION['encoursbq']);
        }

        if(isset($_SESSION['encoursmon'])){
            $encoursmon = session('encoursmon');
            unset($_SESSION['encoursmon']);
        }else{
            $encoursmon = null;
        }

        if(isset($_SESSION['encoursNum'])){
            $encoursNum = session('encoursNum');
            unset($_SESSION['encoursNum']);
        }else{
            $encoursNum = null;
        }

        return $this->view('users.accueil', compact('encoursmon', 'encoursNum', 'encoursnm', 'encourspy', 'encoursvil', 'banque', 'receiver', 'user', 'title', 'nombre', 'asklink', 'detail', 'transaction', 'totalDoc', 'picture', 'coll', 'ask', 'actuel', 'waiting', 'waiting2'));
    }

    public function logout(){
        session_destroy();
        header('location:?p=guest/login');
    }


    public function method(){
        $methods = get_class_methods($this);
        $method = [];
        foreach ($methods as $m){
            if($m == '__construct'){
                break;
            }
            $method[] = $m;
        }
        $isset = array_search('method', $methods);
        var_dump($method, $isset);

    }

    public function sender(){
        //traitement d'envoie
        if(isset($_FILES['attachment']) AND ($_FILES['attachment']['name'] != '')){
            $ampliation = '1';
            $dossier = getcwd() . '/ampliations/';

            $fichier = basename($_FILES['attachment']['name']);
            $taille_maxi = 10485760;
            $taille = filesize($_FILES['attachment']['tmp_name']);
            $extensions = array('.rar', '.zip', '.docx', '.doc', '.pdf', '.txt', '.jpg');
            $extension = strrchr($_FILES['attachment']['name'], '.');

            //Début des vérifications de sécurité...
            //Si l'extension n'est pas dans le tableau
            if(!in_array($extension, $extensions)){
                $erreur = true;
                $_SESSION['sendingMessage'] = 'Vous devez uploader un fichier de type rar, zip, docx, jpg, pdf, txt ou doc...';
                header('location:index.php?p=user/newMessage');
            }

            if($taille>$taille_maxi){
                $erreur = true;
                $_SESSION['sendingMessage'] = 'Le fichier est trop gros... La taille limite est de ' . session("n_size") . 'MB';
                header('location:index.php?p=user/newMessage');
            }

            //S'il n'y a pas d'erreur, on upload
            if(!isset($erreur)){
                //On formate le nom du fichier ici...
                $fichier = strtr($fichier, 'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');

                $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);

                //chanher le nom du fichier en user
                $exten = explode('.', $fichier);
                $exten = end($exten);


                if(move_uploaded_file($_FILES['attachment']['tmp_name'], $dossier . $fichier)) {

                    //Le code pour l'envoie du message sera ici et on aura message si l'envoi est bien fait
                    if(isset($_POST['send'])){
                        if(isset($_POST['destinataire']) AND isset($_POST['sujet']) AND isset($_POST['contenu'])){
                            //De quoi les retourner dans les inputs
                            $_SESSION['destinataireEchu'] = $_POST['destinataire'];
                            $_SESSION['sujetEchu'] = $_POST['sujet'];
                            $_SESSION['contenuEchu'] = $_POST['contenu'];

                            $receveurId = $this->User->idForMail($_POST['destinataire']);

                            if($receveurId === '0'){
                                $_SESSION['sendingMessage'] = "Désolé, l'email que vous avez entré n'est pas associé à un compte.";
                                header('location:index.php?p=user/newMessage');
                            }else{
                                if($this->Message->sendMessage(
                                          $this->idConnected,
                                          $receveurId,
                                          $_POST['sujet'],
                                          $_POST['contenu'],
                                          $ampliation,
                                          $fichier
                                      )
                                ){
                                    $idMessage = $this->Message->lastId();
                                    $newName = 'ampliation' . $idMessage . '.' . $exten;
                                    if(rename($dossier . $fichier, $dossier . $newName)){
                                        $_SESSION['sendingMessage'] = 'Message envoyé avec succès !';
                                        header('location:index.php?p=user/mybox');
                                    }else{
                                        $_SESSION['sendingMessage'] = 'Message envoyé avec succès mais la pièce joint est perdu!';
                                        header('location:index.php?p=user/mybox');
                                    }
                                }else{
                                    $_SESSION['sendingMessage'] = 'Message non envoyé. Veillez reéssayer plus tard';
                                    header('location:index.php?p=user/nouveauMessage');
                                }
                            }
                        }
                    }else{
                        if(isset($_POST['destinataire']) AND isset($_POST['sujet']) AND isset($_POST['contenu'])){
                            //De quoi les retourner dans les inputs
                            $_SESSION['destinataireEchu'] = $_POST['destinataire'];
                            $_SESSION['sujetEchu'] = $_POST['sujet'];
                            $_SESSION['contenuEchu'] = $_POST['contenu'];

                            $receveurId = $this->Message->idForMail($_POST['destinataire']);

                            if($receveurId === '0'){
                                $_SESSION['sendingMessage'] = "Désolé, l'email que vous avez entré n'est pas associé à un compte.";
                                header('location:index.php?p=user/newMessage');
                            }else{
                                if($this->Message
                                      ->sendMessage(
                                          $this->idConnected,
                                          $receveurId,
                                          $_POST['sujet'],
                                          $_POST['contenu'],
                                          $ampliation,
                                          $fichier,
                                          '1'
                                      )
                                ){
                                    $idMessage = $this->Message->lastId();
                                    $newName = 'ampliation' . $idMessage . '.' . $exten;
                                    if(rename($dossier . $fichier, $dossier . $newName)){
                                        $_SESSION['sendingMessage'] = 'Message envoyé avec succès !';
                                        header('location:index.php?p=user/mybox');
                                    }else{
                                        $_SESSION['sendingMessage'] = 'Message envoyé avec succès mais la pièce joint est perdu!';
                                        header('location:index.php?p=user/mybox');
                                    }
                                }else{
                                    $_SESSION['sendingMessage'] = 'Message non envoyé. Veillez reéssayer plus tard';
                                    header('location:index.php?p=user/newMessage');
                                }
                            }
                        }
                    }
                }else{
                    //Sinon (la fonction renvoie FALSE).
                    $_SESSION['sendingMessage'] = 'Echec de l\'ajout de la pièce joint !';
                    header('location:index.php?p=user/newMessage');
                }
            }
        }else{
            $ampliation = "0";
            if(isset($_POST['send'])){
                if(isset($_POST['destinataire']) AND isset($_POST['sujet']) AND isset($_POST['contenu'])){
                    //De quoi les retourner dans les inputs
                    $_SESSION['destinataireEchu'] = $_POST['destinataire'];
                    $_SESSION['sujetEchu'] = $_POST['sujet'];
                    $_SESSION['contenuEchu'] = $_POST['contenu'];

                    $receveurId = $this->User->idForMail($_POST['destinataire']);
                    if($receveurId === '0'){
                        $_SESSION['sendingMessage'] = 'Désolé, l\'email que vous avez entré n\'est pas associé à un compte.';
                        header('location:index.php?p=user/newMessage');
                    }else{
                        if($this->Message
                              ->sendMessage(
                                  $this->idConnected,
                                  $receveurId,
                                  $_POST['sujet'],
                                  $_POST['contenu'],
                                  $ampliation
                              )
                        ){
                            $_SESSION['sendingMessage'] = 'Message envoyé avec succès !';
                            header('location:index.php?p=user/mybox');
                        }else{
                            $_SESSION['sendingMessage'] = 'Message non envoyé. Veillez reéssayer plus tard';
                            header('location:index.php?p=user/newMessage');
                        }
                    }
                }else{
                    $_SESSION['sendingMessage'] = 'Vous n\'avez pas remplir tous les champs';
                    header('location:index.php?p=user/newMessage');
                }
            }else{
                if(isset($_POST['destinataire']) AND isset($_POST['sujet']) AND isset($_POST['contenu'])){
                    //De quoi les retourner dans les inputs
                    $_SESSION['destinataireEchu'] = $_POST['destinataire'];
                    $_SESSION['sujetEchu'] = $_POST['sujet'];
                    $_SESSION['contenuEchu'] = $_POST['contenu'];

                    $receveurId = $this->User->idForMail($_POST['destinataire']);
                    if($receveurId === '0'){
                        $_SESSION['sendingMessage'] = 'Désolé, l\'email que vous avez entré n\'est pas associé à un compte.';
                        header('location:index.php?p=user/newMessage');
                    }else{
                        if($this->Message
                              ->sendMessage(
                                  $this->idConnected,
                                  $receveurId,
                                  $_POST['sujet'],
                                  $_POST['contenu'],
                                  $ampliation,
                                  null,
                                  '1'
                              )
                        ){
                            $_SESSION['sendingMessage'] = 'Message envoyé avec succès !';
                            header('location:index.php?p=user/mybox');
                        }else{
                            $_SESSION['sendingMessage'] = 'Message non envoyé. Veillez reéssayer plus tard';
                            header('location:index.php?p=user/newMessage');
                        }
                    }
                }else{
                    $_SESSION['sendingMessage'] = 'Vous n\'avez pas remplir tous les champs';
                    header('location:index.php?p=user/newMessage');
                }
            }
        }
    }

    public function newdoc(){
        if(isset($_POST['token_csrf'])){
            if($_SESSION['token'] == $_POST['token_csrf']){

                if(isset($_FILES['attachment']) AND ($_FILES['attachment']['name'] != '')){
                    $cv = true;
                }else{
                    $message = 'Vous n\'avez selectionné un fichier valide!';
                }

                if(!isset($message) AND $cv){
                    $id = $this->user->idUser;
                    $nom = $this->user->nom;
                    $prenom = $this->user->prenom;

                    $dossier = getcwd() . '/docs/';
                    $dossierName = $dossier . $id;
                    $taille_maxi = 614400;
                    $extensions = array('.pdf', '.PDF', '.txt', '.zip', '.rar', '.jpg', '.png', '.doc', '.docx', '.xlsx', '.mp3', '.cpp', '.php', '.java', '.html', '.htm', '.js', '.css', '.scss', '.avi', '.wmv', '.mp4');
                    $taille = filesize($_FILES['attachment']['tmp_name']);
                    $extension = strrchr($_FILES['attachment']['name'], '.');
                    $fileName = $_FILES['attachment']['name'];
                    $fichier = $fileName . '-' . date('i') . date('s');

                    if(!in_array($extension, $extensions)){
                        $erreur = true;
                        $message = 'Le fichier sélectionné n\'est pas pris en charge!';
                    }
                    if($taille>$taille_maxi){
                        $erreur = true;
                        $message = 'La taille du fichier doit être inférieur à 600 kilo-octet';
                    }

                    $tailletotal = $this->User->getSize($this->idConnected) + $taille;

                    if($tailletotal > session('n_size')*1024*1024){
                        $erreur = true;
                        $message = 'Vous avez atteint la taille maximal de sauvegarde. Veillez libérer d\'espace et recommencez.';
                    }

                    if(!isset($erreur)){
                        $fichier = strtr($fichier, 'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');

                        if(!file_exists($dossierName)){
                            $creer = mkdir($dossierName);
                        }

                        if(isset($creer) AND !$creer){
                            $message = 'Erreur d\'enregistrement. Veillez reéssayer plus tard';
                        }else{
                            if (file_exists($dossierName)) {
                                if (!file_exists($dossierName . '/' . $fichier)) {
                                    if (move_uploaded_file($_FILES['attachment']['tmp_name'], $dossierName . '/' . $fichier . '.' . $extension)) {
                                        $desc = isset($_POST['description']) ? $_POST['description'] : '-';
                                        $date = n_now();
                                        $this->User->updateSize($this->idConnected, $tailletotal);

                                        $thedoc = $this->Document->insert($fileName, $id, $taille, $desc, $date);
                                        if($thedoc){
                                            rename($dossierName . '/' . $fichier . '.' . $extension, $dossierName . '/' . explode('.', $fileName)[0] . $thedoc . $extension);
                                        }
                                        $moving = true;
                                    } else {
                                        $moving = false;
                                    }
                                }
                            }else{
                                if (!file_exists($dossierName . '/' . $fichier)) {
                                    if (move_uploaded_file($_FILES['attachment']['tmp_name'], $dossierName . '/' . $fichier . '.' . $extension)) {
                                        $desc = isset($_POST['description']) ? $_POST['description'] : '-';
                                        $date = date('Y') . '-' . date('m') . '-' . date('d') . ' ' . date('H') . ':' . date('i') . ':' . date('s');
                                        $this->User->updateSize($this->idConnected, $tailletotal);

                                        $thedoc = $this->Document->insert($fileName, $id, $taille, $desc, $date);
                                        if($thedoc){
                                            rename($dossierName . '/' . $fichier . '.' . $extension, $dossierName . '/' . explode('.', $fileName)[0] . $thedoc . $extension);
                                        }
                                        $moving = true;
                                    } else {
                                        $moving = false;
                                    }
                                }
                            }
                            if($moving){
                                $success = 'Fichier enregistré avec succès!!';
                            }else{
                                $message = 'Fichier non enregistré. Veillez reéssayer le plus tard';
                            }
                        }
                    }else{
                        session('newDocVoid', true);
                        session('newDocMessage', $message);
                    }
                }else{
                    session('newDocFaille', true);
                    session('newDocMessage', $message);
                }

                if(isset($success)){
                    $_SESSION['successFile'] = true;
                    $_SESSION['newDocMessage'] = $success;
                }
                header('location:index.php?p=user/mydocs');
            }
        }
    }

}