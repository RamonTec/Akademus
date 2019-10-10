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
