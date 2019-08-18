--Seccion 1 creacion de las tablas de las bases de datos

--Creacion de la tabla pais
create table pais(
	id_pais 		serial primary key not null,
	nombre_pais		varchar(20)
);

--Creacion de la tabla estado
create table estado(
	id_estado 		serial primary key not null,
	nombre_estado	varchar(20),
	id_paisE		serial,
	foreign key (id_paisE) references pais(id_pais) on update cascade on delete cascade
);

--Creacion de la tabla
create table municipio(
	id_muni 			serial primary key not null,
	nombre_muni 	varchar(20),
	id_estM 			serial,
	foreign key (id_estM) references estado(id_estado) on update cascade on delete cascade
);

--Creacion de la tabla direccion
create table direccion(
	id_dir 		  serial primary key not null,
	nºCasa 			varchar(20) not null,
	pto_ref 		varchar(255) not null,
	calle 			varchar(50) not null,
	sector			varchar(20) not null,
	id_paisP 		serial,
	foreign key (id_paisP) references pais(id_pais) on update cascade on delete cascade
);

--Creacion de la tabla telefono
create table telefono(
	id_tlf 			serial primary key not null,
	cod_area1 		varchar(5) not null,
	numero1 		varchar(10) not null,
	tipo1 			char(5),
	cod_area2 		varchar(5),
	numero2 		varchar(10) not null,
	tipo2 			char(5)
);

--Creacion de la tabla persona
create table persona(
	ci 				varchar(20) primary key not null,
	pnombre			varchar(20) not null,
	segnombre		varchar(20) not null,
	otrosnombres	varchar(20),
	papellido		varchar(20) not null,
	segapellido		varchar(20),
	otrosapellidos	varchar(20),
	sexo			char(1) not null,
	nacionalidad	char(1) not null,
	id_tlf 			serial,
	foreign key (id_tlf) references telefono(id_tlf) on update cascade on delete cascade,
	id_dirP 		serial,
	foreign key (id_dirP) references direccion(id_dir) on update cascade on delete cascade
);

--Creacion de la tabla email
create table email(
	id_correo 		serial primary key not null,
	correo 			varchar(20),
	tipo_correo		varchar(20)
);

--Creacion de la tabla cargo
create table cargo(
	id_cargo 		serial primary key not null,
	tipo_cargo 		varchar(30) not null
);

--Creacion de la tabla usuario
create table usuario(
	nombre_u 		varchar(20) primary key not null,
	clave 			varchar(255) not null,
	privilegio 		char(20) not null,
	pregunta_S 		varchar(50) not null,
	respuesta_S 	varchar(50) not null,
	activo 			varchar(1) not null,
	ci_usu 			varchar(20),
	foreign key (ci_usu) references persona(ci) on update cascade on delete cascade,
	id_cr 			serial,
	foreign key (id_cr) references cargo (id_cargo) on update cascade on delete cascade,
	ultima_sesion 	date
);

--Creacion de la tabla profesor
create table profesor(
	cod_prof 		varchar(20) unique not null,
	tipo_prof 		varchar(20),
	ci_prof 		varchar(20),
	foreign key (ci_prof) references persona (ci) on update cascade on delete cascade
);

--Creacion de la tabla profesion_u_oficio
create table profesion_u_oficio(
	id_po 			serial primary key not null,
	posee_po 		char(2),
	nombre_po 		varchar(30),
	lugar_po 		varchar(30),
	tlf_po 			varchar(20)
);

--Creacion  de la tabla representante
create table representante(
	tutor_legal 	char(15),
	ci_rep 			varchar(20) primary key,
	foreign key (ci_rep) references persona(ci) on update cascade on delete cascade,
	id_pr 			serial,
	foreign key (id_pr) references profesion_u_oficio (id_po) on update cascade on delete cascade
);

--Creacion de la tabla beca
create table beca(
	id_beca 	serial primary key not null,
	posee_beca 	char(2),
	tipo_beca 	varchar(20),
	descripcion text
);

--Creacion de la tabla canaima
create table canaima(
	id_can 			serial primary key not null,
	posee_can 		char(2),
	modelo_can 		varchar(20),
	codigo_can  	varchar(20),
	serial_can		varchar(20),
	condicion_can	varchar(20)
);

--Creacion de la tala extraAcademica
create table extraAcademica(
	cod_extra 		varchar(20) unique not null,
	presenta_ex		char(2),
	nombre_ex		varchar(30),
	tipo_ex 		varchar(20)
);

