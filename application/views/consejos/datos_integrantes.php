<div class="card mt-0 mb-3">
    <div class="card-header" style="background-color:#E6D9FA">
        <strong>Integrantes</strong>
    </div>
    <div class="card-body p-0">
        <div class="col-md-12">
            <?php if ($error): ?>
            <p class="text-danger"><?php echo $error ?></p>
            <?php endif ?>
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col">Actor</th>
                        <th scope="col">Cargo</th>
                        <th scope="col">Periodo</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($consejos_actores as $consejos_actores_item) { ?>
                    <tr>
                        <td><?= $consejos_actores_item['nom_actor'] ?></td>
                        <td><?= $consejos_actores_item['nom_cargo'] ?></td>
                        <td><?= date('d/m/y', strtotime($consejos_actores_item['fecha_inicio'])) ?> a <?= date('d/m/y', strtotime($consejos_actores_item['fecha_fin'])) ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
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
