<div class="card mt-0 mb-3">
    <div class="card-header" style="background-color:#E6D9FA">
        <strong>Acuerdos del consejo</strong>
    </div>
    <div class="card-body">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">Codigo</th>
                    <th scope="col">Acuerdo</th>
                    <th scope="col">Responsable</th>
                    <th scope="col">Fecha compromiso</th>
                    <th scope="col">Fecha cumplimiento</th>
                    <th scope="col">Involucra a Iplaneg</th>
                    <th scope="col">Status</th>
                    <th scope="col">Observaciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($acuerdos_consejo as $acuerdos_consejo_item) { 
                switch( $acuerdos_consejo_item['cve_status'] ) {
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
                    <td><?= $acuerdos_consejo_item['codigo_acuerdo'] ?></td>
                    <td><?= $acuerdos_consejo_item['nom_acuerdo'] ?></a></td>
                    <td><?= $acuerdos_consejo_item['responsable'] ?></a></td>
                    <td><?= $acuerdos_consejo_item['fecha_compromiso'] ?></a></td>
                    <td><?= $acuerdos_consejo_item['fecha_cumplimiento'] ?></a></td>
                    <td><?= $acuerdos_consejo_item['solicitud_iplaneg'] ?></td>
                    <td><span class="semaforo <?=$color?>"></span> <?= $acuerdos_consejo_item['nom_status'] ?></td>
                    <td><?= $acuerdos_consejo_item['observaciones'] ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
