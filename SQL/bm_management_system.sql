create database bm_management_system;

------------------------------------------------------ SECCION 1 ------------------------------------------------------
--DDL => Lenguajes de definicion de datos.
--Creacion de las tablas de la base de datos.

--Creacion de la tabla usuario
create table usuario(
	nombre_u		varchar(20) primarY KEY not null,
	clave			varchar(255) not null,
	privilegio 		varchar(50) not null,
	pregunta_S		varchar(50) not null,
	respuesta_S		varchar(15) not null
);

--Creacion de la tabla sesion
create table sesion(
	id_s			serial primary key not null,
	fecha_S			date,
	numero_is		serial
);

--Sentencia create para la tabla telefono, tabla que se involucra en el proceso de inscripcion del estudiante
--Que forma parte de inovacion para este proceso, se relaciona con la tabla estudiante.
create table telefono(
	id_tlf			serial primary key,
	cod_area1		int not null,
	numero1			varchar(15) not null,
	tipo1			char(10) not null,
	cod_area2		int,
	numero2			varchar(15),
	tipo2			char(10)
);

--Sentencia create para la tabla direccion, tabla que se involucra en el proceso de registro del representante
--Que forma parte de inovacion para este proceso, se relaciona con la tabla representante.
create table direccion(
	id_dir		serial primary key,
	n_casa		varchar(20),
	pto_ref		varchar(255),
	calle		varchar(50),
	tipo_v		varchar(50),
	sector		varchar(255)
);

--Crecacion de la tabla persona.
create table persona(
	ci				varchar(20) unique not null,
	pNombre			varchar(20) not null,
	segNombre		varchar(20) not null,
	pApellido		varchar(20) not null,
	segApellido		varchar(20),
	sexo			char(1) not null,
	nacionalidad	char(1) not null,
	nombre_u		varchar(20),
	foreign key (nombre_u) references usuario (nombre_u),
	id_tlf			int,
	foreign key (id_tlf) references telefono (id_tlf),
	id_dir			int,
	foreign key (id_dir) references direccion (id_dir)
);

--Creacion de la tabla email.
create table email(
	id_correo		serial primary key not null,
	correo			varchar(20) unique,
	tipo_correo		char(20)
);

--Creacion de la tabla profesor.
create table profesor(
	cod_prof		varchar(20) unique not null,
	tipo_prof		char(15) not null,
	ci_prof			varchar(20) not null,
	foreign key (ci_prof) references persona(ci),
	id_emailP		int not null,
	foreign key (id_emailP) references email(id_correo)
);

--Sentencia create para la tabla empresa, tabla que se involucra en el proceso de registro del representante
--Que forma parte de inovacion para este proceso, se relaciona con la tabla representante.
create table empresa(
	id_empresa 			serial primary key,
	nombre_trabajo	varchar(100),
	tlf_trabajo		varchar(20)
);

--Sentencia create para la tabla nacimiento, tabla que se relaciona con la tabla estudiante.
create table lugarN(
	id_n 			serial primary key,
	ciudad	 		varchar(20),
	estado 	 		varchar(20),
	municipio 			varchar(20)
);

--Creacion de la tabla estudiante.
create table estudiante(
	ci_escolar		varchar(20) unique not null,
	tipo_est		varchar(30) not null,
	fechaN 			date not null,
	id_na			int,
	foreign key (id_na) references lugarN(id_n),
	ci_est			varchar(20) unique not null,
	foreign key (ci_est) references persona (ci),
	id_correoE		int,
	foreign key (id_correoE) references email(id_correo)
);

--Creacion de la tabla representante
create table representante(
	tutor_legal		char(2) not null,
	parentesco		char(20) not null,
	tipo_r1 		char(20) not null,
	tipo_r2 		char(20) not null,
	ci_re 			varchar(20) not null,
	foreign key (ci_re) references persona(ci),
	ci_estr			varchar(20) not null,
	foreign key (ci_estr) references estudiante(ci_est),
	id_trabajo		int,
	foreign key (id_trabajo) references empresa(id_empresa)
);

