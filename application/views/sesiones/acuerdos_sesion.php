<div class="card mt-0 mb-3">
    <div class="card-header" style="background-color:#E6D9FA">
        <strong>Acuerdos</strong>
    </div>
    <div class="card-body p-0">
        <div class="col-md-12">
<!--
            <?php if ($error_acuerdos_sesion): ?>
            <p class="text-danger"><?php echo $error_acuerdos_sesion ?></p>
            <?php endif ?>
            -->
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col">Acuerdo</th>
                        <th scope="col">Observaciones</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($acuerdos_sesion as $acuerdos_sesion_item) { ?>
                    <tr>
                        <td><?= $acuerdos_sesion_item['nom_acuerdo'] ?></td>
                        <td><?= $acuerdos_sesion_item['observaciones'] ?></td>
                        <td>
                            <select class="custom-select" onchange="document.location.href=this.value" >
                                <?php foreach ($status_acuerdos_sesion as $status_acuerdos_sesion_item) { ?>
                                <option value="../../acuerdos_sesion/actualizar_status/<?= $acuerdos_sesion_item['cve_sesion'] ?>/<?= $acuerdos_sesion_item['cve_consejo'] ?>/<?= $status_acuerdos_sesion_item['cve_status'] ?>"  <?= ($acuerdos_sesion_item['cve_status'] == $status_acuerdos_sesion_item['cve_status']) ? 'selected' : '' ?>   ><?= $status_acuerdos_sesion_item['nom_status'] ?></option>
                                <?php } ?>
                            </select>
                        </td>
                        <td><a style="color: #f00" href="<?= base_url() ?>acuerdos_sesion/eliminar_registro/<?= $acuerdos_sesion_item['cve_sesion'] ?>/<?= $acuerdos_sesion_item['cve_consejo'] ?>"><span data-feather="x-circle"></span></a>
                        </div>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer">
        <form method="post" action="<?= base_url() ?>acuerdos_sesion/guardar">
            <div class="form-row">
                <div class="col-md-4">
                    <input type="text" class="form-control" name="nom_acuerdo" id="nom_acuerdo">
                </div>
                <div class="col-md-4">
                    <input type="text" class="form-control" name="observaciones" id="observaciones">
                </div>
                <div class="col-md-2">
                    <select class="custom-select" name="cve_status" id="cve_status">
<!--
                        <?php foreach ($status_sesion as $status_sesion_item) { ?>
                        <option value="<?= $status_sesion_item['cve_status'] ?>"><?= $status_sesion_item['nom_status'] ?></option>
                        <?php } ?>
                        -->
                    </select>
                </div>
                <div class="col-md-1">
                    <button type="submit" class="btn btn-primary">Agregar</button>
                </div>
            </div>
<!--
            <input type="hidden" name="cve_consejo" id="cve_consejo" value="<?= $consejos['cve_consejo'] ?>">
-->
        </form>
    </div>
</div>


