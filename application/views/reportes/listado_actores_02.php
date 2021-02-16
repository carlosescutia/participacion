<main role="main" class="ml-sm-auto px-4 mb-3 col-print-12">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <div class="col-sm-12 alternate-color">
            <form method="post" action="<?= base_url() ?>reportes/listado_actores_02">
                <div class="row">
                    <div class="col-sm-8 text-left">
                        <h1 class="h2">Listado de Actores con filtros</h1>
                    </div>
                    <div class="col-sm-4 text-right">
                        <button formaction="<?= base_url() ?>reportes/listado_actores_02_csv" class="btn btn-primary">Exportar a excel</button>
                        <a href="javascript:window.print()" class="btn btn-primary">Generar pdf</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 align-self-center">
                        <div class="form-row">
                            <div class="col-3">
                                <select class="custom-select custom-select-sm" name="cve_ent">
                                    <option value="" <?= ($cve_ent == '') ? 'selected' : '' ?>>Todas las entidades</option>
                                    <?php foreach ($entidades as $entidades_item) { ?>
                                    <option value="<?= $entidades_item['cve_ent'] ?>" <?= ($cve_ent == $entidades_item['cve_ent']) ? 'selected' : '' ?>><?= $entidades_item['nom_ent'] ?></option>
                                    <?php } ?>
                                </select>
                                <p class="small mt-3">
                                * Presione ctrl para hacer selección múltiple de sectores.<br />
                                * Para exportar a excel NO presione filtrar primero.</p>
                            </div>
                            <div class="col-3">
                                <select class="custom-select custom-select-sm" name="cve_mun">
                                    <option value="" <?= ($cve_mun == '') ? 'selected' : '' ?>>Todos los municipios</option>
                                    <?php foreach ($municipios as $municipios_item) { ?>
                                    <option value="<?= $municipios_item['cve_mun'] ?>" <?= ($cve_mun == $municipios_item['cve_mun']) ? 'selected' : '' ?>><?= $municipios_item['nom_mun'] ?></option>
                                    <?php } ?>
                                </select>
                                <input type="text" class="form-control form-control-sm col-sm-12 mt-3" name="nombre" id="nombre" value="<?= $nombre ?>" placeholder="Todos los nombres">
                            </div>
                            <div class="col-2">
                                <select class="custom-select custom-select-sm" name="cve_ambito">
                                    <option value="0" <?= ($cve_ambito == '0') ? 'selected' : '' ?>>Todos los ambitos</option>
                                    <?php foreach ($ambitos as $ambitos_item) { ?>
                                    <option value="<?= $ambitos_item['cve_ambito'] ?>" <?= ($cve_ambito == $ambitos_item['cve_ambito']) ? 'selected' : '' ?>><?= $ambitos_item['nom_ambito'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-3">
                                <select class="custom-select custom-select-sm" name="cve_sector[]" multiple>
                                    <option value="" <?= ($cve_sector == '') ? 'selected' : '' ?>>Todos los sectores</option>
                                    <?php foreach ($sectores as $sectores_item) { ?>
                                    <option value="<?= $sectores_item['cve_sector'] ?>" <?= ($cve_sector == $sectores_item['cve_sector']) ? 'selected' : '' ?>><?= $sectores_item['nom_sector'] ?></option>
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
                            <th scope="col">Consejo (cargo)</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Organización</th>
                            <th scope="col">Correo</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($actores as $actores_item) { ?>
                        <tr>
                            <td><?= $actores_item['consejos'] ?></td>
                            <td><?= $actores_item['nombre'] ?> <?= $actores_item['apellido_pa'] ?> <?= $actores_item['apellido_ma'] ?></td>
                            <td><?= $actores_item['organizacion'] ?></td>
                            <td><?= $actores_item['correo_laboral'] ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <hr />
        <div class="row">
            <div class="col-md-12">
                <h5>Total: <?= $totales_actores['num_actores'] ?></h5>
            </div>
        </div>
    </div>
    </main>
