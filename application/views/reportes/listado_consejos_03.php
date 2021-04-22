<main role="main" class="ml-sm-auto px-4 mb-3 col-print-12">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <div class="col-sm-12 alternate-color">
            <div class="row">
                <div class="col-sm-8 text-left">
                    <h1 class="h2">Listado de consejos y proyectos</h1>
                </div>
                <div class="col-sm-3 text-right">
                    <a href="<?=base_url()?>reportes/listado_consejos_03_csv" class="btn btn-primary">Exportar a excel</a>
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
                            <th scope="col">Consejo</th>
                            <th scope="col">Fecha instalación</th>
                            <th scope="col">Última sesión</th>
                            <th scope="col">Status consejo</th>
                            <th scope="col">Num sesiones</th>
                            <th scope="col">Total integrantes</th>
                            <th scope="col">Responsable Iplaneg</th>
                            <th scope="col">Total proyectos</th>
                            <th scope="col">Proyectos cumplidos</th>
                            <th scope="col">Proyectos no iniciados o en proceso</th>
                            <th scope="col">Proyectos cancelados</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($consejos as $consejos_item) { ?>
                        <tr>
                            <td><?= $consejos_item['nom_consejo'] ?></td>
                            <td><?= empty($consejos_item['fecha_instalacion']) ? '' : date('d/m/y', strtotime($consejos_item['fecha_instalacion'])) ?></td>
                            <td><?= $consejos_item['ultima_sesion'] ?></td>
                            <td><?= $consejos_item['nom_status_consejo'] ?></td>
                            <td><?= $consejos_item['num_sesiones'] ?></td>
                            <td><?= $consejos_item['num_integrantes'] ?></td>
                            <td><?= $consejos_item['responsable_iplaneg'] ?></td>
                            <td><?= $consejos_item['tot_proyectos'] ?></td>
                            <td><?= $consejos_item['proyectos_cumplidos'] ?></td>
                            <td><?= $consejos_item['proyectos_noiniciados_enproceso'] ?></td>
                            <td><?= $consejos_item['proyectos_cancelados'] ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <hr />
    </div>

</main>
