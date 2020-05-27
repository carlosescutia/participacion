<main role="main" class="ml-sm-auto px-4">

    <form method="post" action="<?= base_url() ?>usuarios/guardar/<?= $usuarios['clave'] ?>">

        <div class="col-md-12 mb-3 pb-2 pt-3 border-bottom">
            <div class="row">
                <div class="col-md-10">
                    <h1 class="h2">Editar usuario</h1>
                </div>
                <div class="col-md-2 text-right">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group row">
                <label for="clave" class="col-sm-2 col-form-label">Clave</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="clave" id="clave" value="<?=$usuarios['clave'] ?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="nombre" class="col-sm-2 col-form-label">Nombre</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="nombre" id="nombre" value="<?=$usuarios['nombre'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="usuario" class="col-sm-2 col-form-label">Usuario</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="usuario" id="usuario" value="<?=$usuarios['usuario'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="password" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="password" id="password" value="<?=$usuarios['password'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="dependencia" class="col-sm-2 col-form-label">Dependencia</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="dependencia" id="dependencia" value="<?=$usuarios['dependencia'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="activo" class="col-sm-2 col-form-label">Activo</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="activo" id="activo" value="<?=$usuarios['activo'] ?>">
                </div>
            </div>
        </div>

    </form>


    <hr />

    <div class="form-group row">
        <div class="col-sm-10">
            <a href="<?=base_url()?>usuarios/lista" class="btn btn-secondary">Volver</a>
        </div>
    </div>

</main>

