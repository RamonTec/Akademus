<?php  

class Reporte{

	private $db;

	public function __construct(){
		$this ->db = new Base;
	}

	public function constanciaEstudiante($ci){
		$this -> db -> query("
			SELECT persona.ci, persona.pnombre, persona.segnombre, persona.papellido, persona.sexo, persona.nacionalidad,
		 		   estudiante.tipo_est, estudiante.fecha_n
	    	FROM persona
	        JOIN estudiante
	        ON persona.ci = estudiante.ci_escolar
	        WHERE persona.ci = :ci						
		");
		$this -> db -> bind(':ci',$ci);
		$resultado = $this -> db -> registro();
		return $resultado;
	}

	public function actaDeRepresentante($ci){
		$this -> db -> query("
			SELECT persona.ci, persona.pnombre, persona.papellido, persona.sexo, persona.nacionalidad,
		 		   representante.tutor_legal
	    	FROM persona
	        JOIN representante
	        ON persona.ci = representante.ci_rep
	        WHERE persona.ci = :ci						
		");
		$this -> db -> bind(':ci',$ci);
		$resultado = $this -> db -> registro();
		return $resultado;
	}

}
