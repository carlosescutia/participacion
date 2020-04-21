<div class="card mt-0 mb-3">
    <div class="card-header" style="background-color:#E6D9FA">
        <strong>Calendario de sesiones</strong>
    </div>
    <div class="card-body p-0">
        <div class="col-md-12">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col">Consejo</th>
                        <th scope="col">Sesión</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Hora</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($calendario_sesiones as $calendario_sesiones_item) { ?>
                    <tr>
                        <td><?= $calendario_sesiones_item['nom_consejo'] ?></td>
                        <td><?= $calendario_sesiones_item['nom_sesion'] ?></td>
                        <td><?= date('d/m/y', strtotime($calendario_sesiones_item['fecha'])) ?></td>
                        <td><?= $calendario_sesiones_item['hora'] ?></td>
                        <td><?= $calendario_sesiones_item['nom_status'] ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


