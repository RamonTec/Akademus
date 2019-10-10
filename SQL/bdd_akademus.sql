--Ultima base de datos LA MÁS ACTUAL sabado 20 de julio.
--Seccion 1 creacion de las tablas de las bases de datos

--Creacion de la tabla persona
create table persona(
	id_per			int auto_increment primary key not null,
	ci				varchar(20) not null,
	pnombre			varchar(20) not null,
	segnombre		varchar(20),
	papellido		varchar(20) not null,
	segapellido		varchar(20),
	nacionalidad	char(1) not null,
	sexo_p			char(1) not null
);
--Creacion de la tabla cargo
create table cargo(
	id_cargo 	int auto_increment primary key not null,
	tipo_cargo 	varchar(30) not null
);

--Creacion de la tabla usuario
create table usuario(
	id_u 		int auto_increment primary key not null,
	nom_u 		varchar(20) not null,
	clave 		varchar(255) not null,
	privilegio 	char(20) not null,
	pregunta_S 	varchar(50) not null,
	respuesta_S varchar(50) not null,
	ultima_s    date,
	activo 		varchar(1) not null,
	id_pu 		int,
	foreign key (id_pu) references persona(id_per) on update cascade on delete cascade,
	id_cu 		int,
	foreign key (id_cu) references cargo (id_cargo) on update cascade on delete cascade
);

--Creacion de la tabla profesor
create table profesor(
	cod_prof 	varchar(20) unique not null,
	tipo_prof 	varchar(20),
	id_prof 	int,
	foreign key (id_prof) references persona (id_per) on update cascade on delete cascade
);

--Creacion de la tabla profesion_u_oficio
create table profesion_u_oficio(
	id_po 		int auto_increment primary key not null,
	posee_po 	char(2),
	nom_po 		varchar(30),
	lugar_po 	varchar(30),
	tlf_po 		varchar(20)
);

--Creacion de la tabla pais
create table pais(
	id_pais 	int auto_increment primary key not null,
	nom_pais	varchar(20)
);

--Creacion de la tabla estado
create table estado(
	id_estado 	int auto_increment primary key not null,
	nom_estado	varchar(20),
	id_ep		int,
	foreign key (id_ep) references pais(id_pais) on update cascade on delete cascade
);

--Creacion de la tabla
create table municipio(
	id_muni 	int auto_increment primary key not null,
	nombre_muni varchar(20),
	id_em 		int,
	foreign key (id_em) references estado(id_estado) on update cascade on delete cascade
);

--Creacion de la tabla direccion
create table direccion(
	id_dir 		int auto_increment primary key not null,
	nºCasa 		varchar(20) not null,
	pto_ref 	varchar(255) not null,
	calle 		varchar(50) not null,
	sector		varchar(20) not null,
	id_md 		int,
	foreign key (id_md) references municipio(id_muni) on update cascade on delete cascade
);

--Creacion  de la tabla representante
create table representante(
	tutor_legal 	char(15),
	id_rep 			int primary key,
	foreign key (id_rep) references persona(id_per) on update cascade on delete cascade,
	id_pr 			int,
	foreign key (id_pr) references profesion_u_oficio (id_po) on update cascade on delete cascade,
	id_dr 			int,
	foreign key (id_dr) references direccion (id_dir) on update cascade on delete cascade
);

--Creacion de la tabla beca
create table beca(
	id_beca 	int auto_increment primary key not null,
	posee_b 	char(2),
	tipo_beca 	varchar(20),
	descripcion text
);

--Creacion de la tabla canaima
create table canaima(
	id_can 			int primary key not null,
	posee_can 		char(2),
	modelo 			varchar(20),
	codigo  		varchar(20),
	serial			varchar(20),
	condicion		varchar(20)
);

--Creacion de la tabla de institucion de procedencia
create table institucionDeProcedencia(
	id_pro 		int auto_increment primary key not null,
	nom_pro	    varchar(30),
	cod_dea 	varchar(20)
);

--Creacion de la tabla estudiante
create table estudiante(
	id_est 			int auto_increment primary key not null,
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
	nacionalidad_e  varchar(20),
	id_be 			int,
	foreign key (id_be) references beca (id_beca) on update cascade on delete cascade,
	id_ce			int,
	foreign key (id_ce) references canaima (id_can) on update cascade on delete cascade,
	id_de			int,
	foreign key (id_de) references direccion (id_dir) on update cascade on delete cascade,
	id_poe 			int,
	foreign key (id_poe) references institucionDeProcedencia(id_pro) on update cascade on delete cascade
);

--Creacion de la tabla telefono
create table telefono(
	id_tlf 			int auto_increment primary key not null,
	cod_area1 		varchar(5) not null,
	numero1 		varchar(10) not null,
	tipo1 			char(5),
	id_tr			int,
	id_te 			int,
	foreign key (id_tr) references representante (id_rep) on update cascade on delete cascade,
	foreign key (id_te) references estudiante (id_est) on update cascade on delete cascade
);

--Creacion de la tabla email
create table email(
	id_correo 		int auto_increment primary key not null,
	correo 			varchar(20),
	id_re 			int,
	id_ee			int,
	foreign key (id_re) references representante (id_rep) on update cascade on delete cascade,
	foreign key (id_ee) references estudiante (id_est) on update cascade on delete cascade
);

--Creacion de la tabla salud
create table salud(
	id_s 			int auto_increment primary key not null,
	condicion_s		varchar(20),
	obervacion_s 	text,
	peso 			float,
	altura 			float
);

--Creacion de la tabla vacuna
create table vacuna(
	descripcion_v 	text,
	falta_v 		char(2),
	id_sv 			int unique,
	foreign key (id_sv) references salud(id_s) on update cascade on delete cascade
);

--Creacion de la tabla incapacidad
create table incapacidad(
	nom_i 		varchar(20),
	tipo_i 		varchar(20),
	id_si 		int unique,
	foreign key (id_si) references salud(id_s) on update cascade on delete cascade
);

--Creacion de la tabla discapacidad
create table discapacidad(
	nom_d 		varchar(20),
	tipo_d 		varchar(20),
	id_sd 		int unique,
	foreign key (id_sd) references salud(id_s) on update cascade on delete cascade
);

--Creacion de la tabla enfermedad
create table enfermedad(
	nom_e 		varchar(20),
	tipo_e 		varchar(20),
	id_se 		int unique,
	foreign key (id_se) references salud(id_s) on update cascade on delete cascade
);

--Creacion de la tabla tratamiento
create table tratamiento(
	id_t 			int auto_increment primary key not null,
	nom_t 		    varchar(20),
	tipo_t 			varchar(20)
);

--Creacion de la tabla periodo escolar
create table periodoEscolar(
	id_pe 		int auto_increment primary key not null,
	fechaI 		date,
	fechaF 		date,
	nom_pe 		varchar(20)
);

--Creacion de la tabla notas certificadas
create table notasCertificadas(
	id_nc 		int auto_increment primary key not null,
	n_nc 		int,
	id_pn 		int unique,
	foreign key (id_pn) references periodoEscolar(id_pe) on update cascade on delete cascade
);

--Creacion de la tabla uniforme
create table uniforme(
	id_uni 		int primary key not null,
	talla_c 	char(1),
	talla_p 	varchar(3),
	talla_z 	varchar(2)
);

--Creacion de la tabla seccion
create table seccion(
	id_seccion 		int primary key not null,
	cod_sec 		varchar(20) unique,
	cant_est 		int
);

--Creacion de la tabla grado
create table grado(
	id_g 	 		int auto_increment primary key not null,
	num_g			varchar(20),
	id_gs 			int,
	foreign key (id_gs) references seccion(id_seccion) on update cascade on delete cascade
);

--Creacion de la tabla matricula
create table matricula(
	id_m 	 		int auto_increment primary key not null,
	estado_m		varchar(20),
	id_mp			int unique,
	foreign key (id_mp) references periodoEscolar(id_pe) on update cascade on delete cascade,
	id_mg			int unique,
	foreign key (id_mg) references grado(id_g) on update cascade on delete cascade
);

--Creacion de la tabla calificaciones
create table calificaciones(
	id_ca 		int auto_increment primary key not null,
	tipo_ca 	char(20),
	n_ca		varchar(10)
);

--Creacion de la tabla evaluaciones
create table evaluaciones(
	id_ev		int auto_increment primary key not null,
	tipo_ev 	varchar(20),
	id_ec 		int unique,
	foreign key (id_ec) references calificaciones(id_ca) on update cascade on delete cascade
);

