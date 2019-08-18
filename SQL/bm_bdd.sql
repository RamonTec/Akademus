--Seccion 1 creacion de las tablas de las bases de datos

--Creacion de la tabla persona
create table persona(
	id_per			serial primary key not null,
	ci				varchar(20) not null,
	pnombre			varchar(20) not null,
	segnombre		varchar(20),
	papellido		varchar(20) not null,
	segapellido		varchar(20),
	nacionalidad	char(1) not null
	);
--Creacion de la tabla cargo
create table cargo(
	id_cargo 	serial primary key not null,
	tipo_cargo 	varchar(30) not null
);
--Creacion de la tabla usuario
create table usuario(
	id_u 		serial primary key not null,
	nom_u 		varchar(20) not null,
	clave 		varchar(255) not null,
	privilegio 	char(20) not null,
	pregunta_S 	varchar(50) not null,
	respuesta_S varchar(50) not null,
	ultima_s    date,
	activo 		varchar(1) not null,
	id_pu 		varchar(20),
	foreign key (id_pu) references persona(id_per) on update cascade on delete cascade,
	id_cu 		serial,
	foreign key (id_cu) references cargo (id_cargo) on update cascade on delete cascade
);

--Creacion de la tabla profesor
create table profesor(
	cod_prof 	varchar(20) unique not null,
	tipo_prof 	varchar(20),
	id_prof 	varchar(20),
	foreign key (id_prof) references persona (id_per) on update cascade on delete cascade
);
--Creacion de la tabla profesion_u_oficio
create table profesion_u_oficio(
	id_po 		serial primary key not null,
	posee_po 	char(2),
	nom_po 		varchar(30),
	lugar_po 	varchar(30),
	tlf_po 		varchar(20)
);
--Creacion de la tabla pais
create table pais(
	id_pais 	serial primary key not null,
	nom_pais	varchar(20)
);
--Creacion de la tabla estado
create table estado(
	id_estado 	serial primary key not null,
	nom_estado	varchar(20),
	id_ep		serial,
	foreign key (id_ep) references pais(id_pais) on update cascade on delete cascade
);
--Creacion de la tabla
create table municipio(
	id_muni 	serial primary key not null,
	nombre_muni varchar(20),
	id_em 		serial,
	foreign key (id_em) references estado(id_estado) on update cascade on delete cascade
);
--Creacion de la tabla direccion
create table direccion(
	id_dir 		serial primary key not null,
	nºCasa 		varchar(20) not null,
	pto_ref 	varchar(255) not null,
	calle 		varchar(50) not null,
	sector		varchar(20) not null,
	id_md 		serial,
	foreign key (id_md) references municipio(id_muni) on update cascade on delete cascade
);
--Creacion  de la tabla representante
create table representante(
	tutor_legal 	char(15),
	id_rep 			varchar(20) primary key,
	foreign key (id_rep) references persona(id_per) on update cascade on delete cascade,
	id_pr 			serial,
	foreign key (id_pr) references profesion_u_oficio (id_po) on update cascade on delete cascade,
	id_dr 			serial,
	foreign key (id_dr) references direccion (id_dir) on update cascade on delete cascade
);

--Creacion de la tabla beca
create table beca(
	id_beca 	serial primary key not null,
	posee_b 	char(2),
	tipo_beca 	varchar(20),
	descripcion text
);

--Creacion de la tabla canaima
create table canaima(
	id_can 			serial primary key not null,
	posee_can 		char(2),
	modelo 			varchar(20),
	codigo  		varchar(20),
	serial			varchar(20),
	condicion		varchar(20)
);
--Creacion de la tabla de institucion de procedencia
create table institucionDeProcedencia(
	id_pro 		serial primary key not null,
	nom_pro	varchar(30),
	cod_dea 	varchar(20)
);
--Creacion de la tabla estudiante
create table estudiante(
	id_est 			serial primary key not null,
	ci_est			varchar(20) unique,
	ci_escolar		varchar(20) unique,
	pasaporte 		varchar(20) unique,
	ci_diplomatica	varchar(20) unique,
	tipo_est 		varchar(20) not null,
	fecha_n 		date not null,
	lugar_n 		text not null,
	sexo			char(1) not null,
	pnom			varchar(20) not null,
	segnom          varchar(20),
	otrosnom		varchar(20),
	pape			varchar(20) not null,
	segape	        varchar(20),
	otrosape		varchar(20),
	id_be 			serial,
	foreign key (id_be) references beca (id_beca) on update cascade on delete cascade,
	id_ce			serial,
	foreign key (id_ce) references canaima (id_can) on update cascade on delete cascade,
	id_de			varchar(20),
	foreign key (id_de) references direccion (id_dir) on update cascade on delete cascade,
	id_poe 			serial,
	foreign key (id_poe) references institucionDeProcedencia(id_pro) on update cascade on delete cascade
);
--Creacion de la tabla telefono
create table telefono(
	id_tlf 			serial primary key not null,
	cod_area1 		varchar(5) not null,
	numero1 		varchar(10) not null,
	tipo1 			char(5),
	id_tr			serial,
	id_te 			serial,
	foreign key (id_tr) references representante (id_rep) on update cascade on delete cascade,
	foreign key (id_te) references estudiante (id_est) on update cascade on delete cascade

);
--Creacion de la tabla email
create table email(
	id_correo 		serial primary key not null,
	correo 			varchar(20),
	id_re 			serial,
	id_ee			serial,
	foreign key (id_re) references representante (id_rep) on update cascade on delete cascade,
	foreign key (id_ee) references estudiante (id_est) on update cascade on delete cascade
);

