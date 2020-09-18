<main role="main" class="ml-sm-auto px-4">

    <form method="post" action="<?= base_url() ?>sectores/guardar/<?= $sectores['cve_sector'] ?>">

        <div class="col-md-12 mb-3 pb-2 pt-3 border-bottom">
            <div class="row">
                <div class="col-md-10">
                    <h1 class="h2">Editar sector</h1>
                </div>
                <div class="col-md-2 text-right">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group row">
                <label for="cve_sector" class="col-sm-2 col-form-label">Clave</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="cve_sector" id="cve_sector" value="<?=$sectores['cve_sector'] ?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="nom_sector" class="col-sm-2 col-form-label">Nombre</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="nom_sector" id="nom_sector" value="<?=$sectores['nom_sector'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="cve_ambito" class="col-sm-2 col-form-label">Ámbito</label>
                <div class="col-sm-10">
                    <select class="custom-select" name="cve_ambito" id="cve_ambito">
                        <?php foreach ($ambitos as $ambitos_item) { ?>
                        <option value="<?= $ambitos_item['cve_ambito'] ?>" <?= ($sectores['cve_ambito'] == $ambitos_item['cve_ambito']) ? 'selected' : '' ?> ><?= $ambitos_item['nom_ambito'] ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
        </div>

    </form>


    <hr />

    <div class="form-group row">
        <div class="col-sm-10">
            <a href="<?=base_url()?>sectores/lista" class="btn btn-secondary">Volver</a>
        </div>
    </div>

</main>

