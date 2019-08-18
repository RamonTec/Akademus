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

  }