--Sentencia create para la tabla beca, tabla que se involucra en el proceso de inscripcion del estudiante
--y que se relaciona con la tabla estudiante.
create table beca(
	id_beca 		serial primary key,
	tipo_beca		varchar(20) default 'No tiene',
	monto			varchar(20),
	perido_p		varchar(15),
	ci_estb		varchar(20) not null,
	foreign key (ci_estb) references estudiante(ci_est),
	fecha_pago	date
);

--Sentencia create para la tabla uniforme, tabla que se involucra en el proceso de inscripcion del estudiante
--Que forma parte de inovacion para este proceso, se relaciona con la tabla estudiante.
create table uniforme(
	id_uni		serial primary key,
	talla_m		float(4),
	talla_z		float(4),
	talla_c		float(4),
	talla_p		float(4)
);

--Sentencia create para la tabla canaima, tabla que se involucra en el proceso de inscripcion del estudiante,
--se relaciona con la tabla estudiante.
create table canaima(
	id_can 			serial primary key,
	posee			char(2) not null,
	codigo			varchar(20) default 'Desconocido',
	condicion		varchar(20) default 'Desconocido',
	modelo			varchar(20) default 'Desconocido',
	ci_estc		varchar(20) not null,
	foreign key (ci_estc) references estudiante(ci_est)
);

--Sentencia create para la tabla salud, tabla que se relaciona con la tabla salud.
create table salud(
	id_s 			serial primary key,
	condicion_s		varchar(255),
	observacion		varchar(255)
);

--Sentencia create para la tabla discapacidad, tabla que se relaciona con la tabla salud.
create table discapacidad(
	id_d 		serial primary key,
	nombre_d 	varchar(255),
	tipo_d 		varchar(255),
	id_sd		int,
	foreign key (id_sd) references salud(id_s)
);

--Sentencia create para la tabla enfermedad, tabla que se relaciona con la tabla salud.
create table enfermedad(
	id_e 		serial primary key,
	nombre_e 	varchar(255),
	tipo_e 		varchar(255),
	id_se		int,
	foreign key (id_se) references salud(id_s)
);

--Sentencia create para la tabla incapacidad, tabla que se relaciona con la tabla salud.
create table incapacidad(
	id_i 			serial primary key,
	nombre_i 		varchar(255),
	tipo_i 			varchar(255),
	id_si		int,
	foreign key (id_si) references salud(id_s)
);

--Sentencia create para la tabla vacuna, tabla que se relaciona con la tabla salud.
create table vacuna(
	id_v 		serial primary key,
	nombre_v 	varchar(255),
	fecha 		date,
	id_sv		int,
	foreign key (id_sv) references salud(id_s)
);

--Sentencia create para la tabla tratamiento, tabla que se relaciona con la tabla salud.
create table tratamiento(
	id_t 			serial primary key,
	nombre_t 		varchar(255),
	tipo_t 			varchar(255)
);

--Sentencia create para la tabla peridoEscolar
create table periodoEscolar(
	id_pe 		serial primary key not null,
	fecha_i 	date,
	fecha_e 	date,
	nombre_pe 	varchar(20)
);

--Sentencia create para la tabla rasgosFisicos, tabla que se involucra en el proceso de inscripcion del estudiante
--Que forma parte de inovacion para este proceso, se relaciona con la tabla estudiante.
create table rasgosFisicos(
	id_rf		serial primary key,
	color_o		char(10) not null,
	color_p		char(10) not null,
	altura		float(4),
	peso 		float(4),
	ci_estr		varchar(20) not null,
	foreign key (ci_estr) references estudiante(ci_est)
);

--TABLAS PARA EL PROCESO DE CONTROL DE NOTAS DEL ESTUDIANTE--

--Sentencia create para la tabla evaluacion.
create table evaluaciones(
	id_ev 		serial primary key,
	tipo_ev 	varchar(20) not null
);

