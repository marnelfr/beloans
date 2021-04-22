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
            <?php
            if(isset($_SESSION['sendingMessage']) AND ($_SESSION['sendingMessage'] != false)){
                ?>
                <div class="col-md-4"></div>
                <div class="alert alert-success col-md-4" align="center">
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
                            <li class="active"><a href="index.php?p=user/mybox"><i class="fa fa-inbox"></i> Boite de réception
                            <li><a href="index.php?p=user/sending"><i class="fa fa-envelope-o"></i> Messages envoyés</a></li>
                            <li><a href="index.php?p=user/draft"><i class="fa fa-file-text-o"></i> Brouillons</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="box box-primary">
                    <form action="index.php?p=user/deletemessages&ref=<?= $_GET['p'] ?>" method="post">
                        <div class="box-header with-border">
                            <h3 class="box-title">Messages</h3>
                        </div>
                        <div-- class="box-body no-padding">
                            <div class="table-responsive mailbox-messages">
                                <table id="example1" class="table table-bordered table-striped" style="text-align: center">
                                    <thead>
                                    <tr>
                                        <th style="text-align: center"></th>
                                        <th style="text-align: center">Emetteur</th>
                                        <th style="text-align: center">Sujet</th>
                                        <th style="text-align: center">Extrait</th>
                                        <th style="text-align: center"></th>
                                        <th style="text-align: center">Depuis</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $i = 0;
                                    $_SESSION['totalForDel'] = [];
                                    foreach($messages as $message):
                                        $i++;
                                        $_SESSION['totalForDel'] += [$i => 'forDel' . $message->idMessage];
                                        ?>
                                        <tr <?= notRead($message->idMessage) ?> >
                                            <td><input name="forDel<?= $message->idMessage ?>" type="checkbox" /></td>
                                            <td class="mailbox-name"><a href="index.php?p=user/read&ref=<?= $message->idMessage ?>&fr=m""><?= $message->prenom ?> <?= $message->nom ?></a></td>
                                            <td class="mailbox-subject"><?= $message->sujet ?></td>
                                            <td class="mailbox-subject"> <?= $message->extrait ?></td>
                                            <td class="mailbox-attachment"><?php echo ($message->ampliation === '0') ? ' ' : '<i class="fa fa-paperclip"></i>' ?></td>
                                            <td class="mailbox-date"><?= frenchFullDate($message->dateheure) ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th style="text-align: center"></th>
                                        <th style="text-align: center"></th>
                                        <th style="text-align: center"></th>
                                        <th style="text-align: center"></th>
                                        <th style="text-align: center"></th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="box-footer no-padding">
                                <div class="mailbox-controls">
                                    <div class="btn-group">
                                        <button type="submit" class="btn btn-default btn-sm" title="Supprimés les messages"><i class="fa fa-trash-o"></i></button>
                                    </div>
                                    <a href="index.php?p=user/mybox">
                                        <button type="button" class="btn btn-default btn-sm" title="Actuliser"><i class="fa fa-refresh"></i></button>
                                    </a>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>