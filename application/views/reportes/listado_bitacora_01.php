<main role="main" class="ml-sm-auto px-4 mb-3 col-print-12">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <div class="col-sm-12 alternate-color">
            <form method="post" action="<?= base_url() ?>reportes/listado_bitacora_01">
                <div class="row">
                    <div class="col-sm-8 text-left">
                        <h1 class="h2">Bitácora de actividad</h1>
                    </div>
                    <div class="col-sm-3 text-right">
                        <button formaction="<?= base_url() ?>reportes/listado_bitacora_01_csv" class="btn btn-primary">Exportar a excel</button>
                        <a href="javascript:window.print()" class="btn btn-primary">Generar pdf</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 align-self-center">
                        <div class="form-row">
                            <div class="col-2">
                                <select class="custom-select custom-select-sm" name="accion">
                                    <option value="" <?= ($accion == '') ? 'selected' : '' ?>>Todas las acciones</option>
                                    <option value="login" <?= ($accion == 'login') ? 'selected' : '' ?>>login</option>
                                    <option value="logout" <?= ($accion == 'logout') ? 'selected' : '' ?>>logout</option>
                                    <option value="agregó" <?= ($accion == 'agregó') ? 'selected' : '' ?>>agregó</option>
                                    <option value="modificó" <?= ($accion == 'modificó') ? 'selected' : '' ?>>modificó</option>
                                    <option value="eliminó" <?= ($accion == 'eliminó') ? 'selected' : '' ?>>eliminó</option>
                                </select>
                            </div>
                            <div class="col-2">
                                <select class="custom-select custom-select-sm" name="entidad">
                                    <option value="" <?= ($entidad == '') ? 'selected' : '' ?>>Todas las entidades</option>
                                    <option value="actores" <?= ($entidad == 'actores') ? 'selected' : '' ?>>actores</option>
                                    <option value="consejos" <?= ($entidad == 'consejos') ? 'selected' : '' ?>>consejos</option>
                                    <option value="sesiones" <?= ($entidad == 'sesiones') ? 'selected' : '' ?>>sesiones</option>
                                    <option value="integrantes" <?= ($entidad == 'integrantes') ? 'selected' : '' ?>>integrantes</option>
                                    <option value="proyectos" <?= ($entidad == 'proyectos') ? 'selected' : '' ?>>proyectos</option>
                                    <option value="calendario" <?= ($entidad == 'calendario') ? 'selected' : '' ?>>calendario</option>
                                    <option value="asistencia" <?= ($entidad == 'asistencia') ? 'selected' : '' ?>>asistencia</option>
                                    <option value="acuerdos" <?= ($entidad == 'acuerdos') ? 'selected' : '' ?>>acuerdos</option>
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
                            <th scope="col">Id</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">Hora</th>
                            <th scope="col">Origen</th>
                            <th scope="col">Usuario</th>
                            <th scope="col">Nombre de usuario</th>
                            <th scope="col">Dependencia</th>
                            <th scope="col">Área</th>
                            <th scope="col">Acción</th>
                            <th scope="col">Entidad</th>
                            <th scope="col">Valor</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($bitacora as $bitacora_item) { ?>
                        <tr>
                            <td><?= $bitacora_item['cve_evento'] ?></td>
                            <td><?= empty($bitacora_item['fecha']) ? '' : date('d/m/y', strtotime($bitacora_item['fecha'])) ?></td>
                            <td><?= $bitacora_item['hora'] ?></td>
                            <td><?= $bitacora_item['origen'] ?></td>
                            <td><?= $bitacora_item['usuario'] ?></td>
                            <td><?= $bitacora_item['usuario_nombre'] ?></td>
                            <td><?= $bitacora_item['dependencia'] ?></td>
                            <td><?= $bitacora_item['area'] ?></td>
                            <td><?= $bitacora_item['accion'] ?></td>
                            <td><?= $bitacora_item['entidad'] ?></td>
                            <td><?= $bitacora_item['valor'] ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</main>