--Creacion de la tabla inasistencia
create table inasistencia(
	id_ina 			int auto_increment primary key not null,
	cantidad_ina	varchar(2)
);

--Creacion de la tabla aprobada
create table aprobada(
	nota_aprob 		varchar(2),
	nota_LAprob		varchar(2),
	id_CAprob		int unique,
	foreign key (id_CAprob) references calificaciones (id_ca) on update cascade on delete cascade
);

--Creacion de la tabla reprobada
create table reprobada(
	nota_repro		varchar(2),
	nota_lrepro		varchar(2),
	id_rina			int unique,
	foreign key (id_rina) references inasistencia (id_ina) on update cascade on delete cascade,
	id_creprob		int unique,
	foreign key (id_creprob) references calificaciones (id_ca) on update cascade on delete cascade
);

--Creacion de la tabla lapso
create table lapso(
	id_l 		int auto_increment primary key not null,
	pril 		varchar(4),
	segl 		varchar(4),
	terl 		varchar(4),
	final		varchar(4),
	id_lca		int unique,
	foreign key (id_lca) references calificaciones (id_ca) on update cascade on delete cascade
);

--Creacion de la tabla area de aprendizaje
create table areaDeAprendizaje(
	id_a 		int auto_increment primary key not null,
	nom_a 		varchar(20) unique,
	tipo_a 		varchar(20),
	id_aac 		int,
	foreign key (id_aac) references calificaciones (id_ca) on update cascade on delete cascade
);

--Creacion de la tala extraAcademica
create table extraAcademica(
	cod_extra 		varchar(20) unique not null,
	presenta_ex		char(2),
	nombre_ex		varchar(30),
	tipo_ex 		varchar(20),
	id_aea			int unique,
	foreign key (id_aea) references areaDeAprendizaje (id_a) on update cascade on delete cascade

);

--Creacion de la tabla area de transferencia
create table areaDeTransferencia(
	id_at 		int auto_increment primary key not null,
	nom_at 		varchar(20),
	id_aat 		int,
	foreign key (id_aat) references areaDeAprendizaje (id_a) on update cascade on delete cascade
);

-------------------------------------------- SECCION 2: DEFINICION Y CREACION DE LAS TABLAS MUCHOS A MUCHOS---------------------

--CREACCION TABLA USUARIO_INSCRIBE_EST
CREATE TABLE usuario_inscribe_estudiante(
    id_uu	   int unique,
    id_uie	   int unique,
    fecha_ins  date,
    -- CREACION LLAVES FORANEAS

    -- creacion de la llave fornea de la tabla usuaio
    foreign key(id_uu) references usuario (id_u) on update cascade on delete cascade,
    -- creacion de la llave fornea de la tabla estudiante
    foreign key(id_uie) references estudiante (id_est) on update cascade on delete cascade
);

--CREACION TABLA ESTUDIATE_UTILIZA_UNIFORME
CREATE TABLE estudiante_utiliza_uniforme(
    id_eeu      int unique,
    id_unie     int unique,

    -- CREACION LLAVES FORANEAs

    -- creacion de la llave fornea de la tabla estudiante
    foreign key(id_eeu) references estudiante (id_est) on update cascade on delete cascade,
    -- creacion de la llave fornea de la tabla uniforme
    foreign key(id_unie) references uniforme (id_uni) on update cascade on delete cascade
);

-- CREACION TABLA ESTUDIANE_REALIZAE_EVALUACIONES
CREATE TABLE estudiante_realiza_evaluaciones(
    id_ere      int unique,
    id_eve      int unique,
    fecha_e     date,

    -- CREACION DE LAS LLAVES FORANEAS

    -- creacion de la llave fornea de la tabla estudiante
    foreign key(id_ere) references estudiante (id_est) on update cascade on delete cascade,
    -- creacion de la llave fornea de la tabla evaluacion
    foreign key(id_eve) references evaluaciones (id_ev) on update cascade on delete cascade
);

--CREACION TABLA ESTUDIANTE_PADECE_SALUD
CREATE TABLE estudiante_padece_salud(
    id_eps      int unique,
    id_sep      int unique,

    -- CREACION DE LLAVE FORANEA

    -- creacion de la llave fornea de la tabla ESTUDIANTE
    foreign key(id_eps) references estudiante (id_est) on update cascade on delete cascade,
    -- creacion de la llave fornea de la tabla de SALUD
    foreign key(id_sep) references salud (id_s) on update cascade on delete cascade
);

--CREACION TABLA ENFERMEDAD_TIENE_TRATAMIENTO
CREATE TABLE enfermedad_tiene_tratamiento(
    id_ee       int unique,
    id_te       int unique,

    -- CREACION LAVES FORANEAS

    -- creacion de la llave fornea de la tabla de DISCAPACIDAD
    foreign key(id_ee) references enfermedad (id_se) on update cascade on delete cascade,
    -- creacion de la llave fornea de la tabla de TRATAMIENTO
    foreign key(id_te) references tratamiento (id_t) on update cascade on delete cascade
);

--CREACION TABLA INCAPACIDAD_TIENE_TRATAMIENTO
CREATE TABLE incapacidad_tiene_tratamiento(
    id_ti       int unique,
    id_ii       int unique,

    -- CREACION DE LAS LLAVES FORANEAS

    -- creacion de la llave fornea de la tabla INCAPACIDAD
    foreign key(id_ii) references incapacidad (id_si) on update cascade on delete cascade,
    -- creacion de la llave fornea de la tabla de TRATAMIENTO
    foreign key(id_ti) references tratamiento (id_t) on update cascade on delete cascade
);

--CREACION TABLA DISCAPACIDAD_TIENE_TRATAMIENTO
CREATE TABLE discapacidad_tiene_tratamiento(
    id_dd       int unique,
    id_td       int unique,

    -- CREACION LAVES FORANEAS

    -- creacion de la llave fornea de la tabla de DISCAPACIDAD
    foreign key(id_dd) references discapacidad (id_sd) on update cascade on delete cascade,
    -- creacion de la llave fornea de la tabla de TRATAMIENTO
    foreign key(id_td) references tratamiento (id_t) on update cascade on delete cascade
);

--CREACION TABLA NOTAS_POR_PERIODO
CREATE TABLE notas_por_periodo(
    id_nn      int unique,
    id_pnn     int unique,

    -- CREACION LAVES FORANEAS

    -- creacion de la llave fornea de la tabla de NOTAS
    foreign key(id_nn) references notasCertificadas (id_nc) on update cascade on delete cascade,
    -- creacion de la llave fornea de la tabla de PERIODO
    foreign key(id_pnn) references periodoEscolar (id_pe) on update cascade on delete cascade
);

--CREACION TABLA ESTUDIANTE_CURSA_AREA
CREATE TABLE estudiante_inscribe_matricula(
    id_eei     int unique,
    id_mei     int unique,
     -- CREACION LAVES FORANEAS

    -- creacion de la llave fornea de la tabla de ESTUDIANTE
    foreign key(id_eei) references estudiante (id_est) on update cascade on delete cascade,
    -- creacion de la llave fornea de la tabla de AREA
    foreign key(id_mei) references matricula (id_m) on update cascade on delete cascade
);

--CREACION TABLA PERIODO_ACTIVA_SECCION
CREATE TABLE matricula_establece_evaluaciones(
    id_mm      int unique,
    id_evm     int unique,

    -- CREACION LAVES FORANEAS

    -- creacion de la llave fornea de la tabla de PERIODO
    foreign key(id_mm) references matricula (id_m) on update cascade on delete cascade,
    -- creacion de la llave fornea de la tabla de seccion
    foreign key(id_evm) references evaluaciones (id_ev) on update cascade on delete cascade
);

--CREACION TABLA EVALUACIONES_POR_AREA
CREATE TABLE evaluaciones_por_area(
    id_ee       int unique,
    id_ae       int unique,

     -- CREACION LLAVES FORANEAS

    -- creacion de la llave fornea de la tabla evaluacion
    foreign key(id_ee) references evaluaciones (id_ev) on update cascade on delete cascade,
    -- creacion de la llave fornea de la tabla Area de aprendizaje
    foreign key(id_ae) references areaDeAprendizaje (id_a) on update cascade on delete cascade
);

