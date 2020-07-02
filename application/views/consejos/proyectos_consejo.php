<div class="card mt-0 mb-3">
    <div class="card-header" style="background-color:#E6D9FA">
        <strong>Proyectos del consejo</strong>
    </div>
    <div class="card-body p-0">
        <div class="col-md-12">
            <?php if ($error_proyectos_consejo): ?>
            <p class="text-danger"><?php echo $error_proyectos_consejo ?></p>
            <?php endif ?>
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Preparación</th>
                        <th scope="col">Plazo de ejecución</th>
                        <th scope="col">Objetivo definido?</th>
                        <th scope="col">Atingencia al prg de reactiv.</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($proyectos_consejo as $proyectos_consejo_item) { ?>
                    <tr>
                        <td><?= $proyectos_consejo_item['nom_proyecto'] ?></td>

                        <?php if ($cve_rol == 'usr') { ?>
                            <td>
                                <select class="custom-select" onchange="document.location.href=this.value" >
                                    <?php foreach ($preparaciones as $preparaciones_item) { ?>
                                    <option value="../../proyectos_consejo/actualizar_preparacion/<?= $proyectos_consejo_item['cve_proyecto'] ?>/<?= $proyectos_consejo_item['cve_consejo'] ?>/<?= $preparaciones_item['cve_preparacion'] ?>"  <?= ($proyectos_consejo_item['cve_preparacion'] == $preparaciones_item['cve_preparacion']) ? 'selected' : '' ?>   ><?= $preparaciones_item['nom_preparacion'] ?></option>
                                    <?php } ?>
                                </select>
                            </td>
                            <td>
                                <select class="custom-select" onchange="document.location.href=this.value" >
                                    <?php foreach ($plazos as $plazos_item) { ?>
                                    <option value="../../proyectos_consejo/actualizar_plazo/<?= $proyectos_consejo_item['cve_proyecto'] ?>/<?= $proyectos_consejo_item['cve_consejo'] ?>/<?= $plazos_item['cve_plazo'] ?>"  <?= ($proyectos_consejo_item['cve_plazo'] == $plazos_item['cve_plazo']) ? 'selected' : '' ?>   ><?= $plazos_item['nom_plazo'] ?></option>
                                    <?php } ?>
                                </select>
                            </td>
                            <td>
                                <select class="custom-select" onchange="document.location.href=this.value" >
                                    <option value="../../proyectos_consejo/actualizar_objetivo/<?= $proyectos_consejo_item['cve_proyecto'] ?>/<?= $proyectos_consejo_item['cve_consejo'] ?>/s"  <?= ($proyectos_consejo_item['objetivo_definido'] == 's') ? 'selected' : '' ?> >Si</option>
                                    <option value="../../proyectos_consejo/actualizar_objetivo/<?= $proyectos_consejo_item['cve_proyecto'] ?>/<?= $proyectos_consejo_item['cve_consejo'] ?>/n"  <?= ($proyectos_consejo_item['objetivo_definido'] == 'n') ? 'selected' : '' ?> >No</option>
                                </select>
                            </td>
                            <td>
                                <select class="custom-select" onchange="document.location.href=this.value" >
                                    <?php foreach ($atingencias as $atingencias_item) { ?>
                                    <option value="../../proyectos_consejo/actualizar_atingencia/<?= $proyectos_consejo_item['cve_proyecto'] ?>/<?= $proyectos_consejo_item['cve_consejo'] ?>/<?= $atingencias_item['cve_atingencia'] ?>"  <?= ($proyectos_consejo_item['cve_atingencia'] == $atingencias_item['cve_atingencia']) ? 'selected' : '' ?>   ><?= $atingencias_item['nom_atingencia'] ?></option>
                                    <?php } ?>
                                </select>
                            </td>
                            <td><a style="color: #f00" href="<?= base_url() ?>proyectos_consejo/eliminar_registro/<?= $proyectos_consejo_item['cve_proyecto'] ?>/<?= $proyectos_consejo_item['cve_consejo'] ?>"><span data-feather="x-circle"></span></a></td>
                        <?php } else { ?>
                            <td><?= $proyectos_consejo_item['nom_preparacion'] ?></td>
                            <td><?= $proyectos_consejo_item['nom_plazo'] ?></td>
                            <td><?= $proyectos_consejo_item['objetivo_definido'] ?></td>
                            <td><?= $proyectos_consejo_item['nom_atingencia'] ?></td>
                        <?php } ?>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php if ($cve_rol == 'usr') { ?>
    <div class="card-footer">
        <form method="post" action="<?= base_url() ?>proyectos_consejo/guardar">
            <div class="form-row">
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


