<?php
 
	class Usuarios extends Controlador{
 
	public function __construct(){
		$this -> usuario_modelo = $this -> modelo('Usuario');
	}
   
	//Metodo por defecto que instancia la vista para el registro de usuario
    public function index(){
  		if ($_SERVER['REQUEST_METHOD'] == 'POST'){
			$datos = array(
				//Datos para la tabla persona
				'ci' => trim($_POST['ci']),
				'pnombre' => trim($_POST['pnombre']),
				'segnombre' => trim($_POST['segnombre']),
				'papellido' => trim($_POST['papellido']),
				'segapellido' => trim($_POST['segapellido']),
				'nacionalidad' => trim($_POST['nacionalidad']),
	
				//Datos para la tabla usuario
				'nom_u' => trim($_POST['nom_u']),
				'clave' => trim($_POST['clave']),
				'privilegio' => trim($_POST['privilegio']),
				'pregunta_s' => trim($_POST['pregunta_s']),
				'respuesta_s' =>trim ($_POST['respuesta_s']),
	
				//Datos para la tabla cargo
				'tipo_cargo' => trim($_POST['tipo_cargo'])
			);

			$this -> usuario_modelo -> agregar_usuario($datos);
  			if (empty($this -> usuario_modelo -> mensaje)){
  				Helper::redireccionar('/Login/login');
  			} else {
				$datos = array("mensaje" => $this -> usuario_modelo -> mensaje);
				$this -> vista('Usuarios/registrar_usuario',$datos);
  			}
  		} else {
  			$usuario = $this -> usuario_modelo -> obtener_usuario_director();
			
			$datos = [
				"mensaje" => $this -> usuario_modelo -> mensaje
			];
  			$this -> vista('Usuarios/registrar_usuario', $datos);
  		}
	}
 
	// Metodo que llama a la vista para la recuperacion de usuario
	public function recuperar_usuario(){
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$datos = [
				'ci' => trim($_POST['ci']),
				'pregunta_s' => trim($_POST['pregunta_s']),
				'respuesta_s' => trim($_POST['respuesta_s'])
			];			
			$this -> usuario_modelo -> verificarUsuario($datos);			
			if (empty($this -> usuario_modelo -> mensaje)) {
				$this -> vista('Usuarios/actualizar_datos');
			} else{
				$datos = ["mensaje" => $this -> usuario_modelo -> mensaje];
				$this -> vista('Usuarios/recuperar_usuario',$datos);
			}
		} else{
			$this -> vista('Usuarios/recuperar_usuario');
		}
	}

	// Metodo para actualizar al usuario
	public function actualizar_usuario(){
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$datos = [
				'nombre_viejo' => trim($_POST['nombre_viejo']),
				'nom_u' => trim($_POST['nom_u']),
				'clave' => trim($_POST['clave'])
			];
			$this -> usuario_modelo -> actualizarUsuario($datos);
			if (empty($this -> usuario_modelo -> mensaje)) {
				Helper::redireccionar('/Login/Login');
			} else{
				$datos = ["mensaje" => $this -> usuario_modelo -> mensaje];
				$this -> vista('Usuarios/actualizar_datos', $datos);
			}
		} else{
			$this -> vista('Usuarios/actualizar_datos');
		}
	} 

	// Metodo que recibe todos los usuarios registrados en la base de datos
	public function usuarios(){ 		
		$usuarios = $this -> usuario_modelo -> obtenerUsuarios();
		$datos = [ 
			'usuarios' => $usuarios
		];
		$this -> vista('Usuarios/usuarios', $datos);
	}

	// Método que carga la vista editar usuario.	
	public function editar_usuario($id_u){
		if ($_SERVER['REQUEST_METHOD'] == "POST") { 
			$datos = [
				//Datos para la tabla usuario
				'id_u' => $id_u,
				'nom_u' => trim($_POST['nom_u']),
				'clave' => trim($_POST['clave']),
				'privilegio' => trim($_POST['privilegio']),
				'pregunta_s' => trim($_POST['pregunta_s']),
				'respuesta_s' =>trim ($_POST['respuesta_s']),
			];  
			$this -> usuario_modelo -> editar_usuario_por_sistema($datos);
			if (empty($this -> usuario_modelo -> mensaje)) {
				Helper::redireccionar('/Usuarios/usuarios');
			} else {
				die('Algo salio mal');
			}			 
		} else {
			// Obtener información del usuario a editar
			$usuario = $this -> usuario_modelo -> obtener_usuario_por_id($id_u);			
			$datos = [ 
				'id_u' => $usuario -> id_u,
				'nom_u' => $usuario -> nom_u,
				'clave' => $usuario -> clave,
				'privilegio' => $usuario -> privilegio,
				'pregunta_s' => $usuario -> pregunta_s,
				'activo' => $usuario -> activo,
				'respuesta_s' => $usuario -> respuesta_s
			];
			$this -> vista('Usuarios/editar_usuario', $datos);
		}	
	}

	// Función para eliminar un usuario del sistema.
	public function eliminar_usuario($id_u){
		// Obtener información del usuario
		$datos = [
			'id_u' => $id_u 
		];
		$this -> usuario_modelo -> borrar_usuario($datos);
		if (empty($this -> usuario_modelo -> mensaje)) {
			Helper::redireccionar('/Usuarios/usuarios');
		} else {
			die('Algo salio mal, no se sabe que, chao');
		}	
	}

	public function comprobar_usuario(){
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$datos = [
				'ci' => trim($_POST['ci'])
			];
			$this -> usuario_modelo -> comprobar_usuario_existente($datos);
			if (empty($this -> usuario_modelo -> mensaje)) {
				switch ($this -> usuario_modelo -> resultado_usuario) {
					case '0':
						Helper::redireccionar('/Usuarios/usuarios');
					break;
					
					case '1':
						Helper::redireccionar('/Usuarios/registrar_usuario');
					break;
				}
			} else {
				Helper::redireccionar('/Usuarios/registrar_usuario');
			}			
		} else {
			$this -> vista("Usuarios/comprobar_usuario");
		}			
	}

		

}
