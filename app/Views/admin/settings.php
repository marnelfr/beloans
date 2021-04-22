<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Paramètres Systèmes
        </h1>
        <ol class="breadcrumb">
            <li><a href="?p=user/myaccount"><i class="fa fa-dashboard"></i> Accueil</a></li>
            <li class="active">Parametres</li>
        </ol>
    </section>
    <section class="content">
        <div class="row" align="center">
            <div class="box box-solid">
                <div style="padding-top: 35px" class="box-body">
                    <div class="col-md-3">

                    </div>
                    <form action="?p=admin/parametre" method="post" name="set_form" class="proceed">
                        <?php session('token', uniqid() . uniqid()) ?>
                        <input id="csrf" name="token_csrf" value="<?= session('token') ?>" type="hidden">

                        <div class="col-md-6">
                            <div>
                                <div>
                                    <?php message('Vous n\'avez pas rempli tous les champs', 'void', 'warning') ?>
                                    <?php message('Enregistrement éffectué avec succès.', 'coolSet') ?>
                                    <?php message('Enregistrement non éffectué. Veillez reéssayer un peu plus tard.', 'badSet', 'warning') ?>

                                    <div class="form-group col-md-12">
                                        <label for="country">
                                            <span class="pull-left" style="position: relative; top: -5px; right: 4px">Devise:</span><br>
                                            <select style="width: 550px" class="form-control" name="devise" >
                                                <option onclick="newDevise('€');" <?= n_this('€') ?> value="€"> Euro (€)</option>
                                                <option onclick="newDevise('$');" <?= n_this('$') ?> value="$"> Dollar ($)</option>
                                                <option onclick="newDevise('XOF');" <?= n_this('XOF') ?> value="XOF"> F CFA (XOF)</option>
                                            </select>
                                        </label>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <div align="left" style="margin-left: 28px"><label>Montant par defaut:</label></div>
                                        <input style="width: 550px" onchange="monte();" id="trans" value="<?= session('n_mon') . ' ' . session('n_dev') ?>" type="text" name="montant" class="form-control" placeholder="Montant reçu à l'inscription"/>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <div align="left" style="margin-left: 28px"><label for="exampleInputEmail1">Espace de stockage (MB):</label></div>
                                        <input type="text" class="form-control" name="espace" value="<?= session('n_size') ?>" style="width: 550px" id="exampleInputEmail1" placeholder="Espace de stockage">
                                    </div>
                                    <div style="margin-bottom: 10px; margin-top: 15px" class="form-group col-md-12">
                                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <div style="background-color: rgba(0,0,255,0.19); border-radius: 15px; padding: 15px; padding-bottom: 5px; margin-top: 10px">
                                            <p>Les modifications vont appliquer pour les prochaines inscriptions en ce qui concerne les <b>Montant par defaut</b> et <b>Espace de stockage</b></p>
                                        </div>
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



