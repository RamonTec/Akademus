create database academus;
	use academus;
-- Creacion de la tabla persona
create table persona(
	id_per			int auto_increment primary key not null,
	ci				varchar(20) unique not null,
	pnombre			varchar(20) not null,
	segnombre		varchar(20),
	papellido		varchar(20) not null,
	segapellido		varchar(20),
	nacionalidad	char(1) not null,
	sexo_p			char(1) not null
);

-- Creacion de la tabla cargo
create table cargo(
	id_cargo 	int auto_increment primary key not null,
	tipo_cargo 	varchar(30) not null
);

create table usuario(
	id_u 		int auto_increment primary key not null,
	nom_u 		varchar(20) not null,
	clave 		varchar(255) not null,
	privilegio 	char(20) not null,
	pregunta_S 	varchar(255) not null,
	respuesta_S varchar(255) not null,
	ultima_s    varchar(255) not null,
	activo 		varchar(1) not null,
	id_pu 		int,
	foreign key (id_pu) references persona(id_per) on update cascade on delete cascade,
	id_cu 		int,
	foreign key (id_cu) references cargo (id_cargo) on update cascade on delete cascade
);

create table profesor(
	cod_prof 	varchar(20) unique not null,
	tipo_prof 	varchar(20),
	id_prof 	int,
	foreign key (id_prof) references persona (id_per) on update cascade on delete cascade
);

create table salud(
	id_s 			int auto_increment primary key not null,
	condicion_s		varchar(20),
	obervacion_s 	text
);

-- Creacion de la tabla seccion
create table seccion(
	id_seccion 		int auto_increment primary key not null,
	cod_sec 		varchar(20) unique,
	nom_sec 		varchar(20) unique
);

-- Creacion de la tabla periodo escolar
create table periodoEscolar(
	id_pe 		int auto_increment primary key not null,
	fechaI 		date,
	fechaF 		date,
	nom_pe 		varchar(20)
);

create table grado(
	id_g 	 		int auto_increment primary key not null,
	num_g			varchar(20),
	id_gs 			int,
	foreign key (id_gs) references seccion(id_seccion) on update cascade on delete cascade
);

-- Creacion de la tabla matricula
create table matricula(
	id_m 	 		int auto_increment primary key not null,
	estado_m		varchar(20),
	id_mp			int unique,
	foreign key (id_mp) references periodoEscolar(id_pe) on update cascade on delete cascade,
	id_mg			int unique,
	foreign key (id_mg) references grado(id_g) on update cascade on delete cascade
);

-- Creacion de la tabla profesion_u_oficio
create table profesion_u_oficio(
	id_po 		int auto_increment primary key not null,
	posee_po 	char(2),
	nom_po 		varchar(30),
	lugar_po 	varchar(30),
	tlf_po 		varchar(20)
);

-- Creacion de la tabla pais
create table pais(
	id_pais 	int auto_increment primary key not null,
	nom_pais	varchar(20)
);

-- Creacion de la tabla estado
create table estado(
	id_estado 	int auto_increment primary key not null,
	nom_estado	varchar(20),
	id_ep		int,
	foreign key (id_ep) references pais(id_pais) on update cascade on delete cascade
);

-- Creacion de la tabla
create table municipio(
	id_muni 	int auto_increment primary key not null,
	nombre_muni varchar(20),
	id_em 		int,
	foreign key (id_em) references estado(id_estado) on update cascade on delete cascade
);

-- Creacion de la tabla direccion
create table direccion(
	id_dir 		int auto_increment primary key not null,
	n_casa 		varchar(20) not null,
	pto_ref 	varchar(255) not null,
	calle 		varchar(50) not null,
	sector		varchar(20) not null,
	id_md 		int,
	foreign key (id_md) references municipio(id_muni) on update cascade on delete cascade
);

create table estudiante(
	id_est 			int auto_increment primary key not null,
	ci_est			varchar(20) unique,
	ci_escolar		varchar(20) unique,
	fecha_n 		date not null,
	lugar_n 		text not null,
	sexo			char(1) not null,
	pnom			varchar(20) not null,
	segnom          varchar(20),
	otrosnom		varchar(20),
	pape			varchar(20) not null,
	segape	        varchar(20),
	otrosape		varchar(20),
	nacionalidad_e  varchar(20),
	id_de			int,
	foreign key (id_de) references direccion (id_dir) on update cascade on delete cascade
);

