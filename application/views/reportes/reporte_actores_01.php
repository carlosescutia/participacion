<main role="main" class="ml-sm-auto px-4 mb-3 col-print-12">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <div class="col-sm-12 alternate-color">
            <div class="row">
                <div class="col-sm-8 text-left">
                    <h1 class="h2">Reporte de Actores</h1>
                </div>
                <div class="col-sm-4 text-right">
                    <a href="<?=base_url()?>reportes/reporte_actores_01_csv" class="btn btn-primary">Exportar a excel</a>
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
                            <th scope="col">Nombre</th>
                            <th scope="col">Municipio</th>
                            <th scope="col">Dependencia</th>
                            <th scope="col">Area</th>
                            <th scope="col">Sexo</th>
                            <th scope="col">Sector</th>
                            <th scope="col">Estructuras</th>
                            <th scope="col">Naturaleza de la participación</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($actores as $actores_item) { ?>
                        <tr>
                            <td><?= $actores_item['nombre'] ?> <?= $actores_item['apellido_pa'] ?> <?= $actores_item['apellido_ma'] ?></td>
                            <td><?= $actores_item['nom_mun'] ?></td>
                            <td><?= $actores_item['dependencia'] ?></td>
                            <td><?= $actores_item['area'] ?></td>
                            <td><?= $actores_item['sexo'] ?></td>
                            <td><?= $actores_item['nom_sector'] ?></td>
                            <td><?= $actores_item['consejos'] ?></td>
                            <td><?= $actores_item['nom_tipo'] ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</main>
