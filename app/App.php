<?php
use Core\Autoload;
use Core\Config;
use Core\Database\DataBase;
use \Core\Mailler\PHPMailer;

class App{
    
    private static $_instance;
    
    private $base;
    
    public static function load(){
        session_start();
        require(dirname(__DIR__) . '/core/Autoload.php');
        Autoload::register();
        if(!isset($_SESSION['n_dev'])){
            self::getConfig();
        }
    }

    public static function getConfig(){
        $configs = App::getApp()->getModel('Config')->all();
        $config = end($configs);
        $_SESSION['n_dev'] = $config->devise;
        $_SESSION['n_mon'] = $config->montant;
        $_SESSION['n_size'] = $config->taille;
    }
    
    public function getModel($model){
        $model = '\App\Model\\' . ucfirst($model) . 'Model';
        return new $model($this->getDb());
    }
    
    public function getDb(){
        if($this->base === null){
            $config = new Config(dirname(__DIR__) . '/config/config.php');
            $this->base = new DataBase(
                $config->get('db_name'),
                $config->get('db_user'),
                $config->get('db_pass'),
                $config->get('db_host')
            );
        }
        return $this->base;
    }
    
    public static function getApp(){
        if(self::$_instance === null){
            self::$_instance = new App();
        }
        return self::$_instance;
    }


    public function noPrivilege($id) {



        return $id;
    }

}

function selectedV($ville, $user){
    if($ville == $user->country){
        return 'selected';
    }
    return null;
}

function n_this($str){
    if($_SESSION['n_dev'] === $str){
        return 'selected="selected"';
    }else{
        return null;
    }
}

function n_numSplitter($num){
    $part1 = substr($num, 0, 4);
    $part2 = substr($num, 4, 4);
    $part3 = substr($num, 8, 4);
    $part4 = substr($num, 12, 4);
    return $part1 . '-' . $part2 . '-' . $part3 . '-' . $part4;
}

function administrator($id){
    $req = App::getApp()->getModel('Admin')->findUser($id);
    if($req){
        return true;
    }
    return false;
}

function n_now(){
    return date('Y') . '-' . date('m') . '-' . date('d') . ' ' . date('H') . ':' . date('i') . ':' . date('s');
}


function session($name, $value = null){
    if($value === null){
        return isset($_SESSION[$name]) ? $_SESSION[$name] : null;
    }
    return $_SESSION[$name] = $value;
}

function methods($data){
    $controller = 'App\Controller\\' . ucfirst($data[0]) . 'Controller';
    if(array_search($data[0], ['guest', 'user', 'welcome', 'admin', 'transfer']) === false){
        return false;
    }
    if(array_search($data[1], get_class_methods($controller)) === false){
        return false;
    }
    return true;
}

function message($message, $session, $type = 'success'){
    if(isset($_SESSION[$session])){
        if($_SESSION[$session] === true){
            $_SESSION[$session] = false;
            echo '<br><div align="center" style="font-size: 15px" class="alert nelmessage alert-' . $type . '"> ' . $message . '</div>';
        }
    }
}

function frenchFullDate($date){
    $Date = explode(' ', $date)[0];
    $Heure = explode(' ', $date)[1];
    $dat = frenchDate($Date);
    $dat = explode(' ', $dat);
    $date = $dat[0] . ' ' . $dat[1];
    return 'le ' . $date . ' à ' . $Heure;
}

function frenchDate($date){
    $dat = explode('-', $date);
    $moi = $dat[1];
    switch ($moi){
        case 1:
            $mois = 'Janvier';
            break;
        case 2:
            $mois = 'Février';
            break;
        case 3:
            $mois = 'Mars';
            break;
        case 4:
            $mois = 'Avril';
            break;
        case 5:
            $mois = 'Mai';
            break;
        case 6:
            $mois = 'Juin';
            break;
        case 7:
            $mois = 'Juillet';
            break;
        case 8:
            $mois = 'Août';
            break;
        case 9:
            $mois = 'Septembre';
            break;
        case 10:
            $mois = 'Octobre';
            break;
        case 11:
            $mois = 'Novembre';
            break;
        case 12:
            $mois = 'Décembre';
            break;
        default:
            $mois = null;
    }
    return $dat[2] . ' ' . $mois . ' ' . $dat[0];
}

