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



    </style>
</head>
<body onload="userLocked();" class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

    <header class="main-header">
        <nav class="navbar navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <a href="?p=user/myaccount" class="navbar-brand"><b>FINA</b>CIS</a>
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                        <i class="fa fa-bars"></i>
                    </button>
                </div>

                <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="?p=user/myaccount">Tableau de bord <span class="sr-only">(current)</span></a></li>
                        <li><a href="?p=user/asking">Credit</a></li>
                        <li><a href="?p=user/mybalance">Portefeuille</a></li>
                        <?= isset($_SESSION['AdminHJ4ssRF5']) ? '<li><a href="?p=admin/users">Utilisateurs</a></li>' : '' ?>
                        <?= isset($_SESSION['AdminHJ4ssRF5']) ? '<li><a href="?p=admin/settings">Parametres</a></li>' : '' ?>
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
            <b><?= date('Y') ?></b>
        </div>
        <a href="http://beloans.com"><strong>BELOANS BANK</strong></a>. All rights reserved.
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
        alert("Voulez vous vraiment supprimer " + name + " ?"+id);
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
        $('#ck4df').hide();
        $('#conti').hide();

        $("[data-mask]").inputmask();

        $(".numCompteur").inputmask("yyyy-yyyy-yyyy", {"placeholder": "NNNN-NNNN-NNNN"});

        $('.newMDP').hide();

        setTimeout("hideMsg()", 5000);

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

    var lislid;
    var arret = false;
    var code = true;
    var showModal = true;

    function modifValues(){
        $("#debutTrans").show('slow');
        var val = $('#progress progress').attr('value');
        if(val>=85){
            clearTimeout(lislid);
        }

        var newVal = val*1+1;
        var txt = Math.floor(newVal)+'%';

        if(val>=98){
            $('#progress progress').attr('value',98).text(txt);
            document.forms['neltrans'].submit();
        }else{
            $('#progress progress').attr('value',newVal).text(txt);
        }

        $('#progress strong').html(txt);

        if(arret == true){
            return;
        }

        if(val<98){
            lislid = setTimeout('modifValues()', 30);
        }else{
            lislid = setTimeout('modifValues()', 1500);
        }

        if((val==49 || val==50 || val==51 || val==52) && code){
            $('#progress progress').attr('value',45).text(txt);

            lislid = setTimeout('modifValues()', 999999);
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "index.php?p=user/partsofT");
            xhr.send();
            xhr.onreadystatechange = function () {
                if(xhr.readyState == 4 && xhr.status == 200){
                    var c = xhr.responseText;
                    if(showModal){
                        showModal = false;
                        $('#cHfd4ESD').modal('show');
                        $('#ck4df').show('slow');
                        $('#conti').show();
                        $('#transta').hide();

                        $('#conti').click(function () {
                            var vel = document.getElementById('securityCod').value;
                            if(vel==c){
                                $('#progress progress').attr('value',53).text(txt);
                            }else{
                                v++;
                                document.getElementById('securityCod').value = '';
                                if(v==3){
                                    window.location="index.php?p=user/logout";
                                    //alert(3);
                                }
                            }
                        });

                    }
                }
            }
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
        modifValues();
    }

    $("#saing").click(
        function (e) {
            e.preventDefault();
            $("#privilege").submit();
        }
    );
</script>
<script type="text/javascript">
    $("#appl").hide();
    $("#newFile").click(function () {
        $("#newFile").hide("linear");
        $("#appl").show("linear");
    });


</script>
</body>
</html>
