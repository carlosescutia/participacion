<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <form method="post" action="<?= base_url() ?>actores/guardar/<?=$actores['cve_actor']?>">
        <div class="col-md-12 mb-3 pb-2 pt-3 border-bottom">
            <div class="row">
                <div class="col-md-4">
                    <h1 class="h2">Datos del actor</h1>
                </div>
                <div class="col-md-6">
                    <?php if ($error): ?>
                        <p class="text-danger"><?php echo $error ?></p>
                    <?php endif ?>
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
                        <input type="checkbox" class="form-check-input" name="activo" id="activo" value="" <?= $actores['activo'] ? 'checked' : '' ?> >
                        <label class="form-check-label" for="activo">Activo</label>
                        <?php $foto_default = 'fotos/default.jpg'; ?>
                        <?php $foto_actor = 'fotos/'.$actores['cve_actor'].'.jpg' ; ?>
                        <?php file_exists($foto_actor) ? $foto = $foto_actor : $foto = $foto_default ?>
                        <img src="<?=base_url();?><?=$foto;?>" class="img-fluid img-thumbnail mt-3">
                    </div>
                </div>
                <div class="col-md-10">
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control border-primary" name="nombre" id="nombre" value="<?=$actores['nombre'] ?>">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="apellido_pa">Apellido paterno</label>
                            <input type="text" class="form-control border-primary" name="apellido_pa" id="apellido_pa" value="<?=$actores['apellido_pa'] ?>">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="apellido_ma">Apellido materno</label>
                            <input type="text" class="form-control border-primary" name="apellido_ma" id="apellido_ma" value="<?=$actores['apellido_ma'] ?>">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="fecha_nacimiento">Fecha de nacimiento</label>
                            <input type="date" class="form-control" name="fecha_nacimiento" id="fecha_nacimiento" value="<?=$actores['fecha_nacimiento'] ?>">
                        </div>
                        <div class="form-group col-md-1">
                            <label for="sexo">Sexo</label>
                            <input type="text" class="form-control border-primary" name="sexo" id="sexo" value="<?=$actores['sexo'] ?>">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="ine">Clave INE</label>
                            <input type="text" class="form-control" name="ine" id="ine" value="<?=$actores['ine'] ?>">
                        </div>
                        <div class="form-group col-md-4">
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
                                <?php foreach ($municipios as $municipios_item) { ?>
                                <option value="<?= $municipios_item['cve_mun'] ?>" <?= ($actores['cve_mun'] == $municipios_item['cve_mun']) ? 'selected' : '' ?> ><?= $municipios_item['nom_mun'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="cve_ent">Estado</label>
                            <select class="custom-select" name="cve_ent" id="cve_ent">
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
                            <select class="custom-select border-primary" name="cve_tipo" id="cve_tipo">
                                <?php foreach ($tipos as $tipos_item) { ?>
                                <option value="<?= $tipos_item['cve_tipo'] ?>" <?= ($actores['cve_tipo'] == $tipos_item['cve_tipo']) ? 'selected' : '' ?> ><?= $tipos_item['nom_tipo'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="cve_ambito">Ámbito</label>
                            <select class="custom-select" name="cve_ambito" id="cve_ambito">
                                <?php foreach ($ambitos as $ambitos_item) { ?>
                                <option value="<?= $ambitos_item['cve_ambito'] ?>" <?= ($actores['cve_ambito'] == $ambitos_item['cve_ambito']) ? 'selected' : '' ?> ><?= $ambitos_item['nom_ambito'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="cve_sector">Sector</label>
                            <select class="custom-select border-primary" name="cve_sector" id="cve_sector">
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
            <div class="row">
                <div class="col-md-2">
                    <h6><strong>Colaboración</strong></h6>
                </div>
                <div class="col-md-10">
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="otros_espacios">¿Ha participado en otros espacios?</label>
                            <input type="text" class="form-control" name="otros_espacios" id="otros_espacios" value="<?=$actores['otros_espacios'] ?>">
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
                            <input type="text" class="form-control" name="desea_colaborar" id="desea_colaborar" value="<?=$actores['desea_colaborar'] ?>">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="profesion">Profesión</label>
                            <input type="text" class="form-control" name="profesion" id="profesion" value="<?=$actores['profesion'] ?>">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="perfil">Perfil</label>
                            <input type="text" class="form-control" name="perfil" id="perfil" value="<?=$actores['perfil'] ?>">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <input type="hidden" name="cve_actor" value="<?=$actores['cve_actor']?>">

        <hr />

        <div class="form-group row">
            <div class="col-sm-10">
                <a href="<?=base_url()?>actores/lista" class="btn btn-secondary">Volver</a>
            </div>
        </div>

    </form>

    <?php include 'js/inicio.js'; ?>
</main>
