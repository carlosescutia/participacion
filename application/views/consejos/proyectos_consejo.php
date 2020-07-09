<div class="card mt-0 mb-3">
    <div class="card-header" style="background-color:#E6D9FA">
        <strong>Proyectos del consejo</strong>
    </div>
    <div class="card-body p-0">
        <div class="col-md-12">
            <?php if ($error_proyectos_consejo): ?>
            <p class="text-danger"><?php echo $error_proyectos_consejo ?></p>
            <?php endif ?>

            <div class="row">
                <div class="col-md-3">
                    <strong>Nombre</strong>
                </div>
                <div class="col-md-2">
                    <strong>Preparación</strong>
                </div>
                <div class="col-md-2">
                    <strong>Plazo de ejecución</strong>
                </div>
                <div class="col-md-2">
                    <strong>Objetivo definido</strong>
                </div>
                <div class="col-md-2">
                    <strong>Atingencia al prg de reactiv.</strong>
                </div>
            </div>

            <?php foreach ($proyectos_consejo as $proyectos_consejo_item) { ?>
                <div class="row">
                    <div class="col-md-3">
                        <p><?= $proyectos_consejo_item['nom_proyecto'] ?></p>
                    </div>
                    <?php if ($cve_rol == 'usr') { ?>
                        <div class="col-md-2">
                            <select class="custom-select" onchange="document.location.href=this.value" >
                                <?php foreach ($preparaciones as $preparaciones_item) { ?>
                                <option value="../../proyectos_consejo/actualizar_preparacion/<?= $proyectos_consejo_item['cve_proyecto'] ?>/<?= $proyectos_consejo_item['cve_consejo'] ?>/<?= $preparaciones_item['cve_preparacion'] ?>"  <?= ($proyectos_consejo_item['cve_preparacion'] == $preparaciones_item['cve_preparacion']) ? 'selected' : '' ?>   ><?= $preparaciones_item['nom_preparacion'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <select class="custom-select" onchange="document.location.href=this.value" >
                                <?php foreach ($plazos as $plazos_item) { ?>
                                <option value="../../proyectos_consejo/actualizar_plazo/<?= $proyectos_consejo_item['cve_proyecto'] ?>/<?= $proyectos_consejo_item['cve_consejo'] ?>/<?= $plazos_item['cve_plazo'] ?>"  <?= ($proyectos_consejo_item['cve_plazo'] == $plazos_item['cve_plazo']) ? 'selected' : '' ?>   ><?= $plazos_item['nom_plazo'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <select class="custom-select" onchange="document.location.href=this.value" >
                                <option value="../../proyectos_consejo/actualizar_objetivo/<?= $proyectos_consejo_item['cve_proyecto'] ?>/<?= $proyectos_consejo_item['cve_consejo'] ?>/s"  <?= ($proyectos_consejo_item['objetivo_definido'] == 's') ? 'selected' : '' ?> >Si</option>
                                <option value="../../proyectos_consejo/actualizar_objetivo/<?= $proyectos_consejo_item['cve_proyecto'] ?>/<?= $proyectos_consejo_item['cve_consejo'] ?>/n"  <?= ($proyectos_consejo_item['objetivo_definido'] == 'n') ? 'selected' : '' ?> >No</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <select class="custom-select" onchange="document.location.href=this.value" >
                                <?php foreach ($atingencias as $atingencias_item) { ?>
                                <option value="../../proyectos_consejo/actualizar_atingencia/<?= $proyectos_consejo_item['cve_proyecto'] ?>/<?= $proyectos_consejo_item['cve_consejo'] ?>/<?= $atingencias_item['cve_atingencia'] ?>"  <?= ($proyectos_consejo_item['cve_atingencia'] == $atingencias_item['cve_atingencia']) ? 'selected' : '' ?>   ><?= $atingencias_item['nom_atingencia'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-1">
                            <a style="color: #f00" href="<?= base_url() ?>proyectos_consejo/eliminar_registro/<?= $proyectos_consejo_item['cve_proyecto'] ?>/<?= $proyectos_consejo_item['cve_consejo'] ?>"><span data-feather="x-circle"></span></a>
                        </div>
                    <?php } else { ?>
                        <div class="col-md-2">
                            <p><?= $proyectos_consejo_item['nom_preparacion'] ?></p>
                        </div>
                        <div class="col-md-2">
                            <p><?= $proyectos_consejo_item['nom_plazo'] ?></p>
                        </div>
                        <div class="col-md-2">
                            <p><?= $proyectos_consejo_item['objetivo_definido'] ?></p>
                        </div>
                        <div class="col-md-2">
                            <p><?= $proyectos_consejo_item['nom_atingencia'] ?></p>
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>
    </div>
    <?php if ($cve_rol == 'usr') { ?>
    <div class="card-footer">
        <form method="post" action="<?= base_url() ?>proyectos_consejo/guardar">
            <div class="row">
                <div class="col-md-3">
                    <input type="text" class="form-control" name="nom_proyecto" id="nom_proyecto">
                </div>
                <div class="col-md-2">
                    <select class="custom-select" name="cve_preparacion" id="cve_preparacion">
                        <?php foreach ($preparaciones as $preparaciones_item) { ?>
                        <option value="<?= $preparaciones_item['cve_preparacion'] ?>"><?= $preparaciones_item['nom_preparacion'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-md-2">
                    <select class="custom-select" name="cve_plazo" id="cve_plazo">
                        <?php foreach ($plazos as $plazos_item) { ?>
                        <option value="<?= $plazos_item['cve_plazo'] ?>"><?= $plazos_item['nom_plazo'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-md-2">
                    <select class="custom-select" name="objetivo_definido" id="objetivo_definido">
                        <option value="s">Si</option>
                        <option value="n">No</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <select class="custom-select" name="cve_atingencia" id="cve_atingencia">
                        <?php foreach ($atingencias as $atingencias_item) { ?>
                        <option value="<?= $atingencias_item['cve_atingencia'] ?>"><?= $atingencias_item['nom_atingencia'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-md-1">
                    <button type="submit" class="btn btn-primary">Agregar</button>
                </div>
            </div>
            <input type="hidden" name="cve_consejo" id="cve_consejo" value="<?= $consejos['cve_consejo'] ?>">
            <input type="hidden" name="dependencia" id="dependencia" value="<?= $consejos['dependencia'] ?>">
            <input type="hidden" name="area" id="area" value="<?= $consejos['area'] ?>">
        </form>
    </div>
    <?php } ?>
</div>