function banque($nom){
    if(strtolower($nom) == 'finacis'){
        return 'style="display: none"';
    }
    return null;
}

function ampliation($message){
    $table = explode('.', $message->nomAmpliation);
    if($message->ampliation === '1'){
        if(end($table) === 'jpg'){
            echo '<li>
                <span class="mailbox-attachment-icon has-img"><img src="ampliations/ampliation' . $message->idMessage . '.jpg" /></span>
                <div class="mailbox-attachment-info">
                    <a href="#" class="mailbox-attachment-name"><i class="fa fa-camera"></i>' . $message->nomAmpliation . '</a>
                    <span class="mailbox-attachment-size">
                    Pièce jointe
                    <a href="ampliations/ampliation' . $message->idMessage . '.' . end($table) . '" class="btn btn-default btn-xs pull-right"><i class="fa fa-cloud-download"></i></a>
                </span>
                </div>
            </li>';
        }else{
            echo '<li>
                <span class="mailbox-attachment-icon"><i class="fa fa-file-o"></i></span>
                <div class="mailbox-attachment-info">
                    <a href="#" class="mailbox-attachment-name"><i class="fa fa-paperclip"></i>' . $message->nomAmpliation . '</a>
                    <span class="mailbox-attachment-size">
                    Pièce jointe
                    <a href="ampliations/ampliation' . $message->idMessage . '.' . end($table) . '" class="btn btn-default btn-xs pull-right"><i class="fa fa-cloud-download"></i></a>
                </span>
                </div>
            </li>';
        }
    }
}

function repondre(){
    if(isset($_GET['fr'])){
        echo ($_GET['fr'] === 'e')?'style="display: none"':null;
    }
    if(isset($_GET['fr'])){
        echo ($_GET['fr'] === 'b')?'style="display: none"':null;
    }
}

function transferer(){
    if(isset($_GET['fr'])){
        echo ($_GET['fr'] === 'b')?'Envoyer':'Transférer';
    }else{
        echo 'Transférer';
    }
}

function hundred($number){
    $parts = explode('.', $number);
    if(isset($parts[1])){
        $decimal = substr($parts[1], 0, 2);
    }else{
        $decimal = '00';
    }
    return $parts[0] . '.' . $decimal;
}

function mailler($email, $message){
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->SMTPDebug = 0;
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'ssl';
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 465;
    $mail->Username = 'gmlginolias@gmail.com';
    $mail->Password = 'un mot de passe bidon';
    $mail->From = 'admin@security.com';
    $mail->Subject = 'Reinitialisation mot de passe SecuRITY';
    $mail->Body = $message;
    $mail->AddAddress($email);
    if(!$mail->Send()){
        $sms = $mail->ErrorInfo;
    }else{
         $sms = "COOOOOOOOOOOOOOL";
    }
    $mail->SmtpClose();
    unset($mail);
    return $sms;
}

function notification($idPersonne, $message = null, $sujet = null, $sender = null){
    $receveurId = App::getApp()->getModel('User')->find($idPersonne)->idUser;
    if(!isset($_SESSION['ConnectedId'])){
        $_SESSION['ConnectedId'] = null;
    }
    if($sender === null){
        $id =  App::getApp()->getModel('User')->all();
        $id = $id[0];
        $id = $id->idUser;
        if($sujet === null){
            $sujet = 'Bienvenue sur SecuRITY';
        }
        if($message === null){
            $message = Config::getConfig(dirname(__DIR__) . '/config/config.php')->get('welcomeMessage');
        }
        if(!($receveurId === '0')){
            return App::getApp()->getModel('message')->sendMessage($id, $receveurId, $sujet, $message, '0');
        }else{
            session('userNotFound', true);
        }
    } else {
        if (!($receveurId === '0')) {
            return App::getApp()->getModel('message')->sendMessage($sender, $receveurId, $sujet, $message, '0');
        }
    }
    return false;
}

