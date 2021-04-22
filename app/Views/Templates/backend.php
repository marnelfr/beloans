<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= $title ?></title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="public/admin/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="public/admin/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="public/admin/dist/css/skins/_all-skins.min.css">

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        #dp{
            margin-bottom: 15px;
            border: 5px outset rgba(0, 0, 255, 0.5);
            padding: 5px;
            background-color: rgba(0, 0, 255, 0.18);
        }

        @media (min-width: 700px){
            #labelMontant{
                padding-left: 0px; position: relative; left: -6.5%;
            }
            #labelSolde{
                position: relative; left: -7.5%;
            }
            #labelCompte{
                padding-left: 0px;
            }
        }


        @media (min-width: 1200px){
            .container {
                width: 1240px;
            }
            .nel-control{
                position: relative;
                right: 5.6%;
            }
        }

        @media (min-width: 1200px){
            #progressbar{
                width: 130%;
                height: 27px;
                position: relative;
                right: 10px;
            }
        }

        /*
        Le but ultime est maintenant de rendre le progressive bar responsive.
        Je l'ai deja positionner. Il faut maintenant
        que ça taille s'adapte à la taile de l'écrane
        */

        @media (min-width: 1150px) and (max-width: 1199px){
            #progressbar{
                width: 170%;
                height: 27px;
                position: relative;
                top: -30px;
                left: 257px;
            }

            #labelSolde{
                position: relative;
                left: -26px;
            }
        }


        @media (min-width: 1110px) and (max-width: 1150px){

            #progressbar{
                width: 160%;
                height: 27px;
                position: relative;
                top: -30px;
                left: 257px;
            }

        }


        @media (min-width: 1060px) and (max-width: 1110px){

            #progressbar{
                width: 150%;
                height: 27px;
                position: relative;
                top: -30px;
                left: 257px;
            }

        }


        @media (min-width: 1000px) and (max-width: 1060px){

            #progressbar{
                width: 140%;
                height: 27px;
                position: relative;
                top: -30px;
                left: 257px;
            }

        }


        @media (min-width: 950px) and (max-width: 1000px){

            #progressbar{
                width: 130%;
                height: 27px;
                position: relative;
                top: -30px;
                left: 257px;
            }

        }

        @media (min-width: 900px) and (max-width: 949px){

            #progressbar{
                width: 120%;
                height: 27px;
                position: relative;
                top: -30px;
                left: 257px;
            }

        }


        @media (min-width: 850px) and (max-width: 899px){

            #progressbar{
                width: 110%;
                height: 27px;
                position: relative;
                top: -30px;
                left: 257px;
            }

        }


        @media (min-width: 806px) and (max-width: 849px){

            #progressbar{
                width: 105%;
                height: 27px;
                position: relative;
                top: -30px;
                left: 257px;
            }

        }


        @media (min-width: 800px) and (max-width: 805px){

            #progressbar{
                width: 100%;
                height: 27px;
                position: relative;
                top: -30px;
                left: 257px;
            }

        }

        @media (min-width: 767px) and (max-width: 799.8px){

            #progressbar{
                width: 180%;
                height: 27px;
                position: relative;
                left: -80px;
            }

        }


        @media (min-width: 630px) and (max-width: 766.8px){

            #progressbar{
                width: 180%;
                height: 27px;
                position: relative;
                right: 140px;
            }

        }

        @media (min-width: 600px) and (max-width: 629.8px){

            #progressbar{
                width: 170%;
                height: 27px;
                position: relative;
                right: 120px;
            }

        }

        @media (min-width: 550px) and (max-width: 599.8px){

            #progressbar{
                width: 160%;
                height: 27px;
                position: relative;
                right: 100px;
            }

        }

        @media (min-width: 517px) and (max-width: 549.8px){

            #progressbar{
                width: 155%;
                height: 27px;
                position: relative;
                right: 95px;
            }

        }

        @media (min-width: 490px) and (max-width: 516.8px){

            #progressbar{
                width: 145%;
                height: 27px;
                position: relative;
                right: 80px;
            }

        }

        @media (min-width: 455px) and (max-width: 489.8px){

            #progressbar{
                width: 135%;
                height: 27px;
                position: relative;
                right: 65px;
            }

        }

        @media (min-width: 430px) and (max-width: 454.8px){

            #progressbar{
                width: 125%;
                height: 27px;
                position: relative;
                right: 50px;
            }

        }

        @media (min-width: 395px) and (max-width: 429.8px){

            #progressbar{
                width: 115%;
                height: 27px;
                position: relative;
                right: 35px;
            }

        }

        @media (min-width: 699px) and (max-width: 767.8px){

            #labelSolde{
                position: relative;
                left: 0px;
                top: 27px;
            }

            #labelMontant{
                position: relative;
                left: 14px;

            }
            #labelCompte{
                position: relative;
                left: 14px;

            }

        }


        @media (min-width: 768px) and (max-width: 805.8px){
            #labelSolde{
                position: relative;
                left: -50px;
            }

            #labelMontant{
                position: relative;
                left: -64px;

            }

            #labelCompte{
                position: relative;
                left: -17px;

            }

        }

        @media (min-width: 806px) and (max-width: 870.8px){
            #labelSolde{
                position: relative;
                left: -50px;
            }

            #labelMontant{
                position: relative;
                left: -69px;

            }

            #labelCompte{
                position: relative;
                left: -17px;

            }

        }

        @media (min-width: 871px) and (max-width: 930.8px){
            #labelSolde{
                position: relative;
                left: -50px;
            }

            #labelMontant{
                position: relative;
                left: -74px;

            }

            #labelCompte{
                position: relative;
                left: -17px;

            }

        }

        @media (min-width: 930px) and (max-width: 960.8px){
            #labelSolde{
                position: relative;
                left: -50px;
            }

            #labelMontant{
                position: relative;
                left: -80px;

            }

            #labelCompte{
                position: relative;
                left: -17px;

            }

        }

        @media (min-width: 961px) and (max-width: 1060.8px){
            #labelSolde{
                position: relative;
                left: -50px;
            }

            #labelMontant{
                position: relative;
                left: -83px;

            }

            #labelCompte{
                position: relative;
                left: -17px;

            }

        }

        @media (min-width: 1061px) and (max-width: 1149.8px){
            #labelSolde{
                position: relative;
                left: -50px;
            }

            #labelMontant{
                position: relative;
                left: -87px;

            }

            #labelCompte{
                position: relative;
                left: -17px;

            }

        }

        @media (min-width: 1150px) and (max-width: 1199px){
            #labelSolde{
                position: relative;
                left: -50px;
            }

            #labelMontant{
                position: relative;
                left: -87px;

            }

            #labelCompte{
                position: relative;
                left: -17px;

            }

        }

        @media (min-width: 1200px){
            #labelSolde{
                position: relative;
                left: -50px;
            }

            #labelMontant{
                position: relative;
                left: -48px;
            }

            #labelCompte{
                position: relative;
                left: -17px;
            }

        }

        @media (max-width: 394.8px){

            #progressbar{
                width: 105%;
                height: 27px;
                position: relative;
                right: 20px;
            }

        }

        @media (min-width: 768px){
            .ndmn{
                position: relative;
                right: 14em;
            }
        }

        .tras{
            color: black; width: 100px; display: inline; border: none;
            height: 25px;
        }

        .valne{
            border-radius: 15px;
            border: 1px solid rgba(89, 177, 255, 0.37);
            text-align: right;
            padding-right: 1em;
            color: rgba(255, 10, 30, 0.22);
            font-weight: bold;
        }

        .valne-m{
            width: 7em;
            position: relative;
            top: 0px;
            display: inline;
            background-color: rgba(89,177,255,0.26); font-weight: bold;
        }



        #progress{
            width: 300px;
            margin: auto;
        }
        progress{
            display: inline-block;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
            width: 300px;
            height: 20px;
            padding: 3px 3px 2px 3px;
            background: #333;
            background: -webkit-linear-gradient(#2d2d2d,#444);
            background:    -moz-linear-gradient(#2d2d2d,#444);
            background:      -o-linear-gradient(#2d2d2d,#444);
            background:         linear-gradient(#2d2d2d,#444);
            border: 1px solid rgba(0,0,0,.5);
            border-radius: 15px;
            box-shadow: 0 1px 0 rgba(255,255,255,.2);
        }

        /* Style de la barre pour Firefox*/
        progress::-moz-progress-bar{
            border-radius:10px;
            background: #09c;
            background:
                    -moz-repeating-linear-gradient(
                            45deg,
                            rgba(255,255,255,.2) 0,
                            rgba(255,255,255,.2) 10px,
                            rgba(255,255,255,0) 10px,
                            rgba(255,255,255,0) 20px
                    ),
                    -moz-linear-gradient(
                            rgba(255,255,255,.1) 50%,
                            rgba(255,255,255,0) 60%
                    ),
                    #09c;
            background:
                    repeating-linear-gradient(
                            45deg,
                            rgba(255,255,255,.2) 0,
                            rgba(255,255,255,.2) 10px,
                            rgba(255,255,255,0) 10px,
                            rgba(255,255,255,0) 20px
                    ),
                    linear-gradient(
                            rgba(255,255,255,.1) 50%,
                            rgba(255,255,255,0) 60%
                    ),
                    #09c;
            background-size: 300px 20px, auto, auto;
            background-position: -300px 0, top, top;
            background-position: top right, top, top;
            box-shadow: 0 1px 0 rgba(255,255,255,.5) inset,
            0 -1px 0 rgba(0,0,0,.8) inset,
            0 0 2px black;
        }

        /* Style de la barre pour Chrome*/
        progress::-webkit-progress-value{
            border-radius:10px;
            background: #09c;
            background:
                    -webkit-repeating-linear-gradient(
                            45deg,
                            rgba(255,255,255,.2) 0,
                            rgba(255,255,255,.2) 10px,
                            rgba(255,255,255,0) 10px,
                            rgba(255,255,255,0) 20px
                    ),
                    -webkit-linear-gradient(
                            rgba(255,255,255,.1) 50%,
                            rgba(255,255,255,0) 60%
                    ),
                    #09c;
            background:
                    repeating-linear-gradient(
                            45deg,
                            rgba(255,255,255,.2) 0,
                            rgba(255,255,255,.2) 10px,
                            rgba(255,255,255,0) 10px,
                            rgba(255,255,255,0) 20px
                    ),
                    linear-gradient(
                            rgba(255,255,255,.1) 50%,
                            rgba(255,255,255,0) 60%
                    ),
                    #09c;
            background-size: 300px 20px, auto, auto;
            background-position: -300px 0, top, top;
            background-position: top right, top, top;
            box-shadow: 0 1px 0 rgba(255,255,255,.5) inset,
            0 -1px 0 rgba(0,0,0,.8) inset,
            0 0 2px black;
        }

        /* Enlève la couleur d'arrière-plan */
        progress::-webkit-progress-bar{
            background: transparent;
        }

        .nelSupp{
            color: rgba(255,0,0,0.48);
            border: none;
            background: none;
        }
        .nelSupp:hover{
            color: red;
        }

        .skin-blue .main-header li.user-header {
            background-color: #bfbfbf;
        }


        #loader  {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0,0,0, 0.2);
            z-index: 99999;
            height: 100%;
        }
        #status  {
            position: absolute;
            left: 50%;
            top: 50%;
            width: 64px;
            height: 64px;
            margin: -32px 0 0 -32px;
            padding: 0;
        }

        @media (min-width: 1200px) and (max-width: 1250px){
            #labelMontant{
                padding-left: 0px; position: relative; left: -6%;
            }
            #labelCom{
                position: relative; left: -21.5%;
            }
            #labelCo{
                position: relative; left: -1.5%;
                text-align: left;
            }
            #labelSolde{
                position: relative; left: -7.5%;
            }
            #labelCompte{
                position: relative; left: -0%;
            }
        }
        @media (max-width: 1200px){
            #labelCo{
                position: relative; left: 0%;
                text-align: left;
            }
            #labelCompte{
                position: relative; left: -19.3%;
            }
            #labelCom{
                position: relative; left: -27.8%;
            }
            #labelMontant{
                padding-left: 0px; position: relative; left: -6%;
            }
            #labelSolde{
                position: relative; left: -7.5%;
            }
        }
    </style>
