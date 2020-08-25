<main role="main" class="ml-sm-auto px-4 mb-3 col-print-12">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <div class="col-sm-12 alternate-color">
            <div class="row">
                <div class="col-sm-8 text-left">
                    <h1 class="h2">Listado de Proyectos</h1>
                </div>
                <div class="col-sm-3 text-right">
                    <a href="<?=base_url()?>reportes/reporte_proyectos_01_csv" class="btn btn-primary">Exportar a excel</a>
					<a href="javascript:window.print()" class="btn btn-primary">Generar pdf</a>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 align-self-center">
                    <form method="post" action="<?= base_url() ?>reportes/reporte_proyectos_01">
                        <div class="form-row">
                            <div class="col-5">
                                <select class="custom-select custom-select-sm" name="cve_planteamiento">
                                    <option value="0" <?= ($cve_planteamiento == '0') ? 'selected' : '' ?>>Todos los planteamientos</option>
                                    <?php foreach ($planteamientos as $planteamientos_item) { ?>
                                    <option value="<?= $planteamientos_item['cve_planteamiento'] ?>" <?= ($cve_planteamiento == $planteamientos_item['cve_planteamiento']) ? 'selected' : '' ?>><?= $planteamientos_item['nom_planteamiento'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-2">
                                <select class="custom-select custom-select-sm" name="cve_consejo">
                                    <option value="0" <?= ($cve_consejo == '0') ? 'selected' : '' ?>>Todos los consejos</option>
                                    <?php foreach ($consejos as $consejos_item) { ?>
                                    <option value="<?= $consejos_item['cve_consejo'] ?>" <?= ($cve_consejo == $consejos_item['cve_consejo']) ? 'selected' : '' ?>><?= $consejos_item['nom_consejo'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-2">
                                <select class="custom-select custom-select-sm" name="cve_preparacion">
                                    <option value="0" <?= ($cve_preparacion == '0') ? 'selected' : '' ?>>Todos los grados</option>
                                    <?php foreach ($preparaciones as $preparaciones_item) { ?>
                                    <option value="<?= $preparaciones_item['cve_preparacion'] ?>" <?= ($cve_preparacion == $preparaciones_item['cve_preparacion']) ? 'selected' : '' ?>><?= $preparaciones_item['nom_preparacion'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-2">
                                <select class="custom-select custom-select-sm" name="cve_plazo">
                                    <option value="0" <?= ($cve_plazo == '0') ? 'selected' : '' ?>>Todos los plazos</option>
                                    <?php foreach ($plazos as $plazos_item) { ?>
                                    <option value="<?= $plazos_item['cve_plazo'] ?>" <?= ($cve_plazo == $plazos_item['cve_plazo']) ? 'selected' : '' ?>><?= $plazos_item['nom_plazo'] ?></option>
                                    <?php } ?>
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
                            <th scope="col">Comisión/consejo</th>
                            <th scope="col">Planteamiento original</th>
                            <th scope="col">Responsable</th>
                            <th scope="col">Objetivo plan accion Gto</th>
                            <th scope="col">Proyecto/iniciativa</th>
                            <th scope="col">Grado de preparación</th>
                            <th scope="col">Valor del grado de preparación</th>
                            <th scope="col">Calificación</th>
                            <th scope="col">Plazo</th>
                            <th scope="col">Atingencia</th>
                            <th scope="col">Valor de Atingencia</th>
                            <th scope="col">Calificación</th>
                            <th scope="col">Objetivo proyecto</th>
                            <th scope="col">Indicadores</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($proyectos as $proyectos_item) { ?>
                        <tr>
                            <td><?= $proyectos_item['nom_consejo'] ?></td>
                            <td><?= $proyectos_item['nom_planteamiento'] ?></td>
                            <td><?= $proyectos_item['responsable'] ?></td>
                            <td><?= $proyectos_item['nom_objetivo'] ?></td>
                            <td><?= $proyectos_item['nom_proyecto'] ?></td>
                            <td><?= $proyectos_item['nom_preparacion'] ?></td>
                            <td><?= $proyectos_item['valor_grado_preparacion'] ?></td>
                            <td><?= $proyectos_item['calif_grado_preparacion'] ?></td>
                            <td><?= $proyectos_item['nom_plazo'] ?></td>
                            <td><?= $proyectos_item['nom_atingencia'] ?></td>
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