--Creacion de la tabla estudiante
create table estudiante(
	ci_escolar		varchar(20) unique,
	pasaporte 		varchar(20) unique,
	ci_diplomatica	varchar(20) unique,
	tipo_est 		varchar(20) not null,
	fecha_n 		date not null,
	lugar_n 		text not null,
	ci_est 			varchar(20) unique,
	foreign key (ci_est) references persona(ci) on update cascade on delete cascade,
	id_bes 			serial,
	foreign key (id_bes) references beca (id_beca) on update cascade on delete cascade,
	id_canE			serial,
	foreign key (id_canE) references canaima (id_can) on update cascade on delete cascade,
	cod_ee 			varchar(20),
	foreign key (cod_ee) references extraAcademica (cod_extra) on update cascade on delete cascade
);

--Creacion de la tabla uniforme
create table uniforme(
	id_uni 		serial primary key not null,
	talla_c 	char(1),
	talla_p 	varchar(3),
	talla_z 	varchar(2)
);

--Creacion de la tabla evaluaciones
create table evaluaciones(
	id_ev		serial primary key not null,
	tipo_ev 	varchar(20)
);

--Creacion de la tabla calificaciones
create table calificaciones(
	id_ca 		serial primary key not null,
	tipo_ca 	char(20),
	c1 			varchar(2),
	c2 			varchar(2),
	c3 			varchar(2),
	cd 			varchar(4)
);

--Creacion de la tabla aprobada
create table aprobada(
	nota_aprob 		varchar(2),
	nota_LAprob		varchar(2),
	id_CAprob		serial,
	foreign key (id_CAprob) references calificaciones (id_ca) on update cascade on delete cascade
);

