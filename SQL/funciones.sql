--Funciones para el registro de estudiante
--Funcion 1
CREATE OR REPLACE FUNCTION insertar_telefono(cod_area1 varchar, numero1 varchar, tipo1 varchar, cod_area2 varchar, numero2 varchar, tipo2 varchar)
RETURNS void AS   $$
begin
INSERT INTO telefono(cod_area1, numero1, tipo1, cod_area2, numero2, tipo2)
VALUES ( cod_area1, numero1, tipo1, cod_area2, numero2, tipo2);
end
$$ language plpgsql;
 
select * from telefono
select insertar_telefono('0424', '8850265', 'Movil','','','')

--Funcion 2
CREATE OR REPLACE FUNCTION insertar_pais(nombre_pais varchar)
RETURNS void AS   $$
begin
INSERT INTO pais(nombre_pais)
VALUES ( nombre_pais);
end
$$ language plpgsql;

select * from pais
select insertar_pais('Venezuela')

-- Funcion 3
CREATE OR REPLACE FUNCTION insertar_estado(nombre_estado varchar, id_paisE integer)
RETURNS void AS   $$
begin
INSERT INTO estado(nombre_estado, id_paisE)
VALUES ( nombre_estado, id_paisE);
end
$$ language plpgsql;

select * from estado
select insertar_estado('Anzoategui',1)

-- Funcion 4
CREATE OR REPLACE FUNCTION insertar_municipio(nombre_muni varchar, id_estm integer)
RETURNS void AS   $$
begin
INSERT INTO municipio(nombre_muni, id_estm)
VALUES ( nombre_muni, id_estM);
end
$$ language plpgsql;

select * from municipio
select insertar_municipio('Simon Rodriguez',1)

--Funcion 5
create or replace function insertar_direccion(nºcasa varchar, pto_ref varchar, calle varchar, sector varchar, id_paisp integer)
returns void as $$
begin
insert into direccion(nºcasa, pto_ref, calle, sector, id_paisp)
values(nºcasa, pto_ref, calle, sector, id_paisp);
end
$$ language plpgsql;

select * from direccion;
select insertar_direccion('Casa A-1', 'Diagonal al centro cultural español', 'Calle caronoco', 'Sector caronoco', 1);

--Funcion 6 insertar telefono
CREATE OR REPLACE FUNCTION insertar_persona_estudiante(ci varchar, pnombre varchar, segnombre varchar, otrosnombres varchar, papellido varchar, segapellido varchar, otrosapellidos varchar, sexo varchar, nacionalidad varchar, id_tlf integer, id_dirP integer)
RETURNS void AS   $$
begin
INSERT INTO persona(ci, pnombre, segnombre, otrosnombres, papellido, segapellido, otrosapellidos, sexo, nacionalidad, id_tlf, id_dirP)
VALUES ( ci, pnombre ,segnombre, otrosnombres, papellido, segapellido, otrosapellidos, sexo, nacionalidad, id_tlf, id_dirP);
end
$$ language plpgsql;

select * from persona;
select insertar_persona_estudiante('26896162','Elias','Ramon','','Estrabao','Quijada','','M','V',1,1);

--Funciones para el registro en caida de los datos del estudiante
--Funcion 7 insertar uniforme
CREATE OR REPLACE FUNCTION insertar_uniforme(talla_c varchar, talla_p varchar, talla_z varchar)
RETURNS void AS   $$
begin
INSERT INTO uniforme(talla_c, talla_p, talla_z)
VALUES (talla_c, talla_p, talla_z);
end
$$ language plpgsql;

select * from uniforme
select insertar_uniforme('S','32','42');

--Funcion 8 insertar beca
CREATE OR REPLACE FUNCTION insertar_beca(posee_beca varchar, tipo_beca varchar, descripcion varchar)
RETURNS void AS   $$
begin
INSERT INTO beca(posee_beca, tipo_beca, descripcion)
VALUES (posee_beca, tipo_beca, descripcion);
end
$$ language plpgsql;

select * from beca
select insertar_beca('No','','');

--Funcion 9 insertar canaima
CREATE OR REPLACE FUNCTION insertar_canaima(posee_can varchar, modelo_can varchar, codigo_can varchar, serial_can varchar, condicion_can varchar)
RETURNS void AS   $$
begin
INSERT INTO canaima(posee_can, modelo_can, codigo_can, serial_can, condicion_can)
VALUES (posee_can, modelo_can, codigo_can, serial_can, condicion_can);
end
$$ language plpgsql;

select * from canaima
select insertar_canaima('No','','','','');

--Funcion 10
CREATE OR REPLACE FUNCTION insertar_estudiante(ci_escolar varchar, pasaporte varchar, ci_diplomatica varchar, tipo_est varchar, fecha_n date, lugar_n varchar, ci_est varchar, id_bes integer, id_cane integer, cod_ee varchar)  RETURNS void AS   $$
begin
INSERT INTO estudiante(ci_escolar, pasaporte, ci_diplomatica, tipo_est, fecha_n, lugar_n, ci_est, id_bes, id_cane, cod_ee)
VALUES (ci_escolar, pasaporte, ci_diplomatica, tipo_est, fecha_n, lugar_n, ci_est, id_bes, id_cane, cod_ee);
end
$$ language plpgsql;

