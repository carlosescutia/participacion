<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">

    <div class="col-md-12 mb-3 pb-2 pt-3 border-bottom">
        <div class="row">
            <div class="col-md-4">
                <h1 class="h2">Nuevo consejo</h1>
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="card mt-0 mb-3">
            <div class="card-header" style="background-color:#E6D9FA">
                <strong>Datos básicos</strong>
            </div>
            <form method="post" action="<?= base_url() ?>consejos/guardar">
                <div class="card-body">
                    <div class="col-md-12">
                        <?php if ($error): ?>
                        <p class="text-danger"><?php echo $error ?></p>
                        <?php endif ?>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="nom_consejo">Nombre</label>
                            <input type="text" class="form-control border-primary" name="nom_consejo" id="nom_consejo">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="siglas">Siglas</label>
                            <input type="text" class="form-control border-primary" name="siglas" id="siglas">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="cve_tipo">Tipo</label>
                            <select class="custom-select" name="cve_tipo" id="cve_tipo">
                                <option value=""></option>
                                <?php foreach ($tipo_consejos as $tipo_consejos_item) { ?>
                                <option value="<?= $tipo_consejos_item['cve_tipo'] ?>"><?= $tipo_consejos_item['nom_tipo'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="cve_eje">Eje</label>
                            <select class="custom-select" name="cve_eje" id="cve_eje">
                                <option value=""></option>
                                <?php foreach ($ejes as $ejes_item) { ?>
                                <option value="<?= $ejes_item['cve_eje'] ?>"><?= $ejes_item['nom_eje'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="soporte_juridico">Soporte jurídico</label>
                            <input type="text" class="form-control " name="soporte_juridico" id="soporte_juridico">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="reglamento_interno">¿Tiene reglamento interno?</label>
                            <select class="custom-select" name="reglamento_interno" id="reglamento_interno">
                                <option value=""></option>
                                <option value="S">Si</option>
                                <option value="N">No</option>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="fecha_reglamento">Fecha del reglamento interno</label>
                            <input type="date" class="form-control " name="fecha_reglamento" id="fecha_reglamento">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="periodo_inicio">Inicio del periodo</label>
                            <input type="date" class="form-control " name="periodo_inicio" id="periodo_inicio">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="periodo_fin">Fin del periodo</label>
                            <input type="date" class="form-control " name="periodo_fin" id="periodo_fin">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="sesiones_anuales">Sesiones al año</label>
                            <input type="text" class="form-control " name="sesiones_anuales" id="sesiones_anuales">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="integracion">Integración</label>
                            <select class="custom-select" name="integracion" id="integracion">
                                <option value=""></option>
                                <option value="social">Mayoría social</option>
                                <option value="gubernamental">Gubernamental</option>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="fecha_instalacion">Fecha de instalación</label>
                            <input type="date" class="form-control " name="fecha_instalacion" id="fecha_instalacion">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="status">Status</label>
                            <select class="custom-select" name="status" id="status">
                                <option value=""></option>
                                <option value="1">Activo</option>
                                <option value="0">Inactivo</option>
                            </select>
                        </div>
                    </div>

                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>

    <hr />

    <div class="form-group row">
        <div class="col-sm-10">
            <a href="<?=base_url()?>consejos/lista" class="btn btn-secondary">Volver</a>
        </div>
    </div>

</main>


