<?php

	class Secciones extends Controlador{

		public function __construct(){
			$this -> seccionModelo = $this -> modelo('Seccion');
		}

		public function index(){
			$this -> vista('Secciones/registroSeccion');
		}

    public function registrarSeccion(){
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $datos = [
          'nombre' => trim($_POST['nombre']),
          'cod_seccion' => trim($_POST['cod_seccion'])
        ];
        $this -> seccionModelo -> registrarSeccion($datos);
        if (empty($this -> seccionModelo -> mensaje)) {
          Helper::redireccionar('/Login/inicio');
        } else {
          $this -> vista('Secciones/registroSeccion');
        }
      } else {
        $ths -> vista('Secciones/registroSeccion');
      }
    }

  }
