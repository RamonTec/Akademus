<?php
   
	class Representantes extends Controlador{

	public function __construct(){
		$this -> representante_modelo = $this -> modelo('Representante');
	}

	// Método por defecto index el cual inicia la vista comprobar_representante.
    public function index(){
	    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$datos = [
				'ci' => trim($_POST['ci'])
			]; 
			$this -> representante_modelo -> comprobar_representante($datos);
			if (empty($this -> representante_modelo -> mensaje)) {
				switch ($this -> representante_modelo -> registro) {
					case '0':
						Helper::redireccionar('/Representantes/representantes');
					break; 
					
					case '1':
						Helper::redireccionar('/Representantes/registro_representante');
					break;
					
					case '2':
						Helper::redireccionar('/Representantes/registro_persona_representante');
					break;				
				}
			} else{ 
				$datos = ["mensaje" => $this -> representante_modelo -> mensaje];
				$this -> vista('Representantes/comprobar_representante', $datos);
			}
		} else{
        $this -> vista('Representantes/comprobar_representante');
    }
	}

	// Método representantes que instancia la vista representantes, donde se ve el registro de todos los representantes registrados.
	public function representantes(){
		$representantes = $this -> representante_modelo -> obtener_representante();
		$datos = [
			'representantes' => $representantes
		];
		$this -> vista('Representantes/representantes', $datos);		
	}

	// Método registro_persona_representante el cual instancia la vista que tiene el formulario para registrar a un representante
	// nuevo en el sistema.
	public function registro_persona_representante(){
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
				'pto_ref' => trim($_POST['pto_ref']),

				//Datos de la tabla pais
				'nom_pais' => trim($_POST['nom_pais']),

				//Datos de la tabla municipio
				'nombre_muni' => trim($_POST['nombre_muni']),

				//Datos de la tabla estado
				'nom_estado' => trim($_POST['nom_estado']),

				//Datos de la tabla telefono
				'numero1' => trim($_POST['numero1']),

				//Datos de la tabla representante
				'nom_po' => trim($_POST['nom_po'])
			];

			$this -> representante_modelo -> registrar_representante_persona($datos);
			if (empty($this -> representante_modelo -> mensaje)) {
				Helper::redireccionar('/Representantes/representantes');
			} else {
				$datos = ["mensaje" => $this -> representante_modelo -> mensaje];
				$this -> vista('Representantes/registro_persona_representante', $datos);
			}
			
		} else {
			$this -> vista('Representantes/registro_persona_representante');	
		}		
	}

	// Método que instancia la vista para el registro de un representante pero que ya estaba registrado en el sistema como
	// un profesor ó usuario.
	public function registro_representante(){
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$datos = [
				//Datos para la tabla persona
				'ci' => $_SESSION['ci_representante'],

				'pto_ref' => trim($_POST['pto_ref']),

				//Datos de la tabla pais
				'nom_pais' => trim($_POST['nom_pais']),

				//Datos de la tabla municipio
				'nombre_muni' => trim($_POST['nombre_muni']),

				//Datos de la tabla estado
				'nom_estado' => trim($_POST['nom_estado']),

				'numero1' => trim($_POST['numero1']),

				'nom_po' => trim($_POST['nom_po']),
			];

			$this -> representante_modelo -> registrar_representante($datos);
			if (empty($this -> representante_modelo -> mensaje)) {
				Helper::redireccionar('/Representantes/representantes');
			} else {
				$datos = [
					"ci_representante" => $_SESSION["ci_representante"],
					"mensaje" => $this -> representante_modelo -> mensaje,
				];
				$this -> vista('Representantes/registro_representante', $datos);
			}		
		} else {
			$this -> vista('Representantes/registro_representante');
		}
	}

	// Método que instancia la vista actualizar_representante.
	public function actualizar_representante($ci){
			$_SESSION['id_representante_persona'] = $ci;
			$representante = $this -> representante_modelo -> obtener_representante_por_ci($ci);	
			print_r($representante);		
			
			$this -> vista('Representantes/editar_representante', $representante);
	}

	public function eliminar_representante($id_per) {
		$datos = [
			'id_per' => $id_per
		];
		$representante_eliminado = $this -> representante_modelo -> borrar_representante($datos);
		if (empty($representante_eliminado['mensaje'])) {
			$datos = [
				'mensaje' => 'Representante eliminado existosamente'
			];
			print_r("aca");
			Helper::redireccionar('/Representantes/representantes', $datos);
		} else {
			print_r("aca");
			$this -> vista('Representantes/Representantes', $secciones);
		}
	}

	public function obtener_representante() {
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$datos = [
				'ci' => trim($_POST['ci'])
			]; 
			$representante = $this -> representante_modelo -> get_estudiantes_by_reprepresentante($datos);
			if (empty($representante["mensaje"])) {
				$this -> vista('Representantes/estudiantes_representante', $representante);
			} else{ 
				$datos = ["mensaje" => $this -> representante_modelo -> mensaje];
				$this -> vista('Representantes/obtener_representante', $representante);
			}
		} else{
        $this -> vista('Representantes/obtener_representante');
    }
	}

	public function modificar_representante() {
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$datos = [
				'ci' => trim($_POST['ci']),
				'pnombre' => trim($_POST['pnombre']),
				'segnombre' => trim($_POST['segnombre']),
				'papellido' => trim($_POST['papellido']),
				'segapellido' => trim($_POST['segapellido']),
				'nacionalidad' => trim($_POST['nacionalidad']),
				'sexo_p' => trim($_POST['sexo_p']),

				//Datos de la tabla direccion
				'pto_ref' => trim($_POST['pto_ref']),

				//Datos de la tabla pais
				'nom_pais' => trim($_POST['nom_pais']),

				//Datos de la tabla municipio
				'nombre_muni' => trim($_POST['nombre_muni']),

				//Datos de la tabla estado
				'nom_estado' => trim($_POST['nom_estado']),

				//Datos de la tabla telefono
				'numero1' => trim($_POST['numero1']),

				//Datos de la tabla representante
				'nom_po' => trim($_POST['nom_po'])
			];
			$repre = $this -> representante_modelo -> editar_representante($datos);
			if (empty($repre['mensaje'])) {
				Helper::redireccionar('/Representantes/representantes');
			} else {
				$this -> vista('Representantes/editar_representante', $repre);
			}
		}
	}

	

}