--Creacion de la tabla salud
create table salud(
	id_s 			serial primary key not null,
	condicion_s		varchar(20),
	obervacion_s 	text,
	peso 			float,
	altura 			float
);

--Creacion de la tabla vacuna
create table vacuna(
	descripcion_v 	text,
	falta_v 		char(2),
	id_sv 			serial unique,
	foreign key (id_sv) references salud(id_s) on update cascade on delete cascade
);

--Creacion de la tabla incapacidad
create table incapacidad(
	nom_i 		varchar(20),
	tipo_i 			varchar(20),
	id_si 			serial unique,
	foreign key (id_si) references salud(id_s) on update cascade on delete cascade
);

--Creacion de la tabla discapacidad
create table discapacidad(
	nom_d 		varchar(20),
	tipo_d 			varchar(20),
	id_sd 			serial unique,
	foreign key (id_sd) references salud(id_s) on update cascade on delete cascade
);

--Creacion de la tabla enfermedad
create table enfermedad(
	nom_e 		varchar(20),
	tipo_e 			varchar(20),
	id_se 			serial unique,
	foreign key (id_se) references salud(id_s) on update cascade on delete cascade
);

--Creacion de la tabla tratamiento
create table tratamiento(
	id_t 			serial primary key not null,
	nom_t 		    varchar(20),
	tipo_t 			varchar(20)
);

--Creacion de la tabla periodo escolar
create table periodoEscolar(
	id_pe 		serial primary key not null,
	fechaI 		date,
	fechaF 		date,
	nom_pe 		varchar(20)
);

--Creacion de la tabla notas certificadas
create table notasCertificadas(
	id_nc 		serial primary key not null,
	n_nc 		int,
	id_pn 		serial unique,
	foreign key (id_pn) references periodoEscolar(id_pe) on update cascade on delete cascade
);
--Creacion de la tabla uniforme
create table uniforme(
	id_uni 		serial primary key not null,
	talla_c 	char(1),
	talla_p 	varchar(3),
	talla_z 	varchar(2)
);

--Creacion de la tabla seccion
create table seccion(
	id_seccion 		serial primary key not null,
	cod_sec 		varchar(20) unique,
	cant_est 		int
);
--Creacion de la tabla grado
create table grado(
	id_g 	 		serial primary key not null,
	num_g			varchar(20),
	id_gs 			serial,
	foreign key (id_gs) references seccion(id_seccion) on update cascade on delete cascade
);
--Creacion de la tabla matricula
create table matricula(
	id_m 	 		serial primary key not null,
	estado_m		varchar(20),
	id_mp			serial unique,
	foreign key (id_mp) references periodoEscolar(id_pe) on update cascade on delete cascade,
	id_mg			serial unique,
	foreign key (id_mg) references grado(id_g) on update cascade on delete cascade
);
--Creacion de la tabla calificaciones
create table calificaciones(
	id_ca 		serial primary key not null,
	tipo_ca 	char(20),
	n_ca		varchar(10)
);
--Creacion de la tabla evaluaciones
create table evaluaciones(
	id_ev		serial primary key not null,
	tipo_ev 	varchar(20),
	id_ec 		serial unique,
	foreign key (id_ec) references calificaciones(id_ca) on update cascade on delete cascade
);

--Creacion de la tabla inasistencia
create table inasistencia(
	id_ina 			serial primary key not null,
	cantidad_ina	varchar(2)
);

