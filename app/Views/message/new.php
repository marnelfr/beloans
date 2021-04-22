<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Messagerie
            <small>Nouveaux messages</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="index.php?p=user/myaccount"><i class="fa fa-dashboard"></i> Accueil</a></li>
            <li class="active">Messagerie</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <?php
            if(isset($_SESSION['sendingMessage']) AND ($_SESSION['sendingMessage'] != false)){
                ?>
                <div class="col-md-4"></div>
                <div class="alert alert-warning col-md-4" align="center">
                    <p align="center"><?= $_SESSION['sendingMessage'] ?></p>
                </div>
                <div class="col-md-4"></div>
                <?php
                $_SESSION['sendingMessage'] = false;
            }
            ?>
        </div>
        <div class="row">
            <div class="col-md-3">
                <a href="index.php?p=user/newMessage" class="btn btn-primary btn-block margin-bottom">Nouveau message</a>
                <div class="box box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">Actions</h3>
                    </div>

                    <div class="box-body no-padding">
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="index.php?p=user/mybox"><i class="fa fa-inbox"></i> Boite de réception
                            <li><a href="index.php?p=user/sending"><i class="fa fa-envelope-o"></i> Messages envoyés</a></li>
                            <li class="active"><a href="index.php?p=user/draft"><i class="fa fa-file-text-o"></i> Brouillons</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="box box-primary">
                    <form action="index.php?p=user/sender" method="post" enctype="multipart/form-data">
                        <div class="box-header with-border">
                            <h3 class="box-title">Rediger un nouveau message</h3>
                        </div>
                        <div class="box-body">
                            <div class="form-group">
                                <input class="form-control" <?php sendingFail('destinataire'); ?> <?= replayMessage('value', 'email') ?> name="destinataire" placeholder="A :"/>
                            </div>
                            <div class="form-group">
                                <input class="form-control" <?php sendingFail('sujet'); ?> <?= replayMessage('value', 'sujet') ?>  name="sujet" placeholder="Sujet :"/>
                            </div>
                            <div class="form-group">
                      <textarea id="compose-textarea" name="contenu" placeholder="Saissez votre message ici..." class="form-control" style="height: 300px"><?php sendingFail('contenu'); ?></textarea>
                            </div>
                            <div class="form-group">
                                <div class="btn btn-default btn-file">
                                    <input type="hidden" name="MAX_FILE_SIZE" value="10485760">
                                    <i class="fa fa-paperclip"></i> Pièce Jointe
                                    <input type="file" name="attachment" />
                                </div>
                                <p class="help-block">Max: 1MB</p>
                            </div>
                        </div>
                        <div class="box-footer">
                            <div class="pull-right" style="position: relative; top: -33px">
                                <button type="submit" name="save" class="btn btn-default"><i class="fa fa-pencil"></i> Enregistrer</button>
                                <button type="submit" name="send" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Envoyer</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>