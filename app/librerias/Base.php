<?php
	//Clase para conectarse a la base de datos y ejecutar consultas
	class Base{
		private $host = DB_HOST;
		private $usuario = DB_USUARIO;
		private $password = DB_PASSWORD;
		private $nombre_base = DB_NOMBRE;
		// private $port = DB_PORT; . ';port=' . $this -> port

		private $dbh;
		private $stmt;
		private $error; 

		public function __construct(){
			//Configurar la conexion
			$dsn = 'mysql:host=' . $this -> host . ';dbname=' . $this -> nombre_base;
			$opciones = array(
				PDO::ATTR_PERSISTENT => true,
				PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
			);

			//Crear una instancia de PDO
			try {
				$this -> dbh = new PDO($dsn, $this -> usuario, $this -> password, $opciones);
				$this -> dbh -> client_encoding = 'LATIN1';
			} catch (PDOException $e) {
				$this -> error = $e -> getMessage();
				echo $this->error;
			}
		}


		//Prepara la consulta
		public function query($sql){
			$this -> stmt = $this -> dbh -> prepare($sql);
		}

		//Vincula la consulta con bind
		public function bind($parametro, $valor, $tipo = null){
			if (is_null($tipo)) {
				switch (true) {
					case is_int($valor):
						$tipo = PDO::PARAM_INT;
					break;

					case is_bool($valor):
						$tipo = PDO::PARAM_BOOL;
					break;

					case is_null($valor):
						$tipo = PDO::PARAM_NULL;
					break;

					default:
						$tipo = PDO::PARAM_STR;
					break;
				}
			}
			$this -> stmt -> bindValue($parametro, $valor, $tipo);
		}

		//Ejecuta la consulta
		public function execute(){
			return $this -> stmt -> execute();
		}

		//Obtener los registros
		public function registros(){
			$this -> execute();
			return $this -> stmt -> fetchAll(PDO::FETCH_OBJ);
		}

		//Obtener un unico registro
		public function registro(){
			$this -> execute();
			return $this -> stmt -> fetch(PDO::FETCH_OBJ);
		}

		//Obtener la cantidad de filas con el metodo rowCount
		public function rowCount(){
			return $this -> stmt -> rowCount();
		}

		//Metodo para empezar una transaccion
		public function beginTransaction(){
			$this -> dbh -> beginTransaction();
		}

		//Metodo para procesar transacciones
		public function commit(){
			$this -> dbh -> commit();
		}

		//Metodo para recuperar la clave primaria de auto incremento
		public function lastInsertId(){
			return $this -> dbh -> lastInsertId();
		}

		//Metodo para recuperar consultas en caso de error
		public function rollBack(){
			$this -> dbh -> rollback();
		}

		public function pg_affected_rows(){
			$this -> dbh -> pg_affected_rows();
		}

		public function pg_connection_busy(){
			$this -> dbh -> pg_connection_busy();
		}

		public function pg_convert(){
			$this -> dbh -> pg_convert();
		}

		public function pg_get_notify(){
			$this -> dbh -> pg_get_notify();
		}

		public function pg_get_pid(){
			$this -> dbh -> pg_get_pid();
		}

		public function pg_last_error(){
			$this -> dbh -> pg_last_error();
		}

		public function pg_socket(){
			$this -> dbh -> pg_socket();
		}

		public function pg_select(){
			$this -> dbh -> pg_select();
		}

		public function cerrar_session(){
			session_destroy();
		}

	}