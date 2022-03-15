<?php

	//Clase CONTROLADOR principal
	//Se encargar de poder cargar los modelos y las vistas

	class Controlador{
		//Cargar modelo
		public function modelo($modelo){
			//carga
			require_once '../app/modelos/' . $modelo . '.php';
			//Instanciar el modelo
			return new $modelo();
		}

		public function globals($variable, $caso) {
			// metodo para guardar variables globales
			switch ($caso) {
				case 'id_usuario':
					
					break;

				case 'id_representante':
					
					break;
				
				default:
					# code...
					break;
			}
		}	

		//Cargar vista
		public function vista($vista, $datos = []){
			//Chequear si el archivo vista existe
			if (file_exists('../app/vistas/' . $vista . '.php')) {
				require_once '../app/vistas/' . $vista . '.php';
			}else{
				//Si el archivo no existe
				die('La vista no existe');
			}
		}
	}
