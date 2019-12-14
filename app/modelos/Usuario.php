<?php
 
	class Usuario{
		private $db; 
		public $mensaje; 
		public $resultado_usuario;

		public function __construct(){
			$this -> db = new Base;
			$this -> mensaje = '';
			$this -> resultado_usuario = '';
		}

		//funcion postgresql con parametros
		public function agregar_usuario($datos){

			// Habilitando las transacciones a la base de datos con el metodo beginTransaction.
			$this -> db -> beginTransaction();

			
				// Insertando registro de usuario -> persona.															
				$this -> db -> query("INSERT INTO persona(ci, pnombre, segnombre, papellido, segapellido, nacionalidad, sexo_p)
						VALUES(:ci, :pnombre, :segnombre, :papellido, :segapellido, :nacionalidad, :sexo_p)");

				// Vinculando valores con el bind para evitar inyección de codigo SQL.
				$this -> db -> bind(':ci', $datos['ci']);
				$this -> db -> bind(':pnombre', $datos['pnombre']);
				$this -> db -> bind(':segnombre', $datos['segnombre']);
				$this -> db -> bind(':papellido', $datos['papellido']);
				$this -> db -> bind(':segapellido', $datos['segapellido']);
        $this -> db -> bind(':nacionalidad', $datos['nacionalidad']);
        $this -> db -> bind(':sexo_p', $datos['nacionalidad']);

				// Ejecutando la consulta con el metodo execute.
				$this -> db -> execute(); 

				// Obteniendo el ultimo id insertado en la tabla persona.
				$id_persona_usuario = $this -> db -> lastInsertId();

				// Insertando el registro de usuario -> cargo
				$this -> db -> query("INSERT INTO cargo(tipo_cargo) VALUES(:tipo_cargo)");

				// Vinculando valores con el bind para evitar inyeccion de codigo SQL.
				$this -> db -> bind(':tipo_cargo', $datos['tipo_cargo']);

				// Ejecutando la consulta con el metodo execute.
				$this -> db -> execute();

				// Obteniendo el ultimo id insertdo en la tabla cargo.
				$id_cargo_usuario = $this -> db -> lastInsertId(); 

				// Insertando el registro de usuario -> usuario
				$this -> db -> query("INSERT INTO usuario(nom_u, clave, privilegio, respuesta_s, 
					pregunta_s, activo, id_pu, id_cu)VALUES(:nom_u, :clave, :privilegio, :respuesta_s, :pregunta_s,
					:activo, :id_pu, :id_cu)");
        print_r($datos);
				// Encriptado de la clave ingresa por el usuario con metodo propio de encriptado.
				$clave_encriptada = Helper::encriptar($datos['clave']);

				// Encriptado de la clave con md5.
				// $clave_encriptada = password_hash($clave_encriptada, PASSWORD_DEFAULT);

				// Encriptado de pregunta de seguridad del usuario con metodo propio de encriptado.
				 $pregunta_encriptada = Helper::encriptar($datos['pregunta_s']);

				// Encriptado de la pregunta de seguridad con md5.
				// $pregunta_encriptada = password_hash($pregunta_encriptada, PASSWORD_DEFAULT);

				// Encriptado de la respuesta secreta ingresada por el usuario con metodo propio.
				$respuesta_encriptada = Helper::encriptar($datos['respuesta_s']);

				// Encriptado con md5.
				// $respuesta_encriptada = password_hash($respuesta_encriptada, PASSWORD_DEFAULT);

				// Vinculando valores con el bind para evitar inyección de codigo SQL.
				$this -> db -> bind(':nom_u', $datos['nom_u']);
				$this -> db -> bind(':clave', $clave_encriptada);
				$this -> db -> bind(':privilegio', $datos['privilegio']);
				$this -> db -> bind(':pregunta_s', $pregunta_encriptada);
				$this -> db -> bind(':respuesta_s', $respuesta_encriptada);
				$this -> db -> bind(':activo', '1');
				$this -> db -> bind(':id_pu', $id_persona_usuario);
				$this -> db -> bind(':id_cu', $id_cargo_usuario);

				// Ejecutando la consulta con el metodo execute.
				$this -> db -> execute();
				// Guardando la consulta con el metodo commit.
				$this -> db -> commit();

			
		}

		// Metodo que se encarga de la validación de datos para la recuperación de usuario
		public function verificarUsuario($datos){
			$this -> db -> query("SELECT * FROM persona WHERE ci = :ci");
			$this -> db -> bind(':ci', $datos['ci']);

			$resultado = $this -> db -> registro();

			if ($resultado == true) {
				
				$resultado_id_usuario = $resultado -> id_per;

				$this -> db -> query("SELECT * FROM usuario WHERE id_pu = :id");
				$this -> db -> bind (':id' , $resultado_id_usuario, PDO::PARAM_INT);

				$resultado_usuario = $this -> db -> registro();
				$resultado_nom_u = $resultado_usuario -> nom_u;
				$resultado_pregunta_s = $resultado_usuario-> pregunta_s;
				$resultado_respuesta_s = $resultado_usuario -> respuesta_s;

				$resultado_pregunta_s = Helper::des($datos['pregunta_s'], $resultado_pregunta_s);
				$resultado_respuesta_s = Helper::des($datos['respuesta_s'], $resultado_respuesta_s);
				
				if ($resultado_pregunta_s == $datos['pregunta_s'] && $resultado_respuesta_s == $datos['respuesta_s']) {
					return $this -> resultado_usuario = $resultado_usuario;
				} else{
					$this -> mensaje = "Pregunta o respuesta incorrecta";
					return false;
				}
			} else {
				$this -> mensaje = "Cedula de identidad erronea, intente con otra o registrese en el sistema";
				return false;
			}
		}

		public function actualizarUsuario($datos){
			try {
				$this -> db -> beginTransaction();

				$nombre_de_usuario = $datos['nombre_viejo'];				

				$this -> db -> query("SELECT * FROM usuario WHERE nom_u = :nom_u");
				$this -> db -> bind(':nom_u', $nombre_de_usuario);

				$actualizar_usuario = $this -> db -> registro();

				if ($actualizar_usuario == true) {
					
					$id_usuario = $actualizar_usuario -> id_u;

					$this -> db -> query("UPDATE usuario SET clave = :clave, nom_u = :nom_u WHERE id_u = :id_u");

					$datos['clave'] = Helper::encriptar($datos['clave']);

					$this -> db -> bind(':id_u', $id_usuario);
					$this -> db -> bind(':clave', $datos['clave']);
					$this -> db -> bind(':nom_u', $datos['nom_u']);
 
					$this -> db -> execute();
					$this -> db -> commit();

					return true;

				} else {
					$this -> mensaje = "Nombre de usuario no valido, ingrese otro o intente registrandose en el sistema";
					return false;
				}			

			} catch (PDOException $e) {
				$this -> db -> rollBack();
				print "Error!: " . $e -> getMessage() . "</br>";
			}
		}

		public function obtener_usuario_director(){
			
			$privilegio_usuario = 'Director';

			$this -> db -> query("SELECT * FROM usuario WHERE privilegio = :privilegio");
			$this -> db ->bind(':privilegio', $privilegio_usuario);

			$privilegio_usuario = $this -> db -> registro();

			if ($privilegio_usuario == true) {
				$this -> mensaje = "Si";
				return true;
			} else{
				$this -> mensaje = "No";
				return false;
			}
		}

		public function obtenerUsuarios(){

			$this -> db -> query("SELECT * from usuario");
			$resultados = $this -> db -> registros();
			return $resultados; 
		} 

		public function comprobar_usuario_existente($datos){
			
			$this -> db -> query('SELECT * FROM persona WHERE ci = :ci');
			$this -> db -> bind(':ci', $datos['ci']);

			$fila = $this -> db -> registro();
			$id_usuario_persona = $fila -> id_per;

			$this -> db -> query('SELECT * FROM usuario WHERE id_pu = :id_pu');
			$this -> db -> bind(':id_pu', $id_usuario_persona);
			
			$usuario_existente = $this -> db -> registro();
			
			if ($usuario_existente == true) {
				// 0 El usuario ya esta registrado.
				return $this -> resultado_usuario = "0";
			} else {
				// 1 El usuario no esta registrado.
				return $this -> resultado_usuario = "1";
			}
			

			return $fila;
		}

		public function editar_usuario_por_sistema($datos){
			$this -> db -> beginTransaction();

			$this -> db -> query("UPDATE usuario SET nom_u = :nom_u, privilegio = :privilegio, clave = :clave, 
				pregunta_s = :pregunta_s, respuesta_s = :respuesta_s WHERE id_u = :id_u" );
 
			$clave_encriptada_edicion = Helper::encriptar($datos['clave']);
			$pregunta_encriptada = Helper::encriptar($datos['pregunta_s']);
			$respuesta_encriptada= Helper::encriptar($datos['respuesta_s']);

			$this -> db -> bind(':id_u', $datos['id_u']);
			$this -> db -> bind(':nom_u', $datos['nom_u']);
			$this -> db -> bind(':privilegio', $datos['privilegio']);
			$this -> db -> bind(':clave', $clave_encriptada_edicion);
			$this -> db -> bind(':pregunta_s', $pregunta_encriptada);
			$this -> db -> bind(':respuesta_s', $respuesta_encriptada);			

			$this -> db -> execute();
			$this -> db -> commit();
		}

		public function obtener_usuario_por_id($id_u){
			$this -> db -> query('SELECT * FROM usuario WHERE id_u = :id_u');
			$this -> db -> bind(':id_u', $id_u);

			$fila = $this -> db -> registro();
			return $fila;
		}
  
		// Metódo para eliminar usuario
		public function borrar_usuario($datos){

			// Habilitar transacción de eliminación sobre la base de datos.
			$this -> db -> beginTransaction();
			try {

				// Consulta para verificar si el usuario es un representante dentro del sistema
				// Sí el usuario no es un representante de algún estudiante, entonces se eliminara
				// tanto de la tabla persona como de la tabla cargo y de la tabla usuario.
				// Caso contrario soló se eliminara de la tabla usuario y de la tabla cargo.

				// Consulta a la base de datos si existe un usuario con el id que se recibe desde el formulario.
				$this -> db -> query("SELECT * FROM usuario WHERE id_u = :id_u");
				$this -> db -> bind(':id_u', $datos['id_u']);

				// Variable que almacena el resultado obtenido de la consulta a la base de datos.
				$registro_persona_usuario = $this -> db -> registro();

				// Variable que almacena el id que relaciona a el usuario y a la persona.
				$id_usuario_persona = $registro_persona_usuario -> id_pu;

				// Consulta a la base de datos si existe una persona con el id obtenido de la consulta anterio.
				$this -> db -> query("SELECT * FROM persona WHERE id_per = :id_pu");
				$this -> db -> bind(":id_pu", $id_usuario_persona);

				// Variable que almacena el registro obtenido.
				$registro_persona_representante_usuario = $this -> db -> registro();

				// Variable que almacena el id que relaciona a una persona y representante.
				$id_persona_representante_usuario = $registro_persona_representante_usuario -> id_per;

				// Consulta a la base de datos donde se ve si hay una relación entre un representante, persona y usuario.
				$this -> db -> query("SELECT * FROM representante WHERE id_rep = :id_per");
				$this -> db -> bind(":id_per", $id_persona_representante_usuario);

				// Variable que almacena el resultado obtenido de la consulta anterior.
				$existe_persona_usuario_representante = $this -> db -> registro();

				// Sí la consulta es igual a un TRUE entonces sólo eliminará en la tabla usuario.
				if ($existe_persona_usuario_representante == true) {

					$this -> db -> query("DELETE FROM usuario WHERE id_u = :id_u");
					$this -> db -> bind(':id_u', $datos['id_u']);

					$this -> db -> execute();
					$this -> db -> commit();
				
				// Caso contrario elimina en cascada desde la tabla persona.
				} else {
					
					$this -> db -> query("DELETE FROM persona WHERE id_per = :id_per");
					$this -> db -> bind(":id_per", $id_persona_representante_usuario);

					$id_usuario_cargo = $registro_persona_usuario -> id_cu;
					$this -> db -> query("DELETE FROM cargo WHERE id_cargo = :id_cu");
					$this -> db -> bind(":id_cu", $id_usuario_cargo);

					$this -> db -> execute();
					$this -> db -> commit();
				}								

			} catch (PDOException $e) {
				$this -> db -> rollBack();
				print "Error!: " . $e -> getMessage() . "</br>";
			}
		}


	}
