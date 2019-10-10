
<?php

	/*
		Traer la URL o mapear la URL ingresada en el navegador
	*/
		/*
			1- Controlador
			2- Metodo
			3- Parametro
		*/

	class Core{
		protected $controladorActual = 'Logins';
		protected $metodoActual = 'index';
		protected $parametros = [];
 
		//Constructor
		public function __construct(){
			//print_r($this->getUrl());
			$url = $this -> getUrl();

			//Evaluamos si el archivo existe
			//Buscar en controladores si el controlador existe
			if (file_exists('../app/controladores/' . ucwords($url[0]) . '.php')) {
				//Si existe se setea o se configura como controlador por defecto
				$this -> controladorActual = ucwords($url[0]);

				//unset del indice 0
				unset($url[0]);
			}

			//Requerir el controlador nuevo
			require_once '../app/controladores/' . $this -> controladorActual . '.php';
			$this -> controladorActual = new $this -> controladorActual;

			//Chequear la segunda parte de la URL que viene siendo el metodo
			if (isset($url[1])) {
				if (method_exists($this -> controladorActual, $url[1])) {
					//Chequeando el metodo
					$this -> metodoActual = $url[1];
					unset($url[1]);
				}
			}
			//Para probar traer el metodo
			//echo $this -> metodoActual;

			//Obtener los posibles parametros
			$this -> parametros = $url ? array_values($url) : [];



			//Llamar callback con parametros array
			call_user_func_array([$this -> controladorActual, $this -> metodoActual], $this -> parametros);

		}

		public function getUrl(){
			//echo $_GET['url'];

			if (isset($_GET['url'])) {
				$url = rtrim($_GET['url'], '/');
				$url = filter_var($url, FILTER_SANITIZE_URL);
				$url = explode('/', $url);
				return $url;
			}
		}
	}
