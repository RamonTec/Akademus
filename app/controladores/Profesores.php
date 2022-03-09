<?php
 
	class Profesores extends Controlador{
 
		public function __construct(){
			$this -> profesores_modelo = $this -> modelo('Profesor');
		}

		public function index(){
	    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$datos = [
				'ci' => trim($_POST['ci'])
			]; 
			$this -> profesores_modelo -> comprobar_profesor($datos);
			if (empty($this -> profesores_modelo -> mensaje)) {
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
				$datos = ["mensaje" => $this -> profesores_modelo -> mensaje];
				$this -> vista('Profesores/comprobar_profesor', $datos);
			}
		} else{
        $this -> vista('Profesores/comprobar_profesor');
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

				//Datos de la tabla telefono
				'cod_area1' => trim($_POST['cod_area1']), 
				'numero1' => trim($_POST['numero1']),
				'tipo1' => trim($_POST['tipo1']),

				//Datos de la tabla representante
				'tutor_legal' => trim($_POST['tutor_legal']),

				//Datos de la tabla representante
				'posee_po' => trim($_POST['posee_po']),
				'nom_po' => trim($_POST['nom_po']),
				'lugar_po' => trim($_POST['lugar_po']),
				'tlf_po' => trim($_POST['tlf_po']),			
			];

			$this -> profesor_modelo -> registrar_profesor($datos);
			if (empty($this -> profesor_modelo -> mensaje)) {
				Helper::redireccionar('/Profesores/profesor');
			} else {
				$datos = ["mensaje" => $this -> profesor_modelo -> mensaje];
				$this -> vista('Profesores/registro_persona_profesor', $datos);
			}
			
		} else {
			$this -> vista('Profesores/registro_persona_profesor');	
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
			$this -> vista('Profesores/registro_profesor');
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
}
		