--Sentencia create para la tabla aprobada, tabla que se relaciona con la tabla calificaciones.
create table aprobada(
	id_aprob 	serial primary key,
	nota_aprob	int not null,
	nota_Laprob	int
);

--Sentencia create para la tabla inasistencia.
create table inasistencia(
	id_ina 			serial primary key,
	cantidad_ina	int
);

--Sentencia create para la tabla reprobada, tabla que se relaciona con la tabla calificaciones.
create table reprobada(
	id_repro	serial primary key,
	nota_Lrepro int,
	nota_repro 	int,
	id_ir		int not null,
	foreign key (id_ir) references inasistencia(id_ina)
);

--Sentencia create para la tabla areaDeTransferencia
create table areaDeTransferencia(
	id_at 		serial primary key not null,
	nombre_at 	varchar(50)
);

--Sentencia create para la tabla area de formacion, que se relaciona con la tabla notas certificadas.
create table areaDeSaber(
	id_a 		serial primary key not null,
	nombre_a 	varchar(50),
	tipo_a 		varchar(20),
	id_ata 	 	int,
	foreign key (id_ata) references areaDeTransferencia(id_at)
);

--Sentencia create para la tabla calificaciones, tabla que se relaciona con la tabla area de saberes.
create table calificaciones(
	id_ca 		serial primary key,
	tipo_ca 	varchar(5) not null,
	c1 			int,
	c2 			int,
	c3 			int,
	cd 			int,
	id_ap 	 	int,
	foreign key (id_ap) references aprobada(id_aprob),
	id_rep 	 	int,
	foreign key (id_rep) references reprobada(id_repro),
	id_atc 	 	int,
	foreign key (id_atc) references areaDeTransferencia(id_at),
	id_ac 	 	int,
	foreign key (id_ac) references areaDeSaber(id_a)
);

--Sentencia create para la tabla extra academica.
create table extraAcademica(
	cod_extra		varchar(20) unique not null,
	presenta_ex 	char(2),
	nombre_ex 		varchar(20),
	tipo_ex 		varchar(20),
	horas_ex		int,
	ci_esea			varchar(20) not null,
	foreign key (ci_esea) references estudiante(ci_est)
);

--Sentencia create para la tabla lapso.
create table lapso(
	id_l 			serial primary key,
	pri_lapso 		int,
	seg_lapso 		int,
	ter_lapso 		int,
	final 			int
);

--Sentencia create para la tabla seccion.
create table seccion(
	id_seccion 		serial primary key,
	nombre 			varchar(20),
	cod_seccion 	varchar(20)
);

--Sentencia create para la tabla notasCertificadas, se relaciona con la tabla estudiante.
create table notasCertificadas(
	id_nc	serial primary key,
	n_nc	int
);

--Sentencia create para la tabla institucionDeProcedencia, tabla que se involucra en el proceso de inscripcion del estudiante,
--se relaciona con la tabla estudiante.
create table institucionDeProcedencia(
	id_pro		serial primary key,
	nombre_pro	varchar(50) not null,
	cod_dea		varchar(20) not null
);

--Sentencia create para la tabla parroquia, tabla que se involucra en el proceso de registro del representante
--Que forma parte de inovacion para este proceso, se relaciona con la tabla representante.
create table parroquia(
	id_parroquia 		serial primary key,
	nombre_parroquia	varchar(20)
);

--Sentencia create para la tabla ciudad
create table ciudad(
	id_ciudad 		serial primary key,
	nombre_ciudad	varchar(50),
	id_pc			int,
	foreign key (id_pc) references parroquia(id_parroquia)
);

--Sentencia create para la tabla municipio, tabla que se involucra en el proceso de registro del representante
--Que forma parte de inovacion para este proceso, se relaciona con la tabla representante.
create table municipio(
	id_muni			serial primary key,
	nombre_muni		varchar(20),
	id_cm			int,
	foreign key (id_cm) references ciudad(id_ciudad)
);

