DROP TABLE IF EXISTS usuarios;
CREATE TABLE usuarios (
    clave serial, 
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
    cve_ambito serial,
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
    cve_sector serial,
    nom_sector text
);

DROP TABLE IF EXISTS tipo_actores;
CREATE TABLE tipo_actores (
    cve_tipo serial,
    nom_tipo text
);

DROP TABLE IF EXISTS consejos;
CREATE TABLE consejos (
    cve_consejo serial,
    dependencia text,
    nom_consejo text,
    siglas text,
    cve_tipo integer,
    cve_eje integer,
    soporte_juridico text,
    reglamento_interno text,
    fecha_reglamento date,
    periodo_inicio date,
    periodo_fin date,
    sesiones_anuales integer,
    integracion text,
    fecha_instalacion date,
    status integer
);

DROP TABLE IF EXISTS consejos_actores;
CREATE TABLE consejos_actores (
    cve_consejo integer,
    cve_actor integer,
    cve_cargo integer,
    fecha_inicio date,
    fecha_fin date,
    status integer,
    primary key (cve_consejo, cve_actor)
);
    
DROP TABLE IF EXISTS cargos;
CREATE TABLE cargos (
    cve_cargo serial,
    nom_cargo text
);

DROP TABLE IF EXISTS perfiles;
CREATE TABLE perfiles (
    cve_perfil serial,
    nom_perfil text
);

DROP TABLE IF EXISTS tipo_consejos;
CREATE TABLE tipo_consejos (
    cve_tipo serial,
    nom_tipo text
);

DROP TABLE IF EXISTS ejes;
CREATE TABLE ejes (
    cve_eje serial,
    nom_eje text
);

DROP TABLE IF EXISTS sesiones;
CREATE TABLE sesiones (
    cve_sesion serial,
    cve_consejo integer,
    num_sesion integer,
    tipo text,
    cve_modalidad integer,
    lugar text,
    fecha date,
    hora_ini time,
    hora_fin time,
    cve_objetivo integer,
    orden_dia text
);

DROP TABLE IF EXISTS calendario_sesiones;
CREATE TABLE calendario_sesiones (
    cve_sesion serial,
    cve_consejo integer,
    dependencia text,
    nom_sesion text,
    fecha date,
    hora time,
    cve_status integer
);

DROP TABLE IF EXISTS status_sesiones;
CREATE TABLE status_sesiones (
    cve_status serial,
    nom_status text
);

DROP TABLE IF EXISTS acuerdos_sesion;
CREATE TABLE acuerdos_sesion (
    cve_acuerdo serial,
    cve_sesion integer,
    cve_consejo integer,
    nom_acuerdo text,
    cve_status integer,
    observaciones text
);

DROP TABLE IF EXISTS status_acuerdos_sesion;
CREATE TABLE status_acuerdos_sesion (
    cve_status serial,
    nom_status text
);

DROP TABLE IF EXISTS roles;
CREATE TABLE roles (
    cve_rol serial,
    nom_rol text
);

DROP TABLE IF EXISTS usuarios_roles;
CREATE TABLE usuarios_roles (
    cve_usuario integer,
    cve_rol integer,
    primary key (cve_usuario, cve_rol)
);

DROP TABLE IF EXISTS objetivos_sesion;
CREATE TABLE objetivos_sesion (
    cve_objetivo serial,
    nom_objetivo text
);

DROP TABLE IF EXISTS modalidades_sesion;
CREATE TABLE modalidades_sesion (
    cve_modalidad serial,
    nom_modalidad text
);


