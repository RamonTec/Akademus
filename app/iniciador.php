<?php  

	//Cargando librerias
	session_start();
	require_once 'config/configurar.php';

	require_once 'helpers/url_helper.php';


	require_once 'librerias/Base.php';
	require_once 'librerias/Controlador.php';
	require_once 'librerias/Core.php';
	require_once 'librerias/fpdf/fpdf.php';

	//Autoload php
	/*
	//spl_autoload_register(function($nombreClase){
		require_once 'librerias/' . $nombreClase . '.php';
	//});
	*/ 