--Sentencia create para la tabla estado, tabla que se involucra en el proceso de registro del representante
--Que forma parte de inovacion para este proceso, se relaciona con la tabla representante.
create table estado(
	id_estado		serial primary key,
	nombre_estado	varchar(20),
	id_muE			int,
	foreign key (id_muE) references municipio(id_muni)
);

--Sentencia create para la tabla pais, tabla que se involucra en el proceso de registro del representante
--Que forma parte de inovacion para este proceso, se relaciona con la tabla representante.
create table pais(
	id_pais			serial primary key,
	nombre_pais 	varchar(20),
	id_dirP			int,
	foreign key (id_dirP) references direccion (id_dir),
	id_estP			int,
	foreign key (id_estP) references estado (id_estado)
);

--TABLAS DE RELACIONES MUCHOS A MUCHOS--

--Sentencia create para la tabla usuario incia sesion
create table usuario_inicia_sesion(
	nombre_uu		varchar(20),
	foreign key (nombre_uu) references usuario(nombre_u),
	id_sesion 	 	int,
	foreign key (id_sesion) references sesion(id_s),
	hora_inicio		date
);

--Sentencia create para la tabla usuario inscribe estudiante, se relaciona con las tablas usuario y estudiante.
create table usuario_inscribe_estudiante(
	nombre_us 		varchar(20),
	foreign key (nombre_us) references usuario(nombre_u),
	ci_estu			varchar(30),
	foreign key (ci_estu) references estudiante (ci_est)
);

--Sentencia create para la tabla profesor dicta area de saber, se relaciona con las tablas usuario y estudiante.
create table profesor_dicta_area_de_saber(
	ci_ppd 		varchar(20),
	foreign key (ci_ppd) references profesor(cod_prof),
	id_app		int,
	foreign key (id_app) references areaDeSaber (id_a),
	lapso 		varchar(20),
	fecha 		date
);

--Sentencia create para la tabla estudiante adquiere uniforme, se relaciona con las tablas uniforme y estudiante.
create table estudiante_adquiere_uniforme(
	ci_eeu 		varchar(20),
	foreign key (ci_eeu) references estudiante(ci_est),
	id_uniE		int,
	foreign key (id_uniE) references uniforme(id_uni)
);

--Sentencia create para la tabla enfermedad tiene tratamiento, se relaciona con las tablas enfermedad y tratamiento.
create table enfermedad_tiene_tratamiento(
	id_ee		int,
	foreign key (id_ee) references enfermedad (id_e),
	id_te 		int,
	foreign key (id_te) references tratamiento(id_t)
);

--Sentencia create para la tabla discapacidad tiene tratamiento, se relaciona con las tablas discapacidad y tratamiento.
create table discapacidad_tiene_tratamiento(
	id_dd 		int,
	foreign key (id_dd) references discapacidad(id_d),
	id_td 		int,
	foreign key (id_td) references tratamiento(id_t)
);

--Sentencia create para la tabla incapacidad tiene tratamiento, se relaciona con las tablas incapacidad y tratamiento.
create table incapacidad_tiene_tratamiento(
	id_ii 		int,
	foreign key (id_ii) references incapacidad(id_i),
	id_ti 		serial,
	foreign key (id_ti) references tratamiento(id_t)
);

--Sentencia create para la tabla estudiante tiene salud, se realaciona con las tablas estudinate y salud.
create table estudiante_tiene_salud(
	ci_es		varchar(20),
	foreign key (ci_es) references estudiante(ci_est),
	id_se		int,
	foreign key (id_se) references salud (id_s)
);

--Sentencia create para la tabla estudiante realiza evaluaciones, se realaciona con las tablas estudiante y evaluaciones.
create table estudiante_realiza_evaluaciones(
	ci_ee		varchar(20),
	foreign key (ci_ee) references estudiante(ci_est),
	id_eev 		int,
	foreign key (id_eev) references evaluaciones (id_ev),
	fecha_e 	date
);

