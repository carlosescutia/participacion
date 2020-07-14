<div class="card mt-0 mb-3">
    <div class="card-header" style="background-color:#E6D9FA">
        <div class="row">
            <div class="col-md-10">
                <strong>Acuerdos generales</strong>
            </div>
        </div>
    </div>
    <div class="card-body p-0">
        <div class="col-md-12">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col">Codigo</th>
                        <th scope="col">Acuerdo</th>
                        <th scope="col">Observaciones</th>
                        <th scope="col">Responsable</th>
                        <th scope="col">Avance</th>
                        <th scope="col">Acceso</th>
                        <th scope="col">Fecha acuerdo</th>
                        <th scope="col">Fecha compromiso</th>
                        <th scope="col">Fecha cumplimiento</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($acuerdos_sesion as $acuerdos_sesion_item) { ?>
                        <?php if ($acuerdos_sesion_item['solicitud_iplaneg'] != 's') { ?>
                            <tr>
                                <td><?= $acuerdos_sesion_item['codigo_acuerdo'] ?></td>
                                <td><?= $acuerdos_sesion_item['nom_acuerdo'] ?></td>
                                <td><?= $acuerdos_sesion_item['observaciones'] ?></td>
                                <td><?= $acuerdos_sesion_item['responsable'] ?></td>
                                <td><?= $acuerdos_sesion_item['porcentaje_avance'] ?> %</td>
                                <td><?= $acuerdos_sesion_item['nom_acceso'] ?></td>
                                <td><?= empty($acuerdos_sesion_item['fecha_acuerdo']) ? '' : date('d/m/y', strtotime($acuerdos_sesion_item['fecha_acuerdo'])) ?></td>
                                <td><?= empty($acuerdos_sesion_item['fecha_compromiso']) ? '' : date('d/m/y', strtotime($acuerdos_sesion_item['fecha_compromiso'])) ?></td>
                                <td><?= empty($acuerdos_sesion_item['fecha_cumplimiento']) ? '' : date('d/m/y', strtotime($acuerdos_sesion_item['fecha_cumplimiento'])) ?></td>
                                <td><?= $acuerdos_sesion_item['nom_status'] ?></td>
                            </tr>
                        <?php } ?>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
