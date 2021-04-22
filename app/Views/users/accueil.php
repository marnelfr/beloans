<div class="content-wrapper">
    <div class="row">
        <?php if($user->montant < 5): ?>
            <div align="center" class="alert alert-danger">
                <b>Votre solde est très bas : moins de 5 <?= session('n_dev') ?>. Veillez recharger votre compte.</b>
            </div>
        <?php endif; ?>
    </div>
    <section class="content-header">
        <h1>
            Tableau de bord
        </h1>
        <ol class="breadcrumb">
            <li><a href="?p=user/myaccount"><i class="fa fa-dashboard"></i> Accueil</a></li>
            <li class="active">Tableau de bord</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <?php if(isset($_SESSION['AdminHJ4ssRF5'])){ ?>
                <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <h3 id="montantTotal"><?= $waiting ?></h3>
                            <p>Transaction<?php echo ($waiting > 1)?'s':''; ?> en attente</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-money"></i>
                        </div>
                        <a href="?p=admin/transactions" class="small-box-footer">Détails <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3 id="montantTotal"><?= $waiting2 ?></h3>
                            <p>Depôt<?php echo ($waiting2 > 1)?'s':''; ?> en attente</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-money"></i>
                        </div>
                        <a href="?p=admin/deposit" class="small-box-footer">Détails <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            <?php }else{ ?>
                <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <h3 id="montantTotal"><?= $user->montant . ' ' . session('n_dev') ?></h3>
                            <p>Total compte</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-money"></i>
                        </div>
                        <a href="?p=user/mybalance" class="small-box-footer">Gestion <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3><?= $ask ?></h3>
                            <p>Demande<?php echo ($ask > 1)?'s':''; ?> de crédit</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-tasks"></i>
                        </div>
                        <a href="<?= $asklink ?>" class="small-box-footer">
                            <?= $detail ?> <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
            <?php } ?>
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3><?= $totalDoc ?></h3>
                        <p>Fichiers stockés</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-folder-open"></i>
                    </div>
                    <a href="index.php?p=user/mydocs" class="small-box-footer">Mes documents <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3><?= $nombre ?></h3>
                        <p>Message<?php echo ($nombre > 1)?'s':''; ?> reçu<?php echo ($nombre > 1)?'s':''; ?></p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-envelope"></i>
                    </div>
                    <a href="?p=user/mybox" class="small-box-footer">Messagerie <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">

            </div>
            <div class="col-md-4"></div>
        </div>

        <div class="row">
            <section class="col-lg-7 connectedSortable">
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
                            $n = 0;
                            foreach($transaction as $item):
                            $n++;
                            ?>
                            <tr>
                                <td width="10px"><?= $n ?></td>
                                <td align="center"><?= n_numSplitter($item->num) ?></td>
                                <td align="center"><?= $item->montant ?> <?= session('n_dev') ?></td>
                                <td align="right"><?= $item->heure ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                </div>
            </section>
            <section class="col-lg-5 connectedSortable">
                <div class="box box-solid bg-gradient" style="background-color: rgba(237,160,93,0.36)">
                    <div class="box-header">
                        <div class="pull-right box-tools">
                            <button type="button" class="btn btn-sm pull-right" data-widget="collapse" data-toggle="tooltip" title="Collapse" style="margin-right: 5px; background-color: #ed5721">
                                <i class="fa fa-minus"></i></button>
                        </div>
                        <i class="fa fa-share"></i>
                        <h3 class="box-title">
                            Virement
                        </h3>
                    </div>
                    <div class="box-body">
                        <div style="height: 250px; width: 100%;">
                            <?php
                            if(isset($_SESSION['AdminHJ4ssRF5'])){
                                $bank = 'readonly';
                            }else{
                                $bank = null;
                            }
                            ?>
                            <form method="post" name="trans" action="?p=transfer/newone" class="form-horizontal">
                                <?php session('token', uniqid() . uniqid() . uniqid()) ?>
                                <input id="csrf" name="token_csrf" value="<?= session('token') ?>" type="hidden">
                                <?php message('Le transfert a été effectué avec succès', 'tranfer'); ?>
                                <?php message('Transfert échoué. Veillez reéssayer un peu plus tard!', 'tranferFail', 'warning'); ?>
                                <?php message('Le numéro renseigné n\'est pas associé à un compte', 'tranferNoCompte', 'warning'); ?>
                                <?php message('Vérifiez vos informations. Le numéro de compte et le nom ne correspondent pas', 'differentz', 'warning'); ?>
                                <?php message('Vous n\'avez pas renseigné un numéro de compte', 'void', 'warning'); ?>
                                <?php message('Vous n\'avez pas renseigné toutes les informations', 'voidd', 'warning'); ?>
                                <?php message('Veillez renseigner le montant à transférer', 'monZero', 'warning'); ?>
                                <?php if($actuel){ ?>
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="banque" id="labelCompte"  class="col-sm-4 control-label">Nom de la banque</label>
                                            <div align="right" class="col-sm-8">
                                                <input name="banque" readonly id="banque" value="<?= isset($receiver->designation) ? $receiver->designation : 'Beloans' ?>" type="text" style="background-color: rgba(89,177,255,0.26); font-weight: bold; color: black" class="form-control valne">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputEmail3" id="labelCompte"  class="col-sm-4 control-label">Numéro de compte</label>
                                            <div align="right" class="col-sm-8">
                                                <input name="numCompte" readonly value="<?= $receiver->num ?>" id="numCompte" type="text" style="background-color: rgba(89,177,255,0.26); font-weight: bold; color: black" class="form-control valne" data-inputmask="'mask': ['9999-9999-9999-9999', '9999 9999 9999 9999']" data-mask>
                                            </div>
                                        </div>
                                        <div align="left" class="form-group">
                                            <label for="nom" id="labelCom" style="position: relative; right: 112px"  class="col-sm-4 control-label">Nom</label>
                                            <div align="right" class="col-sm-8">
                                                <input name="nom" id="nom" readonly value="<?= $receiver->nom ?>" type="text" style="background-color: rgba(89,177,255,0.26); font-weight: bold; color: black" class="form-control valne">
                                            </div>
                                        </div>
                                        <div>
                                            <div align="left" class="form-group col-lg-6">
                                                <label for="pays" id="labelCompt" style="position: relative; right: 22px"  class="col-sm-4 control-label">Pays</label>
                                                <div align="right" class="col-sm-8">
                                                    <input name="pays" readonly value="<?= $receiver->pays ?>" id="pays" type="text" style="background-color: rgba(89,177,255,0.26); font-weight: bold; color: black; position: relative; left: 88px" class="form-control valne">
                                                </div>
                                            </div>
                                            <div class="form-group col-lg-6" style="position: relative; left: 75px">
                                                <label for="ville" id="labelCompte" style="position: relative; left: 15px"  class="col-sm-4 control-label">Ville</label>
                                                <div align="right" class="col-sm-8">
                                                    <input name="ville" readonly id="ville" value="<?= $receiver->ville ?>" type="text" style="background-color: rgba(89,177,255,0.26); font-weight: bold; color: black" class="form-control valne">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputPassword3" id="labelMontant" class="col-sm-5 control-label nel-control ">Montant du transfert</label>
                                            <div align="right" class="col-sm-7">
                                                <input name="montant" style="background-color: rgba(89,177,255,0.26); font-weight: bold; color: black" onchange="totrans();" type="number" class="form-control valne" readonly value="<?= $receiver->montant ?>" id="toTrans">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputPassword" id="labelSolde"  class="col-sm-4 control-label nel-control">Solde courant</label>
                                            <div align="right" class="col-sm-8">
                                                <button disabled class="btn-danger" type="button" onclick="moins();" style="margin-right: 4px; border-radius: 50%; font-size: 15px; background-color: #ed5721">
                                                    <b>-</b>
                                                </button>
                                                <input id="trans" readonly onchange="mont();" class="form-control valne valne-m" style="color: black; background-color: rgba(89,177,255,0.26);" type="text" value="<?= $user->montant - $actuel->montant ?> <?= session('n_dev') ?>">
                                                <button type="button" onclick="plus();" disabled class="btn-danger" style="margin-left: 4px; border-radius: 50%; font-size: 15px; background-color: #ed5721">+</button>
                                            </div>
                                        </div>
                                        <div id="nelSld" class="form-group" style="position: relative; left: 12px;">
                                            <div class="col-sm-10">
                                                <div id="progress" align="center">
                                                    <p>Transfert en cours...<strong><?= $actuel->pourcent ?>%</strong></p>
                                                    <progress id="progressbar" value="<?= $actuel->pourcent ?>" min="0" max="100"><?= $actuel->pourcent ?>%</progress>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="ck4df" class="form-group">
                                            <label for="inputEmail3" id="labelCompte"  class="col-sm-4 control-label">Code de sécurité</label>
                                            <div align="right" class="col-sm-8">
                                                <input name="securityCod" id="securityCod" type="text" style="background-color: rgba(89,177,255,0.26); font-weight: bold; color: black" class="form-control valne">
                                                <input id="securite" value="<?= $actuel->idVirement ?>" type="hidden" name="idV" class="form-control valne">
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    if($actuel->pourcent == '25'){
                                        ?>
                                        <button style="background-color: #ed5721" id="continu" type="button" onclick="suite1();"  class="btn btn-danger pull-right">Continuer</button>
                                        <?php
                                    }elseif($actuel->pourcent == '50'){
                                        ?>
                                        <button style="background-color: #ed5721" id="continu2" type="button" onclick="suite2();"  class="btn btn-danger pull-right">Continuer</button>
                                        <?php
                                    }elseif($actuel->pourcent == '75'){
                                        ?>
                                        <button style="background-color: #ed5721" id="continu3" type="button" onclick="suite3();"  class="btn btn-danger pull-right">Continuer</button>
                                        <?php
                                    }
                                    ?>

                                <?php }else{ ?>
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="banque" id="labelCo" style="position: relative; right: 23px"  class="col-sm-4 control-label">Nom de la banque</label>
                                            <div align="right" class="col-sm-8">
                                                <input name="banque" <?= $bank ?> id="banque" value="<?= $banque ?>" type="text" style="background-color: rgba(89,177,255,0.26); font-weight: bold; color: black" class="form-control valne">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputEmail3" id="labelCompte"  class="col-sm-4 control-label">Numéro de compte</label>
                                            <div align="right" class="col-sm-8">
                                                <input name="numCompte" id="numCompte" value="<?= $encoursNum ?>" type="text" style="background-color: rgba(89,177,255,0.26); font-weight: bold; color: black" class="form-control valne" data-inputmask="'mask': ['9999-9999-9999-9999', '9999 9999 9999 9999']" data-mask>
                                            </div>
                                        </div>
                                        <div align="left" class="form-group">
                                            <label for="nom" id="labelCom" style="position: relative; right: 112px"  class="col-sm-4 control-label">Nom</label>
                                            <div align="right" class="col-sm-8">
                                                <input name="nom" value="<?= $encoursnm ?>" id="nom" type="text" style="background-color: rgba(89,177,255,0.26); font-weight: bold; color: black" class="form-control valne">
                                            </div>
                                        </div>
                                        <div>
                                            <div align="left" class="form-group col-lg-6">
                                                <label for="pays" id="labelCompt" style="position: relative; right: 22px" class="col-sm-4 control-label">Pays</label>
                                                <div align="right" class="col-sm-8">
                                                    <input name="pays" id="pays" value="<?= $encourspy ?>" type="text" style="background-color: rgba(89,177,255,0.26); font-weight: bold; color: black; position: relative; left: 88px" class="form-control valne">
                                                </div>
                                            </div>
                                            <div class="form-group col-lg-6" style="position: relative; left: 75px">
                                                <label for="ville" id="labelCompte" style="position: relative; left: 15px"  class="col-sm-4 control-label">Ville</label>
                                                <div align="right" class="col-sm-8">
                                                    <input name="ville" id="ville" value="<?= $encoursvil ?>" type="text" style="background-color: rgba(89,177,255,0.26); font-weight: bold; color: black" class="form-control valne">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputPassword3" id="labelMontant" class="col-sm-5 control-label nel-control ">Montant du transfert</label>
                                            <div align="right" class="col-sm-7">
                                                <input name="montant" style="background-color: rgba(89,177,255,0.26); font-weight: bold; color: black" onchange="totrans();" type="number" class="form-control valne" value="<?= ($encoursmon === null) ? '0' : $encoursmon ?>" id="toTrans">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputPassword" id="labelSolde"  class="col-sm-4 control-label nel-control">Solde courant</label>
                                            <div align="right" class="col-sm-8">
                                                <button class="btn-danger" type="button" onclick="moins();" style="margin-right: 4px; border-radius: 50%; font-size: 15px; background-color: #ed5721">
                                                    <b>-</b>
                                                </button>
                                                <input id="trans" onchange="mont();" class="form-control valne valne-m" style="color: black" type="text" value="<?= $user->montant ?> <?= session('n_dev') ?>">
                                                <button type="button" onclick="plus();" class="btn-danger" style="margin-left: 4px; border-radius: 50%; font-size: 15px; background-color: #ed5721">+</button>
                                            </div>
                                        </div>
                                        <div id="nelSld" class="form-group" style="position: relative; left: 12px;">
                                            <div class="col-sm-10">
                                                <div id="progress" align="center">
                                                    <p>Transfert en cours...<strong>0%</strong></p>
                                                    <progress id="progressbar" value="5" min="0" max="100">0%</progress>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="ck4df" class="form-group">
                                            <label for="inputEmail3" id="labelCompte"  class="col-sm-4 control-label">Code de sécurité</label>
                                            <div align="right" class="col-sm-8">
                                                <input name="securityCod" id="securityCod" type="text" style="background-color: rgba(89,177,255,0.26); font-weight: bold; color: black" class="form-control valne">
                                                <input name="securityCod2" id="securityCod2" type="password" style="background-color: rgba(89,177,255,0.26); font-weight: bold; color: black" class="form-control valne">
                                            </div>
                                        </div>
                                    </div>
                                    <?php if(isset($_SESSION['AdminHJ4ssRF5'])){ ?>
                                        <button style="background-color: #ed5721" id="transta" type="button" onclick="sendAd();"  class="btn btn-danger pull-right">Transférer</button>
                                    <?php } else { ?>
                                        <button style="background-color: #ed5721" id="continu" type="button" onclick="suite1();"  class="btn btn-danger pull-right">Continuer</button>
                                        <button style="background-color: #ed5721" id="transta" type="button" onclick="sender();"  class="btn btn-danger pull-right">Transférer</button>
                                    <?php } ?>
                                <?php } ?>

                            </form>
                        </div>
                    </div>
                    <div class="box-footer no-border">
                        <div style="color: black" align="center" class="row">
                            <b>
                                Soyez sûr de ce que vous faîtes. Un virement achevé ne peut-être annuler
                            </b>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </section>
