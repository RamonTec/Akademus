<?php

	class Secciones extends Controlador{

		public function __construct(){
			$this -> seccionModelo = $this -> modelo('Seccion');
		}

		public function index(){
			$this -> vista('Secciones/registroSeccion');
		}

    public function secciones(){ 		
      $secciones = $this -> seccionModelo -> obtener_secciones();
      $datos = [ 
        'secciones' => $secciones,
        'mensaje' => ''
      ];
      $this -> vista('Secciones/secciones', $datos);
    }

    // Método que carga la vista editar seccion.	
	public function editar_seccion($id_seccion){
		if ($_SERVER['REQUEST_METHOD'] == "POST") { 
			$datos = [
				//Datos para la tabla usuario
				'id_seccion' => $id_seccion,
				'nom_sec' => trim($_POST['nom_sec']),
				'cod_sec' => trim($_POST['cod_sec'])
			];  
			$datos_update = $this -> seccionModelo -> editar_seccion($datos);
			if (empty($this -> seccionModelo -> mensaje)) {
				Helper::redireccionar('/Secciones/secciones');
			} else {
				$this -> vista('Secciones/editar_seccion', $datos_update);
			}			 
		} else {
			// Obtener información de la seccion a editar
			$seccion = $this -> seccionModelo -> obtener_seccion_por_id($id_seccion);			
			$datos = [
				'id_seccion' => $seccion -> id_seccion,
				'nom_sec' => $seccion -> nom_sec,
				'cod_sec' => $seccion -> cod_sec,
        'mensaje' => ''
			];
			$this -> vista('Secciones/editar_seccion', $datos);
		}	
	}

    public function eliminar_seccion($id_seccion) {
      $datos = [
        'id_seccion' => $id_seccion
      ];
      $secciones = $this -> seccionModelo -> eliminar_seccion($datos);
      if (empty($secciones['mensaje'])) {
        Helper::redireccionar('/Secciones/secciones');
      } else {
        $this -> vista('Secciones/secciones', $secciones);
      }
    }

    public function registro_seccion(){
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $datos = [
          'nom_sec' => trim($_POST['nom_sec']),
          'cod_sec' => trim($_POST['cod_sec'])
        ];
        $this -> seccionModelo -> registrar_seccion($datos);
        if (empty($this -> seccionModelo -> mensaje)) {
          Helper::redireccionar('/Secciones/secciones');
        } else {
          $datos = ["mensaje" => $this -> seccionModelo -> mensaje];
          $this -> vista('Secciones/registroSeccion', $datos);
        }
      } else {
        $ths -> vista('Secciones/registroSeccion');
      }
    }

  }
