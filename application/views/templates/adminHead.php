<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>MiniCRM</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/template/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/template/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/template/bower_components/Ionicons/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/template/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/template/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect. -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/template/dist/css/skins/skin-blue.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
    <!-- jQuery 3 -->
    <script src="<?php echo base_url(); ?>assets/template/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="<?php echo base_url(); ?>assets/template/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url(); ?>assets/template/dist/js/adminlte.min.js"></script>

</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <!-- Main Header -->
        <header class="main-header">

            <!-- Logo -->
            <a href="#" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini">CRM</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg">MiniCRM</span>
            </a>

            <!-- Header Navbar -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>                
            </nav>
        </header>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">

            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">                

                <!-- search form (Optional) -->                
                <form id="searchForm" method="POST"  action="<?php echo base_url(); ?>index.php/company/company/searchcompany" class="sidebar-form">
                    <div class="input-group">
                        <input type="text" name="search_value" id="search_value" class="form-control" placeholder="Keresés cégnév szerint...">
                        <span class="input-group-btn"><button type="submit" name="search_btn" id="search_btn" class="btn btn-flat"><i class="fa fa-search"></i></button></span>
                </form>
                                                
                    </div>               
                
                <!-- /.search form -->

                <!-- Sidebar Menu -->
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">MENÜ</li>
                    <!-- Optionally, you can add icons to the links -->
                    <li><a href="<?php echo base_url(); ?>index.php/adminhome"><i class="fa fa-link"></i> <span>Főoldal</span></a></li>
                    <li class="treeview">
                        <a href="#"><i class="fa fa-link"></i> <span>Cég kategóriák</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
                        <ul class="treeview-menu">
                            <li><a href="<?php echo base_url(); ?>index.php/category/category">Kategóriák listája</a></li>
                            <li><a href="<?php echo base_url(); ?>index.php/category/category/createcategory">Új kategória</a></li>                            
                        </ul>
                    </li>                    
                    <li class="treeview">
                        <a href="#"><i class="fa fa-link"></i> <span>Cégek</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
                        <ul class="treeview-menu">
                            <li><a href="<?php echo base_url(); ?>index.php/company/company">Cégek listája</a></li>
                            <li><a href="<?php echo base_url(); ?>index.php/company/company/createcompany">Új cég</a></li>                            
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#"><i class="fa fa-link"></i> <span>Felhasználók</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
                        <ul class="treeview-menu">
                            <li><a href="<?php echo base_url(); ?>index.php/user/user">Felhasználók listája</a></li>
                            <li><a href="<?php echo base_url(); ?>index.php/user/user/adduser">Új felhasználó</a></li>                            
                        </ul>
                    </li>
                    <li><a href="<?php echo base_url(); ?>index.php/login/logout"><i class="fa fa-link"></i> <span>Kilépés</span></a></li>
                </ul>
                <!-- /.sidebar-menu -->
            </section>
            <!-- /.sidebar -->
        </aside>
        <script>
        $("button#search_btn").click(function() {

            if($("input#search_value").val() === '') {
                $("form#searchForm").attr("action", "");
                alert('Kérem, adjon meg egy keresőszót!');
                return;
            }            
        });        
        </script>