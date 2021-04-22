<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= $title ?></title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link href="public/admin/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link href="public/admin/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="public/admin/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <link href="public/admin/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" type="image/x-icon" href="public/images/icon.png" />
    <style>
        .example-modal .modal {
            position: relative;
            top: auto;
            bottom: auto;
            right: auto;
            left: auto;
            display: block;
            z-index: 1;
        }
        .example-modal .modal {
            background: transparent!important;
        }



        /*primary*/
        .nelde-primary{
            border-top: 0;
            background: rgba(60, 141, 188, 0.3) !important;
            background: -webkit-gradient(linear, left bottom, left top, color-stop(0, rgba(60, 141, 188, 0.31)), color-stop(1, rgba(103, 168, 206, 0.3))) !important;
            background: -ms-linear-gradient(bottom, rgba(60, 141, 188, 0.31), rgba(103, 168, 206, 0.31)) !important;
            background: -moz-linear-gradient(center bottom, rgba(60, 141, 188, 0.3) 0, rgba(103, 168, 206, 0.31) 100%) !important;
            background: -o-linear-gradient(rgba(103, 168, 206, 0.3), rgba(60, 141, 188, 0.3)) !important;
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#67a8ce', endColorstr='#3c8dbc', GradientType=0) !important;
            position: relative;
            border-radius: 0px 0px 0px 0px;
            margin-bottom: 20px;
            width: 100%;
            box-shadow: 0 1px 1px rgba(0,0,0,0.1);
            box-sizing: border-box;
            font-family: 'Source Sans Pro','Helvetica Neue',Helvetica,Arial,sans-serif;
            font-weight: 400;
            font-size: 14px;
            line-height: 1.42857143;
        }

        .nelBack-primary{
            border: none;
            padding: 3px;
            background-color: rgba(60, 141, 188, 0.3)
        }

        .nelButton-primary{
            background-color: rgba(95, 169, 188, 0.4);
            border: none;
        }

        .nelborder-primary{
            border-left: 3px solid rgba(60, 141, 188, 0.3);
            border-right: 3px solid rgba(60, 141, 188, 0.3);
            border-bottom: 3px solid rgba(60, 141, 188, 0.3);
        }
        /*END Primary*/




        /*success*/
        .nelde-success{
            border-top: 0;
            background: rgba(0, 166, 90, 0.31) !important;
            background: -webkit-gradient(linear, left bottom, left top, color-stop(0, rgba(0, 166, 90, 0.3)), color-stop(1, rgba(0, 202, 109, 0.3))) !important;
            background: -ms-linear-gradient(bottom, rgba(0, 166, 90, 0.3), rgba(0, 202, 109, 0.31)) !important;
            background: -moz-linear-gradient(center bottom, rgba(0, 166, 90, 0.31) 0, rgba(0, 202, 109, 0.31) 100%) !important;
            background: -o-linear-gradient(rgba(0, 202, 109, 0.3), rgba(0, 166, 90, 0.31)) !important;
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#00ca6d', endColorstr='#00a65a', GradientType=0) !important;
            position: relative;
            border-radius: 3px;
            margin-bottom: 20px;
            width: 100%;
            box-shadow: 0 1px 1px rgba(0,0,0,0.1);
            box-sizing: border-box;
            font-family: 'Source Sans Pro','Helvetica Neue',Helvetica,Arial,sans-serif;
            font-weight: 400;
            font-size: 14px;
            line-height: 1.42857143;
        }

        .nelBack-success{
            border: none;
            padding: 3px;
            background-color: rgba(0, 166, 90, 0.3)
        }


        .nelButton-success{
            background-color: rgba(98, 188, 134, 0.4);
            border: none;
        }

        .nelborder-success{
            border-left: 3px solid rgba(0, 166, 90, 0.36);
            border-right: 3px solid rgba(0, 166, 90, 0.36);
            border-bottom: 3px solid rgba(0, 166, 90, 0.36);
        }
        /*END success*/





        /*warning*/
        .nelde-warning{
            border-top: 0;
            background: rgba(243, 198, 66, 0.31) !important;
            background: -webkit-gradient(linear, left bottom, left top, color-stop(0, rgba(243, 198, 66, 0.31)), color-stop(1, rgba(243, 205, 27, 0.31))) !important;
            background: -ms-linear-gradient(bottom, rgba(243, 198, 66, 0.31), rgba(243, 205, 27, 0.31)) !important;
            background: -moz-linear-gradient(center bottom, rgba(243, 198, 66, 0.31) 0, rgba(243, 205, 27, 0.31) 100%) !important;
            background: -o-linear-gradient(rgba(243, 205, 27, 0.31), rgba(243, 198, 66, 0.3)) !important;
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#f3cd1b', endColorstr='#f3c642', GradientType=0) !important;
            position: relative;
            border-radius: 3px;
            margin-bottom: 20px;
            width: 100%;
            box-shadow: 0 1px 1px rgba(0,0,0,0.1);
            box-sizing: border-box;
            font-family: 'Source Sans Pro','Helvetica Neue',Helvetica,Arial,sans-serif;
            font-weight: 400;
            font-size: 14px;
            line-height: 1.42857143;
        }

        .nelBack-warning{
            border: none;
            padding: 3px;
            background-color: rgba(243, 183, 20, 0.3)
        }

        .nelButton-warning{
            background-color: rgba(243, 219, 142, 0.4);
            border: none;
        }

        .nelborder-warning{
            border-left: 3px solid rgba(243, 198, 66, 0.36);
            border-right: 3px solid rgba(243, 198, 66, 0.36);
            border-bottom: 3px solid rgba(243, 198, 66, 0.36);
        }
        /*END warning*/



        /*danger*/
        .nelde-danger{
            border-top: 0;
            background: rgba(245, 105, 84, 0.3) !important;
            background: -webkit-gradient(linear, left bottom, left top, color-stop(0, rgba(245, 105, 84, 0.31)), color-stop(1, rgba(245, 149, 128, 0.3))) !important;
            background: -ms-linear-gradient(bottom, rgba(245, 105, 84, 0.31), rgba(245, 149, 128, 0.31)) !important;
            background: -moz-linear-gradient(center bottom, rgba(245, 105, 84, 0.3) 0, rgba(245, 149, 128, 0.31) 100%) !important;
            background: -o-linear-gradient(rgba(245, 149, 128, 0.31), rgba(245, 105, 84, 0.31)) !important;
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#f3cd1b', endColorstr='#f56954', GradientType=0) !important;
            position: relative;
            border-radius: 3px;
            margin-bottom: 20px;
            width: 100%;
            box-shadow: 0 1px 1px rgba(0,0,0,0.1);
            box-sizing: border-box;
            font-family: 'Source Sans Pro','Helvetica Neue',Helvetica,Arial,sans-serif;
            font-weight: 400;
            font-size: 14px;
            line-height: 1.42857143;
        }

        .nelBack-danger{
            border: none;
            padding: 3px;
            background-color: rgba(245, 105, 84, 0.3)
        }

        .nelButton-danger{
            background-color: rgba(245, 183, 167, 0.41);
            border: none;
        }

        .nelborder-danger{
            border-left: 3px solid rgba(245, 105, 84, 0.36);
            border-right: 3px solid rgba(245, 105, 84, 0.36);
            border-bottom: 3px solid rgba(245, 105, 84, 0.36);
        }
        /*END danger*/
    </style>
