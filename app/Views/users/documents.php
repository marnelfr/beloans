<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Mes documents
        </h1>
        <ol class="breadcrumb">
            <li><a href="index.php?p=user/myaccount"><i class="fa fa-dashboard"></i> Accueil</a></li>
            <li class="active">
                Mes documents
            </li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <?php message(session('newDocMessage'), 'newDocFaille', 'danger') ?>
                <?php message(session('newDocMessage'), 'newDocVoid', 'warning') ?>
                <?php message(session('newDocMessage'), 'successFile'); $size = hundred($user->taille/1024/1024); ?>
            </div>
            <div class="col-md-4"></div>
        </div>
        <div class="row">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Liste des fichiers enregistrés</h3>
                    <div class="pull-right">
                        <b style="color: <?= $size>8 ? 'red' : 'black' ?>">
                            Espace utilisé : <?= $size ?> MB / <?= session('n_size') ?> MB
                        </b>
                    </div>
                </div>
                <div class="box-body">
                    <form method="post" enctype="multipart/form-data" action="index.php?p=user/newdoc">
                        <div class="col-md-12">
                            <div class="form-group">
                                <?php session('token', uniqid() . uniqid()) ?>
                                <input id="token" name="token_csrf" value="<?= session('token') ?>" type="hidden">
                                <div id="newFile" class="btn btn-default btn-file btn-success" style="color: #ffffff;">
                                    <input type="hidden" name="MAX_FILE_SIZE" value="10485760">
                                    Ajouter
                                    <input type="file" name="attachment" />
                                </div>
                                <div id="appl">
                                    <input type="text" name="description" placeholder="Brief description du fichier" class="form-control">
                                    <button type="submit"  class="btn btn-default btn-flat btn-success"  style="color: #ffffff; margin-top: 10px">Enregistrer</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <table class="table">
                        <tr>
                            <th>Numéro</th>
                            <th>Nom</th>
                            <th></th>
                            <th>Description</th>
                            <th>Date d'ajout</th>
                            <th>Taille</th>
                        </tr>
                        <?php
                        session('token2', uniqid() . uniqid());
                        foreach($docs as $doc): $compteur++; ?>
                            <tr>
                                <td><?= $compteur ?></td>
                                <?php $name = explode('.', $doc->name)[0] . $doc->idDocument . '.' . explode('.', $doc->name)[1] ?>
                                <td><i class="fa <?= icon($doc->name) ?>"></i>&nbsp; <a href="<?= 'docs/' . $user->idUser . '/' . $name ?>"><?= $doc->name ?></a></td>
                                <!--<td><?/*= $doc->name */?></td>-->
                                <td>
                                    <form action="?p=user/delDoc" method="post" name="suppressionDoc<?= $doc->idDocument ?>">
                                        <input id="token" name="token_csrf" value="<?= session('token2') ?>" type="hidden">
                                        <input type="hidden" value="<?= $doc->idDocument ?>" name="id">
                                        <input type="hidden" value="<?= $doc->mysize ?>" name="taille">
                                        <input type="hidden" value="<?= $name ?>" name="name">
                                        <button class="nelSupp" onclick="document.forms['supressionDoc<?= $doc->idDocument ?>'].submit()" title="Supprimer <?= $doc->name ?>"><i class="fa fa-trash"></i></button>
                                    </form>
                                </td>
                                <td><?= $doc->description ?></td>
                                <td><?= $doc->jour ?></td>
                                <td><?= hundred($doc->mysize/1024) ?> kilo</td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>