select * from estudiante
select insertar_estudiante('26896160','','','Regular','1998/02/06','El tigre','26896160',1,1);

--Funciones para el registro de datos medeicos del estudiante
--Funcion 11
CREATE OR REPLACE FUNCTION insertar_salud(condicion_s varchar, obervacion_s varchar, peso float, altura float)
RETURNS void AS   $$
begin
INSERT INTO salud(condicion_s, obervacion_s, peso, altura)
VALUES (condicion_s, obervacion_s, peso, altura);
end
$$ language plpgsql;

select * from salud
select insertar_salud('Buena','Ninguna',65.5,1.80);

--Funcion 12
CREATE OR REPLACE FUNCTION insertar_incapacidad(nombre_i varchar, tipo_i varchar, id_si integer)
RETURNS void AS   $$
begin
INSERT INTO incapacidad(nombre_i, tipo_i, id_si)
VALUES (nombre_i, tipo_i, id_si);
end
$$ language plpgsql;

select * from incapacidad
select insertar_incapacidad('Ninguna','Ninguna',2);

--Funcion 13
CREATE OR REPLACE FUNCTION insertar_discapacidad(nom_d varchar, tipo_d varchar, id_sd integer)
RETURNS void AS   $$
begin
INSERT INTO discapacidad(nom_d, tipo_d, id_sd)
VALUES (nom_d, tipo_d, id_sd);
end
$$ language plpgsql;

select * from discapacidad
select insertar_discapacidad('Ninguna','Ninguna',1);

--Funcion 14
CREATE OR REPLACE FUNCTION insertar_vacuna(descripcion_v varchar, falta_v char, id_sv integer)
RETURNS void AS   $$
begin
INSERT INTO vacuna(descripcion_v, falta_v, id_sv)
VALUES (descripcion_v, falta_v, id_sv);
end
$$ language plpgsql;

drop function insertar_vacuna
select * from vacuna
select insertar_vacuna('Ninguna','No',2);

--Funcion 15
CREATE OR REPLACE FUNCTION insertar_enfermedad(nom_e varchar, tipo_e char, id_se integer)
RETURNS void AS   $$
begin
INSERT INTO enfermedad(nom_e, tipo_e, id_se)
VALUES (nom_e, tipo_e, id_se);
end
$$ language plpgsql;

drop function insertar_enfermedad
select * from enfermedad
select insertar_enfermedad('','',3);

--Funcion 16
CREATE OR REPLACE FUNCTION insertar_tratamiento(nom_t varchar, tipo_t varchar)
RETURNS void AS   $$
begin
INSERT INTO tratamiento(nom_t, tipo_t)
VALUES (nom_t, tipo_t);
end
$$ language plpgsql;

drop function insertar_tratamiento
select * from tratamiento
select insertar_tratamiento('','');

--Funcion 17
CREATE OR REPLACE FUNCTION insertar_procedencia(nombre_pro varchar, cod_dea varchar)
RETURNS void AS   $$
begin
INSERT INTO instituciondeprocedencia(nombre_pro, cod_dea)
VALUES (nombre_pro, cod_dea);
end
$$ language plpgsql;


--Funcion para insertar email para el registro del estudiante
CREATE OR REPLACE FUNCTION insertar_email(correo varchar, tipo_correo varchar)
RETURNS void AS   $$
begin
INSERT INTO email(correo, tipo_correo)
VALUES ( correo, tipo_correo);
end
$$ language plpgsql;


--Funcion para obetener a los estudiantes
CREATE OR REPLACE FUNCTION estudiante_persona()
RETURNS TABLE (ci varchar, pnombre varchar, papellido varchar, sexo char, nacionalidad char, tipo_est varchar, estudiante date) AS $$
BEGIN
  FOR ci, pnombre, papellido, sexo, nacionalidad, tipo_est, estudiante IN
    SELECT persona.ci, persona.pnombre, persona.papellido, persona.sexo, persona.nacionalidad,
		 				estudiante.tipo_est, estudiante.fecha_n
    FROM persona
    JOIN estudiante
    ON persona.ci = estudiante.ci_escolar
  	LOOP
    RETURN NEXT;
  END LOOP;
  RETURN;
END;
$$ LANGUAGE plpgsql;

--Funcion para obetener a los representantes
CREATE OR REPLACE FUNCTION representante_persona()
RETURNS TABLE (ci varchar, pnombre varchar, papellido varchar, sexo_p char, nacionalidad char, tutor_legal varchar) AS $$
BEGIN
  FOR ci, pnombre, papellido, sexo_p, nacionalidad, tutor_legal, representante IN
    SELECT persona.ci, persona.pnombre, persona.papellido, persona.sexo_p, persona.nacionalidad,
		 				representante.tutor_legal
    FROM persona
    JOIN representante
    ON persona.id_per = representante.id_rep
  	LOOP
    RETURN NEXT;
  END LOOP;
  RETURN;
END;
$$ LANGUAGE plpgsql;