--Sentencia create para la tabla estudiante matricula periodo, se relacionan con las tablas evaluaciones y calificaciones.
create table estudiante_matricula_periodo(
	ci_esp 		varchar(20),
	foreign key (ci_esp) references estudiante (ci_est),
	id_pes 		int,
	foreign key (id_pes) references periodoEscolar (id_pe),
	fecha_ins 	date
);

--Sentencia create para la tabla evaluaciones por calificaciones, se relacionan con las tablas evaluaciones y calificaciones.
create table evaluaciones_por_calificaciones(
	id_eoc 		int,
	foreign key (id_eoc) references evaluaciones (id_ev),
	id_cae 		int,
	foreign key (id_cae) references calificaciones (id_ca),
	fecha_pre 	date
);

--Sentencia create para la tabla estudiante cursa materia, se relacionan con las tablas estudiante y area de formacion.
create table estudiante_cursa_areaDeSaber(
	ci_eeca		varchar(20),
	foreign key (ci_eeca) references estudiante(ci_est),
	id_aeca		int,
	foreign key (id_aeca) references areaDeSaber (id_a),
	periodo 	varchar(10),
	lapso		varchar(10)
);

--Sentencia create para la tabla evaluaciones por materias, se relacionan con las tablas evaluaciones y area de formacion.
create table evaluaciones_por_area_de_saber(
	id_epa 		int,
	foreign key (id_epa) references evaluaciones (id_ev),
	id_aep		int,
	foreign key (id_aep) references areaDeSaber (id_a)
);

--Sentencia create para la tabla materias por lapso, se relacionan con las tablas area de formacion y lapso.
create table area_de_saber_por_lapso(
	id_apl		int,
	foreign key (id_apl) references areaDeSaber (id_a),
	id_lap		int,
	foreign key (id_lap) references lapso (id_l)
);

--Sentencia create para la tabla estudiante tiene seccion, se relacionan con las tablas estudiante y seccion.
create table estudiante_tiene_seccion(
	ci_ets		varchar(20),
	foreign key (ci_ets) references estudiante(ci_est),
	id_set		int,
	foreign key (id_set) references seccion (id_seccion)
);

--Sentencia create para la tabla usuario asigna seccion, se relacionan con las tablas usuario y seccion.
create table usuario_asigna_seccion(
	nombre_ua	varchar(20),
	foreign key (nombre_ua) references usuario(nombre_u),
	id_seccion	int,
	foreign key (id_seccion) references seccion (id_seccion)
);

--Sentencia create para la tabla estudiante solicita notas, se relacionan con las tablas estudiante y notas certificadas.
create table estudiante_solicita_notas(
	ci_esn			varchar(20),
	foreign key (ci_esn) references estudiante(ci_escolar),
	id_nce			int,
	foreign key (id_nce) references notasCertificadas (id_nc),
	fecha_solici	date
);

--Sentencia create para la tabla estudiante proviene institucion, se relacionan con las tablas estudiante e institucion de procedencia.
create table estudiante_proviene_institucion(
	ci_evi		varchar(20),
	foreign key (ci_evi) references estudiante(ci_escolar),
	id_pev		int,
	foreign key (id_pev) references institucionDeProcedencia (id_pro)
);



-------------------------------------------------------- FIN ----------------------------------------------------------



------------------------------------------------------ SECCION 2 ------------------------------------------------------
--Creacion de procedimientos de almacenados o funciones en POSTGRESQL.
--Divididos en secciones de acuerdo a las tablas que se relacionan de un proceso dentro del sistema

--Tablas relacionadas: Persona, cargo, usuario y sesion.

--Funcion 1 verificar la llave primaria no este repetida
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

