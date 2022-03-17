<?php
   
	class Representante{
    private $db;
    public $mensaje;
    public $registro;

		public function __construct(){
			$this -> db = new Base;
      $this -> mensaje = '';
      $this -> registro = '';
    }
    
    // Método para comprobar el tipo de representante a registrar
    /*
      Casos:
        -1  Registro de representante normal principal/secundario (Persona, profesión, dirección, telefono, email).
        -2  Registro de usuario - representante (Profesión, dirección, telefono, email).
        -3  Registro de profesor - representante (Profesión, dirección, telefono, email).
    */ 
    public function comprobar_representante($datos){

      // Consulta para saber si la persona ya esta registrada
      $this -> db -> query("SELECT * FROM persona WHERE ci = :ci");
      $this -> db -> bind(':ci', $datos['ci']);

      $comprobar_registro_cedula = $this -> db -> registro();

      if ($comprobar_registro_cedula == true) {
        
        $id_persona_representante = $comprobar_registro_cedula -> id_per;
        $this -> db -> query("SELECT * FROM representante WHERE id_rep = :id_per");
        $this -> db -> bind(':id_per', $id_persona_representante);

        $comprobar_representante_persona = $this -> db -> registro();
 
        if ($comprobar_representante_persona == true) {
          // Persona y representante registrada
          $this -> registro = "0";
          return true;
        } else {
          // Persona registrada pero no como representante (Puede ser profesor ó usuario)
          $this -> registro = "1";
          return true;
        }      
      } else {
        // Persona no registrada y tampoco como representante
        $this -> registro = "2";
        return true;
      }                  
    }

    // Metodo para registrar a representante: para cuando se trate de un profesor o usuario previamente registrados en 
    // la plataforma
    public function registrar_representante($datos){
      
      try {

        // Consulta para saber si la persona ya esta registrada
        $this -> db -> query("SELECT * FROM persona WHERE ci = :ci");
        $this -> db -> bind(':ci', $datos['ci']);

        $get_ci_representante = $this -> db -> registro();

        $this -> db -> beginTransaction();

        $this -> db -> query("INSERT INTO pais (nom_pais) VALUES(:nom_pais)");
        $this -> db -> bind(":nom_pais", $datos['nom_pais']);

        $this -> db -> execute();
        $id_pais = $this -> db -> lastInsertId();

        $this -> db -> query("INSERT INTO estado (nom_estado, id_ep) VALUES(:nom_estado, :id_ep)");
        $this -> db -> bind(":nom_estado", $datos['nom_estado']);
        $this -> db -> bind(":id_ep", $id_pais);

        $this -> db -> execute();
        $id_estado = $this -> db -> lastInsertId();

        $this -> db -> query("INSERT INTO municipio (nombre_muni, id_em ) VALUES(:nombre_muni, :id_em)");
        $this -> db -> bind(":nombre_muni", $datos['nombre_muni']);
        $this -> db -> bind(":id_em", $id_estado);
        $this -> db -> execute();
        $id_municipio = $this -> db -> lastInsertId();

        $this -> db -> query("INSERT INTO direccion (pto_ref, id_md) 
        VALUES(:pto_ref, :id_md)");
        $this -> db -> bind(":pto_ref", $datos['pto_ref']);
        $this -> db -> bind(":id_md", $id_municipio);
        $this -> db -> execute();
        $id_direccion_persona_representante = $this -> db -> lastInsertId();

        $this -> db -> query("INSERT INTO profesion_u_oficio (nom_po) 
        VALUES(:nom_po)");
        $this -> db -> bind(":nom_po", $datos['nom_po']);
        $this -> db -> execute();
        $id_profesion_persona_representante = $this -> db -> lastInsertId();

        $this -> db -> query("INSERT INTO representante (id_rep_per, id_pr, id_dr)
        VALUES(:id_rep_per, :id_pr, :id_dr)");
        $this -> db -> bind(":id_pr", $id_profesion_persona_representante);
        $this -> db -> bind(":id_dr", $id_direccion_persona_representante);
        $this -> db -> bind(":id_rep_per", $get_ci_representante -> id_per);
        $this -> db -> execute();

        $id_representante_telefono = $this -> db -> lastInsertId();

        $this -> db -> query("INSERT INTO telefono (numero1, id_te) 
        VALUES(:numero1, :id_te)");
        $this -> db -> bind(":numero1", $datos['numero1']);
        $this -> db -> bind("id_te", $id_representante_telefono);
        $this -> db -> execute();

        $this -> db -> execute();
        $this -> db -> commit();


      } catch (PDOException $e) {
				$this -> db -> rollBack();
        print "Error!: " . $e -> getMessage() . "</br>";
        return $this -> mensaje = 'Error';
			}              

    }

    public function registrar_representante_persona($datos) {
      $this -> db -> beginTransaction();
      
      try {
        
        $this -> db -> query("INSERT INTO persona (ci, pnombre, segnombre, papellido, segapellido, 
          nacionalidad, sexo_p) VALUES(:ci, :pnombre, :segnombre, :papellido, :segapellido, :nacionalidad,
          :sexo_p)");
        $this -> db -> bind(":ci", $datos['ci']);
        $this -> db -> bind(":pnombre", $datos['pnombre']);
        $this -> db -> bind(":segnombre", $datos['segnombre']);
        $this -> db -> bind(":papellido", $datos['papellido']);
        $this -> db -> bind(":segapellido", $datos['segapellido']);
        $this -> db -> bind(":nacionalidad", $datos['nacionalidad']);
        $this -> db -> bind(":sexo_p", $datos['sexo_p']);

        $this -> db -> execute();
        $id_persona_representante = $this -> db -> lastInsertId();

        $this -> db -> query("INSERT INTO pais (nom_pais) VALUES(:nom_pais)");
        $this -> db -> bind(":nom_pais", $datos['nom_pais']);
        $this -> db -> execute();
        $id_pais = $this -> db -> lastInsertId();

        $this -> db -> query("INSERT INTO estado (nom_estado, id_ep) VALUES(:nom_estado, :id_ep)");
        $this -> db -> bind(":nom_estado", $datos['nom_estado']);
        $this -> db -> bind(":id_ep", $id_pais);
        $this -> db -> execute();
        $id_estado = $this -> db -> lastInsertId();

        $this -> db -> query("INSERT INTO municipio (nombre_muni, id_em ) VALUES(:nombre_muni, :id_em)");
        $this -> db -> bind(":nombre_muni", $datos['nombre_muni']);
        $this -> db -> bind(":id_em", $id_estado);
        $this -> db -> execute();
        $id_municipio = $this -> db -> lastInsertId();

        $this -> db -> query("INSERT INTO direccion (pto_ref,id_md) 
        VALUES(:pto_ref, :id_md)");
        $this -> db -> bind(":pto_ref", $datos['pto_ref']); 
        $this -> db -> bind(":id_md", $id_municipio);
        $this -> db -> execute();
        $id_direccion_persona_representante = $this -> db -> lastInsertId();

        $this -> db -> query("INSERT INTO profesion_u_oficio (nom_po) 
        VALUES(:nom_po)");
        $this -> db -> bind(":nom_po", $datos['nom_po']);
        $this -> db -> execute();
        $id_profesion_persona_representante = $this -> db -> lastInsertId();

        $this -> db -> query("INSERT INTO representante (id_rep_per, id_pr, id_dr)
        VALUES(:id_rep_per, :id_pr, :id_dr)");
        $this -> db -> bind(":id_rep_per", $id_persona_representante);
        $this -> db -> bind(":id_pr", $id_profesion_persona_representante);
        $this -> db -> bind(":id_dr", $id_direccion_persona_representante);
        $this -> db -> execute();

        $id_representante_telefono = $this -> db -> lastInsertId();

        $this -> db -> query("INSERT INTO telefono (numero1, id_te) 
        VALUES(:numero1, :id_te)");
        $this -> db -> bind(":numero1", $datos['numero1']);
        $this -> db -> bind("id_te", $id_representante_telefono);
        $this -> db -> execute();

        $this -> db -> commit();


      } catch (PDOException $e) {
				$this -> db -> rollBack();
        print "Error!: " . $e -> getMessage() . "</br>";
        return $this -> mensaje = 'Error';
			} 
    }
 
    // Metodo para mostrar a todos los representantes
    public function obtener_representante(){
      $this -> db -> query(
        "SELECT 
        persona.ci, persona.pnombre, persona.papellido, persona.sexo_p, persona.nacionalidad,
        persona.id_per
        FROM persona 
        INNER JOIN representante 
        ON persona.id_per = representante.id_rep_per ");

        $resultados = $this -> db -> registros();

        return $resultados; 
    }

    public function borrar_representante($datos) {
      try {
        
        $this -> db -> beginTransaction();
        // Necesito verificar ciertos casos:
        /*
          El representante puede ser un profesor o un usuario previamente registrados en la plataforma
          Si es un profesor o un usuario y si no tiene estudiantes registrados procedo a eliminar
          la informacion relacionada solo del representante

          Si el representante tiene algun estudiante registrado entonces no puede eliminar al representante

          Si el representante no es ni usuario o profesor procedo a eliminar todo lo relacionado al representante
        */

        // Consulta para saber si la persona ya esta registrada
        $this -> db -> query("SELECT * FROM persona WHERE id_per = :id_per");
        $this -> db -> bind(':id_per', $datos['ci_representante']);

        $get_ci_representante = $this -> db -> registro();

        // Si existe verifico si tiene algun estudiante registrado
        if($get_ci_representante == true) {

          // Obtengo informacion del representante para obtener llave primaria y poder consultar si tiene estudiante registrado
          $this -> db -> query("SELECT * FROM representante WHERE id_rep_per = :id_rep_per");
          $this -> db -> bind(':id_rep_per', $get_ci_representante -> id_per);

          $get_id_representante = $this -> db -> registro();
          
          $this -> db -> query("SELECT * FROM estudiante WHERE id_representante = :id_representante");
          $this -> db -> bind(':id_representante', $get_id_representante -> id_rep_per);

          $get_estudiante_representado = $this -> db -> registro();

          // Si existe significa que el representante tiene un estudiante inscrito, por lo tanto no se puede eliminar
          if($get_estudiante_representado == true) {

            return  [
              'mensaje' => 'No se puede eliminar, tiene estudiantes registrados'
            ];

            // Si no aparece algun estudiante significa que se puede eliminar el representante
          } else {


            $this -> db -> query("DELETE * FROM representante WHERE id_rep_per = :id_rep_per");
            $this -> db -> bind(':id_rep_per', $get_id_representante -> id_rep_per);

            $this -> db -> execute();

            $this -> db -> query("DELETE * FROM persona WHERE id_per = :id_per");
            $this -> db -> bind(':id_per', $get_ci_representante -> id_per);

            $this -> db -> execute();

            $this -> db -> commit();
          }
        }

      } catch (PDOException $e) {
				$this -> db -> rollBack();
        return [
          'mensaje' => $e -> getMessage()
        ];
			}
    }

    public function get_estudiantes_by_reprepresentante($datos) {

      $this -> db -> beginTransaction();

        // inner join para: representante, persona, estudiante, seccion
        $this -> db -> query(
          "SELECT
          persona.id_per, 
          persona.ci, persona.pnombre, persona.papellido, persona.segapellido, persona.segnombre, persona.sexo_p, persona.nacionalidad,
          representante.id_rep_per, representante.id_rep
          FROM persona 
          INNER JOIN representante ON persona.id_per = representante.id_rep_per
          WHERE persona.ci = :ci"
        );

        $this -> db -> bind(':ci', $datos["ci"]);

        $representantes = $this -> db -> registros();

        // inner join para: representante, persona, estudiante, seccion
        $this -> db -> query(
          "SELECT
          representante.id_rep_per, representante.id_rep,
          estudiante.id_est, estudiante.pnom, estudiante.pape, estudiante.segape, estudiante.segnom, estudiante.ci_escolar,
          estudiante.sexo, estudiante.nacionalidad_e, estudiante.pariente_representate
          FROM persona 
          INNER JOIN representante ON persona.id_per = representante.id_rep_per
          INNER JOIN estudiante ON estudiante.id_representante = representante.id_rep
          WHERE persona.ci = :ci"
        );

        $this -> db -> bind(':ci', $datos["ci"]);

        $estudiantes = $this -> db -> registros();

        return [
          "representante" => $representantes,
          "estudiantes" => $estudiantes
        ];

        
    }

    public function editar_representante($datos) {
      try {
        $this -> db -> beginTransaction();

        $this -> db -> query(
          "SELECT
          persona.id_per, persona.nacionalidad, persona.sexo_p,
          persona.ci, persona.pnombre, persona.segnombre, persona.papellido, persona.segapellido,
          representante.id_rep_per, representante.id_rep, representante.id_dr,
          direccion.pto_ref, municipio.nombre_muni, direccion.id_dir,
          estado.nom_estado, pais.nom_pais, estado.id_estado, municipio.id_muni, pais.id_pais,
          telefono.numero1, telefono.id_tlf,
          profesion_u_oficio.nom_po, profesion_u_oficio.id_po
          FROM persona 
          INNER JOIN representante ON persona.id_per = representante.id_rep_per
          INNER JOIN direccion ON direccion.id_dir = representante.id_dr
          INNER JOIN municipio ON municipio.id_muni = direccion.id_md
          INNER JOIN estado ON estado.id_estado = municipio.id_em
          INNER JOIN pais ON pais.id_pais = estado.id_ep
          INNER JOIN telefono ON telefono.id_te = representante.id_rep
          INNER JOIN profesion_u_oficio ON profesion_u_oficio.id_po = representante.id_pr
          WHERE persona.id_per = :id_per"
        );
  
        $this -> db -> bind(':id_per', $_SESSION['id_representante_persona']);

        $persona_join = $this -> db -> registro();

        $this -> db -> query("UPDATE persona SET pnombre = :pnombre, segnombre = :segnombre, papellido = :papellido, segapellido = :segapellido, nacionalidad = :nacionalidad, sexo_p = :sexo_p, ci = :ci
          WHERE id_per = :id_per
        ");

        $this -> db -> bind(':pnombre', $datos['pnombre']);
        $this -> db -> bind(':segnombre', $datos['segnombre']);
        $this -> db -> bind(':papellido', $datos['papellido']);	
        $this -> db -> bind(':segapellido', $datos['segapellido']);	
        $this -> db -> bind(':nacionalidad', $datos['nacionalidad']);	
        $this -> db -> bind(':sexo_p', $datos['sexo_p']);	
        $this -> db -> bind(':ci', $datos['ci']);	
        $this -> db -> bind(':id_per', $persona_join -> id_per);
        $this -> db -> execute();

        $this -> db -> query("UPDATE pais SET nom_pais = :nom_pais
          WHERE id_pais = :id_pais
        ");

        $this -> db -> bind(':nom_pais', $datos['nom_pais']);
        $this -> db -> bind(':id_pais', $persona_join -> id_pais);
        $this -> db -> execute();

        $this -> db -> query("UPDATE estado SET nom_estado = :nom_estado
          WHERE id_estado = :id_estado
        ");

        $this -> db -> bind(':nom_estado', $datos['nom_estado']);
        $this -> db -> bind(':id_estado', $persona_join -> id_estado);
        $this -> db -> execute();

        $this -> db -> query("UPDATE municipio SET nombre_muni = :nombre_muni
          WHERE id_muni = :id_muni
        ");

        $this -> db -> bind(':nombre_muni', $datos['nombre_muni']);
        $this -> db -> bind(':id_muni', $persona_join -> id_muni);
        $this -> db -> execute();

        $this -> db -> query("UPDATE telefono SET numero1 = :numero1
          WHERE id_tlf = :id_tlf
        ");

        $this -> db -> bind(':numero1', $datos['numero1']);
        $this -> db -> bind(':id_tlf', $persona_join -> id_tlf);
        $this -> db -> execute();
        

        $this -> db -> query("UPDATE profesion_u_oficio SET nom_po = :nom_po
          WHERE id_po = :id_po
        ");

        $this -> db -> bind(':nom_po', $datos['nom_po']);
        $this -> db -> bind(':id_po', $persona_join -> id_po);

        $this -> db -> execute();
        $this -> db -> commit();
        

      } catch (PDOException $e) {
        $this -> db -> rollBack();
        return [
          "new_ci" => $datos['ci'], 
          "0" => $persona_join,
          "mensaje" => $e -> getMessage()
        ];
				print "Error!: " . $e -> getMessage() . "</br>";
      }
    }

    public function obtener_representante_por_ci($datos) {
      // inner join para: representante, persona, estudiante, seccion
      $this -> db -> query(
        "SELECT
        persona.id_per, 
        persona.ci, persona.pnombre, persona.papellido, persona.segapellido, persona.segnombre, persona.sexo_p, persona.nacionalidad,
        representante.id_rep_per, representante.id_rep, representante.id_dr,
        direccion.pto_ref, municipio.nombre_muni,
        estado.nom_estado, pais.nom_pais,
        telefono.numero1,
        profesion_u_oficio.nom_po
        FROM persona 
        INNER JOIN representante ON persona.id_per = representante.id_rep_per
        INNER JOIN direccion ON direccion.id_dir = representante.id_dr
        INNER JOIN municipio ON municipio.id_muni = direccion.id_md
        INNER JOIN estado ON estado.id_estado = municipio.id_em
        INNER JOIN pais ON pais.id_pais = estado.id_ep
        INNER JOIN telefono ON telefono.id_te = representante.id_rep
        INNER JOIN profesion_u_oficio ON profesion_u_oficio.id_po = representante.id_pr
        WHERE persona.id_per = :id_per"
      );

      $this -> db -> bind(':id_per', $datos);

      $representantes = $this -> db -> registros();
      
      return [
        'mensaje' => '',
        '0' => $representantes[0]
      ];

    }

  }
