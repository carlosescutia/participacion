<main role="main" class="ml-sm-auto px-4 mb-3 col-print-12">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <div class="col-sm-12 alternate-color">
            <form method="post" action="<?= base_url() ?>reportes/listado_acuerdos_01">
                <div class="row">
                    <div class="col-sm-8 text-left">
                        <h1 class="h2">Listado de Acuerdos</h1>
                    </div>
                    <div class="col-sm-3 text-right">
                        <button formaction="<?= base_url() ?>reportes/listado_acuerdos_01_csv" class="btn btn-primary">Exportar a excel</button>
                        <a href="javascript:window.print()" class="btn btn-primary">Generar pdf</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 align-self-center">
                        <div class="form-row">
                            <div class="col-2">
                                <select class="custom-select custom-select-sm" name="cve_consejo">
                                    <option value="0" <?= ($cve_consejo == '0') ? 'selected' : '' ?>>Todos los consejos</option>
                                    <?php foreach ($consejos as $consejos_item) { ?>
                                    <option value="<?= $consejos_item['cve_consejo'] ?>" <?= ($cve_consejo == $consejos_item['cve_consejo']) ? 'selected' : '' ?>><?= $consejos_item['nom_consejo'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-2">
                                <select class="custom-select custom-select-sm" name="cve_status">
                                    <option value="0" <?= ($cve_status == '0') ? 'selected' : '' ?>>Todos los status</option>
                                    <?php foreach ($status_acuerdos_sesion as $status_acuerdos_sesion_item) { ?>
                                    <option value="<?= $status_acuerdos_sesion_item['cve_status'] ?>" <?= ($cve_status == $status_acuerdos_sesion_item['cve_status']) ? 'selected' : '' ?>><?= $status_acuerdos_sesion_item['nom_status'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-1">
                                <button class="btn btn-success btn-sm">Filtrar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div style="min-height: 46vh">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th scope="col">Consejo</th>
                            <th scope="col">Cód. acuerdo</th>
                            <th scope="col">Acuerdo</th>
                            <th scope="col">Responsable</th>
                            <th scope="col">Fecha cumplimiento</th>
                            <th scope="col">Status</th>
                            <th scope="col">Observaciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($acuerdos_consejo as $acuerdos_consejo_item) { ?>
                        <tr>
                            <td><?= $acuerdos_consejo_item['nom_consejo'] ?></td>
                            <td><?= $acuerdos_consejo_item['codigo_acuerdo'] ?></td>
                            <td><?= $acuerdos_consejo_item['nom_acuerdo'] ?></td>
                            <td><?= $acuerdos_consejo_item['responsable'] ?></td>
                            <td><?= empty($acuerdos_consejo_item['fecha_cumplimiento']) ? '' : date('d/m/y', strtotime($acuerdos_consejo_item['fecha_cumplimiento'])) ?></td>
                            <td><?= $acuerdos_consejo_item['nom_status'] ?></td>
                            <td><?= $acuerdos_consejo_item['observaciones'] ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</main>