</head>
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">
    <header class="main-header">
        <nav class="navbar navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <a href="?p=user/myaccount" class="navbar-brand"><b>Secu</b>RITY</a>
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                        <i class="fa fa-bars"></i>
                    </button>
                </div>
                <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="?p=user/myaccount">Tableau de bord <span class="sr-only">(current)</span></a></li>
                        <li><a href="?p=user/asking">Crédit</a></li>
                        <li><a href="?p=user/mybalance">Portefeuille</a></li>
                        <?= isset($_SESSION['AdminHJ4ssRF5']) ? '<li><a href="?p=admin/users">Utilisateurs</a></li>' : '' ?>
                    </ul>
                </div>
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="<?= $picture ?>" class="user-image" alt="User Image">
                                <span class="hidden-xs"><?= $user->prenom ?> <?= $user->nom ?></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="user-header">
                                    <img src="<?= $picture ?>" class="img-circle" alt="User Image">
                                    <p>
                                        <?= $user->prenom ?> <?= $user->nom ?>
                                    </p>
                                </li>
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="?p=user/settings" class="btn btn-default btn-flat">Mon profil</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="?p=user/logout" class="btn btn-default btn-flat">Deconnexion</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <div class="row">
        <?php message('Vous n\'avez pas selectionné un fichier', 'uploadVoid', 'danger') ?>
        <?php message(session('uploadMessage'), 'uploadFaille', 'danger') ?>
    </div>
    <?= $content ?>
    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b><?= date('Y') ?></b>
        </div>
        <a href="http://security.com"><strong>SecuRITY</strong></a>. All rights reserved.
    </footer>
