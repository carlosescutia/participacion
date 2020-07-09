<div class="card mt-0 mb-3">
    <div class="card-header" style="background-color:#E6D9FA">
        <strong>Calendario de sesiones</strong>
    </div>
    <div class="card-body p-0">
        <div class="col-md-12 alternate-color">
            <?php if ($error_calendario_sesion): ?>
            <p class="text-danger"><?php echo $error_calendario_sesion ?></p>
            <?php endif ?>

            <div class="row">
                <div class="col-md-4">
                    <strong>Sesión</strong>
                </div>
                <div class="col-md-2">
                    <strong>Fecha</strong>
                </div>
                <div class="col-md-2">
                    <strong>Hora</strong>
                </div>
                <div class="col-md-2">
                    <strong>Status</strong>
                </div>
            </div>
            <?php foreach ($calendario_sesiones as $calendario_sesiones_item) { ?>
                <div class="row">
                    <div class="col-md-4">
                        <p><?= $calendario_sesiones_item['nom_sesion'] ?></p>
                    </div>
                    <div class="col-md-2">
                        <p><?= date('d/m/y', strtotime($calendario_sesiones_item['fecha'])) ?></p>
                    </div>
                    <div class="col-md-2">
                        <p><?= $calendario_sesiones_item['hora'] ?></p>
                    </div>
                    <?php if ($cve_rol == 'usr') { ?>
                        <div class="col-md-2">
                            <select class="custom-select" onchange="document.location.href=this.value" >
                                <?php foreach ($status_sesiones as $status_sesiones_item) { ?>
                                <option value="../../calendario_sesiones/actualizar_status/<?= $calendario_sesiones_item['cve_evento'] ?>/<?= $calendario_sesiones_item['cve_consejo'] ?>/<?= $status_sesiones_item['cve_status'] ?>"  <?= ($calendario_sesiones_item['cve_status'] == $status_sesiones_item['cve_status']) ? 'selected' : '' ?>   ><?= $status_sesiones_item['nom_status'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-1">
                            <a style="color: #f00" href="<?= base_url() ?>calendario_sesiones/eliminar_registro/<?= $calendario_sesiones_item['cve_evento'] ?>/<?= $calendario_sesiones_item['cve_consejo'] ?>"><span data-feather="x-circle"></span></a>
                        </div>
                    <?php } else { ?>
                        <div class="col-md-2">
                            <p><?= $calendario_sesiones_item['nom_status'] ?></p>
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>
    </div>
    <?php if ($cve_rol == 'usr') { ?>
    <div class="card-footer">
        <form method="post" action="<?= base_url() ?>calendario_sesiones/guardar">
            <div class="row">
                <div class="col-md-4">
                    <input type="text" class="form-control" name="nom_sesion" id="nom_sesion">
                </div>
                <div class="col-md-2">
                    <input type="date" class="form-control" name="fecha" id="fecha">
                </div>
                <div class="col-md-2">
                    <input type="time" class="form-control" name="hora" id="hora">
                </div>
                <div class="col-md-2">
                    <select class="custom-select" name="cve_status" id="cve_status">
                        <?php foreach ($status_sesiones as $status_sesiones_item) { ?>
                        <option value="<?= $status_sesiones_item['cve_status'] ?>"><?= $status_sesiones_item['nom_status'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-md-1">
                    <button type="submit" class="btn btn-primary">Agregar</button>
                </div>
            </div>
            <input type="hidden" name="cve_consejo" id="cve_consejo" value="<?= $consejos['cve_consejo'] ?>">
        </form>
    </div>
    <?php } ?>
</div>

