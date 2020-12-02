<div class="card mt-0 mb-3">
    <div class="card-header" style="background-color:#E6D9FA">
        <div class="row">
            <div class="col-md-10">
                <strong>Asistencia</strong>
            </div>
            <?php if (in_array('99', $accesos_sistema_rol)) { ?>
            <div class="col-md-2">
                <?php if ( ! $asistencia_sesion) { ?>
                    <form method="post" action="<?= base_url() ?>asistencia_sesion/generar_lista/<?= $sesiones['cve_sesion'] ?>/<?= $sesiones['cve_consejo'] ?>">
                        <button type="submit" class="btn btn-primary">Generar lista</button>
                    </form>
                <?php } ?>
            </div>
            <?php } ?>
        </div>
    </div>
    <?php if (in_array('99', $accesos_sistema_rol)) { ?>
    <form method="post" action="<?= base_url() ?>asistencia_sesion/guardar_lista/<?= $sesiones['cve_sesion'] ?>/<?= $sesiones['cve_consejo'] ?>">
    <?php } ?>
    <div class="card-body p-0">
        <div class="col-md-12">
            <?php if ($error_asistencia_sesion): ?>
            <p class="text-danger"><?php echo $error_asistencia_sesion ?></p>
            <?php endif ?>
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col">Actor</th>
                        <th scope="col">Organización</th>
                        <th scope="col">Sector</th>
                        <th scope="col">Suplente</th>
                        <th scope="col">Asistencia</th>
                        <th scope="col">Participación</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($asistencia_sesion as $asistencia_sesion_item) { ?>
                    <tr>
                        <td><?= $asistencia_sesion_item['nom_actor'] ?></td>
                        <td><?= $asistencia_sesion_item['organizacion'] ?></td>
                        <td><?= $asistencia_sesion_item['nom_sector'] ?></td>
                        <?php if (in_array('99', $accesos_sistema_rol)) { ?>
                            <td>
                                <input type="text" class="form-control" name="s_<?= $asistencia_sesion_item['cve_asistencia'] ?>" id="s_<?= $asistencia_sesion_item['cve_asistencia'] ?>" value="<?= $asistencia_sesion_item['nom_suplente'] ?>">
                            </td>
                            <td>
                                <select class="custom-select" name="a_<?= $asistencia_sesion_item['cve_asistencia'] ?>" id="a_<?= $asistencia_sesion_item['cve_asistencia'] ?>">
                                    <option value="s" <?= ($asistencia_sesion_item['asistencia'] == 's') ? 'selected' : '' ?> >Si</option>
                                    <option value="n" <?= ($asistencia_sesion_item['asistencia'] == 'n') ? 'selected' : '' ?> >No</option>
                                </select>
                            </td>
                            <td>
                                <select class="custom-select" name="p_<?= $asistencia_sesion_item['cve_asistencia'] ?>" id="p_<?= $asistencia_sesion_item['cve_asistencia'] ?>">
                                    <?php foreach ($grados_participacion as $grados_participacion_item) { ?>
                                    <option value="<?= $grados_participacion_item['cve_grado_participacion'] ?>" <?= ($asistencia_sesion_item['cve_grado_participacion'] == $grados_participacion_item['cve_grado_participacion']) ? 'selected' : '' ?> ><?= $grados_participacion_item['nom_grado_participacion'] ?></option>
                                    <?php } ?>
                                </select>
                            </td>
                        <?php } else { ?>
                            <td><?= $asistencia_sesion_item['nom_suplente'] ?></td>
                            <td><?= $asistencia_sesion_item['nom_asistencia'] ?></td>
                            <td><?= $asistencia_sesion_item['nom_grado_participacion'] ?></td>
                        <?php } ?>

                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php if (in_array('99', $accesos_sistema_rol)) { ?>
    <div class="card-footer text-right">
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
    </form>
    <?php } ?>
</div>
