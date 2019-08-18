<?php

	class Seccion{
		private $db;
		public $mensaje;

		public function __construct(){
			$this -> db = new Base;
			$this -> mensaje = '';
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
