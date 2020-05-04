<main role="main" class="ml-sm-auto px-4 mb-3 col-print-12">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <div class="col-sm-12 alternate-color">
            <div class="row">
                <div class="col-sm-8 text-left">
                    <h1 class="h2">Reporte de Consejos</h1>
                </div>
                <div class="col-sm-4 text-right">
                    <a href="<?=base_url()?>reportes/reporte_consejos_01_csv" class="btn btn-primary">Exportar a excel</a>
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
                            <th scope="col">Eje</th>
                            <th scope="col">Dependencia</th>
                            <th scope="col">Sesiones anuales</th>
                            <th scope="col">Sesiones</th>
                            <th scope="col">Integrantes</th>
                            <th scope="col">Tipo</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($consejos as $consejos_item) { ?>
                        <tr>
                            <td><?= $consejos_item['nom_consejo'] ?></td>
                            <td><?= $consejos_item['nom_eje'] ?></td>
                            <td><?= $consejos_item['dependencia'] ?></td>
                            <td class="text-center"><?= $consejos_item['sesiones_anuales'] ?></td>
                            <td><?= $consejos_item['sesiones'] ?></td>
                            <td><?= $consejos_item['integrantes'] ?></td>
                            <td><?= $consejos_item['nom_tipo'] ?></td>
                            <td><?= $consejos_item['nom_status'] ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</main>

