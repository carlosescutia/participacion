<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Inicio</h1>
    </div>
    <div class="row">
        <div class="col-md-8">
            <div class="col-md-12">
                <?php include "bienvenida.php"; ?>
            </div>

            <hr />

            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6">
                        <?php include "datos_actores.php"; ?>
                    </div>
                    <div class="col-md-6">
                        <?php include "datos_consejos.php"; ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3 ml-5">
            <img src="<?=base_url();?>img/participacion_social_inicio.jpg" class="img-fluid rounded">
        </div>

    </div>

    <hr />

</main>