-- Creacion  de la tabla representante
create table representante(
  ci_pariente_1 varchar(20) unique,
  ci_pariente_2 varchar(20) unique,
  nombre_pariente_1 varchar(20) not null,
  nombre_pariente_2 varchar(20) not null,
	id_rep int auto_increment primary key not null,
	id_rep_per			int,
	foreign key (id_rep_per) references persona(id_per) on update cascade on delete cascade,
	id_pr 			int,
	foreign key (id_pr) references profesion_u_oficio (id_po) on update cascade on delete cascade,
	id_dr 			int,
	foreign key (id_dr) references direccion (id_dir) on update cascade on delete cascade
);


create table telefono(
	id_tlf 			int auto_increment primary key not null,
	numero_padre		varchar(10) not null,
  numero_madre 		varchar(10) not null,
  numero_repre 		varchar(10) not null,
	id_te 			int,
	foreign key (id_te) references representante (id_rep) on update cascade on delete cascade
);

-- Creacion de la tabla calificaciones
create table boletin(
	id_boletin 		int auto_increment primary key not null,
	descripcion text
);

-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- --  SECCION 2: DEFINICION Y CREACION DE LAS TABLAS MUCHOS A MUCHOS-- -- -- -- -- -- -- -- -- -- -

-- CREACCION TABLA USUARIO_INSCRIBE_EST
CREATE TABLE usuario_inscribe_estudiante(
    id_uu	   int,
    id_uie	   int,
    fecha_ins  varchar(255) not null,
    --  CREACION LLAVES FORANEAS

    --  creacion de la llave fornea de la tabla usuaio
    foreign key(id_uu) references usuario (id_u) on update cascade on delete cascade,
    --  creacion de la llave fornea de la tabla estudiante
    foreign key(id_uie) references estudiante (id_est) on update cascade on delete cascade
);

-- CREACION TABLA ESTUDIANTE_PADECE_SALUD
CREATE TABLE estudiante_padece_salud(
    id_eps      int unique,
    id_sep      int unique,

    --  CREACION DE LLAVE FORANEA

    --  creacion de la llave fornea de la tabla ESTUDIANTE
    foreign key(id_eps) references estudiante (id_est) on update cascade on delete cascade,
    --  creacion de la llave fornea de la tabla de SALUD
    foreign key(id_sep) references salud (id_s) on update cascade on delete cascade
);

-- CREACION TABLA ESTUDIANTE_CURSA_AREA
CREATE TABLE estudiante_inscribe_matricula(
    id_eei     int unique,
    id_mei     int unique,
     --  CREACION LAVES FORANEAS

    --  creacion de la llave fornea de la tabla de ESTUDIANTE
    foreign key(id_eei) references estudiante (id_est) on update cascade on delete cascade,
    --  creacion de la llave fornea de la tabla de AREA
    foreign key(id_mei) references matricula (id_m) on update cascade on delete cascade
);


-- CREACION TABLA REPRESENTANTE_REPRESENTA_ESTUDIANTE
CREATE TABLE representante_representa_estudiante(
    id_rer      int unique,
    id_err      int unique,

    --  CREACION LLAVES FORANEAS

    --  creacion de la llave fornea de la tabla de REPRESENTANTE
    foreign key(id_rer) references representante (id_rep) on update cascade on delete cascade,
    --  creacion de la llave fornea de la tabla de estudiante
    foreign key(id_err) references estudiante (id_est) on update cascade on delete cascade
);

CREATE TABLE seccion_tiene_estudiante(
    id_estudiante   int,
    id_secc      int,

    --  CREACION LLAVES FORANEAS

    --  creacion de la llave fornea de la tabla de REPRESENTANTE
    foreign key(id_estudiante) references estudiante (id_est) on update cascade on delete cascade,
    --  creacion de la llave fornea de la tabla de estudiante
    foreign key(id_secc) references seccion (id_seccion) on update cascade on delete cascade
);

/*
constancia de inscripcion
Lista de estudiante
Profesores por seccion
Estudiante informacion personal
*/

