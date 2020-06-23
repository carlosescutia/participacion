<div class="card mt-0 mb-3">
    <div class="card-header" style="background-color:#E6D9FA">
        <div class="row">
            <div class="col-md-10">
                <strong>Acuerdos</strong>
            </div>
        </div>
    </div>
    <div class="card-body p-0">
        <div class="col-md-12">
            <?php if ($error_acuerdos_sesion): ?>
            <p class="text-danger"><?php echo $error_acuerdos_sesion ?></p>
            <?php endif ?>
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col">Codigo</th>
                        <th scope="col">Acuerdo</th>
                        <th scope="col">Observaciones</th>
                        <th scope="col">Acceso</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($acuerdos_sesion as $acuerdos_sesion_item) { 
                        switch( $acuerdos_sesion_item['cve_status'] ) {
                            case "1":
                                $color = 'amarillo';
                                break;
                            case "2":
                                $color = 'verde';
                                break;
                            case "3":
                                $color = 'rojo';
                                break;
                            case "4":
                                $color = 'negro';
                                break;
                        }
                    ?>
                    <tr>
                        <td><?= $acuerdos_sesion_item['codigo_acuerdo'] ?></td>
                        <td><a href="<?=base_url()?>acuerdos_sesion/detalle/<?=$acuerdos_sesion_item['cve_acuerdo']?>/<?=$acuerdos_sesion_item['cve_sesion']?>/<?=$acuerdos_sesion_item['cve_consejo']?>"><?= $acuerdos_sesion_item['nom_acuerdo'] ?></a></td>
                        <td><?= $acuerdos_sesion_item['observaciones'] ?></td>
                        <td><?= substr($acuerdos_sesion_item['nom_acceso'],0,4) ?></td>
                        <td><span class="semaforo <?=$color?>"></span> <?= $acuerdos_sesion_item['nom_status'] ?></td>
                        <?php if ($cve_rol == 'usr') { ?>
                            <td><a style="color: #f00" href="<?= base_url() ?>acuerdos_sesion/eliminar_registro/<?= $acuerdos_sesion_item['cve_acuerdo'] ?>/<?= $acuerdos_sesion_item['cve_sesion'] ?>/<?= $acuerdos_sesion_item['cve_consejo'] ?>"><span data-feather="x-circle"></span></a>
                            </td>
                        <?php } ?>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer">
        <div class="row">
            <div class="col-md-10">
                <?php if ($cve_rol == 'usr') { ?>
                <form method="post" action="<?= base_url() ?>acuerdos_sesion/guardar/<?=$sesiones['cve_sesion']?>/<?=$sesiones['cve_consejo']?>">
                    <div class="form-row">
                        <div class="col-md-1">
                            <button type="submit" class="btn btn-primary">Nuevo acuerdo</button>
                        </div>
                    </div>
                </form>
                <?php } ?>
            </div>
            <div class="col-md-2 text-right">
                <a href="<?=base_url()?>reportes/reporte_acuerdos/<?=$sesiones['cve_sesion']?>/<?=$sesiones['cve_consejo']?>" class="btn btn-primary">Generar reporte</a>
            </div>
        </div>
    </div>
</div>