</div>
<div class="modal fade" id="cHfd4ESD">
    <div class="modal-dialog">
        <div style="border-radius: 15px;"  align="left" class="modal-content">
            <div align="center" class="modal-body">
                <p>Veillez insérer votre code de sécurité pour continuer la transaction.</p>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="cHfd4ESD2">
    <div class="modal-dialog">
        <div style="border-radius: 15px;"  align="left" class="modal-content">
            <div align="center" class="modal-body">
                <p>Veillez insérer le premier code de sécurité pour continuer la transaction.</p>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="cHfd4ESD3">
    <div class="modal-dialog">
        <div style="border-radius: 15px;"  align="left" class="modal-content">
            <div align="center" class="modal-body">
                <p>Veillez insérer le deuxième code de sécurité pour continuer la transaction.</p>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="cHfd4ESD4">
    <div class="modal-dialog">
        <div style="border-radius: 15px;"  align="left" class="modal-content">
            <div align="center" class="modal-body">
                <p>Veillez insérer le troisième code de sécurité pour finaliser la transaction.</p>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="cHfd4ESDF">
    <div class="modal-dialog">
        <div style="border-radius: 15px;"  align="left" class="modal-content">
            <div align="center" class="modal-body">
                <p>Connection impossible. Veillez reéssayer un peu plus tard</p>
            </div>
        </div>
    </div>
</div>
