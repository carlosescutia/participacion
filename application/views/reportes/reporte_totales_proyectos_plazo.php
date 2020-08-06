<div class="card mt-0 mb-3">
    <div class="card-header" style="background-color:#E6D9FA">
        <div class="row">
            <div class="col-md-10">
                <strong>Totales por plazo</strong>
            </div>
        </div>
    </div>
    <div class="card-body p-0">
        <div class="col-md-12">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col">Plazo</th>
                        <th scope="col">Número de proyectos</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($proyectos_plazo as $proyectos_plazo_item) { ?>
                        <tr>
                            <td><?= $proyectos_plazo_item['nom_plazo'] ?></td>
                            <td><?= $proyectos_plazo_item['num_proyectos'] ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
