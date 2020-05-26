<main role="main" class="ml-sm-auto px-4 mb-3">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <div class="col-sm-12 alternate-color">
            <div class="row">
                <div class="col-sm-10 text-left">
                    <h1 class="h2">Cargos</h1>
                </div>
                <div class="col-sm-2 text-right">
                    <form method="post" action="<?= base_url() ?>cargos/nuevo">
                        <button type="submit" class="btn btn-primary">Nuevo</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div style="min-height: 46vh">
        <div class="row">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col">Clave</th>
                        <th scope="col">Nombre</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($cargos as $cargos_item) { ?>
                        <tr>
                            <td><?= $cargos_item['cve_cargo'] ?></td>
                            <td><a href="<?=base_url()?>cargos/detalle/<?=$cargos_item['cve_cargo']?>"><?= $cargos_item['nom_cargo'] ?></a></td>
                            <td><a style="color: #f00" href="<?= base_url() ?>cargos/eliminar/<?= $cargos_item['cve_cargo'] ?>/"><span data-feather="x-circle"></span></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

    <hr />

    <div class="form-group row">
        <div class="col-sm-10">
            <a href="<?=base_url()?>catalogos/lista" class="btn btn-secondary">Volver</a>
        </div>
    </div>
</main>
