<main role="main" class="ml-sm-auto px-4">
    <form method="post" action="<?= base_url() ?>actores/guardar">
        <div class="col-md-12 mb-3 pb-2 pt-3 border-bottom">
            <div class="row">
                <div class="col-md-10">
                    <h1 class="h2">Nuevo actor</h1>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2">
                    <h6><strong>Datos básicos</strong></h6>
                    <div class="form-check text-center">
                        <?php $foto_default = 'adj_actores/default_foto.jpg'; ?>
                        <?php $foto = $foto_default ?>
                        <img src="<?=base_url();?><?=$foto;?>" class="img-fluid img-thumbnail mt-3">
                    </div>
                </div>
                <div class="col-md-10">
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="nombre">Nombre(s)</label>
                            <?php echo form_error('nombre'); ?>
                            <input type="text" class="form-control" name="nombre" id="nombre" value="<?php echo set_value('nombre'); ?>">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="apellido_pa">Apellido paterno</label>
                            <?php echo form_error('apellido_pa'); ?>
                            <input type="text" class="form-control" name="apellido_pa" id="apellido_pa" value="<?php echo set_value('apellido_pa'); ?>">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="apellido_ma">Apellido materno</label>
                            <?php echo form_error('apellido_ma'); ?>
                            <input type="text" class="form-control" name="apellido_ma" id="apellido_ma" value="<?php echo set_value('apellido_ma'); ?>">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="fecha_nacimiento">Fecha de nacimiento</label>
                            <input type="date" class="form-control" name="fecha_nacimiento" id="fecha_nacimiento" value="<?php echo set_value('fecha_nacimiento'); ?>">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="sexo">Sexo</label>
                            <?php echo form_error('sexo'); ?>
                            <select class="custom-select" name="sexo" id="sexo">
                                <option value="" <?php echo set_select('sexo', '', TRUE); ?> ></option>
                                <option value="F" <?php echo set_select('sexo', 'F'); ?> >F</option>
                                <option value="M" <?php echo set_select('sexo', 'M'); ?> >M</option>
                            </select>
                        </div>
                        <div class="form-group col-md-5">
                            <label for="expediente_archivistico">Expediente archivístico</label>
                            <input type="text" class="form-control" name="expediente_archivistico" id="expediente_archivistico" value="<?php echo set_value('expediente_archivistico'); ?>">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-5">
                            <label for="calle">Calle</label>
                            <input type="text" class="form-control" name="calle" id="calle" value="<?php echo set_value('calle'); ?>">
                        </div>
                        <div class="form-group col-md-1">
                            <label for="num_exterior"># ext.</label>
                            <input type="text" class="form-control" name="num_exterior" id="num_exterior" value="<?php echo set_value('num_exterior'); ?>">
                        </div>
                        <div class="form-group col-md-1">
                            <label for="num_interior"># int.</label>
                            <input type="text" class="form-control" name="num_interior" id="num_interior" value="<?php echo set_value('num_interior'); ?>">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="colonia">Colonia</label>
                            <input type="text" class="form-control" name="colonia" id="colonia" value="<?php echo set_value('colonia'); ?>">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <label for="codigo_postal">Código postal</label>
                            <input type="text" class="form-control" name="codigo_postal" id="codigo_postal" value="<?php echo set_value('codigo_postal'); ?>">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="ciudad">Ciudad</label>
                            <input type="text" class="form-control" name="ciudad" id="ciudad" value="<?php echo set_value('ciudad'); ?>">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="cve_mun">Municipio</label>
                            <select class="custom-select" name="cve_mun" id="cve_mun">
                                <option value="" <?php echo set_select('cve_mun', '', TRUE); ?> ></option>
                                <?php foreach ($municipios as $municipios_item) { ?>
                                <option value="<?= $municipios_item['cve_mun'] ?>" <?php echo set_select('cve_mun', $municipios_item['cve_mun']); ?> ><?= $municipios_item['nom_mun'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="cve_ent">Estado</label>
                            <select class="custom-select" name="cve_ent" id="cve_ent">
                                <option value="" <?php echo set_select('cve_ent', '', TRUE); ?> ></option>
                                <?php foreach ($entidades as $entidades_item) { ?>
                                    <option value="<?= $entidades_item['cve_ent'] ?>" <?php echo set_select('cve_ent', $entidades_item['cve_ent']); ?> ><?= $entidades_item['nom_ent'] ?></option>
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
                            <input type="text" class="form-control" name="telefono_fijo" id="telefono_fijo" value="<?php echo set_value('telefono_fijo'); ?>">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="telefono_celular">Celular</label>
                            <input type="text" class="form-control" name="telefono_celular" id="telefono_celular" value="<?php echo set_value('telefono_celular'); ?>">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="correo_personal">Correo personal</label>
                            <input type="email" class="form-control" name="correo_personal" id="correo_personal" value="<?php echo set_value('correo_personal'); ?>">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="correo_laboral">Correo laboral</label>
                            <input type="email" class="form-control" name="correo_laboral" id="correo_laboral" value="<?php echo set_value('correo_laboral'); ?>">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="organizacion">Organización</label>
                            <input type="text" class="form-control" name="organizacion" id="organizacion" value="<?php echo set_value('organizacion'); ?>">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="asistente">Asistente</label>
                            <input type="text" class="form-control" name="asistente" id="asistente" value="<?php echo set_value('asistente'); ?>">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="correo_asistente">Correo asistente</label>
                            <input type="email" class="form-control" name="correo_asistente" id="correo_asistente" value="<?php echo set_value('correo_asistente'); ?>">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="telefono_asistente">Teléfono asistente</label>
                            <input type="text" class="form-control" name="telefono_asistente" id="telefono_asistente" value="<?php echo set_value('telefono_asistente'); ?>">
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
                            <label for="cve_tipo">Naturaleza de la participación</label>
                            <?php echo form_error('cve_tipo'); ?>
                            <select class="custom-select" name="cve_tipo" id="cve_tipo">
                                <option value="" <?php echo set_select('cve_tipo', '', TRUE); ?> ></option>
                                <?php foreach ($tipo_actores as $tipo_actores_item) { ?>
                                <option value="<?= $tipo_actores_item['cve_tipo'] ?>" <?php echo set_select('cve_tipo', $tipo_actores_item['cve_tipo']); ?> ><?= $tipo_actores_item['nom_tipo'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="cve_ambito">Ámbito</label>
                            <select class="custom-select" name="cve_ambito" id="cve_ambito">
                                <option value="" <?php echo set_select('cve_ambito', '', TRUE); ?> ></option>
                                <?php foreach ($ambitos as $ambitos_item) { ?>
                                <option value="<?= $ambitos_item['cve_ambito'] ?>" <?php echo set_select('cve_ambito', $ambitos_item['cve_ambito']); ?> ><?= $ambitos_item['nom_ambito'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="cve_sector">Sector</label>
                            <?php echo form_error('cve_sector'); ?>
                            <select class="custom-select" name="cve_sector" id="cve_sector">
                                <option value="" <?php echo set_select('cve_sector', '', TRUE); ?> ></option>
                                <?php foreach ($sectores as $sectores_item) { ?>
                                <option value="<?= $sectores_item['cve_sector'] ?>" <?php echo set_select('cve_sector', $sectores_item['cve_sector']); ?> ><?= $sectores_item['nom_sector'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <hr />
            <div class="row">
                <div class="col-md-2">
                    <h6><strong>Colaboración</strong></h6>
                </div>
                <div class="col-md-10">
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="otros_espacios">¿Ha participado en otros espacios?</label>
                            <select class="custom-select" name="otros_espacios" id="otros_espacios">
                                <option value="" <?php echo set_select('otros_espacios', '', TRUE); ?> ></option>
                                <option value="S" <?php echo set_select('otros_espacios', 'S'); ?> >S</option>
                                <option value="N" <?php echo set_select('otros_espacios', 'N'); ?> >N</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="experiencia_exitosa">Experiencia más exitosa</label>
                            <input type="text" class="form-control" name="experiencia_exitosa" id="experiencia_exitosa" value="<?php echo set_value('experiencia_exitosa'); ?>">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="fecha_experiencia_exitosa">Fecha </label>
                            <input type="date" class="form-control" name="fecha_experiencia_exitosa" id="fecha_experiencia_exitosa" value="<?php echo set_value('fecha_experiencia_exitosa'); ?>">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="desea_colaborar">¿Desea colaborar en otros espacios?</label>
                            <select class="custom-select" name="desea_colaborar" id="desea_colaborar">
                                <option value="" <?php echo set_select('desea_colaborar', '', TRUE); ?> ></option>
                                <option value="S" <?php echo set_select('desea_colaborar', 'S'); ?> >S</option>
                                <option value="N" <?php echo set_select('desea_colaborar', 'N'); ?> >N</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="profesion">Profesión</label>
                            <input type="text" class="form-control" name="profesion" id="profesion" value="<?php echo set_value('profesion'); ?>">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="cve_perfil">Perfil</label>
                            <select class="custom-select" name="cve_perfil" id="cve_perfil">
                                <option value="" <?php echo set_select('cve_perfil', '', TRUE); ?> ></option>
                                <?php foreach ($perfiles as $perfiles_item) { ?>
                                <option value="<?= $perfiles_item['cve_perfil'] ?>" <?php echo set_select('cve_perfil', $perfiles_item['cve_perfil']); ?> ><?= $perfiles_item['nom_perfil'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <hr />

        <input type="hidden" name="activo" value="1">
        <input type="hidden" name="dependencia" value="<?= $usuario_dependencia; ?>">
        <input type="hidden" name="area" value="<?= $usuario_area; ?>">

        <div class="form-group row">
            <div class="col-sm-10">
                <a href="<?=base_url()?>actores/lista" class="btn btn-secondary">Volver</a>
            </div>
        </div>

    </form>

    <?php include 'js/inicio.js'; ?>
</main>
