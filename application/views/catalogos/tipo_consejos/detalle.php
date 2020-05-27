<main role="main" class="ml-sm-auto px-4">

    <form method="post" action="<?= base_url() ?>tipo_consejos/guardar/<?= $tipo_consejos['cve_tipo'] ?>">

        <div class="col-md-12 mb-3 pb-2 pt-3 border-bottom">
            <div class="row">
                <div class="col-md-10">
                    <h1 class="h2">Editar tipo de consejo</h1>
                </div>
                <div class="col-md-2 text-right">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group row">
                <label for="cve_tipo" class="col-sm-2 col-form-label">Clave</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="cve_tipo" id="cve_tipo" value="<?=$tipo_consejos['cve_tipo'] ?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="nom_tipo" class="col-sm-2 col-form-label">Nombre</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="nom_tipo" id="nom_tipo" value="<?=$tipo_consejos['nom_tipo'] ?>">
                </div>
            </div>
        </div>

    </form>


    <hr />

    <div class="form-group row">
        <div class="col-sm-10">
            <a href="<?=base_url()?>tipo_consejos/lista" class="btn btn-secondary">Volver</a>
        </div>
    </div>

</main>

