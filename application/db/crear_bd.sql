DROP TABLE IF EXISTS usuarios;
CREATE TABLE usuarios (
    clave integer, 
    nombre text,
    usuario text,
    password text,
    dependencia text,
    activo integer
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
    cve_mun text,
    cve_ent text,
    telefono_fijo text,
    telefono_celular text,
    correo_personal text,
    correo_laboral text,
    organizacion text,
    asistente text,
    correo_asistente text,
    telefono_asistente text,
    cve_tipo integer,
    cve_ambito integer,
    cve_sector integer,
    otros_espacios text,
    experiencia_exitosa text,
    fecha_experiencia_exitosa date,
    desea_colaborar text,
    profesion text,
    perfil text
);


DROP TABLE IF EXISTS ambitos;
CREATE TABLE ambitos (
    cve_ambito integer,
    nom_ambito text
);

DROP TABLE IF EXISTS entidades;
CREATE TABLE entidades (
    cve_ent text,
    nom_ent text
);

DROP TABLE IF EXISTS municipios;
CREATE TABLE municipios (
    cve_mun text,
    nom_mun text
);

DROP TABLE IF EXISTS sectores;
CREATE TABLE sectores (
    cve_sector integer,
    nom_sector text
);

DROP TABLE IF EXISTS tipos;
CREATE TABLE tipos (
    cve_tipo integer,
    nom_tipo text
);

