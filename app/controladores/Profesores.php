<?php
 
	class Profesores extends Controlador{
 
		public function __construct(){
			$this -> profesores_modelo = $this -> modelo('Profesor');
			$this -> seccionModelo = $this -> modelo('Seccion');
		}

		public function index(){
	    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$datos = [
				'ci' => trim($_POST['ci'])
			]; 
			$register_profesor = $this -> profesores_modelo -> comprobar_profesor($datos);
			if (empty($register_profesor['mensaje'])) {
				switch ($this -> profesores_modelo -> registro) {
					case '0':
						Helper::redireccionar('/Profesores/profesores');
					break; 
					
					case '1':
						Helper::redireccionar('/Profesores/registro_profesor');
					break;
					
					case '2':
						Helper::redireccionar('/Profesores/registro_persona_profesor');
					break;
				}
			} else{ 
				$datos = $register_profesor;
				$this -> vista('Profesores/comprobar_profesor', $datos);
			}
		} else{
			$datos = [
				'mensaje' => ''
			];
      $this -> vista('Profesores/comprobar_profesor', $datos);
    }
	}

	// Función para eliminar un usuario del sistema.
	public function eliminar_profesor($id_prof){
		// Obtener información del usuario
		$datos = [
			'id_prof' => $id_prof 
		];
		$this -> profesores_modelo -> borrar_profesor($datos);
		if (empty($this -> profesores_modelo -> mensaje)) {
			Helper::redireccionar('/Profesores/profesores');
		} else {
			die('Algo salio mal, no se sabe que, chao');
		}	
	}

	// Método registro_persona_profesor el cual instancia la vista que tiene el formulario para registrar a un profesor
	// nuevo en el sistema.
	public function registro_persona_profesor(){
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			 $datos = [
				//Datos para la tabla persona
				'ci' => trim($_POST['ci']),
				'pnombre' => trim($_POST['pnombre']),
				'segnombre' => trim($_POST['segnombre']),
				'papellido' => trim($_POST['papellido']),
				'segapellido' => trim($_POST['segapellido']),
				'nacionalidad' => trim($_POST['nacionalidad']),
				'sexo_p' => trim($_POST['sexo_p']),

				//Datos de la tabla profesor
				'cod_prof' => trim($_POST['cod_prof']),				
				'tipo_prof' => trim($_POST['tipo_prof'])
				
			];

			$register_prof = $this -> profesores_modelo -> registrar_persona_profesor($datos);
			if (empty($this -> profesores_modelo -> mensaje)) {
				Helper::redireccionar('/Profesores/profesores');
			} else {
				$this -> vista('Profesores/registro_persona_profesor', $register_prof);
			}
			
		} else {
			$datos = ['mensaje' => ''];
			$this -> vista('Profesores/registro_persona_profesor', $datos);	
		}		
	}

	public function editar_profesor_persona($id_prof){
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			 $datos = [

				'ci' => trim($_POST['ci']),
				'pnombre' => trim($_POST['pnombre']),
				'segnombre' => trim($_POST['segnombre']),
				'papellido' => trim($_POST['papellido']),
				'segapellido' => trim($_POST['segapellido']),
				'nacionalidad' => trim($_POST['nacionalidad']),
				'sexo_p' => trim($_POST['sexo_p']),
				'cod_prof' => trim($_POST['cod_prof']),				
				'tipo_prof' => trim($_POST['tipo_prof']),
				'id_per' => $id_prof
				
			];

			$edit_prof = $this -> profesores_modelo -> editar_profesor_persona($datos);
			if (empty($edit_prof['mensaje'])) {
				Helper::redireccionar('/Profesores/profesores');
			} else {
				$this -> vista('Profesores/editar_profesor_persona', $edit_prof);
			}
			
		} else {
			// Obtener información de la seccion a editar
			$profesor = $this -> profesores_modelo -> obtener_profesor_por_ci($id_prof);
			$datos = [
				'id_per' => $profesor -> id_per,
				'ci' => $profesor -> ci,
				'pnombre' => $profesor -> pnombre,
				'segnombre' => $profesor -> segnombre,
				'papellido' => $profesor -> papellido,
				'segapellido' => $profesor -> segapellido,
				'nacionalidad' => $profesor -> nacionalidad,
				'sexo_p' => $profesor -> sexo_p,
				'cod_prof' => $profesor -> cod_prof,
				'tipo_prof' => $profesor -> tipo_prof,
				'id_prof' => $profesor -> id_prof,
        'mensaje' => ''
			];
			$this -> vista('Profesores/editar_profesor_persona', $datos);	
		}		
	}

	// Método que instancia la vista para el registro de un profesor pero que ya estaba registrado en el sistema como
	// un profesor ó usuario.
	public function registro_profesor(){
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$datos = [
				//Datos de la tabla profesor
				'cod_prof' => trim($_POST['cod_prof']),				
				'tipo_prof' => trim($_POST['tipo_prof']),
				'ci_per' => trim($_POST['ci_per'])
			];
			$this -> profesores_modelo -> registrar_profesor($datos);
			if (empty($this -> profesores_modelo -> mensaje)) {
				Helper::redireccionar('/Profesores/profesores');
			} else {
				$datos = ["mensaje" => $this -> profesores_modelo -> mensaje];
				$this -> vista('Profesores/registro_profesor', $datos);
			}		
		} else {
			$datos = ['mensaje' => ''];
			$this -> vista('Profesores/registro_profesor', $datos);
		}
	}

	// Método profesores que instancia la vista profesores, donde se ve el registro de todos los profesores registrados.
	public function profesores(){
		$profesores = $this -> profesores_modelo -> obtener_profesores();
		$datos = [
			'profesores' => $profesores
		];
		$this -> vista('Profesores/profesores', $datos);		
	}

	public function get_secciones($id_prof) {
		$_SESSION["id_profesor"] = $id_prof;
		$secciones = $this -> seccionModelo -> obtener_secciones();
		$datos = [
			'secciones' => $secciones,
			'mensaje' => ''
		];
		$this -> vista('Profesores/asignar_seccion', $datos);
	}

	public function profesor_seccion() {
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$datos = [
				'id_seccion' => trim($_POST['id_seccion']),
				'id_profesor' => $_SESSION["id_profesor"],
			];
			$this -> profesores_modelo -> asignar_seccion($datos);
			if (empty($this -> profesores_modelo -> mensaje)) {
				Helper::redireccionar('/Profesores/profesores');
			} else {
				$datos = ["mensaje" => $this -> profesores_modelo -> mensaje];
				$this -> vista('Profesores/registro_profesor', $datos);
			}		
		} else {
			$this -> vista('Profesores/profesores', $datos);
		}
	} 
}
		
