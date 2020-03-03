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
    cve_actor integer, 
    apellido_pa text,
    apellido_ma text,
    nombre text,
    fecha_nacimiento date,
    sexo text,
    calle text,
    num_exterior text,
    num_interior text,
    colonia text,
    codigo_postal integer,
    ciudad text,
    estado text,
    externo_interno text,
    ine text,
    ambito text,
    sector text,
    organización text,
    telefono_fijo text,
    telefono_celular text,
    correo_personal text,
    correo_laboral text,
    asistente text,
    correo_asistente text,
    telefono_asistente text,
    historial text,
    ambito_organismo text,
    ultimo_periodo text,
    consejo_actual text,
    cargo text,
    permiso text,
    otros_espacios text,
    experiencia_exitosa text,
    fecha_experiencia_exitosa date,
    desea_colaborar text,
    profesion text,
    perfil text
);


