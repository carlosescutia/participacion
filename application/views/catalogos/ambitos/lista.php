<main role="main" class="ml-sm-auto px-4 mb-3">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <div class="col-sm-12 alternate-color">
            <div class="row">
                <div class="col-sm-10 text-left">
                    <h1 class="h2">Ambitos</h1>
                </div>
                <div class="col-sm-2 text-right">
                    <form method="post" action="<?= base_url() ?>ambitos/nuevo">
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
                    <?php foreach ($ambitos as $ambitos_item) { ?>
                        <tr>
                            <td><?= $ambitos_item['cve_ambito'] ?></td>
                            <td><a href="<?=base_url()?>ambitos/detalle/<?=$ambitos_item['cve_ambito']?>"><?= $ambitos_item['nom_ambito'] ?></a></td>
                            <td><a style="color: #f00" href="<?= base_url() ?>ambitos/eliminar/<?= $ambitos_item['cve_ambito'] ?>/"><span data-feather="x-circle"></span></a>
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
