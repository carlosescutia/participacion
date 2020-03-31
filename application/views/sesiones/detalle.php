<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <form method="post" action="<?= base_url() ?>sesiones/guardar/<?=$sesiones['cve_sesion']?>">
        <div class="col-md-12 mb-3 pb-2 pt-3 border-bottom">
            <div class="row">
                <div class="col-md-4">
                    <h1 class="h2">Datos de la sesión</h1>
                </div>
                <div class="col-md-6">
                    <?php if ($error_sesion): ?>
                    <p class="text-danger"><?php echo $error_sesion?></p>
                    <?php endif ?>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="row">
                <div class="col-md-9">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="nom_sesion">Nombre</label>
                            <input type="text" class="form-control" name="nom_sesion" id="nom_sesion" value="<?=$sesiones['nom_sesion'] ?>">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="tipo">Tipo</label>
                            <select class="custom-select" name="tipo" id="tipo">
                                <option value=""></option>
                                <option value="o" <?= ($sesiones['tipo'] == 'o') ? 'selected' : '' ?> >Ordinaria</option>
                                <option value="n" <?= ($sesiones['tipo'] == 'n') ? 'selected' : '' ?> >Extraordinaria</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="lugar">Lugar</label>
                            <input type="text" class="form-control" name="lugar" id="lugar" value="<?=$sesiones['lugar'] ?>">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="fecha">Fecha</label>
                            <input type="date" class="form-control" name="fecha" id="fecha" value="<?=$sesiones['fecha'] ?>">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="hora">Hora</label>
                            <input type="time" class="form-control" name="hora" id="hora" value="<?=$sesiones['hora'] ?>">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="objetivo">Objetivo</label>
                            <textarea rows="6" class="form-control" name="objetivo" id="objetivo"><?=$sesiones['objetivo'] ?></textarea>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="orden_dia">Orden del día</label>
                            <textarea rows="6" class="form-control" name="orden_dia" id="orden_dia"><?=$sesiones['orden_dia'] ?></textarea>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="cve_consejo" id="cve_consejo" value="<?=$sesiones['cve_consejo'] ?>">
            </form>

            <div class="col-md-3">
                <div class="card mt-4 mb-3">
                    <div class="card-header" style="background-color:#E6D9FA">
                        <strong>Adjuntos</strong>
                    </div>
                    <div class="card-body p-0">
                        <div class="col-md-12">
                            <table class="table table-sm">
                                <tbody>
                                    <tr>
                                        <?php
                                        $cve_consejo = $sesiones['cve_consejo'] ;
                                        $cve_sesion = $sesiones['cve_sesion'] ;
                                        $arch_presentacion = 'adj_sesiones/' . $cve_consejo . '_' . $cve_sesion . '_presentacion.pdf';
                                        ?>
                                        <td>
                                            <?php
                                            if ( file_exists($arch_presentacion) ) { ?>
                                            <a href="<?= base_url() ?><?= $arch_presentacion ?>" target="_blank">
                                                <?php } ?>
                                                Presentación
                                                <?php
                                                if ( file_exists($arch_presentacion) ) { ?>
                                            </a>
                                            <?php } ?>
                                        </td>
                                        <td>
                                            <form method="post" enctype="multipart/form-data" action="<?= base_url() ?>archivos/presentacion">
                                                <label class="btn btn-primary btn-sm" for="arch-presentacion">
                                                    <input name="arch-presentacion" id="arch-presentacion" type="file" style="display:none"
                                                    onchange="$('#arch-presentacion-info').removeClass('invisible')">
                                                    +
                                                </label>
                                                <input type="hidden" name="cve_consejo" id="cve_consejo" value="<?= $sesiones['cve_consejo'] ?>">
                                                <input type="hidden" name="cve_sesion" id="cve_sesion" value="<?= $sesiones['cve_sesion'] ?>">
                                                <button id="arch-presentacion-info" type="submit" class="btn btn-sm invisible" style="background: none; color: #28A745">
                                                    <span data-feather="upload"></span>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    <tr>
                                        <?php
                                        $cve_consejo = $sesiones['cve_consejo'] ;
                                        $cve_sesion = $sesiones['cve_sesion'] ;
                                        $arch_minuta = 'adj_sesiones/' . $cve_consejo . '_' . $cve_sesion . '_minuta.pdf';
                                        ?>
                                        <td>
                                            <?php
                                            if ( file_exists($arch_minuta) ) { ?>
                                            <a href="<?= base_url() ?><?= $arch_minuta ?>" target="_blank">
                                                <?php } ?>
                                                Minuta
                                                <?php
                                                if ( file_exists($arch_minuta) ) { ?>
                                            </a>
                                            <?php } ?>
                                        </td>
                                        <td>
                                            <form method="post" enctype="multipart/form-data" action="<?= base_url() ?>archivos/minuta">
                                                <label class="btn btn-primary btn-sm" for="arch-minuta">
                                                    <input name="arch-minuta" id="arch-minuta" type="file" style="display:none"
                                                    onchange="$('#arch-minuta-info').removeClass('invisible')">
                                                    +
                                                </label>
                                                <input type="hidden" name="cve_consejo" id="cve_consejo" value="<?= $sesiones['cve_consejo'] ?>">
                                                <input type="hidden" name="cve_sesion" id="cve_sesion" value="<?= $sesiones['cve_sesion'] ?>">
                                                <button id="arch-minuta-info" type="submit" class="btn btn-sm invisible" style="background: none; color: #28A745">
                                                    <span data-feather="upload"></span>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    <tr>
                                        <?php
                                        $cve_consejo = $sesiones['cve_consejo'] ;
                                        $cve_sesion = $sesiones['cve_sesion'] ;
                                        $arch_asistencia = 'adj_sesiones/' . $cve_consejo . '_' . $cve_sesion . '_asistencia.pdf';
                                        ?>
                                        <td>
                                            <?php
                                            if ( file_exists($arch_asistencia) ) { ?>
                                            <a href="<?= base_url() ?><?= $arch_asistencia ?>" target="_blank">
                                                <?php } ?>
                                                Lista de asistencia
                                                <?php
                                                if ( file_exists($arch_asistencia) ) { ?>
                                            </a>
                                            <?php } ?>
                                        </td>
                                        <td>
                                            <form method="post" enctype="multipart/form-data" action="<?= base_url() ?>archivos/asistencia">
                                                <label class="btn btn-primary btn-sm" for="arch-asistencia">
                                                    <input name="arch-asistencia" id="arch-asistencia" type="file" style="display:none"
                                                    onchange="$('#arch-asistencia-info').removeClass('invisible')">
                                                    +
                                                </label>
                                                <input type="hidden" name="cve_consejo" id="cve_consejo" value="<?= $sesiones['cve_consejo'] ?>">
                                                <input type="hidden" name="cve_sesion" id="cve_sesion" value="<?= $sesiones['cve_sesion'] ?>">
                                                <button id="arch-asistencia-info" type="submit" class="btn btn-sm invisible" style="background: none; color: #28A745">
                                                    <span data-feather="upload"></span>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    <tr>
                                        <?php
                                        $cve_consejo = $sesiones['cve_consejo'] ;
                                        $cve_sesion = $sesiones['cve_sesion'] ;
                                        $arch_extras = 'adj_sesiones/' . $cve_consejo . '_' . $cve_sesion . '_extras.zip';
                                        ?>
                                        <td>
                                            <?php
                                            if ( file_exists($arch_extras) ) { ?>
                                            <a href="<?= base_url() ?><?= $arch_extras ?>" target="_blank">
                                                <?php } ?>
                                                Extras
                                                <?php
                                                if ( file_exists($arch_extras) ) { ?>
                                            </a>
                                            <?php } ?>
                                        </td>
                                        <td>
                                            <form method="post" enctype="multipart/form-data" action="<?= base_url() ?>archivos/extras">
                                                <label class="btn btn-primary btn-sm" for="arch-extras">
                                                    <input name="arch-extras" id="arch-extras" type="file" style="display:none"
                                                    onchange="$('#arch-extras-info').removeClass('invisible')">
                                                    +
                                                </label>
                                                <input type="hidden" name="cve_consejo" id="cve_consejo" value="<?= $sesiones['cve_consejo'] ?>">
                                                <input type="hidden" name="cve_sesion" id="cve_sesion" value="<?= $sesiones['cve_sesion'] ?>">
                                                <button id="arch-extras-info" type="submit" class="btn btn-sm invisible" style="background: none; color: #28A745">
                                                    <span data-feather="upload"></span>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <hr />

    <div class="form-group row">
        <div class="col-sm-10">
            <a href="#" onclick="history.go(-1)" class="btn btn-secondary">Volver</a>
        </div>
    </div>

</main>
