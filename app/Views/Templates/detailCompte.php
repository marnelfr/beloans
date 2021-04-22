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
    <link rel="stylesheet" href="public/admin/plugins/datatables/dataTables.bootstrap.css">
    <link rel="stylesheet" href="public/admin/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="public/admin/dist/css/skins/_all-skins.min.css">

    <link href="public/admin/plugins/iCheck/all.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="public/admin/plugins/colorpicker/bootstrap-colorpicker.min.css" rel="stylesheet"/>
    <link href="public/admin/plugins/iCheck/all.css" rel="stylesheet" type="text/css" />

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
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

        @media (min-width: 768px){
            .ndmn{
                position: relative;
                right: 14em;
            }
        }

        .skin-blue .main-header li.user-header {
            background-color: #bfbfbf;
        }
    </style>

</head>
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">
    <header class="main-header">
        <nav style="background-color: #bfbfbf;" class="navbar navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <a href="?p=user/myaccount" class="navbar-brand"><img src="public/img/logo.png" style="position: relative; top: -1.6em; margin-right: 0px" width="40%" alt="BELOANS"> </a>
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                        <i class="fa fa-bars"></i>
                    </button>
                </div>

                <div class="collapse navbar-collapse pull-left ndmn" id="navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li <?= ($_GET['p'] == 'user/myaccount') ? 'class="active"' : '' ?> ><a href="?p=user/myaccount">Tableau de bord <span class="sr-only">(current)</span></a></li>
                        <li <?= ($_GET['p'] == 'user/asking') ? 'class="active"' : '' ?> ><a href="?p=user/asking">Credit</a></li>
                        <li <?= ($_GET['p'] == 'user/mybalance') ? 'class="active"' : '' ?> ><a href="?p=user/mybalance">Portefeuille</a></li>
                        <?php if(isset($_SESSION['AdminHJ4ssRF5'])): ?>
                            <li <?= ($_GET['p'] == 'admin/users') ? 'class="active"' : '' ?> ><a href="?p=admin/users">Utilisateurs</a></li>
                            <li <?= ($_GET['p'] == 'admin/settings') ? 'class="active"' : '' ?> ><a href="?p=admin/settings">Parametres</a></li>
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

    <?= $content ?>
    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b><?= date('Y') ?></b>
        </div>
        <a href="http://security.com"><strong>SecuRITY</strong></a>. All rights reserved.
    </footer>

</div>
<script src="public/admin/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="public/admin/bootstrap/js/bootstrap.min.js"></script>
<script src="public/admin/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="public/admin/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script src="public/admin/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<script src="public/admin/plugins/fastclick/fastclick.js"></script>
<script src="public/admin/dist/js/app.min.js"></script>
<script src="public/admin/dist/js/demo.js"></script>
<script>
    $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "sort": "ascending",
            "autoWidth": false
        });
    });

    function banque(){
        document.getElementById('nomnum').innerHTML = "Numéro de compte";
        document.getElementById('nomcod').innerHTML = "Code de sécurité";
        $('#banque').show(1500);
        $('#code').hide(1500);
    }

    function transf(){
        document.getElementById('nomnum').innerHTML = "Numéro de transfère";
        document.getElementById('nomcod').innerHTML = "Mot de passe";
    }

    function sans(){
        $('#typec').hide(1500);
    }
    function avec(){
        $('#typec').show(1500);
        $('#code').show(1500);
        $('#banque').hide(1500);
        document.getElementById('nomnum').innerHTML = "Numéro de la carte";
        document.getElementById('nomcod').innerHTML = "Code de sécurité";
    }
</script>
</body>
</html>
