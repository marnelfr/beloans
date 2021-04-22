<div class="content-wrapper">
    <section class="content-header">
        <h1>
            
        </h1>
        <ol class="breadcrumb">
            <li><a href="?p=user/myaccount"><i class="fa fa-dashboard"></i> Accueil</a></li>
            <li class="active">Prêt</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-3"></div>
            <div style="background-color: rgba(255,93,36,0.06); border-radius: 15px" class="col-md-6">
                <h1 align="center">Soumettre une demande de prêt</h1>
                <?php message(session('sendingMessage'), 'sendingg', 'warning'); ?>
                <?php message(session('sendingMessage'), 'sendinggg'); ?>
                <form role="form" action="index.php?p=user/newAsk" name="" method="post"  enctype="multipart/form-data">
                    <input id="csrf" name="token_csrf" value="<?= session('token') ?>" type="hidden">
                    <div class="form-group col-md-12">
                        <label>Nom</label>
                        <input id="nom" type="text" name="nom" class="form-control" placeholder="Nom (Last name)"/>
                    </div>
                    <div class="form-group col-md-12">
                        <label>Prenoms</label>
                        <input id="prenom" type="text" name="prenom" class="form-control" placeholder="Vos prénoms (First name)"/>
                    </div>
                    <div class="form-group col-md-12">
                        <label>Adresse</label>
                        <input id="adresse" type="text" name="adresse" class="form-control" placeholder="Votre adresse (Address)"/>
                    </div>
                    <div class="form-group col-md-12">
                        <label>Numero de Tel</label>
                        <input id="tel" type="text" name="tel" class="form-control" placeholder="N° Tel précédé de + (N° Phone)"/>
                    </div>
                    <div class="form-group col-md-12">
                        <label>Code postal</label>
                        <input id="postal" type="text" name="postal" class="form-control" placeholder="Code postal"/>
                    </div>
                    <div class="form-group col-md-12">
                        <label>Ville</label>
                        <input id="ville" type="text" name="ville" class="form-control" placeholder="Ville"/>
                    </div>
                    <div class="form-group col-md-12">
                        <label>Pays</label>
                        <input id="pays" type="text" name="pays" class="form-control" placeholder="Pays"/>
                    </div>
                    <div class="form-group col-md-12">
                        <label>Nationalite</label>
                        <input id="nation" type="text" name="nation" class="form-control" placeholder="Nationalité"/>
                    </div>
                    <div class="form-group col-md-12">
                        <label>Profession</label>
                        <input id="profession" type="text" name="profession" class="form-control" placeholder="Profession"/>
                    </div>
                    <div class="form-group col-md-12">
                        <label>Revenu mensuel</label>
                        <input id="revenu" type="text" name="revenu" class="form-control" placeholder="Revenu mensuel"/>
                    </div>
                    <div class="form-group col-md-12">
                        <label>Situation matrimoniale</label>
                        <select class="form-control" id="situation" name="situation" >
                            <option>Célibataire</option>
                            <option>Marié(e)</option>
                            <option>Divorcé(e)</option>
                            <option>Veuf(ve)</option>
                        </select>
                    </div>
                    <div class="form-group col-md-12">
                        <label>Nombre d'enfant</label>
                        <input id="enfant" type="number" name="enfant" class="form-control" placeholder="Nombre d'enfant"/>
                    </div>
                    <div class="form-group col-md-12">
                        <label>Type de prêt</label>
                        <select class="form-control" id="country" name="service" >
                            <option>PRÊT BANCAIRE</option>
                            <option>ASSURANCES</option>
                            <option>BUSINESS CONSULTING</option>
                            <option>INVESTISSEMENTS BOURSIERS</option>
                            <option>AUTRE PRET</option>
                            
                        </select>
                    </div>
                    <div class="form-group col-md-12">
                        <label>Montant du pret</label>
                        <input onchange="plafond();" id="plaf" type="number" name="plafond" class="form-control" placeholder="Montant du prêt"/>
                    </div>
                    <div class="form-group col-md-12">
                        <label>E-mail</label>
                        <input id="email" type="text" name="email" class="form-control" placeholder="Email"/>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="exampleInputEmail1">Message (facultatif)</label>
                        <textarea class="form-control" name="details" placeholder="Votre message sur les cause de votre demande..."></textarea>
                    </div>
                    <div class="form-group col-md-12">
                        <b>Pièce d'identité (Obligatoire)</b>
                    </div>
                    <div class="form-group col-md-3">
                        <div id="" class="btn btn-default btn-file">
                            <input type="hidden" name="MAX_FILE_SIZE" value="10485760">
                            Charger scan (ID Card)
                            <input type="file" name="attachment" />
                        </div>
                    </div>
                    <div align="cente" style="margin-bottom: 10px; margin-top: 15px;" class="form-group col-md-12">
                        <button style="width: 120px; border-radius: 12px" type="submit" class="btn btn-primary pull-right">Envoyer</button>
                    </div>
                    <!--<div class="form-group col-md-12">
    <label for="exampleInputEmail1">Autre prèt</label>
    <textarea name="autre" class="form-control" placeholder=""></textarea>
</div>-->
                    <!--<div class="form-group col-md-12">
                        <label>Mess</label>
                        <input id="" type="text" name="" class="form-control" placeholder=""/>
                    </div>
                    <div class="form-group col-md-12">
                        <label></label>
                        <input id="" type="text" name="" class="form-control" placeholder=""/>
                    </div>

                    <div class="form-group col-md-12">
                        <label>Mensualité</label>
                        <input  value="" type="text" name="mensualite" class="form-control" placeholder="Mensualité"/>
                    </div>
                    <div class="form-group col-md-12">
                        <div style="background-color: rgba(151,151,151,.5); border-radius: 15px; padding: 15px; padding-bottom: 5px; margin-top: 10px">
                            <p align="center">
                                Message d'infMessage d'infos sur le taux et autres du genre. Je me demande si le message sera recuperer de la base de données... En attendant, on ne peut que afficher un texte du genre à titre illustratif...Message d'infos sur le taux et autres du genre. Je me demande si le message sera recuperer de la base de données... En attendant, on ne peut que afficher un texte du genre à titre illustratif...Message d'infos sur le taux et autres du genre. Je me demande si le message sera recuperer de la base de données... En attendant, on ne peut que afficher un texte du genre à titre illustratif...Message d'infos sur le taux et autres du genre. Je me demande si le message sera recuperer de la base de données... En attendant, on ne peut que afficher un texte du genre à titre illustratif...
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <label>Objet</label>
                        <input value="" type="text" name="objet" class="form-control" placeholder="Objet de votre demande"/>
                    </div>-->
                </form>

            </div>
            <div class="col-md-3"></div>
        </div>
    </section>
</div>