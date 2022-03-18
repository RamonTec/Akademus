<?php
 
	class Logins extends Controlador{
 
		public function __construct(){
			$this -> loginModelo = $this -> modelo('Session');
		}  
 
		//Metodo index por defecto que instancia la vista de inicio de sesion y recibe todos los usuarios registrados en la base de datos
		public function index(){
			// $usuarios = $this -> loginModelo -> obtenerUsuarios();
			// $datos = ['usuarios' => $usuarios -> total]; 
			$datos = [
				'mensaje' => ""
			];
			$this -> vista('Login/Login', $datos);
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
				$datos = [
					'mensaje' => "No iniciado"
				];
				$this -> vista('Login/Login', $datos);
			} 
		}
		
		public function inicio(){
			$datos = [
				'mensaje' => "No iniciado"
			];
			$this -> vista('Login/inicio', $datos);
		}

		public function cerrar_sesion(){
			$_SESSION['nom_u'] = FALSE;
			session_destroy();
			$datos = [
				'mensaje' => ''
			];
			$this -> vista('Login/Login', $datos);
		}

	}
