<main role="main" class="ml-sm-auto px-4">
    <form method="post" action="<?= base_url() ?>sesiones/guardar/<?= $cve_consejo ?>">
        <div class="col-md-12 mb-3 pb-2 pt-3 border-bottom">
            <div class="row">
                <div class="col-md-4">
                    <h1 class="h2">Nueva sesión</h1>
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
            <div class="col-md-10">
                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label for="num_sesion">Número </label>
                        <?php echo form_error('num_sesion'); ?>
                        <input type="text" class="form-control" name="num_sesion" id="num_sesion" value="<?php echo set_value('num_sesion'); ?>">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="tipo">Tipo</label>
                        <?php echo form_error('tipo'); ?>
                        <select class="custom-select" name="tipo" id="tipo">
                            <option value=""> <?php echo  set_select('tipo', '', TRUE); ?> </option>
                            <option value="o" <?php echo  set_select('tipo', 'o'); ?> >Ordinaria</option>
                            <option value="e" <?php echo  set_select('tipo', 'e'); ?> >Extraordinaria</option>
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="cve_modalidad">Modalidad</label>
                        <?php echo form_error('cve_modalidad'); ?>
                        <select class="custom-select" name="cve_modalidad" id="cve_modalidad">
                            <option value="" <?php echo set_select('cve_modalidad', '', TRUE); ?> ></option>
                            <?php foreach ($modalidades_sesion as $modalidades_sesion_item) { ?>
                            <option value="<?= $modalidades_sesion_item['cve_modalidad'] ?>" <?php echo set_select('cve_modalidad', $modalidades_sesion_item['cve_modalidad']); ?> ><?= $modalidades_sesion_item['nom_modalidad'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="cve_objetivo">Objetivo</label>
                        <?php echo form_error('cve_objetivo'); ?>
                        <select class="custom-select" name="cve_objetivo" id="cve_objetivo">
                            <option value="" <?php echo set_select('cve_objetivo', '', TRUE); ?> ></option>
                            <?php foreach ($objetivos_sesion as $objetivos_sesion_item) { ?>
                            <option value="<?= $objetivos_sesion_item['cve_objetivo'] ?>" <?php echo set_select('cve_objetivo', $objetivos_sesion_item['cve_objetivo']); ?> ><?= $objetivos_sesion_item['nom_objetivo'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-5">
                        <label for="lugar">Lugar</label>
                        <?php echo form_error('lugar'); ?>
                        <input type="text" class="form-control" name="lugar" id="lugar" value="<?php echo set_value('lugar'); ?>">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="fecha">Fecha</label>
                        <?php echo form_error('fecha'); ?>
                        <input type="date" class="form-control" name="fecha" id="fecha" value="<?php echo set_value('fecha'); ?>">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="hora_ini">Hora inicio</label>
                        <?php echo form_error('hora_ini'); ?>
                        <input type="time" class="form-control" name="hora_ini" id="hora_ini" value="<?php echo set_value('hora_ini'); ?>">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="hora_fin">Hora fin</label>
                        <?php echo form_error('hora_fin'); ?>
                        <input type="time" class="form-control" name="hora_fin" id="hora_fin" value="<?php echo set_value('hora_fin'); ?>">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="orden_dia">Orden del día</label>
                        <?php echo form_error('orden_dia'); ?>
                        <textarea rows="6" class="form-control" name="orden_dia" id="orden_dia"><?php echo set_value('orden_dia'); ?></textarea>
                    </div>
                </div>
            </div>
        </div>

        <input type="hidden" name="cve_consejo" id="cve_consejo" value="<?= $cve_consejo ?>">

        <hr />

        <div class="form-group row">
            <div class="col-sm-10">
                <a href="<?=base_url()?>consejos/detalle/<?=$cve_consejo ?>" class="btn btn-secondary">Volver</a>
            </div>
        </div>
    </form>

</main>

