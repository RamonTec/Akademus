<?php require_once RUTA_APP . '/vistas/inc/header.php'; ?>
<!------------------------Formulario----------------------------------------->
<div class="container formulario pt-5">   
    <form class="formulario-login col-md-8 col-xs-12 m-auto" action="<?php echo RUTA_URL; ?>/Estudiantes/index" method="POST">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="form-group text-center">                    
                    <input type="text" class="text-center form-control" name="ci" placeholder="Cedula de identidad">
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6 text-center">
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Comprobar cedula</button>
                </div>
            </div>
        </div>
    </form>
    <hr>
</div>
<!---Footer---------------------------------------------->
<script src="<?php echo RUTA_URL ?>/js/validacion_comprobar_estudiante.js"></script>
<?php require_once RUTA_APP . '/vistas/inc/footer.php'; ?>
