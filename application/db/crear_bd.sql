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
    cve_perfil integer
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

DROP TABLE IF EXISTS consejos;
CREATE TABLE consejos (
    cve_consejo integer,
    dependencia text,
    nom_consejo text,
    iniciales text
);

DROP TABLE IF EXISTS consejos_actores;
CREATE TABLE consejos_actores (
    cve_consejo integer,
    cve_actor integer,
    cve_cargo integer,
    fecha_inicio date,
    fecha_fin date,
    status integer
);
    
DROP TABLE IF EXISTS cargos;
CREATE TABLE cargos (
    cve_cargo integer,
    nom_cargo text
);

DROP TABLE IF EXISTS perfiles;
CREATE TABLE perfiles (
    cve_perfil integer,
    nom_perfil text
);