--Funcion 2 verificar que la cedula de indetidad de la persona no esten ingresados valores negativos.
create or replace function verificarValoresCi()
	returns trigger as $$
		begin
			--Valor negativo
			IF (cast(NEW.ci as numeric) < 0) THEN
				RAISE EXCEPTION	'La cedula % no se puede ingresar porque es negativo', NEW.ci;
			--Validar longitud de la cedula
			ELSE IF (LENGTH (NEW.ci)<8)THEN
				RAISE EXCEPTION 'La cedula % no es valida porque tiene menos de 8 digitos, porfavor ingrese otra cedula valida', NEW.ci;
			ELSE
				RAISE NOTICE 'Registro de la persona con la cedula de indetidad se realizo con exito';
			END IF;
			RETURN NEW;
		END
	$$ LANGUAGE 'plpgsql';

--Funcion 3 verificar la llave primaria no este repetida nombre de usuario
create or replace function verificarNombreUsuario()
	returns trigger as $$
		DECLARE
			cod_nombre_u varchar(20);
		begin
			select nombre_u into cod_nombre_u FROM usuario WHERE nombre_u = NEW.nombre_u;

			IF cod_nombre_u IS NOT NULL THEN
				RAISE EXCEPTION 'El nombre de usuario %, ya existe por favor intente con otro nombre', NEW.nombre_u;
			ELSE
				RAISE NOTICE 'El nombre de usuario % esta listo para ser registrado', NEW.nombre_u;
			END IF;
			RETURN NEW;
		END
	$$ LANGUAGE 'plpgsql';

--Funcion 4 verificar que la cedula de indetidad de la persona no esten ingresados valores negativos.
create or replace function verificarValoresNombreUsuario()
	returns trigger as $$
		begin
			--Validar longitud del nombre de usuario
			IF (LENGTH (NEW.nombre_u)>19) THEN
				RAISE EXCEPTION	'El nombre % no puede ser mayor a 20 caracteres, intente otro nombre de usuario', NEW.nombre_u;
			--Validar longitud del nombre de usuario
			ELSE IF (LENGTH (NEW.nombre_u)<3) THEN
				RAISE EXCEPTION 'El nombre % no puede ser menor a 3 caracteres, ingrese un nombre de usuario mas largo', NEW.nombre_u;
			ELSE
				RAISE NOTICE 'Registro del usuario se realizo con exito';
			END IF;
			RETURN NEW;
		END
	$$ LANGUAGE 'plpgsql';

--Funcion 4 verificar la llave primaria no este repetida la cedula escolar del estudiante
create or replace function verificarCiEstudiante()
	returns trigger as $$
		DECLARE
			ci_cod_estudiante numeric(20);
		begin
			select ci_escolar into ci_cod_estudiante FROM estudiante WHERE ci_escolar = NEW.ci_escolar;

			IF ci_cod_estudiante IS NOT NULL THEN
				RAISE EXCEPTION 'La cedula de identidad %, ya existe por favor intente con otra cedula', NEW.ci_escolar;
			ELSE
				RAISE NOTICE 'La fila con la cedula % esta lista para ser registrada', NEW.ci_escolar;
			END IF;
			RETURN NEW;
		END
	$$ LANGUAGE 'plpgsql';

--Funcion 5 verificar que  no este repetido el email o correo
create or replace function verificarEmail()
	returns trigger as $$
		DECLARE
			cod_correo varchar(20);
		begin
			select correo into cod_correo FROM email WHERE correo = NEW.correo;

			IF cod_correo IS NOT NULL THEN
				RAISE EXCEPTION 'El correo %, ya existe por favor intente con otro correo', NEW.correo;
			ELSE
				RAISE NOTICE 'La fila con el correo % esta lista para ser registrada', NEW.correo;
			END IF;
			RETURN NEW;
		END
	$$ LANGUAGE 'plpgsql';

--Funcion 6 verificar que  no este repetido el codigo de profesor
create or replace function verificarProfesor()
	returns trigger as $$
		DECLARE
			cod_profesor_v varchar(20);
		begin
			select cod_prof into cod_profesor_v FROM profesor WHERE cod_prof = NEW.cod_prof;

			IF cod_profesor_v IS NOT NULL THEN
				RAISE EXCEPTION 'El codigo %, ya existe por favor intente con otro codigo', NEW.cod_prof;
			ELSE
				RAISE NOTICE 'La fila con el codigo % esta lista para ser registrada', NEW.cod_prof;
			END IF;
			RETURN NEW;
		END
	$$ LANGUAGE 'plpgsql';


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

