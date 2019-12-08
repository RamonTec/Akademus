<?php
 
	class Profesores extends Controlador{
 
		public function __construct(){
			$this -> profesores_modelo = $this -> modelo('Profesor');
		}  
 
		//Metodo index por defecto que instancia la vista de inicio de sesion y recibe todos los usuarios registrados en la base de datos
		public function index(){
			// $usuarios = $this -> loginModelo -> obtenerUsuarios();
			// $datos = ['usuarios' => $usuarios -> total]; 
			$this -> vista('Profesores/profesores');
		}
	}
		
