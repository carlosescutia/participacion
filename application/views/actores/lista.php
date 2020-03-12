<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4 mb-3">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <div class="col-sm-12 alternate-color">
            <div class="row">
                <div class="col-sm-3 text-left">
                    <h1 class="h2">Actores</h1>
                </div>
                <div class="col-sm-7 align-self-center">
                    <form method="post" action="<?= base_url() ?>actores/lista">
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                            <label class="btn btn-secondary btn-sm <?php if ($activo) { echo 'active'; } ?>">
                                <input type="radio" name="activo" value="1" autocomplete="off" <?php if ($activo) { echo 'checked'; } ?>> Activos
                            </label>
                            <label class="btn btn-secondary btn-sm <?php if (! $activo) { echo 'active'; } ?>">
                                <input type="radio" name="activo" value="0" autocomplete="off" <?php if ( ! $activo) { echo 'checked'; } ?>> Inactivos
                            </label>
                        </div>
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                            <label class="btn btn-secondary btn-sm <?php if ($cve_tipo == '1') { echo 'active'; } ?>">
                                <input type="radio" name="cve_tipo" value="1" autocomplete="off" <?php if ($cve_tipo == '1') { echo 'checked'; } ?>> Consejeros
                            </label>
                            <label class="btn btn-secondary btn-sm <?php if ($cve_tipo == '2') { echo 'active'; } ?>">
                                <input type="radio" name="cve_tipo" value="2" autocomplete="off" <?php if ($cve_tipo == '2') { echo 'checked'; } ?>> Colaboradores
                            </label>
                        </div>
                        <div class="btn-group" role="group">
                            <select class="custom-select custom-select-sm" name="cve_sector">
                                <option value="0" selected>Todos</option>
                                <option value="1">Académico</option>
                                <option value="2">Empresarial</option>
                                <option value="3">Organismo social</option>
                                <option value="4">Ciudadano independiente</option>
                                <option value="5">Funcionario federal</option>
                                <option value="6">Funcionario estatal</option>
                                <option value="7">Funcionario municipal</option>
                            </select>
                        </div>
                        <button class="btn btn-success btn-sm">Filtrar</button>
                    </form>
                </div>
                <div class="col-sm-2 text-right">
                    <a href="<?=base_url()?>actores/nuevo" class="btn btn-primary">Nuevo</a>
                </div>
            </div>
        </div>
    </div>

    <div style="min-height: 46vh">
        <div class="row">
            <div class="col-sm-12 alternate-color">
                <div class="row">
                    <div class="col-sm-4 align-self-center">
                        <p class="small"><strong>Nombre</strong></p>
                    </div>
                    <div class="col-sm-1 align-self-center">
                        <p class="small"><strong>Tipo</strong></p>
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
            <?php foreach ($actores as $actores_item) { ?>
            <div class="col-sm-12 alternate-color">
                <div class="row">
                    <div class="col-sm-4 align-self-center">
                        <a href="<?=base_url()?>actores/detalle/<?=$actores_item['cve_actor']?>"<p><?= $actores_item['nombre'] ?> <?= $actores_item['apellido_pa'] ?> <?= $actores_item['apellido_ma'] ?></p></a>
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
                </div>
            </div>
            <?php } ?>
        </div>
    </div>






</main>

