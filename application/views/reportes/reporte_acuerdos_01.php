<main role="main" class="ml-sm-auto px-4 mb-3 col-print-12">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <div class="col-sm-12 alternate-color">
            <div class="row">
                <div class="col-sm-8 text-left">
                    <h1 class="h2">Acuerdos de la sesión</h1>
                </div>
                <div class="col-sm-4 text-right">
                    <a href="<?=base_url()?>reportes/reporte_acuerdos_csv/<?=$sesion['cve_sesion'] ?>/<?=$consejo['cve_consejo'] ?>" class="btn btn-primary">Exportar a excel</a>
					<a href="javascript:window.print()" class="btn btn-primary">Generar pdf</a>
                </div>
            </div>
        </div>
    </div>

    <div style="min-height: 46vh">
        <div class="row">
            <div class="col-md-12">
                <h4><?=$consejo['nom_consejo']?> (<?=$consejo['siglas']?>)</h4>
                <h5>Sesión <?=$sesion['num_sesion']?> <?= $sesion['tipo'] == 'o' ? 'ordinaria' : 'extraordinaria' ?>, <?=$sesion['lugar']?>, <?= date('d/m/y', strtotime($sesion['fecha'])) ?></h5>
                <br />
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mt-3">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th scope="col">Codigo</th>
                            <th scope="col">Acuerdo</th>
                            <th scope="col">Observaciones</th>
                            <th scope="col">Avance</th>
                            <th scope="col">Acceso</th>
                            <th scope="col">Fecha acuerdo</th>
                            <th scope="col">Fecha compromiso</th>
                            <th scope="col">Fecha cumplimiento</th>
                            <th scope="col">Causa cancelación</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($acuerdos_sesion as $acuerdos_sesion_item) { ?>
                        <tr>
                            <td><?= $acuerdos_sesion_item['codigo_acuerdo'] ?></td>
                            <td><?= $acuerdos_sesion_item['nom_acuerdo'] ?></td>
                            <td><?= $acuerdos_sesion_item['observaciones'] ?></td>
                            <td><?= $acuerdos_sesion_item['porcentaje_avance'] ?> %</td>
                            <td><?= $acuerdos_sesion_item['nom_acceso'] ?></td>
                            <td><?= empty($acuerdos_sesion_item['fecha_acuerdo']) ? '' : date('d/m/y', strtotime($acuerdos_sesion_item['fecha_acuerdo'])) ?></td>
                            <td><?= empty($acuerdos_sesion_item['fecha_compromiso']) ? '' : date('d/m/y', strtotime($acuerdos_sesion_item['fecha_compromiso'])) ?></td>
                            <td><?= empty($acuerdos_sesion_item['fecha_cumplimiento']) ? '' : date('d/m/y', strtotime($acuerdos_sesion_item['fecha_cumplimiento'])) ?></td>
                            <td><?= $acuerdos_sesion_item['causa_cancelado'] ?></td>
                            <td><?= $acuerdos_sesion_item['nom_status'] ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <hr />

    <div class="form-group row">
        <div class="col-sm-10">
            <a href="<?=base_url()?>sesiones/detalle/<?=$sesion['cve_sesion'] ?>/<?=$consejo['cve_consejo'] ?>" class="btn btn-secondary">Volver</a>
        </div>
    </div>

</main>


