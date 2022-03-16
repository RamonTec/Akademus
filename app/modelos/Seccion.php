<?php

	class Seccion{
		private $db;
		public $mensaje;

		public function __construct(){
			$this -> db = new Base;
			$this -> mensaje = '';
		}

    public function registrar_seccion($datos){
      try {
        $this -> db -> beginTransaction();

        $this -> db -> query("INSERT INTO seccion (nom_sec, cod_sec, turno, cant_estudiantes) VALUES(:nom_sec, :cod_sec, :turno, :cant_estudiantes)");

        $this -> db -> bind(':nom_sec', $datos['nom_sec']);
        $this -> db -> bind(':cod_sec', $datos['cod_sec']);
        $this -> db -> bind(':turno', $datos['turno']);
        $this -> db -> bind(':cant_estudiantes', 0);

        $this -> db -> execute();
        $this -> db -> commit();

      } catch (PDOException $e) {
        $this -> db -> rollBack();
        print "Error!: " . $e -> getMessage() . "</br>";
      }

    }

    public function obtener_secciones() {
      $this -> db -> query("SELECT * from seccion");
			$resultados = $this -> db -> registros();
			return $resultados; 
    }

    public function eliminar_seccion($datos) {
      // Habilitar transacción de eliminación sobre la base de datos.
			try {
        
        $this -> db -> beginTransaction();
				// Consulta a la base de datos si existe un usuario con el id que se recibe desde el formulario.
				$this -> db -> query("SELECT * FROM seccion WHERE id_seccion = :id_seccion");
				$this -> db -> bind(':id_seccion', $datos['id_seccion']);

        $check_seccion = $this -> db -> registro();
        $cant_estudiantes = $check_seccion -> cant_estudiantes;
        
        if($cant_estudiantes == 0) {
          $this -> db -> query("DELETE FROM seccion WHERE id_seccion = :id_seccion");
					$this -> db -> bind(':id_seccion', $datos['id_seccion']);

					$this -> db -> execute();
					$this -> db -> commit();
        } else {

          $this -> db -> query("SELECT * from seccion");
			    $secciones = $this -> db -> registros();

          return [
            'secciones' => $secciones,
            'mensaje' => $this -> mensaje = "Esta seccion tiene estudiantes asignados, no puede ser eliminada"
          ];
        }						

			} catch (PDOException $e) {
				$this -> db -> rollBack();
				print "Error!: " . $e -> getMessage() . "</br>";
			}
    }

    public function editar_seccion($datos){
			try {
        $this -> db -> beginTransaction();

        // no se pueden tener secciones con el mismo codigo y mismo nombre

        $this -> db -> query("UPDATE seccion SET nom_sec = :nom_sec, cod_sec = :cod_sec, turno = :turno WHERE id_seccion = :id_seccion" );

        $this -> db -> bind(':nom_sec', $datos['nom_sec']);
        $this -> db -> bind(':cod_sec', $datos['cod_sec']);
        $this -> db -> bind(':id_seccion', $datos['id_seccion']);
        $this -> db -> bind(':turno', $datos['turno']);

        $this -> db -> execute();
        $this -> db -> commit();
        

      } catch (PDOException $e) {
        $this -> db -> rollBack();
        return [
          'id_seccion' => $datos['id_seccion'],
          'nom_sec' => $datos['nom_sec'],
          'cod_sec' => $datos['cod_sec'],
          'mensaje' => $this -> mensaje = $e -> getMessage()
        ];
				print "Error!: " . $e -> getMessage() . "</br>";
      }
		}

    public function obtener_seccion_por_id($id_seccion){
			$this -> db -> query('SELECT * FROM seccion WHERE id_seccion = :id_seccion');
			$this -> db -> bind(':id_seccion', $id_seccion);

			$fila = $this -> db -> registro();
			return $fila;
		}

    public function obtener_one_section($datos) {

      $this -> db -> query(
        "SELECT
        persona.id_per, 
        persona.ci, persona.pnombre, persona.papellido,
        profesor.tipo_prof, profesor.id_prof,
        seccion.id_seccion, seccion.nom_sec, seccion.cod_sec, seccion.turno,
        seccion_tiene_profesor.id_profesor, seccion_tiene_profesor.id_secc
        FROM profesor 
        INNER JOIN persona ON persona.id_per = profesor.id_prof 
        INNER JOIN seccion_tiene_profesor ON seccion_tiene_profesor.id_profesor = profesor.id_prof
        INNER JOIN seccion ON seccion.id_seccion = seccion_tiene_profesor.id_secc
        WHERE seccion.id_seccion = :id_seccion"
      );

      $this -> db -> bind(':id_seccion', $datos["id_seccion"]);

      $fila = $this -> db -> registro();

      $this -> db -> query(
        "SELECT
        estudiante.id_est, estudiante.pnom, estudiante.pape, estudiante.segape, estudiante.segnom,
        seccion.id_seccion, seccion.nom_sec, seccion.cod_sec
        FROM estudiante
        INNER JOIN seccion_tiene_estudiante ON estudiante.id_est = seccion_tiene_estudiante.id_estudiante 
        INNER JOIN seccion ON seccion.id_seccion = seccion_tiene_estudiante.id_secc
        WHERE seccion_tiene_estudiante.id_secc = :id_seccion"
      );

      $this -> db -> bind(':id_seccion', $datos["id_seccion"]);

			$estudiantes = $this -> db -> registros();

			return [
        "seccion" => $fila,
        "estudiantes" => $estudiantes,
        "mensaje" => ""
      ];
    }

  }
