<main role="main" class="ml-sm-auto px-4">

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
            <div class="col-md-7">
                <?php include "datos_integrantes.php" ?>
            </div>
            <div class="col-md-5">
                <?php include "datos_sesiones.php" ?>
            </div>
        </div>
        <hr />
        <div class="row">
            <div class="col-md-12">
                <?php include "proyectos_consejo.php" ?>
            </div>
        </div>
        <hr />
        <div class="row">
            <div class="col-md-8">
                <?php include "calendario_sesiones.php" ?>
            </div>
            <div class="col-md-4">
                <?php include "adjuntos_consejo.php" ?>
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
