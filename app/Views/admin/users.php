<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Gestion des Utilisateurs
        </h1>
        <ol class="breadcrumb">
            <li><a href="?p=user/myaccount"><i class="fa fa-dashboard"></i> Accueil</a></li>
            <li class="active">Gestion des Utilisateurs</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <?php

            if(isset($_SESSION['sendingMessage']) AND ($_SESSION['sendingMessage'] != false)){
                ?>
                <div class="col-md-4"></div>
                <div class="alert alert-<?= isset($_SESSION['sendingMessageColor']) ? $_SESSION['sendingMessageColor'] : 'success' ?> col-md-4" align="center">
                    <p align="center"><?= $_SESSION['sendingMessage'] ?></p>
                </div>
                <div class="col-md-4"></div>
                <?php
                $_SESSION['sendingMessage'] = false;
            }
            ?>
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <?php
                message('Vous n\'avez pas renseigner tous les champs', 'personnelModificationEmpty', 'warning');
                message('Vous n\'avez pas renseigner tous les champs', 'personnelAjoutEmpty', 'warning');
                message('Confirmez le mot de passe', 'confirm', 'warning');
                message('Modifications enregistrée avec succès!', 'personnelModification');
                message('Nouveau personnel enregistré avec succès!', 'personnelAjout');
                ?>
            </div>
        </div>
        <?php session('token', uniqid() . uniqid()) ?>
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-info nelborder-primary">
                    <div class="box-header">
                        <button type="button" class="btn btn-primary" data-target="#formulaire" data-toggle="modal"> <i class="fa fa-plus-circle"> </i> &nbsp;&nbsp;Administrateur</button>
                        <div class="modal fade" id="formulaire">
                            <div class="modal-dialog">
                                <div style="border-radius: 15px"  align="left" class="modal-content">
                                    <div style="border-radius: 15px 15px 0px 0px" class="modal-header bg-primary">
                                        <i style="position:relative; top: 1px; right: 3px" class="fa fa-pencil-square-o fa-2x"></i>
                                        <h3 style="display: inline" class="modal-title">Modification</h3>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <form role="form" action="index.php?p=admin/create" name="" method="post">
                                                <input id="csrf" name="token_csrf" value="<?= session('token') ?>" type="hidden">
                                                <div class="form-group col-md-12">
                                                    <label>Pays:</label>
                                                    <select class="form-control" id="country" name="country" >
                                                        <option value="Autre">Pas dans la liste</option>
                                                        <option value="Afrique du Sud"> Afrique du Sud</option>
                                                        <option value="Albanie"> Albanie</option>
                                                        <option value="Algérie"> Algérie</option>
                                                        <option value="Allemagne"> Allemagne</option>
                                                        <option value="Andorre"> Andorre</option>
                                                        <option value="Angola"> Angola</option>
                                                        <option value="Anguilla"> Anguilla</option>
                                                        <option value="Antigua-et-Barbuda"> Antigua-et-Barbuda</option>
                                                        <option value="Antilles néerlandaises"> Antilles néerlandaises</option>
                                                        <option value="Arabie saoudite"> Arabie saoudite</option>
                                                        <option value="Argentine"> Argentine</option>
                                                        <option value="Arménie"> Arménie</option>
                                                        <option value="Aruba"> Aruba</option>
                                                        <option value="Australie"> Australie</option>
                                                        <option value="Autriche"> Autriche</option>
                                                        <option value="Azerbaïdjan"> Azerbaïdjan</option>
                                                        <option value="Bahamas"> Bahamas</option>
                                                        <option value="Bahreïn"> Bahreïn</option>
                                                        <option value="Barbade"> Barbade</option>
                                                        <option value="Belgique"> Belgique</option>
                                                        <option value="Belize"> Belize</option>
                                                        <option value="Bénin"> Bénin</option>
                                                        <option value="Bermudes"> Bermudes</option>
                                                        <option value="Bhoutan"> Bhoutan</option>
                                                        <option value="Biélorussie"> Biélorussie</option>
                                                        <option value="Bolivie"> Bolivie</option>
                                                        <option value="Bosnie-Herzégovine"> Bosnie-Herzégovine</option>
                                                        <option value="Botswana"> Botswana</option>
                                                        <option value="Brésil"> Brésil</option>
                                                        <option value="Brunéi Darussalam"> Brunéi Darussalam</option>
                                                        <option value="Bulgarie"> Bulgarie</option>
                                                        <option value="Burkina Faso"> Burkina Faso</option>
                                                        <option value="Burundi"> Burundi</option>
                                                        <option value="Cambodge"> Cambodge</option>
                                                        <option value="Cameroun"> Cameroun</option>
                                                        <option value="CA"> Canada</option>
                                                        <option value="Canada"> Cap-Vert</option>
                                                        <option value="Chili"> Chili</option>
                                                        <option value="Chine"> Chine</option>
                                                        <option value="Chypre"> Chypre</option>
                                                        <option value="Colombie"> Colombie</option>
                                                        <option value="Comores"> Comores</option>
                                                        <option value="Congo-Brazzaville"> Congo-Brazzaville</option>
                                                        <option value="Congo-Kinshasa"> Congo-Kinshasa</option>
                                                        <option value="Corée du Sud"> Corée du Sud</option>
                                                        <option value="Costa Rica"> Costa Rica</option>
                                                        <option value="Côte d’Ivoire"> Côte d’Ivoire</option>
                                                        <option value="Croatie"> Croatie</option>
                                                        <option value="Danemark"> Danemark</option>
                                                        <option value="Djibouti"> Djibouti</option>
                                                        <option value="Dominique"> Dominique</option>
                                                        <option value="Égypte"> Égypte</option>
                                                        <option value="El Salvador"> El Salvador</option>
                                                        <option value="Émirats arabes unis"> Émirats arabes unis</option>
                                                        <option value="Équateur"> Équateur</option>
                                                        <option value="Érythrée"> Érythrée</option>
                                                        <option value="Espagne"> Espagne</option>
                                                        <option value="Estonie"> Estonie</option>
                                                        <option value="État de la Cité du Vatican"> État de la Cité du Vatican</option>
                                                        <option value="États fédérés de Micronésie"> États fédérés de Micronésie</option>
                                                        <option value="États-Unis"> États-Unis</option>
                                                        <option value="Éthiopie"> Éthiopie</option>
                                                        <option value="Fidji"> Fidji</option>
                                                        <option value="Finlande"> Finlande</option>
                                                        <option selected="selected" value="France"> France</option>
                                                        <option value="Gabon"> Gabon</option>
                                                        <option value="Gambie"> Gambie</option>
                                                        <option value="Géorgie"> Géorgie</option>
                                                        <option value="Gibraltar"> Gibraltar</option>
                                                        <option value="Grèce"> Grèce</option>
                                                        <option value="Grenade"> Grenade</option>
                                                        <option value="Groenland"> Groenland</option>
                                                        <option value="Guadeloupe"> Guadeloupe</option>
                                                        <option value="Guatemala"> Guatemala</option>
                                                        <option value="Guinée"> Guinée</option>
                                                        <option value="Guinée-Bissau"> Guinée-Bissau</option>
                                                        <option value="Guyana"> Guyana</option>
                                                        <option value="Guyane française"> Guyane française</option>
                                                        <option value="Honduras"> Honduras</option>
                                                        <option value="Hongrie"> Hongrie</option>
                                                        <option value="Île Norfolk"> Île Norfolk</option>
                                                        <option value="Îles Caïmans"> Îles Caïmans</option>
                                                        <option value="Îles Cook"> Îles Cook</option>
                                                        <option value="Îles Féroé"> Îles Féroé</option>
                                                        <option value="Îles Malouines"> Îles Malouines</option>
                                                        <option value="Îles Marshall"> Îles Marshall</option>
                                                        <option value="Îles Pitcairn"> Îles Pitcairn</option>
                                                        <option value="Îles Salomon"> Îles Salomon</option>
                                                        <option value="Îles Turques-et-Caïques"> Îles Turques-et-Caïques</option>
                                                        <option value="Îles Vierges britanniques"> Îles Vierges britanniques</option>
                                                        <option value="Inde"> Inde</option>
                                                        <option value="Indonésie"> Indonésie</option>
                                                        <option value="Irlande"> Irlande</option>
                                                        <option value="Islande"> Islande</option>
                                                        <option value="Israël"> Israël</option>
                                                        <option value="Italie"> Italie</option>
                                                        <option value="Jamaïque"> Jamaïque</option>
                                                        <option value="Japon"> Japon</option>
                                                        <option value="Jordanie"> Jordanie</option>
                                                        <option value="Kazakhstan"> Kazakhstan</option>
                                                        <option value="Kenya"> Kenya</option>
                                                        <option value="Kirghizistan"> Kirghizistan</option>
                                                        <option value="Kiribati"> Kiribati</option>
                                                        <option value="Koweït"> Koweït</option>
                                                        <option value="La Réunion"> La Réunion</option>
                                                        <option value="Laos"> Laos</option>
                                                        <option value="Lesotho"> Lesotho</option>
                                                        <option value="Lettonie"> Lettonie</option>
                                                        <option value="Liechtenstein"> Liechtenstein</option>
                                                        <option value="Lituanie"> Lituanie</option>
                                                        <option value="Luxembourg"> Luxembourg</option>
                                                        <option value="Macédoine"> Macédoine</option>
                                                        <option value="Madagascar"> Madagascar</option>
                                                        <option value="Malaisie"> Malaisie</option>
                                                        <option value="Malawi"> Malawi</option>
                                                        <option value="Maldives"> Maldives</option>
                                                        <option value="Mali"> Mali</option>
                                                        <option value="Malte"> Malte</option>
                                                        <option value="Maroc"> Maroc</option>
                                                        <option value="Martinique"> Martinique</option>
                                                        <option value="Maurice"> Maurice</option>
                                                        <option value="Mauritanie"> Mauritanie</option>
                                                        <option value="Mayotte"> Mayotte</option>
                                                        <option value="Mexique"> Mexique</option>
                                                        <option value="Moldavie"> Moldavie</option>
                                                        <option value="Monaco"> Monaco</option>
                                                        <option value="Mongolie"> Mongolie</option>
                                                        <option value="Monténégro"> Monténégro</option>
                                                        <option value="Montserrat"> Montserrat</option>
                                                        <option value="Mozambique"> Mozambique</option>
                                                        <option value="Namibie"> Namibie</option>
                                                        <option value="Nauru"> Nauru</option>
                                                        <option value="Népal"> Népal</option>
                                                        <option value="Nicaragua"> Nicaragua</option>
                                                        <option value="Niger"> Niger</option>
                                                        <option value="Nigéria"> Nigéria</option>
                                                        <option value="Niue"> Niue</option>
                                                        <option value="Norvège"> Norvège</option>
                                                        <option value="Nouvelle-Calédonie"> Nouvelle-Calédonie</option>
                                                        <option value="Nouvelle-Zélande"> Nouvelle-Zélande</option>
                                                        <option value="Oman"> Oman</option>
                                                        <option value="Ouganda"> Ouganda</option>
                                                        <option value="Palaos"> Palaos</option>
                                                        <option value="Panama"> Panama</option>
                                                        <option value="Papouasie-Nouvelle-Guinée"> Papouasie-Nouvelle-Guinée</option>
                                                        <option value="Paraguay"> Paraguay</option>
                                                        <option value="Pays-Bas"> Pays-Bas</option>
                                                        <option value="Pérou"> Pérou</option>
                                                        <option value="Philippines"> Philippines</option>
                                                        <option value="Pologne"> Pologne</option>
                                                        <option value="Polynésie française"> Polynésie française</option>
                                                        <option value="Portugal"> Portugal</option>
                                                        <option value="Qatar"> Qatar</option>
                                                        <option value="R.A.S. chinoise de Hong Kong"> R.A.S. chinoise de Hong Kong</option>
                                                        <option value="République dominicaine"> République dominicaine</option>
                                                        <option value="République tchèque"> République tchèque</option>
                                                        <option value="Roumanie"> Roumanie</option>
                                                        <option value="Royaume-Uni"> Royaume-Uni</option>
                                                        <option value="Russie"> Russie</option>
                                                        <option value="Rwanda"> Rwanda</option>
                                                        <option value="Saint-Christophe-et-Niévès"> Saint-Christophe-et-Niévès</option>
                                                        <option value="Saint-Marin"> Saint-Marin</option>
                                                        <option value="Saint-Pierre-et-Miquelon"> Saint-Pierre-et-Miquelon</option>
                                                        <option value="Saint-Vincent-et-les-Grenadines"> Saint-Vincent-et-les-Grenadines</option>
                                                        <option value="Sainte-Hélène"> Sainte-Hélène</option>
                                                        <option value="Sainte-Lucie"> Sainte-Lucie</option>
                                                        <option value="Samoa"> Samoa</option>
                                                        <option value="Sao Tomé-et-Principe"> Sao Tomé-et-Principe</option>
                                                        <option value="Sénégal"> Sénégal</option>
                                                        <option value="Serbie"> Serbie</option>
                                                        <option value="Seychelles"> Seychelles</option>
                                                        <option value="Sierra Leone"> Sierra Leone</option>
                                                        <option value="Singapour"> Singapour</option>
                                                        <option value="Slovaquie"> Slovaquie</option>
                                                        <option value="Slovénie"> Slovénie</option>
                                                        <option value="Somalie"> Somalie</option>
                                                        <option value="Sri Lanka"> Sri Lanka</option>
                                                        <option value="Suède"> Suède</option>
                                                        <option value="Suisse"> Suisse</option>
                                                        <option value="Suriname"> Suriname</option>
                                                        <option value="Svalbard et Jan Mayen"> Svalbard et Jan Mayen</option>
                                                        <option value="Swaziland"> Swaziland</option>
                                                        <option value="Tadjikistan"> Tadjikistan</option>
                                                        <option value="Taïwan"> Taïwan</option>
                                                        <option value="Tanzanie"> Tanzanie</option>
                                                        <option value="Tchad"> Tchad</option>
                                                        <option value="Thaïlande"> Thaïlande</option>
                                                        <option value="Togo"> Togo</option>
                                                        <option value="Tonga"> Tonga</option>
                                                        <option value="Trinité-et-Tobago"> Trinité-et-Tobago</option>
                                                        <option value="Tunisie"> Tunisie</option>
                                                        <option value="Turkménistan"> Turkménistan</option>
                                                        <option value="Tuvalu"> Tuvalu</option>
                                                        <option value="Ukraine"> Ukraine</option>
                                                        <option value="Uruguay"> Uruguay</option>
                                                        <option value="Vanuatu"> Vanuatu</option>
                                                        <option value="Venezuela"> Venezuela</option>
                                                        <option value="Vietnam"> Vietnam</option>
                                                        <option value="Wallis-et-Futuna"> Wallis-et-Futuna</option>
                                                        <option value="Yémen"> Yémen</option>
                                                        <option value="Zambie"> Zambie</option>
                                                        <option value="Zimbabwe"> Zimbabwe</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label>Nom:</label>
                                                    <input  value="" type="text" name="nom" class="form-control" placeholder="Nom"/>
                                                    <input style="display: none" value="" type="text" name="id" class="form-control" placeholder="Nom"/>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label>Prénom:</label>
                                                    <input value="" type="text" name="prenom" class="form-control" placeholder="Prénom"/>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label for="exampleInputEmail1">Email:</label>
                                                    <input type="email" class="form-control" name="email" value="" id="exampleInputEmail1" placeholder="Email">
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label>Nouveau mot de passe:</label>
                                                    <input type="password" name="pwd" class="form-control" placeholder="Mot de passe"/>
                                                </div>
                                                <div class="form-group col-md-12 ">
                                                    <label>Confirmez:</label>
                                                    <input  type="password" name="cpwd" class="form-control" placeholder="Confirmez"/>
                                                </div>
                                                <div style="margin-bottom: 10px; margin-top: 15px;" class="form-group col-md-12">
                                                    <button type="reset" class="btn btn-warning pull-left">Annuler</button>
                                                    <button style=" position: relative; right: 0px" type="submit" class="btn btn-primary pull-right">Enregistrer</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                            <?php message('Utilisateur supprimé avec succès', 'dropUser'); ?>
                            <?php message('Message envoyé avec succès', 'nelSending'); ?>
                            <?php message('Administrateur ajouté avec succès.', 'userAdd'); ?>
                            <?php message('Echec d\'envoi.  Veillez reéssayer plus tard.', 'nolSending', 'warning'); ?>
                            <?php message('L\'email que vous avez entré n\'est pas associé à un compte', 'userNotFound', 'warning'); ?>
                            <?php message('Vous n\'avez pas rempli tous les champs', 'void', 'warning') ?>
                            <?php message('Les mots de passe ne correspondent pas', 'badPwd', 'warning') ?>
                            <?php message('Veillez suivre la procédure normale!!', 'noToken', 'warning') ?>
                        </div>
                        <div class="col-md-4"></div>
                    </div>
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Bloquer</th>
                                <th>Nom et Prénom</th>
                                <th> <div  align="center">Rôle</div> </th>
                                <th> <div align="right">Actions</div> </th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach($users as $utilisateur):
                                $style = App::getApp()->noPrivilege($utilisateur->idUser);
                                if($utilisateur->locked){
                                    $check = 'checked';
                                }else{
                                    $check = null;
                                }
                                if($id === $utilisateur->idUser){
                                    $disabled = 'disabled title="Connectez vous avec un autre compte pour effectuer cette action"';
                                }else{
                                    $disabled = null;
                                }
                                $bloquer = $utilisateur->locked;
                                ?>
                                <tr id="<?= 'neld1' . $utilisateur->idUser ?>" style="">
                                    <td>
                                        <div align="">
                                            <input
                                                <?= $disabled ?>
                                                <?= $check ?>
                                                id="<?= 'nel' . $utilisateur->idUser ?>"
                                                onclick="granted(<?= $utilisateur->idUser ?>)"
                                                style="width: 15px; height: 15px; color: red; background-color: red; margin-left: 15px"
                                                type="checkbox"
                                                class="minimal-red"
                                            />
                                        </div>
                                    </td>
                                    <td>
                                        <a href="#">
                                            <?php
                                            if($utilisateur->photo){
                                                $photoNum = $utilisateur->idUser;
                                            }else{
                                                $photoNum = '0';
                                            }
                                            ?>
                                            <img src="public/img/user<?= $photoNum ?>.jpg" style="width: 30px" class="img-circle" alt="User picture"/>
                                        </a> &nbsp;&nbsp;
                                        <?= $utilisateur->prenom ?> <?= $utilisateur->nom ?>
                                    </td>
                                    <td align="center">
                                        <?= administrator($utilisateur->idUser) ? 'Administrateur' : 'Utilisateur' ?>
                                    </td>
                                    <td>
                                        <div align="right">
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-primary" data-target="#affichage<?= $utilisateur->idUser ?>" title="Afficher" data-toggle="modal"><i class="fa fa-search-plus"></i></button>
                                                <div class="modal fade" id="affichage<?= $utilisateur->idUser ?>">
                                                    <div class="modal-dialog">
                                                        <div style="border-radius: 15px" class="modal-content">
                                                            <div align="left" style="border-radius: 15px 15px 0px 0px" class="modal-header bg-primary">
                                                                <i style="position:relative; top: 1px; right: 3px" class="fa fa-info-circle fa-2x"></i>
                                                                <h3 style="display: inline" class="modal-title">Information générale</h3>

                                                                <button class="close pull-right" data-dismiss="modal">
                                                                    <i class="fa fa-times"></i>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div style="margin-left: 15px">
                                                                    <div class="row">
                                                                        <table>
                                                                            <tr>
                                                                                <td style="width: 380px">
                                                                                    <b>Prenom: </b> <span style="position: relative; left: 110px"><i><?= $utilisateur->prenom ?></i></span>
                                                                                </td>
                                                                                <td rowspan="6">
                                                                                    <div class="col-md-12">
                                                                                        <div class="box box-solid">
                                                                                            <div class="box-body">
                                                                                                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                                                                                                    <ol class="carousel-indicators">
                                                                                                        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                                                                                        <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
                                                                                                        <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
                                                                                                    </ol>
                                                                                                    <div class="carousel-inner">
                                                                                                        <div class="item active">
                                                                                                            <img src="public/img/user<?= $photoNum ?>.jpg" alt="First slide">
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>
                                                                                    <b>Nom: </b> <span style="position: relative; left: 130px"><i><?= $utilisateur->nom ?></i></span>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>
                                                                                    <div style="position: relative; left: 0px; top: -5px">
                                                                                        <b>E-mail: </b> <span style="position: relative; left: 120px"><i><?= $utilisateur->email ?></i></span>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>
                                                                                    <div style="position: relative; left: 0px; top: -4px">
                                                                                        <b>Numéro de compte: </b> <span style="position: relative; left: 31px;"><i><?= n_numSplitter($utilisateur->num) ?></i></span>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>
                                                                                    <div style="position: relative; left: 0px; top: -7px">
                                                                                        <b>Solde: </b> <span style="position: relative; left: 120px">
                                                                                            <span id="modifMontant">
                                                                                                <input id="tras<?= $utilisateur->idUser ?>" onblur="changeur(<?= $utilisateur->idUser ?>);" class="form-control tras ntras" type="text" value="<?= $utilisateur->montant ?> <?= session('n_dev') ?>">
                                                                                            </span>
                                                                                            <span id="montant<?= $utilisateur->idUser ?>" ondblclick="modifier(<?= $utilisateur->idUser ?>);"><i><?= $utilisateur->montant ?> <?= session('n_dev') ?></i></span>
                                                                                        </span>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>
                                                                                    <div style="position: relative; left: 0px; top: -12px">
                                                                                        <?php
                                                                                        if($utilisateur->taille/1024/1024 <= 0){
                                                                                            $taille = 0;
                                                                                        }elseif($utilisateur->taille/1024/1024 < 0.001){
                                                                                            $taille = 0.01;
                                                                                        }else{
                                                                                            $taille = hundred($utilisateur->taille/1024/1024);
                                                                                        }
                                                                                        ?>
                                                                                        <b>Espace libre: </b> <span style="position: relative; left: 75px"><i><?= session('n_size') - $taille ?> MB</i></span>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                        </table>
                                                                    </div>
                                                                    <div align="center">
                                                                        <span style="position: relative; top: -4px; color: #cccccc">--------</span><b>*</b><span style="position: relative; top: -4px; color: #cccccc">--------</span>
                                                                    </div>
                                                                    <div align="center" class="row">
                                                                        <?php
                                                                        if(administrator($utilisateur->idUser)){
                                                                            ?>
                                                                            <b>Administrateur</b> de SecuRITY
                                                                            <?php
                                                                        }else{
                                                                            ?>
                                                                            <b>Utilisateur</b> de SecuRITY
                                                                            <br><br>
                                                                            <?php
                                                                        }
                                                                        ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="btn-group">
                                                <button type="button" data-target="#modifierModal<?= $utilisateur->idUser ?>" data-toggle="modal" title="Modifier" class="btn btn-warning"><i class="fa  fa-edit"></i></button>
                                                <div class="modal fade" data-keyboard="false" data-backdrop="static" id="modifierModal<?= $utilisateur->idUser ?>">
                                                    <div class="modal-dialog">
                                                        <div style="border-radius: 15px"  align="left" class="modal-content">
                                                            <div style="border-radius: 15px 15px 0px 0px" class="modal-header bg-primary">
                                                                <i style="position:relative; top: 1px; right: 3px" class="fa fa-pencil-square-o fa-2x"></i>
                                                                <h3 style="display: inline" class="modal-title">Modification</h3>
                                                                <button onclick="sansMDP();" class="close pull-right" data-dismiss="modal">
                                                                    <i class="fa fa-times"></i>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <form role="form" action="index.php?p=admin/modification" name="modify<?= $utilisateur->idUser ?>" method="post">
                                                                        <div class="form-group col-md-12">
                                                                            <label>Pays:</label>
                                                                            <input id="csrf" name="token_csrf" value="<?= session('token') ?>" type="hidden">
                                                                            <input style="width: 550px" value="<?= $utilisateur->country ?>" type="text" name="country" class="form-control" placeholder="Pays de résidence"/>
                                                                        </div>
                                                                        <div class="form-group col-md-12">
                                                                            <label>Nom:</label>
                                                                            <input style="width: 550px" value="<?= $utilisateur->nom ?>" type="text" name="nom" class="form-control" placeholder="Nom"/>
                                                                            <input style="width: 550px; display: none" value="<?= $utilisateur->idUser ?>" type="text" name="id" class="form-control" placeholder="Nom"/>
                                                                        </div>
                                                                        <div class="form-group col-md-12">
                                                                            <label>Prénom:</label>
                                                                            <input style="width: 550px" value="<?= $utilisateur->prenom ?>" type="text" name="prenom" class="form-control" placeholder="Prénom"/>
                                                                        </div>
                                                                        <div class="form-group col-md-12">
                                                                            <label for="exampleInputEmail1">Email:</label>
                                                                            <input type="email" class="form-control" name="email" value="<?= $utilisateur->email ?>" style="width: 550px" id="exampleInputEmail1" placeholder="Email">
                                                                        </div>
                                                                        <div style="margin-bottom: 10px; margin-top: 15px" class="form-group col-md-12 mdpChanger2">
                                                                            <a href="#" onclick="avecMPD();" type="reset" style=" position: relative; right: 20px; color: rgba(255,0,0,0.79)" class="pull-right mdpChanger">Changer le mot de passe</a>
                                                                        </div>
                                                                        <div class="form-group col-md-12 newMDP">
                                                                            <label>Nouveau mot de passe:</label>
                                                                            <input style="width: 550px" type="password" name="pwd" class="form-control" placeholder="Mot de passe"/>
                                                                        </div>
                                                                        <div class="form-group col-md-12 newMDP">
                                                                            <label>Confirmez:</label>
                                                                            <input style="width: 550px"  type="password" name="cpwd" class="form-control" placeholder="Confirmez"/>
                                                                        </div>
                                                                        <div style="margin-bottom: 10px; margin-top: 15px;" class="form-group col-md-12">
                                                                            <button type="reset" onclick="sansMDP();" data-dismiss="modal" class="btn btn-warning pull-left">Annuler</button>
                                                                            <button style=" position: relative; right: 20px" type="button" onclick="document.forms['modify<?= $utilisateur->idUser ?>'].submit(); sansMDP();" class="btn btn-primary pull-right">Enregistrer</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="btn-group">
                                                <button type="button" <?= $disabled ?> data-target="#messageModal<?= $utilisateur->idUser ?>" data-toggle="modal" title="Envoyer Message" class="btn btn-info"><i class="fa fa-envelope-o"></i></button>
                                                <div class="modal fade" id="messageModal<?= $utilisateur->idUser ?>">
                                                    <div class="modal-dialog">
                                                        <div style="border-radius: 15px"  align="left" class="modal-content">
                                                            <div style="border-radius: 15px 15px 0px 0px" class="modal-header bg-primary">
                                                                <i style="position:relative; top: 1px; right: 3px" class="fa fa-envelope fa-2x"></i>
                                                                <h3 style="display: inline" class="modal-title">Envois rapide</h3>
                                                            </div>
                                                            <div class="modal-body">

                                                                <form action="index.php?p=admin/fastSending" method="post">
                                                                    <div class="modal-body">
                                                                        <div class="form-group">
                                                                            <input style="width: 100%;" readonly value="<?= $utilisateur->email ?>" type="email" class="form-control" name="destinataire">
                                                                            <input type="hidden" name="id" value="<?= $utilisateur->idUser ?>">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <input type="text" style="width: 100%; margin-top: 15px" class="form-control" name="sujet" placeholder="Sujet">
                                                                        </div>
                                                                        <div>
                                                                            <textarea class="textarea" name="contenu" placeholder="Message" style="width: 100%; margin-top: 15px; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="box-footer clearfix">
                                                                        <button type="submit" class="pull-right btn btn-default" id="sendEmail">
                                                                            Envoyer <i class="fa fa-arrow-circle-right"></i>
                                                                        </button>
                                                                    </div>
                                                                </form>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="btn-group">
                                                <form action="?p=admin/destroy" name="destruction" method="post">
                                                    <input type="text" name="idPersonnel" style="display: none" value="<?= $utilisateur->idUser ?>" />
                                                    <button type="submit" <?= $disabled ?> title="Supprimer le compte" class="btn btn-danger"><i class="fa fa-trash-o"></i></button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Bloquer</th>
                                <th>Nom et Prénom</th>
                                <th> <div align="center">Rôle</div> </th>
                                <th> <div align="right">Actions</div> </th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
