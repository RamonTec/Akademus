<?php require_once RUTA_APP . '/vistas/inc/header.php'?>
<!---------------------------------------BARRA DE NAVEGACION------------------------------------->
<div class="bn">
	<section id="banner">
		<div class="container">
			<div class="row justify-content-center">                  
				<div class="col-md-4 mt-5">
					<form id="inicio_sesion" class="mx-auto mt-5" action="<?php echo RUTA_URL?>/Logins/verificar_sesion" method="POST">

						<div class="form-group mx-auto">                            
							<input type="text" class="text-center form-control" name="nom_u" id="nom_u" placeholder="Ingrese su usuario">
						</div>
						
						<div class="form-group mx-auto">                            
							<input type="password" class="text-center form-control" name="clave" id="clave" placeholder="Ingrese su clave">
						</div>  

						<div class="form-group mx-auto">
							<button class="btn w-100 mx-auto btn btn-primary" type="submit">Iniciar Sesión</button>
						</div>

						<?php
							if($datos) {
								?> 
									<div class="text-center alert alert-danger mt-3" role="alert">
										<?php print_r($datos['mensaje']) ?>
									</div>
								<?php
							}

						?>

						<hr>

						<div class="text-center">
							<a href="<?php echo RUTA_URL ?>/Usuarios/registrar_usuario">Regístrate</a> ó <a href="<?php echo RUTA_URL ?>/Usuarios/recuperar_usuario">Recuperar usuario</a>
						</div>

					</form>
					<div class="col-12 mt-3 pt-5">                              
                                              
						<blockquote class="promo-title pt-3">
							"Los profesores pueden cambiar vidas con la mezcla correcta de tiza y desafios"
						</blockquote> 
						<cite><p class="text-right">Jhon Henrik Clarke</p></cite>  
					</div> 

				</div>				

			</div>
		</div>
	</section class="pb-5">
</div class="pb-5">
<script src="<?php echo RUTA_URL ?>/js/Validacion_inicio_sesion/validacion_inicio_sesion.js"></script>
<?php require_once RUTA_APP . '/vistas/inc/footer.php' ?>