-- CREACION TABLA AREAS_POR_LAPSO
CREATE TABLE areas_por_lapso(
    id_ael     int unique,
    id_la      int unique,

    -- creacion llave foranea

    -- creacion de la llave fornea de la tabla Area de aprendizaje
    foreign key(id_ael) references areaDeAprendizaje (id_a) on update cascade on delete cascade,
     -- creacion de la llave fornea de la tabla lapso
    foreign key(id_la) references lapso (id_l) on update cascade on delete cascade
);

--CREACION TABLA ESTUDIANTE_SOLICITA_NOTAS
CREATE TABLE estudiante_solicita_notas(
    id_esn      int unique,
    id_nes      int unique,
    fecha_soli date,

    -- CREACION LLAVES FORANEAS

    -- creacion de la llave fornea de la tabla de ESTUDIANTE
    foreign key(id_esn) references estudiante (id_est) on update cascade on delete cascade,
    -- creacion de la llave fornea de la tabla de NOTAS_CERTIFICADAS
    foreign key(id_nes) references notasCertificadas (id_nc) on update cascade on delete cascade
);

--CREACION TABLA REPRESENTANTE_REPRESENTA_ESTUDIANTE
CREATE TABLE representante_representa_estudiante(
    id_rer      int unique,
    id_err      int unique,
    parentesco  varchar(30),

    -- CREACION LLAVES FORANEAS

    -- creacion de la llave fornea de la tabla de REPRESENTANTE
    foreign key(id_rer) references representante (id_rep) on update cascade on delete cascade,
    -- creacion de la llave fornea de la tabla de estudiante
    foreign key(id_err) references estudiante (id_est) on update cascade on delete cascade
);
-----------------------------------------------------------------------------------------------------
-- Sentencias para creacion de grupos y privilegios de usuarios.
-- Estos grupos tendran acceso a todos los modulos del sistema.
-- Creación del grupo directivo (USUARIO -> DIRECTIVO)
CREATE GROUP directivo;

-- Creación del grupo de autorizados (USUARIOS -> AUTORIZADOS)
CREATE GROUP autorizados;

-- Creación del grupo de seccional (USUARIOS -> SECCIONAL)
CREATE GROUP seccional;

-- Este grupo de usuarios solo tendra acceso a los modulos de:
--- Reporte, Evaluación, Mantenimiento, Acerca de.
CREATE GROUP academico;

-- Permisos al grupo directivo
GRANT ALL ON "aprobada" TO GROUP directivo;
GRANT ALL ON "areadeaprendizaje" TO GROUP directivo;
GRANT ALL ON "areadetransferencia" TO GROUP directivo;
GRANT ALL ON "areas_por_lapso" TO GROUP directivo;
GRANT ALL ON "beca" TO GROUP directivo;
GRANT ALL ON "calificaciones" TO GROUP directivo;
GRANT ALL ON "canaima" TO GROUP directivo;
GRANT ALL ON "cargo" TO GROUP directivo;
GRANT ALL ON "direccion" TO GROUP directivo;
GRANT ALL ON "discapacidad" TO GROUP directivo;
GRANT ALL ON "discapacidad_tiene_tratamiento" TO GROUP directivo;
GRANT ALL ON "email" TO GROUP directivo;
GRANT ALL ON "enfermedad" TO GROUP directivo;
GRANT ALL ON "enfermedad_tiene_tratamiento" TO GROUP directivo;
GRANT ALL ON "estado" TO GROUP directivo;
GRANT ALL ON "estudiante" TO GROUP directivo;
GRANT ALL ON "estudiante_inscribe_matricula" TO GROUP directivo;
GRANT ALL ON "estudiante_padece_salud" TO GROUP directivo;
GRANT ALL ON "estudiante_realiza_evaluaciones" TO GROUP directivo;
GRANT ALL ON "estudiante_solicita_notas" TO GROUP directivo;
GRANT ALL ON "estudiante_utiliza_uniforme" TO GROUP directivo;
GRANT ALL ON "evaluaciones" TO GROUP directivo;
GRANT ALL ON "evaluaciones_por_area" TO GROUP directivo;
GRANT ALL ON "extraacademica" TO GROUP directivo;
GRANT ALL ON "grado" TO GROUP directivo;
GRANT ALL ON "inasistencia" TO GROUP directivo;
GRANT ALL ON "incapacidad" TO GROUP directivo;
GRANT ALL ON "incapacidad_tiene_tratamiento" TO GROUP directivo;
GRANT ALL ON "instituciondeprocedencia" TO GROUP directivo;
GRANT ALL ON "lapso" TO GROUP directivo;
GRANT ALL ON "matricula" TO GROUP directivo;
GRANT ALL ON "matricula_establece_evaluaciones" TO GROUP directivo;
GRANT ALL ON "municipio" TO GROUP directivo;
GRANT ALL ON "notas_por_periodo" TO GROUP directivo;
GRANT ALL ON "notascertificadas" TO GROUP directivo;
GRANT ALL ON "pais" TO GROUP directivo;
GRANT ALL ON "periodoescolar" TO GROUP directivo;
GRANT ALL ON "persona" TO GROUP directivo;
GRANT ALL ON "profesion_u_oficio" TO GROUP directivo;
GRANT ALL ON "profesor" TO GROUP directivo;
GRANT ALL ON "representante" TO GROUP directivo;
GRANT ALL ON "representante_representa_estudiante" TO GROUP directivo;
GRANT ALL ON "reprobada" TO GROUP directivo;
GRANT ALL ON "salud" TO GROUP directivo;
GRANT ALL ON "seccion" TO GROUP directivo;
GRANT ALL ON "telefono" TO GROUP directivo;
GRANT ALL ON "tratamiento" TO GROUP directivo;
GRANT ALL ON "uniforme" TO GROUP directivo;
GRANT ALL ON "usuario" TO GROUP directivo;
GRANT ALL ON "usuario_inscribe_estudiante" TO GROUP directivo;
GRANT ALL ON "vacuna" TO GROUP directivo;

-- Sentencia para la creacion del usuario directivo 
-- (TIENE TODOS LOS PRIVILEGIOS SOBRE LA BDD)
CREATE USER director WITH PASSWORD 'director1' IN GROUP directivo;

-- Permisos al grupo autorizado
GRANT ALL ON "areadeaprendizaje" TO GROUP autorizados;
GRANT ALL ON "areadetransferencia" TO GROUP autorizados;
GRANT ALL ON "areas_por_lapso" TO GROUP autorizados;
GRANT ALL ON "beca" TO GROUP autorizados;
GRANT ALL ON "calificaciones" TO GROUP autorizados;
GRANT ALL ON "canaima" TO GROUP autorizados;
GRANT ALL ON "cargo" TO GROUP autorizados;
GRANT ALL ON "aprobada" TO GROUP autorizados;
GRANT ALL ON "direccion" TO GROUP autorizados;
GRANT ALL ON "discapacidad" TO GROUP autorizados;
GRANT ALL ON "discapacidad_tiene_tratamiento" TO GROUP autorizados;
GRANT ALL ON "email" TO GROUP autorizados;
GRANT ALL ON "enfermedad" TO GROUP autorizados;
GRANT ALL ON "enfermedad_tiene_tratamiento" TO GROUP autorizados;
GRANT ALL ON "estado" TO GROUP autorizados;
GRANT ALL ON "estudiante" TO GROUP autorizados;
GRANT ALL ON "estudiante_inscribe_matricula" TO GROUP autorizados;
GRANT ALL ON "estudiante_padece_salud" TO GROUP autorizados;
GRANT ALL ON "estudiante_realiza_evaluaciones" TO GROUP autorizados;
GRANT ALL ON "estudiante_solicita_notas" TO GROUP autorizados;
GRANT ALL ON "estudiante_utiliza_uniforme" TO GROUP autorizados;
GRANT ALL ON "evaluaciones" TO GROUP autorizados;
GRANT ALL ON "evaluaciones_por_area" TO GROUP autorizados;
GRANT ALL ON "extraacademica" TO GROUP autorizados;
GRANT ALL ON "grado" TO GROUP autorizados;
GRANT ALL ON "inasistencia" TO GROUP autorizados;
GRANT ALL ON "incapacidad" TO GROUP autorizados;
GRANT ALL ON "incapacidad_tiene_tratamiento" TO GROUP autorizados;
GRANT ALL ON "instituciondeprocedencia" TO GROUP autorizados;
GRANT ALL ON "lapso" TO GROUP autorizados;
GRANT ALL ON "matricula" TO GROUP autorizados;
GRANT ALL ON "matricula_establece_evaluaciones" TO GROUP autorizados;
GRANT ALL ON "municipio" TO GROUP autorizados;
GRANT ALL ON "notas_por_periodo" TO GROUP autorizados;
GRANT ALL ON "notascertificadas" TO GROUP autorizados;
GRANT ALL ON "pais" TO GROUP autorizados;
GRANT ALL ON "periodoescolar" TO GROUP autorizados;
GRANT ALL ON "persona" TO GROUP autorizados;
GRANT ALL ON "profesion_u_oficio" TO GROUP autorizados;
GRANT ALL ON "profesor" TO GROUP autorizados;
GRANT ALL ON "representante" TO GROUP autorizados;
GRANT ALL ON "representante_representa_estudiante" TO GROUP autorizados;
GRANT ALL ON "reprobada" TO GROUP autorizados;
GRANT ALL ON "salud" TO GROUP autorizados;
GRANT ALL ON "seccion" TO GROUP autorizados;
GRANT ALL ON "telefono" TO GROUP autorizados;
GRANT ALL ON "tratamiento" TO GROUP autorizados;
GRANT ALL ON "uniforme" TO GROUP autorizados;
GRANT ALL ON "usuario" TO GROUP autorizados;
GRANT ALL ON "usuario_inscribe_estudiante" TO GROUP autorizados;
GRANT ALL ON "vacuna" TO GROUP autorizados;

