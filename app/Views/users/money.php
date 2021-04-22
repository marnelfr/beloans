<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Gestion de portefeuille
        </h1>
        <ol class="breadcrumb">
            <li><a href="?p=user/myaccount"><i class="fa fa-dashboard"></i> Accueil</a></li>
            <li class="active">Mes transferts</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="row">
                <section class="col-lg-5 connectedSortable">
                    <div class="box box-solid bg-gradient" style="background-color: lightgrey">
                        <div class="box-header">
                            <div class="pull-right box-tools">
                                <button type="button" class="btn btn-sm pull-right" data-widget="collapse" data-toggle="tooltip" title="Collapse" style="margin-right: 5px; background-color: orange">
                                    <i class="fa fa-minus"></i></button>
                            </div>
                            <i class="fa fa-share"></i>
                            <h3 class="box-title">
                                Dépôt
                            </h3>
                        </div>
                        <div class="box-body">
                            <div style="width: 100%;">
                                <form method="post" name="trans" action="?p=user/newdepot" class="form-horizontal">
                                    <?php session('token', uniqid() . uniqid() . uniqid()) ?>
                                    <input id="csrf" name="token_csrf" value="<?= session('token') ?>" type="hidden">
                                    <?php message('Votre dépôt à bien été enrégistré pour vérification', 'coolDepot'); ?>
                                    <?php message('Dépôt échoué. Soyez sûr d\'avoir bien entré les informations et reéssayez.', 'voidDepot', 'warning'); ?>
                                    <?php message('Dépôt échoué. Veillez reéssayer un peu plus tard', 'inconnuDepot', 'warning'); ?>
                                    <div class="box-body">
                                        <div class="form-group" align="center">
                                            <label onclick="avec();" style="margin-right: 12px">
                                                <input type="radio" name="r3" value="carte" class="flat-red" checked/>
                                                Carte de credit
                                            </label>
                                            <label onclick="sans(); transf();" style="margin-right: 12px">
                                                <input type="radio" name="r3" value="trans" id="sans1" class="flat-red sans"/>
                                                Transfert rapide
                                            </label>
                                            <label onclick="sans(); banque();" style="margin-right: 12px">
                                                <input type="radio" name="r3" value="vire" id="sans2" class="flat-red sans"/>
                                                Virement interbancaire
                                            </label>
                                        </div>
                                        <div id="typec" class="form-group">
                                            <label for="banque" id="labelCompte"  class="col-sm-4 control-label">Type de paiement</label>
                                            <div align="right" class="col-sm-8">
                                                <select style="text-align: right; background-color: rgba(89,177,255,0.26); font-weight: bold; color: black" class="form-control valne" id="situation" name="type" >
                                                    <option>Visa</option>
                                                    <option>Master</option>
                                                    <option>Paysafecard</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div id="banque" style="display: none" class="form-group">
                                            <label for="inputEmail3" id="labelCompte"  class="col-sm-4 control-label">Nom de la banque</label>
                                            <div align="right" class="col-sm-8">
                                                <input name="nomBanque" id="numCompte" value="" type="text" style="background-color: rgba(89,177,255,0.26); font-weight: bold; color: black" class="form-control valne" data-inputmask="'mask': ['9999-9999-9999-9999', '9999 9999 9999 9999']" data-mask>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputEmail3" id="labelCompte"  class="col-sm-4 control-label"><span id="nomnum">Numero de la carte</span></label>
                                            <div align="right" class="col-sm-8">
                                                <input name="numcarte" id="numCompte" value="" type="text" style="background-color: rgba(89,177,255,0.26); font-weight: bold; color: black" class="form-control valne" data-inputmask="'mask': ['9999-9999-9999-9999', '9999 9999 9999 9999']" data-mask>
                                            </div>
                                        </div>
                                        <div id="code" class="form-group">
                                            <label for="inputEmail3" id="labelCompte"  class="col-sm-4 control-label"><span id="nomcod">Code secret</span></label>
                                            <div align="right" class="col-sm-8">
                                                <input name="securityCod" id="securityCod" type="password" style="background-color: rgba(89,177,255,0.26); font-weight: bold; color: black" class="form-control valne">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputEmail3" id="labelCompte"  class="col-sm-4 control-label">Montant du depot</label>
                                            <div align="right" class="col-sm-8">
                                                <input name="montant" id="umCompte" value="" type="number" style="background-color: rgba(89,177,255,0.26); font-weight: bold; color: black" class="form-control valne" data-inputmask="'mask': ['9999-9999-9999-9999', '9999 9999 9999 9999']" data-mask>
                                            </div>
                                        </div>
                                    <button style="background-color: orange" id="trnsta" type="submit" class="btn pull-right"><b>Soumettre</b></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>

                <div class="col-xs-7">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Mes transferts</h3>
                        </div>
                        <div class="box-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr style="color: rgb(0,0,0);">
                                    <th aria-sort="ascending"><div align="center">Date-Heure</div></th>
                                    <th width="10px">Type</th>
                                    <th><div align="center">Numéro Compte</div></th>
                                    <th><div align="center">Montant</div></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                foreach($transaction as $item):
                                    ?>
                                    <tr>
                                        <td align="center"><?= $item->heure ?></td>
                                        <td width="10px">Virement interne</td>
                                        <td align="center"><?= n_numSplitter($item->num) ?></td>
                                        <td align="center"><?= $item->montant ?> <?= session('n_dev') ?></td>
                                    </tr>
                                <?php endforeach;
                                foreach($transaction2 as $item):
                                    ?>
                                    <tr>
                                        <td align="center"><?= $item->heure ?></td>
                                        <td width="10px">Virement interbancaire</td>
                                        <td align="center"><?= n_numSplitter($item->num) ?></td>
                                        <td align="center"><?= $item->montant ?> <?= session('n_dev') ?></td>
                                    </tr>
                                <?php endforeach;
                                foreach($transaction3 as $item):
                                    ?>
                                    <tr>
                                        <td align="center"><?= $item->heure ?></td>
                                        <td width="10px">Depôt</td>
                                        <td align="center"><?= n_numSplitter($item->num) ?></td>
                                        <td align="center"><?= $item->montant ?> <?= session('n_dev') ?></td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th><div align="center">Date-Heure</div></th>
                                    <th width="10px">Type</th>
                                    <th><div align="center">Numero de Compte</div></th>
                                    <th><div align="center">Montant</div></th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
                <!--        <section class="col-lg-7 connectedSortable">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs pull-right">
                    <li class="pull-left header"><i class="fa fa-inbox"></i> Récentes transferts</li>
                </ul>
                <div style="position: relative;" class="tab-content no-padding">
                    <table class="table">
                        <tr>
                            <th width="10px">Ordre</th>
                            <th><div align="center">Numéro Compte</div></th>
                            <th><div align="center">Montant</div></th>
                            <th><div align="right">Date-Heure</div></th>
                        </tr>
                        <?php
                /*                        $n = 0;
                                        foreach($transaction as $item):
                                            $n++;
                                            */?>
                            <tr>
                                <td width="10px"><?/*= $n */?></td>
                                <td align="center"><?/*= n_numSplitter($item->num) */?></td>
                                <td align="center"><?/*= $item->montant */?> <?/*= session('n_dev') */?></td>
                                <td align="right"><?/*= $item->heure */?></td>
                            </tr>
                        <?php /*endforeach; */?>
                    </table>
                </div>
            </div>
        </section>-->
            </div>
        </div>
    </section>
</div>