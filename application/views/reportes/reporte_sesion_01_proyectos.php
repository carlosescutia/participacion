<div class="card mt-0 mb-3">
    <div class="card-header" style="background-color:#E6D9FA">
        <div class="row">
            <div class="col-md-10">
                <strong>Status de los proyectos</strong>
            </div>
        </div>
    </div>
    <div class="card-body p-0">
        <div class="col-md-12">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Preparación</th>
                        <th scope="col">Plazo de ejecución</th>
                        <th scope="col">Objetivo definido?</th>
                        <th scope="col">Atingencia al prg de reactiv.</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($proyectos_consejo as $proyectos_consejo_item) { ?>
                    <tr>
                        <td><?= $proyectos_consejo_item['nom_proyecto'] ?></td>
                        <td><?= $proyectos_consejo_item['nom_preparacion'] ?></td>
                        <td><?= $proyectos_consejo_item['nom_plazo'] ?></td>
                        <td><?= $proyectos_consejo_item['objetivo_definido'] ?></td>
                        <td><?= $proyectos_consejo_item['nom_atingencia'] ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

