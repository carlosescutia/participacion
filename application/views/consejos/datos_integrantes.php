<div class="card mt-0 mb-3">
    <div class="card-header" style="background-color:#E6D9FA">
        <strong>Integrantes</strong>
    </div>
    <div class="card-body p-0">
        <div class="col-md-12">
            <?php if ($error_integrantes): ?>
            <p class="text-danger"><?php echo $error_integrantes ?></p>
            <?php endif ?>
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col">Actor</th>
                        <th scope="col">Cargo</th>
                        <th scope="col">Periodo</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($consejos_actores as $consejos_actores_item) { ?>
                    <tr>
                        <td><?= $consejos_actores_item['nom_actor'] ?></td>
                        <td><?= $consejos_actores_item['nom_cargo'] ?></td>
                        <td><?= date('d/m/y', strtotime($consejos_actores_item['fecha_inicio'])) ?> a <?= date('d/m/y', strtotime($consejos_actores_item['fecha_fin'])) ?></td>
                        <td><?= $consejos_actores_item['nom_status'] ?></td>
                        <?php if ($usuario_rol !== 'Administrador') { ?>
                        <td><a style="color: #f00" href="<?= base_url() ?>consejos_actores/eliminar_registro/<?= $consejos_actores_item['cve_consejo'] ?>/<?= $consejos_actores_item['cve_actor'] ?>/<?= $consejos_actores_item['cve_cargo'] ?>/<?= $consejos_actores_item['fecha_inicio'] ?>/<?= $consejos_actores_item['fecha_fin'] ?>/<?= $consejos_actores_item['status'] ?>"><span data-feather="x-circle"></span></a>
                        <?php } ?>
                        </div>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php if ($usuario_rol !== 'Administrador') { ?>
    <div class="card-footer">
        <form method="post" action="<?= base_url() ?>consejos_actores/guardar">
            <div class="row">
                <div class="col">
                    <select class="custom-select" name="cve_actor" id="cve_actor">
                        <option value="">Actor</option>
                        <?php foreach ($actores as $actores_item) { ?>
                        <option value="<?= $actores_item['cve_actor'] ?>"><?= $actores_item['nombre'] ?> <?= $actores_item['apellido_pa'] ?> <?= $actores_item['apellido_ma'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col">
                    <select class="custom-select" name="cve_cargo" id="cve_cargo">
                        <option value="">Cargo</option>
                        <?php foreach ($cargos as $cargos_item) { ?>
                        <option value="<?= $cargos_item['cve_cargo'] ?>"><?= $cargos_item['nom_cargo'] ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <input type="hidden" name="cve_consejo" id="cve_consejo" value="<?= $consejos['cve_consejo'] ?>">
            <div class="row mt-3">
                <div class="col">
                    <input type="date" class="form-control" name="fecha_inicio" id="fecha_inicio">
                </div>
                <div class="col">
                    <input type="date" class="form-control" name="fecha_fin" id="fecha_fin">
                </div>
                <div class="col">
                    <select class="custom-select" name="status" id="status">
                        <option value="">Status</option>
                        <option value="1">Activo</option>
                        <option value="0">Inactivo</option>
                    </select>
                </div>
                <div class="col">
                    <button type="submit" class="btn btn-primary">Agregar</button>
                </div>
            </div>
        </form>
    </div>
    <?php } ?>
</div>
