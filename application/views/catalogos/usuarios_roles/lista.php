<main role="main" class="ml-sm-auto px-4 mb-3">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <div class="col-sm-12 alternate-color">
            <div class="row">
                <div class="col-sm-10 text-left">
                    <h1 class="h2">Asignación de roles a usuarios</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-12">
        <div style="min-height: 46vh">
            <div class="row">
                <div class="col-sm-7">
                    <div class="row">
                        <div class="col-sm-5 align-self-center">
                            <p class="small"><strong>Usuario</strong></p>
                        </div>
                        <div class="col-sm-6 align-self-center">
                            <p class="small"><strong>Rol</strong></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php foreach ($usuarios_roles as $usuarios_roles_item) { ?>
                <div class="col-sm-7 alternate-color">
                    <div class="row">
                        <div class="col-sm-5 align-self-center">
                            <p><?= $usuarios_roles_item['cve_usuario'] ?> <?= $usuarios_roles_item['nom_usuario'] ?></p>
                        </div>
                        <div class="col-sm-6 align-self-center">
                            <p><?= $usuarios_roles_item['nom_rol'] ?></p>
                        </div>
                        <div class="col-sm-1">
                            <a style="color: #f00" href="<?= base_url() ?>usuarios_roles/eliminar/<?= $usuarios_roles_item['cve_usuario'] ?>/<?= $usuarios_roles_item['cve_rol'] ?>"><span data-feather="x-circle"></span></a>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>

    <div class="col-sm-7 mt-5">
        <form method="post" action="<?= base_url() ?>usuarios_roles/guardar">
            <div class="row">
                <div class="col">
                    <select class="custom-select" name="cve_usuario" id="cve_usuario">
                        <?php foreach ($usuarios as $usuarios_item) { ?>
                        <option value="<?= $usuarios_item['clave'] ?>"><?= $usuarios_item['clave'] ?> <?= $usuarios_item['nombre'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col">
                    <select class="custom-select" name="cve_rol" id="cve_rol">
                        <?php foreach ($roles as $roles_item) { ?>
                        <option value="<?= $roles_item['cve_rol'] ?>"><?= $roles_item['nom_rol'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col">
                    <button type="submit" class="btn btn-primary">Agregar</button>
                </div>
            </div>
        </form>
    </div>

    <hr />

    <div class="form-group row">
        <div class="col-sm-10">
            <a href="<?=base_url()?>catalogos/lista" class="btn btn-secondary">Volver</a>
        </div>
    </div>
</main>
