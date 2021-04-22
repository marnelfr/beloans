<section id="content" role="main" data-country="BJ">
    <section id="main" class="">
        <div id="account" class="account grid12">
            <form action="?p=guest/store" method="post" name="signup_form" class="proceed" novalidate="novalidate">
                <?php session('token', uniqid() . uniqid()) ?>
                <input id="csrf" name="token_csrf" value="<?= session('token') ?>" type="hidden">
                <div class="customGrid7">
                    <div class="personalAccountSignUp" data-selectionenabled="false">
                        <div class="stepProgress"></div>
                        <div class="pageHeader" style="margin-bottom: 2em">
                            <h2>
                                <b>Vérifier par Norton Securities</b>
                                <br> Vous comprendrez pourquoi vous devez nous faire confiance !
                            </h2>
                        </div>
                        <!--<p class="personalAccount">
                            <span class="personalHeader">Compte Personnel</span>
                            <span class="personalDescription">Nam quibusdam, quos audio sapientes habitos in Graecia, placuisse opinor mirabilia quaedam (sed nihil est quod.</span>
                        </p>-->
                        <?php message('Vous n\'avez pas rempli tous les champs', 'void', 'warning') ?>
                        <?php message('Vos mots de passe ne correspondent pas', 'badPwd', 'warning') ?>
                        <?php message('Veillez suivre la procédure normale!!', 'noToken', 'warning') ?>
                        <div class="superBowlContainer">
                            <div class="groupFields countryDropdown">
                                <div class="nativeDropdown large">
                                    <div class="selectDropdown">
                                        <label for="country">
                                            <select id="country" name="country" >
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
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="textInput lap error-empty">
                                <div class="fields large">
                                    <label for="confirmPassword" class="focus accessAid">
                                        Nom
                                    </label>
                                    <input placeholder="Nom" name="nom" class="validate userText" required="required" autocomplete="off" autocorrect="off" autocapitalize="off" aria-required="true" aria-invalid="true" type="text">
                                    <span class="tickmar"></span>
                                </div>
                                <div class="errorMessage">
                                    <p class="help-error error-empty" id="confirmPasswordEmpty">
                                        Entrez un mot de passe.
                                    </p>
                                    <p class="help-error error-format" id="confirmPasswordFormat">
                                        Les mots de passe ne correspondent pas. Entrez à nouveau votre mot de passe.
                                    </p>
                                </div>
                            </div>
                            <div class="textInput lap error-empty">
                                <div class="fields large">
                                    <label for="confirmPassword" class="focus accessAid">
                                        Prénom
                                    </label>
                                    <input placeholder="Prénom" name="prenom" class="validate userText" required="required" autocomplete="off" autocorrect="off" autocapitalize="off" aria-required="true" aria-invalid="true" type="text">
                                    <span class="tickmar"></span>
                                </div>
                                <div class="errorMessage">
                                    <p class="help-error error-empty" id="confirmPasswordEmpty">
                                        Entrez un mot de passe.
                                    </p>
                                    <p class="help-error error-format" id="confirmPasswordFormat">
                                        Les mots de passe ne correspondent pas. Entrez à nouveau votre mot de passe.
                                    </p>
                                </div>
                            </div>
                            <div class="groupFields">
                                <div class="textInput lap">
                                    <div class="fields email large">
                                        <label for="email" class="accessAid">
                                            Votre adresse email
                                        </label>
                                        <input id="email" placeholder="Mail" name="email" required="required" class="validate userText" maxlength="127" autocomplete="off" autocorrect="off" autocapitalize="off" aria-required="true" <!--pattern="^[^\s()&lt;&gt;@,;:]+@((?=[a-zA-Z0-9-]+)|[a-zA-Z-]+)([a-zA-Z0-9-]+)*(\.([0-9]+(?=[a-zA-Z-]+)|[a-zA-Z-]+)(-?[a-zA-Z0-9-]+)?)+$-->" aria-invalid="false" type="email">
                                    </div>
                                    <div class="errorMessage">
                                        <p class="help-error error-empty" id="emailEmpty">Obligatoire.</p>
                                        <p class="help-error error-format" id="emailFormat">Vérifiez votre adresse email.</p>
                                    </div>
                                </div>
                                <div class="passwordSection clearfix">
                                    <div class="textInput lap completed">
                                        <div class="fields large">
                                            <label for="password" class="accessAid">
                                                Créez votre mot de passe
                                            </label>
                                            <input id="password" placeholder="Mot de passe" name="pwd" class="hasHelp validate userText" required="required" maxlength="20" autocomplete="off" autocorrect="off" autocapitalize="off" aria-required="true" aria-invalid="false" type="password">
                                            <span class="tickmar"></span>
                                        </div>
                                        <div class="helpInformation">
                                            <div id="passwordValidations" class="validationsContainer caret help-information">
                                                <ul>
                                                    <li class="requirement active hide">
                                                        Utilisez au moins 8 caractères.
                                                    </li>
                                                    <li class="requirement active hide">
                                                        Incluez au moins 1&nbsp;chiffre ou symbole (ex&nbsp;: !@#$%^).
                                                    </li>
                                                    <li class="restriction hide">
                                                        N'utilisez pas plus de 20&nbsp;caractères.
                                                    </li>
                                                    <li class="restriction hide">
                                                        N'utilisez pas votre adresse email pour votre mot de passe.
                                                    </li>
                                                    <li class="restriction hide">
                                                        N'utilisez pas plus de 3&nbsp;fois de suite le même caractère (par exemple 1111).
                                                    </li>
                                                    <li class="restriction hide">
                                                        N'utilisez pas de suite de chiffres (par exemple 1234 ou 4321).
                                                    </li>
                                                    <li class="restriction hide">
                                                        N'utilisez pas de suite de touches (par exemple azer ou reza).
                                                    </li>
                                                    <li class="restriction hide">
                                                        N'utilisez pas de suite de touches ou de chiffres (par exemple azer, reza, 1234 ou 4321).
                                                    </li>
                                                    <li class="restriction hide">
                                                        N'utilisez pas d'espaces.
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="errorMessage">
                                            <p class="help-error error-empty" id="passwordEmpty">
                                                Entrez un mot de passe.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="textInput lap error-empty">
                                        <div class="fields large">
                                            <label for="confirmPassword" class="focus accessAid">
                                                Confirmez votre mot de passe
                                            </label>
                                            <input id="confirmPassword" placeholder="Confirmez le mot de passe" name="cpwd" class="validate userText" required="required" maxlength="20" autocomplete="off" autocorrect="off" autocapitalize="off" aria-required="true" aria-invalid="true" type="password">
                                            <span class="tickmar"></span>
                                        </div>
                                        <div class="errorMessage">
                                            <p class="help-error error-empty" id="confirmPasswordEmpty">
                                                Entrez un mot de passe.
                                            </p>
                                            <p class="help-error error-format" id="confirmPasswordFormat">
                                                Les mots de passe ne correspondent pas. Entrez à nouveau votre mot de passe.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="btns">
                                <input id="_eventId_personal" name="_eventId_continue" style="width: 12em; background-color: #ed5721" class="medium button" value="Créer le compte" data-click="accountSubmit" type="submit">
                            </div>
                        </div>
                    </div>
                </div>
                <input id="bp_ks3" name="bp_ks3" type="hidden">
            </form>
        </div>
    </section>
</section>
