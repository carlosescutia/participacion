<main role="main" class="ml-sm-auto px-4 mb-3">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <div class="col-sm-12 alternate-color">
            <div class="row">
                <div class="col-sm-10 text-left">
                    <h1 class="h2">Usuarios</h1>
                </div>
                <div class="col-sm-2 text-right">
                    <form method="post" action="<?= base_url() ?>usuarios/nuevo">
                        <button type="submit" class="btn btn-primary">Nuevo</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-12">
        <div style="min-height: 46vh">
            <div class="row">
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-sm-1 align-self-center">
                            <p class="small"><strong>Clave</strong></p>
                        </div>
                        <div class="col-sm-3 align-self-center">
                            <p class="small"><strong>Nombre</strong></p>
                        </div>
                        <div class="col-sm-3 align-self-center">
                            <p class="small"><strong>Usuario</strong></p>
                        </div>
                        <div class="col-sm-1 align-self-center">
                            <p class="small"><strong>Password</strong></p>
                        </div>
                        <div class="col-sm-1 align-self-center">
                            <p class="small"><strong>Dependencia</strong></p>
                        </div>
                        <div class="col-sm-1 align-self-center">
                            <p class="small"><strong>Activo</strong></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php foreach ($usuarios as $usuarios_item) { ?>
                <div class="col-sm-12 alternate-color">
                    <div class="row">
                        <div class="col-sm-1 align-self-center">
                            <p><?= $usuarios_item['clave'] ?></p>
                        </div>
                        <div class="col-sm-3 align-self-center">
                            <a href="<?=base_url()?>usuarios/detalle/<?=$usuarios_item['clave']?>"><?= $usuarios_item['nombre'] ?></a>
                        </div>
                        <div class="col-sm-3 align-self-center">
                            <p><?= $usuarios_item['usuario'] ?></p>
                        </div>
                        <div class="col-sm-1 align-self-center">
                            <p><?= $usuarios_item['password'] ?></p>
                        </div>
                        <div class="col-sm-1 align-self-center">
                            <p><?= $usuarios_item['dependencia'] ?></p>
                        </div>
                        <div class="col-sm-1 align-self-center">
                            <p><?= $usuarios_item['activo'] ?></p>
                        </div>
                        <div class="col-sm-1">
                            <a style="color: #f00" href="<?= base_url() ?>usuarios/eliminar/<?= $usuarios_item['clave'] ?>/"><span data-feather="x-circle"></span></a>
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
