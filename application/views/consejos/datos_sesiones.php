<div class="card mt-0 mb-3">
    <div class="card-header" style="background-color:#E6D9FA">
        <strong>Sesiones</strong>
    </div>
    <div class="card-body">
        <div class="col-md-6">
            <?php if ($error_sesiones): ?>
            <p class="text-danger"><?php echo $error_sesiones ?></p>
            <?php endif ?>
        </div>
        <div class="row">
        </div>
    </div>
    <div class="card-footer">
        <form method="post" action="<?= base_url() ?>consejos/guardar">
                <button type="submit" class="btn btn-primary">Nueva sesión</button>
        </form>
    </div>
</div>

