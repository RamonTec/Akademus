<?php 
  
	class Estudiante{ 
		private $db;
		public $mensaje;
		public $registro;

		public function __construct(){
			$this -> db = new Base;
			$this -> mensaje = '';
			$this -> registro = '';
		}
 
		public function comprobarEstudiante($datos){
			$this -> db -> query("SELECT * FROM estudiante WHERE ci_est = :ci_est");
			$this -> db -> bind(':ci_est', $datos['ci_est']);

			$resultado = $this -> db -> registro();

			if ($resultado == true) {
				return $this -> registro = 0;
	    } else {
				return $this -> registro = 1;
	    }
		}

		public function insertar_estudiante($datos){
			
			$this -> db -> beginTransaction();

			$this -> db -> query("INSERT INTO pais (nom_pais) VALUES(:nom_pais)");
			$this -> db -> bind(':nom_pais', $datos['nom_pais']);
			$this -> db -> execute();
			$id_pais = $this -> db -> lastInsertId();

			$this -> db -> query("INSERT INTO estado (nom_estado, id_ep) VALUES(:nom_estado, :id_ep)");
			$this -> db -> bind(':nom_estado', $datos['nom_estado']);
			$this -> db -> bind(':id_ep', $id_pais);
			$this -> db -> execute();
			$id_estado = $this -> db -> lastInsertId();

			$this -> db -> query("INSERT INTO municipio (nombre_muni, id_em) VALUES(:nombre_muni, :id_em)");
			$this -> db -> bind(':nombre_muni', $datos['nombre_muni']);
			$this -> db -> bind(':id_em', $id_estado);
			$this -> db -> execute();
			$id_municipio = $this -> db -> lastInsertId();

			$this -> db -> query("INSERT INTO direccion (n_casa, pto_ref, calle, sector, id_md) 
			VALUES(:n_casa, :pto_ref, :calle, :sector, :id_md)");
			$this -> db -> bind(':n_casa', $datos['n_casa']);
			$this -> db -> bind(':pto_ref', $datos['pto_ref']);
			$this -> db -> bind(':calle', $datos['calle']);
			$this -> db -> bind(':sector', $datos['sector']);			
			$this -> db -> bind(':id_md', $id_municipio);
			$this -> db -> execute();
			$id_direccion = $this -> db -> lastInsertId();

			$this -> db -> query("INSERT INTO institucionDeProcedencia (nom_pro, cod_dea) VALUES(:nom_pro, :cod_dea)");
			$this -> db -> bind(':nom_pro', $datos['nom_pro']);
			$this -> db -> bind(':cod_dea', $datos['cod_dea']);
			$this -> db -> execute();
			$id_institucion = $this -> db -> lastInsertId();

			//Insertar datos en la tabla estudainte para el registro de estudiante
			$this -> db -> query("INSERT into estudiante (ci_est, ci_escolar, pasaporte, ci_diplomatica, tipo_est, fecha_n, 
			lugar_n, sexo, pnom, segnom, otrosnom, pape, segape, otrosape, id_de, id_poe, nacionalidad_e) 
			VALUES(:ci_est, :ci_escolar, :pasaporte, :ci_diplomatica, :tipo_est, :fecha_n, :lugar_n, :sexo, :pnom, :segnom, 
			:otrosnom, :pape, :segape, :otrosape, :id_de, :id_poe, :nacionalidad_e)");

			$this -> db -> bind(':ci_est', $datos['ci_est']);
			$this -> db -> bind(':ci_escolar', $datos['ci_escolar']);
			$this -> db -> bind(':pasaporte', $datos['pasaporte']);
			$this -> db -> bind(':ci_diplomatica', $datos['ci_diplomatica']);
			$this -> db -> bind(':tipo_est', $datos['tipo_est']);
			$this -> db -> bind(':fecha_n', $datos['fecha_n']);
			$this -> db -> bind(':lugar_n', $datos['lugar_n']);
			$this -> db -> bind(':nacionalidad_e', $datos['nacionalidad_e']);
			$this -> db -> bind(':sexo', $datos['sexo']);
			$this -> db -> bind(':pnom', $datos['pnom']);
			$this -> db -> bind(':segnom', $datos['segnom']);
			$this -> db -> bind(':otrosnom', $datos['otrosnom']);
			$this -> db -> bind(':pape', $datos['pape']);
			$this -> db -> bind(':segape', $datos['segape']);
			$this -> db -> bind(':otrosape', $datos['otrosape']);
			$this -> db -> bind(':id_de', $id_direccion);
			$this -> db -> bind(':id_poe', $id_institucion);
			 
			$this -> db -> execute();
			$this -> db -> commit();
		}

		public function obtenerEstudiantes(){
			$this -> db -> query("SELECT * from estudiante");
			$resultados = $this -> db -> registros();
			return $resultados;
		}

		public function obtener_estudiante_perfil($ci_est){
			$this -> db -> query("SELECT * FROM estudiante WHERE ci_est = :ci_est");
			$this -> db -> bind(':ci_est', $ci_est);
			$fila = $this -> db -> registro();
			return $fila;
		}

		
  }
