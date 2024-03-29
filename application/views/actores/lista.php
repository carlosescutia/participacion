<main role="main" class="ml-sm-auto px-4 mb-3">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <div class="col-sm-12 alternate-color">
            <div class="row">
                <div class="col-sm-3 text-left">
                    <h1 class="h2">Actores</h1>
                </div>
                <div class="col-sm-7 align-self-center">
                    <form method="post" action="<?= base_url() ?>actores/lista">
                        <div class="form-row">
                            <div class="col-3">
                                <select class="custom-select custom-select-sm" name="activo">
                                    <option value="-1" <?= ($activo == '-1') ? 'selected' : '' ?> >Activos e inactivos</option>
                                    <option value="1" <?= ($activo == '1') ? 'selected' : '' ?> >Activos</option>
                                    <option value="0" <?= ($activo == '0') ? 'selected' : '' ?> >Inactivos</option>
                                </select>
                            </div>
                            <div class="col-3">
                                <select class="custom-select custom-select-sm" name="cve_tipo">
                                    <option value="0" <?= ($cve_tipo == '0') ? 'selected' : '' ?>>Todos los tipos de actores</option>
                                    <?php foreach ($tipo_actores as $tipo_actores_item) { ?>
                                        <option value="<?= $tipo_actores_item['cve_tipo'] ?>" <?= ($cve_tipo == $tipo_actores_item['cve_tipo']) ? 'selected' : '' ?>><?= $tipo_actores_item['nom_tipo'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-3">
                                <select class="custom-select custom-select-sm" name="cve_sector">
                                    <option value="0" <?= ($cve_sector == '0') ? 'selected' : '' ?>>Todos los sectores</option>
                                    <?php foreach ($sectores as $sectores_item) { ?>
                                        <option value="<?= $sectores_item['cve_sector'] ?>" <?= ($cve_sector == $sectores_item['cve_sector']) ? 'selected' : '' ?>><?= $sectores_item['nom_sector'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-1">
                                <button class="btn btn-success btn-sm">Filtrar</button>
                            </div>
                        </div>
                    </form>
                </div>
                <?php if (in_array('99', $accesos_sistema_rol)) { ?>
                <div class="col-sm-2 text-right">
                    <form method="post" action="<?= base_url() ?>actores/guardar">
                        <button type="submit" class="btn btn-primary">Nuevo</button>
                    </form>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>

    <div style="min-height: 46vh">
        <div class="row">
            <div class="col-sm-12 alternate-color">
                <div class="row">
                    <div class="col-sm-1 align-self-center">
                        <p class="small"><strong>Nombre(s)</strong></p>
                    </div>
                    <div class="col-sm-3 align-self-center">
                        <input id="filtro_actores" class="form-control form-control-sm" type="text" placeholder="Filtrar actores">
                    </div>
                    <div class="col-sm-1 align-self-center">
                        <p class="small"><strong>Naturaleza de la participación</strong></p>
                    </div>
                    <div class="col-sm-2 align-self-center">
                        <p class="small"><strong>Sector</strong></p>
                    </div>
                    <div class="col-sm-2 align-self-center">
                        <p class="small"><strong>Organización</strong></p>
                    </div>
                    <div class="col-sm-2 align-self-center">
                        <p class="small"><strong>Consejo(s)</strong></p>
                    </div>
                </div>
            </div>
        </div>
        <hr />
        <div class="row">
            <div class="col-sm-12">
                <ol class="list-unstyled" id="lista_actores">
                    <?php foreach ($actores as $actores_item) { ?>
                    <div class="col-sm-12 alternate-color">
                        <li><span>
                            <div class="row">
                                <div class="col-sm-4 align-self-center">
                                    <a href="<?=base_url()?>actores/detalle/<?=$actores_item['cve_actor']?>"><p><?= $actores_item['nombre'] ?> <?= $actores_item['apellido_pa'] ?> <?= $actores_item['apellido_ma'] ?></p></a>
                                </div>
                                <div class="col-sm-1 align-self-center">
                                    <p><?= $actores_item['nom_tipo'] ?></p>
                                </div>
                                <div class="col-sm-2 align-self-center">
                                    <p><?= $actores_item['nom_sector'] ?></p>
                                </div>
                                <div class="col-sm-2 align-self-center">
                                    <p><?= $actores_item['organizacion'] ?></p>
                                </div>
                                <div class="col-sm-2 align-self-center">
                                    <p><?= $actores_item['consejos'] ?></p>
                                </div>
                            </div>
                        </span></li>
                    </div>
                    <?php } ?>
                </ol>
            </div>
        </div>
    </div>

    <?php include 'js/inicio.js'; ?>

</main>
