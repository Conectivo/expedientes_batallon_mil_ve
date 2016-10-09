-- ======================================================================
-- ===   Sql Script for Database : expedientes
-- ===
-- === Build : 138
-- ======================================================================

CREATE TABLE unidades
  (
    id      INTEGER       unique not null auto_increment,
    unidad  varchar(50)   not null,

    primary key(id)
  )
 ENGINE = InnoDB;

-- ======================================================================

CREATE TABLE oficiales
  (
    id                    INTEGER        unique not null auto_increment,
    jquia                 INTEGER        not null,
    nombres               varchar(20)    not null,
    apellido              varchar(20)    not null,
    cedula                INTEGER        unique not null,
    situacion             INTEGER        not null,
    email                 varchar(50)    unique,
    arma                  varchar(20)    not null,
    cargo                 varchar(20)    not null,
    direccion             varchar(150)   not null,
    telefono              varchar(14)    not null,
    direccion_emergencia  varchar(50)    not null,
    telefonos_emergencia  varchar(14)    not null,

    primary key(id)
  )
 ENGINE = InnoDB;

-- ======================================================================

CREATE TABLE persona
  (
    cedula            INTEGER        unique not null,
    nombres           varchar(20)    not null,
    apellidos         varchar(20)    not null,
    lugar_nacimiento  INTEGER        not null,
    fecha_nacimiento  date           not null,
    direccion         varchar(150)   not null,
    sector            varchar(150)   not null,
    telefono_movil    varchar(14)    not null,
    religion          int            not null,
    estado_civil      char(1)        not null,
    modalidad         char(1)        not null,
    fecha_ingreso     date           not null,
    unidad_id         INTEGER        not null,

    primary key(cedula),

    foreign key(lugar_nacimiento) references parroquias(id_parroquia) on update CASCADE,
    foreign key(unidad_id) references unidades(id) on update CASCADE
  )
 ENGINE = InnoDB;

-- ======================================================================

CREATE TABLE familiares
  (
    cedula_id        INTEGER       unique not null,
    nombre_madre     varchar(50)   not null,
    nombre_padre     varchar(50)   not null,
    nombre_conyugue  varchar(50)   not null,
    cantidad_hijos   INTEGER       not null,
    sit_padres       char(1)       not null,

    primary key(cedula_id),

    foreign key(cedula_id) references persona(cedula) on update CASCADE
  )
 ENGINE = InnoDB;

-- ======================================================================

CREATE TABLE sociologicos
  (
    cedula_id  INTEGER       unique not null,
    grado      varchar(20)   not null,
    profesion  varchar(20)   not null,
    vivienda   char(1)       not null,

    primary key(cedula_id),

    foreign key(cedula_id) references persona(cedula) on update CASCADE
  )
 ENGINE = InnoDB;

-- ======================================================================

CREATE TABLE fisionomia
  (
    cedula_id              INTEGER        unique not null,
    color_piel             varchar(20)    not null,
    color_cabello          char(1)        not null,
    color_ojos             INTEGER        not null,
    contextura             varchar(20)    not null,
    condicion_fisica       char(1)        not null,
    condicion_intelectual  char(1)        not null,
    estatura               decimal(2,2)   not null,
    peso                   decimal(3,2)   not null,
    grupo_sanguineo        INTEGER        not null,
    senales_particulares   varchar(50)    not null,

    primary key(cedula_id),

    foreign key(cedula_id) references persona(cedula) on update CASCADE
  )
 ENGINE = InnoDB;

-- ======================================================================

CREATE TABLE captador
  (
    id               INTEGER       unique not null auto_increment,
    jquia            INTEGER       not null,
    cedula           INTEGER       not null,
    nombre_completo  varchar(50)   not null,
    telefono         varchar(14)   not null,
    captado          INTEGER       not null,

    primary key(id),

    foreign key(captado) references persona(cedula) on update CASCADE
  )
 ENGINE = InnoDB;

-- ======================================================================

CREATE TABLE tallas
  (
    cedula_id   INTEGER      unique not null,
    tipo_talla  varchar(4)   not null,
    gorra       INTEGER      not null,
    calzado     INTEGER      not null,

    primary key(cedula_id),

    foreign key(cedula_id) references persona(cedula) on update CASCADE
  )
 ENGINE = InnoDB;

-- ======================================================================

