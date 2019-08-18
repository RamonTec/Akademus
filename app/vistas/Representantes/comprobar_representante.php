<?php require_once RUTA_APP . '/vistas/inc/header.php'; ?>
<!---------------------------------------------------Formulario----------------------------------------->
<div class="container formulario pt-5">
   <div class="titulo-formulario col-md-8 col-xs-12  m-auto">
        <div class="row text-center">            
            <div class="col-xs-12 col-md-8">
                <h2></h2>
                <?php 
                  print_r($datos); 
                ?>
            </div> 
        </div> 
    </div>
    <form class="formulario-login col-md-8 col-xs-12 m-auto" action="<?php echo RUTA_URL; ?>/Representantes/index" method="POST">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="form-group text-center">                    
                    <input type="text" class="text-center form-control" name="ci" id="ci" placeholder="Cedula de identidad">
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6 text-center">
                <div class="form-group">
                    <button type="submit" class="btn boton-de-envio">Comprobar cedula</button>
                </div>
            </div>
        </div>
    </form>
    <hr>
</div>
<!---------------------------------------------------Footer---------------------------------------------->
<?php require_once RUTA_APP . '/vistas/inc/footer.php'; ?>
