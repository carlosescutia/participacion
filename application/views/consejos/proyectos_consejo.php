<div class="card mt-0 mb-3">
    <div class="card-header" style="background-color:#E6D9FA">
        <strong>Proyectos del consejo</strong>
    </div>
    <div class="card-body p-0">
        <div class="col-md-12 alternate-color">
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
                        <p><a href="<?= base_url() ?>proyectos_consejo/detalle/<?=$proyectos_consejo_item['cve_proyecto']?>"><?= $proyectos_consejo_item['nom_proyecto'] ?></a></p>
                    </div>
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
                    <?php if ($cve_rol == 'usr') { ?>
                        <div class="col-md-1">
                            <a style="color: #f00" href="<?= base_url() ?>proyectos_consejo/eliminar_registro/<?= $proyectos_consejo_item['cve_proyecto'] ?>/<?= $proyectos_consejo_item['cve_consejo'] ?>"><span data-feather="x-circle"></span></a>
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>
    </div>
    <?php if ($cve_rol == 'usr') { ?>
    <div class="card-footer">
        <form method="post" action="<?= base_url() ?>proyectos_consejo/guardar/<?= $consejos['cve_consejo'] ?>">
            <button type="submit" class="btn btn-primary">Nuevo proyecto</button>
        </form>
    </div>
    <?php } ?>
</div>


