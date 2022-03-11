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

				$check_representante = $this -> estudianteModelo -> comprobarEstudiante($datos);

				switch ($check_representante['mensaje']) {
					case '0':
						
						$this -> vista('Representantes/registro_persona_representante', $check_representante);

						break;

					case '1':
					
						$this -> vista('Estudiantes/registrar_estudiante', $check_representante);

						break;

					case '2':
				
						$this -> vista('Representantes/registro_representante', $check_representante);

						break;
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
					'tipo_est' => trim($_POST['tipo_est']),
					'fecha_n' => trim($_POST['fecha_n']),
					'lugar_n' => trim($_POST['lugar_n']),
					'nacionalidad_e' => trim($_POST['nacionalidad_e']),
					'sexo' => trim($_POST['sexo']),
					'pnom' => trim($_POST['pnom']),
					'segnom' => trim($_POST['segnom']),
					'pape' => trim($_POST['pape']),
					'segape' => trim($_POST['segape']),

				
					//Datos de la tabla direccion
					'n_casa' => trim($_POST['n_casa']), 
					'pto_ref' => trim($_POST['pto_ref']),
					'calle' => trim($_POST['calle']),
					'sector' => trim($_POST['sector']),

					//Datos de la tabla pais
					'nom_pais' => trim($_POST['nom_pais']),

					//Datos de la tabla municipio
					'nombre_muni' => trim($_POST['nombre_muni']),

					//Datos de la tabla estado
					'nom_estado' => trim($_POST['nom_estado']),

					'usuario' => trim($_POST['usuario']),

 
				];
				$this -> estudianteModelo -> insertar_estudiante($datos);
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

		public function perfil_estudiante($ci_est){

			$estudiante = $this -> estudianteModelo -> obtener_estudiante_perfil($ci_est);
				
			$datos = [ 
				'ci_est' => $estudiante -> ci_est,
				'ci_escolar' => $estudiante -> ci_escolar,
				'pasaporte' => $estudiante -> pasaporte,
				'ci_diplomatica' => $estudiante -> ci_diplomatica,
				'tipo_est' => $estudiante -> tipo_est,
				'fecha_n' => $estudiante -> fecha_n,
				'lugar_n' => $estudiante -> lugar_n,
				'sexo' => $estudiante -> sexo,
				'pnom' => $estudiante -> pnom,
				'segnom' => $estudiante -> segnom,
				'otrosnom' => $estudiante -> otrosnom,
				'pape' => $estudiante -> pape,
				'segape' => $estudiante -> segape,
				'otrosape' => $estudiante -> otrosape			
			];

			$this -> vista("Estudiantes/perfil_estudiante", $datos);

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
