<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Actores</h1>
        <button type="button" class="btn btn-primary">Nuevo</button>
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
                        <a href="<?=base_url()?>actores/detalle/<?=$actores_item['cve_actor']?>"<p class="small" style="margin-top: .85rem !important;"><?= $actores_item['nombre'] ?> <?= $actores_item['apellido_pa'] ?> <?= $actores_item['apellido_ma'] ?></p></a>
                    </div>
                    <div class="col-sm-1 align-self-center">
                        <p class="small"><?= $actores_item['externo_interno'] ?></p>
                    </div>
                    <div class="col-sm-2 align-self-center">
                        <p class="small"><?= $actores_item['sector'] ?></p>
                    </div>
                    <div class="col-sm-2 align-self-center">
                        <p class="small"><?= $actores_item['organizacion'] ?></p>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>






</main>

