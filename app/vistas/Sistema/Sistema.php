<?php require_once RUTA_APP . '/vistas/inc/header.php' ?>        
<div class="container">
    <div class="row ">
        <div class="col-md-4"></div>
	        <div class="col-md-4">
	            <div class="row">
	                <div class="mx-auto col- mb-2">
	                    <img class="" src="<?php echo RUTA_URL ?>;/img/logo-inschool.png" width="80" alt="">
	                </div>
	            </div>
	        <form class="mx-auto" action="<?php echo RUTA_URL; ?>/Configuraciones/respaldoSistema" method="POST">
	            <div class="form-group mx-auto">
	                <button class="btn btn-primary w-100 mx-auto" type="submit">Crear respaldo</button>
	            </div>
	        </form>
	    </div>
    </div>
</div>        
<?php require_once RUTA_APP . '/vistas/inc/footer.php' ?>