<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>AdviseExpert - Teszt</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/template/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/template/bower_components/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
</head>

<body>
    <span id="baseUrl" class="baseData"><?php echo base_url(); ?></span>
    <span id="validationStatus" class="baseData"></span>
    <div id="wrapperLogin" class="container-fluid">
        <div class="row">
            <div class="col-md-4"></div>
            <div id="loginForm" class="col-md-4">
                <h1>Üdvözlöm!</h1>
                <p>Kérem, adja meg a belépési adatait!</p>
                <div class="alert alert-danger fail" role="alert"></div>
                <div class="box box-info">
                    <form class="form-horizontal">
                        <div class="box-body">
                            <div class="form-group">
                                <div class="col-sm-10">
                                    <input type="email" class="form-control valid" id="email" name="email" placeholder="E-mail" />
                                    <div id="loginAlert" class="alert alert-danger alertMsg">Kérem, adjon meg egy érvényes e-mail címet!</div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-10">
                                    <input type="password" class="form-control valid" id="pass" name="pass" placeholder="Jelszó" />
                                    <div id="loginAlert" class="alert alert-danger alertMsg">Kérem, adja meg a jelszavát!</div>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </form>
                    <div class="box-footer">
                        <button class="btn btn-info send">Belépés</button>
                    </div>
                    <!-- /.box-footer -->
                </div>
                <!-- /.box -->
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
    <script src="<?php echo base_url(); ?>assets/template/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/template/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/validation.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/login.js"></script>
</body>

</html>