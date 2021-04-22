<div class="content-wrapper">
    <section class="content-header">
        <h1>             Messagerie             <small>Messages reçu</small>           </h1>
        <ol class="breadcrumb">
            <li><a href="index.php?p=user/myaccount"><i class="fa fa-dashboard"></i> Accueil</a></li>
            <li class="active">Messagerie</li>
        </ol>
    </section>
    <section class="content">
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
                            <li><a href="index.php?p=user/draft"><i class="fa fa-file-text-o"></i> Brouillons</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <section class="content">
                    <div class="row">
                        <form name="envoies" action="index.php?p=user/sender" method="post" enctype="multipart/form-data">
                            <div style="display: none">
                                <input class="form-control" value="<?= $message->sujet ?>" name="sujet" placeholder="Sujet :"/>
                                <textarea id="compose-textarea" name="contenu" placeholder="Saissez votre message ici..." class="form-control" style="height: 300px"><?= $message->contenu ?></textarea>
                                <input class="form-control" value="<?= $email ?>" name="destinataire" placeholder="A :"/>
                            </div>
                        </form>
                            <div class="box box-primary">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Lire message</h3>
                                </div>
                                <div class="box-body no-padding">
                                    <div class="mailbox-read-info">
                                        <h3><?= $message->sujet ?></h3>
                                        <h5>De: <?= $message->prenom ?> <?= $message->nom ?> <span class="mailbox-read-time pull-right"><?= frenchFullDate($message->dateheure) ?></span></h5>
                                    </div>
                                    <div class="mailbox-read-message">
                                        <?= $message->contenu ?>
                                    </div>
                                </div>
                                <div class="box-footer">
                                    <ul class="mailbox-attachments clearfix">
                                        <?= ampliation($message) ?>
                                    </ul>
                                </div>
                                <div class="box-footer">
                                    <div class="pull-right">
                                        <a href="index.php?p=user/newMessage&ref=<?= $message->idMessage ?>"><button <?= repondre() ?> type="button" class="btn btn-default"><i class="fa fa-reply"></i> Répondre</button></a>
                                    </div>
                                    <form action="index.php?p=user/deletemessage&ref=<?= $_GET['p'] ?>&fr=<?= $_GET['fr'] ?>" method="post">
                                        <input style="display: none" type="text" name="idMessageDeleted" value="<?= $message->idMessage ?>" />
                                        <button type="submit" class="btn btn-default"><i class="fa fa-trash-o"></i> Supprimer</button>
                                    </form>
                                    <?php
                                    if($_GET['fr'] == 'b'){
                                         ?>
                                        <div class="pull-right" style="position: relative; top: -33px">
                                            <button type="button" onclick="document.forms['envoies'].submit()" name="send" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Envoyer</button>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
                    </div>
                </section>
            </div>
        </div>
    </section>
</div>