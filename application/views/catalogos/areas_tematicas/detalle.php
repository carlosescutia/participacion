<main role="main" class="ml-sm-auto px-4">

    <form method="post" action="<?= base_url() ?>areas_tematicas/guardar/<?= $areas_tematicas['cve_area_tematica'] ?>">

        <div class="col-md-12 mb-3 pb-2 pt-3 border-bottom">
            <div class="row">
                <div class="col-md-10">
                    <h1 class="h2">Editar area temática</h1>
                </div>
                <div class="col-md-2 text-right">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group row">
                <label for="cve_area_tematica" class="col-sm-2 col-form-label">Clave</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="cve_area_tematica" id="cve_area_tematica" value="<?=$areas_tematicas['cve_area_tematica'] ?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="nom_area_tematica" class="col-sm-2 col-form-label">Nombre</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="nom_area_tematica" id="nom_area_tematica" value="<?=$areas_tematicas['nom_area_tematica'] ?>">
                </div>
            </div>
        </div>

    </form>


    <hr />

    <div class="form-group row">
        <div class="col-sm-10">
            <a href="<?=base_url()?>areas_tematicas/lista" class="btn btn-secondary">Volver</a>
        </div>
    </div>

</main>

