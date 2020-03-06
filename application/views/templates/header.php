<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="<?php echo base_url('img/favicon.ico'); ?>" sizes="16x16" type="image/png" />

        <title>Titulo del sistema</title>

        <!-- custom css -->
        <link rel="stylesheet" type="text/css" href="<?=base_url()?>css/base.css" />
        <link rel="stylesheet" type="text/css" href="<?=base_url()?>css/print.css" media="print" />

        <!-- Font awesome -->
        <link rel="stylesheet" type="text/css" href="<?=base_url()?>css/fonts/fontawesome/css/fontawesome.min.css" />
        <link rel="stylesheet" type="text/css" href="<?=base_url()?>css/fonts/fontawesome/css/brands.min.css" />
        <link rel="stylesheet" type="text/css" href="<?=base_url()?>css/fonts/fontawesome/css/solid.min.css" />

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/cupertino/jquery-ui.css"/>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <script src="https://npmcdn.com/tether@1.2.4/dist/js/tether.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

        <!-- bootstrap-combobox -->
        <script src="<?=base_url()?>/js/bootstrap-combobox.js"></script>
        <link rel="stylesheet" type="text/css" href="<?=base_url()?>css/bootstrap-combobox.css" />
    </head>
    <body>
        <nav class="navbar navbar-expand-sm navbar-dark fixed-top d-print-block">
            <!-- logo -->
            <div class="logo_menu">
                <img class="logo" src="<?=base_url()?>img/gto_iplaneg.png" class="d-inline-block align-top" alt="iplaneg">
            </div> <!-- logo -->

            <!-- boton para menu colapsado (pantallas pequeñas) -->
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarCollapse" >
                <span class="navbar-toggler-icon"></span>
            </button> <!-- boton menu -->

            <!-- opciones del menu -->
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="col-sm-6 mr-5">
                    <h5 class="my-0 mr-md-auto font-weight-normal text-white">Titulo del sistema</h5>
                    <h7 class="my-0 mr-md-auto font-weight-normal text-white">Subtitulo del sistema</h7>
                </div>
                <p class="m-2 text-white"><?php echo $usuario_nombre ?></a>
                <p class="m-2 text-white">·</a>
                <p class="m-2 text-white"><?php echo $usuario_dependencia ?></a>
                <p class="m-2 text-white">|</a>
                <a class="m-2 text-white" href="<?= base_url() ?>inicio/cerrar_sesion">Cerrar sesión</a>
            </div> <!-- opciones del menu -->
        </nav>
        <div class="container-fluid">
            <div class="row">
                <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                    <div class="sidebar-sticky">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                            <a class="nav-link" href="<?=base_url()?>inicio">
                                    <span data-feather="home"></span>
                                    Inicio <span class="sr-only">(current)</span>
                                </a>
                            </li>
                            <li>
                            <a class="nav-link" href="<?=base_url()?>actores/lista">
                                    <span data-feather="user"></span>
                                    Actores
                                </a>
                            </li>
                            <li>
                                <a class="nav-link" href="<?=base_url()?>consejos/lista">
                                    <span data-feather="users"></span>
                                    Consejos
                                </a>
                            </li>
                            <li>
                                <a class="nav-link" href="<?=base_url()?>reportes/lista">
                                    <span data-feather="file"></span>
                                    Reportes
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
