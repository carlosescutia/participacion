<main role="main" class="ml-sm-auto px-4">

    <form method="post" action="<?= base_url() ?>acuerdos_sesion/guardar/<?=$cve_sesion?>/<?=$cve_consejo?>">
    <div class="col-md-12 mb-3 pb-2 pt-3 border-bottom">
        <div class="row">
            <div class="col-md-10">
                <h1 class="h2">Datos del acuerdo</h1>
            </div>
            <div class="col-md-2">
                <?php if ($usuario_rol !== 'Administrador') { ?>
                <button type="submit" class="btn btn-primary">Guardar</button>
                <?php } ?>
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="row">
            <div class="col-md-12">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="nom_acuerdo">Acuerdo</label>
                        <?php echo form_error('nom_acuerdo'); ?>
                        <input type="text" class="form-control" name="nom_acuerdo" id="nom_acuerdo" value="<?php echo set_value('nom_acuerdo'); ?>">
                    </div>
                    <div class="form-group col-md-5">
                        <label for="observaciones">Observaciones</label>
                        <?php echo form_error('observaciones'); ?>
                        <input type="text" class="form-control" name="observaciones" id="observaciones" value="<?php echo set_value('observaciones'); ?>">
                    </div>
                    <div class="form-group col-md-1">
                        <label for="porcentaje_avance">% avance</label>
                        <?php echo form_error('porcentaje_avance'); ?>
                        <input type="text" class="form-control" name="porcentaje_avance" id="porcentaje_avance" value="<?php echo set_value('porcentaje_avance'); ?>">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label for="fecha_acuerdo">Fecha acuerdo</label>
                        <?php echo form_error('fecha_acuerdo'); ?>
                        <input type="date" class="form-control" name="fecha_acuerdo" id="fecha_acuerdo" value="<?php echo set_value('fecha_acuerdo'); ?>">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="fecha_compromiso">Fecha compromiso</label>
                        <?php echo form_error('fecha_compromiso'); ?>
                        <input type="date" class="form-control" name="fecha_compromiso" id="fecha_compromiso" value="<?php echo set_value('fecha_compromiso'); ?>">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="fecha_cumplimiento">Fecha cumplimiento</label>
                        <?php echo form_error('fecha_cumplimiento'); ?>
                        <input type="date" class="form-control" name="fecha_cumplimiento" id="fecha_cumplimiento" value="<?php echo set_value('fecha_cumplimiento'); ?>">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="cve_status">Status</label>
                        <?php echo form_error('cve_status'); ?>
                        <select class="custom-select" name="cve_status" id="cve_status">
                            <option value="" <?php echo set_select('cve_status', '', TRUE); ?> ></option>
                            <?php foreach ($status_acuerdos_sesion as $status_acuerdos_sesion_item) { ?>
                            <option value="<?= $status_acuerdos_sesion_item['cve_status'] ?>" <?php echo set_select('cve_status', $status_acuerdos_sesion_item['cve_status']); ?> ><?= $status_acuerdos_sesion_item['nom_status'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="causa_cancelado">Causa en caso de cancelación</label>
                        <?php echo form_error('causa_cancelado'); ?>
                        <input type="text" class="form-control" name="causa_cancelado" id="causa_cancelado" value="<?php echo set_value('causa_cancelacion'); ?>">
                    </div>
                </div>
            </div>
            </form>

        </div>
    </div>

    <hr />

    <div class="form-group row">
        <div class="col-sm-10">
            <a href="<?=base_url()?>sesiones/detalle/<?=$cve_sesion?>/<?=$cve_consejo?>" class="btn btn-secondary">Volver</a>
        </div>
    </div>

</main>