--Creacion de la tabla inasistencia
create table inasistencia(
	id_ina 			serial primary key not null,
	cantidad_ina	varchar(2)
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

--Creacion de la tabla area de aprendizaje
create table areaDeAprendizaje(
	id_a 		serial primary key not null,
	nom_a 		varchar(20) unique,
	tipo_a 		varchar(20),
	id_caa 		serial,
	foreign key (id_caa) references calificaciones (id_ca) on update cascade on delete cascade
);

--Creacion de la tabla area de transferencia
create table areaDeTransferencia(
	id_at 		serial primary key not null,
	nom_at 		varchar(20),
	id_aat 		serial,
	foreign key (id_aat) references areaDeAprendizaje (id_a) on update cascade on delete cascade
);

--Creacion de la tabla lapsop
create table lapso(
	id_l 		serial primary key not null,
	pril 		varchar(4),
	segl 		varchar(4),
	terl 		varchar(4),
	final		varchar(4)
);

--Creacion de la tabla retiro
create table retiro(
	id_retiro 			serial primary key not null,
	tipo_retiro			varchar(20),
	obervacion_retiro 	text
);

--Creacion de la tabla seccion
create table seccion(
	id_seccion 		serial primary key not null,
	nom_sec 		varchar(20) unique,
	cod_sec 		varchar(20) unique,
	cant_est 		int
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
	n_nc 		int
);

--Creacion de la tabla de institucion de procedencia
create table institucionDeProcedencia(
	id_pro 		serial primary key not null,
	nombre_pro	varchar(30),
	cod_dea 	varchar(20)
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
	id_sv 			serial,
	foreign key (id_sv) references salud(id_s) on update cascade on delete cascade
);

--Creacion de la tabla incapacidad
create table incapacidad(
	nombre_i 		varchar(20),
	tipo_i 			varchar(20),
	id_si 			serial,
	foreign key (id_si) references salud(id_s) on update cascade on delete cascade
);

--Creacion de la tabla discapacidad
create table discapacidad(
	nom_d 		varchar(20),
	tipo_d 			varchar(20),
	id_sd 			serial,
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
	nom_t 		varchar(20),
	tipo_t 			varchar(20)
);

-------------------------------------------- SECCION 2: DEFINICION Y CREACION DE LAS TABLAS MUCHOS A MUCHOS---------------------

--CREACCION TABLA USUARIO_INSCRIBE_EST
CREATE TABLE usuario_inscribe_estudiante(
    nombre_uu   varchar(20) unique,
    ci_estu     varchar(20) unique,
    fecha_ins   date,
    hora_ins    time,

    -- CREACION LLAVES FORANEAS

    -- creacion de la llave fornea de la tabla usuaio
    foreign key(nombre_uu) references usuario (nombre_u) on update cascade on delete cascade,
    -- creacion de la llave fornea de la tabla estudiante
    foreign key(ci_estu) references estudiante (ci_est) on update cascade on delete cascade
);

--CREACION TABLA ESTUDIATE_UTILIZA_UNIFORME
CREATE TABLE estudiante_utiliza_uniforme(
    ci_eeu      varchar(20) unique,
    id_unie     serial unique,

    -- CREACION LLAVES FORANEAs

    -- creacion de la llave fornea de la tabla estudiante
    foreign key(ci_eeu) references estudiante (ci_est) on update cascade on delete cascade,
    -- creacion de la llave fornea de la tabla uniforme
    foreign key(id_unie) references uniforme (id_uni) on update cascade on delete cascade
);

-- CREACION TABLA ESTUDIANE_REALIZAE_EVALUACIONES
CREATE TABLE estudiante_realiza_evaluaciones(
    ci_ee       varchar(20) unique,
    id_eve      serial unique,
    fecha_e     date,

    -- CREACION DE LAS LLAVES FORANEAS

    -- creacion de la llave fornea de la tabla estudiante
    foreign key(ci_ee) references estudiante (ci_est) on update cascade on delete cascade,
    -- creacion de la llave fornea de la tabla evaluacion
    foreign key(id_eve) references evaluaciones (id_ev) on update cascade on delete cascade
);

-- CREACION TABLA EVALUACIONES_OBTIENE_CALIFICACIONES
CREATE TABLE evaluaciones_obtiene_calificaciones(
    id_evc      serial unique,
    id_cae      serial unique,

    -- CREACION LLAVES FORANEAS

    -- creacion de la llave fornea de la tabla evaluacion
    foreign key(id_evc) references evaluaciones (id_ev) on update cascade on delete cascade,
    -- creacion de la llave fornea de la tabla calificaciones
    foreign key(id_cae) references calificaciones (id_ca) on update cascade on delete cascade
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

--CREACION TABLA ESTUDIANTE_GENERA_RETIRO
CREATE TABLE estudiante_genera_retiro(
    ci_eeg      varchar(20),
    id_reg   serial unique,
    fecha_retiro date,

    -- CREACION DE LLAVES FORANEAS

    -- creacion de la llave fornea de la tabla de ESTUDIANTE
    foreign key(ci_eeg) references estudiante (ci_est) on update cascade on delete cascade,
    -- creacion de la llave fornea de la tabla de ESTUDIANTE
    foreign key(id_reg) references retiro (id_retiro) on update cascade on delete cascade
);

-- CREACION TABLA ESTUDIANTE_TIENE_SECCION
CREATE TABLE estudiante_tiene_seccion(
    ci_eet      varchar(20),
    id_set      serial unique,

    -- CRECION DE LLAVES FORANEAS

    -- creacion de la llave fornea de la tabla de ESTUDIANTE
    foreign key(ci_eet) references estudiante (ci_est) on update cascade on delete cascade,
    -- creacion de la llave fornea de la tabla de sección
    foreign key(id_set) references seccion (id_seccion) on update cascade on delete cascade
);

-- CREACION TABLA ESTUDIANTE_MATRICULA_PERIODO
CREATE TABLE estudiante_matricula_periodo(
    ci_eem      varchar(20),
    id_pee      serial unique,
    fecha_insc  date,

    -- CREACION LLAVES FORANEAS

    -- creacion de la llave fornea de la tabla de ESTUDIANTE
    foreign key(ci_eem) references estudiante (ci_est) on update cascade on delete cascade,
    -- creacion de la llave fornea de la tabla de PERIODO
    foreign key(id_pee) references periodoEscolar (id_pe) on update cascade on delete cascade
);

--CREACION TABLA ESTUDIANTE_SOLICITA_NOTAS
CREATE TABLE estudiante_solicita_notas(
    ci_esn      varchar(20),
    id_nce      serial unique,
    fecha_solic date,

    -- CREACION LLAVES FORANEAS

    -- creacion de la llave fornea de la tabla de ESTUDIANTE
    foreign key(ci_esn) references estudiante (ci_est) on update cascade on delete cascade,
    -- creacion de la llave fornea de la tabla de NOTAS_CERTIFICADAS
    foreign key(id_nce) references notasCertificadas (id_nc) on update cascade on delete cascade
);

--CREACION TABLA ESTUDIANTE_PROVIENE_INSTITUCION
CREATE TABLE  estudiante_proviene_institucion(
    ci_epi      varchar(20),
    id_proe     serial unique,

    -- CREACION LLAVES FORANEAS

    -- creacion de la llave fornea de la tabla de ESTUDIANTE
    foreign key(ci_epi) references estudiante (ci_est) on update cascade on delete cascade,
    -- creacion de la llave fornea de la tabla INSTITUCION
    foreign key(id_proe) references institucionDeProcedencia (id_pro) on update cascade on delete cascade
);

--CREACION TABLA REPRESENTANTE_REPRESENTA_ESTUDIANTE
CREATE TABLE representante_representa_estudiante(
    ci_rer      varchar(20),
    ci_err      varchar(20),
    parentesco  varchar(30),

    -- CREACION LLAVES FORANEAS

    -- creacion de la llave fornea de la tabla de REPRESENTANTE
    foreign key(ci_rer) references representante (ci_rep) on update cascade on delete cascade,
    -- creacion de la llave fornea de la tabla de REPRESENTANTE
    foreign key(ci_err) references estudiante (ci_est) on update cascade on delete cascade
);

--CREACION TABLA ESTUDIANTE_PADECE_SALUD
CREATE TABLE estudiante_padece_salud(
    ci_eps      varchar(20),
    id_sep      serial unique,

    -- CREACION DE LLAVE FORANEA

    -- creacion de la llave fornea de la tabla ESTUDIANTE
    foreign key(ci_eps) references estudiante (ci_est) on update cascade on delete cascade,
    -- creacion de la llave fornea de la tabla de SALUD
    foreign key(id_sep) references salud (id_s) on update cascade on delete cascade
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

--CREACION TABLA ESTUDIANTE_CURSA_AREA
CREATE TABLE estudiante_cursa_area(
    ci_eeca     varchar(20),
    id_aeca     serial unique,
    periodo     varchar(20),
    lapso       varchar(20),

     -- CREACION LAVES FORANEAS

    -- creacion de la llave fornea de la tabla de ESTUDIANTE
    foreign key(ci_eeca) references estudiante (ci_est) on update cascade on delete cascade,
    -- creacion de la llave fornea de la tabla de AREA
    foreign key(id_aeca) references areaDeAprendizaje (id_a) on update cascade on delete cascade
);

--CREACION TABLA NOTAS_POR_PERIODO
CREATE TABLE notas_por_periodo(
    id_ncn      serial unique,
    id_pen      serial unique,

    -- CREACION LAVES FORANEAS

    -- creacion de la llave fornea de la tabla de NOTAS
    foreign key(id_ncn) references notasCertificadas (id_nc) on update cascade on delete cascade,
    -- creacion de la llave fornea de la tabla de PERIODO
    foreign key(id_pen) references periodoEscolar (id_pe) on update cascade on delete cascade
);

--CREACION TABLA PERIODO_ACTIVA_SECCION
CREATE TABLE periodo_activa_seccion(
    id_pea      serial unique,
    id_spa      serial unique,

    -- CREACION LAVES FORANEAS

    -- creacion de la llave fornea de la tabla de PERIODO
    foreign key(id_pea) references periodoEscolar (id_pe) on update cascade on delete cascade,
    -- creacion de la llave fornea de la tabla de seccion
    foreign key(id_spa) references seccion (id_seccion) on update cascade on delete cascade
);

------------------------------ SECCION 3 ----------------------------------------------------------
--Disparador 1: verificar la cedula de la persona
create or replace function verificarCiPersona()
returns trigger as
$BODY$
	DECLARE
		ci_cod numeric(20);
			BEGIN
				SELECT ci into ci_cod FROM persona WHERE ci = NEW.ci;

				IF ci_cod IS NOT NULL THEN
					RAISE EXCEPTION 'La cedula de identidad %, ya existe por favor intente con otra cedula', NEW.ci;
				ELSE IF (cast(NEW.ci as numeric) < 0) THEN
					RAISE EXCEPTION	'La cedula % no se puede ingresar porque es negativo', NEW.ci;
				ELSE IF (LENGTH (NEW.ci)<6)THEN
					RAISE EXCEPTION 'La cedula % no es valida porque tiene menos de 6 digitos, por favor ingrese otra cedula valida', NEW.ci;
				ELSE IF (LENGTH (NEW.ci)>8) THEN
					RAISE EXCEPTION 'La cedula % no es valida porque tiene mas de 8 digitos, por favor ingrese otra cedula valida', NEW.ci;
				ELSE
					RAISE NOTICE 'Registro de la persona con la cedula de identidad se realizo con exito';
					END IF;
				END IF;
			END IF;
		END IF;
	RETURN NEW;
	END
$BODY$ LANGUAGE 'plpgsql' VOLATILE;

CREATE TRIGGER verificarCiPersona
BEFORE INSERT ON persona
for each row
EXECUTE PROCEDURE verificarCiPersona();

--Disparador 2: Crear usuario
create or replace function verificarNombreUsuario()
returns trigger as
$BODY$
	DECLARE
		nombre_cod varchar(20);
			BEGIN
				SELECT nombre_u into nombre_cod FROM usuario WHERE nombre_u = NEW.nombre_u;

				IF nombre_cod IS NOT NULL THEN
					RAISE EXCEPTION 'El nombre de usuario %, ya existe por favor intente con otro nombre', NEW.nombre_u;
				ELSE IF (LENGTH (NEW.nombre_u)<2)THEN
					RAISE EXCEPTION 'El nombre de usuario % no es valido porque tiene menos de 3 caracteres, por favor ingrese un nombre valido', NEW.nombre_u;
				ELSE IF (LENGTH (NEW.nombre_u)>11) THEN
					RAISE EXCEPTION 'El nombre de usuario % no es valido porque tiene mas de 10 caracteres, por favor ingrese un nombre valido', NEW.nombre_u;
				ELSE
					RAISE NOTICE 'Registro del usuario se realizo con exito';
					END IF;
				END IF;
			END IF;
		RETURN NEW;
	END
$BODY$ LANGUAGE 'plpgsql' VOLATILE;

CREATE TRIGGER verificarNombreUsuario
BEFORE INSERT ON usuario
for each row
EXECUTE PROCEDURE verificarNombreUsuario();

---------------------------------- FUNCIONES -------------------------------------------------------
--Funcion 1--
CREATE OR REPLACE FUNCTION usuariosTop()
RETURNS SETOF usuario AS
$$
DECLARE
	datos usuario%ROWTYPE;
BEGIN
	FOR datos IN
		SELECT
		nombre_u, clave, privilegio, pregunta_s, respuesta_s, activo
		FROM usuario
		WHERE activo = '1'
	LOOP
		RETURN NEXT datos;
	END LOOP;
	RETURN;
END;
$$
LANGUAGE plpgsql VOLATILE

--Funcion 2
CREATE OR REPLACE FUNCTION obtener_usuario(character varying)
RETURNS SETOF "usuario" as $$
DECLARE
	id_usuario ALIAS for $1;
BEGIN
	RETURN query(SELECT * from "usuario" WHERE nombre_u = nombre_u);
END;
$$
LANGUAGE 'plpgsql' VOLATILE

--Funcion 3
CREATE OR REPLACE FUNCTION estudiante_persona(character varying)
RETURNS TABLE (ci varchar, pnombre varchar, papellido varchar, sexo char, nacionalidad char, tipo_est varchar, estudiante date) AS $$
BEGIN
  FOR ci, pnombre, papellido, sexo, nacionalidad, tipo_est, estudiante IN
	 SELECT persona.ci, persona.pnombre, persona.papellido, persona.sexo, persona.nacionalidad,
		 				estudiante.tipo_est, estudiante.fecha_n
	    FROM persona
	        JOIN estudiante
	        ON persona.ci = estudiante.ci_escolar
	        WHERE ci = ci

  LOOP
    RETURN NEXT;
  END LOOP;
  RETURN;
END;
$$ LANGUAGE plpgsql;

--Funcion 4
CREATE OR REPLACE FUNCTION persona_representante(character varying)
RETURNS TABLE (ci varchar, pnombre varchar, papellido varchar, tutor_legal varchar) AS $$
BEGIN
  FOR ci, pnombre, papellido, tutor_legal IN
     SELECT persona.ci, persona.pnombre, persona.papellido, representante.tutor_legal
        FROM persona
             JOIN representante
             ON persona.ci = representante.ci_rep
  LOOP
    RETURN NEXT;
  END LOOP;
  RETURN;
END;
$$ LANGUAGE plpgsql;

--Funcion 5
CREATE OR REPLACE FUNCTION persona_profesor(character varying)
RETURNS TABLE (ci varchar, pnombre varchar, papellido varchar, tipo_prof varchar, tutor_legal varchar) AS $$
BEGIN
  FOR ci, pnombre, papellido, tutor_legal IN
     SELECT persona.ci, persona.pnombre, persona.papellido, profesor.tipo_prof
        FROM persona
             JOIN profesor
             ON persona.ci = profesor.ci_prof
  LOOP
    RETURN NEXT;
  END LOOP;
  RETURN;
END;
$$ LANGUAGE plpgsql;

--Funcion 6
CREATE OR REPLACE FUNCTION public.buscarporcategoria(IN _categoria_ character varying)
    RETURNS TABLE (isbn character varying, titulo character varying, edicion INT4, paginas INT4, fecha DATE, nombre character varying, apellido character varying, categoria character varying, editorial character varying)
    LANGUAGE 'plpgsql'
    COST 100
    VOLATILE
    ROWS 1000
AS $$

BEGIN
    FOR nombre, apellido, isbn, titulo, edicion, paginas, fecha, categoria, editorial IN
        SELECT
            autores.nombre, autores.apellido,
            libros.isbn, libros.titulo,
            libros.edicion, libros.paginas, libros.fecha_publicacion,
            categorias.categoria,
            editoriales.editorial
            FROM autores
            INNER JOIN libros_por_autor ON autores.id = libros_por_autor.id_autores
            INNER JOIN libros ON libros.id = libros_por_autor.id_libros
            INNER JOIN libros_por_categoria ON libros_por_categoria.id_libros = libros.id
            INNER JOIN categorias ON categorias.id = libros_por_categoria.id_categorias
            INNER JOIN libros_por_editorial ON libros_por_editorial.id_libros = libros.id
            INNER JOIN editoriales ON editoriales.id = libros_por_editorial.id_editoriales
            WHERE categorias.categoria ILIKE '%'||_categoria_||'%'
        LOOP
            RETURN NEXT;
        END LOOP;
    RETURN;
END;
$$;

-- Funcion 7
CREATE OR REPLACE FUNCTION insertar_persona(ci integer, pnombre varchar, segnombre varchar, otrosnombres varchar, papellido varchar, segapellido varchar, otrosapellidos varchar, sexo varchar, nacionalidad varchar)  RETURNS void AS   $$
begin
INSERT INTO persona(ci, pnombre, segnombre, otrosnombres, papellido, segapellido, otrosapellidos, sexo, nacionalidad)
VALUES ( ci,pnombre ,segnombre, otrosnombres, papellido, segapellido, otrosapellidos, sexo, nacionalidad);
end
$$ language plpgsql;

-- Funcion 8
CREATE OR REPLACE FUNCTION insertar_telefono(cod_area1 varchar, numero1 varchar, tipo1 varchar, cod_area2 varchar, numero2 varchar, tipo2 varchar)
RETURNS void AS   $$
begin
INSERT INTO telefono(cod_area1, numero1, tipo1, cod_area2, numero2, tipo2)
VALUES ( cod_area1, numero1, tipo1, cod_area2, numero2, tipo2);
end
$$ language plpgsql;

-- Funcion 9
create or replace function insertar_direccion(nºcasa varchar, pto_ref varchar, calle varchar, sector varchar, id_paisp integer)
returns void as $$
begin
insert into direccion(nºcasa, pto_ref, calle, sector, id_paisp)
values(nºcasa, pto_ref, calle, sector, id_paisp);
end
$$ language plpgsql;
select insertar_direccion('Casa A-1', 'Diagonal al centro cultural español', 'Calle caronoco', 'Sector caronoco', 1);

-- Funcion 10
CREATE OR REPLACE FUNCTION insertar_cargo(tipo_cargo varchar)
RETURNS void AS   $$
begin
INSERT INTO cargo(tipo_cargo)
VALUES (tipo_cargo);
end
$$ language plpgsql;
select insertar_cargo('Director')

-- Funcion 11
CREATE OR REPLACE FUNCTION insertar_usuario(nombre_u varchar, clave varchar, privilegio varchar, pregunta_s varchar, respuesta_s varchar, activo integer, id_cr integer)
RETURNS void AS   $$
begin
INSERT INTO usuario(nombre_u, clave, privilegio, pregunta_s, respuesta_s, activo, id_cr)
VALUES ( nombre_u, clave, privilegio, pregunta_s, respuesta_s, activo, id_cr);
end
$$ language plpgsql;
select insertar_usuario('hanSolo25', 'elias', 'Director', 'elias', 'elias', 1,1)

-- Funcion 12
CREATE OR REPLACE FUNCTION insertar_pais(nombre_pais varchar)
RETURNS void AS   $$
begin
INSERT INTO pais(nombre_pais)
VALUES ( nombre_pais);
end
$$ language plpgsql;

-- Funcion 13
CREATE OR REPLACE FUNCTION insertar_estado(nombre_estado varchar, id_paisE integer)
RETURNS void AS   $$
begin
INSERT INTO estado(nombre_estado, id_paisE)
VALUES ( nombre_estado, id_paisE);
end
$$ language plpgsql;

-- Funcion 14
CREATE OR REPLACE FUNCTION insertar_municipio(nombre_muni varchar, id_estm integer)
RETURNS void AS   $$
begin
INSERT INTO municipio(nombre_muni, id_estm)
VALUES ( nombre_muni, id_estM);
end
$$ language plpgsql;

--Funcion 15
CREATE OR REPLACE FUNCTION insertar_email(correo varchar, tipo_correo varchar)
RETURNS void AS   $$
begin
INSERT INTO email(correo, tipo_correo)
VALUES ( correo, tipo_correo);
end
$$ language plpgsql;

--Funcion 16
CREATE OR REPLACE FUNCTION insertar_persona_estudiante(ci integer, pnombre varchar, segnombre varchar, otrosnombres varchar, papellido varchar, segapellido varchar, otrosapellidos varchar, sexo varchar, nacionalidad varchar, id_tlf integer, id_dirP integer)  RETURNS void AS   $$
begin
INSERT INTO persona(ci, pnombre, segnombre, otrosnombres, papellido, segapellido, otrosapellidos, sexo, nacionalidad, id_tlf, id_dirP)
VALUES ( ci, pnombre ,segnombre, otrosnombres, papellido, segapellido, otrosapellidos, sexo, nacionalidad, id_tlf, id_dirP);
end
$$ language plpgsql;

--Funcion 17
CREATE OR REPLACE FUNCTION insertar_estudiante(ci_escolar varchar, pasaporte varchar, ci_diplomatica varchar, tipo_est varchar, fecha_n date, lugar_n varchar, ci_est varchar, id_bes integer, id_cane integer, cod_ee varchar)  RETURNS void AS   $$
begin
INSERT INTO estudiante(ci_escolar, pasaporte, ci_diplomatica, tipo_est, fecha_n, lugar_n, ci_est, id_bes, id_cane, cod_ee)
VALUES (ci_escolar, pasaporte, ci_diplomatica, tipo_est, fecha_n, lugar_n, ci_est, id_bes, id_cane, cod_ee);
end
$$ language plpgsql;

--Funcion 18
CREATE OR REPLACE FUNCTION insertar_canaima(posee_can varchar, modelo_can varchar, codigo_can varchar, serial_can varchar, condicion_can varchar)
RETURNS void AS   $$
begin
INSERT INTO canaima(posee_can, modelo_can, codigo_can, serial_can, condicion_can)
VALUES (posee_can, modelo_can, codigo_can, serial_can, condicion_can);
end
$$ language plpgsql;

--Funcion 19
CREATE OR REPLACE FUNCTION insertar_beca(posee_beca varchar, tipo_beca varchar, descripcion varchar)
RETURNS void AS   $$
begin
INSERT INTO beca(posee_beca, tipo_beca, descripcion)
VALUES (posee_beca, tipo_beca, descripcion);
end
$$ language plpgsql;

--Funcion 20
CREATE OR REPLACE FUNCTION insertar_uniforme(talla_c varchar, talla_p varchar, talla_z varchar)
RETURNS void AS   $$
begin
INSERT INTO uniforme(talla_c, talla_p, talla_z)
VALUES (talla_c, talla_p, talla_z);
end
$$ language plpgsql;

--Funcion 21
CREATE OR REPLACE FUNCTION insertar_vacuna(descripcion varchar, falta_v char, id_sv integer)
RETURNS void AS   $$
begin
INSERT INTO vacuna(descripcion, falta_v, id_sv)
VALUES (descripcion, falta_v, id_sv);
end
$$ language plpgsql;

--Funcion 22
CREATE OR REPLACE FUNCTION insertar_enfermedad(nom_e varchar, tipo_e char, id_se integer)
RETURNS void AS   $$
begin
INSERT INTO enfermedad(nom_e, tipo_e, id_se)
VALUES (nom_e, tipo_e, id_se);
end
$$ language plpgsql;

--Funcion 23
CREATE OR REPLACE FUNCTION insertar_tratamiento(nom_t varchar, tipo_t varchar)
RETURNS void AS   $$
begin
INSERT INTO tratamiento(nom_t, tipo_t)
VALUES (nom_t, tipo_t);
end
$$ language plpgsql;

--Funcion 24
CREATE OR REPLACE FUNCTION insertar_discapacidad(nom_d varchar, tipo_d varchar, id_sd integer)
RETURNS void AS   $$
begin
INSERT INTO discapacidad(nom_d, tipo_d, id_sd)
VALUES (nom_d, tipo_d, id_sd);
end
$$ language plpgsql;

--Funcion 25
CREATE OR REPLACE FUNCTION insertar_incapacidad(nombre_i varchar, tipo_i varchar, id_si integer)
RETURNS void AS   $$
begin
INSERT INTO incapacidad(nombre_i, tipo_i, id_si)
VALUES (nombre_i, tipo_i, id_si);
end
$$ language plpgsql;

--Funcion 26
CREATE OR REPLACE FUNCTION insertar_salud(condicion_s varchar, observacion_s varchar, peso float, altura float)
RETURNS void AS   $$
begin
INSERT INTO salud(condicion_s, oberservacion_s, peso, altura)
VALUES (condicion_s, oberservacion_s, peso, altura);
end
$$ language plpgsql;

--Funcion 27
CREATE OR REPLACE FUNCTION insertar_procedencia(nombre_pro varchar, cod_dea varchar)
RETURNS void AS   $$
begin
INSERT INTO instituciondeprocedencia(nombre_pro, cod_dea)
VALUES (nombre_pro, cod_dea);
end
$$ language plpgsql;


--Funciones de insercion en las tablas muchos a muchos
--Funcion 28
CREATE OR REPLACE FUNCTION insertar_discapacidad_tiene_tratamiento(id_dd integer, id_td integer)
RETURNS void AS   $$
begin
INSERT INTO discapacidad_tiene_tratamiento(idd, id_td)
VALUES (idd, id_td);
end
$$ language plpgsql;

--Funcion 29
CREATE OR REPLACE FUNCTION insertar_enfermedad_tiene_tratamiento(id_ee integer, id_te integer)
RETURNS void AS   $$
begin
INSERT INTO enfermedad_tiene_tratamiento(id_ee, id_te)
VALUES (id_ee, id_te);
end
$$ language plpgsql;

--Funcion 30
CREATE OR REPLACE FUNCTION insertar_estudiante_padece_salud(ci_eps varchar, id_sep integer)
RETURNS void AS   $$
begin
INSERT INTO estudiante_padece_salud(ci_eps, id_sep)
VALUES (ci_eps, id_sep);
end
$$ language plpgsql;

--Funcion 31
CREATE OR REPLACE FUNCTION insertar_incapacidad_tiene_tratamiento(id_ii integer, id_ti integer)
RETURNS void AS   $$
begin
INSERT INTO incapacidad_tiene_tratamiento(id_ii, id_ti)
VALUES (id_ii, id_ti);
end
$$ language plpgsql;

--Funcion 34
CREATE OR REPLACE FUNCTION insertar_estudiante_proviene_institucion(ci_epi varchar, id_proe integer)
RETURNS void AS   $$
begin
INSERT INTO estudiante_proviene_institucion(ci_epi, id_proe)
VALUES (ci_epi, id_proe);
end
$$ language plpgsql;

--Funcion 35
CREATE OR REPLACE FUNCTION insertar_usuario_inscribe_estudiante(nombre_uu varchar, ci_estu varchar, fecha_ins date, hora_ins varchar)
RETURNS void AS   $$
begin
INSERT INTO usuario_inscribe_estudiante(nombre_uu, ci_estu, fecha_ins, hora_ins)
VALUES (nombr_uu, ci_estu, fecha_ins, hora_ins);
end
$$ language plpgsql;
