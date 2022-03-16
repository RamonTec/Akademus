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
        <form id="inicio_sesion" target="_blank" class="mx-auto" action="<?php echo RUTA_URL; ?>/Reportes/actaRepresentante" method="POST">
            <div class="form-group mx-auto">
                <label for="ci">Ingrese la cedula del representante</label>
                <input type="text" class="text-center form-control" name="ci" id="ci" placeholder="Cedula de identidad">
            </div>
            <div class="form-group mx-auto">
                <button class="btn btn-success w-100 mx-auto" type="submit">Reporte</button>
            </div>
        </form>
    </div>
    </div>
</div>        
<?php require_once RUTA_APP . '/vistas/inc/footer.php' ?>