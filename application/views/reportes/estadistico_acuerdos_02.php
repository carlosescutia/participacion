<main role="main" class="ml-sm-auto px-4 mb-3 col-print-12">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <div class="col-sm-12 alternate-color">
            <div class="row">
                <div class="col-sm-8 text-left">
                    <h1 class="h2">Estadístico de acuerdos por periodo</h1>
                </div>
                <div class="col-sm-4 text-right">
					<a href="javascript:window.print()" class="btn btn-primary">Generar pdf</a>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 align-self-center">
                    <form class="form-inline" method="post" action="<?= base_url() ?>reportes/estadistico_acuerdos_02">
                        <label class="mr-3" for="fecha_ini">Desde</label>
                        <div class="input-group mr-5">
                            <input type="date" class="form-control" name="fecha_ini" id="fecha_ini" value="<?= $fecha_ini ?>">
                        </div>
                        <label class="mr-3" for="fecha_fin">Hasta</label>
                        <div class="input-group mr-5">
                            <input type="date" class="form-control" name="fecha_fin" id="fecha_fin" value="<?= $fecha_fin ?>">
                        </div>
                        <div class="input-group ml-3">
                            <button class="btn btn-success btn-sm">Filtrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-8" style="min-height: 46vh">
        <div class="card mt-0 mb-3">
            <div class="card-header" style="background-color:#E6D9FA">
                <div class="row">
                    <div class="col-md-10">
                        <strong>Totales por status</strong>
                    </div>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="col-md-12">
                    <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th scope="col" class="text-left">Consejo</th>
                                <th scope="col" class="text-center">En curso</th>
                                <th scope="col" class="text-center">Cumplido</th>
                                <th scope="col" class="text-center">No cumplido</th>
                                <th scope="col" class="text-center">Cancelado</th>
                                <th scope="col" class="text-center">Total de acuerdos</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                              $sum_en_curso = 0;
                              $sum_cumplido = 0;
                              $sum_no_cumplido = 0;
                              $sum_cancelado = 0;
                              $sum_tot_acuerdos = 0;
                            ?>
                            <?php foreach ($acuerdos_periodo as $acuerdos_periodo_item) { ?>
                            <?php
                                $sum_en_curso = $sum_en_curso + $acuerdos_periodo_item['num_en_curso'];
                                $sum_cumplido = $sum_cumplido + $acuerdos_periodo_item['num_cumplido'];
                                $sum_no_cumplido = $sum_no_cumplido + $acuerdos_periodo_item['num_no_cumplido'];
                                $sum_cancelado = $sum_cancelado + $acuerdos_periodo_item['num_cancelado'];
                                $sum_tot_acuerdos = $sum_tot_acuerdos + $acuerdos_periodo_item['tot_acuerdos'];
                            ?>
                                <tr>
                                    <td class="text-left"><?= $acuerdos_periodo_item['nom_consejo'] ?></td>
                                    <td class="text-center"><?= $acuerdos_periodo_item['num_en_curso'] ?></td>
                                    <td class="text-center"><?= $acuerdos_periodo_item['num_cumplido'] ?></td>
                                    <td class="text-center"><?= $acuerdos_periodo_item['num_no_cumplido'] ?></td>
                                    <td class="text-center"><?= $acuerdos_periodo_item['num_cancelado'] ?></td>
                                    <td class="text-center font-weight-bold"><?= $acuerdos_periodo_item['tot_acuerdos'] ?></td>
                                </tr>
                            <?php } ?>
                            <tr>
                                <td class="text-left font-weight-bold">Total</td>
                                <td class="text-center font-weight-bold"><?= $sum_en_curso ?></td>
                                <td class="text-center font-weight-bold"><?= $sum_cumplido ?></td>
                                <td class="text-center font-weight-bold"><?= $sum_no_cumplido ?></td>
                                <td class="text-center font-weight-bold"><?= $sum_cancelado ?></td>
                                <td class="text-center font-weight-bold"><?= $sum_tot_acuerdos ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-10">
            <a href="<?=base_url()?>reportes/lista" class="btn btn-secondary">Volver</a>
        </div>
    </div>

</main>