create or replace function ChequeoCiPersona()
	returns trigger as 
	$BODY$
		DECLARE
			ci_cod varchar(20);
				BEGIN 
					SELECT ci into ci_cod FROM persona WHERE ci = NEW.ci;

					IF ci_cod IS NOT NULL THEN 
						RAISE EXCEPTION 'La cedula de identidad %, ya existe por favor intente con otra cedula', NEW.ci;
					IF (cast(NEW.ci as numeric) < 0) THEN
						RAISE EXCEPTION	'La cedula % no es valida porque es negativa', NEW.ci;
					IF (LENGTH (NEW.ci)<6)THEN
						RAISE EXCEPTION 'La cedula % no es valida porque tiene menos de 6 digitos, por favor ingrese otra cedula valida', NEW.ci;						
					IF (LENGTH (NEW.ci)>8) THEN
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
-------------------------------------------------------- FIN ----------------------------------------------------------



------------------------------------------------------ SECCION 3 ------------------------------------------------------
--Disparador 1: verificar la cedula de la persona
CREATE TRIGGER verificarPersona
AFTER INSERT ON persona
for each row
EXECUTE PROCEDURE verificarCiPersona();

--Disparador 2: Comprobar valores de la cedula de indetidad
CREATE TRIGGER comrpobarCedulaDeIdentidadDePersona
BEFORE INSERT ON persona
for each row
EXECUTE PROCEDURE verificarValoresCi();

--Disparador 3: verificar el nombre de usuario
CREATE TRIGGER verificarUsuario
BEFORE INSERT ON usuario
for each row
EXECUTE PROCEDURE verificarNombreUsuario();

--Disparador 4: Comprobar valores del nombre de identidad
CREATE TRIGGER comrpobarNombreDeUsuario
BEFORE INSERT ON usuario
for each row
EXECUTE PROCEDURE verificarValoresNombreUsuario();

--Disparador 5: verificar la cedula escolar del estudiante
CREATE TRIGGER verificarEstudiante
BEFORE INSERT ON estudiante
for each row
EXECUTE PROCEDURE verificarCiEstudiante();

--Disparador 5: verificar el email
CREATE TRIGGER verificarEmail
BEFORE INSERT ON email
for each row
EXECUTE PROCEDURE verificarEmail();

--Disparador 6: verificar el codigo del profesor
CREATE TRIGGER verificarProfesor
BEFORE INSERT ON profesor
for each row
EXECUTE PROCEDURE verificarProfesor();
--Disparador 7: verificar la cedula de la persona
CREATE TRIGGER verificarCiPersona
AFTER INSERT ON persona
for each row
EXECUTE PROCEDURE verificarCiPersona();
--Disparador 8: Chequear la cedula de la persona
CREATE TRIGGER ChequearCiPersona
AFTER INSERT ON persona
for each row
EXECUTE PROCEDURE ChequeoCiPersona();

-------------------------------------------------------- FIN ----------------------------------------------------------



------------------------------------------------------ SECCION 4 ------------------------------------------------------

select * from persona;

insert into persona(ci,pnombre,segnombre,papellido,segapellido,otrosnombres,otrosapellidos,sexo,nacionalidad)
		values('26896160','elias','ramon','estrabao','quijada','','','M','V'),
			  ('54670619','inirida','josefina','quijada','serrano','','','F','V');

select * from usuario

insert into usuario (nombre_u, clave, pregunta_s, respuesta_s)
			values('hanSolo25','12345', 'quien soy', 'soy yo');

select * from usuario

insert into usuario (nombre_u, clave, pregunta_s, respuesta_s)
			values('hahhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh','12345', 'quien soy', 'soy yo');
	
