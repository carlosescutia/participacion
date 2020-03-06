<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <form method="post" action="<?= base_url() ?>actores/guardar/<?=$actores['cve_actor']?>">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Datos del actor</h1>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>

        <div class="form-row">
            <div class="col-md-2">
                <h6><strong>Datos básicos</strong></h6>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="activo" id="activo" value="" <?= $actores['activo'] ? 'checked' : '' ?> >
                    <label class="form-check-label" for="activo">Activo</label>
                </div>
            </div>
            <div class="form-group col-md-3">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" name="nombre" id="nombre" value="<?=$actores['nombre'] ?>">
            </div>
            <div class="form-group col-md-3">
                <label for="apellido_pa">Apellido paterno</label>
                <input type="text" class="form-control" name="apellido_pa" id="apellido_pa" value="<?=$actores['apellido_pa'] ?>">
            </div>
            <div class="form-group col-md-3">
                <label for="apellido_ma">Apellido materno</label>
                <input type="text" class="form-control" name="apellido_ma" id="apellido_ma" value="<?=$actores['apellido_ma'] ?>">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-2">
            </div>
            <div class="form-group col-md-2">
                <label for="fecha_nacimiento">Fecha de nacimiento</label>
                <input type="text" class="form-control" name="fecha_nacimiento" id="fecha_nacimiento" value="<?=$actores['fecha_nacimiento'] ?>">
            </div>
            <div class="form-group col-md-1">
                <label for="sexo">Sexo</label>
                <input type="text" class="form-control" name="sexo" id="sexo" value="<?=$actores['sexo'] ?>">
            </div>
            <div class="form-group col-md-2">
                <label for="ine">Clave INE</label>
                <input type="text" class="form-control" name="ine" id="ine" value="<?=$actores['ine'] ?>">
            </div>
            <div class="form-group col-md-2">
                <label for="ciudad">Ciudad</label>
                <input type="text" class="form-control" name="ciudad" id="ciudad" value="<?=$actores['ciudad'] ?>">
            </div>
            <div class="form-group col-md-2">
                <label for="estado">Estado</label>
                <input type="text" class="form-control" name="estado" id="estado" value="<?=$actores['estado'] ?>">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-2">
            </div>
            <div class="form-group col-md-4">
                <label for="calle">Calle</label>
                <input type="text" class="form-control" name="calle" id="calle" value="<?=$actores['calle'] ?>">
            </div>
            <div class="form-group col-md-1">
                <label for="num_exterior"># exterior</label>
                <input type="text" class="form-control" name="num_exterior" id="num_exterior" value="<?=$actores['num_exterior'] ?>">
            </div>
            <div class="form-group col-md-1">
                <label for="num_interior"># interior</label>
                <input type="text" class="form-control" name="num_interior" id="num_interior" value="<?=$actores['num_interior'] ?>">
            </div>
            <div class="form-group col-md-2">
                <label for="colonia">Colonia</label>
                <input type="text" class="form-control" name="colonia" id="colonia" value="<?=$actores['colonia'] ?>">
            </div>
            <div class="form-group col-md-1">
                <label for="codigo_postal">C.P.</label>
                <input type="text" class="form-control" name="codigo_postal" id="codigo_postal" value="<?=$actores['codigo_postal'] ?>">
            </div>
        </div>

        <hr />

        <div class="form-row">
            <div class="form-group col-md-2">
                <h6><strong>Contacto</strong></h6>
            </div>
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
                <input type="text" class="form-control" name="correo_personal" id="correo_personal" value="<?=$actores['correo_personal'] ?>">
            </div>
            <div class="form-group col-md-3">
                <label for="correo_laboral">Correo laboral</label>
                <input type="text" class="form-control" name="correo_laboral" id="correo_laboral" value="<?=$actores['correo_laboral'] ?>">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-2">
            </div>
            <div class="form-group col-md-2">
                <label for="organizacion">Organización</label>
                <input type="text" class="form-control" name="organizacion" id="organizacion" value="<?=$actores['organizacion'] ?>">
            </div>
            <div class="form-group col-md-3">
                <label for="asistente">Asistente</label>
                <input type="text" class="form-control" name="asistente" id="asistente" value="<?=$actores['asistente'] ?>">
            </div>
            <div class="form-group col-md-3">
                <label for="correo_asistente">Correo asistente</label>
                <input type="text" class="form-control" name="correo_asistente" id="correo_asistente" value="<?=$actores['correo_asistente'] ?>">
            </div>
            <div class="form-group col-md-2">
                <label for="telefono_asistente">Teléfono asistente</label>
                <input type="text" class="form-control" name="telefono_asistente" id="telefono_asistente" value="<?=$actores['telefono_asistente'] ?>">
            </div>
        </div>


        <hr />

        <div class="form-row">
            <div class="form-group col-md-2">
                <h6><strong>Participación</strong></h6>
            </div>
            <div class="form-group col-md-2">
                <label for="externo_interno">Tipo</label>
                <input type="text" class="form-control" name="externo_interno" id="externo_interno" value="<?=$actores['externo_interno'] ?>">
            </div>
            <div class="form-group col-md-2">
                <label for="ambito">Ámbito</label>
                <input type="text" class="form-control" name="ambito" id="ambito" value="<?=$actores['ambito'] ?>">
            </div>
            <div class="form-group col-md-4">
                <label for="sector">Sector</label>
                <input type="text" class="form-control" name="sector" id="sector" value="<?=$actores['sector'] ?>">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-2">
                <h6><strong>Consejos</strong></h6>
            </div>
            <div class="form-group col-md-8">
                <textarea class="form-control" name="consejos" id="consejos" rows="4"></textarea>
            </div>
        </div>

        <input type="hidden" name="cve_actor" value="<?=$actores['cve_actor']?>">
        <input type="hidden" name="otros_espacios">
        <input type="hidden" name="experiencia_exitosa">
        <input type="hidden" name="fecha_experiencia_exitosa">
        <input type="hidden" name="desea_colaborar">
        <input type="hidden" name="profesion">
        <input type="hidden" name="perfil">

        <hr />

        <div class="form-group row">
            <div class="col-sm-10">
                <a href="<?=base_url()?>actores/lista" class="btn btn-secondary">Volver</a>
            </div>
        </div>
    </form>

</main>
