DROP TABLE IF EXISTS usuarios;
CREATE TABLE usuarios (
    clave integer, 
    nombre text,
    usuario text,
    password text,
    dependencia text
);

DROP TABLE IF EXISTS actores;
CREATE TABLE actores (
    cve_actor serial, 
    activo integer,
    dependencia text,
    nombre text,
    apellido_pa text,
    apellido_ma text,
    fecha_nacimiento date,
    sexo text,
    ine text,
    expediente_archivistico text,
    calle text,
    num_exterior text,
    num_interior text,
    colonia text,
    codigo_postal integer,
    ciudad text,
    municipio text,
    estado text,
    telefono_fijo text,
    telefono_celular text,
    correo_personal text,
    correo_laboral text,
    organizacion text,
    asistente text,
    correo_asistente text,
    telefono_asistente text,
    externo_interno text,
    ambito text,
    sector text,
    otros_espacios text,
    experiencia_exitosa text,
    fecha_experiencia_exitosa date,
    desea_colaborar text,
    profesion text,
    perfil text
);


