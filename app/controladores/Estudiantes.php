<?php
  
	class Estudiantes extends Controlador{

		public function __construct(){
			$this -> estudianteModelo = $this -> modelo('Estudiante');
		}
 
		public function index(){
			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				$datos = [
					'ci' => trim($_POST['ci'])
				];
				$this -> estudianteModelo -> comprobarEstudiante($datos);
				if (empty($this -> estudianteModelo -> mensaje)) {
					helper::redireccionar('/Representantes/comprobarRepresentante');
				} else{
					$datos = ["mensaje" => $this -> estudianteModelo -> mensaje];
					$this -> vista('Estudiantes/registrar_estudiante', $datos);
					}
				} else{
	        $this -> vista('Estudiantes/comprobarEstudiante');
	      	}
		}

		public function registrar_estudiante(){
			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				$datos = [

					//Datos de la tabla estudiante
					'ci_est' => trim($_POST['ci_est']),
					'ci_escolar' => trim($_POST['ci_escolar']),
					'pasporte' => trim($_POST['pasporte']),
					'ci_diplomatica' => trim($_POST['ci_diplomatica']),
					'tipo_est' => trim($_POST['tipo_est']),
					'fecha_n' => trim($_POST['fecha_n']),
					'lugar_n' => trim($_POST['lugar_n']),
					'sexo' => trim($_POST['sexo']),
					'pnom' => trim($_POST['pnom']),
					'segnom' => trim($_POST['segnom']),
					'otrosnom' => trim($_POST['otrosnom']),
					'pape' => trim($_POST['pape']),
					'segape' => trim($_POST['segape']),
					'otrosape' => trim($_POST['otrosape']),

					//Datos de la tabla telefono
					'cod_area1' => trim($_POST['cod_area1']),
					'numero1' => trim($_POST['numero1']),
					'tipo1' => trim($_POST['tipo1']),

					//Datos de la tabla direccion
					'nºcasa' => trim($_POST['nºcasa']), 
					'pto_ref' => trim($_POST['pto_ref']),
					'calle' => trim($_POST['calle']),
					'sector' => trim($_POST['sector']),

					//Datos de la tabla pais
					'nom_pais' => trim($_POST['nom_pais']),

					//Datos de la tabla municipio
					'nombre_muni' => trim($_POST['nombre_muni']),

					//Datos de la tabla estado
					'nom_estado' => trim($_POST['nom_estado']),

					//Datos de la tabla email
					'correo' => trim($_POST['correo']),
					'tipo_correo' => trim($_POST['tipo_correo']),

					//Datos de la tabla canaima
					'posee_can' => trim($_POST['posee_can']),
					'modelo_can' => trim($_POST['modelo_can']),
					'codigo_can' => trim($_POST['codigo_can']),
					'serial_can' => trim($_POST['serial_can']),
					'condicion_can' => trim($_POST['condicion_can']),

					//Datos de la tabla beca
					'posee_beca' => trim($_POST['posee_beca']),
					'tipo_beca' => trim($_POST['tipo_beca']),
					'descripcion' => trim($_POST['descripcion']),

					//Datos de la tabla uniforme
					'talla_c' => trim($_POST['talla_c']),
					'talla_p' => trim($_POST['talla_p']),
					'talla_z' => trim($_POST['talla_z']),

					//Datos de la tabla salud
					'condicion_s' => trim($_POST['condicion_s']),
					'observacion_s' => trim($_POST['observacion_s']),
					'peso' => trim($_POST['peso']),
					'altura' => trim($_POST['altura']),

					//Datos de la tabla incapacidad
					'nombre_i' => trim($_POST['nombre_i']),
					'tipo_i' => trim($_POST['tipo_i']),

					//Datos de la tabla discapacidad
					'nom_d' => trim($_POST['nom_d']),
					'tipo_d' => trim($_POST['tipo_d']),

					//Datos de la tabla tratamiento
					'nom_t' => trim($_POST['nom_t']),
					'tipo_t' => trim($_POST['tipo_t']),

					//Datos de la tabla vacuna
					'descripcion_v' => trim($_POST['descripcion_v']),
					'falta_v' => trim($_POST['falta_v']),

					//Datos de la tabla institucion de procedencia
					'nombre_pro' => trim($_POST['nombre_pro']),
					'cod_dea' => trim($_POST['cod_dea']),

					//Datos de la tabla enfermedad
					'nom_e' => trim($_POST['nom_e']),
					'tipo_e' => trim($_POST['tipo_e']),

				];
				$this -> estudianteModelo -> registrarEstudiante($datos);
				if (empty($this -> estudianteModelo -> mensaje)) {
					Helper::redireccionar('/Login/inicio');
				} else{
					$datos = ["mensaje" => $this -> estudianteModelo -> mensaje];
					$this -> vista('Estudiantes/registrar_estudiante', $datos);
				}
			} else{
				$this -> vista('Estudiantes/registrar_estudiante');
			}
		}

		public function estudiantes(){
			$estudiantes = $this -> estudianteModelo -> obtenerestudiantes();
			$datos = [
				'estudiantes' => $estudiantes
			];
			$this -> vista('Estudiantes/estudiantes', $datos);
		}

		public function borrarEstudiante(){
			$this -> vista('Estudiantes/borrarEstudiante');
		}
 
		public function actualizarEstudiante($ci){
			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				$datos = [
					'ci' => trim($_POST['ci']),
					'pnombre' => trim($_POST['pnombre']),
					'segnombre' => trim($_POST['segnombre']),
					'otrosnombres' => trim($_POST['otrosnombres']),
					'papellido' => trim($_POST['papellido']),
					'segapellido' => trim($_POST['segapellido']),
					'otrosapellidos' => trim($_POST['otrosapellidos']),
					'sexo' => trim($_POST['sexo']),
					'nacionalidad' => trim($_POST['nacionalidad'])
				];
				$this -> estudianteModelo -> modificarEstudiante($datos);
				if (empty($this -> estudianteModelo -> mensaje)) {
					Helper::redireccionar('/Estudiantes/estudiantes');
				} else{
					die('Algo salio mal');
				}
			} else{

				$usuario = $this -> estudianteModelo -> obtenerEstudiante($ci);

				$datos = [
					'nombre_u' => $usuario -> nombre_u,
					'privilegio' => $usuario -> privilegio,
					'clave' => $usuario -> clave,
					'pregunta_s' => $usuario -> pregunta_s,
					'respuesta_s' => $usuario -> respuesta_s,
					'activo' => $usuario -> activo
				];
				$this -> vista('Estudiantes/actualizarEstudiante', $datos);
			}
		}


	}
