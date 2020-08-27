<main role="main" class="ml-sm-auto px-4 mb-3 col-print-12">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <div class="col-sm-12 alternate-color">
            <div class="row">
                <div class="col-sm-8 text-left">
                    <h1 class="h2">Listado de consejos con filtros</h1>
                </div>
                <div class="col-sm-3 text-right">
                    <a href="<?=base_url()?>reportes/listado_consejos_02_csv" class="btn btn-primary">Exportar a excel</a>
					<a href="javascript:window.print()" class="btn btn-primary">Generar pdf</a>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 align-self-center">
                    <form method="post" action="<?= base_url() ?>reportes/listado_consejos_02">
                        <div class="form-row">
                            <div class="col-3">
                                <select class="custom-select custom-select-sm" name="cve_eje">
                                    <option value="0" <?= ($cve_eje == '0') ? 'selected' : '' ?>>Todos los ejes</option>
                                    <?php foreach ($ejes as $ejes_item) { ?>
                                    <option value="<?= $ejes_item['cve_eje'] ?>" <?= ($cve_eje == $ejes_item['cve_eje']) ? 'selected' : '' ?>><?= $ejes_item['nom_eje'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-3">
                                <select class="custom-select custom-select-sm" name="cve_tipo">
                                    <option value="0" <?= ($cve_tipo == '0') ? 'selected' : '' ?>>Todos los tipos de consejos</option>
                                    <?php foreach ($tipo_consejos as $tipo_consejos_item) { ?>
                                    <option value="<?= $tipo_consejos_item['cve_tipo'] ?>" <?= ($cve_tipo == $tipo_consejos_item['cve_tipo']) ? 'selected' : '' ?>><?= $tipo_consejos_item['nom_tipo'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-3">
                                <select class="custom-select custom-select-sm" name="cve_status">
                                    <option value="-1" <?= ($cve_status == '-1') ? 'selected' : '' ?>>Todos los status</option>
                                    <option value="1" <?= ($cve_status == '1') ? 'selected' : '' ?>>Activo</option>
                                    <option value="0" <?= ($cve_status == '0') ? 'selected' : '' ?>>Inactivo</option>
                                </select>
                            </div>
                            <div class="col-1">
                                <button class="btn btn-success btn-sm">Filtrar</button>
                            </div>
                        </div>
                    </form>
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
                            <th scope="col">Eje</th>
                            <th scope="col">Consejo</th>
                            <th scope="col">Tipo</th>
                            <th scope="col">Integrantes</th>
                            <th scope="col">Status</th>
                            <th scope="col">Integración</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($consejos as $consejos_item) { ?>
                        <tr>
                            <td><?= $consejos_item['nom_eje'] ?></td>
                            <td><?= $consejos_item['nom_consejo'] ?></td>
                            <td><?= $consejos_item['nom_tipo'] ?></td>
                            <td><?= $consejos_item['num_integrantes'] ?></td>
                            <td><?= $consejos_item['nom_status'] ?></td>
                            <td>ciudadanos: <?= $consejos_item['num_ciudadanos'] ?>; funcionarios estatales: <?= $consejos_item['num_funcionarios_estatales'] ?>; otros: <?= $consejos_item['num_otros_sectores'] ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <hr />
        <div class="row">
            <div class="col-md-12">
                <h5>Total: <?= $totales_consejos['num_consejos'] ?></h5>
            </div>
        </div>
    </div>

</main>