--Creacion de la tabla aprobada
create table aprobada(
	nota_aprob 		varchar(2),
	nota_LAprob		varchar(2),
	id_CAprob		serial unique,
	foreign key (id_CAprob) references calificaciones (id_ca) on update cascade on delete cascade
);
--Creacion de la tabla reprobada
create table reprobada(
	nota_repro		varchar(2),
	nota_lrepro		varchar(2),
	id_rina			serial unique,
	foreign key (id_rina) references inasistencia (id_ina) on update cascade on delete cascade,
	id_creprob		serial unique,
	foreign key (id_creprob) references calificaciones (id_ca) on update cascade on delete cascade
);
--Creacion de la tabla lapso
create table lapso(
	id_l 		serial primary key not null,
	pril 		varchar(4),
	segl 		varchar(4),
	terl 		varchar(4),
	final		varchar(4),
	id_lca		serial unique,
	foreign key (id_lca) references calificaciones (id_ca) on update cascade on delete cascade
);
--Creacion de la tabla area de aprendizaje
create table areaDeAprendizaje(
	id_a 		serial primary key not null,
	nom_a 		varchar(20) unique,
	tipo_a 		varchar(20),
	id_aac 		serial,
	foreign key (id_aac) references calificaciones (id_ca) on update cascade on delete cascade
);
--Creacion de la tala extraAcademica
create table extraAcademica(
	cod_extra 		varchar(20) unique not null,
	presenta_ex		char(2),
	nombre_ex		varchar(30),
	tipo_ex 		varchar(20),
	id_aea			serial unique,
	foreign key (id_aea) references areaDeAprendizaje (id_a) on update cascade on delete cascade

);
--Creacion de la tabla area de transferencia
create table areaDeTransferencia(
	id_at 		serial primary key not null,
	nom_at 		varchar(20),
	id_aat 		serial,
	foreign key (id_aat) references areaDeAprendizaje (id_a) on update cascade on delete cascade
);


-------------------------------------------- SECCION 2: DEFINICION Y CREACION DE LAS TABLAS MUCHOS A MUCHOS---------------------

--CREACCION TABLA USUARIO_INSCRIBE_EST
CREATE TABLE usuario_inscribe_estudiante(
    id_uu	   serial unique,
    id_uie	   serial unique,
    fecha_ins  date,
    -- CREACION LLAVES FORANEAS

    -- creacion de la llave fornea de la tabla usuaio
    foreign key(id_uu) references usuario (id_u) on update cascade on delete cascade,
    -- creacion de la llave fornea de la tabla estudiante
    foreign key(id_uie) references estudiante (id_est) on update cascade on delete cascade
);
--CREACION TABLA ESTUDIATE_UTILIZA_UNIFORME
CREATE TABLE estudiante_utiliza_uniforme(
    id_eeu      serial unique,
    id_unie     serial unique,

    -- CREACION LLAVES FORANEAs

    -- creacion de la llave fornea de la tabla estudiante
    foreign key(id_eeu) references estudiante (id_est) on update cascade on delete cascade,
    -- creacion de la llave fornea de la tabla uniforme
    foreign key(id_unie) references uniforme (id_uni) on update cascade on delete cascade
);

-- CREACION TABLA ESTUDIANE_REALIZAE_EVALUACIONES
CREATE TABLE estudiante_realiza_evaluaciones(
    id_ere      serial unique,
    id_eve      serial unique,
    fecha_e     date,

    -- CREACION DE LAS LLAVES FORANEAS

    -- creacion de la llave fornea de la tabla estudiante
    foreign key(id_ere) references estudiante (id_est) on update cascade on delete cascade,
    -- creacion de la llave fornea de la tabla evaluacion
    foreign key(id_eve) references evaluaciones (id_ev) on update cascade on delete cascade
);

--CREACION TABLA ESTUDIANTE_PADECE_SALUD
CREATE TABLE estudiante_padece_salud(
    id_eps      serial unique,
    id_sep      serial unique,

    -- CREACION DE LLAVE FORANEA

    -- creacion de la llave fornea de la tabla ESTUDIANTE
    foreign key(id_eps) references estudiante (id_est) on update cascade on delete cascade,
    -- creacion de la llave fornea de la tabla de SALUD
    foreign key(id_sep) references salud (id_s) on update cascade on delete cascade
);

--CREACION TABLA ENFERMEDAD_TIENE_TRATAMIENTO
CREATE TABLE enfermedad_tiene_tratamiento(
    id_ee       serial unique,
    id_te       serial unique,

    -- CREACION LAVES FORANEAS

    -- creacion de la llave fornea de la tabla de DISCAPACIDAD
    foreign key(id_ee) references enfermedad (id_se) on update cascade on delete cascade,
    -- creacion de la llave fornea de la tabla de TRATAMIENTO
    foreign key(id_te) references tratamiento (id_t) on update cascade on delete cascade
);

