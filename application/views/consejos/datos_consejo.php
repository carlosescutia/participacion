<div class="card mt-0 mb-3">
    <div class="card-header" style="background-color:#E6D9FA">
        <strong>Datos básicos</strong>
    </div>
    <form method="post" action="<?= base_url() ?>consejos/guardar/<?= $consejos['cve_consejo'] ?>">
        <div class="card-body">
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="nom_consejo">Nombre</label>
                    <?php echo form_error('nom_consejo'); ?>
                    <input type="text" class="form-control" name="nom_consejo" id="nom_consejo" value="<?=$consejos['nom_consejo'] ?>" readonly>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="siglas">Siglas</label>
                    <?php echo form_error('siglas'); ?>
                    <input type="text" class="form-control" name="siglas" id="siglas" value="<?=$consejos['siglas'] ?>" readonly>
                </div>
                <div class="form-group col-md-4">
                    <label for="cve_tipo">Tipo</label>
                    <select class="custom-select" name="cve_tipo" id="cve_tipo" disabled>
                        <option value=""></option>
                        <?php foreach ($tipo_consejos as $tipo_consejos_item) { ?>
                        <option value="<?= $tipo_consejos_item['cve_tipo'] ?>" <?= ($consejos['cve_tipo'] == $tipo_consejos_item['cve_tipo']) ? 'selected' : '' ?> ><?= $tipo_consejos_item['nom_tipo'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="cve_eje">Eje</label>
                    <select class="custom-select" name="cve_eje" id="cve_eje" disabled>
                        <option value=""></option>
                        <?php foreach ($ejes as $ejes_item) { ?>
                        <option value="<?= $ejes_item['cve_eje'] ?>" <?= ($consejos['cve_eje'] == $ejes_item['cve_eje']) ? 'selected' : '' ?> ><?= $ejes_item['nom_eje'] ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="soporte_juridico">Soporte jurídico</label>
                    <?php echo form_error('soporte_juridico'); ?>
                    <input type="text" class="form-control" name="soporte_juridico" id="soporte_juridico" value="<?=$consejos['soporte_juridico'] ?>" readonly>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-2">
                    <label for="reglamento_interno">¿Tiene normativa interna?</label>
                    <select class="custom-select" name="reglamento_interno" id="reglamento_interno" disabled>
                        <option value=""></option>
                        <option value="S" <?= ($consejos['reglamento_interno'] == 'S') ? 'selected' : '' ?> >Si</option>
                        <option value="N" <?= ($consejos['reglamento_interno'] == 'N') ? 'selected' : '' ?> >No</option>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="sesiones_anuales">Sesiones al año</label>
                    <input type="text" class="form-control " name="sesiones_anuales" id="sesiones_anuales" value="<?=$consejos['sesiones_anuales'] ?>" readonly>
                </div>
                <div class="form-group col-md-2">
                    <label for="fecha_instalacion">Fecha de instalación</label>
                    <input type="date" class="form-control " name="fecha_instalacion" id="fecha_instalacion" value="<?=$consejos['fecha_instalacion'] ?>" readonly>
                </div>
                <div class="form-group col-md-2">
                    <label for="participacion_ciudadana">Participación ciudadana?</label>
                    <select class="custom-select" name="participacion_ciudadana" id="participacion_ciudadana" disabled>
                        <option value=""></option>
                        <option value="s" <?= ($consejos['participacion_ciudadana'] == 's') ? 'selected' : '' ?> >Si</option>
                        <option value="n" <?= ($consejos['participacion_ciudadana'] == 'n') ? 'selected' : '' ?> >No</option>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="status">Status</label>
                    <select class="custom-select" name="status" id="status" disabled>
                        <option value=""></option>
                        <option value="1" <?= ($consejos['status'] == '1') ? 'selected' : '' ?> >Activo</option>
                        <option value="0" <?= ($consejos['status'] == '0') ? 'selected' : '' ?> >Inactivo</option>
                    </select>
                </div>
            </div>

            <div class="form-row" id="dv_datos_inactivo">
                <div class="form-group col-md-6">
                    <label for="motivo_inactivo">Motivo de inactividad</label>
                    <textarea rows="4" class="form-control" name="motivo_inactivo" id="motivo_inactivo" readonly><?=$consejos['motivo_inactivo'] ?></textarea>
                </div>
                <div class="form-group col-md-6">
                    <label for="aspectos_destacados">Aspectos destacados del consejo</label>
                    <textarea rows="4" class="form-control" name="aspectos_destacados" id="aspectos_destacados" readonly><?=$consejos['aspectos_destacados'] ?></textarea>
                </div>
            </div>

            <div class="form-row mb-2">
                <a data-toggle="collapse" href="#masconsejo" aria-expanded="false" aria-controls="#masconsejo"><strong>mas...</strong></a>
            </div>

            <div class="form-row collapse" id="masconsejo">
                <div class="form-group col-md-3">
                    <label for="fecha_reglamento">Fecha del reglamento interno</label>
                    <input type="date" class="form-control " name="fecha_reglamento" id="fecha_reglamento" value="<?=$consejos['fecha_reglamento'] ?>" readonly>
                </div>
                <div class="form-group col-md-2">
                    <label for="periodo_inicio">Inicio del periodo</label>
                    <input type="date" class="form-control " name="periodo_inicio" id="periodo_inicio" value="<?=$consejos['periodo_inicio'] ?>" readonly>
                </div>
                <div class="form-group col-md-2">
                    <label for="periodo_fin">Fin del periodo</label>
                    <input type="date" class="form-control " name="periodo_fin" id="periodo_fin" value="<?=$consejos['periodo_fin'] ?>" readonly>
                </div>
                <div class="form-group col-md-3">
                    <label for="integracion">Integración</label>
                    <select class="custom-select" name="integracion" id="integracion" disabled>
                        <option value=""></option>
                        <option value="social" <?= ($consejos['integracion'] == 'social') ? 'selected' : '' ?> >Mayoría ciudadana</option>
                        <option value="minoria_social" <?= ($consejos['integracion'] == 'minoria_social') ? 'selected' : '' ?> >Minoría social</option>
                        <option value="gubernamental" <?= ($consejos['integracion'] == 'gubernamental') ? 'selected' : '' ?> >Gubernamental</option>
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="cve_calidad">Calidad de participación</label>
                    <select class="custom-select" name="cve_calidad" id="cve_calidad" disabled>
                        <option value=""></option>
                        <?php foreach ($calidad_participacion as $calidad_participacion_item) { ?>
                        <option value="<?= $calidad_participacion_item['cve_calidad'] ?>" <?= ($consejos['cve_calidad'] == $calidad_participacion_item['cve_calidad']) ? 'selected' : '' ?> ><?= $calidad_participacion_item['nom_calidad'] ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>

            <input type="hidden" name="dependencia" value="<?= $usuario_dependencia; ?>" readonly>
            <input type="hidden" name="area" value="<?= $usuario_area; ?>" readonly>
            <input type="hidden" name="cve_consejo" id="cve_consejo" value="<?=$consejos['cve_consejo'] ?>" readonly>

        </div>
        <?php if (in_array('99', $accesos_sistema_rol)) { ?>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary d-none" id="btn_guardar_consejos">Guardar</button>
            <a href="#" class="btn btn-success" id="btn_editar_consejos">Editar</a>
        </div>
        <?php } ?>
    </form>
</div>