-- Sentencia para la creacion del usuario autorizado 
-- (TIENE TODOS LOS PRIVILEGIOS SOBRE LA BDD)
CREATE USER autorizado WITH PASSWORD 'autorizado1' IN GROUP autorizados;

-- Permisos al grupo seccional
GRANT SELECT, INSERT ON "areadetransferencia" TO GROUP seccional;
GRANT SELECT, INSERT ON "areadeaprendizaje" TO GROUP seccional;
GRANT SELECT, INSERT ON "areas_por_lapso" TO GROUP seccional;
GRANT SELECT, INSERT ON "beca" TO GROUP seccional;
GRANT SELECT, INSERT ON "calificaciones" TO GROUP seccional;
GRANT SELECT, INSERT ON "canaima" TO GROUP seccional;
GRANT SELECT, INSERT ON "cargo" TO GROUP seccional;
GRANT SELECT, INSERT ON "aprobada" TO GROUP seccional;
GRANT SELECT, INSERT ON "direccion" TO GROUP seccional;
GRANT SELECT, INSERT ON "discapacidad" TO GROUP seccional;
GRANT SELECT, INSERT ON "discapacidad_tiene_tratamiento" TO GROUP seccional;
GRANT SELECT, INSERT ON "email" TO GROUP seccional;
GRANT SELECT, INSERT ON "enfermedad" TO GROUP seccional;
GRANT SELECT, INSERT ON "enfermedad_tiene_tratamiento" TO GROUP seccional;
GRANT SELECT, INSERT ON "estado" TO GROUP seccional;
GRANT SELECT, INSERT ON "estudiante" TO GROUP seccional;
GRANT SELECT, INSERT ON "estudiante_inscribe_matricula" TO GROUP seccional;
GRANT SELECT, INSERT ON "estudiante_padece_salud" TO GROUP seccional;
GRANT SELECT, INSERT ON "estudiante_realiza_evaluaciones" TO GROUP seccional;
GRANT SELECT, INSERT ON "estudiante_solicita_notas" TO GROUP seccional;
GRANT SELECT, INSERT ON "estudiante_utiliza_uniforme" TO GROUP seccional;
GRANT SELECT, INSERT ON "evaluaciones" TO GROUP seccional;
GRANT SELECT, INSERT ON "evaluaciones_por_area" TO GROUP seccional;
GRANT SELECT, INSERT ON "extraacademica" TO GROUP seccional;
GRANT SELECT, INSERT ON "grado" TO GROUP seccional;
GRANT SELECT, INSERT ON "inasistencia" TO GROUP seccional;
GRANT SELECT, INSERT ON "incapacidad" TO GROUP seccional;
GRANT SELECT, INSERT ON "incapacidad_tiene_tratamiento" TO GROUP seccional;
GRANT SELECT, INSERT ON "instituciondeprocedencia" TO GROUP seccional;
GRANT SELECT, INSERT ON "lapso" TO GROUP seccional;
GRANT SELECT, INSERT ON "matricula" TO GROUP seccional;
GRANT SELECT, INSERT ON "matricula_establece_evaluaciones" TO GROUP seccional;
GRANT SELECT, INSERT ON "municipio" TO GROUP seccional;
GRANT SELECT, INSERT ON "notas_por_periodo" TO GROUP seccional;
GRANT SELECT, INSERT ON "notascertificadas" TO GROUP seccional;
GRANT SELECT, INSERT ON "pais" TO GROUP seccional;
GRANT SELECT, INSERT ON "periodoescolar" TO GROUP seccional;
GRANT SELECT, INSERT ON "persona" TO GROUP seccional;
GRANT SELECT, INSERT ON "profesion_u_oficio" TO GROUP seccional;
GRANT SELECT, INSERT ON "profesor" TO GROUP seccional;
GRANT SELECT, INSERT ON "representante" TO GROUP seccional;
GRANT SELECT, INSERT ON "representante_representa_estudiante" TO GROUP seccional;
GRANT SELECT, INSERT ON "reprobada" TO GROUP seccional;
GRANT SELECT, INSERT ON "salud" TO GROUP seccional;
GRANT SELECT, INSERT ON "seccion" TO GROUP seccional;
GRANT SELECT, INSERT ON "telefono" TO GROUP seccional;
GRANT SELECT, INSERT ON "tratamiento" TO GROUP seccional;
GRANT SELECT, INSERT ON "uniforme" TO GROUP seccional;
GRANT SELECT, INSERT ON "usuario" TO GROUP seccional;
GRANT SELECT, INSERT ON "usuario_inscribe_estudiante" TO GROUP seccional;
GRANT SELECT, INSERT ON "vacuna" TO GROUP seccional;

-- Sentencia para la creacion del usuario autorizado 
-- (TIENE TODOS LOS PRIVILEGIOS SOBRE LA BDD)
CREATE USER seccional1 WITH PASSWORD 'seccional1' IN GROUP seccional;

-- Permisos al grupo seccional
GRANT ALL ON "areadeaprendizaje" TO GROUP academico;
GRANT ALL ON "areadetransferencia" TO GROUP academico;
GRANT ALL ON "areas_por_lapso" TO GROUP academico;
GRANT ALL ON "beca" TO GROUP academico;
GRANT ALL ON "calificaciones" TO GROUP academico;
GRANT ALL ON "canaima" TO GROUP academico;
GRANT ALL ON "cargo" TO GROUP academico;
GRANT ALL ON "aprobada" TO GROUP academico;
GRANT ALL ON "direccion" TO GROUP academico;
GRANT ALL ON "discapacidad" TO GROUP academico;
GRANT ALL ON "discapacidad_tiene_tratamiento" TO GROUP academico;
GRANT ALL ON "email" TO GROUP academico;
GRANT ALL ON "enfermedad" TO GROUP academico;
GRANT ALL ON "enfermedad_tiene_tratamiento" TO GROUP academico;
GRANT ALL ON "estado" TO GROUP academico;
GRANT ALL ON "estudiante" TO GROUP academico;
GRANT ALL ON "estudiante_inscribe_matricula" TO GROUP academico;
GRANT ALL ON "estudiante_padece_salud" TO GROUP academico;
GRANT ALL ON "estudiante_realiza_evaluaciones" TO GROUP academico;
GRANT ALL ON "estudiante_solicita_notas" TO GROUP academico;
GRANT ALL ON "estudiante_utiliza_uniforme" TO GROUP academico;
GRANT ALL ON "evaluaciones" TO GROUP academico;
GRANT ALL ON "evaluaciones_por_area" TO GROUP academico;
GRANT ALL ON "extraacademica" TO GROUP academico;
GRANT ALL ON "grado" TO GROUP academico;
GRANT ALL ON "inasistencia" TO GROUP academico;
GRANT ALL ON "incapacidad" TO GROUP academico;
GRANT ALL ON "incapacidad_tiene_tratamiento" TO GROUP academico;
GRANT ALL ON "instituciondeprocedencia" TO GROUP academico;
GRANT ALL ON "lapso" TO GROUP academico;
GRANT ALL ON "matricula" TO GROUP academico;
GRANT ALL ON "matricula_establece_evaluaciones" TO GROUP academico;
GRANT ALL ON "municipio" TO GROUP academico;
GRANT ALL ON "notas_por_periodo" TO GROUP academico;
GRANT ALL ON "notascertificadas" TO GROUP academico;
GRANT ALL ON "pais" TO GROUP academico;
GRANT ALL ON "periodoescolar" TO GROUP academico;
GRANT ALL ON "persona" TO GROUP academico;
GRANT ALL ON "profesion_u_oficio" TO GROUP academico;
GRANT ALL ON "profesor" TO GROUP academico;
GRANT ALL ON "representante" TO GROUP academico;
GRANT ALL ON "representante_representa_estudiante" TO GROUP academico;
GRANT ALL ON "reprobada" TO GROUP academico;
GRANT ALL ON "salud" TO GROUP academico;
GRANT ALL ON "seccion" TO GROUP academico;
GRANT ALL ON "telefono" TO GROUP academico;
GRANT ALL ON "tratamiento" TO GROUP academico;
GRANT ALL ON "uniforme" TO GROUP academico;
GRANT ALL ON "usuario" TO GROUP academico;
GRANT ALL ON "usuario_inscribe_estudiante" TO GROUP academico;
GRANT ALL ON "vacuna" TO GROUP academico;

