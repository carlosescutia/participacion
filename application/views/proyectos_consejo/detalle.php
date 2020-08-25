<main role="main" class="ml-sm-auto px-4">

    <form method="post" action="<?= base_url() ?>proyectos_consejo/guardar">
        <div class="col-md-12 mb-3 pb-2 pt-3 border-bottom">
            <div class="row">
                <div class="col-md-10">
                    <h1 class="h2">Datos del proyecto o iniciativa</h1>
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
                            <input type="text" class="form-control" name="nom_proyecto" id="nom_proyecto" value="<?=$proyecto_consejo['nom_proyecto'] ?>">
                        </div>
                        <div class="form-group col-md-8">
                            <label for="cve_planteamiento">Planteamiento original</label>
                            <?php echo form_error('cve_planteamiento'); ?>
                            <select class="custom-select" name="cve_planteamiento" id="cve_planteamiento">
                                <option value="" <?= $proyecto_consejo['cve_planteamiento'] == "" ? 'selected' : '' ?> ></option>
                                <?php foreach ($planteamientos as $planteamientos_item) { ?>
                                <option value="<?= $planteamientos_item['cve_planteamiento'] ?>" <?= ($proyecto_consejo['cve_planteamiento'] == $planteamientos_item['cve_planteamiento']) ? 'selected' : '' ?> ><?= $planteamientos_item['nom_planteamiento'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="responsable">Responsable</label>
                            <?php echo form_error('responsable'); ?>
                            <input type="text" class="form-control" name="responsable" id="responsable" value="<?=$proyecto_consejo['responsable'] ?>">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="cve_preparacion">Grado de preparación</label>
                            <?php echo form_error('cve_preparacion'); ?>
                            <select class="custom-select" name="cve_preparacion" id="cve_preparacion">
                                <?php foreach ($preparaciones as $preparaciones_item) { ?>
                                <option value="<?= $preparaciones_item['cve_preparacion'] ?>" <?= ($proyecto_consejo['cve_preparacion'] == $preparaciones_item['cve_preparacion']) ? 'selected' : '' ?> ><?= $preparaciones_item['nom_preparacion'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group col-md-1">
                            <label for="cve_plazo">Plazo</label>
                            <?php echo form_error('cve_plazo'); ?>
                            <select class="custom-select" name="cve_plazo" id="cve_plazo">
                                <?php foreach ($plazos as $plazos_item) { ?>
                                <option value="<?= $plazos_item['cve_plazo'] ?>" <?= ($proyecto_consejo['cve_plazo'] == $plazos_item['cve_plazo']) ? 'selected' : '' ?> ><?= $plazos_item['nom_plazo'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="objetivo_definido">¿Objetivo definido?</label>
                            <?php echo form_error('objetivo_definido'); ?>
                            <select class="custom-select" name="objetivo_definido" id="objetivo_definido">
                                <option value="s" <?= ($proyecto_consejo['objetivo_definido'] == 's') ? 'selected' : '' ?> >Si</option>
                                <option value="n" <?= ($proyecto_consejo['objetivo_definido'] == 'n') ? 'selected' : '' ?> >No</option>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="cve_atingencia">Atingencia al programa de reactivación</label>
                            <?php echo form_error('cve_atingencia'); ?>
                            <select class="custom-select" name="cve_atingencia" id="cve_atingencia">
                                <?php foreach ($atingencias as $atingencias_item) { ?>
                                <option value="<?= $atingencias_item['cve_atingencia'] ?>" <?= ($proyecto_consejo['cve_atingencia'] == $atingencias_item['cve_atingencia']) ? 'selected' : '' ?> ><?= $atingencias_item['nom_atingencia'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="objetivos">Objetivos</label>
                            <?php echo form_error('objetivos'); ?>
                            <textarea rows="5" class="form-control" name="objetivos" id="objetivos"><?=$proyecto_consejo['objetivos'] ?></textarea>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="indicadores">Indicadores</label>
                            <?php echo form_error('indicadores'); ?>
                            <textarea rows="5" class="form-control" name="indicadores" id="indicadores"><?=$proyecto_consejo['indicadores'] ?></textarea>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="inversion">Inversión estimada</label>
                            <?php echo form_error('inversion'); ?>
                            <input type="text" class="form-control" name="inversion" id="inversion" value="<?=$proyecto_consejo['inversion'] ?>">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="empleos_directos">Empleos directos</label>
                            <?php echo form_error('empleos_directos'); ?>
                            <input type="text" class="form-control" name="empleos_directos" id="empleos_directos" value="<?=$proyecto_consejo['empleos_directos'] ?>">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="empleos_indirectos">Empleos indirectos</label>
                            <?php echo form_error('empleos_indirectos'); ?>
                            <input type="text" class="form-control" name="empleos_indirectos" id="empleos_indirectos" value="<?=$proyecto_consejo['empleos_indirectos'] ?>">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="derrama">Derrama económica</label>
                            <?php echo form_error('derrama'); ?>
                            <input type="text" class="form-control" name="derrama" id="derrama" value="<?=$proyecto_consejo['derrama'] ?>">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="cve_objetivo">Objetivo del plan de acción Gto</label>
                            <?php echo form_error('cve_objetivo'); ?>
                            <select class="custom-select" name="cve_objetivo" id="cve_objetivo">
                                <?php foreach ($objetivo_plangto as $objetivo_plangto_item) { ?>
                                <option value="<?= $objetivo_plangto_item['cve_objetivo'] ?>" <?= ($proyecto_consejo['cve_objetivo'] == $objetivo_plangto_item['cve_objetivo']) ? 'selected' : '' ?> ><?= $objetivo_plangto_item['nom_objetivo'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="valor_grado_preparacion">Valor del grado de preparación</label>
                            <?php echo form_error('valor_grado_preparacion'); ?>
                            <input type="text" class="form-control" name="valor_grado_preparacion" id="valor_grado_preparacion" value="<?=$proyecto_consejo['valor_grado_preparacion'] ?>">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="calif_grado_preparacion">calif del grado de preparación</label>
                            <input type="text" class="form-control" name="calif_grado_preparacion" id="calif_grado_preparacion" value="<?=$proyecto_consejo['calif_grado_preparacion'] ?>" readonly>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="valor_atingencia">Valor de la atingencia</label>
                            <?php echo form_error('valor_atingencia'); ?>
                            <input type="text" class="form-control" name="valor_atingencia" id="valor_atingencia" value="<?=$proyecto_consejo['valor_atingencia'] ?>">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="calif_atingencia">calif de la atingencia</label>
                            <input type="text" class="form-control" name="calif_atingencia" id="calif_atingencia" value="<?=$proyecto_consejo['calif_atingencia'] ?>" readonly>
                        </div>
                    </div>
                    <input type="hidden" name="dependencia" value="<?= $usuario_dependencia; ?>">
                    <input type="hidden" name="area" value="<?= $usuario_area; ?>">
                    <input type="hidden" name="cve_consejo" id="cve_consejo" value="<?= $proyecto_consejo['cve_consejo'] ?>">
                    <input type="hidden" name="cve_proyecto" id="cve_proyecto" value="<?= $proyecto_consejo['cve_proyecto'] ?>">
                </div>
            </div>
        </div>
    </form>

    <hr />

    <div class="form-group row">
        <div class="col-sm-10">
            <a href="<?=base_url()?>consejos/detalle/<?=$proyecto_consejo['cve_consejo'] ?>" class="btn btn-secondary">Volver</a>
        </div>
    </div>

</main>
