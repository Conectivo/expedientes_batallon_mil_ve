-- ======================================================================
-- ===   Sql Script for Database : expedientes
-- ===
-- === Build : 177
-- ======================================================================

CREATE TABLE unidades
  (
    id      INTEGER       unique not null auto_increment,
    nombre  varchar(50)   not null,

    primary key(id)
  )
 ENGINE = InnoDB;

-- ======================================================================

CREATE TABLE jerarquia
  (
    id      INTEGER       unique not null auto_increment,
    nombre  varchar(50)   not null,

    primary key(id)
  )
 ENGINE = InnoDB;

-- ======================================================================

CREATE TABLE genero
  (
    id      INTEGER       unique not null auto_increment,
    nombre  varchar(11)   not null,

    primary key(id)
  )
 ENGINE = InnoDB;

-- ======================================================================

CREATE TABLE oficiales
  (
    id                    INTEGER        unique not null auto_increment,
    jquia_id              INTEGER        not null,
    nombres               varchar(20)    not null,
    apellidos             varchar(20)    not null,
    cedula                INTEGER        unique not null,
    sexo_id               INTEGER        not null,
    situacion             INTEGER        not null,
    email                 varchar(50)    unique,
    arma                  varchar(20)    not null,
    cargo                 varchar(50)    not null,
    direccion             varchar(150)   not null,
    telefono              varchar(14)    not null,
    direccion_emergencia  varchar(150)   not null,
    telefonos_emergencia  varchar(14)    not null,
    status                INTEGER        not null default 1,

    primary key(id),

    foreign key(jquia_id) references jerarquia(id) on update CASCADE,
    foreign key(sexo_id) references genero(id) on update CASCADE
  )
 ENGINE = InnoDB;

-- ======================================================================

CREATE TABLE persona
  (
    cedula            INTEGER        unique not null,
    nombres           varchar(20)    not null,
    apellidos         varchar(20)    not null,
    sexo_id           INTEGER        not null,
    estado_id         INTEGER        not null,
    municipio_id      INTEGER        not null,
    parroquia_id      INTEGER        not null,
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
    foto              varchar(150),
    status            INTEGER        not null default 1,

    primary key(cedula),

    foreign key(sexo_id) references genero(id) on update CASCADE,
    foreign key(estado_id) references estados(id_estado) on update CASCADE,
    foreign key(municipio_id) references municipios(id_municipio) on update CASCADE,
    foreign key(parroquia_id) references parroquias(id_parroquia) on update CASCADE,
    foreign key(lugar_nacimiento) references ciudades(id_ciudad) on update CASCADE,
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
    cedula_id  INTEGER      unique not null,
    grado      varchar(4)   not null,
    profesion  INTEGER      not null,
    vivienda   char(1)      not null,

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
    estatura               double         not null,
    peso                   double         not null,
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
    jquia_id         INTEGER       not null,
    cedula           INTEGER       not null,
    nombre_completo  varchar(50)   not null,
    telefono         varchar(14)   not null,
    captado          INTEGER       unique not null,

    primary key(id),

    foreign key(jquia_id) references jerarquia(id) on update CASCADE,
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

