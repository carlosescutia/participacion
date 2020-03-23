<div class="card mt-0 mb-3">
    <div class="card-header" style="background-color:#E6D9FA">
        <strong>Integrantes</strong>
    </div>
    <div class="card-body">
        <div class="col-md-6">
            <?php if ($error): ?>
            <p class="text-danger"><?php echo $error ?></p>
            <?php endif ?>
        </div>
        <div class="row">
        </div>
    </div>
    <div class="card-footer">
        <form method="post" action="<?= base_url() ?>consejos/guardar">
                <button type="submit" class="btn btn-primary">Agregar</button>
        </form>
    </div>
</div>
