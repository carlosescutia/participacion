<div class="card mt-0 mb-3">
    <div class="card-header" style="background-color:#E6D9FA">
        <strong>Acuerdos</strong>
    </div>
    <div class="card-body p-0">
        <div class="col-md-12">
            <?php if ($error_acuerdos_sesion): ?>
            <p class="text-danger"><?php echo $error_acuerdos_sesion ?></p>
            <?php endif ?>
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col">Acuerdo</th>
                        <th scope="col">Observaciones</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($acuerdos_sesion as $acuerdos_sesion_item) { ?>
                    <tr>
                        <td><a href="<?=base_url()?>acuerdos_sesion/detalle/<?=$acuerdos_sesion_item['cve_acuerdo']?>/<?=$acuerdos_sesion_item['cve_sesion']?>/<?=$acuerdos_sesion_item['cve_consejo']?>"><?= $acuerdos_sesion_item['nom_acuerdo'] ?></a></td>
                        <td><?= $acuerdos_sesion_item['observaciones'] ?></td>
                        <td><?= $acuerdos_sesion_item['nom_status'] ?></td>
                        <?php if ($usuario_rol !== 'Administrador') { ?>
                            <td><a style="color: #f00" href="<?= base_url() ?>acuerdos_sesion/eliminar_registro/<?= $acuerdos_sesion_item['cve_acuerdo'] ?>/<?= $acuerdos_sesion_item['cve_sesion'] ?>/<?= $acuerdos_sesion_item['cve_consejo'] ?>"><span data-feather="x-circle"></span></a>
                            </td>
                        <?php } ?>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php if ($usuario_rol !== 'Administrador') { ?>
    <div class="card-footer">
    <form method="post" action="<?= base_url() ?>acuerdos_sesion/guardar/<?=$sesiones['cve_sesion']?>/<?=$sesiones['cve_consejo']?>">
            <div class="form-row">
                <div class="col-md-1">
                    <button type="submit" class="btn btn-primary">Nuevo acuerdo</button>
                </div>
            </div>
        </form>
    </div>
    <?php } ?>
</div>


