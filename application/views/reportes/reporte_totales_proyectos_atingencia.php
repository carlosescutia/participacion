<div class="card mt-0 mb-3">
    <div class="card-header" style="background-color:#E6D9FA">
        <div class="row">
            <div class="col-md-10">
                <strong>Totales por atingencia al programa de reactivación</strong>
            </div>
        </div>
    </div>
    <div class="card-body p-0">
        <div class="col-md-12">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col">Atingencia</th>
                        <th scope="col">Número de proyectos</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($proyectos_atingencia as $proyectos_atingencia_item) { ?>
                        <tr>
                            <td><?= $proyectos_atingencia_item['nom_atingencia'] ?></td>
                            <td><?= $proyectos_atingencia_item['num_proyectos'] ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
