<main role="main" class="ml-sm-auto px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2>Inicio</h2>
    </div>
    <div class="row">
        <div class="col-md-8">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <?php if (in_array('01001', $accesos_sistema_rol)) include "datos_calendario_sesiones.php"; ?>
                    </div>
                </div>
                <hr />
                <div class="row">
                    <div class="col-md-6">
                        <?php if (in_array('01002', $accesos_sistema_rol)) include "datos_actores.php"; ?>
                    </div>
                    <div class="col-md-6">
                        <?php if (in_array('01002', $accesos_sistema_rol)) include "datos_consejos.php"; ?>
                    </div>
                </div>
            </div>
            <hr />
            <div class="col-md-12">
                <?php include "bienvenida.php"; ?>
            </div>
        </div>

        <div class="col-md-3 ml-5">
            <img src="<?=base_url();?>img/participacion_social_inicio.jpg" class="img-fluid rounded">
        </div>

    </div>

    <hr />

</main>
