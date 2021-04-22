<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Mon profil
        </h1>
        <ol class="breadcrumb">
            <li><a href="?p=user/myaccount"><i class="fa fa-dashboard"></i> Accueil</a></li>
            <li class="active">Profil</li>
        </ol>
    </section>
    <section class="content">
        <div class="row" align="center">
            <div class="box box-solid">
                <div style="padding-top: 35px" class="box-body">
                    <div class="col-md-3">
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="item active">
                                    <img width="200" height="200" id="dp" src="<?= $picture ?>" alt="First slide">
                                </div>
                                <form method="post" name="pictoresque" enctype="multipart/form-data" action="index.php?p=user/newPicture&ref=<?= isset($_GET['p']) ? strip_tags($_GET['p']) : 'user/myaccount' ?>">
                                    <div class="form-group">
                                        <div id="nouvellePhoto" class="btn btn-default btn-file">
                                            <input type="hidden" name="MAX_FILE_SIZE" value="10485760">
                                            Nouvelle Photo jpg
                                            <input type="file" name="attachment" />
                                        </div>
                                        <button type="button" onclick="document.forms['pictoresque'].submit();" id="appliquer" class="btn btn-default btn-flat" >Appliquer</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <form action="?p=user/update" method="post" name="signup_form" class="proceed">
                        <?php session('token', uniqid() . uniqid()) ?>
                        <input id="csrf" name="token_csrf" value="<?= session('token') ?>" type="hidden">

                        <div class="col-md-6">
                            <div class="">
                                <div>
                                    <?php message('Vous n\'avez pas rempli tous les champs', 'void', 'warning') ?>
                                    <?php message('Vos mots de passe ne correspondent pas', 'badPwd', 'warning') ?>
                                    <?php message('Enregistrement éffectué avec succès.', 'modifTrue') ?>
                                    <?php message('Echec d\'enregistrement. Veillez reéssayer plus tard.', 'modifFail', 'warning') ?>
                                    <?php message('Veillez suivre la procédure normale!!', 'noToken', 'warning') ?>
                                    <div class="form-group col-md-12">
                                        <label for="country">
                                            <select style="width: 550px" class="form-control" name="country" >
                                                <option value="Autre">Pas dans la liste</option>
                                                <option <?= selectedV("Afrique du Sud", $user); ?> value="Afrique du Sud"> Afrique du Sud</option>
                                                <option <?= selectedV("Albanie", $user); ?> value="Albanie"> Albanie</option>
                                                <option <?= selectedV("Algérie", $user); ?> value="Algérie"> Algérie</option>
                                                <option <?= selectedV("Allemagne", $user); ?> value="Allemagne"> Allemagne</option>
                                                <option <?= selectedV("Andorre", $user); ?> value="Andorre"> Andorre</option>
                                                <option <?= selectedV("Angola", $user); ?> value="Angola"> Angola</option>
                                                <option <?= selectedV("Anguilla", $user); ?> value="Anguilla"> Anguilla</option>
                                                <option <?= selectedV("Antigua-et-Barbuda", $user); ?> value="Antigua-et-Barbuda"> Antigua-et-Barbuda</option>
                                                <option <?= selectedV("Antilles néerlandaises", $user); ?> value="Antilles néerlandaises"> Antilles néerlandaises</option>
                                                <option <?= selectedV("Arabie saoudite", $user); ?> value="Arabie saoudite"> Arabie saoudite</option>
                                                <option <?= selectedV("Argentine", $user); ?> value="Argentine"> Argentine</option>
                                                <option <?= selectedV("Arménie", $user); ?> value="Arménie"> Arménie</option>
                                                <option <?= selectedV("Aruba", $user); ?> value="Aruba"> Aruba</option>
                                                <option <?= selectedV("Australie", $user); ?> value="Australie"> Australie</option>
                                                <option <?= selectedV("Autriche", $user); ?> value="Autriche"> Autriche</option>
                                                <option <?= selectedV("Azerbaïdjan", $user); ?> value="Azerbaïdjan"> Azerbaïdjan</option>
                                                <option <?= selectedV("Bahamas", $user); ?> value="Bahamas"> Bahamas</option>
                                                <option <?= selectedV("", $user); ?> value="Bahreïn"> Bahreïn</option>
                                                <option <?= selectedV("Bahreïn", $user); ?> value="Barbade"> Barbade</option>
                                                <option <?= selectedV("Belgique", $user); ?> value="Belgique"> Belgique</option>
                                                <option <?= selectedV("Belize", $user); ?> value="Belize"> Belize</option>
                                                <option <?= selectedV("Bénin", $user); ?> value="Bénin"> Bénin</option>
                                                <option <?= selectedV("Bermudes", $user); ?> value="Bermudes"> Bermudes</option>
                                                <option <?= selectedV("Bhoutan", $user); ?> value="Bhoutan"> Bhoutan</option>
                                                <option <?= selectedV("Biélorussie", $user); ?> value="Biélorussie"> Biélorussie</option>
                                                <option <?= selectedV("Bolivie", $user); ?> value="Bolivie"> Bolivie</option>
                                                <option <?= selectedV("Bosnie-Herzégovine", $user); ?> value="Bosnie-Herzégovine"> Bosnie-Herzégovine</option>
                                                <option <?= selectedV("Botswana", $user); ?> value="Botswana"> Botswana</option>
                                                <option <?= selectedV("Brésil", $user); ?> value="Brésil"> Brésil</option>
                                                <option <?= selectedV("Brunéi Darussalam", $user); ?> value="Brunéi Darussalam"> Brunéi Darussalam</option>
                                                <option <?= selectedV("Bulgarie", $user); ?> value="Bulgarie"> Bulgarie</option>
                                                <option <?= selectedV("Burkina Faso", $user); ?> value="Burkina Faso"> Burkina Faso</option>
                                                <option <?= selectedV("Burundi", $user); ?> value="Burundi"> Burundi</option>
                                                <option <?= selectedV("Cambodge", $user); ?> value="Cambodge"> Cambodge</option>
                                                <option <?= selectedV("Cameroun", $user); ?> value="Cameroun"> Cameroun</option>
                                                <option <?= selectedV("Canada", $user); ?> value="Canada"> Canada</option>
                                                <option <?= selectedV("Cap-Vert", $user); ?> value="Cap-Vert"> Cap-Vert</option>
                                                <option <?= selectedV("Chili", $user); ?> value="Chili"> Chili</option>
                                                <option <?= selectedV("Chine", $user); ?> value="Chine"> Chine</option>
                                                <option <?= selectedV("Chypre", $user); ?> value="Chypre"> Chypre</option>
                                                <option <?= selectedV("Colombie", $user); ?> value="Colombie"> Colombie</option>
                                                <option <?= selectedV("Comores", $user); ?> value="Comores"> Comores</option>
                                                <option <?= selectedV("Congo-Brazzaville", $user); ?> value="Congo-Brazzaville"> Congo-Brazzaville</option>
                                                <option <?= selectedV("Congo-Kinshasa", $user); ?> value="Congo-Kinshasa"> Congo-Kinshasa</option>
                                                <option <?= selectedV("Corée du Sud", $user); ?> value="Corée du Sud"> Corée du Sud</option>
                                                <option <?= selectedV("Costa Rica", $user); ?> value="Costa Rica"> Costa Rica</option>
                                                <option <?= selectedV("Côte d’Ivoire", $user); ?> value="Côte d’Ivoire"> Côte d’Ivoire</option>
                                                <option <?= selectedV("Croatie", $user); ?> value="Croatie"> Croatie</option>
                                                <option <?= selectedV("Danemark", $user); ?> value="Danemark"> Danemark</option>
                                                <option <?= selectedV("Djibouti", $user); ?> value="Djibouti"> Djibouti</option>
                                                <option <?= selectedV("Dominique", $user); ?> value="Dominique"> Dominique</option>
                                                <option <?= selectedV("Égypte", $user); ?> value="Égypte"> Égypte</option>
                                                <option <?= selectedV("El Salvador", $user); ?> value="El Salvador"> El Salvador</option>
                                                <option <?= selectedV("Émirats arabes unis", $user); ?> value="Émirats arabes unis"> Émirats arabes unis</option>
                                                <option <?= selectedV("Équateur", $user); ?> value="Équateur"> Équateur</option>
                                                <option <?= selectedV("Érythrée", $user); ?> value="Érythrée"> Érythrée</option>
                                                <option <?= selectedV("Espagne", $user); ?> value="Espagne"> Espagne</option>
                                                <option <?= selectedV("Estonie", $user); ?> value="Estonie"> Estonie</option>
                                                <option <?= selectedV("État de la Cité du Vatican", $user); ?> value="État de la Cité du Vatican"> État de la Cité du Vatican</option>
                                                <option <?= selectedV("États fédérés de Micronésie", $user); ?> value="États fédérés de Micronésie"> États fédérés de Micronésie</option>
                                                <option <?= selectedV("États-Unis", $user); ?> value="États-Unis"> États-Unis</option>
                                                <option <?= selectedV("Éthiopie", $user); ?> value="Éthiopie"> Éthiopie</option>
                                                <option <?= selectedV("Fidji", $user); ?> value="Fidji"> Fidji</option>
                                                <option <?= selectedV("Finlande", $user); ?> value="Finlande"> Finlande</option>
                                                <option <?= selectedV("France", $user); ?> value="France"> France</option>
                                                <option <?= selectedV("Gabon", $user); ?> value="Gabon"> Gabon</option>
                                                <option <?= selectedV("Gambie", $user); ?> value="Gambie"> Gambie</option>
                                                <option <?= selectedV("Géorgie", $user); ?> value="Géorgie"> Géorgie</option>
                                                <option <?= selectedV("Gibraltar", $user); ?> value="Gibraltar"> Gibraltar</option>
                                                <option <?= selectedV("Grèce", $user); ?> value="Grèce"> Grèce</option>
                                                <option <?= selectedV("Grenade", $user); ?> value="Grenade"> Grenade</option>
                                                <option <?= selectedV("Groenland", $user); ?> value="Groenland"> Groenland</option>
                                                <option <?= selectedV("Guadeloupe", $user); ?> value="Guadeloupe"> Guadeloupe</option>
                                                <option <?= selectedV("Guatemala", $user); ?> value="Guatemala"> Guatemala</option>
                                                <option <?= selectedV("Guinée", $user); ?> value="Guinée"> Guinée</option>
                                                <option <?= selectedV("Guinée-Bissau", $user); ?> value="Guinée-Bissau"> Guinée-Bissau</option>
                                                <option <?= selectedV("Guyana", $user); ?> value="Guyana"> Guyana</option>
                                                <option <?= selectedV("Guyane française", $user); ?> value="Guyane française"> Guyane française</option>
                                                <option <?= selectedV("Honduras", $user); ?> value="Honduras"> Honduras</option>
                                                <option <?= selectedV("Hongrie", $user); ?> value="Hongrie"> Hongrie</option>
                                                <option <?= selectedV("Île Norfolk", $user); ?> value="Île Norfolk"> Île Norfolk</option>
                                                <option <?= selectedV("Îles Caïmans", $user); ?> value="Îles Caïmans"> Îles Caïmans</option>
                                                <option <?= selectedV("Îles Cook", $user); ?> value="Îles Cook"> Îles Cook</option>
                                                <option <?= selectedV("Îles Féroé", $user); ?> value="Îles Féroé"> Îles Féroé</option>
                                                <option <?= selectedV("Îles Malouines", $user); ?> value="Îles Malouines"> Îles Malouines</option>
                                                <option <?= selectedV("Îles Marshall", $user); ?> value="Îles Marshall"> Îles Marshall</option>
                                                <option <?= selectedV("Îles Pitcairn", $user); ?> value="Îles Pitcairn"> Îles Pitcairn</option>
                                                <option <?= selectedV("Îles Salomon", $user); ?> value="Îles Salomon"> Îles Salomon</option>
                                                <option <?= selectedV("Îles Turques-et-Caïques", $user); ?> value="Îles Turques-et-Caïques"> Îles Turques-et-Caïques</option>
                                                <option <?= selectedV("Îles Vierges britanniques", $user); ?> value="Îles Vierges britanniques"> Îles Vierges britanniques</option>
                                                <option <?= selectedV("Inde", $user); ?> value="Inde"> Inde</option>
                                                <option <?= selectedV("Indonésie", $user); ?> value="Indonésie"> Indonésie</option>
                                                <option <?= selectedV("Irlande", $user); ?> value="Irlande"> Irlande</option>
                                                <option <?= selectedV("Islande", $user); ?> value="Islande"> Islande</option>
                                                <option <?= selectedV("Israël", $user); ?> value="Israël"> Israël</option>
                                                <option <?= selectedV("Italie", $user); ?> value="Italie"> Italie</option>
                                                <option <?= selectedV("Jamaïque", $user); ?> value="Jamaïque"> Jamaïque</option>
                                                <option <?= selectedV("Japon", $user); ?> value="Japon"> Japon</option>
                                                <option <?= selectedV("Jordanie", $user); ?> value="Jordanie"> Jordanie</option>
                                                <option <?= selectedV("Kazakhstan", $user); ?> value="Kazakhstan"> Kazakhstan</option>
                                                <option <?= selectedV("Kenya", $user); ?> value="Kenya"> Kenya</option>
                                                <option <?= selectedV("Kirghizistan", $user); ?> value="Kirghizistan"> Kirghizistan</option>
                                                <option <?= selectedV("Kiribati", $user); ?> value="Kiribati"> Kiribati</option>
                                                <option <?= selectedV("Koweït", $user); ?> value="Koweït"> Koweït</option>
                                                <option <?= selectedV("La Réunion", $user); ?> value="La Réunion"> La Réunion</option>
                                                <option <?= selectedV("Laos", $user); ?> value="Laos"> Laos</option>
                                                <option <?= selectedV("Lesotho", $user); ?> value="Lesotho"> Lesotho</option>
                                                <option <?= selectedV("Lettonie", $user); ?> value="Lettonie"> Lettonie</option>
                                                <option <?= selectedV("Liechtenstein", $user); ?> value="Liechtenstein"> Liechtenstein</option>
                                                <option <?= selectedV("Lituanie", $user); ?> value="Lituanie"> Lituanie</option>
                                                <option <?= selectedV("Luxembourg", $user); ?> value="Luxembourg"> Luxembourg</option>
                                                <option <?= selectedV("Macédoine", $user); ?> value="Macédoine"> Macédoine</option>
                                                <option <?= selectedV("Madagascar", $user); ?> value="Madagascar"> Madagascar</option>
                                                <option <?= selectedV("Malaisie", $user); ?> value="Malaisie"> Malaisie</option>
                                                <option <?= selectedV("Malawi", $user); ?> value="Malawi"> Malawi</option>
                                                <option <?= selectedV("Maldives", $user); ?> value="Maldives"> Maldives</option>
                                                <option <?= selectedV("Mali", $user); ?> value="Mali"> Mali</option>
                                                <option <?= selectedV("Malte", $user); ?> value="Malte"> Malte</option>
                                                <option <?= selectedV("Maroc", $user); ?> value="Maroc"> Maroc</option>
                                                <option <?= selectedV("Maurice", $user); ?> value="Martinique"> Martinique</option>
                                                <option <?= selectedV("", $user); ?> value="Maurice"> Maurice</option>
                                                <option <?= selectedV("Mauritanie", $user); ?> value="Mauritanie"> Mauritanie</option>
                                                <option <?= selectedV("Mayotte", $user); ?> value="Mayotte"> Mayotte</option>
                                                <option <?= selectedV("Mexique", $user); ?> value="Mexique"> Mexique</option>
                                                <option <?= selectedV("Moldavie", $user); ?> value="Moldavie"> Moldavie</option>
                                                <option <?= selectedV("Monaco", $user); ?> value="Monaco"> Monaco</option>
                                                <option <?= selectedV("Mongolie", $user); ?> value="Mongolie"> Mongolie</option>
                                                <option <?= selectedV("Monténégro", $user); ?> value="Monténégro"> Monténégro</option>
                                                <option <?= selectedV("Montserrat", $user); ?> value="Montserrat"> Montserrat</option>
                                                <option <?= selectedV("Mozambique", $user); ?> value="Mozambique"> Mozambique</option>
                                                <option <?= selectedV("Namibie", $user); ?> value="Namibie"> Namibie</option>
                                                <option <?= selectedV("Nauru", $user); ?> value="Nauru"> Nauru</option>
                                                <option <?= selectedV("Népal", $user); ?> value="Népal"> Népal</option>
                                                <option <?= selectedV("Nicaragua", $user); ?> value="Nicaragua"> Nicaragua</option>
                                                <option <?= selectedV("Niger", $user); ?> value="Niger"> Niger</option>
                                                <option <?= selectedV("Nigéria", $user); ?> value="Nigéria"> Nigéria</option>
                                                <option <?= selectedV("Niue", $user); ?> value="Niue"> Niue</option>
                                                <option <?= selectedV("Norvège", $user); ?> value="Norvège"> Norvège</option>
                                                <option <?= selectedV("Nouvelle-Calédonie", $user); ?> value="Nouvelle-Calédonie"> Nouvelle-Calédonie</option>
                                                <option <?= selectedV("Nouvelle-Zélande", $user); ?> value="Nouvelle-Zélande"> Nouvelle-Zélande</option>
                                                <option <?= selectedV("Oman", $user); ?> value="Oman"> Oman</option>
                                                <option <?= selectedV("Ouganda", $user); ?> value="Ouganda"> Ouganda</option>
                                                <option <?= selectedV("Palaos", $user); ?> value="Palaos"> Palaos</option>
                                                <option <?= selectedV("Panama", $user); ?> value="Panama"> Panama</option>
                                                <option <?= selectedV("Papouasie-Nouvelle-Guinée", $user); ?> value="Papouasie-Nouvelle-Guinée"> Papouasie-Nouvelle-Guinée</option>
                                                <option <?= selectedV("Paraguay", $user); ?> value="Paraguay"> Paraguay</option>
                                                <option <?= selectedV("Pays-Bas", $user); ?> value="Pays-Bas"> Pays-Bas</option>
                                                <option <?= selectedV("Pérou", $user); ?> value="Pérou"> Pérou</option>
                                                <option <?= selectedV("Philippines", $user); ?> value="Philippines"> Philippines</option>
                                                <option <?= selectedV("Pologne", $user); ?> value="Pologne"> Pologne</option>
                                                <option <?= selectedV("Polynésie française", $user); ?> value="Polynésie française"> Polynésie française</option>
                                                <option <?= selectedV("Portugal", $user); ?> value="Portugal"> Portugal</option>
                                                <option <?= selectedV("Qatar", $user); ?> value="Qatar"> Qatar</option>
                                                <option <?= selectedV("R.A.S. chinoise de Hong Kong", $user); ?> value="R.A.S. chinoise de Hong Kong"> R.A.S. chinoise de Hong Kong</option>
                                                <option <?= selectedV("République dominicaine", $user); ?> value="République dominicaine"> République dominicaine</option>
                                                <option <?= selectedV("République tchèque", $user); ?> value="République tchèque"> République tchèque</option>
                                                <option <?= selectedV("Roumanie", $user); ?> value="Roumanie"> Roumanie</option>
                                                <option <?= selectedV("Royaume-Uni", $user); ?> value="Royaume-Uni"> Royaume-Uni</option>
                                                <option <?= selectedV("Russie", $user); ?> value="Russie"> Russie</option>
                                                <option <?= selectedV("Rwanda", $user); ?> value="Rwanda"> Rwanda</option>
                                                <option <?= selectedV("Saint-Christophe-et-Niévès", $user); ?> value="Saint-Christophe-et-Niévès"> Saint-Christophe-et-Niévès</option>
                                                <option <?= selectedV("Saint-Marin", $user); ?> value="Saint-Marin"> Saint-Marin</option>
                                                <option <?= selectedV("Saint-Pierre-et-Miquelon", $user); ?> value="Saint-Pierre-et-Miquelon"> Saint-Pierre-et-Miquelon</option>
                                                <option <?= selectedV("Saint-Vincent-et-les-Grenadines", $user); ?> value="Saint-Vincent-et-les-Grenadines"> Saint-Vincent-et-les-Grenadines</option>
                                                <option <?= selectedV("Sainte-Hélène", $user); ?> value="Sainte-Hélène"> Sainte-Hélène</option>
                                                <option <?= selectedV("Sainte-Lucie", $user); ?> value="Sainte-Lucie"> Sainte-Lucie</option>
                                                <option <?= selectedV("Samoa", $user); ?> value="Samoa"> Samoa</option>
                                                <option <?= selectedV("Sao Tomé-et-Principe", $user); ?> value="Sao Tomé-et-Principe"> Sao Tomé-et-Principe</option>
                                                <option <?= selectedV("Sénégal", $user); ?> value="Sénégal"> Sénégal</option>
                                                <option <?= selectedV("Serbie", $user); ?> value="Serbie"> Serbie</option>
                                                <option <?= selectedV("Seychelles", $user); ?> value="Seychelles"> Seychelles</option>
                                                <option <?= selectedV("Sierra Leone", $user); ?> value="Sierra Leone"> Sierra Leone</option>
                                                <option <?= selectedV("Singapour", $user); ?> value="Singapour"> Singapour</option>
                                                <option <?= selectedV("Slovaquie", $user); ?> value="Slovaquie"> Slovaquie</option>
                                                <option <?= selectedV("Slovénie", $user); ?> value="Slovénie"> Slovénie</option>
                                                <option <?= selectedV("Somalie", $user); ?> value="Somalie"> Somalie</option>
                                                <option <?= selectedV("Sri Lanka", $user); ?> value="Sri Lanka"> Sri Lanka</option>
                                                <option <?= selectedV("Suède", $user); ?> value="Suède"> Suède</option>
                                                <option <?= selectedV("Suisse", $user); ?> value="Suisse"> Suisse</option>
                                                <option <?= selectedV("Suriname", $user); ?> value="Suriname"> Suriname</option>
                                                <option <?= selectedV("Svalbard et Jan Mayen", $user); ?> value="Svalbard et Jan Mayen"> Svalbard et Jan Mayen</option>
                                                <option <?= selectedV("Tadjikistan", $user); ?> value="Swaziland"> Swaziland</option>
                                                <option <?= selectedV("", $user); ?> value="Tadjikistan"> Tadjikistan</option>
                                                <option <?= selectedV("Taïwan", $user); ?> value="Taïwan"> Taïwan</option>
                                                <option <?= selectedV("Tanzanie", $user); ?> value="Tanzanie"> Tanzanie</option>
                                                <option <?= selectedV("Tchad", $user); ?> value="Tchad"> Tchad</option>
                                                <option <?= selectedV("Thaïlande", $user); ?> value="Thaïlande"> Thaïlande</option>
                                                <option <?= selectedV("Togo", $user); ?> value="Togo"> Togo</option>
                                                <option <?= selectedV("Tonga", $user); ?> value="Tonga"> Tonga</option>
                                                <option <?= selectedV("Trinité-et-Tobago", $user); ?> value="Trinité-et-Tobago"> Trinité-et-Tobago</option>
                                                <option <?= selectedV("Tunisie", $user); ?> value="Tunisie"> Tunisie</option>
                                                <option <?= selectedV("Turkménistan", $user); ?> value="Turkménistan"> Turkménistan</option>
                                                <option <?= selectedV("Tuvalu", $user); ?> value="Tuvalu"> Tuvalu</option>
                                                <option <?= selectedV("Ukraine", $user); ?> value="Ukraine"> Ukraine</option>
                                                <option <?= selectedV("Uruguay", $user); ?> value="Uruguay"> Uruguay</option>
                                                <option <?= selectedV("Vanuatu", $user); ?> value="Vanuatu"> Vanuatu</option>
                                                <option <?= selectedV("Venezuela", $user); ?> value="Venezuela"> Venezuela</option>
                                                <option <?= selectedV("Vietnam", $user); ?> value="Vietnam"> Vietnam</option>
                                                <option <?= selectedV("Wallis-et-Futuna", $user); ?> value="Wallis-et-Futuna"> Wallis-et-Futuna</option>
                                                <option <?= selectedV("Yémen", $user); ?> value="Yémen"> Yémen</option>
                                                <option <?= selectedV("Zambie", $user); ?> value="Zambie"> Zambie</option>
                                                <option <?= selectedV("Zimbabwe", $user); ?> value="Zimbabwe"> Zimbabwe</option>
                                            </select>
                                        </label>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <div align="left" style="margin-left: 28px"><label>Numéro de compte:</label></div>
                                        <input style="width: 550px" value="<?= n_numSplitter($user->num) ?>" readonly type="text" name="prenom" class="form-control" placeholder="Prénom"/>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <div align="left" style="margin-left: 28px"><label>Nom:</label></div>
                                        <input style="width: 550px" value="<?= $user->nom ?>" type="text" name="nom" class="form-control" placeholder="Nom"/>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <div align="left" style="margin-left: 28px"><label>Prénom:</label></div>
                                        <input style="width: 550px" value="<?= $user->prenom ?>" type="text" name="prenom" class="form-control" placeholder="Prénom"/>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <div align="left" style="margin-left: 28px"><label for="exampleInputEmail1">Email:</label></div>
                                        <input type="email" class="form-control" name="email" value="<?= $user->email ?>" style="width: 550px" id="exampleInputEmail1" placeholder="Email">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <div align="left" style="margin-left: 28px"><label for="exampleInputEmail1">Actuel mot de passe:</label></div>
                                        <input type="password" class="form-control" name="apwd" style="width: 550px" id="exampleInputEmail1" placeholder="Mot de passe">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <div align="left" style="margin-left: 28px"><label for="exampleInputEmail1">Nouveau mot de passe:</label></div>
                                        <input type="password" class="form-control" name="pwd" style="width: 550px" id="exampleInputEmail1" placeholder="Nouveau">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <div align="left" style="margin-left: 28px"><label for="exampleInputEmail1">Confirmez le mot de passe:</label></div>
                                        <input type="password" class="form-control" name="cpwd" style="width: 550px" id="exampleInputEmail1" placeholder="Confirmez">
                                    </div>
                                    <div style="margin-bottom: 10px; margin-top: 15px" class="form-group col-md-12">
                                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-3"></div>
                        <input id="bp_ks3" name="bp_ks3" type="hidden">
                    </form>


                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
    </section>
</div>



