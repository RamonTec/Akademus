<?php
 
	class Session{ 

		private $db; 
		public $mensaje;

		public function __construct(){

			$this -> db = new Base;
			$this -> mensaje = '';

		}

		public function validar_usuario($datos){		
			try {		
				$this -> db -> query("SELECT * FROM usuario WHERE nom_u = :nom_u");		
				$this -> db -> bind(":nom_u" , $datos['nom_u']);		
				if ($resultado = $this -> db -> registro()) {
					
					$clave_encriptada = $resultado -> clave;
					$clave_usuario = $datos['clave'];
					$clave_des_encriptada = Helper::des($clave_usuario, $clave_encriptada);
					
					if ($clave_des_encriptada == $datos['clave']) {	
						session_start();
						$_SESSION['nom_u'] = $resultado -> nom_u;
						$_SESSION['privilegio'] = $resultado -> privilegio;
						$_SESSION['id_usuario'] = $resultado -> id_u;

						date_default_timezone_set('America/Caracas');
						$fecha_actual = date('m/d/Y g:ia');

						$this -> db -> beginTransaction();

						$this -> db -> query("UPDATE usuario SET ultima_s = :ultima_s WHERE nom_u = :nom_u");
						$this -> db -> bind(':nom_u', $datos['nom_u']);
						$this -> db -> bind(':ultima_s', $fecha_actual);

						$this -> db -> execute();
						$this -> db -> commit();

						return true;
					} else {
						$this -> mensaje = "Contraseña incorrecta";
						return true;
					}
				} else {
					$this -> mensaje = "Usuario incorrecto";
					return true;
				}
			} catch (PDOException $ex) {
				$this -> db -> rollBack();
				print "Error!: " . $ex -> getMessage() . "</br>";
				return false;
			}
		}

		//Metodo que obtiene el total de usuarios registrados en el sistema
		public function obtenerUsuarios(){			
			$this -> db -> query("SELECT COUNT(*) FROM usuario");			
			$resultados = $this -> db -> registro();
			$total = $resultados;
			return $total; 
		}

	}
