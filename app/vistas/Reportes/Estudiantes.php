<?php require_once RUTA_APP . '/vistas/inc/header.php' ?>        
<div class="container">
    <div class="row ">
        <div class="col-md-4"></div>
        <div class="col-md-4">        
        <form id="inicio_sesion" class="mx-auto" target="_blank" action="<?php echo RUTA_URL; ?>/Reportes/constancia_inscripcion" method="POST">
            <div class="form-group mx-auto">
                <label for="ci">Ingrese la cedula del estudiante</label>
                <input type="text" class="text-center form-control" name="ci_est" id="ci_est" placeholder="Cedula de identidad">
            </div>
            <div class="form-group mx-auto">
                <button class="btn btn-primary w-100 mx-auto" type="submit">Reporte</button>
            </div>
        </form>
    </div>
    </div>
</div>        
<?php require_once RUTA_APP . '/vistas/inc/footer.php' ?>