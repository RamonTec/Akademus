<?php require_once RUTA_APP . '/vistas/inc/header.php'; ?>
<!------------------------Formulario----------------------------------------->
<div class="container formulario pt-5">   
    <form class="formulario-login col-md-8 col-xs-12 m-auto" action="<?php echo RUTA_URL; ?>/Reportes/obtenerListaEstudiantes" method="POST">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="form-group text-center">                    
                    <input required type="text" class="text-center form-control" name="ci" placeholder="Cedula de identidad">
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6 text-center">
                <div class="form-group">
                    <button tarket="_blank" type="submit" class="btn btn-success">Consultar</button>
                </div>
            </div>
        </div>
    </form>
    <hr>
</div>
<!---Footer---------------------------------------------->
<script src="<?php echo RUTA_URL ?>/js/validacion_comprobar_estudiante.js"></script>
<?php require_once RUTA_APP . '/vistas/inc/footer.php'; ?>
