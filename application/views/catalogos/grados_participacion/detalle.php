<main role="main" class="ml-sm-auto px-4">

    <form method="post" action="<?= base_url() ?>grados_participacion/guardar/<?= $grados_participacion['cve_grado_participacion'] ?>">

        <div class="col-md-12 mb-3 pb-2 pt-3 border-bottom">
            <div class="row">
                <div class="col-md-10">
                    <h1 class="h2">Editar grado de participación</h1>
                </div>
                <div class="col-md-2 text-right">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group row">
                <label for="cve_grado_participacion" class="col-sm-2 col-form-label">Clave</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="cve_grado_participacion" id="cve_grado_participacion" value="<?=$grados_participacion['cve_grado_participacion'] ?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="nom_grado_participacion" class="col-sm-2 col-form-label">Nombre</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="nom_grado_participacion" id="nom_grado_participacion" value="<?=$grados_participacion['nom_grado_participacion'] ?>">
                </div>
            </div>
        </div>

    </form>


    <hr />

    <div class="form-group row">
        <div class="col-sm-10">
            <a href="<?=base_url()?>grados_participacion/lista" class="btn btn-secondary">Volver</a>
        </div>
    </div>

</main>