</div>
<script src="public/admin/plugins/jQuery/jQuery-2.1.3.min.js"> </script>
<script src="public/admin/bootstrap/js/bootstrap.min.js" type="text/javascript"> </script>
<script src="public/admin/plugins/input-mask/jquery.inputmask.js" type="text/javascript"></script>
<script src="public/admin/plugins/input-mask/jquery.inputmask.date.extensions.js" type="text/javascript"></script>
<script src="public/admin/plugins/input-mask/jquery.inputmask.extensions.js" type="text/javascript"></script>
<script src="public/admin/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
<script src="public/admin/plugins/timepicker/bootstrap-timepicker.min.js" type="text/javascript"></script>
<script src="public/admin/plugins/datatables/jquery.dataTables.js" type="text/javascript"> </script>
<script src="public/admin/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"> </script>
<script src="public/admin/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"> </script>
<script src='public/admin/plugins/fastclick/fastclick.min.js'> </script>
<script src="public/admin/dist/js/app.min.js" type="text/javascript"> </script>
<script src="public/admin/dist/js/d.js" type="text/javascript"> </script>
<script type="text/javascript">

    function granted(id){
        /* $('#nel'+id).click(
         function (id) {*/
        xhr = new XMLHttpRequest();
        if($('#nel'+id).is(':checked')){
            $('#neld'+id).css('background-color', 'rgba(255,0,0,0.18)');
            xhr.open("GET", "index.php?p=bloquer&ref="+id); /*+"type="+type*/
        }else{
            $('#neld'+id).css('background-color', 'rgb(255,255,255)');
            xhr.open("GET", "index.php?p=grant&ref="+id); /*+"type="+type*/
        }
        xhr.send();
        /*}
         );*/
    }


    $(function () {

        <?php require dirname(__DIR__) . '/photoChanger.php' ?>

        <?php
        foreach($allForUser as $person):
        if($person->bloquer){
        ?>
        $('#neld'+<?= $person->id ?>).css('background-color', 'rgba(255,0,0,0.18)');
        <?php
        }
        endforeach;
        ?>


        //Le second paramètre ici est le nom de la page qui reçoit la requête ajax. Ici on lui passe des paramètres en plus

        /*        xhr.onreadystatechange = function()
         {
         if(xhr.readyState == 4 && xhr.status == 200){

         document.getElementById("resultat"+id).innerHTML = xhr.responseText;


         }
         }
         */




        $("#example1").dataTable();
        $('#example2').dataTable({
            "bPaginate": true,
            "bLengthChange": false,
            "bFilter": false,
            "bSort": true,
            "bInfo": true,
            "bAutoWidth": false
        });


        //Datemask dd/mm/yyyy
        $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
        //Datemask2 mm/dd/yyyy
        $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
        //Money Euro
        $("[data-mask]").inputmask();

        //Date range picker
        $('#reservation').daterangepicker();
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
        //Date range as a button
        $('#daterange-btn').daterangepicker(
            {
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract('days', 1), moment().subtract('days', 1)],
                    'Last 7 Days': [moment().subtract('days', 6), moment()],
                    'Last 30 Days': [moment().subtract('days', 29), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract('month', 1).startOf('month'), moment().subtract('month', 1).endOf('month')]
                },
                startDate: moment().subtract('days', 29),
                endDate: moment()
            },
            function (start, end) {
                $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
            }
        );

        //iCheck for checkbox and radio inputs
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
            checkboxClass: 'icheckbox_minimal-blue',
            radioClass: 'iradio_minimal-blue'
        });
        //Red color scheme for iCheck
        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
            checkboxClass: 'icheckbox_minimal-red',
            radioClass: 'iradio_minimal-red'
        });
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
            checkboxClass: 'icheckbox_flat-green',
            radioClass: 'iradio_flat-green'
        });

        //Colorpicker
        $(".my-colorpicker1").colorpicker();
        //color picker with addon
        $(".my-colorpicker2").colorpicker();

        //Timepicker
        $(".timepicker").timepicker({
            showInputs: false
        });
    });

    $("#saing").click(
        function (e) {
            e.preventDefault();
            $("#privilege").submit();
        }
    );
</script>
<script type="text/javascript">
    $("#appl").hide();
    $("#newFile").click(function () {
        $("#newFile").hide("linear");
        $("#appl").show("linear");
    });
</script>
</body>
</html>
