<main role="main" class="ml-sm-auto px-4">

    <form method="post" action="<?= base_url() ?>sesiones/guardar/<?= $sesiones['cve_consejo'] ?>">
    <div class="col-md-12 mb-3 pb-2 pt-3 border-bottom">
        <div class="row">
            <div class="col-md-4">
                <h1 class="h2">Datos de la sesión</h1>
            </div>
            <div class="col-md-6">
                <?php if ($error_sesion): ?>
                <p class="text-danger"><?php echo $error_sesion?></p>
                <?php endif ?>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="row">
            <div class="col-md-9">
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="nom_sesion">Nombre</label>
                        <?php echo form_error('nom_sesion'); ?>
                        <input type="text" class="form-control" name="nom_sesion" id="nom_sesion" value="<?=$sesiones['nom_sesion'] ?>">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="tipo">Tipo</label>
                        <?php echo form_error('tipo'); ?>
                        <select class="custom-select" name="tipo" id="tipo">
                            <option value=""></option>
                            <option value="o" <?= ($sesiones['tipo'] == 'o') ? 'selected' : '' ?> >Ordinaria</option>
                            <option value="n" <?= ($sesiones['tipo'] == 'n') ? 'selected' : '' ?> >Extraordinaria</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="lugar">Lugar</label>
                        <?php echo form_error('lugar'); ?>
                        <input type="text" class="form-control" name="lugar" id="lugar" value="<?=$sesiones['lugar'] ?>">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="fecha">Fecha</label>
                        <?php echo form_error('fecha'); ?>
                        <input type="date" class="form-control" name="fecha" id="fecha" value="<?=$sesiones['fecha'] ?>">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="hora">Hora</label>
                        <?php echo form_error('hora'); ?>
                        <input type="time" class="form-control" name="hora" id="hora" value="<?=$sesiones['hora'] ?>">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="objetivo">Objetivo</label>
                        <?php echo form_error('objetivo'); ?>
                        <textarea rows="6" class="form-control" name="objetivo" id="objetivo"><?=$sesiones['objetivo'] ?></textarea>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="orden_dia">Orden del día</label>
                        <?php echo form_error('orden_dia'); ?>
                        <textarea rows="6" class="form-control" name="orden_dia" id="orden_dia"><?=$sesiones['orden_dia'] ?></textarea>
                    </div>
                </div>
            </div>
            <input type="hidden" name="cve_consejo" id="cve_consejo" value="<?=$sesiones['cve_consejo'] ?>">
            <input type="hidden" name="cve_sesion" id="cve_sesion" value="<?=$sesiones['cve_sesion'] ?>">
            </form>

            <div class="col-md-3">
                <?php include 'adjuntos.php'; ?>
            </div>
        </div>
    </div>

    <div class="col-md-9 mt-3">
        <?php include 'acuerdos_sesion.php' ?>
    </div>

    <hr />

    <div class="form-group row">
        <div class="col-sm-10">
            <a href="<?=base_url()?>consejos/detalle/<?=$sesiones['cve_consejo'] ?>" class="btn btn-secondary">Volver</a>
        </div>
    </div>

</main>
