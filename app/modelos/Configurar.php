<?php  

class Configurar{
  
	public function respaldo(){

		//Variables para el respaldo de la base de datos
		$db_host = 'localhost'; 
		$db_name = 'bm_management';
		$db_user = 'postgres';
		$db_pass = 'postgres';
		$db_port = '5432';

		//Definicion de variables dia, mes, año y hora
		$day  = date("d");
		$mont = date("m"); 
		$year = date("Y");
		$hora = date("H-i-s");
 
		//Variable fecha que almacena la concatenacion del dia, mes y año
		$fecha = $day . '_' . $mont . '_' . $year;

		//Variable que almacena la concatenacion de la fecha seguido de la hora con extension .sql
		$dataBase =  $db_name . '_' . $fecha . "_(" . $hora . "_hrs).sql";
 
 		//Variable que almacena la concatenacion de la ruta de aplicacion con la salida sql dataBase
		$ruta = RUTA_APP . '/Respaldos/' . $dataBase;

		$pg_dump = "pg_dump -U postgres -f C:\ xampp\htdocs\bm_management_system\app\Respaldos\bm_management.sql -F p -c -d bm_management -E latin9";

		system($pg_dump, $output);

		$rutas = RUTA_APP . '/Respaldos/';

		$ficheros  = scandir($rutas,1);
		if (isset($ficheros[5]) && $ficheros[5] != '..' && $ficheros[5] != '.'){
			unlink($rutas.$ficheros[5]);
		}
		return true;
	}

	public function archivos(){
		$dir = RUTA_APP . '/respaldos/'; 
		$ficheros1  = scandir($dir,1);

		foreach ($ficheros1 as $fichero){
			$input[]='<label class="bg-dark p-1 px-3 rounded text-white"><input type="radio" name="archivo" id="archivo" value="'.$fichero.'">'.$fichero.'</label><br>';
		}
		return $input;
	}

	public function restaurar_repaldo($name_restore){

		$tipo_archivo = pathinfo($name_restore, PATHINFO_EXTENSION);

		if ($tipo_archivo != "sql"){
				return false;
			}

		ini_set('upload_max_filesize', '80M');
		ini_set('post_max_size', '80M');
		ini_set('memory_limit', '-1'); //evita el error Fatal error: Allowed memory size of X bytes exhausted (tried to allocate Y bytes)...
		ini_set('max_execution_time', 300); // es lo mismo que set_time_limit(300) ;
		ini_set('mysql.connect_timeout', 300);
		ini_set('default_socket_timeout', 300);
		//En MYSQL archivo "my.ini" ==> max_allowed_packet = 22M
		//"SET GLOBAL max_allowed_packet = 22M;"
		//"SET GLOBAL connect_timeout = 20;"
		//"SET GLOBAL net_read_timeout=50;"
		//esto no se si solo es modificable en php.ini 
		$db_host = 'localhost';
		$db_name = 'sinpriecx';
		$db_user = 'root';
		$db_pass = '72452439Sao';
		$dir = RUTA_APP . '/respaldos/'. $name_restore;

		$restore = "mysql -h $db_host -u $db_user -p$db_pass $db_name < $dir";

		system($restore, $output);
		
		return true;

	}

}

?>

