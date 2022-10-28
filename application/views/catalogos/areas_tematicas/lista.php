<main role="main" class="ml-sm-auto px-4 mb-3">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <div class="col-sm-12 alternate-color">
            <div class="row">
                <div class="col-sm-10 text-left">
                    <h1 class="h2">Areas temáticas</h1>
                </div>
                <div class="col-sm-2 text-right">
                    <form method="post" action="<?= base_url() ?>areas_tematicas/nuevo">
                        <button type="submit" class="btn btn-primary">Nuevo</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-12">
        <div style="min-height: 46vh">
            <div class="row">
                <div class="col-sm-7">
                    <div class="row">
                        <div class="col-sm-3 align-self-center">
                            <p class="small"><strong>Clave</strong></p>
                        </div>
                        <div class="col-sm-8 align-self-center">
                            <p class="small"><strong>Nombre</strong></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php foreach ($areas_tematicas as $areas_tematicas_item) { ?>
                <div class="col-sm-7 alternate-color">
                    <div class="row">
                        <div class="col-sm-3 align-self-center">
                            <p><?= $areas_tematicas_item['cve_area_tematica'] ?></p>
                        </div>
                        <div class="col-sm-8 align-self-center">
                            <a href="<?=base_url()?>areas_tematicas/detalle/<?=$areas_tematicas_item['cve_area_tematica']?>"><?= $areas_tematicas_item['nom_area_tematica'] ?></a>
                        </div>
                        <div class="col-sm-1">
                            <a style="color: #f00" href="<?= base_url() ?>areas_tematicas/eliminar/<?= $areas_tematicas_item['cve_area_tematica'] ?>/"><span data-feather="x-circle"></span></a>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>

    <hr />

    <div class="form-group row">
        <div class="col-sm-10">
            <a href="<?=base_url()?>catalogos/lista" class="btn btn-secondary">Volver</a>
        </div>
    </div>
</main>
