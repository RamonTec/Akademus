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

			try {
				
        // checkeo al representante y obtengo el id de la persona por medio de la ci
				$this -> db -> query("SELECT * FROM persona WHERE ci = :ci");
				$this -> db -> bind(':ci', $datos['ci']);

				$resultado_persona = $this -> db -> registro();

				// Si aparece significa que ya fue registrada la ci, puede ser un usuario, profesor o representante
				if($resultado_persona == true) {

					// checkeo el caso de que sea un representante
					$this -> db -> query("SELECT * FROM representante WHERE id_rep_per = :id_rep_per");
					$this -> db -> bind(':id_rep_per', $resultado_persona -> id_per);

					$resultado_representante = $this -> db -> registro();

					// Si hay un resultado significa que ya el representante fue registrado sin importar que sea un usuario o profesor
					// no tengo que registrar nada, solo mando a registrar datos del estudiante
					if($resultado_representante == true) {
						$_SESSION['id_representante'] = $resultado_representante -> id_rep;
						return [
							"mensaje" => $this -> mensaje = "1",
							"ci_representante" => $resultado_persona -> ci,
							"id_per" => $resultado_persona -> id_per,
							"id_representante" => $resultado_representante -> id_rep,
							"id_rep_per" => $resultado_representante -> id_rep_per,
							"pnombre" => $resultado_persona -> pnombre,
							"papellido" => $resultado_persona -> papellido
						];
						

						// Caso contrario significa que la cedula esta registrada a un usuario o profesor, en este caso mando a registrar
						// cosas del representante
					} else {
						return [
							"mensaje" => $this -> mensaje = "2",
							"ci_representante" => $resultado_persona -> ci,
							"id_per" => $resultado_persona -> id_per,
							"pnombre" => $resultado_persona -> pnombre,
							"papellido" => $resultado_persona -> papellido
						];
					}

					// Si no sale un ci significa que es un representante nuevo y por tanto registro al representante primero
				} else {
					return [
						"mensaje" => $this -> mensaje = "0"
					];
				}
				  
			} catch (PDOException $e) {
        return [
          'mensaje' => $this -> mensaje = $e -> getMessage()
        ];
			}  
		}

		public function insertar_estudiante($datos){
			
			try {
				
				$this -> db -> beginTransaction();

				//Insertar datos en la tabla estudiante para el registro de estudiante
				$this -> db -> query("INSERT into estudiante (ci_escolar, fecha_n, 
				lugar_n, sexo, pnom, segnom, pape, segape, pariente_representate, nacionalidad_e, id_representante, asignado) 
				VALUES(:ci_escolar, :fecha_n, :lugar_n, :sexo, :pnom, :segnom, 
				:pape, :segape, :pariente_representate, :nacionalidad_e, :id_representante, :asignado)");

				$this -> db -> bind(':ci_escolar', $datos['ci_escolar']);
				$this -> db -> bind(':fecha_n', $datos['fecha_n']);
				$this -> db -> bind(':lugar_n', $datos['lugar_n']);
				$this -> db -> bind(':nacionalidad_e', $datos['nacionalidad_e']);
				$this -> db -> bind(':sexo', $datos['sexo']);
				$this -> db -> bind(':pnom', $datos['pnom']);
				$this -> db -> bind(':segnom', $datos['segnom']);
				$this -> db -> bind(':pape', $datos['pape']);
				$this -> db -> bind(':segape', $datos['segape']);
				$this -> db -> bind(':pariente_representate', $datos['pariente_representate']);
				$this -> db -> bind(':id_representante', $_SESSION['id_representante']);
				$this -> db -> bind(':asignado', '0');
				$this -> db -> execute();
				$id_estudiante = $this -> db -> lastInsertId();

				$_SESSION['id_estudiante'] = $id_estudiante;

				// Para tabla salud
				$this -> db -> query("INSERT INTO salud (condicion_s, obervacion_s) 
				VALUES(:condicion_s, :obervacion_s)");
				$this -> db -> bind(':condicion_s', $datos['condicion_s']);			
				$this -> db -> bind(':obervacion_s', $datos['obervacion_s']);

				$this -> db -> execute();
				$id_salud = $this -> db -> lastInsertId();

				// Para tabla estudiante_padece_salud
				$this -> db -> query("INSERT INTO estudiante_padece_salud (id_eps, id_sep) 
				VALUES(:id_eps, :id_sep)");
				$this -> db -> bind(':id_eps', $id_estudiante);			
				$this -> db -> bind(':id_sep', $id_salud);
				$this -> db -> execute();

				// Para tabla representante_representa_estudiante
				$this -> db -> query("INSERT INTO representante_representa_estudiante (id_rer, id_err) 
				VALUES(:id_rer, :id_err)");
				$this -> db -> bind(':id_rer', $_SESSION['id_representante']);			
				$this -> db -> bind(':id_err', $id_estudiante);
				$this -> db -> execute();

				$fecha_inscripcion = date('m/d/Y g:ia');

				$this -> db -> query("INSERT INTO usuario_inscribe_estudiante (id_uu, id_uie, fecha_ins) 
				VALUES(:id_uu, :id_uie, :fecha_ins)");
				$this -> db -> bind(':id_uu', $datos['usuario']);			
				$this -> db -> bind(':id_uie', $id_estudiante);
				$this -> db -> bind(':fecha_ins', $fecha_inscripcion);
				
				$this -> db -> execute();
				$this -> db -> commit();

			} catch (PDOException $e) {
        $this -> db -> rollBack();
        return [
					'ci_escolar' => $datos["ci_escolar"],
					'tipo_est' => $datos["tipo_est"],
					'fecha_n' => $datos["fecha_n"],
					'lugar_n' => $datos["lugar_n"],
					'nacionalidad_e' => $datos["nacionalidad_e"],
					'sexo' => $datos["sexo"],
					'pnom' => $datos["pnom"],
					'segnom' => $datos["segnom"],
					'pape' => $datos["pape"],
					'segape' => $datos["segape"],
					'condicion_s' => $datos["condicion_s"],
					'obervacion_s' => $datos["obervacion_s"],
					'pariente_representate' => $datos["pariente_representate"],
          'mensaje' => $this -> mensaje = $e -> getMessage()
        ];
      }
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

		// Metodo para asignar profesores a las secciones
    public function asignar_estudiante($datos) {
      try {
        
        $this -> db -> beginTransaction();

				$this -> db -> query("SELECT * FROM estudiante WHERE ci_escolar = :ci_escolar");
				$this -> db -> bind(':ci_escolar', $datos['ci_escolar']);

				$estudiante = $this -> db -> registro();

				$this -> db -> query("SELECT * FROM seccion WHERE id_seccion = :id_seccion");
				$this -> db -> bind(':id_seccion', $datos['id_seccion']);

				$seccion = $this -> db -> registro();

        // Insertando registro de usuario -> persona.															
        $this -> db -> query("INSERT INTO seccion_tiene_estudiante(id_estudiante, id_secc)
        VALUES(:id_estudiante, :id_secc)");

        // Vinculando valores con el bind para evitar inyección de codigo SQL.
        $this -> db -> bind(':id_estudiante', $estudiante -> id_est);
        $this -> db -> bind(':id_secc', $datos['id_seccion']);

        // Ejecutando la consulta con el metodo execute.
        $this -> db -> execute();

        $this -> db -> query("UPDATE estudiante SET asignado = :asignado
          WHERE ci_escolar = :ci_escolar
        ");

        $this -> db -> bind(':asignado', 1);	
        $this -> db -> bind(':ci_escolar', $datos['ci_escolar']);

				$this -> db -> execute();

				$this -> db -> query("UPDATE seccion SET cant_estudiantes = :cant_estudiantes
          WHERE id_seccion = :id_seccion
        ");

				$incrementar = ++$seccion -> cant_estudiantes;

        $this -> db -> bind(':cant_estudiantes', $incrementar);	
        $this -> db -> bind(':id_seccion', $datos['id_seccion']);

        $this -> db -> execute();
        $this -> db -> commit(); 

      } catch (PDOException $e) {
        $this -> db -> rollBack();
        return [
          'mensaje' => $this -> mensaje = $e -> getMessage()
        ];
				print "Error!: " . $e -> getMessage() . "</br>";
      }
    }

		
  }
