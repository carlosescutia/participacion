<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="<?=base_url()?>img/favicon.png" sizes="16x16" type="image/png" />

        <title>Sistema de Participación y Colaboración Social</title>

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

        <!-- datatables -->
        <link href="<?=base_url()?>css/datatables.min.css" rel="stylesheet"/>
        <script src="<?=base_url()?>js/datatables.min.js"></script>

        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-9XLFF90V4W"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'G-9XLFF90V4W');
        </script>
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
                    <h5 class="my-0 mr-md-auto texto-titulo">Sistema de Participación y Colaboración Social</h5>
                    <hr class="mb-0 pb-0" />
                    <ul class="navbar-nav mr-auto">
                        <?php if (in_array('01', $accesos_sistema_rol)) { ?>
                        <li class="nav-item"><a class="nav-link" href="<?=base_url()?>inicio">Inicio</a></li>
                        <?php } ?>
                        <?php if (in_array('02', $accesos_sistema_rol)) { ?>
                        <li class="nav-item"><a class="nav-link" href="<?=base_url()?>actores/lista">Actores</a></li>
                        <?php } ?>
                        <?php if (in_array('03', $accesos_sistema_rol)) { ?>
                        <li class="nav-item"><a class="nav-link" href="<?=base_url()?>consejos/lista">Consejos</a></li>
                        <?php } ?>
                        <?php if (in_array('04', $accesos_sistema_rol)) { ?>
                        <li class="nav-item"><a class="nav-link" href="<?=base_url()?>reportes/lista">Reportes</a></li>
                        <?php } ?>
                        <?php if (in_array('05', $accesos_sistema_rol)) { ?>
                        <li class="nav-item"><a class="nav-link ml-5" href="<?=base_url()?>catalogos/lista">Catálogos</a></li>
                        <?php } ?>
                    </ul>
                </div>
                <div class="col-sm-5 text-right">
                    <p class="m-2 texto-titulo"><?php echo $usuario_nombre ?> · <?php echo $usuario_dependencia ?> <?php echo $usuario_area ?> | <a class="m-2 texto-titulo" href="<?= base_url() ?>inicio/cerrar_sesion">Cerrar sesión</a></p>
                </div>
            </div> <!-- opciones del menu -->
        </nav>
        <div class="container-fluid">
