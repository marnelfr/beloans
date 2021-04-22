<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Gestion des transferts
        </h1>
        <ol class="breadcrumb">
            <li><a href="?p=user/myaccount"><i class="fa fa-dashboard"></i> Accueil</a></li>
            <li class="active">Transactions</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <section class="col-lg-5 connectedSortable">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs pull-right">
                        <li class="pull-left header"><i class="fa fa-inbox"></i> Nouveaux transferts</li>
                    </ul>
                    <div style="position: relative;" class="tab-content no-padding">
                        <table class="table">
                            <tr>
                                <th width="10px">Ordre</th>
                                <th><div align="center">Numéro Compte</div></th>
                                <th><div align="center">Montant</div></th>
                                <th><div align="right">Action</div></th>
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
                                    <td align="right">
                                        <form action="?p=transfer/follow" method="post">
                                            <input type="hidden" value="<?= $item->idVirement ?>" name="id" />
                                            <button type="submit" class="btn btn-danger pull-right">Suivre</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                </div>
            </section>
            <section class="col-lg-7 connectedSortable">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs pull-right">
                        <li class="pull-left header"><i class="fa fa-inbox"></i>Gestions en cours</li>
                    </ul>
                    <div style="position: relative;" class="tab-content no-padding">
                        <table class="table">
                            <tr>
                                <th width="10px">Ordre</th>
                                <th><div align="center">Numéro Compte</div></th>
                                <th><div align="center">Montant</div></th>
                                <th><div align="center">Code 1</div></th>
                                <th><div align="center">Code 2</div></th>
                                <th><div align="center">Code 3</div></th>
                                <th><div align="right">Action</div></th>
                            </tr>
                            <?php
                            $n = 0;
                            foreach($follow as $one):
                                $n++;
                                ?>
                                <tr>
                                    <td width="10px"><?= $n ?></td>
                                    <td align="center"><?= n_numSplitter($one->num) ?></td>
                                    <td align="center"><?= $one->montant ?> <?= session('n_dev') ?></td>
                                    <td align="center"><?= $one->code1 ?></td>
                                    <td align="center"><?= $one->code2 ?></td>
                                    <td align="center"><?= $one->code3 ?></td>
                                    <td align="center">
                                        <form action="?p=transfer/generer" method="post">
                                            <input type="hidden" value="<?= $one->idVirement ?>" name="id" />
                                            <input type="hidden" value="<?= $one->pourcent ?>" name="etat" />
                                            <button type="submit" class="btn btn-danger pull-right">Generer</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                </div>
            </section>
        </div>

        <div class="row">
            <section class="col-lg-12 connectedSortable">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs pull-right">
                        <li class="pull-left header"><i class="fa fa-inbox"></i><span>Transactions interbancaires</span></li>
                    </ul>
                    <div style="position: relative;" class="tab-content no-padding">
                        <table class="table">
                            <tr>
                                <th width="10px">Ordre</th>
                                <th><div align="center">Banque</div></th>
                                <th><div align="center">Receveur</div></th>
                                <th><div align="center">Numéro Compte</div></th>
                                <th><div align="center">Pays</div></th>
                                <th><div align="center">Ville</div></th>
                                <th><div align="center">Montant</div></th>
                                <th><div align="center">Par</div></th>
                                <th><div align="center">Code 1</div></th>
                                <th><div align="center">Code 2</div></th>
                                <th><div align="center">Code 3</div></th>
                                <th><div align="right">Action</div></th>
                            </tr>
                            <?php
                            $n = 0;
                            foreach($others as $other):
                                $n++;
                                ?>
                                <tr>
                                    <td width="10px"><?= $n ?></td>
                                    <td align="center"><?= $other->designation ?></td>
                                    <td align="center"><?= $other->nom ?></td>
                                    <td align="center"><?= n_numSplitter($other->num) ?></td>
                                    <td align="center"><?= $other->pays ?></td>
                                    <td align="center"><?= $other->ville ?></td>
                                    <td align="center"><?= $other->montant ?> <?= session('n_dev') ?></td>
                                    <td align="center"><?= $other->snom ?> <?= $other->prenom ?></td>
                                    <td align="center"><?= $other->code1 ?></td>
                                    <td align="center"><?= $other->code2 ?></td>
                                    <td align="center"><?= $other->code3 ?></td>
                                    <td align="right">
                                        <form action="?p=transfer/generer" method="post">
                                            <input type="hidden" value="<?= $other->idVirement ?>" name="id" />
                                            <input type="hidden" value="<?= $other->pourcent ?>" name="etat" />
                                            <button type="submit" class="btn btn-danger pull-right">Generer</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                </div>
            </section>

        </div>

        <div class="row">
            <section class="col-lg-12 connectedSortable">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs pull-right">
                        <li class="pull-left header"><i class="fa fa-inbox"></i><span id="title">Recentes transactions</span></li>
                    </ul>
                    <div style="position: relative;" id="lestrnas" class="tab-content no-padding">
                        <table class="table">
                            <tr>
                                <th width="10px">Ordre</th>
                                <th><div align="center">Numéro Compte</div></th>
                                <th><div align="center">Montant</div></th>
                                <th><div align="center">Code 1</div></th>
                                <th><div align="center">Code 2</div></th>
                                <th><div align="center">Code 3</div></th>
                                <th><div align="right">Date-Heure</div></th>
                            </tr>
                            <?php
                            $n = 0;
                            foreach($lasts as $one):
                                $n++;
                                ?>
                                <tr>
                                    <td width="10px"><?= $n ?></td>
                                    <td align="center"><?= n_numSplitter($one->num) ?></td>
                                    <td align="center"><?= $one->montant ?> <?= session('n_dev') ?></td>
                                    <td align="center"><?= $one->code1 ?></td>
                                    <td align="center"><?= $one->code2 ?></td>
                                    <td align="center"><?= $one->code3 ?></td>
                                    <td align="right">
                                        <?= $one->heure ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                    <ul class="nav nav-tabs pull-right">
                        <li class="pull-right header">
                            <button style="position: relative; bottom: 6px" type="submit" onclick="alltrans();" id="everything" class="btn btn-danger pull-right">Afficher tout</button>
                        </li>
                    </ul>
                </div>
            </section>

        </div>

    </section>
</div>