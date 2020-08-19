<main role="main" class="ml-sm-auto px-4 mb-3 col-print-12">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <div class="col-sm-12 alternate-color">
            <div class="row">
                <div class="col-sm-8 text-left">
                    <h1 class="h2">Reporte de Proyectos</h1>
                </div>
                <div class="col-sm-4 text-right">
                    <a href="<?=base_url()?>reportes/reporte_proyectos_01_csv" class="btn btn-primary">Exportar a excel</a>
					<a href="javascript:window.print()" class="btn btn-primary">Generar pdf</a>
                </div>
            </div>
        </div>
    </div>

    <div style="min-height: 46vh">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th scope="col">Comisión/consejo</th>
                            <th scope="col">Responsable</th>
                            <th scope="col">Objetivo plan accion Gto</th>
                            <th scope="col">Proyecto/iniciativa</th>
                            <th scope="col">Grado de preparación</th>
                            <th scope="col">Calificación</th>
                            <th scope="col">Plazo</th>
                            <th scope="col">Atingencia</th>
                            <th scope="col">Calificación</th>
                            <th scope="col">Objetivo proyecto</th>
                            <th scope="col">Indicadores</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($proyectos as $proyectos_item) { ?>
                        <tr>
                            <td><?= $proyectos_item['nom_consejo'] ?></td>
                            <td><?= $proyectos_item['responsable'] ?></td>
                            <td><?= $proyectos_item['nom_objetivo'] ?></td>
                            <td><?= $proyectos_item['nom_proyecto'] ?></td>
                            <td><?= $proyectos_item['valor_grado_preparacion'] ?></td>
                            <td><?= $proyectos_item['calif_grado_preparacion'] ?></td>
                            <td><?= $proyectos_item['nom_plazo'] ?></td>
                            <td><?= $proyectos_item['valor_atingencia'] ?></td>
                            <td><?= $proyectos_item['calif_atingencia'] ?></td>
                            <td><?= $proyectos_item['objetivos'] ?></td>
                            <td><?= $proyectos_item['indicadores'] ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</main>
