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
                    <input type="text" class="form-control" name="nom_consejo" id="nom_consejo" value="<?=$consejos['nom_consejo'] ?>">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="siglas">Siglas</label>
                    <?php echo form_error('siglas'); ?>
                    <input type="text" class="form-control" name="siglas" id="siglas" value="<?=$consejos['siglas'] ?>">
                </div>
                <div class="form-group col-md-4">
                    <label for="cve_tipo">Tipo</label>
                    <select class="custom-select" name="cve_tipo" id="cve_tipo">
                        <option value=""></option>
                        <?php foreach ($tipo_consejos as $tipo_consejos_item) { ?>
                        <option value="<?= $tipo_consejos_item['cve_tipo'] ?>" <?= ($consejos['cve_tipo'] == $tipo_consejos_item['cve_tipo']) ? 'selected' : '' ?> ><?= $tipo_consejos_item['nom_tipo'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="cve_eje">Eje</label>
                    <select class="custom-select" name="cve_eje" id="cve_eje">
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
                    <input type="text" class="form-control" name="soporte_juridico" id="soporte_juridico" value="<?=$consejos['soporte_juridico'] ?>">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="reglamento_interno">¿Tiene normativa interna?</label>
                    <select class="custom-select" name="reglamento_interno" id="reglamento_interno">
                        <option value=""></option>
                        <option value="S" <?= ($consejos['reglamento_interno'] == 'S') ? 'selected' : '' ?> >Si</option>
                        <option value="N" <?= ($consejos['reglamento_interno'] == 'N') ? 'selected' : '' ?> >No</option>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="fecha_reglamento">Fecha del reglamento interno</label>
                    <input type="date" class="form-control " name="fecha_reglamento" id="fecha_reglamento" value="<?=$consejos['fecha_reglamento'] ?>">
                </div>
                <div class="form-group col-md-3">
                    <label for="periodo_inicio">Inicio del periodo</label>
                    <input type="date" class="form-control " name="periodo_inicio" id="periodo_inicio" value="<?=$consejos['periodo_inicio'] ?>">
                </div>
                <div class="form-group col-md-3">
                    <label for="periodo_fin">Fin del periodo</label>
                    <input type="date" class="form-control " name="periodo_fin" id="periodo_fin" value="<?=$consejos['periodo_fin'] ?>">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="sesiones_anuales">Sesiones al año</label>
                    <input type="text" class="form-control " name="sesiones_anuales" id="sesiones_anuales" value="<?=$consejos['sesiones_anuales'] ?>">
                </div>
                <div class="form-group col-md-3">
                    <label for="integracion">Integración</label>
                    <select class="custom-select" name="integracion" id="integracion">
                        <option value=""></option>
                        <option value="social" <?= ($consejos['integracion'] == 'social') ? 'selected' : '' ?> >Mayoría social</option>
                        <option value="gubernamental" <?= ($consejos['integracion'] == 'gubernamental') ? 'selected' : '' ?> >Gubernamental</option>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="fecha_instalacion">Fecha de instalación</label>
                    <input type="date" class="form-control " name="fecha_instalacion" id="fecha_instalacion" value="<?=$consejos['fecha_instalacion'] ?>">
                </div>
                <div class="form-group col-md-3">
                    <label for="status">Status</label>
                    <select class="custom-select" name="status" id="status">
                        <option value=""></option>
                        <option value="1" <?= ($consejos['status'] == '1') ? 'selected' : '' ?> >Activo</option>
                        <option value="0" <?= ($consejos['status'] == '0') ? 'selected' : '' ?> >Inactivo</option>
                    </select>
                </div>
            </div>

            <input type="hidden" name="dependencia" value="<?= $usuario_dependencia; ?>">
            <input type="hidden" name="area" value="<?= $usuario_area; ?>">
            <input type="hidden" name="cve_consejo" id="cve_consejo" value="<?=$consejos['cve_consejo'] ?>">

        </div>
        <?php if ($cve_rol == 'usr') { ?>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
        <?php } ?>
    </form>
</div>
