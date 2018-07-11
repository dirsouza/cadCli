<?php $link = strip_tags($_SERVER['REQUEST_URI'])?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>CADCli</title>
    <link rel="shortcut icon" href="/assets/img/logo.ico" type="image/x-icon">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="/lib/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/lib/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="/lib/Ionicons/css/ionicons.min.css">
    <!-- FullCalendar -->
    <link rel="stylesheet" href="/lib/fullcalendar/fullcalendar.min.css">
    <link rel="stylesheet" href="/lib/fullcalendar/fullcalendar.print.min.css" media="print">
    <!-- Datatables -->
    <link rel="stylesheet" href="/lib/datatables/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="/lib/datatables/extensions/responsive/css/responsive.bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/assets/css/AdminLTE.min.css">
    <!-- AdminLTE Skins -->
    <link rel="stylesheet" href="/assets/css/skin-blue.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="/" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <img class="logo-mini" src="/assets/img/cadcli.png" alt="CADCli" style="width: 50px; margin-top: 6px;">
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg">
                <img src="/assets/img/logo-h.fw.png" alt="CADCli" style="width: 170px;">
            </span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="/assets/img/person/<?= (!empty($desPhoto)) ? $desPhoto : 'user.png' ?>" class="user-image" alt="User Image">
                            <span class="hidden-xs">
                                <?php
                                    $name = explode(' ', $desName);
                                    echo $name[0];
                                ?>
                            </span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="/assets/img/person/<?= (!empty($desPhoto)) ? $desPhoto : 'user.png' ?>" class="img-circle" alt="User Image">
                                <p>
                                    <?= $desName ?>
                                    <small>Membro desde <?= date('M. y', strtotime($dtRegister)) ?></small>
                                </p>
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="/admin/person" class="btn btn-primary btn-flat" style="width: 100px">Perfil</a>
                                </div>
                                <div class="pull-right">
                                    <a href="/logout" class="btn btn-primary btn-flat" style="width: 100px">Sair</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">MENU</li>
                <li>
                    <a href="/admin">
                        <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                    </a>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-users"></i>
                        <span>Cadastro de Clientes</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="/admin/client"><i class="fa fa-user"></i> Cliente</a></li>
                        <li><a href="/admin/company"><i class="fa fa-briefcase"></i> Empresa</a></li>
                    </ul>
                </li>
                <li>
                    <a href="/admin/users">
                        <i class="fa fa-user-secret"></i> <span>Usuários</span>
                    </a>
                </li>
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>
