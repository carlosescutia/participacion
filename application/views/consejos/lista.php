<main role="main" class="ml-sm-auto px-4 mb-3">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <div class="col-sm-12 alternate-color">
            <div class="row">
                <div class="col-sm-10 text-left">
                    <h1 class="h2">Consejos</h1>
                </div>
                <?php if (in_array('99', $accesos_sistema_rol)) { ?>
                <div class="col-sm-2 text-right">
                    <form method="post" action="<?= base_url() ?>consejos/guardar">
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
                    <div class="col-sm-6 align-self-center">
                        <p class="small"><strong>Nombre</strong></p>
                    </div>
                    <div class="col-sm-1 align-self-center">
                        <p class="small"><strong>Siglas</strong></p>
                    </div>
                    <div class="col-sm-2 align-self-center">
                        <p class="small"><strong>Periodo</strong></p>
                    </div>
                    <div class="col-sm-1 align-self-center">
                        <p class="small"><strong>Status</strong></p>
                    </div>
                </div>
            </div>
        </div>
        <hr />
        <div class="row">
            <div class="col-sm-12">
                <ol class="list-unstyled" id="lista_consejos">
                    <?php foreach ($consejos as $consejos_item) { ?>
                    <div class="col-sm-12 alternate-color">
                        <li><span>
                            <div class="row">
                                <div class="col-sm-6 align-self-center">
                                    <a href="<?=base_url()?>consejos/detalle/<?=$consejos_item['cve_consejo']?>"><p><?= $consejos_item['nom_consejo'] ?></p></a>
                                </div>
                                <div class="col-sm-1 align-self-center">
                                    <p><?= $consejos_item['siglas'] ?></p>
                                </div>
                                <div class="col-sm-2 align-self-center">
                                    <p><?= date('d/m/y', strtotime($consejos_item['periodo_inicio'])) ?> a <?= date('d/m/y', strtotime($consejos_item['periodo_fin'])) ?></p>
                                </div>
                                <div class="col-sm-1 align-self-center">
                                    <p><?= $consejos_item['nom_status'] ?></p>
                                </div>
                            </div>
                        </span></li>
                    </div>
                    <?php } ?>
                </ol>
            </div>
        </div>
    </div>

</main>
