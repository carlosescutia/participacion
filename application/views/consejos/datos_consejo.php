<div class="card mt-0 mb-3">
    <div class="card-header" style="background-color:#E6D9FA">
        <strong>Datos básicos</strong>
    </div>
    <form method="post" action="<?= base_url() ?>indicadores_propios/guardar">
        <div class="card-body">
            <div class="col-md-12">
                <?php if ($error): ?>
                <p class="text-danger"><?php echo $error ?></p>
                <?php endif ?>
            </div>
            <div class="form-group row">
                <label for="nom_consejo col-sm-2 col-form-label">Nombre</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control border-primary" name="nom_consejo" id="nom_consejo" value="<?=$consejos['nom_consejo'] ?>">
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
    </form>
</div>
