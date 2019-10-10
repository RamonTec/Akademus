<?php  

class Reporte{

	private $db;

	public function __construct(){
		$this ->db = new Base;
	}

	public function constanciaEstudiante($ci_est){
		$this -> db -> query("
			SELECT estudiante.ci_est, estudiante.pnom, estudiante.segnom, estudiante.pape, estudiante.sexo, 
			estudiante.nacionalidad_e, estudiante.tipo_est, estudiante.fecha_n
	    	FROM estudiante	WHERE estudiante.ci_est = :ci_est						
		");
		$this -> db -> bind(':ci_est',$ci_est);
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
