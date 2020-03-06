<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4 mb-3">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <div class="col-sm-12 alternate-color">
            <div class="row">
                <div class="col-sm-3 text-left">
                    <h1 class="h2">Actores</h1>
                </div>
                <div class="col-sm-7 align-self-center">
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                        <label class="btn btn-secondary btn-sm active">
                            <input type="radio" name="status" id="activos" autocomplete="off" checked> Activos
                        </label>
                        <label class="btn btn-secondary btn-sm">
                            <input type="radio" name="status" id="inactivos" autocomplete="off"> Inactivos
                        </label>
                    </div>
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                        <label class="btn btn-secondary btn-sm active">
                            <input type="radio" name="tipo" id="internos" autocomplete="off" checked> Internos
                        </label>
                        <label class="btn btn-secondary btn-sm">
                            <input type="radio" name="tipo" id="externos" autocomplete="off"> Externos
                        </label>
                    </div>
                    <div class="btn-group" role="group">
                        <button id="btn_sector" type="button" class="btn btn-secondary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Sector</button>
                        <div class="dropdown-menu" aria-labelledby="btn_sector">
                            <a class="dropdown-item" href="#">Todos</a>
                            <a class="dropdown-item" href="#">Académico</a>
                            <a class="dropdown-item" href="#">Empresarial</a>
                            <a class="dropdown-item" href="#">Organismo social</a>
                            <a class="dropdown-item" href="#">Ciudadano independiente</a>
                            <a class="dropdown-item" href="#">Funcionario federal</a>
                            <a class="dropdown-item" href="#">Funcionario estatal</a>
                            <a class="dropdown-item" href="#">Funcionario municipal</a>
                        </div>
                    </div>
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
                        <p><?= $actores_item['externo_interno'] ?></p>
                    </div>
                    <div class="col-sm-2 align-self-center">
                        <p><?= $actores_item['sector'] ?></p>
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