function icon($fileName){
    $parts = explode('.', $fileName);
    $extension = '.' . $parts[1];
    if($extension == '.txt'){
        return 'fa-file-text-o';
    }elseif(($extension == '.zip') or ($extension == '.rar')){
        return 'fa-file-zip-o';
    }elseif(($extension == '.jpg') or ($extension == '.png')){
        return 'fa-file-photo-o';
    }elseif($extension == '.pdf'){
        return 'fa-file-pdf-o';
    }elseif($extension == '.doc'){
        return 'fa-file-word-o';
    }elseif($extension == '.docx'){
        return 'fa-file-word-o';
    }elseif($extension == '.xlsx'){
        return 'fa-file-excel-o';
    }elseif($extension == '.mp3'){
        return 'fa-file-audio-o';
    }elseif(
        ($extension == '.cpp') or
        ($extension == '.php') or
        ($extension == '.java') or
        ($extension == '.html') or
        ($extension == '.htm') or
        ($extension == '.js') or
        ($extension == '.css') or
        ($extension == '.scss')
    ){
        return 'fa-file-code-o';
    }elseif(($extension == '.avi') or ($extension == '.wmv') or ($extension == '.mp4')){
        return 'fa-file-movie-o';
    }else{
        return 'fa-file-o';
    }
}


function notRead($idMessage){
    //renvoi null si le message n'a pas encore été lu
    if(App::getApp()->getModel('message')->alreadyRead($idMessage)){
        return null;
    }else{
        return 'style="font-weight: bold"';
    }
}

function sendingFail($echu){
    $echu = strtolower($echu) . 'Echu';
    if($echu === 'contenuEchu'){
        if(isset($_SESSION['contenuEchu']) AND ($_SESSION['contenuEchu'] != false)){
            echo $_SESSION['contenuEchu'];
            $_SESSION['contenuEchu'] = false;
        }
    }elseif($echu === 'destinataireEchu'){
        if(isset($_SESSION['destinataireEchu']) AND ($_SESSION['destinataireEchu'] != false)){
            echo 'value="' . $_SESSION['destinataireEchu'] . '"';
            $_SESSION['destinataireEchu'] = false;
        }
    }elseif($echu === 'sujetEchu'){
        if(isset($_SESSION['sujetEchu']) AND ($_SESSION['sujetEchu'] != false)){
            echo 'value="' . $_SESSION['sujetEchu'] . '"';
            $_SESSION['sujetEchu'] = false;
        }
    }
}

function replayMessage($attribut, $data1, $data2 = null){
    if(isset($_GET['ref'])){
        if(($data1 === 'sujet') OR ($data2 === 'sujet')){
            $prefix = 'Re: ';
        }else{
            $prefix = null;
        }

        $message = App::getApp()->getModel('message')->find(strip_tags($_GET['ref']));

        if($data2 === null){
            $data = $prefix . $message->$data1;
        }else{
            $data = $prefix . $this->message->$data1 . ' ' . $this->message->$data2;
        }
        return $attribut . '="' . $data . '"';
    }elseif($data1 === 'destinataireEchu'){
        if(isset($_SESSION['destinataireEchu']) AND ($_SESSION['destinataireEchu'] != false)){
            $_SESSION['destinataireEchu'] = false;
            return $_SESSION['destinataireEchu'];
        }else{
            return null;
        }
    }elseif($data1 === 'sujetEchu'){
        if(isset($_SESSION['sujetEchu']) AND ($_SESSION['sujetEchu'] != false)){
            $_SESSION['sujetEchu'] = false;
            return $_SESSION['sujetEchu'];
        }else{
            return null;
        }
    }elseif($data1 === 'contenuEchu'){
        if(isset($_SESSION['contenuEchu']) AND ($_SESSION['contenuEchu'] !=false)){
            $_SESSION['contenuEchu'] = false;
            return $_SESSION['contenuEchu'];
        }else{
            return null;
        }
    }else{
        return null;
    }
}