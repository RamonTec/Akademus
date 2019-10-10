<?php
 
	class Logins extends Controlador{
 
		public function __construct(){
			$this -> loginModelo = $this -> modelo('Session');
		}  
 
		//Metodo index por defecto que instancia la vista de inicio de sesion y recibe todos los usuarios registrados en la base de datos
		public function index(){
			// $usuarios = $this -> loginModelo -> obtenerUsuarios();
			// $datos = ['usuarios' => $usuarios -> total]; 
			$this -> vista('Login/Login');
		}

		public function verificar_sesion(){
			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				$datos = [
					'nom_u' => trim($_POST['nom_u']),
					'clave' => trim($_POST['clave'])
				];

				$this -> loginModelo -> validar_usuario($datos);
				if (empty($this -> loginModelo -> mensaje)) {
					Helper::redireccionar('/Login/inicio');
				} else{
					$datos = ["mensaje" => $this -> loginModelo -> mensaje];
					$this -> vista('Login/Login', $datos);
				} 
			} else{ 
				$this -> vista('Login/Login');
			} 
		}
		
		public function inicio(){
			$this -> vista('Login/inicio');
		}

		public function cerrar_sesion(){
			session_start();
			session_destroy();
			$this -> vista('Login/Login');
		}

	}
