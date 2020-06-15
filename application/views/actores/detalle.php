<main role="main" class="ml-sm-auto px-4">
    <form method="post" action="<?= base_url() ?>actores/guardar">
        <div class="col-md-12 mb-3 pb-2 pt-3 border-bottom">
            <div class="row">
                <div class="col-md-10">
                    <h1 class="h2">Datos del actor</h1>
                </div>
                <div class="col-md-2">
                    <?php if ($cve_rol != 'adm') { ?>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <?php } ?>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2">
                    <h6><strong>Datos básicos</strong></h6>
                    <div class="form-check text-center">
                        <select class="custom-select form-control-sm" name="activo" id="activo">
                            <option value="1" <?= ($actores['activo'] == '1') ? 'selected' : '' ?>>Activo</option>
                            <option value="0" <?= ($actores['activo'] == '0') ? 'selected' : '' ?>>Inactivo</option>
                        </select>
                        <?php $foto_default = 'adj_actores/default_foto.jpg'; ?>
                        <?php $foto_actor = 'adj_actores/'.$actores['cve_actor'].'_foto.jpg' ; ?>
                        <?php file_exists($foto_actor) ? $foto = $foto_actor : $foto = $foto_default ?>
                        <img src="<?=base_url();?><?=$foto;?>" class="img-fluid img-thumbnail mt-3">
                    </div>
                </div>
                <div class="col-md-10">
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="nombre">Nombre(s)</label>
                            <?php echo form_error('nombre'); ?>
                            <input type="text" class="form-control" name="nombre" id="nombre" value="<?=$actores['nombre'] ?>">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="apellido_pa">Apellido paterno</label>
                            <?php echo form_error('apellido_pa'); ?>
                            <input type="text" class="form-control" name="apellido_pa" id="apellido_pa" value="<?=$actores['apellido_pa'] ?>">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="apellido_ma">Apellido materno</label>
                            <?php echo form_error('apellido_ma'); ?>
                            <input type="text" class="form-control" name="apellido_ma" id="apellido_ma" value="<?=$actores['apellido_ma'] ?>">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="fecha_nacimiento">Fecha de nacimiento</label>
                            <input type="date" class="form-control" name="fecha_nacimiento" id="fecha_nacimiento" value="<?=$actores['fecha_nacimiento'] ?>">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="sexo">Sexo</label>
                            <?php echo form_error('sexo'); ?>
                            <select class="custom-select" name="sexo" id="sexo">
                                <option value=""></option>
                                <option value="F" <?= ($actores['sexo'] == 'F') ? 'selected' : '' ?>>F</option>
                                <option value="M" <?= ($actores['sexo'] == 'M') ? 'selected' : '' ?>>M</option>
                            </select>
                        </div>
                        <div class="form-group col-md-5">
                            <label for="expediente_archivistico">Expediente archivístico</label>
                            <input type="text" class="form-control" name="expediente_archivistico" id="expediente_archivistico" value="<?=$actores['expediente_archivistico'] ?>">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-5">
                            <label for="calle">Calle</label>
                            <input type="text" class="form-control" name="calle" id="calle" value="<?=$actores['calle'] ?>">
                        </div>
                        <div class="form-group col-md-1">
                            <label for="num_exterior"># ext.</label>
                            <input type="text" class="form-control" name="num_exterior" id="num_exterior" value="<?=$actores['num_exterior'] ?>">
                        </div>
                        <div class="form-group col-md-1">
                            <label for="num_interior"># int.</label>
                            <input type="text" class="form-control" name="num_interior" id="num_interior" value="<?=$actores['num_interior'] ?>">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="colonia">Colonia</label>
                            <input type="text" class="form-control" name="colonia" id="colonia" value="<?=$actores['colonia'] ?>">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <label for="codigo_postal">Código postal</label>
                            <input type="text" class="form-control" name="codigo_postal" id="codigo_postal" value="<?=$actores['codigo_postal'] ?>">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="ciudad">Ciudad</label>
                            <input type="text" class="form-control" name="ciudad" id="ciudad" value="<?=$actores['ciudad'] ?>">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="cve_mun">Municipio</label>
                            <select class="custom-select" name="cve_mun" id="cve_mun">
                                <option value=""></option>
                                <?php foreach ($municipios as $municipios_item) { ?>
                                <option value="<?= $municipios_item['cve_mun'] ?>" <?= ($actores['cve_mun'] == $municipios_item['cve_mun']) ? 'selected' : '' ?> ><?= $municipios_item['nom_mun'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="cve_ent">Estado</label>
                            <select class="custom-select" name="cve_ent" id="cve_ent">
                                <option value=""></option>
                                <?php foreach ($entidades as $entidades_item) { ?>
                                <option value="<?= $entidades_item['cve_ent'] ?>" <?= ($actores['cve_ent'] == $entidades_item['cve_ent']) ? 'selected' : '' ?> ><?= $entidades_item['nom_ent'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <hr />
        </div>

        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2">
                    <h6><strong>Contacto</strong></h6>
                </div>
                <div class="col-md-10">
                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <label for="telefono_fijo">Teléfono</label>
                            <input type="text" class="form-control" name="telefono_fijo" id="telefono_fijo" value="<?=$actores['telefono_fijo'] ?>">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="telefono_celular">Celular</label>
                            <input type="text" class="form-control" name="telefono_celular" id="telefono_celular" value="<?=$actores['telefono_celular'] ?>">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="correo_personal">Correo personal</label>
                            <input type="email" class="form-control" name="correo_personal" id="correo_personal" value="<?=$actores['correo_personal'] ?>">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="correo_laboral">Correo laboral</label>
                            <input type="email" class="form-control" name="correo_laboral" id="correo_laboral" value="<?=$actores['correo_laboral'] ?>">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="organizacion">Organización</label>
                            <input type="text" class="form-control" name="organizacion" id="organizacion" value="<?=$actores['organizacion'] ?>">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="asistente">Asistente</label>
                            <input type="text" class="form-control" name="asistente" id="asistente" value="<?=$actores['asistente'] ?>">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="correo_asistente">Correo asistente</label>
                            <input type="email" class="form-control" name="correo_asistente" id="correo_asistente" value="<?=$actores['correo_asistente'] ?>">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="telefono_asistente">Teléfono asistente</label>
                            <input type="text" class="form-control" name="telefono_asistente" id="telefono_asistente" value="<?=$actores['telefono_asistente'] ?>">
                        </div>
                    </div>
                </div>
            </div>
            <hr />
        </div>

        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2">
                    <h6><strong>Participación</strong></h6>
                </div>
                <div class="col-md-10">
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="cve_tipo">Tipo</label>
                            <?php echo form_error('cve_tipo'); ?>
                            <select class="custom-select" name="cve_tipo" id="cve_tipo">
                                <option value=""></option>
                                <?php foreach ($tipo_actores as $tipo_actores_item) { ?>
                                <option value="<?= $tipo_actores_item['cve_tipo'] ?>" <?= ($actores['cve_tipo'] == $tipo_actores_item['cve_tipo']) ? 'selected' : '' ?> ><?= $tipo_actores_item['nom_tipo'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="cve_ambito">Ámbito</label>
                            <select class="custom-select" name="cve_ambito" id="cve_ambito">
                                <option value=""></option>
                                <?php foreach ($ambitos as $ambitos_item) { ?>
                                <option value="<?= $ambitos_item['cve_ambito'] ?>" <?= ($actores['cve_ambito'] == $ambitos_item['cve_ambito']) ? 'selected' : '' ?> ><?= $ambitos_item['nom_ambito'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="cve_sector">Sector</label>
                            <?php echo form_error('cve_sector'); ?>
                            <select class="custom-select" name="cve_sector" id="cve_sector">
                                <option value=""></option>
                                <?php foreach ($sectores as $sectores_item) { ?>
                                <option value="<?= $sectores_item['cve_sector'] ?>" <?= ($actores['cve_sector'] == $sectores_item['cve_sector']) ? 'selected' : '' ?> ><?= $sectores_item['nom_sector'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <?php if ($consejos_actores) { ?>
                    <div class="form-row">
                        <h4 class="mt-3">Consejos</h4>
                        <div class="form-group col-md-11">
                            <table class="table table-striped table-bordered table-sm mt-3">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">Consejo</th>
                                        <th scope="col">Cargo</th>
                                        <th scope="col">Periodo</th>
                                        <th scope="col">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($consejos_actores as $consejos_actores_item) { ?>
                                    <tr>
                                        <td><?= $consejos_actores_item['nom_consejo'] ?></td>
                                        <td><?= $consejos_actores_item['nom_cargo'] ?></td>
                                        <td><?= date('d/m/y', strtotime($consejos_actores_item['fecha_inicio'])) ?> a <?= date('d/m/y', strtotime($consejos_actores_item['fecha_fin'])) ?></td>
                                        <td><?= $consejos_actores_item['nom_status'] ?></td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <?php } ?>

                </div>
            </div>
            <hr />
        </div>

        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2">
                    <h6><strong>Colaboración</strong></h6>
                </div>
                <div class="col-md-10">
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="otros_espacios">¿Ha participado en otros espacios?</label>
                            <select class="custom-select" name="otros_espacios" id="otros_espacios">
                                <option value="" ></option>
                                <option value="S" <?= ($actores['otros_espacios'] == 'S') ? 'selected' : '' ?>>S</option>
                                <option value="N" <?= ($actores['otros_espacios'] == 'N') ? 'selected' : '' ?>>N</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="experiencia_exitosa">Experiencia más exitosa</label>
                            <input type="text" class="form-control" name="experiencia_exitosa" id="experiencia_exitosa" value="<?=$actores['experiencia_exitosa'] ?>">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="fecha_experiencia_exitosa">Fecha </label>
                            <input type="date" class="form-control" name="fecha_experiencia_exitosa" id="fecha_experiencia_exitosa" value="<?=$actores['fecha_experiencia_exitosa'] ?>">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="desea_colaborar">¿Desea colaborar en otros espacios?</label>
                            <select class="custom-select" name="desea_colaborar" id="desea_colaborar">
                                <option value="" ></option>
                                <option value="S" <?= ($actores['desea_colaborar'] == 'S') ? 'selected' : '' ?>>S</option>
                                <option value="N" <?= ($actores['desea_colaborar'] == 'N') ? 'selected' : '' ?>>N</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="profesion">Profesión</label>
                            <input type="text" class="form-control" name="profesion" id="profesion" value="<?=$actores['profesion'] ?>">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="cve_perfil">Perfil</label>
                            <select class="custom-select" name="cve_perfil" id="cve_perfil">
                                <option value=""></option>
                                <?php foreach ($perfiles as $perfiles_item) { ?>
                                <option value="<?= $perfiles_item['cve_perfil'] ?>" <?= ($actores['cve_perfil'] == $perfiles_item['cve_perfil']) ? 'selected' : '' ?> ><?= $perfiles_item['nom_perfil'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <hr />
        </div>

        <input type="hidden" name="cve_actor" value="<?=$actores['cve_actor']?>">
        <input type="hidden" name="dependencia" value="<?=$actores['dependencia']?>">
        <input type="hidden" name="area" value="<?=$actores['area']?>">

    </form>

        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2">
                    <h6><strong>Adjuntos</strong></h6>
                </div>
                <div class="col-md-10">
                    <div class="row">
                        <div class="text-danger">
                            <?php if ($error_adj_actores): ?>
                                <?php echo $error_adj_actores?>
                            <?php endif ?>
                        </div>
                    </div>
                    
                    <div class="row">
                        <table class="table table-sm table-borderless">
                            <tbody>
                                <tr class="text-center">
                                    <td>
                                        <?php
                                        $cve_actor = $actores['cve_actor'] ;
                                        $arch_actores_adj1 = 'adj_actores/' . $cve_actor . '_adj1.pdf';
                                        if ( file_exists($arch_actores_adj1) ) { ?>
                                        <a href="<?= base_url() ?><?= $arch_actores_adj1 ?>" target="_blank">
                                            <?php } ?>
                                            Adjunto 1 (pdf)
                                            <?php
                                            if ( file_exists($arch_actores_adj1) ) { ?>
                                        </a>
                                        <?php } ?>
                                    </td>

                                    <td>
                                        <?php
                                        $cve_actor = $actores['cve_actor'] ;
                                        $arch_actores_adj2 = 'adj_actores/' . $cve_actor . '_adj2.pdf';
                                        if ( file_exists($arch_actores_adj2) ) { ?>
                                        <a href="<?= base_url() ?><?= $arch_actores_adj2 ?>" target="_blank">
                                            <?php } ?>
                                            Adjunto 2 (pdf)
                                            <?php
                                            if ( file_exists($arch_actores_adj2) ) { ?>
                                        </a>
                                        <?php } ?>
                                    </td>

                                    <td>
                                        <?php
                                        $cve_actor = $actores['cve_actor'] ;
                                        $arch_actores_extras = 'adj_actores/' . $cve_actor . '_extras.zip';
                                        if ( file_exists($arch_actores_extras) ) { ?>
                                        <a href="<?= base_url() ?><?= $arch_actores_extras ?>" target="_blank">
                                            <?php } ?>
                                            Extras (zip)
                                            <?php
                                            if ( file_exists($arch_actores_extras) ) { ?>
                                        </a>
                                        <?php } ?>
                                    </td>

                                    <td>
                                        <?php
                                        $cve_actor = $actores['cve_actor'] ;
                                        $arch_actores_foto = 'adj_actores/' . $cve_actor . '_foto.jpg';
                                        if ( file_exists($arch_actores_foto) ) { ?>
                                        <a href="<?= base_url() ?><?= $arch_actores_foto ?>" target="_blank">
                                            <?php } ?>
                                            Foto (jpg)
                                            <?php
                                            if ( file_exists($arch_actores_foto) ) { ?>
                                        </a>
                                        <?php } ?>
                                    </td>

                                </tr>
                                <tr class="text-center">
                                    <td>
                                        <form method="post" enctype="multipart/form-data" action="<?= base_url() ?>archivos/actores_adj1">
                                            <label class="btn btn-primary btn-sm" for="arch-act-adj1">
                                                <input name="arch-act-adj1" id="arch-act-adj1" type="file" style="display:none"
                                                onchange="$('#arch-act-adj1-info').removeClass('invisible')">
                                                +
                                            </label>
                                            <input type="hidden" name="cve_actor" id="cve_actor" value="<?= $actores['cve_actor'] ?>">
                                            <button id="arch-act-adj1-info" type="submit" class="btn btn-sm invisible" style="background: none; color: #28A745">
                                                <span data-feather="upload"></span>
                                            </button>
                                        </form>
                                    </td>
                                    <td>
                                        <form method="post" enctype="multipart/form-data" action="<?= base_url() ?>archivos/actores_adj2">
                                            <label class="btn btn-primary btn-sm" for="arch-act-adj2">
                                                <input name="arch-act-adj2" id="arch-act-adj2" type="file" style="display:none"
                                                onchange="$('#arch-act-adj2-info').removeClass('invisible')">
                                                +
                                            </label>
                                            <input type="hidden" name="cve_actor" id="cve_actor" value="<?= $actores['cve_actor'] ?>">
                                            <button id="arch-act-adj2-info" type="submit" class="btn btn-sm invisible" style="background: none; color: #28A745">
                                                <span data-feather="upload"></span>
                                            </button>
                                        </form>
                                    </td>
                                    <td>
                                        <form method="post" enctype="multipart/form-data" action="<?= base_url() ?>archivos/actores_extras">
                                            <label class="btn btn-primary btn-sm" for="arch-act-extras">
                                                <input name="arch-act-extras" id="arch-act-extras" type="file" style="display:none"
                                                onchange="$('#arch-act-extras-info').removeClass('invisible')">
                                                +
                                            </label>
                                            <input type="hidden" name="cve_actor" id="cve_actor" value="<?= $actores['cve_actor'] ?>">
                                            <button id="arch-act-extras-info" type="submit" class="btn btn-sm invisible" style="background: none; color: #28A745">
                                                <span data-feather="upload"></span>
                                            </button>
                                        </form>
                                    </td>
                                    <td>
                                        <form method="post" enctype="multipart/form-data" action="<?= base_url() ?>archivos/actores_foto">
                                            <label class="btn btn-primary btn-sm" for="arch-act-foto">
                                                <input name="arch-act-foto" id="arch-act-foto" type="file" style="display:none"
                                                onchange="$('#arch-act-foto-info').removeClass('invisible')">
                                                +
                                            </label>
                                            <input type="hidden" name="cve_actor" id="cve_actor" value="<?= $actores['cve_actor'] ?>">
                                            <button id="arch-act-foto-info" type="submit" class="btn btn-sm invisible" style="background: none; color: #28A745">
                                                <span data-feather="upload"></span>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <hr />
        </div>


        <div class="form-group row">
            <div class="col-sm-10">
                <a href="<?=base_url()?>actores/lista" class="btn btn-secondary">Volver</a>
            </div>
        </div>


    <?php include 'js/inicio.js'; ?>
</main>
