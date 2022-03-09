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

        $this -> db -> query("SELECT * FROM seccion WHERE nom_sec = :nom_sec");		
				$this -> db -> bind(":nom_sec" , $datos['nom_sec']);

        $check_seccion_existe = $this -> db -> registro();

        if($check_seccion_existe == true) {

          if($datos['cod_sec'] == $check_seccion_existe -> cod_sec) {
            return $this -> mensaje = "Este codigo ya fue registrado";
          } else if($datos['nom_sec'] == $check_seccion_existe -> nom_sec) {
            return $this -> mensaje = "Esta seccion ya fue registrada";
          }

        } else {

          $this -> db -> query("INSERT INTO seccion (nom_sec, cod_sec) VALUES(:nom_sec, :cod_sec)");

          $this -> db -> bind(':nom_sec', $datos['nom_sec']);
          $this -> db -> bind(':cod_sec', $datos['cod_sec']);

          $this -> db -> execute();
          $this -> db -> commit();

        }

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

        $this -> db -> query("UPDATE seccion SET nom_sec = :nom_sec, cod_sec = :cod_sec WHERE id_seccion = :id_seccion" );

        $this -> db -> bind(':nom_sec', $datos['nom_sec']);
        $this -> db -> bind(':cod_sec', $datos['cod_sec']);
        $this -> db -> bind(':id_seccion', $datos['id_seccion']);		

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

  }