</head>
<body style="min-width: 380px; overflow: auto;" onload="userLocked();" class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">
    <?php /*session('Dq5ld2', substr(uniqid(), 6, 5));*/?>
    <header class="main-header">
        <nav style="background-color: #bfbfbf;" class="navbar navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <a href="?p=user/myaccount" class="navbar-brand"><img src="public/img/logo.png" style="position: relative; top: -1.6em; margin-right: 0px" width="40%" alt="BELOANS_LOGO_OFFICIAL"> </a>
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                        <i class="fa fa-bars"></i>
                    </button>
                </div>

                <div class="collapse navbar-collapse pull-left ndmn" id="navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li <?= ($_GET['p'] == 'user/myaccount') ? 'class="active"' : '' ?> ><a href="?p=user/myaccount">Tableau de bord <span class="sr-only">(current)</span></a></li>
                        <li <?= ($_GET['p'] == 'user/asking') ? 'class="active"' : '' ?> ><a href="?p=user/asking">Crédit</a></li>
                        <?php if(!isset($_SESSION['AdminHJ4ssRF5'])): ?>
                        <li <?= ($_GET['p'] == 'user/mybalance') ? 'class="active"' : '' ?> ><a href="?p=user/mybalance">Portefeuille</a></li>
                        <?php endif; ?>
                        <?php if(isset($_SESSION['AdminHJ4ssRF5'])): ?>
                            <li <?= ($_GET['p'] == 'admin/transactions') ? 'class="active"' : '' ?> ><a href="?p=admin/transactions">Transactions</a></li>
                            <li <?= ($_GET['p'] == 'admin/users') ? 'class="active"' : '' ?> ><a href="?p=admin/users">Utilisateurs</a></li>
                            <li <?= ($_GET['p'] == 'admin/settings') ? 'class="active"' : '' ?> ><a href="?p=admin/settings">Paramètres</a></li>
                        <?php endif; ?>
                    </ul>
                </div>
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="<?= $picture ?>" class="user-image" alt="User Image">
                                <span class="hidden-xs"><?= $user->prenom ?> <?= $user->nom ?></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="user-header">
                                    <img src="<?= $picture ?>" class="img-circle" alt="User Image">
                                    <p>
                                        <?= $user->prenom ?> <?= $user->nom ?>
                                    </p>
                                </li>
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="?p=user/settings" class="btn btn-default btn-flat">Mon profil</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="?p=user/logout" class="btn btn-default btn-flat">Deconnexion</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <div class="row">
        <?php message('Vous n\'avez pas selectionné un fichier', 'uploadVoid', 'danger') ?>
        <?php message(session('uploadMessage'), 'uploadFaille', 'danger') ?>
    </div>
    <?= $content ?>
    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b><a href="#" style="color: black">Respect de la vie privée</a></li>&nbsp; - &nbsp;<a href="#" style="color: black">Juridique</a>&nbsp; - &nbsp;<a style="color: black" data-pa-click="footer|SiteFeedback" href="?p=welcome/index/#">Évaluation</a></b>
        </div>
        © 2011–<?= date('Y') ?> Beloans Tous droits réservés.
    </footer>
