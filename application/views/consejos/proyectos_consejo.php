<div class="card mt-0 mb-3">
    <div class="card-header" style="background-color:#E6D9FA">
        <strong>Proyectos del consejo</strong>
    </div>
    <div class="card-body p-0">
        <div class="col-md-12">
            <?php if ($error_proyectos_consejo): ?>
            <p class="text-danger"><?php echo $error_proyectos_consejo ?></p>
            <?php endif ?>
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Preparación</th>
                        <th scope="col">Plazo de ejecución</th>
                        <th scope="col">Objetivo definido?</th>
                        <th scope="col">Atingencia al prg de reactiv.</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($proyectos_consejo as $proyectos_consejo_item) { ?>
                    <tr>
                        <td><?= $proyectos_consejo_item['nom_proyecto'] ?></td>
                        <td><?= $proyectos_consejo_item['cve_preparacion'] ?></td>
                        <td><?= $proyectos_consejo_item['cve_plazo'] ?></td>
                        <td><?= $proyectos_consejo_item['objetivo_definido'] ?></td>
                        <td><?= $proyectos_consejo_item['cve_atingencia'] ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php if ($cve_rol == 'usr') { ?>
    <div class="card-footer">
        <form method="post" action="<?= base_url() ?>proyectos_consejo/guardar">
            <div class="form-row">
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


