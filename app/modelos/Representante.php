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

    // Metodo para registrar a representante
    public function registrar_representante($datos){

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

        $this -> db -> query("INSERT INTO direccion (n_casa, pto_ref, calle, sector, id_md) 
        VALUES(:n_casa, :pto_ref, :calle, :sector, :id_md)");
        $this -> db -> bind(":n_casa", $datos['n_casa']);
        $this -> db -> bind(":pto_ref", $datos['pto_ref']); 
        $this -> db -> bind(":calle", $datos['calle']);
        $this -> db -> bind(":sector", $datos['sector']);
        $this -> db -> bind(":id_md", $id_municipio);
        $this -> db -> execute();
        $id_direccion_persona_representante = $this -> db -> lastInsertId();

        $this -> db -> query("INSERT INTO profesion_u_oficio (posee_po, nom_po, lugar_po, tlf_po) 
        VALUES(:posee_po, :nom_po, :lugar_po, :tlf_po)");
        $this -> db -> bind(":posee_po", $datos['posee_po']);
        $this -> db -> bind(":nom_po", $datos['nom_po']);
        $this -> db -> bind(":lugar_po", $datos['lugar_po']);
        $this -> db -> bind(":tlf_po", $datos['tlf_po']);
        $this -> db -> execute();
        $id_profesion_persona_representante = $this -> db -> lastInsertId();

        $this -> db -> query("INSERT INTO representante (tutor_legal, id_rep, id_pr, id_dr)
        VALUES(:tutor_legal, :id_rep, :id_pr, :id_dr)");
        $this -> db -> bind(":tutor_legal", $datos['tutor_legal']);
        $this -> db -> bind(":id_rep", $id_persona_representante);
        $this -> db -> bind(":id_pr", $id_profesion_persona_representante);
        $this -> db -> bind(":id_dr", $id_direccion_persona_representante);

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
      $this -> db -> query("SELECT * FROM representante");
      $fila = $this -> db -> registros();
			return $fila;
    }

    

  }
