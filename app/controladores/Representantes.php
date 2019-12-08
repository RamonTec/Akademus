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

			$this -> representante_modelo -> registrar_representante($datos);
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
				// Variable para registrar al representante
				'ci' => trim($_POST['ci']),

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
				'posee_po' => trim($_POST['posee_po']),
				'nom_po' => trim($_POST['nom_po']),
				'lugar_po' => trim($_POST['lugar_po']),
				'tlf_po' => trim($_POST['tlf_po'])
			];
			$this -> representante_modelo -> registrar_representante($datos);
			if (empty($this -> representante_modelo -> mensaje)) {
				Helper::redireccionar('/Representantes/representantes');
			} else {
				$datos = ["mensaje" => $this -> representante_modelo -> mensaje];
				$this -> vista('Representantes/registro_representante', $datos);
			}		
		} else {	
			$this -> vista('Representantes/registro_representante');
		}
	}

	// Método que instancia la vista actualizar_representante.
	public function actualizar_representante($ci){
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$datos = [
				// Variable para actualizar al representante
				'ci' => trim($_POST['ci']),
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
				'posee_po' => trim($_POST['posee_po']),
				'nom_po' => trim($_POST['nom_po']),
				'lugar_po' => trim($_POST['lugar_po']),
				'tlf_po' => trim($_POST['tlf_po'])
			];
			$this -> representante_modelo -> editar_representante($datos);
			if (empty($this -> representante_modelo -> mensaje)) {
				Helper::redireccionar('/Representantes/representante');
			} else {
				die('Algo salio mal');
			}
		} else {
			$representante = $this -> representante_modelo -> obtener_representante_por_ci($ci);			
			$datos = [ 
				'ci' => $representante -> ci,
				'pnombre' => $representante -> pnombre,
				'segnombre' => $representante -> segnombre,
				'papellido' => $representante -> papellido,
				'segapellido' => $representante -> segapellido,
				'nacionalidad' => $representante -> nacionalidad,
				'sexo_p' => $representante -> sexo_p,
				
				'n_casa' => $representante -> n_casa,				
				'pto_ref' => $representante -> pto_ref,
				'calle'	=> $representante -> calle,
				'sector' => $representante -> sector,

				'nom_pais' => $representante -> nom_pais,
				'nombre_muni' => $representante -> nombre_muni,
				'nom_estado' => $representante -> nom_estado,

				'cod_area1' => $representante -> cod_area1,
				'numero1' => $representante -> numero1,
				'tipo1' => $representante -> tipo1,

				'tutor_legal' => $representante -> tutor_legal,				
				'posee_po' => $representante -> posee_po,
				'nom_po' => $representante -> nom_po,
				'lugar_po' => $representante -> lugar_po,
				'tlf_po' => $representante -> tlf_po
			];
			$this -> vista('Representantes/editar_representante', $datos);
		}	
	}

	

}
