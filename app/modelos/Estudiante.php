<?php 
 
	class Estudiante{
		private $db;
		public $mensaje;

		public function __construct(){
			$this -> db = new Base;
			$this -> mensaje = '';
		}
 
		public function comprobarEstudiante($datos){
			$this -> db -> query("SELECT * FROM persona WHERE ci = :ci");
			$this -> db -> bind(':ci', $datos['ci']);

			$resultado = $this -> db -> registro();

			if ($resultado == true) {
				return false;
		    } else {
				return $this -> mensaje = "Estudiante no registrado";
		    }

		}

		public function registrarEstudiante($datos){
			
				$this -> db -> beginTransaction();
				//Insertar datos en la tabla telefono para el registro del estudiante
				$cod_area1 = $datos['cod_area1'];
				$numero1 = $datos['numero1'];
				$tipo1 = $datos['tipo1'];
				$cod_area2 = $datos['cod_area1'];
				$numero2 = $datos['numero2'];
				$tipo2 = $datos['tipo2'];
				$this -> db -> query("SELECT insertar_telefono( '$cod_area1' , '$numero1', '$tipo1', '$cod_area2', '$numero2', '$tipo2' )");
				$this -> db -> execute();
				$id_tlf = $this -> db -> lastInsertId();
			
				//Insertar datos en la tabla pais para el registro del estudiante
				$nombre_pais = $datos['nombre_pais'];
				$this -> db -> query("SELECT insertar_pais( '$nombre_pais' )");
				$this -> db -> execute();
				$id_paisp = $this -> db -> lastInsertId();

				//Insertar datos en la tabla estado para el registro del estudiante
				$nombre_estado = $datos['nombre_estado'];
				$this -> db -> query("SELECT insertar_estado( '$nombre_estado' , '$id_paisp')");
				$this -> db -> execute();
				$id_estado = $this -> db -> lastInsertId();

				//Insertar datos en la tabla municiip para el registro del estudiante
				$nombre_muni = $datos['nombre_muni'];
				$this -> db -> query("SELECT insertar_municipio('$nombre_muni', '$id_estado')");
				$this -> db -> execute();
				
				//Insertar datos en la tabla direcion para el registro del estudiante
				$nºcasa = $datos['nºcasa'];
				$pto_ref = $datos['pto_ref'];
				$calle = $datos['calle'];
				$sector = $datos['sector'];
				$this -> db -> query("SELECT insertar_direccion('$nºcasa', '$pto_ref', '$calle', '$sector', '$id_paisp')");
				$this -> db -> execute();
				$id_dirp = $this -> db -> lastInsertId();

				//Insertar datos en la tabla persona para el registro de estudiante
				$this -> db -> query("INSERT into persona (ci, pnombre, segnombre, otrosnombres, papellido, segapellido, otrosapellidos,
				sexo, nacionalidad, id_tlf, id_dirp) 
				VALUES(:ci, :pnombre, :segnombre, :otrosnombres, :papellido, :segapellido, :otrosapellidos, :sexo, :nacionalidad, 
				:id_tlf, :id_dirp)");
				$this -> db -> bind(':ci', $datos['ci']);
				$this -> db -> bind(':pnombre', $datos['pnombre']);
				$this -> db -> bind(':segnombre', $datos['segnombre']);
				$this -> db -> bind(':otrosnombres', $datos['otrosnombres']);
				$this -> db -> bind(':papellido', $datos['papellido']);
				$this -> db -> bind(':segapellido', $datos['segapellido']);
				$this -> db -> bind(':otrosapellidos', $datos['otrosapellidos']);
				$this -> db -> bind(':sexo', $datos['sexo']);
				$this -> db -> bind(':nacionalidad', $datos['nacionalidad']);
				$this -> db -> bind(':id_tlf', $id_tlf);
				$this -> db -> bind(':id_dirp', $id_dirp);
				$this -> db -> execute();

	 			//Insertar datos en la tabla canaima para el registro del estudiante
				$this -> db -> query("INSERT into canaima(posee_can, modelo_can, codigo_can, serial_can, condicion_can) VALUES(:posee_can, :modelo_can, :codigo_can, :serial_can, :condicion_can)");
				$this -> db -> bind(':posee_can', $datos['posee_can']);
				$this -> db -> bind(':modelo_can', $datos['modelo_can']);
				$this -> db -> bind(':codigo_can', $datos['codigo_can']);
				$this -> db -> bind(':serial_can', $datos['serial_can']);
				$this -> db -> bind(':condicion_can', $datos['condicion_can']);
				$this -> db -> execute();
				$id_can = $this -> db -> lastInsertId();

				//Insertar datos en la tabla beca para el registro del estudiante				
				$this -> db -> query("INSERT into beca(posee_beca, tipo_beca, descripcion) VALUES(:posee_beca, :tipo_beca, :descripcion)");
				$this -> db -> execute();
				$id_beca = $this -> db -> lastInsertId();

				//Insertar datos en la tabla email para el registro del estudiante
				$correo = $datos['correo'];
				$tipo_correo = $datos['tipo_correo'];
				$this -> db -> query("SELECT insertar_email('$correo', '$tipo_correo')");
				$this -> db -> execute();
				$id_correo = $this -> db -> lastInsertId();

				//Insertar datos en la tabla institucion de procedencia para el registro del estudiante
				$nombre_pro = $datos['nombre_pro'];
				$cod_dea = $datos['cod_dea'];
				$this -> db -> query("SELECT insertar_procedencia('$nombre_pro', '$cod_dea')");
				$this -> db -> execute();
				$id_pro = $this -> db -> lastInsertId();

				//Insertar datos en la tabla uniforme para el registro del estudiante
				$talla_c = $datos['talla_c'];
				$talla_p = $datos['talla_p'];
				$talla_z = $datos['talla_z'];
				$this -> db -> query("SELECT insertar_uniforme('$talla_c', '$talla_p', '$talla_z')");
				$this -> db -> execute();
				$id_uni = $this -> db -> lastInsertId();

				
				//Insertar datos en la tabla salud para el registro del estudiante
				$condicion_s = $datos['condicion_s'];
				$observacion_s = $datos['observacion_s'];
				$peso = $datos['peso'];
				$altura = $datos['altura'];
				$this -> db -> query("SELECT insertar_salud('$condicion_s', '$observacion_s', '$peso', '$altura')");
				$this -> db -> execute();
				$id_s = $this -> db -> lastInsertId();

				//Insertar datos en la tabla incapacidad para el registro del estudiante
				$nombre_i = $datos['nombre_i'];
				$tipo_i = $datos['tipo_i'];
				$this -> db -> query("SELECT insertar_incapacidad('$nombre_i', '$tipo_i', '$id_s')");
				$this -> db -> execute();

				//Insertar datos en la tabla discapacidad para el registro del estudiante
				$nom_d = $datos['nom_d'];
				$tipo_d = $datos['tipo_d'];
				$this -> db -> query("SELECT insertar_discapacidad('$nom_d','$tipo_d', '$id_s')");
				$this -> db -> execute();

				//Insertar datos en la tabla enfermedad para el registro del estudiante
				$nom_e = $datos['nom_e'];
				$tipo_e = $datos['tipo_e'];
				$this -> db -> query("SELECT insertar_enfermedad('$nom_e', '$tipo_e', '$id_s')");
				$this -> db -> execute();

				//Insertar datos en la tabla tratamiento para el registro del estudiante
				$nom_t = $datos['nom_t'];
				$tipo_t = $datos['tipo_t'];
				$this -> db -> query("SELECT insertar_tratamiento('$nom_t', '$tipo_t')");
				$this -> db -> execute();
				$id_t = $this -> db -> lastInsertId();

				//Insertar datos en la tabla vacuna para el registro del estudiante
				$descripcion_v = $datos['descripcion_v'];
				$falta_v = $datos['falta_v'];
				$this -> db -> query("SELECT insertar_vacuna('$descripcion_v', '$falta_v', '$id_s')");
				$this -> db -> execute();
				
				//Insertar datos en la tabla estudiante para el registro de estudiante
				$ci_escolar = $datos['ci_escolar'];
				$pasaporte = $datos['pasaporte'];
				$ci_diplomatica = $datos['ci_diplomatica'];
				$tipo_est = $datos['tipo_est'];
				$fecha_n = $datos['fecha_n'];
				$lugar_n = $datos['lugar_n'];
				$this -> db -> query("SELECT insertar_estudiante('$ci_escolar', '$pasaporte', '$ci_diplomatica', '$tipo_est', '$fecha_n',
					'$lugar_n', '$ci', '$id_beca', '$id_can')");
				$this -> db -> execute();

				
				$this -> db -> commit();

		}

		public function obtenerEstudiantes(){
			$this -> db -> query("SELECT * from estudiante_persona()");
			$resultados = $this -> db -> registros();
			return $resultados;
		}

		public function obtenerEstudiante($datos){

		}

  }