--CREACION TABLA INCAPACIDAD_TIENE_TRATAMIENTO
CREATE TABLE incapacidad_tiene_tratamiento(
    id_ii       serial unique,
    id_ti       serial unique,

    -- CREACION DE LAS LLAVES FORANEAS

    -- creacion de la llave fornea de la tabla INCAPACIDAD
    foreign key(id_ii) references incapacidad (id_si) on update cascade on delete cascade,
    -- creacion de la llave fornea de la tabla de TRATAMIENTO
    foreign key(id_ti) references tratamiento (id_t) on update cascade on delete cascade
);

--CREACION TABLA DISCAPACIDAD_TIENE_TRATAMIENTO
CREATE TABLE discapacidad_tiene_tratamiento(
    id_dd       serial unique,
    id_td       serial unique,

    -- CREACION LAVES FORANEAS

    -- creacion de la llave fornea de la tabla de DISCAPACIDAD
    foreign key(id_dd) references discapacidad (id_sd) on update cascade on delete cascade,
    -- creacion de la llave fornea de la tabla de TRATAMIENTO
    foreign key(id_td) references tratamiento (id_t) on update cascade on delete cascade
);

--CREACION TABLA NOTAS_POR_PERIODO
CREATE TABLE notas_por_periodo(
    id_nn      serial unique,
    id_pnn      serial unique,

    -- CREACION LAVES FORANEAS

    -- creacion de la llave fornea de la tabla de NOTAS
    foreign key(id_nn) references notasCertificadas (id_nc) on update cascade on delete cascade,
    -- creacion de la llave fornea de la tabla de PERIODO
    foreign key(id_pnn) references periodoEscolar (id_pe) on update cascade on delete cascade
);
--CREACION TABLA ESTUDIANTE_CURSA_AREA
CREATE TABLE estudiante_inscribe_matricula(
    id_eei     serial unique,
    id_mei     serial unique,
     -- CREACION LAVES FORANEAS

    -- creacion de la llave fornea de la tabla de ESTUDIANTE
    foreign key(id_eei) references estudiante (id_est) on update cascade on delete cascade,
    -- creacion de la llave fornea de la tabla de AREA
    foreign key(id_mei) references matricula (id_m) on update cascade on delete cascade
);
--CREACION TABLA PERIODO_ACTIVA_SECCION
CREATE TABLE matricula_establece_evaluaciones(
    id_mm      serial unique,
    id_evm      serial unique,

    -- CREACION LAVES FORANEAS

    -- creacion de la llave fornea de la tabla de PERIODO
    foreign key(id_mm) references matricula (id_m) on update cascade on delete cascade,
    -- creacion de la llave fornea de la tabla de seccion
    foreign key(id_evm) references evaluaciones (id_ev) on update cascade on delete cascade
);
--CREACION TABLA EVALUACIONES_POR_AREA
CREATE TABLE evaluaciones_por_area(
    id_ee       serial unique,
    id_ae       serial unique,

     -- CREACION LLAVES FORANEAS

    -- creacion de la llave fornea de la tabla evaluacion
    foreign key(id_ee) references evaluaciones (id_ev) on update cascade on delete cascade,
    -- creacion de la llave fornea de la tabla Area de aprendizaje
    foreign key(id_ae) references areaDeAprendizaje (id_a) on update cascade on delete cascade
);

-- CREACION TABLA AREAS_POR_LAPSO
CREATE TABLE areas_por_lapso(
    id_ael     serial unique,
    id_la      serial unique,

    -- creacion llave foranea

    -- creacion de la llave fornea de la tabla Area de aprendizaje
    foreign key(id_ael) references areaDeAprendizaje (id_a) on update cascade on delete cascade,
     -- creacion de la llave fornea de la tabla lapso
    foreign key(id_la) references lapso (id_l) on update cascade on delete cascade
);
--CREACION TABLA ESTUDIANTE_SOLICITA_NOTAS
CREATE TABLE estudiante_solicita_notas(
    id_esn      serial unique,
    id_nes      serial unique,
    fecha_soli date,

    -- CREACION LLAVES FORANEAS

    -- creacion de la llave fornea de la tabla de ESTUDIANTE
    foreign key(id_esn) references estudiante (id_est) on update cascade on delete cascade,
    -- creacion de la llave fornea de la tabla de NOTAS_CERTIFICADAS
    foreign key(id_nes) references notasCertificadas (id_nc) on update cascade on delete cascade
);
--CREACION TABLA REPRESENTANTE_REPRESENTA_ESTUDIANTE
CREATE TABLE representante_representa_estudiante(
    id_rer      serial unique,
    id_err      serial unique,
    parentesco  varchar(30),

    -- CREACION LLAVES FORANEAS

    -- creacion de la llave fornea de la tabla de REPRESENTANTE
    foreign key(id_rer) references representante (id_rep) on update cascade on delete cascade,
    -- creacion de la llave fornea de la tabla de estudiante
    foreign key(id_err) references estudiante (id_est) on update cascade on delete cascade
);