-- Sentencia para la creacion del usuario autorizado 
-- (TIENE TODOS LOS PRIVILEGIOS SOBRE LA BDD)
CREATE USER evaluacion1 WITH PASSWORD 'evaluacion1' IN GROUP evaluacion;

-----------------------------------------------------------------------------------------------------
--Funciones de almacenado para el registro de usuario.
/*
	Tablas relacionas: Persona, usuario y cargo.
*/
-- Primer función que valida la cedula de identidad en caso de que se registre un usuario
create or replace function verificar_ci_persona()
returns trigger as $$
	DECLARE
		ci_cod numeric(20);
	begin
		select ci into ci_cod FROM persona WHERE ci = NEW.ci;

		IF ci_cod IS NOT NULL THEN
			RAISE EXCEPTION 'La cedula de identidad %, ya existe por favor intente con otra cedula', NEW.ci;
		ELSE
			RAISE NOTICE 'La fila con la cedula % esta lista para ser registrada', NEW.ci;
		END IF;
		RETURN NEW;
	END
$$ LANGUAGE 'plpgsql';	

CREATE TRIGGER verificar_persona
AFTER INSERT ON persona
for each row
EXECUTE PROCEDURE verificar_ci_persona();


CREATE TRIGGER verificar_cedula_persona_usuario
AFTER INSERT ON persona
for each row
EXECUTE PROCEDURE verificar_ci_persona_usuario();

-- Segunda funcion que validad el nombre de usuario 
create or replace function comprobar_nombre_de_usuario()
	returns trigger as 
	$BODY$
		DECLARE
			cod_nombre_u varchar(20);
		begin
			select nom_u into cod_nombre_u FROM usuario WHERE nombre_u = NEW.nom_u;

			IF cod_nombre_u IS NOT NULL THEN
				RAISE EXCEPTION 'El nombre de usuario %, ya existe por favor intente con otro nombre', NEW.nom_u;
			ELSE
				RAISE NOTICE 'El nombre de usuario % esta listo para ser registrado', NEW.nom_u;
			END IF;
			RETURN NEW;
		END
	$BODY$ 
LANGUAGE 'plpgsql';

CREATE TRIGGER verificar_nombre_de_usuario
AFTER INSERT ON usuario
for each row
EXECUTE PROCEDURE comprobar_nombre_de_usuario();

/*
CREATE OR REPLACE FUNCTION registro_de_usuario_privilegios() 
RETURNS trigger AS
$$
/* 
 *  Función: registro_de_usuario_privilegios
 *  Autor: Elías Estrabao
 *  Fecha creación: 2019-06-04
 *  Versión: 1.0
 *  Parámetros:  sin parámetros
 *  Descripción: Función que cargara los datos del usuario que se registre 
 *  y asignara de acuerdo al tipo de privilegio que tenga el usuario.
 */
 /*
DECLARE
  -- Define la estructura temporal que servirá para realizar las operaciones
  temp_row usuario.registro_de_usuario%rowtype;
  
BEGIN
  
  IF (NEW.privilegio == 'Directivo') THEN

	-- Capturar datos del nuevo usuario creado
	temp_row.nom_u := NEW.nom_u;
	temp_row.clave := NEW.clave;
	temp_row.privilegio := NEW.privilegio;
	temp_row.pregunta_s := NEW.pregunta_s;
	temp_row.respuesta_s := NEW.respuesta_s;
	temp_row.id_pu := NEW.id_pu;
	temp_row.id_cu := NEW.id_cu;
	
	BEGIN
	-- Inserta los valores en la tabla CDC
	INSERT INTO usuario.registro_de_usuario SELECT temp_row.*;
	END;

	-- Devuelve el la estructura grabada NEW
	RETURN NEW;
   	END IF;
   
   	RETURN NULL;
   
END; -- Fin del procedimiento  
$$
LANGUAGE plpgsql; 
*/

-- Tercer función para el registro de persona
CREATE OR REPLACE FUNCTION insertar_persona(ci varchar, pnombre varchar, segnombre varchar, papellido varchar, segapellido varchar, nacionalidad varchar)  
RETURNS void AS   
$BODY$
	BEGIN
		INSERT INTO persona(ci, pnombre, segnombre, papellido, segapellido, nacionalidad)
		VALUES ( ci,pnombre ,segnombre, papellido, segapellido, nacionalidad);
	END
$BODY$ 
LANGUAGE plpgsql;

-- Cuarta función para el registro de cargo
CREATE OR REPLACE FUNCTION insertar_cargo(tipo_cargo varchar)
RETURNS void AS   
$BODY$
	BEGIN
		INSERT INTO cargo(tipo_cargo)
		VALUES (tipo_cargo);
	END
$BODY$ 
LANGUAGE plpgsql;

-- Cuarta función para el registro de usuario
CREATE OR REPLACE FUNCTION insertar_usuario(nom_u varchar, clave varchar, privilegio varchar, pregunta_s varchar, respuesta_s varchar, activo integer, id_pu integer, id_cu integer)
RETURNS void AS   
$BODY$
	BEGIN
		INSERT INTO usuario(nom_u, clave, privilegio, pregunta_s, respuesta_s, activo, id_pu, id_cu)
		VALUES ( nom_u, clave, privilegio, pregunta_s, respuesta_s, activo, id_pu, id_cu);
	END
$BODY$ 
LANGUAGE plpgsql;


-- Quinta funcion para la busqueda de representante y todos sus registros.
CREATE OR REPLACE FUNCTION data_representante(character varying)
RETURNS TABLE (
	ci varchar, pnombre varchar, segnombre varchar, papellido varchar, segapellido varchar, nacionalidad varchar, sexo_p varchar,
	tutor_legal varchar, id_rep integer, id_pr integer, id_dr integer,
	id_dir integer, n_casa varchar, pto_ref varchar, calle varchar, sector varchar, id_md integer,
	id_po integer, posee_po varchar, nom_po varchar, lugar_po varchar, tlf_po varchar,
	id_pais integer, nom_pais varchar,
	id_estado integer, nom_estado varchar, id_ep integer,
	id_muni integer, nombre_muni varchar, id_em integer) AS $$
BEGIN
	FOR ci, pnombre, segnombre, papellido, segapellido, nacionalidad, sexo_p,
	tutor_legal, id_rep, id_pr, id_dr,
	id_dir, n_casa, pto_ref, calle, sector, id_md,
	id_po, posee_po, nom_po, lugar_po, tlf_po,
	id_pais, nom_pais,
	id_estado, nom_estado, id_ep,
	id_muni, nombre_muni, id_em IN 
	SELECT * FROM persona 
	INNER JOIN representante ON persona.id_per = representante.id_rep 
	INNER JOIN direccion ON representante.id_dr = direccion.id_dir 
	INNER JOIN municipio ON direccion.id_md = municipio.id_muni
	INNER JOIN estado ON estado.id_estado = municipio.id_em
	INNER JOIN pais ON pais.id_pais = estado.id_ep
	INNER JOIN profesion_u_oficio ON profesion_u_oficio.id_po = representante.id_pr 
	WHERE ci = ci
	LOOP
	RETURN NEXT;
  END LOOP;
  RETURN;
