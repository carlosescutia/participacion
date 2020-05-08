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
                    <div class="form-group col-md-12">
                        <label for="nom_sesion">Nombre </label>
                        <?php echo form_error('nom_sesion'); ?>
                        <input type="text" class="form-control" name="nom_sesion" id="nom_sesion" value="<?php echo set_value('nom_sesion'); ?>">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="tipo">Tipo</label>
                        <?php echo form_error('tipo'); ?>
                        <select class="custom-select" name="tipo" id="tipo">
                            <option value=""> <?php echo  set_select('tipo', '', TRUE); ?> </option>
                            <option value="o" <?php echo  set_select('tipo', 'o'); ?> >Ordinaria</option>
                            <option value="e" <?php echo  set_select('tipo', 'e'); ?> >Extraordinaria</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
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
                        <label for="hora">Hora</label>
                        <?php echo form_error('hora'); ?>
                        <input type="time" class="form-control" name="hora" id="hora" value="<?php echo set_value('hora'); ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="objetivo">Objetivo</label>
                        <?php echo form_error('objetivo'); ?>
                        <textarea rows="6" class="form-control" name="objetivo" id="objetivo"><?php echo set_value('objetivo'); ?></textarea>
                    </div>
                    <div class="form-group col-md-6">
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
                <a href="#" onclick="history.go(-1)" class="btn btn-secondary">Volver</a>
            </div>
        </div>
    </form>

</main>