</div>
<script src="public/admin/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="public/admin/bootstrap/js/bootstrap.min.js"></script>

<script src="public/admin/plugins/input-mask/jquery.inputmask.js" type="text/javascript"></script>
<script src="public/admin/plugins/input-mask/jquery.inputmask.date.extensions.js" type="text/javascript"></script>
<script src="public/admin/plugins/input-mask/jquery.inputmask.extensions.js" type="text/javascript"></script>

<script src="public/admin/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<script src="public/admin/plugins/fastclick/fastclick.js"></script>
<script src="public/admin/dist/js/app.min.js"></script>
<script src="public/admin/dist/js/demo.js"></script>
<script type="text/javascript">
    v = 0;

    function plafond(){
        alert('ffddf');
        //var plafon = $('#plaf').val();
        /*
        if(parseInt(plafon) > 75000){
            alert('Le plafond est de 75000');
            //$('#plaf').val('');
            $('#plaf').css('background-color', 'rgba(255,40,40,.4)');
            document.getElementById('plaf').select;
//        $('#plaf').select();
        }else{
            $('#plaf').css('background-color', 'rgba(94,255,94,.2)');

        }*/

    }

    function newDevise(devise){
        var trans = $('#trans');
        var valeur = trans.val();
        var montant = valeur.split(' ');
//        alert(montant[0] + ' ' + devise);
        trans.val(montant[0] + ' ' + devise);

    }

    function granted(id){
        xhr = new XMLHttpRequest();
        if($('#nel'+id).is(':checked')){
            $('#neld1'+id).css('background-color', 'rgba(255,0,0,0.12)');
            xhr.open("GET", "index.php?p=admin/lock&ref="+id);
        }else{
            $('#neld1'+id).css('background-color', 'rgb(255,255,255)');
            xhr.open("GET", "index.php?p=admin/grant&ref="+id);
        }
        xhr.send();
    }

    function supD(name, id){
        alert("Voulez vous vraiment supprimer ? " + name + " ?"+id);
    }

    <?php
    if(isset($user->montant)){
         ?>
        function totrans(){
            var valeur = $('#toTrans').val();
            if(valeur == ''){
                valeur = '0';
            }
            var tab = valeur.split(' ');
            var nbr = parseInt(tab[0]);
            if(nbr<0){
                nbr=0;
            }
            var montant = <?= $user->montant ?>;
            if(nbr>montant){
                nbr = montant;
            }
            var val = nbr;
            $('#toTrans').val(val);
            var rest = montant-nbr;
            $('#trans').val(rest  + ' <?= session('n_dev') ?>');
        }

        function mont(){
            var valeur = $('#trans').val();
            if(valeur == ''){
                valeur = '0';
            }
            if(parseInt(valeur)<0){
                valeur = '0';
            }

            var tab = valeur.split(' ');
            var nbr = parseInt(tab[0]);
            if(nbr<0){
                nbr=0;
            }
            var montant = <?= $user->montant ?>;
            if(nbr>montant){
                nbr = montant;
            }
            var val = nbr + ' <?= session('n_dev') ?>';
            $('#trans').val(val);
            var rest = montant-nbr;
            $('#toTrans').val(rest);
        }


    function monte(){
        var valeur = $('#trans').val();
        if(valeur == ''){
            valeur = '0';
        }

        var tab = valeur.split(' ');
        var nbr = parseInt(tab[0]);
        if(nbr<0){
            nbr=0;
        }
        var montant = <?= $user->montant ?>;
        var val = nbr + ' <?= session('n_dev') ?>';
        $('#trans').val(val);
        var rest = montant-nbr;
        $('#toTrans').val(rest);
    }

        function plus() {
            var valeur = $('#trans').val();
            var tab = valeur.split(' ');
            var nbr = parseInt(tab[0]);
            var montant = <?= $user->montant ?>;
            if(nbr<montant){
                nbr++;
                var val = nbr + ' <?= session('n_dev') ?>';
                $('#trans').val(val);
                var mons = $('#toTrans').val();
                var mont = mons*1;
                mont--;
                $('#toTrans').val(mont);
            }
        }

        function moins() {
            var valeur = $('#trans').val();
            var tab = valeur.split(' ');
            var nbr = parseInt(tab[0]);
            if(nbr>1){
                nbr--;
                var val = nbr + ' <?= session('n_dev') ?>';
                $('#trans').val(val);
                var mons = $('#toTrans').val();
                var mont = mons*1;
                mont++;
                $('#toTrans').val(mont);
            }
        }
        <?php
    }
    ?>

    function hideMsg(){
        $(".nelmessage").hide('slow');
    }

    //#mdpChanger
    //.newMDP

    function sansMDP() {
        $('.newMDP').hide();
        $('.mdpChanger2').show();
    }

    function avecMPD() {
        $('.newMDP').show('slow');
        $('.mdpChanger2').hide('slow');
    }


    $(function () {


        <?php
        if(isset($actuel) and $actuel){
            ?>
            $('#ck4df').show();
            <?php
        }else{
            ?>
            $('#ck4df').hide();
            $('#continu').hide();
            <?php
        }
        ?>
        $('.tras').hide();
        $('#ck4df2').hide();
        $('#conti').hide();
        $('#conti2').hide();
        $('#conti3').hide();
        $('#securityCod2').hide();

        $("[data-mask]").inputmask();

        $(".numCompteur").inputmask("yyyy-yyyy-yyyy", {"placeholder": "NNNN-NNNN-NNNN"});

        $('.newMDP').hide();

        setTimeout("hideMsg()", 10000);

        $("#appliquer").hide();
        $("#nouvellePhoto").click(function () {
            $("#nouvellePhoto").hide("linear");
            $("#appliquer").show("linear");
        });


        <?php
            if(isset($users)){
                foreach($users as $person):
                    if($person->locked){
                    ?>
                    $('#neld1'+<?= $person->idUser ?>).css('background-color', 'rgba(255,0,0,0.12)');
                    <?php
                    }
                endforeach;
            }
        ?>


        $('#moneyTable').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false
        });

        $("#example1").dataTable();
        $('#example2').dataTable({
            "bPaginate": true,
            "bLengthChange": false,
            "bFilter": false,
            "bSort": true,
            "bInfo": true,
            "bAutoWidth": false
        });

        $("#compose-textarea").wysihtml5();
    });
    function change_layout(cls) {
        $("body").toggleClass(cls);
        $.AdminLTE.layout.fixSidebar();
    }



    function recharger(){
        location.reload();
    }

    var lislid;
    var arret = false;
    var code = true;
    var fresh = true;
    var showModal = true;
    var showModal2 = true;
    var showModal8 = true;

    function modifValues(valeur){
        var premier = true;
        $("#debutTrans").show('slow');
        var val = 0;
        if(valeur == 0){
            val = $('#progress progress').attr('value');
        }else{
            val = valeur;
        }
        if(val>=85){
            clearTimeout(lislid);
        }

        var newVal = val*1+1;
        var txt = Math.floor(newVal)+'%';

        if(val>=98){
            $('#progress progress').attr('value',98).text(txt);
            document.forms['trans'].submit();
        }else{
            $('#progress progress').attr('value',newVal).text(txt);
        }

        $('#progress strong').html(txt);

        if(arret == true){
            return;
        }

        if(val<98){
            lislid = setTimeout('modifValues(0)', 30);
        }else{
            lislid = setTimeout('modifValues(0)', 1500);
        }

        if((val==22 || val==23 || val==24 || val==25) && code){

            $('#progress strong').html('25%');
            $('#progress progress').attr('value',25).text(txt);

            lislid = setTimeout('modifValues(0)', 999999);
            var xhr2 = new XMLHttpRequest();
            var mont = $('#toTrans').val();
            var vil = $('#ville').val();
            var py = $('#pays').val();
            var nm = $('#nom').val();
            var bq = $('#banque').val();
            var numm = $('#numCompte').val();
            if(fresh){
                fresh = false;
                xhr2.open("GET", "index.php?p=transfer/partsofT2&mon="+encodeURIComponent(mont)+"&num="+encodeURIComponent(numm)+"&vil="+encodeURIComponent(vil)+"&py="+encodeURIComponent(py)+"&nm="+encodeURIComponent(nm)+"&bq="+encodeURIComponent(bq));
                xhr2.send();
                xhr2.onreadystatechange = function () {
                    if(xhr2.readyState == 4 && xhr2.status == 200){
                        var cc = xhr2.responseText;
                        //alert(cc);
                        if(cc == 'Dsl'){
                            if(showModal2){
                                showModal2 = false;
                                $('#cHfd4ESD2').modal('show');
                                setTimeout('recharger()', 12000);
                                $('#ck4df').show('slow');
                                $('#continu').show();
                                $('#transta').hide();
                            }
                        }else{
                            location.reload();
                        }
                    }
                }
            }
        }

        if((val==47 || val==48 || val==49 || val==50) && code){
            $('#progress strong').html('50%');
            $('#progress progress').attr('value',50).text(txt);
            var ee = $('#securite').val();
            lislid = setTimeout('modifValues(0)', 999999);
            var xhr5 = new XMLHttpRequest();
            xhr5.open("GET", "index.php?p=transfer/partsofT4&e="+encodeURIComponent(ee));
            xhr5.send();
            xhr5.onreadystatechange = function () {
                if(xhr5.readyState == 4 && xhr5.status == 200){
                    var ve = xhr5.responseText;
                    if(parseInt(ve)){
                        if(showModal){
                            showModal = false;
                            $('#cHfd4ESD3').modal('show');
                            setTimeout('recharger()', 12000);
                            $('#securityCod').val('');
                        }
                    }else{
                        if(showModal){
                            showModal = false;
                            $('#cHfd4ESDF').modal('show');
                        }
                    }
                }
            };
        }

        if((val==72 || val==73 || val==74 || val==75) && code){
            $('#progress strong').html('75%');
            $('#progress progress').attr('value',75).text(txt);
            var ee = $('#securite').val();
            lislid = setTimeout('modifValues(0)', 999999);
            var xhr7 = new XMLHttpRequest();
            xhr7.open("GET", "index.php?p=transfer/partsofT6&e="+encodeURIComponent(ee));
            xhr7.send();
            xhr7.onreadystatechange = function () {
                if(xhr7.readyState == 4 && xhr7.status == 200){
                    var ve = xhr7.responseText;
                    if(parseInt(ve)){
                        if(showModal8){
                            showModal8 = false;
                            $('#cHfd4ESD4').modal('show');
                            setTimeout('recharger()', 12000);
                            $('#securityCod').val('');
                        }
                    }else{
                        if(showModal8){
                            showModal8 = false;
                            $('#cHfd4ESDF').modal('show');
                        }
                    }
                }
            };
        }
    }

    function cole() {
        arret = true;
        var newVal = 100;
        var txt = Math.floor(newVal)+'%';
        $('#progress progress').attr('value',100).text(txt);
        setTimeout('cole()', 1);
    }

    function chang() {
        $("#debutTrans").hide('slow');
        $("#finTrans").show('slow');
    }

    function sender() {
        modifValues(0);
    }

    $("#saing").click(
        function (e) {
            e.preventDefault();
            $("#privilege").submit();
        }
    );

    function modifier(id){
        $('#montant'+id).hide();
        var dev = document.getElementById('tras'+id);
        var mont = dev.value;
        var monte = mont.split(' ');
        dev.value = monte[0];
        $('#tras'+id).show();
        dev.select();
    }

    function changeur(id){
        var dev = document.getElementById('tras'+id);
        var mont = dev.value;
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "index.php?p=admin/newSold&m="+encodeURIComponent(mont)+"&i="+encodeURIComponent(id));
        xhr.send();
        xhr.onreadystatechange = function () {
            if(xhr.readyState == 4 && xhr.status == 200){
                var c = xhr.responseText;
                if(parseInt(c)){
                    document.getElementById('montant'+id).innerHTML = mont + ' €';
                    $('#montant'+id).show();
                    $('#tras'+id).hide();
                }
            }
        }
    }

    function suite1(){
        var code = $('#securityCod').val();
        var e = $('#securite').val();
        var xhr1 = new XMLHttpRequest();
        xhr1.open("GET", "index.php?p=transfer/partsofT3&c="+encodeURIComponent(code)+"&e="+encodeURIComponent(e));
        xhr1.send();
        xhr1.onreadystatechange = function () {
            if(xhr1.readyState == 4 && xhr1.status == 200){
                var c = xhr1.responseText;
             <!--   alert(c); -->
                if(parseInt(c)){
                    modifValues(26);
                }else{
                    v++;
                    var essai = 'essai';
                    $('#securityCod').val('');
                    if((3-v)>1){
                        essai += 's';
                    }
                    if(v==3){
                        window.location="index.php?p=user/logout";
                    }else{
                        alert('Code incorrect. Il vous reste ' + (3-v) + ' ' + essai);
                    }
                }
            }
        }
    }

    function suite2(){
        var code = $('#securityCod').val();
        var e = $('#securite').val();
        var xhr6 = new XMLHttpRequest();
        xhr6.open("GET", "index.php?p=transfer/partsofT5&c="+encodeURIComponent(code)+"&e="+encodeURIComponent(e));
        xhr6.send();
        xhr6.onreadystatechange = function () {
            if(xhr6.readyState == 4 && xhr6.status == 200){
                var c = xhr6.responseText;
                if(parseInt(c)){
                    modifValues(51);
                }else{
                    v++;
                    var essai = 'essai';
                    $('#securityCod').val('');
                    if((3-v)>1){
                        essai += 's';
                    }
                    if(v==3){
                        window.location="index.php?p=user/logout";
                    }else{
                        alert('Code incorrect. Il vous reste ' + (3-v) + ' ' + essai);
                    }
                }
            }
        }
    }

    function suite3(){
        var code = $('#securityCod').val();
        var e = $('#securite').val();
        var xhr8 = new XMLHttpRequest();
        <!--alert(code); -->
        xhr8.open("GET", "index.php?p=transfer/partsofT7&c="+encodeURIComponent(code)+"&e="+encodeURIComponent(e));
        xhr8.send();
        xhr8.onreadystatechange = function () {
            if(xhr8.readyState == 4 && xhr8.status == 200){
                var c = xhr8.responseText;
                if(parseInt(c)){
                    modifValues(76);
                }else{
                    v++;
                    var essai = 'essai';
                    $('#securityCod').val('');
                    if((3-v)>1){
                        essai += 's';
                    }
                    if(v==3){
                        window.location="index.php?p=user/logout";
                    }else{
                        alert('Code incorrect. Il vous reste ' + (3-v) + ' ' + essai);
                    }
                }
            }
        }
    }

</script>
<script type="text/javascript">
    $("#appl").hide();
    $("#newFile").click(function () {
        $("#newFile").hide("linear");
        $("#appl").show("linear");
    });

    function sendAd(){
        var val = $('#progress progress').attr('value');
        var newVal = val*1+1;
        var txt = Math.floor(newVal)+'%';
        if(val>=98){
            $('#progress progress').attr('value',98).text(txt);
            document.forms['trans'].submit();
        }else{
            $('#progress progress').attr('value',newVal).text(txt);
        }
        $('#progress strong').html(txt);
        if(val<98){
            lislid = setTimeout('sendAd()', 30);
        }else{
            lislid = setTimeout('sendAd()', 1500);
        }
    }

    function alltrans(){
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "index.php?p=admin/alltrans");
        xhr.send();
        xhr.onreadystatechange = function () {
            if(xhr.readyState == 4 && xhr.status == 200){
                document.getElementById("lestrnas").innerHTML = xhr.responseText;
                document.getElementById("title").innerHTML = "Tous mes suivies";
                $('#everything').hide();
            }
        }
    }

</script>
</body>
</html>
