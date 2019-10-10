<?php  

class Configuraciones extends Controlador{	

	public function __construct(){
		$this -> configModelo = $this -> modelo('Configurar');
	}	

	public function index(){		
		$this->vista('Sistema/Sistema');
	}  

	public function respaldoSistema(){
		if ($this -> configModelo -> respaldo()){		

			$datos = [
				"mensaje" => 'Respaldo creado correctamente'				
			];

			$this -> vista('Sistema/Sistema', $datos);
		} 
	}


/* RESTAURA LOS DATOS DE UN RESPALDO PREVIAMENTE HECHO */
	public function restaurar_repaldo(){

		if ($_SERVER['REQUEST_METHOD'] == 'POST'){

			if (empty($_POST['archivo'])){
				
		// CARGA LOS DATOS RESPALDADOS SI LOS HAY
				$input = $this->systemModelo->archivos();

				$data = array(
					"input" => $input,
					"mensaje" => 'Debes seleccionar un archivo para iniciar la restauración',
					"alert" => 'alert-danger');
				$this->vista('system/inicio', $data);
			}
		// SI HAY UN NOMBRE DE ARCHIVO PARA RESTAURAR Y LO RESTAURA
			else if ($this->systemModelo->restaurar_repaldo($_POST['archivo'])){
				//CARGA LOS ARCHIVOS DE RESPADOS
				$input = $this->systemModelo->archivos();
				$data = array(
					"input" => $input,
					"mensaje" => 'Datos restaurados correctamente',
					"ok" => 'ok',
					"alert" => 'alert-success');
				$this->vista('system/inicio', $data);
			} else {
				//CARGA LOS POSIBLES ARCHIVOS DE RESPALDO QUE EXISTAN
				$input = $this->systemModelo->archivos();
				$data = array(
					"input" => $input,
					"mensaje" => 'Sólo se admiten archivos SQL',
					"ok" => 'ok',
					"alert" => 'alert-danger');
				$this->vista('system/inicio', $data);
			}
		}
	}

}

?>