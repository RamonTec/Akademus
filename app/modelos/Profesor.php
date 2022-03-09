<?php

	class Profesor{
		private $db;
		public $mensaje;

		public function __construct(){
			$this -> db = new Base;
			$this -> mensaje = '';
		}

    public function comprobar_profesor($datos){

      // Consulta para saber si la persona ya esta registrada
      $this -> db -> query("SELECT * FROM persona WHERE ci = :ci");
      $this -> db -> bind(':ci', $datos['ci']);

      $comprobar_registro_cedula = $this -> db -> registro();

      if ($comprobar_registro_cedula == true) {
        
        $id_persona_profesor = $comprobar_registro_cedula -> id_per;
        $this -> db -> query("SELECT * FROM profesor WHERE id_prof = :id_per");
        $this -> db -> bind(':id_per', $id_persona_profesor);

        $comprobar_representante_persona = $this -> db -> registro();
 
        if ($comprobar_representante_persona == true) {
          // Persona y profesor registrada
          $this -> registro = "0";
          return true;
        } else {
          // Persona registrada pero no como representante (Puede ser representante)
          $this -> registro = "1";
          return true;
        }      
      } else {
        // Persona no registrada y tampoco como profesor y menos como representante
        $this -> registro = "2";
        return true;
      }                  
    }

    // Metodo para registrar a profesor que es una persona
    public function registrar_profesor($datos){
      
      try {

        $this -> db -> beginTransaction();

				$ci_persona = $datos['ci_per'];				

				$this -> db -> query("SELECT * FROM persona WHERE ci = :ci_per");
				$this -> db -> bind(':ci_per', $ci_persona);

				$registrar_persona = $this -> db -> registro();

        if($registrar_persona == true) {
          $ci_persona_usuario = $registrar_persona -> id_per;

          $this -> db -> query("INSERT INTO profesor (cod_prof, tipo_prof, id_prof) VALUES(:cod_prof, :tipo_prof, :id_prof)");
          $this -> db -> bind(":tipo_prof", $datos['tipo_prof']);
          $this -> db -> bind(":cod_prof", $datos['cod_prof']);
          $this -> db -> bind(":id_prof", $ci_persona_usuario);

          $this -> db -> execute();
          $this -> db -> commit();

        } else {
          $this -> db -> rollBack();
          print "Error!: " . $e -> getMessage() . "</br>";
          return $this -> mensaje = 'Error';
        }

      } catch (PDOException $e) {
				$this -> db -> rollBack();
        print "Error!: " . $e -> getMessage() . "</br>";
        return $this -> mensaje = 'Error';
			}              
    }

    public function obtener_profesores(){
			$this -> db -> query(
        "SELECT 
        persona.ci, persona.pnombre, persona.papellido, persona.sexo_p, persona.nacionalidad, 
        profesor.tipo_prof, profesor.cod_prof, profesor.id_prof
        FROM persona 
        INNER JOIN profesor 
        ON persona.id_per = profesor.id_prof ");
			$resultados = $this -> db -> registros();
			return $resultados; 
		}

    // Metódo para eliminar profesor
		public function borrar_profesor($datos){

			// Habilitar transacción de eliminación sobre la base de datos.
			$this -> db -> beginTransaction();
			try {

				// Consulta para verificar si el usuario es un representante dentro del sistema
				// Sí el usuario no es un representante de algún estudiante, entonces se eliminara
				// tanto de la tabla persona como de la tabla cargo y de la tabla usuario.
				// Caso contrario soló se eliminara de la tabla usuario y de la tabla cargo.

				// Consulta a la base de datos si existe un usuario con el id que se recibe desde el formulario.
				$this -> db -> query("SELECT * FROM profesor WHERE id_prof = :id_prof");
				$this -> db -> bind(':id_prof', $datos['id_prof']);

				// Variable que almacena el resultado obtenido de la consulta a la base de datos.
				$registro_persona_profesor = $this -> db -> registro();

				// Variable que almacena el id que relaciona a el profesor y a la persona.
				$id_profesor_persona = $registro_persona_profesor -> id_prof;

				// Consulta a la base de datos si existe una persona con el id obtenido de la consulta anterio.
				$this -> db -> query("SELECT * FROM persona WHERE id_per = :id_prof");
				$this -> db -> bind(":id_prof", $id_profesor_persona);

				// Variable que almacena el registro obtenido.
				$registro_persona_representante_profesor = $this -> db -> registro();

				// Variable que almacena el id que relaciona a una persona y representante.
				$id_persona_representante_profesor = $registro_persona_representante_profesor -> id_per;

				// Consulta a la base de datos donde se ve si hay una relación entre un representante, persona y usuario.
				$this -> db -> query("SELECT * FROM representante WHERE id_rep = :id_per");
				$this -> db -> bind(":id_per", $id_persona_representante_profesor);

				// Variable que almacena el resultado obtenido de la consulta anterior.
				$existe_persona_usuario_representante = $this -> db -> registro();

				// Sí la consulta es igual a un TRUE entonces sólo eliminará en la tabla profesor.
				if ($existe_persona_usuario_representante == true) {

					$this -> db -> query("DELETE FROM persona WHERE id_prof = :id_prof");
					$this -> db -> bind(':id_prof', $datos['id_prof']);

					$this -> db -> execute();
					$this -> db -> coomit();
				
				// Caso contrario elimina en cascada desde la tabla persona.
				} else {
					
					$this -> db -> query("DELETE FROM persona WHERE id_per = :id_per");
					$this -> db -> bind(":id_per", $id_persona_representante_profesor);

					$this -> db -> execute();
					$this -> db -> commit();
				}								

			} catch (PDOException $e) {
				$this -> db -> rollBack();
				print "Error!: " . $e -> getMessage() . "</br>";
			}
		}

    public function registrarSeccion($datos){
      try {
        $this -> db -> beginTransaction();

        $this -> db -> query("INSERT INTO seccion (nombre, cod_seccion) VALUES(:nombre, :cod_seccion)");

        $this -> db -> bind(':nombre', $datos['nombre']);
        $this -> db -> bind(':cod_seccion', $datos['cod_seccion']);

        $this -> db -> execute();
        $this -> db -> commit();

      } catch (PDOException $e) {
        $this -> db -> rollBack();
        print "Error!: " . $e -> getMessage() . "</br>";
      }
    }

  }
