<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">

    <div class="col-md-12 mb-3 pb-2 pt-3 border-bottom">
        <div class="row">
            <div class="col-md-4">
                <h1 class="h2">Datos del consejo</h1>
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <?php include "datos_consejo.php" ?>
    </div>

    <hr />
        
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-6">
                <?php include "datos_integrantes.php" ?>
            </div>
            <div class="col-md-6">
                <?php include "datos_sesiones.php" ?>
            </div>
        </div>
        <hr />
    </div>

    <hr />

    <div class="form-group row">
        <div class="col-sm-10">
            <a href="<?=base_url()?>consejos/lista" class="btn btn-secondary">Volver</a>
        </div>
    </div>

</main>

