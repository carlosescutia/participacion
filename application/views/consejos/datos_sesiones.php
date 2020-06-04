<div class="card mt-0 mb-3">
    <div class="card-header" style="background-color:#E6D9FA">
        <strong>Sesiones</strong>
    </div>
    <div class="card-body p-0">
        <div class="col-md-12">
            <?php if ($error_sesiones): ?>
            <p class="text-danger"><?php echo $error_sesiones ?></p>
            <?php endif ?>
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col">Sesion</th>
                        <th scope="col">Fecha</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($sesiones as $sesiones_item) { ?>
                    <tr>
                        <td><a href="<?= base_url() ?>sesiones/detalle/<?= $sesiones_item['cve_sesion'] ?>/<?= $consejos['cve_consejo'] ?>">Sesión <?= $sesiones_item['num_sesion'] ?> <?= $sesiones_item['tipo'] =='o' ? 'ordinaria' : 'extraordinaria'; ?></a></td>
                        <td><?= date('d/m/y', strtotime($sesiones_item['fecha'])) ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php if ($usuario_rol !== 'Administrador') { ?>
    <div class="card-footer">
        <form method="post" action="<?= base_url() ?>sesiones/guardar/<?= $consejos['cve_consejo'] ?>">
                <button type="submit" class="btn btn-primary">Nueva sesión</button>
        </form>
    </div>
    <?php } ?>
</div>

