<?php require_once RUTA_APP . "/vistas/inc/header.php" ?>
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-4">
        <br>
        <h2 class="text-center">Registro de profesor</h2>
      </div>
    </div>
  </div>
 
  <form action="<?php echo RUTA_URL; ?>/Profesores/registro_profesor" method="POST">
     
    <div class="row justify-content-center">  
      <div class="col-3 mt-4">        
        <input type="text" class="form-control" name="ci_per" id="ci_per" placeholder="Cedula de identidad">
        <input type="text" class="form-control" name="tipo_prof" id="tipo_prof" placeholder="Tipo de profesor">
        <input type="text" class="form-control" name="cod_prof" id="cod_prof" placeholder="Codigo de profesor">
      </div>
    </div>
    <div class="row justify-content-center">
      <div class="col-2">
        <button type="submit" class="btn btn-primary ml-5">Registrar</button>
      </div>
    </div>

  <form>
  

<?php require_once RUTA_APP . "/vistas/inc/footer.php" ?>
