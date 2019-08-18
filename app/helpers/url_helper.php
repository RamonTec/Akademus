<?php

class Helper{
  

	public static function redireccionar($pagina){
		header('location: ' . RUTA_URL . $pagina);
	}


	public static function session(){
		//session_start();
		if (empty($_SESSION['nom_u'])){
			self::redireccionar('/Login/Login');
		} 
	}

	public static function encriptar($clave){
		$string = $clave;
		$string = str_split($string);

		for ($i=0; $i <count($string) ; $i++) {
			$cadena[] = ord($string[$i]);
			$cadena2[] = ord($string[$i]);
			$cadena3[] = $cadena2[$i] * $cadena[$i];
			$cadena4[] = $cadena3[$i] + $cadena3[$i] . '-';
		}
		$cadena4 = implode($cadena4);
		return $cadena4;
	}

	public static function des($clave_usuario, $clave_base){
		$clave_de_usuario = $clave_usuario;
		$clave_de_bdd = $clave_base;

		$string_base = $clave_base;
		$string_base = rtrim($string_base, '-');
		$string_base = explode("-",$string_base);
		$string_usuario = $clave_usuario;
		$string_usuario = str_split($string_usuario);

		for($i=0; $i < count($string_base); $i++){

			$string_usuario_1[] = ord($string_usuario[$i]);
			$string_usuario_2[] = $string_usuario_1[$i] * $string_usuario_1[$i];
			$string_base_1[] = $string_base[$i] - $string_usuario_2[$i];
			$string_base_2[] = $string_base_1[$i] / $string_usuario_1[$i];
			$string_base_3[] = chr($string_base_2[$i]);
		}

		$string_base_3 = implode($string_base_3);
		return $string_base_3;
	}
}
