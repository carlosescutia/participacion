<main role="main" class="ml-sm-auto px-4">

    <form method="post" action="<?= base_url() ?>proyectos_consejo/guardar/<?= $cve_consejo ?>">
        <div class="col-md-12 mb-3 pb-2 pt-3 border-bottom">
            <div class="row">
                <div class="col-md-10">
                    <h1 class="h2">Nuevo proyecto o iniciativa</h1>
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
                            <label for="nom_proyecto">Proyecto o iniciativa</label>
                            <?php echo form_error('nom_proyecto'); ?>
                            <input type="text" class="form-control" name="nom_proyecto" id="nom_proyecto" value="<?php echo set_value('nom_proyecto'); ?>">
                        </div>
                        <div class="form-group col-md-8">
                            <label for="cve_planteamiento">Planteamiento original</label>
                            <?php echo form_error('cve_planteamiento'); ?>
                            <select class="custom-select" name="cve_planteamiento" id="cve_planteamiento">
                                <?php foreach ($planteamientos as $planteamientos_item) { ?>
                                <option value="<?= $planteamientos_item['cve_planteamiento'] ?>" <?php echo set_select('cve_planteamiento', $planteamientos_item['cve_planteamiento']); ?> ><?= $planteamientos_item['nom_planteamiento'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="responsable">Responsable</label>
                            <?php echo form_error('responsable'); ?>
                            <input type="text" class="form-control" name="responsable" id="responsable" value="<?php echo set_value('responsable') ?>">
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
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="objetivos">Objetivos</label>
                            <?php echo form_error('objetivos'); ?>
                            <textarea rows="5" class="form-control" name="objetivos" id="objetivos"><?php echo set_value('objetivos') ?></textarea>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="indicadores">Indicadores</label>
                            <?php echo form_error('indicadores'); ?>
                            <textarea rows="5" class="form-control" name="indicadores" id="indicadores"><?php echo set_value('indicadores') ?></textarea>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="inversion">Inversión estimada</label>
                            <?php echo form_error('inversion'); ?>
                            <input type="text" class="form-control" name="inversion" id="inversion" value="<?php echo set_value('inversion') ?>">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="empleos_directos">Empleos directos</label>
                            <?php echo form_error('empleos_directos'); ?>
                            <input type="text" class="form-control" name="empleos_directos" id="empleos_directos" value="<?php echo set_value('empleos_directos') ?>">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="empleos_indirectos">Empleos indirectos</label>
                            <?php echo form_error('empleos_indirectos'); ?>
                            <input type="text" class="form-control" name="empleos_indirectos" id="empleos_indirectos" value="<?php echo set_value('empleos_indirectos') ?>">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="derrama">Derrama económica</label>
                            <?php echo form_error('derrama'); ?>
                            <input type="text" class="form-control" name="derrama" id="derrama" value="<?php echo set_value('derrama') ?>">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="cve_objetivo">Objetivo del plan de acción Gto</label>
                            <?php echo form_error('cve_objetivo'); ?>
                            <select class="custom-select" name="cve_objetivo" id="cve_objetivo">
                                <?php foreach ($objetivo_plangto as $objetivo_plangto_item) { ?>
                                <option value="<?= $objetivo_plangto_item['cve_objetivo'] ?>" <?php echo set_select('cve_objetivo', $objetivo_plangto_item['cve_objetivo']); ?> ><?= $objetivo_plangto_item['nom_objetivo'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="valor_grado_preparacion">Valor del grado de preparación</label>
                            <?php echo form_error('valor_grado_preparacion'); ?>
                            <input type="text" class="form-control" name="valor_grado_preparacion" id="valor_grado_preparacion" value="<?php echo set_value('valor_grado_preparacion') ?>">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="valor_atingencia">Valor de la atingencia</label>
                            <?php echo form_error('valor_atingencia'); ?>
                            <input type="text" class="form-control" name="valor_atingencia" id="valor_atingencia" value="<?php echo set_value('valor_atingencia') ?>">
                        </div>
                    </div>
                    <input type="hidden" name="dependencia" value="<?= $usuario_dependencia; ?>">
                    <input type="hidden" name="area" value="<?= $usuario_area; ?>">
                    <input type="hidden" name="cve_consejo" id="cve_consejo" value="<?= $cve_consejo ?>">
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

