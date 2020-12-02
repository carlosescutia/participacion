<div class="card mt-0 mb-3">
    <div class="card-header" style="background-color:#E6D9FA">
        <div class="row">
            <div class="col-md-10">
                <strong>Participantes</strong>
            </div>
        </div>
    </div>
    <div class="card-body p-0">
        <div class="col-md-12">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col">Actor</th>
                        <th scope="col">Organización</th>
                        <th scope="col">Sector</th>
                        <th scope="col">Suplente</th>
                        <th scope="col">Asistencia</th>
                        <th scope="col">Participación</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($asistencia_sesion as $asistencia_sesion_item) { ?>
                    <tr>
                        <td><?= $asistencia_sesion_item['nom_actor'] ?></td>
                        <td><?= $asistencia_sesion_item['organizacion'] ?></td>
                        <td><?= $asistencia_sesion_item['nom_sector'] ?></td>
                        <td><?= $asistencia_sesion_item['nom_suplente'] ?></td>
                        <td><?= $asistencia_sesion_item['nom_asistencia'] ?></td>
                        <td><?= $asistencia_sesion_item['nom_grado_participacion'] ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
