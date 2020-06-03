<main role="main" class="ml-sm-auto px-4 mb-3">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <div class="col-sm-12 alternate-color">
            <div class="row">
                <div class="col-sm-10 text-left">
                    <h1 class="h2">Modalidades de la sesión</h1>
                </div>
                <div class="col-sm-2 text-right">
                    <form method="post" action="<?= base_url() ?>modalidades_sesion/nuevo">
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
                <?php foreach ($modalidades_sesion as $modalidades_sesion_item) { ?>
                <div class="col-sm-7 alternate-color">
                    <div class="row">
                        <div class="col-sm-3 align-self-center">
                            <p><?= $modalidades_sesion_item['cve_modalidad'] ?></p>
                        </div>
                        <div class="col-sm-8 align-self-center">
                            <a href="<?=base_url()?>modalidades_sesion/detalle/<?=$modalidades_sesion_item['cve_modalidad']?>"><?= $modalidades_sesion_item['nom_modalidad'] ?></a>
                        </div>
                        <div class="col-sm-1">
                            <a style="color: #f00" href="<?= base_url() ?>modalidades_sesion/eliminar/<?= $modalidades_sesion_item['cve_modalidad'] ?>/"><span data-feather="x-circle"></span></a>
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
