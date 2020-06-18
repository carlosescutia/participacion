<main role="main" class="ml-sm-auto px-4">

    <form method="post" action="<?= base_url() ?>acuerdos_sesion/guardar/<?=$acuerdos_sesion['cve_sesion']?>/<?=$acuerdos_sesion['cve_consejo']?>">
    <div class="col-md-12 mb-3 pb-2 pt-3 border-bottom">
        <div class="row">
            <div class="col-md-10">
                <h1 class="h2">Datos del acuerdo</h1>
            </div>
            <div class="col-md-2">
                <?php if ($cve_rol == 'usr') { ?>
                <button type="submit" class="btn btn-primary">Guardar</button>
                <?php } ?>
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="row">
            <div class="col-md-12">
                <div class="form-row">
                    <div class="form-group col-md-5">
                        <label for="nom_acuerdo">Acuerdo</label>
                        <?php echo form_error('nom_acuerdo'); ?>
                        <input type="text" class="form-control" name="nom_acuerdo" id="nom_acuerdo" value="<?=$acuerdos_sesion['nom_acuerdo'] ?>">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="observaciones">Observaciones</label>
                        <?php echo form_error('observaciones'); ?>
                        <input type="text" class="form-control" name="observaciones" id="observaciones" value="<?=$acuerdos_sesion['observaciones'] ?>">
                    </div>
                    <div class="form-group col-md-1">
                        <label for="porcentaje_avance">% avance</label>
                        <?php echo form_error('porcentaje_avance'); ?>
                        <input type="text" class="form-control" name="porcentaje_avance" id="porcentaje_avance" value="<?=$acuerdos_sesion['porcentaje_avance'] ?>">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="cve_acceso">Acceso</label>
                        <?php echo form_error('cve_acceso'); ?>
                        <select class="custom-select" name="cve_acceso" id="cve_acceso">
                            <?php foreach ($accesos as $accesos_item) { ?>
                            <option value="<?= $accesos_item['cve_acceso'] ?>" <?= ($acuerdos_sesion['cve_acceso'] == $accesos_item['cve_acceso']) ? 'selected' : '' ?> ><?= $accesos_item['nom_acceso'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label for="fecha_acuerdo">Fecha acuerdo</label>
                        <?php echo form_error('fecha_acuerdo'); ?>
                        <input type="date" class="form-control" name="fecha_acuerdo" id="fecha_acuerdo" value="<?=$acuerdos_sesion['fecha_acuerdo'] ?>">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="fecha_compromiso">Fecha compromiso</label>
                        <?php echo form_error('fecha_compromiso'); ?>
                        <input type="date" class="form-control" name="fecha_compromiso" id="fecha_compromiso" value="<?=$acuerdos_sesion['fecha_compromiso'] ?>">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="fecha_cumplimiento">Fecha cumplimiento</label>
                        <?php echo form_error('fecha_cumplimiento'); ?>
                        <input type="date" class="form-control" name="fecha_cumplimiento" id="fecha_cumplimiento" value="<?=$acuerdos_sesion['fecha_cumplimiento'] ?>">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="cve_status">Status</label>
                        <?php echo form_error('cve_status'); ?>
                        <select class="custom-select" name="cve_status" id="cve_status">
                            <?php foreach ($status_acuerdos_sesion as $status_acuerdos_sesion_item) { ?>
                            <option value="<?= $status_acuerdos_sesion_item['cve_status'] ?>" <?= ($acuerdos_sesion['cve_status'] == $status_acuerdos_sesion_item['cve_status']) ? 'selected' : '' ?> ><?= $status_acuerdos_sesion_item['nom_status'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="causa_cancelado">Causa en caso de cancelación</label>
                        <?php echo form_error('causa_cancelado'); ?>
                        <input type="text" class="form-control" name="causa_cancelado" id="causa_cancelado" value="<?=$acuerdos_sesion['causa_cancelado'] ?>">
                    </div>
                </div>
            </div>
            <input type="hidden" name="cve_consejo" id="cve_consejo" value="<?=$acuerdos_sesion['cve_consejo'] ?>">
            <input type="hidden" name="cve_sesion" id="cve_sesion" value="<?=$acuerdos_sesion['cve_sesion'] ?>">
            <input type="hidden" name="cve_acuerdo" id="cve_acuerdo" value="<?=$acuerdos_sesion['cve_acuerdo'] ?>">
            </form>

        </div>
    </div>

    <hr />

    <div class="form-group row">
        <div class="col-sm-10">
            <a href="<?=base_url()?>sesiones/detalle/<?=$acuerdos_sesion['cve_sesion'] ?>/<?=$acuerdos_sesion['cve_consejo'] ?>" class="btn btn-secondary">Volver</a>
        </div>
    </div>

</main>

