<main role="main" class="ml-sm-auto px-4">

    <div class="col-md-12 mb-3 pb-2 pt-3 border-bottom">
        <div class="row">
            <div class="col-md-4">
                <h1 class="h2">Nuevo consejo</h1>
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="card mt-0 mb-3">
            <div class="card-header" style="background-color:#E6D9FA">
                <strong>Datos básicos</strong>
            </div>
            <form method="post" action="<?= base_url() ?>consejos/guardar">
                <div class="card-body">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="nom_consejo">Nombre</label>
                            <?php echo form_error('nom_consejo'); ?>
                            <input type="text" class="form-control" name="nom_consejo" id="nom_consejo" value="<?php echo set_value('nom_consejo'); ?>">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="siglas">Siglas</label>
                            <?php echo form_error('siglas'); ?>
                            <input type="text" class="form-control" name="siglas" id="siglas" value="<?php echo set_value('siglas'); ?>">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="cve_tipo">Tipo</label>
                            <select class="custom-select" name="cve_tipo" id="cve_tipo">
                                <option value="" <?php echo set_select('cve_tipo', '', TRUE); ?> ></option>
                                <?php foreach ($tipo_consejos as $tipo_consejos_item) { ?>
                                <option value="<?= $tipo_consejos_item['cve_tipo'] ?>" <?php echo set_select('cve_tipo', $tipo_consejos_item['cve_tipo']); ?> ><?= $tipo_consejos_item['nom_tipo'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="cve_eje">Eje</label>
                            <select class="custom-select" name="cve_eje" id="cve_eje">
                                <option value="" <?php echo set_select('cve_eje', '', TRUE); ?> ></option>
                                <?php foreach ($ejes as $ejes_item) { ?>
                                <option value="<?= $ejes_item['cve_eje'] ?>" <?php echo set_select('cve_eje', $ejes_item['cve_eje']); ?> ><?= $ejes_item['nom_eje'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="soporte_juridico">Soporte jurídico</label>
                            <?php echo form_error('soporte_juridico'); ?>
                            <input type="text" class="form-control" name="soporte_juridico" id="soporte_juridico" value="<?php echo set_value('soporte_juridico'); ?>">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="reglamento_interno">¿Tiene normativa interna?</label>
                            <select class="custom-select" name="reglamento_interno" id="reglamento_interno">
                                <option value="" <?php echo set_select('reglamento_interno', '', TRUE); ?> ></option>
                                <option value="S" <?php echo set_select('reglamento_interno', 'S'); ?> >Si</option>
                                <option value="N" <?php echo set_select('reglamento_interno', 'N'); ?> >No</option>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="fecha_reglamento">Fecha del reglamento interno</label>
                            <input type="date" class="form-control " name="fecha_reglamento" id="fecha_reglamento" value="<?php echo set_value('fecha_reglamento'); ?>">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="periodo_inicio">Inicio del periodo</label>
                            <input type="date" class="form-control " name="periodo_inicio" id="periodo_inicio" value="<?php echo set_value('periodo_inicio'); ?>">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="periodo_fin">Fin del periodo</label>
                            <input type="date" class="form-control " name="periodo_fin" id="periodo_fin" value="<?php echo set_value('periodo_fin'); ?>">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <label for="sesiones_anuales">Sesiones al año</label>
                            <input type="text" class="form-control " name="sesiones_anuales" id="sesiones_anuales" value="<?php echo set_value('sesiones_anuales'); ?>">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="integracion">Integración</label>
                            <select class="custom-select" name="integracion" id="integracion">
                                <option value="" <?php echo set_select('integracion', '', TRUE); ?> ></option>
                                <option value="social" <?php echo set_select('integracion', 'social'); ?> >Mayoría ciudadana</option>
                                <option value="minoria_social" <?php echo set_select('integracion', 'minoria_social'); ?> >Minoría social</option>
                                <option value="gubernamental" <?php echo set_select('integracion', 'gubernamental'); ?> >Gubernamental</option>
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="fecha_instalacion">Fecha de instalación</label>
                            <input type="date" class="form-control " name="fecha_instalacion" id="fecha_instalacion" value="<?php echo set_value('fecha_instalacion'); ?>">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="participacion_ciudadana">Participación ciudadana?</label>
                            <select class="custom-select" name="participacion_ciudadana" id="participacion_ciudadana">
                                <option value="s" <?php echo set_select('participacion_ciudadana', 's'); ?> >Si</option>
                                <option value="n" <?php echo set_select('participacion_ciudadana', 'n'); ?> >No</option>
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="cve_calidad">Calidad de participación?</label>
                            <select class="custom-select" name="cve_calidad" id="cve_calidad">
                                <?php foreach ($calidad_participacion as $calidad_participacion_item) { ?>
                                <option value="<?= $calidad_participacion_item['cve_calidad'] ?>" <?php echo set_select('cve_calidad', $calidad_participacion_item['cve_calidad']); ?> ><?= $calidad_participacion_item['nom_calidad'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="status">Status</label>
                            <select class="custom-select" name="status" id="status">
                                <option value="1" <?php echo set_select('status', '1'); ?> >Activo</option>
                                <option value="0" <?php echo set_select('status', '0'); ?> >Inactivo</option>
                            </select>
                        </div>
                    </div>

                    <input type="hidden" name="dependencia" value="<?= $usuario_dependencia; ?>">
                    <input type="hidden" name="area" value="<?= $usuario_area; ?>">

                </div>
                <?php if (in_array('99', $accesos_sistema_rol)) { ?>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
                <?php } ?>
            </form>
        </div>
    </div>

    <hr />

    <div class="form-group row">
        <div class="col-sm-10">
            <a href="<?=base_url()?>consejos/lista" class="btn btn-secondary">Volver</a>
        </div>
    </div>

</main>