END;
$$ LANGUAGE plpgsql;--Ultima base de datos LA MÁS ACTUAL sabado 20 de julio.
--Seccion 1 creacion de las tablas de las bases de datos

--Creacion de la tabla persona
create table persona(
	id_per			serial primary key not null,
	ci				varchar(20) not null,
	pnombre			varchar(20) not null,
	segnombre		varchar(20),
	papellido		varchar(20) not null,
	segapellido		varchar(20),
	nacionalidad	char(1) not null,
	sexo_p			char(1) not null
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
	id_pu 		serial,
	foreign key (id_pu) references persona(id_per) on update cascade on delete cascade,
	id_cu 		serial,
	foreign key (id_cu) references cargo (id_cargo) on update cascade on delete cascade
);

--Creacion de la tabla profesor
create table profesor(
	cod_prof 	varchar(20) unique not null,
	tipo_prof 	varchar(20),
	id_prof 	serial,
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
	id_rep 			serial primary key,
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
	nom_pro	    varchar(30),
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
	nacionalidad_e  varchar(20),
	id_be 			serial,
	foreign key (id_be) references beca (id_beca) on update cascade on delete cascade,
	id_ce			serial,
	foreign key (id_ce) references canaima (id_can) on update cascade on delete cascade,
	id_de			serial,
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
-----------------------------------------------------------------------------------------------------
-- Sentencias para creacion de grupos y privilegios de usuarios.
-- Estos grupos tendran acceso a todos los modulos del sistema.
-- Creación del grupo directivo (USUARIO -> DIRECTIVO)
CREATE GROUP directivo;

-- Creación del grupo de autorizados (USUARIOS -> AUTORIZADOS)
CREATE GROUP autorizados;

-- Creación del grupo de seccional (USUARIOS -> SECCIONAL)
CREATE GROUP seccional;

-- Este grupo de usuarios solo tendra acceso a los modulos de:
--- Reporte, Evaluación, Mantenimiento, Acerca de.
CREATE GROUP academico;

-- Permisos al grupo directivo
GRANT ALL ON "aprobada" TO GROUP directivo;
GRANT ALL ON "areadeaprendizaje" TO GROUP directivo;
GRANT ALL ON "areadetransferencia" TO GROUP directivo;
GRANT ALL ON "areas_por_lapso" TO GROUP directivo;
GRANT ALL ON "beca" TO GROUP directivo;
GRANT ALL ON "calificaciones" TO GROUP directivo;
GRANT ALL ON "canaima" TO GROUP directivo;
GRANT ALL ON "cargo" TO GROUP directivo;
GRANT ALL ON "direccion" TO GROUP directivo;
GRANT ALL ON "discapacidad" TO GROUP directivo;
GRANT ALL ON "discapacidad_tiene_tratamiento" TO GROUP directivo;
GRANT ALL ON "email" TO GROUP directivo;
GRANT ALL ON "enfermedad" TO GROUP directivo;
GRANT ALL ON "enfermedad_tiene_tratamiento" TO GROUP directivo;
GRANT ALL ON "estado" TO GROUP directivo;
GRANT ALL ON "estudiante" TO GROUP directivo;
GRANT ALL ON "estudiante_inscribe_matricula" TO GROUP directivo;
GRANT ALL ON "estudiante_padece_salud" TO GROUP directivo;
GRANT ALL ON "estudiante_realiza_evaluaciones" TO GROUP directivo;
GRANT ALL ON "estudiante_solicita_notas" TO GROUP directivo;
GRANT ALL ON "estudiante_utiliza_uniforme" TO GROUP directivo;
GRANT ALL ON "evaluaciones" TO GROUP directivo;
GRANT ALL ON "evaluaciones_por_area" TO GROUP directivo;
GRANT ALL ON "extraacademica" TO GROUP directivo;
GRANT ALL ON "grado" TO GROUP directivo;
GRANT ALL ON "inasistencia" TO GROUP directivo;
GRANT ALL ON "incapacidad" TO GROUP directivo;
GRANT ALL ON "incapacidad_tiene_tratamiento" TO GROUP directivo;
GRANT ALL ON "instituciondeprocedencia" TO GROUP directivo;
GRANT ALL ON "lapso" TO GROUP directivo;
GRANT ALL ON "matricula" TO GROUP directivo;
GRANT ALL ON "matricula_establece_evaluaciones" TO GROUP directivo;
GRANT ALL ON "municipio" TO GROUP directivo;
GRANT ALL ON "notas_por_periodo" TO GROUP directivo;
GRANT ALL ON "notascertificadas" TO GROUP directivo;
GRANT ALL ON "pais" TO GROUP directivo;
GRANT ALL ON "periodoescolar" TO GROUP directivo;
GRANT ALL ON "persona" TO GROUP directivo;
GRANT ALL ON "profesion_u_oficio" TO GROUP directivo;
GRANT ALL ON "profesor" TO GROUP directivo;
GRANT ALL ON "representante" TO GROUP directivo;
GRANT ALL ON "representante_representa_estudiante" TO GROUP directivo;
GRANT ALL ON "reprobada" TO GROUP directivo;
GRANT ALL ON "salud" TO GROUP directivo;
GRANT ALL ON "seccion" TO GROUP directivo;
GRANT ALL ON "telefono" TO GROUP directivo;
GRANT ALL ON "tratamiento" TO GROUP directivo;
GRANT ALL ON "uniforme" TO GROUP directivo;
GRANT ALL ON "usuario" TO GROUP directivo;
GRANT ALL ON "usuario_inscribe_estudiante" TO GROUP directivo;
GRANT ALL ON "vacuna" TO GROUP directivo;

-- Sentencia para la creacion del usuario directivo 
-- (TIENE TODOS LOS PRIVILEGIOS SOBRE LA BDD)
CREATE USER director WITH PASSWORD 'director1' IN GROUP directivo;

-- Permisos al grupo autorizado
GRANT ALL ON "areadeaprendizaje" TO GROUP autorizados;
GRANT ALL ON "areadetransferencia" TO GROUP autorizados;
GRANT ALL ON "areas_por_lapso" TO GROUP autorizados;
GRANT ALL ON "beca" TO GROUP autorizados;
GRANT ALL ON "calificaciones" TO GROUP autorizados;
GRANT ALL ON "canaima" TO GROUP autorizados;
GRANT ALL ON "cargo" TO GROUP autorizados;
GRANT ALL ON "aprobada" TO GROUP autorizados;
GRANT ALL ON "direccion" TO GROUP autorizados;
GRANT ALL ON "discapacidad" TO GROUP autorizados;
GRANT ALL ON "discapacidad_tiene_tratamiento" TO GROUP autorizados;
GRANT ALL ON "email" TO GROUP autorizados;
GRANT ALL ON "enfermedad" TO GROUP autorizados;
GRANT ALL ON "enfermedad_tiene_tratamiento" TO GROUP autorizados;
GRANT ALL ON "estado" TO GROUP autorizados;
GRANT ALL ON "estudiante" TO GROUP autorizados;
GRANT ALL ON "estudiante_inscribe_matricula" TO GROUP autorizados;
GRANT ALL ON "estudiante_padece_salud" TO GROUP autorizados;
GRANT ALL ON "estudiante_realiza_evaluaciones" TO GROUP autorizados;
GRANT ALL ON "estudiante_solicita_notas" TO GROUP autorizados;
GRANT ALL ON "estudiante_utiliza_uniforme" TO GROUP autorizados;
GRANT ALL ON "evaluaciones" TO GROUP autorizados;
GRANT ALL ON "evaluaciones_por_area" TO GROUP autorizados;
GRANT ALL ON "extraacademica" TO GROUP autorizados;
GRANT ALL ON "grado" TO GROUP autorizados;
GRANT ALL ON "inasistencia" TO GROUP autorizados;
GRANT ALL ON "incapacidad" TO GROUP autorizados;
GRANT ALL ON "incapacidad_tiene_tratamiento" TO GROUP autorizados;
GRANT ALL ON "instituciondeprocedencia" TO GROUP autorizados;
GRANT ALL ON "lapso" TO GROUP autorizados;
GRANT ALL ON "matricula" TO GROUP autorizados;
GRANT ALL ON "matricula_establece_evaluaciones" TO GROUP autorizados;
GRANT ALL ON "municipio" TO GROUP autorizados;
GRANT ALL ON "notas_por_periodo" TO GROUP autorizados;
GRANT ALL ON "notascertificadas" TO GROUP autorizados;
GRANT ALL ON "pais" TO GROUP autorizados;
GRANT ALL ON "periodoescolar" TO GROUP autorizados;
GRANT ALL ON "persona" TO GROUP autorizados;
GRANT ALL ON "profesion_u_oficio" TO GROUP autorizados;
GRANT ALL ON "profesor" TO GROUP autorizados;
GRANT ALL ON "representante" TO GROUP autorizados;
GRANT ALL ON "representante_representa_estudiante" TO GROUP autorizados;
GRANT ALL ON "reprobada" TO GROUP autorizados;
GRANT ALL ON "salud" TO GROUP autorizados;
GRANT ALL ON "seccion" TO GROUP autorizados;
GRANT ALL ON "telefono" TO GROUP autorizados;
GRANT ALL ON "tratamiento" TO GROUP autorizados;
GRANT ALL ON "uniforme" TO GROUP autorizados;
GRANT ALL ON "usuario" TO GROUP autorizados;
GRANT ALL ON "usuario_inscribe_estudiante" TO GROUP autorizados;
GRANT ALL ON "vacuna" TO GROUP autorizados;

-- Sentencia para la creacion del usuario autorizado 
-- (TIENE TODOS LOS PRIVILEGIOS SOBRE LA BDD)
CREATE USER autorizado WITH PASSWORD 'autorizado1' IN GROUP autorizados;

-- Permisos al grupo seccional
GRANT SELECT, INSERT ON "areadetransferencia" TO GROUP seccional;
GRANT SELECT, INSERT ON "areadeaprendizaje" TO GROUP seccional;
GRANT SELECT, INSERT ON "areas_por_lapso" TO GROUP seccional;
GRANT SELECT, INSERT ON "beca" TO GROUP seccional;
GRANT SELECT, INSERT ON "calificaciones" TO GROUP seccional;
GRANT SELECT, INSERT ON "canaima" TO GROUP seccional;
GRANT SELECT, INSERT ON "cargo" TO GROUP seccional;
GRANT SELECT, INSERT ON "aprobada" TO GROUP seccional;
GRANT SELECT, INSERT ON "direccion" TO GROUP seccional;
GRANT SELECT, INSERT ON "discapacidad" TO GROUP seccional;
GRANT SELECT, INSERT ON "discapacidad_tiene_tratamiento" TO GROUP seccional;
GRANT SELECT, INSERT ON "email" TO GROUP seccional;
GRANT SELECT, INSERT ON "enfermedad" TO GROUP seccional;
GRANT SELECT, INSERT ON "enfermedad_tiene_tratamiento" TO GROUP seccional;
GRANT SELECT, INSERT ON "estado" TO GROUP seccional;
GRANT SELECT, INSERT ON "estudiante" TO GROUP seccional;
GRANT SELECT, INSERT ON "estudiante_inscribe_matricula" TO GROUP seccional;
GRANT SELECT, INSERT ON "estudiante_padece_salud" TO GROUP seccional;
GRANT SELECT, INSERT ON "estudiante_realiza_evaluaciones" TO GROUP seccional;
GRANT SELECT, INSERT ON "estudiante_solicita_notas" TO GROUP seccional;
GRANT SELECT, INSERT ON "estudiante_utiliza_uniforme" TO GROUP seccional;
GRANT SELECT, INSERT ON "evaluaciones" TO GROUP seccional;
GRANT SELECT, INSERT ON "evaluaciones_por_area" TO GROUP seccional;
GRANT SELECT, INSERT ON "extraacademica" TO GROUP seccional;
GRANT SELECT, INSERT ON "grado" TO GROUP seccional;
GRANT SELECT, INSERT ON "inasistencia" TO GROUP seccional;
GRANT SELECT, INSERT ON "incapacidad" TO GROUP seccional;
GRANT SELECT, INSERT ON "incapacidad_tiene_tratamiento" TO GROUP seccional;
GRANT SELECT, INSERT ON "instituciondeprocedencia" TO GROUP seccional;
GRANT SELECT, INSERT ON "lapso" TO GROUP seccional;
GRANT SELECT, INSERT ON "matricula" TO GROUP seccional;
GRANT SELECT, INSERT ON "matricula_establece_evaluaciones" TO GROUP seccional;
GRANT SELECT, INSERT ON "municipio" TO GROUP seccional;
GRANT SELECT, INSERT ON "notas_por_periodo" TO GROUP seccional;
GRANT SELECT, INSERT ON "notascertificadas" TO GROUP seccional;
GRANT SELECT, INSERT ON "pais" TO GROUP seccional;
GRANT SELECT, INSERT ON "periodoescolar" TO GROUP seccional;
GRANT SELECT, INSERT ON "persona" TO GROUP seccional;
GRANT SELECT, INSERT ON "profesion_u_oficio" TO GROUP seccional;
GRANT SELECT, INSERT ON "profesor" TO GROUP seccional;
GRANT SELECT, INSERT ON "representante" TO GROUP seccional;
GRANT SELECT, INSERT ON "representante_representa_estudiante" TO GROUP seccional;
GRANT SELECT, INSERT ON "reprobada" TO GROUP seccional;
GRANT SELECT, INSERT ON "salud" TO GROUP seccional;
GRANT SELECT, INSERT ON "seccion" TO GROUP seccional;
GRANT SELECT, INSERT ON "telefono" TO GROUP seccional;
GRANT SELECT, INSERT ON "tratamiento" TO GROUP seccional;
GRANT SELECT, INSERT ON "uniforme" TO GROUP seccional;
GRANT SELECT, INSERT ON "usuario" TO GROUP seccional;
GRANT SELECT, INSERT ON "usuario_inscribe_estudiante" TO GROUP seccional;
GRANT SELECT, INSERT ON "vacuna" TO GROUP seccional;

-- Sentencia para la creacion del usuario autorizado 
-- (TIENE TODOS LOS PRIVILEGIOS SOBRE LA BDD)
CREATE USER seccional1 WITH PASSWORD 'seccional1' IN GROUP seccional;

-- Permisos al grupo seccional
GRANT ALL ON "areadeaprendizaje" TO GROUP academico;
GRANT ALL ON "areadetransferencia" TO GROUP academico;
GRANT ALL ON "areas_por_lapso" TO GROUP academico;
GRANT ALL ON "beca" TO GROUP academico;
GRANT ALL ON "calificaciones" TO GROUP academico;
GRANT ALL ON "canaima" TO GROUP academico;
GRANT ALL ON "cargo" TO GROUP academico;
GRANT ALL ON "aprobada" TO GROUP academico;
GRANT ALL ON "direccion" TO GROUP academico;
GRANT ALL ON "discapacidad" TO GROUP academico;
GRANT ALL ON "discapacidad_tiene_tratamiento" TO GROUP academico;
GRANT ALL ON "email" TO GROUP academico;
GRANT ALL ON "enfermedad" TO GROUP academico;
GRANT ALL ON "enfermedad_tiene_tratamiento" TO GROUP academico;
GRANT ALL ON "estado" TO GROUP academico;
GRANT ALL ON "estudiante" TO GROUP academico;
GRANT ALL ON "estudiante_inscribe_matricula" TO GROUP academico;
GRANT ALL ON "estudiante_padece_salud" TO GROUP academico;
GRANT ALL ON "estudiante_realiza_evaluaciones" TO GROUP academico;
GRANT ALL ON "estudiante_solicita_notas" TO GROUP academico;
GRANT ALL ON "estudiante_utiliza_uniforme" TO GROUP academico;
GRANT ALL ON "evaluaciones" TO GROUP academico;
GRANT ALL ON "evaluaciones_por_area" TO GROUP academico;
GRANT ALL ON "extraacademica" TO GROUP academico;
GRANT ALL ON "grado" TO GROUP academico;
GRANT ALL ON "inasistencia" TO GROUP academico;
GRANT ALL ON "incapacidad" TO GROUP academico;
GRANT ALL ON "incapacidad_tiene_tratamiento" TO GROUP academico;
GRANT ALL ON "instituciondeprocedencia" TO GROUP academico;
GRANT ALL ON "lapso" TO GROUP academico;
GRANT ALL ON "matricula" TO GROUP academico;
GRANT ALL ON "matricula_establece_evaluaciones" TO GROUP academico;
GRANT ALL ON "municipio" TO GROUP academico;
GRANT ALL ON "notas_por_periodo" TO GROUP academico;
GRANT ALL ON "notascertificadas" TO GROUP academico;
GRANT ALL ON "pais" TO GROUP academico;
GRANT ALL ON "periodoescolar" TO GROUP academico;
GRANT ALL ON "persona" TO GROUP academico;
GRANT ALL ON "profesion_u_oficio" TO GROUP academico;
GRANT ALL ON "profesor" TO GROUP academico;
GRANT ALL ON "representante" TO GROUP academico;
GRANT ALL ON "representante_representa_estudiante" TO GROUP academico;
GRANT ALL ON "reprobada" TO GROUP academico;
GRANT ALL ON "salud" TO GROUP academico;
GRANT ALL ON "seccion" TO GROUP academico;
GRANT ALL ON "telefono" TO GROUP academico;
GRANT ALL ON "tratamiento" TO GROUP academico;
GRANT ALL ON "uniforme" TO GROUP academico;
GRANT ALL ON "usuario" TO GROUP academico;
GRANT ALL ON "usuario_inscribe_estudiante" TO GROUP academico;
GRANT ALL ON "vacuna" TO GROUP academico;

-- Sentencia para la creacion del usuario autorizado 
-- (TIENE TODOS LOS PRIVILEGIOS SOBRE LA BDD)
CREATE USER evaluacion1 WITH PASSWORD 'evaluacion1' IN GROUP evaluacion;

-----------------------------------------------------------------------------------------------------
--Funciones de almacenado para el registro de usuario.
/*
	Tablas relacionas: Persona, usuario y cargo.
*/
-- Primer función que valida la cedula de identidad en caso de que se registre un usuario
create or replace function verificar_ci_persona()
returns trigger as $$
	DECLARE
		ci_cod numeric(20);
	begin
		select ci into ci_cod FROM persona WHERE ci = NEW.ci;

		IF ci_cod IS NOT NULL THEN
			RAISE EXCEPTION 'La cedula de identidad %, ya existe por favor intente con otra cedula', NEW.ci;
		ELSE
			RAISE NOTICE 'La fila con la cedula % esta lista para ser registrada', NEW.ci;
		END IF;
		RETURN NEW;
	END
$$ LANGUAGE 'plpgsql';	

CREATE TRIGGER verificar_persona
AFTER INSERT ON persona
for each row
EXECUTE PROCEDURE verificar_ci_persona();


CREATE TRIGGER verificar_cedula_persona_usuario
AFTER INSERT ON persona
for each row
EXECUTE PROCEDURE verificar_ci_persona_usuario();

-- Segunda funcion que validad el nombre de usuario 
create or replace function comprobar_nombre_de_usuario()
	returns trigger as 
	$BODY$
		DECLARE
			cod_nombre_u varchar(20);
		begin
			select nom_u into cod_nombre_u FROM usuario WHERE nombre_u = NEW.nom_u;

			IF cod_nombre_u IS NOT NULL THEN
				RAISE EXCEPTION 'El nombre de usuario %, ya existe por favor intente con otro nombre', NEW.nom_u;
			ELSE
				RAISE NOTICE 'El nombre de usuario % esta listo para ser registrado', NEW.nom_u;
			END IF;
			RETURN NEW;
		END
	$BODY$ 
LANGUAGE 'plpgsql';

CREATE TRIGGER verificar_nombre_de_usuario
AFTER INSERT ON usuario
for each row
EXECUTE PROCEDURE comprobar_nombre_de_usuario();

/*
CREATE OR REPLACE FUNCTION registro_de_usuario_privilegios() 
RETURNS trigger AS
$$
/* 
 *  Función: registro_de_usuario_privilegios
 *  Autor: Elías Estrabao
 *  Fecha creación: 2019-06-04
 *  Versión: 1.0
 *  Parámetros:  sin parámetros
 *  Descripción: Función que cargara los datos del usuario que se registre 
 *  y asignara de acuerdo al tipo de privilegio que tenga el usuario.
 */
 /*
DECLARE
  -- Define la estructura temporal que servirá para realizar las operaciones
  temp_row usuario.registro_de_usuario%rowtype;
  
BEGIN
  
  IF (NEW.privilegio == 'Directivo') THEN

	-- Capturar datos del nuevo usuario creado
	temp_row.nom_u := NEW.nom_u;
	temp_row.clave := NEW.clave;
	temp_row.privilegio := NEW.privilegio;
	temp_row.pregunta_s := NEW.pregunta_s;
	temp_row.respuesta_s := NEW.respuesta_s;
	temp_row.id_pu := NEW.id_pu;
	temp_row.id_cu := NEW.id_cu;
	
	BEGIN
	-- Inserta los valores en la tabla CDC
	INSERT INTO usuario.registro_de_usuario SELECT temp_row.*;
	END;

	-- Devuelve el la estructura grabada NEW
	RETURN NEW;
   	END IF;
   
   	RETURN NULL;
   
END; -- Fin del procedimiento  
$$
LANGUAGE plpgsql; 
*/

-- Tercer función para el registro de persona
CREATE OR REPLACE FUNCTION insertar_persona(ci varchar, pnombre varchar, segnombre varchar, papellido varchar, segapellido varchar, nacionalidad varchar)  
RETURNS void AS   
$BODY$
	BEGIN
		INSERT INTO persona(ci, pnombre, segnombre, papellido, segapellido, nacionalidad)
		VALUES ( ci,pnombre ,segnombre, papellido, segapellido, nacionalidad);
	END
$BODY$ 
LANGUAGE plpgsql;

-- Cuarta función para el registro de cargo
CREATE OR REPLACE FUNCTION insertar_cargo(tipo_cargo varchar)
RETURNS void AS   
$BODY$
	BEGIN
		INSERT INTO cargo(tipo_cargo)
		VALUES (tipo_cargo);
	END
$BODY$ 
LANGUAGE plpgsql;

-- Cuarta función para el registro de usuario
CREATE OR REPLACE FUNCTION insertar_usuario(nom_u varchar, clave varchar, privilegio varchar, pregunta_s varchar, respuesta_s varchar, activo integer, id_pu integer, id_cu integer)
RETURNS void AS   
$BODY$
	BEGIN
		INSERT INTO usuario(nom_u, clave, privilegio, pregunta_s, respuesta_s, activo, id_pu, id_cu)
		VALUES ( nom_u, clave, privilegio, pregunta_s, respuesta_s, activo, id_pu, id_cu);
	END
$BODY$ 
LANGUAGE plpgsql;


-- Quinta funcion para la busqueda de representante y todos sus registros.
CREATE OR REPLACE FUNCTION data_representante(character varying)
RETURNS TABLE (
	ci varchar, pnombre varchar, segnombre varchar, papellido varchar, segapellido varchar, nacionalidad varchar, sexo_p varchar,
	tutor_legal varchar, id_rep integer, id_pr integer, id_dr integer,
	id_dir integer, n_casa varchar, pto_ref varchar, calle varchar, sector varchar, id_md integer,
	id_po integer, posee_po varchar, nom_po varchar, lugar_po varchar, tlf_po varchar,
	id_pais integer, nom_pais varchar,
	id_estado integer, nom_estado varchar, id_ep integer,
	id_muni integer, nombre_muni varchar, id_em integer) AS $$
BEGIN
	FOR ci, pnombre, segnombre, papellido, segapellido, nacionalidad, sexo_p,
	tutor_legal, id_rep, id_pr, id_dr,
	id_dir, n_casa, pto_ref, calle, sector, id_md,
	id_po, posee_po, nom_po, lugar_po, tlf_po,
	id_pais, nom_pais,
	id_estado, nom_estado, id_ep,
	id_muni, nombre_muni, id_em IN 
	SELECT * FROM persona 
	INNER JOIN representante ON persona.id_per = representante.id_rep 
	INNER JOIN direccion ON representante.id_dr = direccion.id_dir 
	INNER JOIN municipio ON direccion.id_md = municipio.id_muni
	INNER JOIN estado ON estado.id_estado = municipio.id_em
	INNER JOIN pais ON pais.id_pais = estado.id_ep
	INNER JOIN profesion_u_oficio ON profesion_u_oficio.id_po = representante.id_pr 
	WHERE ci = ci
	LOOP
	RETURN NEXT;
  END LOOP;
  RETURN;
END;
$$ LANGUAGE plpgsql;