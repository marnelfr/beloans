<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Dépots en attente
        </h1>
        <ol class="breadcrumb">
            <li><a href="?p=user/myaccount"><i class="fa fa-dashboard"></i> Accueil</a></li>
            <li class="active">Tableau des depots</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <?php message('Le dépôt a bien été éffectué.', 'accoderDepot'); ?>
                <?php message('Echec du dépôt. Veillez reéssayer plus tard.', 'EchecAccord', 'warning'); ?>
            </div>
            <div class="col-md-4"></div>
            <section class="col-lg-12 connectedSortable">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs pull-right">
                        <li class="pull-left header"><i class="fa fa-inbox"></i><span id="title">Liste des depots</span></li>
                    </ul>
                    <div style="position: relative;" id="lestrnas" class="tab-content no-padding">
                        <table class="table">
                            <tr>
                                <th width="10px">Ordre</th>
                                <th><div align="center">Type du depot</div></th>
                                <th><div align="center">Numero Compte</div></th>
                                <th><div align="center">Type de carte</div></th>
                                <th><div align="center">Code</div></th>
                                <th><div align="center">Banque</div></th>
                                <th><div align="center">Montant</div></th>
                                <th><div align="center">Par</div></th>
                                <th><div align="right">Action</div></th>
                            </tr>
                            <?php
                            $n = 0;
                            foreach($lasts as $one):
                                if(is_null($one->banque)){
                                    $banque = '-';
                                }else{
                                    $banque = $one->banque;
                                }
                                if(is_null($one->code)){
                                    $code = '-';
                                }else{
                                    $code = $one->code;
                                }
                                if(is_null($one->typecarte)){
                                    $carte = '-';
                                }else{
                                    $carte = $one->typecarte;
                                }
                                $n++;
                                ?>
                                <tr>
                                    <td width="10px"><?= $n ?></td>
                                    <td align="center"><?= $one->typedepot ?></td>
                                    <td align="center"><?= n_numSplitter($one->numero) ?></td>
                                    <td align="center"><?= $carte ?></td>
                                    <td align="center"><?= $code ?></td>
                                    <td align="center"><?= $banque ?></td>
                                    <td align="center"><?= $one->montant ?> <?= session('n_dev') ?></td>
                                    <td align="center"><?= $one->prenom ?> <?= $one->nom ?></td>
                                    <td align="right">
                                        <form action="index.php?p=admin/granting" method="post">
                                            <input type="hidden" name="name" value="<?= $one->idDepot ?>">
                                            <input type="hidden" name="montant" value="<?= $one->montant ?>">
                                            <input type="hidden" name="user" value="<?= $one->idUser ?>">
                                            <button style="position: relative; bottom: 6px" type="submit" id="everything" class="btn btn-danger pull-right">Valider</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                </div>
            </section>

        </div>

    </section>
</div>