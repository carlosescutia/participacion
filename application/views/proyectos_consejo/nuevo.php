<main role="main" class="ml-sm-auto px-4">

    <form method="post" action="<?= base_url() ?>proyectos_consejo/guardar/<?= $cve_consejo ?>">
        <div class="col-md-12 mb-3 pb-2 pt-3 border-bottom">
            <div class="row">
                <div class="col-md-10">
                    <h1 class="h2">Nuevo proyecto</h1>
                </div>
                <div class="col-md-2 text-right">
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
                        <div class="form-group col-md-4">
                            <label for="nom_proyecto">Proyecto</label>
                            <?php echo form_error('nom_proyecto'); ?>
                            <input type="text" class="form-control" name="nom_proyecto" id="nom_proyecto" value="<?php echo set_value('nom_proyecto'); ?>">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="cve_preparacion">Grado de preparación</label>
                            <?php echo form_error('cve_preparacion'); ?>
                            <select class="custom-select" name="cve_preparacion" id="cve_preparacion">
                                <?php foreach ($preparaciones as $preparaciones_item) { ?>
                                <option value="<?= $preparaciones_item['cve_preparacion'] ?>" <?php echo set_select('cve_preparacion', $preparaciones_item['cve_preparacion']); ?> ><?= $preparaciones_item['nom_preparacion'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group col-md-1">
                            <label for="cve_plazo">Plazo</label>
                            <?php echo form_error('cve_plazo'); ?>
                            <select class="custom-select" name="cve_plazo" id="cve_plazo">
                                <?php foreach ($plazos as $plazos_item) { ?>
                                <option value="<?= $plazos_item['cve_plazo'] ?>" <?php echo set_select('cve_plazo', $plazos_item['cve_plazo']); ?> ><?= $plazos_item['nom_plazo'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="objetivo_definido">¿Objetivo definido?</label>
                            <?php echo form_error('objetivo_definido'); ?>
                            <select class="custom-select" name="objetivo_definido" id="objetivo_definido">
                                <option value="s" <?php echo set_select('objetivo_definido', 's'); ?> >Si</option>
                                <option value="n" <?php echo set_select('objetivo_definido', 'n'); ?> >No</option>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="cve_atingencia">Atingencia al programa de reactivación</label>
                            <?php echo form_error('cve_atingencia'); ?>
                            <select class="custom-select" name="cve_atingencia" id="cve_atingencia">
                                <?php foreach ($atingencias as $atingencias_item) { ?>
                                <option value="<?= $atingencias_item['cve_atingencia'] ?>" <?php echo set_select('cve_atingencia', $atingencias_item['cve_atingencia']); ?> ><?= $atingencias_item['nom_atingencia'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <input type="hidden" name="dependencia" value="<?= $usuario_dependencia; ?>">
                        <input type="hidden" name="area" value="<?= $usuario_area; ?>">
                        <input type="hidden" name="cve_consejo" id="cve_consejo" value="<?= $cve_consejo ?>">
                    </div>
                </div>
            </div>
        </div>
    </form>

    <hr />

    <div class="form-group row">
        <div class="col-sm-10">
            <a href="<?= base_url() ?>consejos/detalle/<?= $cve_consejo ?>" class="btn btn-secondary">Volver</a>
        </div>
    </div>

</main>

