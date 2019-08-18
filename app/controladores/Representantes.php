<?php
  
	class Representantes extends Controlador{

	public function __construct(){
		$this -> representante_modelo = $this -> modelo('Representante');
	}

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

	public function representantes(){
		$this -> vista('Representantes/representantes');
	}

	public function registro_representante(){
		$this -> vista('Representantes/registro_representante');
	}

	public function registro_persona_representante(){
		$this -> vista('Representantes/registro_persona_representante');
	}

}
