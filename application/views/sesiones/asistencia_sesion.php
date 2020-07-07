<div class="card mt-0 mb-3">
    <div class="card-header" style="background-color:#E6D9FA">
        <div class="row">
            <div class="col-md-10">
                <strong>Asistencia</strong>
            </div>
            <div class="col-md-2">
                <?php if ($cve_rol == 'usr') { ?>
                    <?php if ( ! $asistencia_sesion) { ?>
                        <form method="post" action="<?= base_url() ?>asistencia_sesion/generar_lista/<?= $sesiones['cve_sesion'] ?>/<?= $sesiones['cve_consejo'] ?>">
                            <button type="submit" class="btn btn-primary">Generar lista</button>
                        </form>
                    <?php } ?>
                <?php } ?>
            </div>
        </div>
    </div>
    <div class="card-body p-0">
        <div class="col-md-12">
            <?php if ($error_asistencia_sesion): ?>
            <p class="text-danger"><?php echo $error_asistencia_sesion ?></p>
            <?php endif ?>
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col">Actor</th>
                        <th scope="col">Dependencia</th>
                        <th scope="col">Sector</th>
                        <th scope="col">Asistencia</th>
                        <th scope="col">Participación</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($asistencia_sesion as $asistencia_sesion_item) { ?>
                    <tr>
                        <td><?= $asistencia_sesion_item['nom_actor'] ?></td>
                        <td><?= $asistencia_sesion_item['dependencia'] ?></td>
                        <td><?= $asistencia_sesion_item['nom_sector'] ?></td>
                        <?php if ($cve_rol == 'usr') { ?>
                            <td>
                                <select class="custom-select" onchange="document.location.href=this.value" >
                                    <option value="../../../asistencia_sesion/actualizar_asistencia/<?= $asistencia_sesion_item['cve_asistencia'] ?>/<?= $asistencia_sesion_item['cve_sesion'] ?>/<?= $asistencia_sesion_item['cve_consejo'] ?>/s"  <?= ($asistencia_sesion_item['asistencia'] == 's') ? 'selected' : '' ?> >Si</option>
                                    <option value="../../../asistencia_sesion/actualizar_asistencia/<?= $asistencia_sesion_item['cve_asistencia'] ?>/<?= $asistencia_sesion_item['cve_sesion'] ?>/<?= $asistencia_sesion_item['cve_consejo'] ?>/n"  <?= ($asistencia_sesion_item['asistencia'] == 'n') ? 'selected' : '' ?> >No</option>
                                </select>
                            </td>
                            <td>
                                <select class="custom-select" onchange="document.location.href=this.value" >
                                    <?php foreach ($grados_participacion as $grados_participacion_item) { ?>
                                    <option value="../../../asistencia_sesion/actualizar_grado_participacion/<?= $asistencia_sesion_item['cve_asistencia'] ?>/<?= $asistencia_sesion_item['cve_sesion'] ?>/<?= $asistencia_sesion_item['cve_consejo'] ?>/<?= $grados_participacion_item['cve_grado_participacion'] ?>"  <?= ($asistencia_sesion_item['cve_grado_participacion'] == $grados_participacion_item['cve_grado_participacion']) ? 'selected' : '' ?>   ><?= $grados_participacion_item['nom_grado_participacion'] ?></option>
                                    <?php } ?>
                                </select>
                            </td>
                        <?php } else { ?>
                            <td><?= $asistencia_sesion_item['nom_asistencia'] ?></td>
                            <td><?= $asistencia_sesion_item['nom_grado_participacion'] ?></td>
                        <?php } ?>

                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
